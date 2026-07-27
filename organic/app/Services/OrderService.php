<?php
namespace App\Services;

use Illuminate\Http\Request;

use App\Models\Order;
use App\Models\ProductStock;
use App\Models\SmsTemplate;
use App\Models\User;
use App\Utility\NotificationUtility;
use App\Utility\SmsUtility;
use Illuminate\Support\Facades\DB;


class OrderService{

    public function handle_delivery_status(Request $request)
    {
        $order = Order::findOrFail($request->order_id);
        $previousOrderStatus = $order->delivery_status;

        foreach ($order->orderDetails as $orderDetail) {
            if ($orderDetail->delivery_status == 'cancelled' && $request->status != 'cancelled') {
                $variant = $orderDetail->variation ?? '';
                $productStock = ProductStock::where('product_id', $orderDetail->product_id)
                    ->where('variant', $variant)
                    ->first();

                if ($productStock && $productStock->product && $productStock->product->digital != 1 && $productStock->qty < $orderDetail->quantity) {
                    throw new \Exception(translate('Insufficient stock to restore this order from cancelled status'));
                }
            }
        }

        DB::beginTransaction();
        try {
            $order->delivery_viewed = '0';
            $order->delivery_status = $request->status;

            if ($previousOrderStatus != 'delivered' && $request->status == 'delivered') {
                $order->delivered_date = date("Y-m-d H:i:s");
            } elseif ($previousOrderStatus == 'delivered' && $request->status != 'delivered') {
                $order->delivered_date = null;
            }

            if ($previousOrderStatus != 'cancelled' && $request->status == 'cancelled' && $order->payment_type == 'wallet') {
                $user = User::where('id', $order->user_id)->first();
                $user->balance += $order->grand_total;
                $user->save();
            }

            if ($previousOrderStatus == 'cancelled' && $request->status != 'cancelled' && $order->payment_type == 'wallet') {
                $user = User::where('id', $order->user_id)->first();
                if ($user->balance < $order->grand_total) {
                    throw new \Exception(translate('Customer wallet balance is insufficient to revert cancelled order status'));
                }
                $user->balance -= $order->grand_total;
                $user->save();
            }

            $order->save();

            foreach ($order->orderDetails as $key => $orderDetail) {
                $previousOrderDetailStatus = $orderDetail->delivery_status;

                if ($previousOrderDetailStatus != 'cancelled' && $request->status == 'cancelled') {
                    product_restock($orderDetail);
                }

                if ($previousOrderDetailStatus == 'cancelled' && $request->status != 'cancelled') {
                    $variant = $orderDetail->variation ?? '';
                    $productStock = ProductStock::where('product_id', $orderDetail->product_id)
                        ->where('variant', $variant)
                        ->first();

                    if ($productStock && $productStock->product && $productStock->product->digital != 1) {
                        $productStock->qty -= $orderDetail->quantity;
                        $productStock->save();

                        $product = $productStock->product;
                        $product->num_of_sale += $orderDetail->quantity;
                        $product->save();
                    }
                }

                $orderDetail->delivery_status = $request->status;
                $orderDetail->save();

                if (addon_is_activated('affiliate_system') && auth()->user()->user_type == 'admin' && $orderDetail->product_referral_code) {
                    $no_of_delivered = 0;
                    $no_of_canceled = 0;

                    if ($previousOrderDetailStatus != 'delivered' && $request->status == 'delivered') {
                        $no_of_delivered = $orderDetail->quantity;
                    } elseif ($previousOrderDetailStatus == 'delivered' && $request->status != 'delivered') {
                        $no_of_delivered = -1 * $orderDetail->quantity;
                    }

                    if ($previousOrderDetailStatus != 'cancelled' && $request->status == 'cancelled') {
                        $no_of_canceled = $orderDetail->quantity;
                    } elseif ($previousOrderDetailStatus == 'cancelled' && $request->status != 'cancelled') {
                        $no_of_canceled = -1 * $orderDetail->quantity;
                    }

                    if ($no_of_delivered != 0 || $no_of_canceled != 0) {
                        $referred_by_user = User::where('referral_code', $orderDetail->product_referral_code)->first();
                        if ($referred_by_user) {
                            $affiliateController = new AffiliateController;
                            $affiliateController->processAffiliateStats($referred_by_user->id, 0, 0, $no_of_delivered, $no_of_canceled);
                        }
                    }
                }
            }
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
        if (addon_is_activated('otp_system') && SmsTemplate::where('identifier', 'delivery_status_change')->first()->status == 1) {
            try {
                SmsUtility::delivery_status_change(json_decode($order->shipping_address)->phone, $order);
            } catch (\Exception $e) {

            }
        }

        //sends Notifications to user
        NotificationUtility::sendNotification($order, $request->status);
        if (get_setting('google_firebase') == 1 && $order->user->device_token != null) {
            $request->device_token = $order->user->device_token;
            $request->title = "Order updated !";
            $status = str_replace("_", "", $order->delivery_status);
            $request->text = " Your order {$order->code} has been {$status}";

            $request->type = "order";
            $request->id = $order->id;
            $request->user_id = $order->user->id;

            NotificationUtility::sendFirebaseNotification($request);
        }


        if (addon_is_activated('delivery_boy')) {
            if (auth()->user()->user_type == 'delivery_boy') {
                $deliveryBoyController = new DeliveryBoyController;
                $deliveryBoyController->store_delivery_history($order);
            }
        }
    }

    public function handle_payment_status(Request $request)
    {
        $order = Order::findOrFail($request->order_id);
        $order->payment_status_viewed = '0';
        $order->save();

        if (auth()->user()->user_type == 'seller') {
            foreach ($order->orderDetails->where('seller_id', auth()->user()->id) as $key => $orderDetail) {
                $orderDetail->payment_status = $request->status;
                $orderDetail->save();
            }
        } else {
            foreach ($order->orderDetails as $key => $orderDetail) {
                $orderDetail->payment_status = $request->status;
                $orderDetail->save();
            }
        }

        $status = 'paid';
        foreach ($order->orderDetails as $key => $orderDetail) {
            if ($orderDetail->payment_status != 'paid') {
                $status = 'unpaid';
            }
        }
        $order->payment_status = $status;
        $order->save();


        if ($order->payment_status == 'paid' && $order->commission_calculated == 0) {
            calculateCommissionAffilationClubPoint($order);
        }

        //sends Notifications to user
        NotificationUtility::sendNotification($order, $request->status);
        if (get_setting('google_firebase') == 1 && $order->user->device_token != null) {
            $request->device_token = $order->user->device_token;
            $request->title = "Order updated !";
            $status = str_replace("_", "", $order->payment_status);
            $request->text = " Your order {$order->code} has been {$status}";

            $request->type = "order";
            $request->id = $order->id;
            $request->user_id = $order->user->id;

            NotificationUtility::sendFirebaseNotification($request);
        }


        if (addon_is_activated('otp_system') && SmsTemplate::where('identifier', 'payment_status_change')->first()->status == 1) {
            try {
                SmsUtility::payment_status_change(json_decode($order->shipping_address)->phone, $order);
            } catch (\Exception $e) {

            }
        }
        return 1;

    }

}

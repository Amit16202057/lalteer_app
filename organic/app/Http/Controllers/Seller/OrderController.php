<?php

namespace App\Http\Controllers\Seller;

use App\Models\Order;
use App\Models\ProductStock;
use App\Models\SmsTemplate;
use App\Models\User;
use App\Utility\NotificationUtility;
use App\Utility\SmsUtility;
use Illuminate\Http\Request;
use App\Models\OrdersExport;
use App\Utility\EmailUtility;
use Maatwebsite\Excel\Facades\Excel;
use Auth;
use DB;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource to seller.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $payment_status = null;
        $delivery_status = null;
        $sort_search = null;
        $orders = DB::table('orders')
            ->orderBy('id', 'desc')
            ->where('seller_id', Auth::user()->id)
            ->select('orders.id')
            ->distinct();

        if ($request->payment_status != null) {
            $orders = $orders->where('payment_status', $request->payment_status);
            $payment_status = $request->payment_status;
        }
        if ($request->delivery_status != null) {
            $orders = $orders->where('delivery_status', $request->delivery_status);
            $delivery_status = $request->delivery_status;
        }
        if ($request->has('search')) {
            $sort_search = $request->search;
            $orders = $orders->where('code', 'like', '%' . $sort_search . '%');
        }

        $orders = $orders->paginate(15);

        foreach ($orders as $key => $value) {
            $order = Order::find($value->id);
            $order->viewed = 1;
            $order->save();
        }

        return view('seller.orders.index', compact('orders', 'payment_status', 'delivery_status', 'sort_search'));
    }

    public function show($id)
    {
        $order = Order::findOrFail(decrypt($id));
        $order_shipping_address = json_decode($order->shipping_address);
        $delivery_boys = User::where('city', $order_shipping_address->city)
            ->where('user_type', 'delivery_boy')
            ->get();

        $order->viewed = 1;
        $order->save();
        return view('seller.orders.show', compact('order', 'delivery_boys'));
    }

    // Update Delivery Status
    public function update_delivery_status(Request $request)
    {
        $authUser = Auth::user();
        $order = Order::findOrFail($request->order_id);
        $previousOrderStatus = $order->delivery_status;

        $orderDetails = $order->orderDetails->where('seller_id', $authUser->id);

        foreach ($orderDetails as $orderDetail) {
            if ($orderDetail->delivery_status == 'cancelled' && $request->status != 'cancelled') {
                $variant = $orderDetail->variation ?? '';
                $productStock = ProductStock::where('product_id', $orderDetail->product_id)
                    ->where('variant', $variant)
                    ->first();

                if ($productStock && $productStock->product && $productStock->product->digital != 1 && $productStock->qty < $orderDetail->quantity) {
                    return response()->json([
                        'success' => false,
                        'message' => translate('Insufficient stock to restore this order from cancelled status')
                    ], 422);
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
                    DB::rollBack();
                    return response()->json([
                        'success' => false,
                        'message' => translate('Customer wallet balance is insufficient to revert cancelled order status')
                    ], 422);
                }
                $user->balance -= $order->grand_total;
                $user->save();
            }

            if ($previousOrderStatus != 'cancelled' && $request->status == 'cancelled' && $order->payment_status == 'paid' && $order->commission_calculated == 1 && $order->commissionHistory && $order->shop) {
                $sellerEarning = $order->commissionHistory->seller_earning;
                $shop = $order->shop;
                $shop->admin_to_pay -= $sellerEarning;
                $shop->save();
            }

            if ($previousOrderStatus == 'cancelled' && $request->status != 'cancelled' && $order->payment_status == 'paid' && $order->commission_calculated == 1 && $order->commissionHistory && $order->shop) {
                $sellerEarning = $order->commissionHistory->seller_earning;
                $shop = $order->shop;
                $shop->admin_to_pay += $sellerEarning;
                $shop->save();
            }

            $order->save();

            foreach ($orderDetails as $key => $orderDetail) {
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
            }
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => translate('Failed to update delivery status')
            ], 500);
        }

        // Delivery Status change email notification to Admin, seller, Customer
        EmailUtility::order_email($order, $request->status);


        // Delivery Status change SMS notification
        if (addon_is_activated('otp_system') && SmsTemplate::where('identifier', 'delivery_status_change')->first()->status == 1) {
            try {
                SmsUtility::delivery_status_change(json_decode($order->shipping_address)->phone, $order);
            } catch (\Exception $e) {}
        }

        //Sends Web Notifications to user
        NotificationUtility::sendNotification($order, $request->status);

        //Sends Firebase Notifications to user

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
            if ($authUser->user_type == 'delivery_boy') {
                $deliveryBoyController = new DeliveryBoyController;
                $deliveryBoyController->store_delivery_history($order);
            }
        }

        return 1;
    }

    // Update Payment Status
    public function update_payment_status(Request $request)
    {
        $order = Order::findOrFail($request->order_id);
        $order->payment_status_viewed = '0';
        $order->save();

        foreach ($order->orderDetails->where('seller_id', Auth::user()->id) as $key => $orderDetail) {
            $orderDetail->payment_status = $request->status;
            $orderDetail->save();
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

        // Payment Status change email notification to Admin, seller, Customer
        if($request->status == 'paid'){
            EmailUtility::order_email($order, $request->status);
        }

        //Sends Firebase Notifications to Admin, seller, Customer
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

    public function orderBulkExport(Request $request)
    {
        if($request->id){
          return Excel::download(new OrdersExport($request->id), 'orders.xlsx');
        }
        return back();
    }

}

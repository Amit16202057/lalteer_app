<?php

namespace App\Http\Controllers;

use Auth;
use Mail;
use Carbon\Carbon;
use App\Models\Cart;
use App\Models\User;
use App\Models\Order;
use App\Models\Coupon;
use App\Models\Address;
use App\Models\Product;
use App\Models\CouponUsage;
use App\Models\OrderDetail;
use App\Models\SmsTemplate;
use App\Utility\SmsUtility;
use App\Models\OrdersExport;
use CoreComponentRepository;
use Illuminate\Http\Request;
use App\Models\CombinedOrder;
use App\Utility\EmailUtility;
use App\Mail\InvoiceEmailManager;
use App\Utility\NotificationUtility;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Notifications\OrderNotification;
use Illuminate\Support\Facades\Notification;
use App\Http\Controllers\AffiliateController;

class OrderController extends Controller
{

    public function __construct()
    {
        // Staff Permission Check
        $this->middleware(['permission:view_all_orders|view_inhouse_orders|view_seller_orders|view_pickup_point_orders|view_all_offline_payment_orders'])->only('all_orders');
        $this->middleware(['permission:view_order_details'])->only('show');
        $this->middleware(['permission:delete_order'])->only('destroy', 'bulk_order_delete');
    }

    // All Orders
    public function all_orders(Request $request)
    {
        CoreComponentRepository::instantiateShopRepository();

        $date = $request->date;
        $sort_search = null;
        $delivery_status = null;
        $payment_status = '';
        $order_type = '';

        $ordersQuery = Order::orderBy('id', 'desc');
        $admin_user_id = get_admin()->id;

        // --- existing route-based filters ---
        if (Route::currentRouteName() == 'inhouse_orders.index' && Auth::user()->can('view_inhouse_orders')) {
            $ordersQuery->where('orders.seller_id', '=', $admin_user_id);
        } elseif (Route::currentRouteName() == 'seller_orders.index' && Auth::user()->can('view_seller_orders')) {
            $ordersQuery->where('orders.seller_id', '!=', $admin_user_id);
        } elseif (Route::currentRouteName() == 'pick_up_point.index' && Auth::user()->can('view_pickup_point_orders')) {
            if (get_setting('vendor_system_activation') != 1) {
                $ordersQuery->where('orders.seller_id', '=', $admin_user_id);
            }
            $ordersQuery->where('shipping_type', 'pickup_point')->orderBy('code', 'desc');
            if (Auth::user()->user_type == 'staff' && Auth::user()->staff->pick_up_point != null) {
                $ordersQuery->where('pickup_point_id', Auth::user()->staff->pick_up_point->id);
            }
        } elseif (Route::currentRouteName() == 'all_orders.index' && Auth::user()->can('view_all_orders')) {
            if (get_setting('vendor_system_activation') != 1) {
                $ordersQuery->where('orders.seller_id', '=', $admin_user_id);
            }
        } elseif (Route::currentRouteName() == 'offline_payment_orders.index' && Auth::user()->can('view_all_offline_payment_orders')) {
            $ordersQuery->where('orders.manual_payment', 1);
            if ($request->order_type != null) {
                $order_type = $request->order_type;
                $ordersQuery = $order_type == 'inhouse_orders'
                    ? $ordersQuery->where('orders.seller_id', '=', $admin_user_id)
                    : $ordersQuery->where('orders.seller_id', '!=', $admin_user_id);
            }
        } elseif (Route::currentRouteName() == 'unpaid_orders.index' && Auth::user()->can('view_all_unpaid_orders')) {
            $ordersQuery->where('orders.payment_status', 'unpaid');
        } else {
            abort(403);
        }

        // --- filters ---
        if ($request->search) {
            $sort_search = $request->search;
            $ordersQuery->where('code', 'like', '%' . $sort_search . '%');
        }
        if ($request->payment_status) {
            $payment_status = $request->payment_status;
            $ordersQuery->where('payment_status', $payment_status);
        }
        if ($request->delivery_status) {
            $delivery_status = $request->delivery_status;
            $ordersQuery->where('delivery_status', $delivery_status);
        }
        if ($date) {
            $ordersQuery->where('created_at', '>=', date('Y-m-d 00:00:00', strtotime(explode(" to ", $date)[0])))
                        ->where('created_at', '<=', date('Y-m-d 23:59:59', strtotime(explode(" to ", $date)[1])));
        }

        // ✅ Summary before paginate
        $total_orders = $ordersQuery->count();
        $total_amount = $ordersQuery->sum('grand_total');

        // ✅ Paginate AFTER summary
        $orders = $ordersQuery->paginate(15);

        $unpaid_order_payment_notification = get_notification_type('complete_unpaid_order_payment', 'type');

        return view('backend.sales.index', compact(
            'orders', 'sort_search', 'order_type', 'payment_status',
            'delivery_status', 'date', 'unpaid_order_payment_notification',
            'total_orders', 'total_amount'
        ));
    }


    public function show($id)
    {
        $order = Order::findOrFail(decrypt($id));

        $order_shipping_address = json_decode($order->shipping_address);
        $delivery_boys = User::where('city', $order_shipping_address->city)
            ->where('user_type', 'delivery_boy')
            ->get();

        if (env('DEMO_MODE') != 'On') {
            $order->viewed = 1;
            $order->save();
        }

        return view('backend.sales.show', compact('order', 'delivery_boys'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (!session()->has('shipping_cost') || session('shipping_cost') <= 0) {
            flash(translate('Please select a shipping method before placing your order'))->error();
            return redirect()->route('cart');
        }

        $carts = Cart::where('user_id', Auth::user()->id)->active()->get();

        if ($carts->isEmpty()) {
            flash(translate('Your cart is empty'))->warning();
            return redirect()->route('home');
        }

        $address = Address::where('id', $carts[0]['address_id'])->first();

        $shippingAddress = [];
        if ($address != null) {
            $shippingAddress['name']        = Auth::user()->name;
            $shippingAddress['email']       = Auth::user()->email;
            $shippingAddress['address']     = $address->address;
            $shippingAddress['country']     = $address->country->name;
            $shippingAddress['state']       = $address->state->name;
            $shippingAddress['city']        = $address->city->name;
            $shippingAddress['postal_code'] = $address->postal_code;
            $shippingAddress['phone']       = $address->phone;
            if ($address->latitude || $address->longitude) {
                $shippingAddress['lat_lang'] = $address->latitude . ',' . $address->longitude;
            }
        }

        $combined_order = new CombinedOrder;
        $combined_order->user_id = Auth::user()->id;
        $combined_order->shipping_address = json_encode($shippingAddress);
        $combined_order->save();

        $seller_products = array();
        foreach ($carts as $cartItem) {
            $product_ids = array();
            $product = Product::find($cartItem['product_id']);
            if (isset($seller_products[$product->user_id])) {
                $product_ids = $seller_products[$product->user_id];
            }
            array_push($product_ids, $cartItem);
            $seller_products[$product->user_id] = $product_ids;
        }

        foreach ($seller_products as $seller_product) {
            $order = new Order;
            $order->combined_order_id = $combined_order->id;
            $order->user_id = Auth::user()->id;
            $order->shipping_address = $combined_order->shipping_address;
            $order->additional_info = $request->additional_info;
            $order->payment_type = $request->payment_option;
            $order->delivery_viewed = '0';
            $order->payment_status_viewed = '0';
            $order->code = date('Ymd-His') . rand(10, 99);
            $order->date = strtotime('now');
            $order->save();

            $subtotal = 0;
            $tax = 0;
            $shipping = 0;
            $coupon_discount = 0;

            //Order Details Storing
            foreach ($seller_product as $cartItem) {
                $product = Product::find($cartItem['product_id']);
                $subtotal += cart_product_price($cartItem, $product, false, false) * $cartItem['quantity'];
                $tax +=  cart_product_tax($cartItem, $product, false) * $cartItem['quantity'];
                $coupon_discount += $cartItem['discount'];

                $product_variation = $cartItem['variation'];

                $product_stock = find_product_stock_by_variant($product, $product_variation, empty($product_variation));
                if ($product->digital != 1 && (!$product_stock || $cartItem['quantity'] > $product_stock->qty)) {
                    $order->delete();
                    throw new \Exception('The requested quantity is not available for ' . $product->getTranslation('name'));
                } elseif ($product->digital != 1) {
                    $product_stock->qty -= $cartItem['quantity'];
                    $product_stock->save();
                }

                $order_detail = new OrderDetail;
                $order_detail->order_id = $order->id;
                $order_detail->seller_id = $product->user_id;
                $order_detail->product_id = $product->id;
                $order_detail->variation = $product_variation;
                $order_detail->price = cart_product_price($cartItem, $product, false, false);
                $order_detail->tax = cart_product_tax($cartItem, $product, false);
                $order_detail->shipping_type = $cartItem['shipping_type'];
                $order_detail->product_referral_code = $cartItem['product_referral_code'];
                $order_detail->shipping_cost = session('shipping_cost', 0) / count($carts);

                $shipping += $order_detail->shipping_cost;
                //End of storing shipping cost

                $order_detail->quantity = $cartItem['quantity'];

                if (addon_is_activated('club_point')) {
                    $order_detail->earn_point = $product->earn_point;
                }

                $order_detail->save();

                $product->num_of_sale += $cartItem['quantity'];
                $product->save();

                $order->seller_id = $product->user_id;
                $order->shipping_type = $cartItem['shipping_type'];

                if ($cartItem['shipping_type'] == 'pickup_point') {
                    $order->pickup_point_id = $cartItem['pickup_point'];
                }
                if ($cartItem['shipping_type'] == 'carrier') {
                    $order->carrier_id = $cartItem['carrier_id'];
                }

                if ($product->added_by == 'seller' && $product->user->seller != null) {
                    $seller = $product->user->seller;
                    $seller->num_of_sale += $cartItem['quantity'];
                    $seller->save();
                }

                if (addon_is_activated('affiliate_system')) {
                    if ($order_detail->product_referral_code) {
                        $referred_by_user = User::where('referral_code', $order_detail->product_referral_code)->first();

                        $affiliateController = new AffiliateController;
                        $affiliateController->processAffiliateStats($referred_by_user->id, 0, $order_detail->quantity, 0, 0);
                    }
                }
            }

            $order->grand_total = $subtotal + $tax + $shipping;

            if ($seller_product[0]->coupon_code != null) {
                $order->coupon_discount = $coupon_discount;
                $order->grand_total -= $coupon_discount;

                $coupon_usage = new CouponUsage;
                $coupon_usage->user_id = Auth::user()->id;
                $coupon_usage->coupon_id = Coupon::where('code', $seller_product[0]->coupon_code)->first()->id;
                $coupon_usage->save();
            }

            $combined_order->grand_total += $order->grand_total;

            $order->save();
        }

        $combined_order->save();

        $request->session()->put('combined_order_id', $combined_order->id);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */


    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $order = Order::findOrFail($id);
        if ($order != null) {
            $order->commissionHistory()->delete();
            foreach ($order->orderDetails as $key => $orderDetail) {
                try {
                    product_restock($orderDetail);
                } catch (\Exception $e) {
                }

                $orderDetail->delete();
            }
            $order->delete();
            flash(translate('Order has been deleted successfully'))->success();
        } else {
            flash(translate('Something went wrong'))->error();
        }
        return back();
    }

    public function bulk_order_delete(Request $request)
    {
        if ($request->id) {
            foreach ($request->id as $order_id) {
                $this->destroy($order_id);
            }
        }

        return 1;
    }

    public function order_details(Request $request)
    {
        $order = Order::findOrFail($request->order_id);
        $order->save();
        return view('seller.order_details_seller', compact('order'));
    }

    public function update_delivery_status(Request $request)
    {
        $order = Order::findOrFail($request->order_id);
        $previousOrderStatus = $order->delivery_status;

        // Store remarks if provided and status is cancelled
        if ($request->status == 'cancelled' && $request->remarks) {
            $order->remarks = $request->remarks;
        }

        $orderDetails = Auth::user()->user_type == 'seller'
            ? $order->orderDetails->where('seller_id', Auth::user()->id)
            : $order->orderDetails;

        foreach ($orderDetails as $orderDetail) {
            if ($orderDetail->delivery_status == 'cancelled' && $request->status != 'cancelled') {
                $variant = $orderDetail->variation ?? '';
                $productStock = \App\Models\ProductStock::where('product_id', $orderDetail->product_id)
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

            if ($previousOrderStatus != 'cancelled' && $request->status == 'cancelled' && $order->user->user_type == 'seller' && $order->payment_status == 'paid' && $order->commission_calculated == 1 && $order->commissionHistory && $order->shop) {
                $sellerEarning = $order->commissionHistory->seller_earning;
                $shop = $order->shop;
                $shop->admin_to_pay -= $sellerEarning;
                $shop->save();
            }

            if ($previousOrderStatus == 'cancelled' && $request->status != 'cancelled' && $order->user->user_type == 'seller' && $order->payment_status == 'paid' && $order->commission_calculated == 1 && $order->commissionHistory && $order->shop) {
                $sellerEarning = $order->commissionHistory->seller_earning;
                $shop = $order->shop;
                $shop->admin_to_pay += $sellerEarning;
                $shop->save();
            }

            $order->save();

            foreach ($orderDetails as $orderDetail) {
                $previousOrderDetailStatus = $orderDetail->delivery_status;

                if ($previousOrderDetailStatus != 'cancelled' && $request->status == 'cancelled') {
                    product_restock($orderDetail);
                }

                if ($previousOrderDetailStatus == 'cancelled' && $request->status != 'cancelled') {
                    $variant = $orderDetail->variation ?? '';
                    $productStock = \App\Models\ProductStock::where('product_id', $orderDetail->product_id)
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

                if (addon_is_activated('affiliate_system') && $orderDetail->product_referral_code) {
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
            } catch (\Exception $e) {
            }
        }

        //Send web Notifications to user
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
            if (Auth::user()->user_type == 'delivery_boy') {
                $deliveryBoyController = new DeliveryBoyController;
                $deliveryBoyController->store_delivery_history($order);
            }
        }

       return response()->json([
            'success' => true,
            'message' => $request->status == 'cancelled' ? 'Order cancelled successfully' : 'Delivery status updated'
        ]);

    }

    public function update_tracking_code(Request $request)
    {
        $order = Order::findOrFail($request->order_id);
        $order->tracking_code = $request->tracking_code;
        $order->save();

        return 1;
    }

    public function update_shipping_cost(Request $request)
    {
        $order = Order::findOrFail($request->order_id);
        $new_total_shipping = $request->shipping_cost;
        $current_total_shipping = $order->orderDetails->sum('shipping_cost');
        $details_count = $order->orderDetails->count();

        if ($current_total_shipping > 0) {
            $ratio = $new_total_shipping / $current_total_shipping;
            foreach ($order->orderDetails as $orderDetail) {
                $orderDetail->shipping_cost = $orderDetail->shipping_cost * $ratio;
                $orderDetail->save();
            }
        } else {
            // If current is 0, distribute equally
            $equal_shipping = $new_total_shipping / $details_count;
            foreach ($order->orderDetails as $orderDetail) {
                $orderDetail->shipping_cost = $equal_shipping;
                $orderDetail->save();
            }
        }

        return response()->json(['success' => true]);
    }

    public function update_payment_status(Request $request)
    {
        $order = Order::findOrFail($request->order_id);
        $order->payment_status_viewed = '0';
        $order->save();

        if (Auth::user()->user_type == 'seller') {
            foreach ($order->orderDetails->where('seller_id', Auth::user()->id) as $key => $orderDetail) {
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


        if (
            $order->payment_status == 'paid' &&
            $order->commission_calculated == 0
        ) {
            calculateCommissionAffilationClubPoint($order);
        }

        // Payment Status change email notification to Admin, seller, Customer
        if ($request->status == 'paid') {
            EmailUtility::order_email($order, $request->status);
        }

        //Sends Web Notifications to Admin, seller, Customer
        NotificationUtility::sendNotification($order, $request->status);

        //Sends Firebase Notifications to Admin, seller, Customer
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

    public function assign_delivery_boy(Request $request)
    {
        if (addon_is_activated('delivery_boy')) {

            $order = Order::findOrFail($request->order_id);
            $order->assign_delivery_boy = $request->delivery_boy;
            $order->delivery_history_date = date("Y-m-d H:i:s");
            $order->save();

            $delivery_history = \App\Models\DeliveryHistory::where('order_id', $order->id)
                ->where('delivery_status', $order->delivery_status)
                ->first();

            if (empty($delivery_history)) {
                $delivery_history = new \App\Models\DeliveryHistory;

                $delivery_history->order_id = $order->id;
                $delivery_history->delivery_status = $order->delivery_status;
                $delivery_history->payment_type = $order->payment_type;
            }
            $delivery_history->delivery_boy_id = $request->delivery_boy;

            $delivery_history->save();

            if (env('MAIL_USERNAME') != null && get_setting('delivery_boy_mail_notification') == '1') {
                $array['view'] = 'emails.invoice';
                $array['subject'] = translate('You are assigned to delivery an order. Order code') . ' - ' . $order->code;
                $array['from'] = env('MAIL_FROM_ADDRESS');
                $array['order'] = $order;

                try {
                    Mail::to($order->delivery_boy->email)->queue(new InvoiceEmailManager($array));
                } catch (\Exception $e) {
                }
            }

            if (addon_is_activated('otp_system') && SmsTemplate::where('identifier', 'assign_delivery_boy')->first()->status == 1) {
                try {
                    SmsUtility::assign_delivery_boy($order->delivery_boy->phone, $order->code);
                } catch (\Exception $e) {
                }
            }
        }

        return 1;
    }

    public function orderBulkExport(Request $request)
    {
        if ($request->id) {
            return Excel::download(new OrdersExport($request->id), 'orders.xlsx');
        }
        return back();
    }

    public function unpaid_order_payment_notification_send(Request $request)
    {
        if ($request->order_ids != null) {
            $notificationType = get_notification_type('complete_unpaid_order_payment', 'type');
            foreach (explode(",", $request->order_ids) as $order_id) {
                $order = Order::where('id', $order_id)->first();
                $user = $order->user;
                if ($notificationType->status == 1 && $order->payment_status == 'unpaid') {
                    $order_notification['order_id']     = $order->id;
                    $order_notification['order_code']   = $order->code;
                    $order_notification['user_id']      = $order->user_id;
                    $order_notification['seller_id']    = $order->seller_id;
                    $order_notification['status']       = $order->payment_status;
                    $order_notification['notification_type_id'] = $notificationType->id;
                    Notification::send($user, new OrderNotification($order_notification));
                }
            }
            flash(translate('Notification Sent Successfully.'))->success();
        } else {
            flash(translate('Something went wrong!.'))->warning();
        }
        return back();
    }







    //wrtie new method meherab
    public function updateQuantity(Request $request)
    {
        $orderDetail = OrderDetail::find($request->order_id);

        if (!$orderDetail) {
            return response()->json(['success' => false, 'message' => 'Order detail not found.']);
        }

        // --- FIX START ---

        // Get original values BEFORE we change them
        $original_quantity = $orderDetail->getOriginal('quantity');
        $original_tax = $orderDetail->getOriginal('tax');

        // Update the quantity from the request
        $orderDetail->quantity = $request->quantity;

        // Recalculate tax for THIS LINE ITEM (assuming tax IS proportional)
        if ($original_quantity > 0) {
            $tax_per_unit = $original_tax / $original_quantity;
            $orderDetail->tax = $tax_per_unit * $orderDetail->quantity;
        } else {
            $orderDetail->tax = 0;
        }

        // DO NOT TOUCH SHIPPING on the line item.
        // $orderDetail->shipping_cost = ... (We remove this)

        $orderDetail->save();

        // --- FIX END ---


        // Now, recalculate totals for the ENTIRE order
        $order = $orderDetail->order;
        $order->load('orderDetails'); // Refresh the relationship

        // 1. Correct Subtotal (Price * Quantity)
        $subTotal = $order->orderDetails->sum(function ($detail) {
            return $detail->price * $detail->quantity;
        });

        // 2. Correct Tax (Sum of updated line item taxes)
        $tax = $order->orderDetails->sum('tax');

        // 3. Correct Shipping (The static value from the order)
        $shipping = $order->shipping_cost;

        // 4. Coupon
        $couponDiscount = $order->coupon_discount;

        // Calculate the new, correct grand total
        $grandTotal = $subTotal + $tax + $shipping - $couponDiscount;

        // Update the order's grand total in the database
        $order->grand_total = $grandTotal;
        $order->save();

        // Format for the JSON response
        $formatted_subTotal = single_price($subTotal);
        $formatted_tax = single_price($tax);
        $formatted_shipping = single_price($shipping); // Send back the static shipping
        $formatted_coupon = single_price($couponDiscount);
        $formatted_grandTotal = single_price($grandTotal);

        // Return the new totals
        return response()->json([
            'success' => true,
            'price' => single_price($orderDetail->price),
            'total' => single_price($orderDetail->price * $request->quantity),
            'order' => [
                'sub_total' => $formatted_subTotal,
                'tax' => $formatted_tax,
                'shipping' => $formatted_shipping,
                'coupon_discount' => $formatted_coupon,
                'grand_total' => $formatted_grandTotal,
            ],
        ]);
    }

    public function updateRemarks(Request $request, $id)
    {
        $request->validate([
            'remarks' => 'nullable|string|max:1000',
        ]);

        $order = Order::find($id);

        if (!$order) {
            return response()->json([
                'success' => false,
                'message' => 'Order not found.',
            ], 404);
        }

        $order->remarks = $request->remarks;
        $order->save();

        return response()->json([
            'success' => true,
            'message' => 'Remarks updated successfully.',
            'remarks' => $order->remarks,
        ]);
    }

    public function deleteProduct(Request $request)
    {
        $orderDetail = OrderDetail::findOrFail($request->order_id);
        $order = $orderDetail->order;

        // Get the original total shipping cost from DB before deleting
        $originalTotalShipping = OrderDetail::where('order_id', $order->id)->sum('shipping_cost');

        // Delete the order detail
        $orderDetail->delete();

        // Count remaining items
        $remainingItemsCount = OrderDetail::where('order_id', $order->id)->count();

        // Redistribute shipping cost evenly among remaining items
        if ($remainingItemsCount > 0) {
            $perItemShipping = $originalTotalShipping / $remainingItemsCount;

            OrderDetail::where('order_id', $order->id)
                ->update(['shipping_cost' => $perItemShipping]);
        }

        // Recalculate totals
        $subTotal = OrderDetail::where('order_id', $order->id)->sum(DB::raw('price * quantity'));
        $tax = OrderDetail::where('order_id', $order->id)->sum('tax');
        $shipping = OrderDetail::where('order_id', $order->id)->sum('shipping_cost');
        $couponDiscount = $order->coupon_discount ?? 0;
        $grandTotal = $subTotal + $tax + $shipping - $couponDiscount;

        $order->grand_total = $grandTotal;
        $order->save();

        return response()->json([
            'success' => true,
            'order' => [
                'sub_total' => $subTotal,
                'tax' => $tax,
                'shipping' => $shipping,
                'coupon_discount' => $couponDiscount,
                'grand_total' => $grandTotal,
            ]
        ]);
    }



    public function productsSearch(Request $request)
    {
        $query = $request->input('query');

        // Fetch products with name or SKU matching the query
        $products = \DB::table('products')
            ->leftJoin('product_stocks', 'products.id', '=', 'product_stocks.product_id')
            ->select(
                'products.id',
                'products.name',
                'products.unit_price',
                'products.discount',
                'products.discount_type',
                'products.thumbnail_img',
                'products.cash_on_delivery',
                'product_stocks.sku'
            )
            ->where(function ($q) use ($query) {
                $q->where('products.name', 'LIKE', "%{$query}%")
                  ->orWhere('product_stocks.sku', 'LIKE', "%{$query}%");
            })
            ->get()
            ->map(function ($product) {
                // Initialize discounted price
                $discountedPrice = $product->unit_price;

                // Calculate discounted price based on discount type
                if ($product->discount) {
                    if ($product->discount_type == 'percent') {
                        $discountedPrice = $product->unit_price - ($product->unit_price * $product->discount / 100);
                    } elseif ($product->discount_type == 'amount') {
                        $discountedPrice = $product->unit_price - $product->discount;
                    }
                }

                // Return product data including discounted price
                return [
                    'id' => $product->id,
                    'name' => $product->name,
                    'sku' => $product->sku,
                    'price' => $product->unit_price,
                    'discount' => $product->discount,
                    'discount_type' => $product->discount_type,
                    'discounted_price' => number_format($discountedPrice, 2),
                    'thumbnail_img' => $product->thumbnail_img,
                    'cash_on_delivery' => $product->cash_on_delivery,
                ];
            });

        return response()->json($products);
    }

    public function save_product(Request $request)
    {
        $orderId = $request->order_id;
        $productId = $request->product_id;

        // Retrieve the existing order detail (if it exists)
        $existingOrderDetail = OrderDetail::where('order_id', $orderId)
                                          ->where('product_id', $productId)
                                          ->first();

        if ($existingOrderDetail) {
            // Update the quantity if the product already exists in the order
            $existingOrderDetail->quantity += 1; // Increment quantity

            // Recalculate price based on the discount
            $product = Product::find($productId);
            if ($product) {
                $discountedPrice = 0;

                // Check the discount type (percent or amount)
                if ($product->discount_type == 'percent') {
                    // Discount is a percentage
                    $discountedPrice = $product->discount
                        ? $product->unit_price - ($product->unit_price * $product->discount / 100)
                        : $product->unit_price;
                } elseif ($product->discount_type == 'amount') {
                    // Discount is a fixed amount
                    $discountedPrice = $product->discount
                        ? $product->unit_price - $product->discount
                        : $product->unit_price;
                }

                // Update price with the discounted price
                $existingOrderDetail->price = $discountedPrice;
            }

            $existingOrderDetail->save();
        } else {
            // Retrieve order or related data for shipping cost and seller id
            $order = Order::find($orderId);
            $product = Product::find($productId);

            if (!$order || !$product) {
                return response()->json(['success' => false, 'message' => 'Order or product not found.']);
            }

            // Calculate the discounted price
            $discountedPrice = 0;

            if ($product->discount_type == 'percent') {
                // Discount is a percentage
                $discountedPrice = $product->discount
                    ? $product->unit_price - ($product->unit_price * $product->discount / 100)
                    : $product->unit_price;
            } elseif ($product->discount_type == 'amount') {
                // Discount is a fixed amount
                $discountedPrice = $product->discount
                    ? $product->unit_price - $product->discount
                    : $product->unit_price;
            }

            // Create a new order detail for a new product
            $orderDetails = new OrderDetail();
            $orderDetails->order_id = $orderId;
            $orderDetails->product_id = $productId;
            $orderDetails->price = $discountedPrice; // Save the discounted price
            $shipping = $order->shipping_cost;
            // $orderDetails->shipping_cost = $product->shipping_cost ?? 0;
            $orderDetails->quantity = 1; // Default quantity for a new product
            $orderDetails->payment_status = "unpaid";
            $orderDetails->delivery_status = "pending";
            $orderDetails->seller_id = $product->seller_id ?? null; // Assume product has seller_id
            $orderDetails->save();
        }

        // Retrieve the order and recalculate totals
        $order = Order::find($orderId);
        if (!$order) {
            return response()->json(['success' => false, 'message' => 'Order not found.']);
        }

        $subTotal = $order->orderDetails->sum(function ($detail) {
            return $detail->price * $detail->quantity;
        });

        $shipping = $order->shipping_cost;
        // $shipping = $order->orderDetails->sum('shipping_cost');
        $tax = $order->orderDetails->sum('tax');
        $couponDiscount = $order->coupon_discount ?? 0;
        $grandTotal = $subTotal + $tax + $shipping - $couponDiscount;

        // Update the order's grand total in the database
        $order->grand_total = $grandTotal;
        $order->save();

        return response()->json(['success' => true, 'message' => 'Product saved successfully.', 'grand_total' => $grandTotal]);
    }

public function export_filtered(Request $request)
{
    $query = Order::select([
        'id', 'code', 'grand_total', 'payment_status', 'delivery_status', 'created_at'
    ]);

    if ($request->search) {
        $query->where('code', 'like', '%' . $request->search . '%');
    }
    if ($request->payment_status) {
        $query->where('payment_status', $request->payment_status);
    }
    if ($request->delivery_status) {
        $query->where('delivery_status', $request->delivery_status);
    }
    if ($request->date) {
        $dates = explode(" to ", $request->date);
        $query->whereBetween('created_at', [
            date('Y-m-d 00:00:00', strtotime($dates[0])),
            date('Y-m-d 23:59:59', strtotime($dates[1]))
        ]);
    }

    $orders = $query->orderBy('id', 'desc')->get();
    $fileName = 'OrganicLalteerOrderReport_' . Carbon::now()->format('Y-m-d_H-i-s') . '.xlsx';

    return \Excel::download(
        new \App\Exports\OrderExport(
            $orders,
            [
                'search' => $request->search ?? 'All',
                'payment_status' => $request->payment_status ?? 'All',
                'delivery_status' => $request->delivery_status ?? 'All',
                'date' => $request->date ?? 'All'
            ]
        ),
        $fileName
    );
}





}

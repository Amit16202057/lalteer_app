<?php

namespace App\Http\Controllers;

use Auth;
use Cookie;
use Session;
use App\Models\Cart;
use App\Models\Address;
use App\Models\Carrier;
use App\Models\Country;
use App\Models\Product;
use App\Models\Category;
use App\Utility\CartUtility;
use Illuminate\Http\Request;
use App\Models\BusinessSetting;

class CartController extends Controller
{
    public function index(Request $request)
    {
        if (auth()->user() != null) {
            $user_id = Auth::user()->id;
            if ($request->session()->get('temp_user_id')) {
                Cart::where('temp_user_id', $request->session()->get('temp_user_id'))
                    ->update(
                        [
                            'user_id' => $user_id,
                            'temp_user_id' => null
                        ]
                    );

                Session::forget('temp_user_id');
            }
            $carts = Cart::where('user_id', $user_id)->get();

            // Remove cart items with deleted products
            $invalidCarts = $carts->filter(function($cart) {
                return $cart->product == null;
            });

            if ($invalidCarts->count() > 0) {
                $invalidCarts->each(function($cart) {
                    $cart->delete();
                });
                flash(translate('Some unavailable products have been removed from your cart'))->info();
            }

            $carts = Cart::where('user_id', $user_id)->whereHas('product')->with('product')->get();
        } else {
            $temp_user_id = $request->session()->get('temp_user_id');
            $carts = ($temp_user_id != null) ? Cart::where('temp_user_id', $temp_user_id)->get() : [];

            if (count($carts) > 0) {
                // Remove cart items with deleted products
                $invalidCarts = $carts->filter(function($cart) {
                    return $cart->product == null;
                });

                if ($invalidCarts->count() > 0) {
                    $invalidCarts->each(function($cart) {
                        $cart->delete();
                    });
                    flash(translate('Some unavailable products have been removed from your cart'))->info();
                }

                $carts = Cart::where('temp_user_id', $temp_user_id)->whereHas('product')->with('product')->get();
            }
        }
        if (count($carts) > 0) {
            $carts->toQuery()->update(['shipping_cost' => 0]);
            $carts = $carts->fresh();
        }

        return view('frontend.view_cart', compact('carts'));
    }

    public function showCartModal(Request $request)
    {
        $product = Product::find($request->id);
        return view('frontend.partials.cart.addToCart', compact('product'));
    }

    public function showCartModalAuction(Request $request)
    {
        $product = Product::find($request->id);
        return view('auction.frontend.addToCartAuction', compact('product'));
    }

    public function addToCart(Request $request)
    {
        $authUser = auth()->user();
        if ($authUser != null) {
            $user_id = $authUser->id;
            $data['user_id'] = $user_id;
            $carts = Cart::where('user_id', $user_id)->get();
        } else {
            if ($request->session()->get('temp_user_id')) {
                $temp_user_id = $request->session()->get('temp_user_id');
            } else {
                $temp_user_id = bin2hex(random_bytes(10));
                $request->session()->put('temp_user_id', $temp_user_id);
            }
            $data['temp_user_id'] = $temp_user_id;
            $carts = Cart::where('temp_user_id', $temp_user_id)->get();
        }

        $check_auction_in_cart = CartUtility::check_auction_in_cart($carts);
        $product = Product::find($request->id);
        $carts = array();

        if ($check_auction_in_cart && $product->auction_product == 0) {
            return array(
                'status' => 0,
                'cart_count' => count($carts),
                'modal_view' => view('frontend.partials.cart.removeAuctionProductFromCart')->render(),
                'nav_cart_view' => view('frontend.partials.cart.cart_dropdown_content')->render(),
            );
        }

        $quantity = $request['quantity'];

        if ($quantity < $product->min_qty) {
            return array(
                'status' => 0,
                'cart_count' => count($carts),
                'modal_view' => view('frontend.partials.minQtyNotSatisfied', ['min_qty' => $product->min_qty])->render(),
                'nav_cart_view' => view('frontend.partials.cart.cart_dropdown_content')->render(),
            );
        }

        //check the color enabled or disabled for the product
        $str = CartUtility::create_cart_variant($product, $request->all());
        $product_stock = find_product_stock_by_variant($product, $str, empty($str));

        if ($product->variant_product && !empty($str) && $product_stock == null) {
            return array(
                'status' => 0,
                'cart_count' => count($carts),
                'modal_view' => view('frontend.partials.outOfStockCart')->render(),
                'nav_cart_view' => view('frontend.partials.cart.cart_dropdown_content')->render(),
            );
        }

        if ($authUser != null) {
            $user_id = $authUser->id;
            $cart = Cart::firstOrNew([
                'variation' => $str,
                'user_id' => $user_id,
                'product_id' => $request['id']
            ]);
        } else {
            $temp_user_id = $request->session()->get('temp_user_id');
            $cart = Cart::firstOrNew([
                'variation' => $str,
                'temp_user_id' => $temp_user_id,
                'product_id' => $request['id']
            ]);
        }

        if ($cart->exists && $product->digital == 0) {
            if ($product->auction_product == 1 && ($cart->product_id == $product->id)) {
                return array(
                    'status' => 0,
                    'cart_count' => count($carts),
                    'modal_view' => view('frontend.partials.cart.auctionProductAlredayAddedCart')->render(),
                    'nav_cart_view' => view('frontend.partials.cart.cart_dropdown_content')->render(),
                );
            }
            // Check stock quantity only if product_stock exists
            if ($product_stock != null && $product_stock->qty < $cart->quantity + $request['quantity']) {
                return array(
                    'status' => 0,
                    'cart_count' => count($carts),
                    'modal_view' => view('frontend.partials.outOfStockCart')->render(),
                    'nav_cart_view' => view('frontend.partials.cart.cart_dropdown_content')->render(),
                );
            }
            $quantity = $cart->quantity + $request['quantity'];
        }

        $price = CartUtility::get_price($product, $product_stock, $request->quantity);
        $tax = CartUtility::tax_calculation($product, $price);

        CartUtility::save_cart_data($cart, $product, $price, $tax, $quantity);

        if ($authUser != null) {
            $user_id = $authUser->id;
            $carts = Cart::where('user_id', $user_id)->get();
        } else {
            $temp_user_id = $request->session()->get('temp_user_id');
            $carts = Cart::where('temp_user_id', $temp_user_id)->get();
        }

        return array(
            'status' => 1,
            'cart_count' => count($carts),
            'modal_view' => view('frontend.partials.cart.addedToCart', compact('product', 'cart'))->render(),
            'nav_cart_view' => view('frontend.partials.cart.cart_dropdown_content')->render(),
        );
    }

    //removes from Cart
    public function removeFromCart(Request $request)
    {
        Cart::destroy($request->id);
        $authUser = auth()->user();
        if ($authUser != null) {
            $user_id = $authUser->id;
            $carts = Cart::where('user_id', $user_id)->get();
        } else {
            $temp_user_id = $request->session()->get('temp_user_id');
            $carts = Cart::where('temp_user_id', $temp_user_id)->get();
        }

        return array(
            'cart_count' => count($carts),
            'cart_view' => view('frontend.partials.cart.cart_details', compact('carts'))->render(),
            'nav_cart_view' => view('frontend.partials.cart.cart_dropdown_content')->render(),
        );
    }

    //updated the quantity for a cart item
    public function updateQuantity(Request $request)
    {
        $cartItem = Cart::findOrFail($request->id);

        if ($cartItem['id'] == $request->id) {
            $product = Product::find($cartItem['product_id']);

            // Check if product exists
            if ($product == null) {
                // Product no longer exists, remove cart item
                $cartItem->delete();
            } else {
                $allowDefaultFallback = empty($cartItem['variation']);
                $product_stock = find_product_stock_by_variant($product, $cartItem['variation'], $allowDefaultFallback);

                // If we still don't have product_stock, use product defaults
                if ($product_stock == null) {
                    // Use product unit_price and current_stock as fallback
                    $quantity = $product->current_stock ?? 0;
                    $price = $product->unit_price ?? 0;
                } else {
                    $quantity = $product_stock->qty;
                    $price = $product_stock->price;
                }

                //discount calculation
                $discount_applicable = false;

                if ($product->discount_start_date == null) {
                    $discount_applicable = true;
                } elseif (
                    strtotime(date('d-m-Y H:i:s')) >= $product->discount_start_date &&
                    strtotime(date('d-m-Y H:i:s')) <= $product->discount_end_date
                ) {
                    $discount_applicable = true;
                }

                if ($discount_applicable) {
                    if ($product->discount_type == 'percent') {
                        $price -= ($price * min(100, $product->discount)) / 100;
                    } elseif ($product->discount_type == 'amount') {
                        $price -= min($price, $product->discount);
                    }
                }

                // For digital products, skip stock quantity check
                if ($product->digital == 0 && $quantity >= $request->quantity) {
                    if ($request->quantity >= $product->min_qty) {
                        $cartItem['quantity'] = $request->quantity;
                    }
                } elseif ($product->digital == 1) {
                    // For digital products, only check min_qty
                    if ($request->quantity >= $product->min_qty) {
                        $cartItem['quantity'] = $request->quantity;
                    }
                }

                if ($product->wholesale_product && $product_stock != null) {
                    $wholesalePrice = $product_stock->wholesalePrices->where('min_qty', '<=', $request->quantity)->where('max_qty', '>=', $request->quantity)->first();
                    if ($wholesalePrice) {
                        $price = $wholesalePrice->price;
                    }
                }

                $price = max(0, $price);
                $cartItem['price'] = $price;
                $cartItem->save();
            }
        }

        if (auth()->user() != null) {
            $user_id = Auth::user()->id;
            $carts = Cart::where('user_id', $user_id)->get();
        } else {
            $temp_user_id = $request->session()->get('temp_user_id');
            $carts = Cart::where('temp_user_id', $temp_user_id)->get();
        }

        return array(
            'cart_count' => count($carts),
            'cart_view' => view('frontend.partials.cart.cart_details', compact('carts'))->render(),
            'nav_cart_view' => view('frontend.partials.cart.cart_dropdown_content')->render(),
        );
    }

    public function updateCartStatus(Request $request)
    {
        $product_ids = $request->product_id;

        if (auth()->user() != null) {
            $user_id = Auth::user()->id;
            $carts = Cart::where('user_id', $user_id)->get();
        } else {
            $temp_user_id = $request->session()->get('temp_user_id');
            $carts = Cart::where('temp_user_id', $temp_user_id)->get();
        }

        $coupon_applied = $carts->toQuery()->where('coupon_applied', 1)->first();
        if ($coupon_applied != null) {
            $owner_id = $coupon_applied->owner_id;
            $coupon_code = $coupon_applied->coupon_code;
            $user_carts = $carts->toQuery()->where('owner_id', $owner_id)->get();
            $coupon_discount = $user_carts->toQuery()->sum('discount');
            $user_carts->toQuery()->update(
                [
                    'discount' => 0.00,
                    'coupon_code' => '',
                    'coupon_applied' => 0
                ]
            );
        }

        $carts->toQuery()->update(['status' => 0]);
        if ($product_ids != null) {
            if ($coupon_applied != null) {
                $active_user_carts = $user_carts->toQuery()->whereIn('product_id', $product_ids)->get();
                if (count($active_user_carts) > 0) {
                    $active_user_carts->toQuery()->update(
                        [
                            'discount' => $coupon_discount / count($active_user_carts),
                            'coupon_code' => $coupon_code,
                            'coupon_applied' => 1
                        ]
                    );
                }
            }

            $carts->toQuery()->whereIn('product_id', $product_ids)->update(['status' => 1]);
        }
        $carts = $carts->fresh();

        return view('frontend.partials.cart.cart_details', compact('carts'))->render();
    }


    // public function updateShipping(Request $request)
    // {
    //     // Get the new location from the request
    //     $location = $request->input('location');

    //     // Assuming you have the shipping cost values stored
    //     if ($location == 'inside_dhaka') {
    //         $shipping_cost = (int) \App\Models\BusinessSetting::where('type', 'flat_rate_shipping_cost')->value('value');
    //     } elseif ($location == 'outside_dhaka') {
    //         $shipping_cost = (int) \App\Models\BusinessSetting::where('type', 'shipping_cost_admin')->value('value');
    //     } else {
    //         return response()->json(['success' => false, 'message' => 'Invalid location']);
    //     }

    //     // Store the shipping cost in session
    //     session(['shipping_cost' => $shipping_cost]);

    //     return response()->json(['success' => true, 'shipping_cost' => $shipping_cost]);
    // }
    public function updateShipping(Request $request)
    {
        $location = $request->input('location');

        if ($location == 'inside_dhaka') {
            $shipping_cost = (int) BusinessSetting::where('type', 'flat_rate_shipping_cost')->value('value');
        } elseif ($location == 'outside_dhaka') {
            $shipping_cost = (int) BusinessSetting::where('type', 'shipping_cost_admin')->value('value');
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Please select a valid location'
            ], 400);
        }

        // Save shipping cost in session
        session([
            'shipping_cost' => $shipping_cost,
            'shipping_location' => $location,
            'shipping_session_id' => session()->getId()
        ]);

        // Example: recalc total from cart/session
        $cart_total = session('cart_total', 0);
        $grand_total = $cart_total + $shipping_cost;

        return response()->json([
            'success' => true,
            'shipping_cost' => $shipping_cost,
            'grand_total' => $grand_total,
        ]);
    }


}

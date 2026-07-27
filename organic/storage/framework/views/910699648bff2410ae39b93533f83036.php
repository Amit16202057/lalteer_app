<section class="mb-1 pt-3">
    <div class="product-details-bredcrumb" style="position: relative; text-align: center;">
        <img src="<?php echo e(static_asset('assets/img/Frame 1171276523.png')); ?>" alt=""
            style="width: 100%; height: 200px;">
        <h2
            style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); color: white; font-size: 26px;">
            <?php echo e(translate('Your Cart')); ?></h2>
    </div>
</section>

<div class="container">
    <?php
        $cart_count = count($carts);
        $active_carts = $cart_count > 0 ? $carts->toQuery()->active()->get() : [];
    ?>
    <?php if($cart_count > 0): ?>
        <div class="row">
            <div class="col-lg-8">
                <?php if(auth()->check()): ?>
                    <?php
                        $welcomeCoupon = ifUserHasWelcomeCouponAndNotUsed();
                    ?>
                    <?php if($welcomeCoupon): ?>
                        <div class="alert alert-primary align-items-center border d-flex flex-wrap justify-content-between rounded-0"
                            style="border-color: #3490F3 !important;">
                            <?php
                                $discount =
                                    $welcomeCoupon->discount_type == 'amount'
                                        ? single_price($welcomeCoupon->discount)
                                        : $welcomeCoupon->discount . '%';
                            ?>
                            <div class="fw-400 fs-14" style="color: #3490F3 !important;">
                                <?php echo e(translate('Welcome Coupon')); ?> <strong><?php echo e($discount); ?></strong>
                                <?php echo e(translate('Discount on your Purchase Within')); ?>

                                <strong><?php echo e($welcomeCoupon->validation_days); ?></strong>
                                <?php echo e(translate('days of Registration')); ?>

                            </div>
                            <button class="btn btn-sm mt-3 mt-lg-0 rounded-4"
                                onclick="copyCouponCode('<?php echo e($welcomeCoupon->coupon_code); ?>')"
                                style="background-color: #3490F3; color: white;"><?php echo e(translate('Copy coupon Code')); ?></button>
                        </div>
                    <?php endif; ?>
                <?php endif; ?>
                <div class="p-3 p-lg-4 text-left">
                    <div class="mb-4">
                        <div class="form-group mb-2 border-bottom">
                            <div class="aiz-checkbox-inline mb-3">
                                <label class="aiz-checkbox">
                                    <input type="checkbox" class="check-all"
                                        <?php if(count($active_carts) == $cart_count): ?> checked <?php endif; ?>>
                                    <span class="fs-20 text-balck fw-700 ml-3"><?php echo e(translate('Shopping Cart Items')); ?>

                                        (<?php echo e($cart_count); ?>)</span>
                                    <span class="aiz-square-check"></span>
                                </label>
                            </div>
                        </div>
                        <!-- Cart Items -->
                        <ul class="list-group list-group-flush">
                            <?php
                                $total = 0;
                                $admin_products = [];
                                $seller_products = [];
                                $admin_product_variation = [];
                                $seller_product_variation = [];
                                foreach ($carts as $key => $cartItem) {
                                    $product = get_single_product($cartItem['product_id']);

                                    if ($product->added_by == 'admin') {
                                        array_push($admin_products, $cartItem['product_id']);
                                        $admin_product_variation[] = $cartItem['variation'];
                                    } else {
                                        $product_ids = [];
                                        if (isset($seller_products[$product->user_id])) {
                                            $product_ids = $seller_products[$product->user_id];
                                        }
                                        array_push($product_ids, $cartItem['product_id']);
                                        $seller_products[$product->user_id] = $product_ids;
                                        $seller_product_variation[] = $cartItem['variation'];
                                    }
                                }
                            ?>

                            <!-- Inhouse Products -->
                            <?php if(!empty($admin_products)): ?>
                                <?php
                                    $all_admin_products = true;
                                    if (
                                        count($admin_products) !=
                                        count(
                                            $carts->toQuery()->active()->whereIn('product_id', $admin_products)->get(),
                                        )
                                    ) {
                                        $all_admin_products = false;
                                    }
                                ?>
                                <div class="pt-3 px-0">
                                    <div class="aiz-checkbox-inline">
                                        <label class="aiz-checkbox d-block">
                                            <input type="checkbox" class="check-one check-seller" value="admin"
                                                <?php if($all_admin_products): ?> checked <?php endif; ?>>
                                            <span class="d-flex flex-row justify-content-between align-items-center"
                                                style="background-color: #D9EDC4">
                                                <span class="fs-15 ml-3 pb-3 d-block pt-3">
                                                    <?php echo e(translate('Product')); ?>

                                                </span>
                                                <span class="fs-15 ml-3 pb-3 d-block pt-3"
                                                    style="margin-left: 300px !important;">
                                                    <?php echo e(translate('Variant')); ?>

                                                </span>
                                                <span class="fs-15 ml-3 pb-3 d-block pt-3">
                                                    <?php echo e(translate('Price')); ?>

                                                </span>
                                                <span class="fs-15 ml-3 pb-3 d-block pt-3" style="margin-right: 35px;">
                                                    <?php echo e(translate('Quantity')); ?>

                                                </span>
                                            </span>
                                            <span class="aiz-square-check"></span>
                                        </label>
                                    </div>
                                </div>
                                <?php $__currentLoopData = $admin_products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $product_id): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php
                                        $product = get_single_product($product_id);
                                        $cartItem = $carts
                                            ->toQuery()
                                            ->where('product_id', $product_id)
                                            ->where('variation', $admin_product_variation[$key])
                                            ->first();
                                        $product_stock = $product->stocks
                                            ->where('variant', $cartItem->variation)
                                            ->first();
                                        $total =
                                            $total +
                                            cart_product_price($cartItem, $product, false) * $cartItem->quantity;
                                    ?>
                                    <li class="list-group-item px-0 border-md-0">
                                        <div class="row gutters-5 align-items-center">
                                            <!-- select -->
                                            <div class="col-auto">
                                                <div class="aiz-checkbox pl-0">
                                                    <label class="aiz-checkbox">
                                                        <input type="checkbox" class="check-one check-one-admin"
                                                            name="id[]" value="<?php echo e($product_id); ?>"
                                                            <?php if($cartItem->status == 1): ?> checked <?php endif; ?>>
                                                        <span class="aiz-square-check"></span>
                                                    </label>
                                                </div>
                                            </div>
                                            <!-- Product Image & name -->
                                            <div class="col-md-6 col-10 d-flex align-items-center mb-2 mb-md-0">
                                                <span class="mr-2 ml-0">
                                                    <img src="<?php echo e(uploaded_asset($product->thumbnail_img)); ?>"
                                                        class="img-fit size-64px"
                                                        alt="<?php echo e($product->getTranslation('name')); ?>"
                                                        onerror="this.onerror=null;this.src='<?php echo e(static_asset('assets/img/placeholder.jpg')); ?>';">
                                                </span>
                                                <span>
                                                    <span><?php echo e(getCategoryName($product->category_id)); ?></span>
                                                    <span
                                                        class="fs-16 fw-700 text-success text-truncate-2 mb-2"><?php echo e($product->getTranslation('name')); ?></span>
                                                    
                                                    <span class="d-flex flex-row">
                                                        <a href="javascript:void(0)"
                                                            onclick="removeFromCartView(event, <?php echo e($cartItem->id); ?>)"
                                                            title="<?php echo e(translate('Remove')); ?>"
                                                            class="bg-danger rounded-1 text-white p-1"><i
                                                                class="fa-solid fa-trash"
                                                                style="margin-right: 5px;"></i><?php echo e(translate('Remove Item')); ?></a>
                                                        <a class="bg-success rounded-1 text-white p-1"
                                                            style="margin-left: 10px;"><i
                                                                class="fa-regular fa-heart me-1"></i><?php echo e(translate('Move to Favourite')); ?></a>
                                                    </span>
                                                </span>

                                            </div>

                                            
                                            <div class="col-md-2">
                                                <?php if($admin_product_variation[$key] != ''): ?>
                                                    <span
                                                        class="text-success"><?php echo e($admin_product_variation[$key]); ?></span>
                                                <?php endif; ?>
                                            </div>

                                            <!-- Price & Tax -->
                                            <div
                                                class="col-md col-4 ml-4 ml-sm-0 my-3 my-md-0 d-flex flex-column ml-sm-5 ml-md-0">
                                                <span
                                                    class="fw-700 fs-14 text-primary"><?php echo e(single_price(cart_product_price($cartItem, $product, false) * $cartItem->quantity)); ?></span>
                                            </div>
                                            <div class="col-md col-4 ml-4 ml-sm-0 my-3 my-md-0 d-flex flex-column ml-sm-5 ml-md-0"
                                                style="display: none !important">
                                                <span class="fs-12 text-secondary"><?php echo e(translate('Price')); ?></span>
                                                <span
                                                    class="fw-700 fs-14 mb-2"><?php echo e(cart_product_price($cartItem, $product, true, false)); ?></span>
                                                <span>
                                                    <span class="opacity-90 fs-12"><?php echo e(translate('Tax')); ?>:
                                                        <?php echo e(cart_product_tax($cartItem, $product)); ?></span>
                                                </span>
                                            </div>
                                            <!-- Quantity & Total -->
                                            <div
                                                class="col-xl-2 col-md-2 col d-flex flex-column flex-xl-row justify-content-xl-between align-items-xl-center">
                                                <!-- Quantity -->
                                                <div>
                                                    <?php if($product->digital != 1 && $product->auction_product == 0): ?>
                                                        <div class="d-flex flex-xl-column flex-xxl-row align-items-center aiz-plus-minus mr-0 ml-0"
                                                            style="width: max-content !important;">
                                                            <button
                                                                class="btn col-auto btn-icon btn-sm btn-light rounded-0"
                                                                type="button" data-type="plus"
                                                                data-field="quantity[<?php echo e($cartItem->id); ?>]">
                                                                <i class="las la-plus"></i>
                                                            </button>
                                                            <input type="number" name="quantity[<?php echo e($cartItem->id); ?>]"
                                                                class="col border-0 text-center px-0 fs-14 input-number"
                                                                placeholder="1" value="<?php echo e($cartItem['quantity']); ?>"
                                                                min="<?php echo e($product->min_qty); ?>"
                                                                max="<?php echo e($product_stock ? $product_stock->qty : 999); ?>"
                                                                onchange="updateQuantity(<?php echo e($cartItem->id); ?>, this)"
                                                                style="min-width: 45px;">
                                                            <button
                                                                class="btn col-auto btn-icon btn-sm btn-light rounded-0"
                                                                type="button" data-type="minus"
                                                                data-field="quantity[<?php echo e($cartItem->id); ?>]">
                                                                <i class="las la-minus"></i>
                                                            </button>
                                                        </div>
                                                    <?php elseif($product->auction_product == 1): ?>
                                                        <span class="fw-700 fs-14">1</span>
                                                    <?php endif; ?>
                                                </div>
                                                <!-- Total -->
                                                
                                            </div>
                                            <!-- Remove From Cart -->
                                            
                                        </div>
                                        <hr class="text-success">
                                    </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>

                            <!-- Seller Products -->
                            <?php if(!empty($seller_products)): ?>
                                <?php $__currentLoopData = $seller_products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $seller_product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php
                                        $all_seller_products = true;
                                        if (
                                            count($seller_product) !=
                                            count(
                                                $carts
                                                    ->toQuery()
                                                    ->active()
                                                    ->whereIn('product_id', $seller_product)
                                                    ->get(),
                                            )
                                        ) {
                                            $all_seller_products = false;
                                        }
                                    ?>
                                    <div class="pt-3 px-0">
                                        <div class="aiz-checkbox-inline">
                                            <label class="aiz-checkbox d-block">
                                                <input type="checkbox" class="check-one check-seller"
                                                    value="seller-<?php echo e($key); ?>"
                                                    <?php if($all_seller_products): ?> checked <?php endif; ?>>
                                                <span
                                                    class="fs-16 fw-700 text-dark ml-3 pb-3 d-block border-left-0 border-top-0 border-right-0 border-bottom border-dashed">
                                                    <?php echo e(get_shop_by_user_id($key)->name); ?> <?php echo e(translate('Products')); ?>

                                                    (<?php echo e(count($seller_product)); ?>)
                                                </span>
                                                <span class="aiz-square-check"></span>
                                            </label>
                                        </div>
                                    </div>
                                    <?php $__currentLoopData = $seller_product; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key2 => $product_id): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php
                                            $product = get_single_product($product_id);
                                            $cartItem = $carts
                                                ->toQuery()
                                                ->where('product_id', $product_id)
                                                ->where('variation', $seller_product_variation[$key2])
                                                ->first();
                                            $product_stock = $product->stocks
                                                ->where('variant', $cartItem->variation)
                                                ->first();
                                            $total =
                                                $total +
                                                cart_product_price($cartItem, $product, false) * $cartItem->quantity;
                                        ?>
                                        <li class="list-group-item px-0 border-md-0">
                                            <div class="row gutters-5 align-items-center">
                                                <!-- select -->
                                                <div class="col-auto">
                                                    <div class="aiz-checkbox pl-0">
                                                        <label class="aiz-checkbox">
                                                            <input type="checkbox"
                                                                class="check-one check-one-seller-<?php echo e($key); ?>"
                                                                name="id[]" value="<?php echo e($product_id); ?>"
                                                                <?php if($cartItem->status == 1): ?> checked <?php endif; ?>>
                                                            <span class="aiz-square-check"></span>
                                                        </label>
                                                    </div>
                                                </div>
                                                <!-- Product Image & name -->
                                                <div class="col-md-5 col-10 d-flex align-items-center mb-2 mb-md-0">
                                                    <span class="mr-2 ml-0">
                                                        <img src="<?php echo e(uploaded_asset($product->thumbnail_img)); ?>"
                                                            class="img-fit size-64px"
                                                            alt="<?php echo e($product->getTranslation('name')); ?>"
                                                            onerror="this.onerror=null;this.src='<?php echo e(static_asset('assets/img/placeholder.jpg')); ?>';">
                                                    </span>
                                                    <span>
                                                        <span
                                                            class="fs-14 fw-400 text-dark text-truncate-2 mb-2"><?php echo e($product->getTranslation('name')); ?></span>
                                                        <?php if($seller_product_variation[$key2] != ''): ?>
                                                            <span
                                                                class="fs-12 text-secondary"><?php echo e(translate('Variation')); ?>:
                                                                <?php echo e($seller_product_variation[$key2]); ?></span>
                                                        <?php endif; ?>
                                                        <span class="d-flex flex-row">
                                                            <a href="javascript:void(0)"
                                                                onclick="removeFromCartView(event, <?php echo e($cartItem->id); ?>)"
                                                                title="<?php echo e(translate('Remove')); ?>"
                                                                class="bg-danger rounded-1 text-white p-1"><i
                                                                    class="fa-solid fa-trash"
                                                                    style="margin-right: 5px;"></i>Remove Item</a>
                                                            <a class="bg-success rounded-1 text-white p-1"
                                                                style="margin-left: 10px;"><i
                                                                    class="fa-regular fa-heart me-1"></i> Move to
                                                                Favourite</a>
                                                        </span>
                                                    </span>
                                                </div>
                                                <!-- Price & Tax -->
                                                <div
                                                    class="col-md col-4 ml-4 ml-sm-0 my-3 my-md-0 d-flex flex-column ml-sm-5 ml-md-0">
                                                    <span class="fs-12 text-secondary"><?php echo e(translate('Price')); ?></span>
                                                    <span
                                                        class="fw-700 fs-14 mb-2"><?php echo e(cart_product_price($cartItem, $product, true, false)); ?></span>
                                                    <span>
                                                        <span class="opacity-90 fs-12"><?php echo e(translate('Tax')); ?>:
                                                            <?php echo e(cart_product_tax($cartItem, $product)); ?></span>
                                                    </span>
                                                </div>
                                                <!-- Quantity & Total -->
                                                <div
                                                    class="col-xl-4 col-md-3 col d-flex flex-column flex-xl-row justify-content-xl-between align-items-xl-center">
                                                    <!-- Quantity -->
                                                    <div>
                                                        <?php if($product->digital != 1 && $product->auction_product == 0): ?>
                                                            <div class="d-flex flex-xl-column flex-xxl-row align-items-center aiz-plus-minus mr-0 ml-0"
                                                                style="width: max-content !important;">
                                                                <button
                                                                    class="btn col-auto btn-icon btn-sm btn-light rounded-0"
                                                                    type="button" data-type="plus"
                                                                    data-field="quantity[<?php echo e($cartItem->id); ?>]">
                                                                    <i class="las la-plus"></i>
                                                                </button>
                                                                <input type="number"
                                                                    name="quantity[<?php echo e($cartItem->id); ?>]"
                                                                    class="col border-0 text-center px-0 fs-14 input-number"
                                                                    placeholder="1"
                                                                    value="<?php echo e($cartItem['quantity']); ?>"
                                                                    min="<?php echo e($product->min_qty); ?>"
                                                                    max="<?php echo e($product_stock ? $product_stock->qty : 999); ?>"
                                                                    onchange="updateQuantity(<?php echo e($cartItem->id); ?>, this)"
                                                                    style="min-width: 45px;">
                                                                <button
                                                                    class="btn col-auto btn-icon btn-sm btn-light rounded-0"
                                                                    type="button" data-type="minus"
                                                                    data-field="quantity[<?php echo e($cartItem->id); ?>]">
                                                                    <i class="las la-minus"></i>
                                                                </button>
                                                            </div>
                                                        <?php elseif($product->auction_product == 1): ?>
                                                            <span class="fw-700 fs-14">1</span>
                                                        <?php endif; ?>
                                                    </div>
                                                    <!-- Total -->
                                                    
                                                </div>
                                                <!-- Remove From Cart -->
                                                
                                            </div>
                                        </li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        </ul>
                    </div>
                </div>

                <div class="d-flex flex-row justify-content-center align-items-center">
                    <a href="<?php echo e(url('/')); ?>" class="btn btn-success fs-16 fw-600 rounded-2 px-4 text-white"
                        style="margin-right: 10px;"><?php echo e(translate('Continue Shopping')); ?></a>
                    <!--<a href="<?php echo e(route('checkout')); ?>" class="btn btn-danger fs-16 fw-600 rounded-2 px-4 text-white"><?php echo e(translate('Buy Now')); ?></a>-->
                </div>
            </div>

            <!-- Cart Summary -->
            <div class="col-lg-4 mt-lg-0 mt-4" id="cart_summary">
                <?php echo $__env->make('frontend.partials.cart.cart_summary', ['proceed' => 1, 'carts' => $active_carts], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
        </div>

        <div>

        </div>
    <?php else: ?>
        <div class="row">
            <div class="col-xl-8 mx-auto">
                <div class="border bg-white p-4">
                    <!-- Empty cart -->
                    <div class="text-center p-3">
                        <i class="las la-frown la-3x opacity-60 mb-3"></i>
                        <h3 class="h4 fw-700"><?php echo e(translate('Your Cart is empty')); ?></h3>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>
</div>
<?php /**PATH /home/laltktyh/organic.lalteer.com/resources/views/frontend/partials/cart/cart_details.blade.php ENDPATH**/ ?>
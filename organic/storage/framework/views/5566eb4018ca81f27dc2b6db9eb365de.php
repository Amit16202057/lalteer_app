<?php
    $carts = get_user_cart();
    $total = 0;
    $unavailableProducts = [];

    if(count($carts) > 0) {
        foreach ($carts as $key => $cartItem) {
            $product = get_single_product($cartItem['product_id']);
            if ($product != null) {
                $total = $total + cart_product_price($cartItem, $product, false) * $cartItem['quantity'];
            } else {
                $unavailableProducts[] = $cartItem['id'];
            }
        }

        // Remove unavailable products from cart
        if (count($unavailableProducts) > 0) {
            \App\Models\Cart::whereIn('id', $unavailableProducts)->delete();
            $carts = $carts->reject(function($cart) use ($unavailableProducts) {
                return in_array($cart['id'], $unavailableProducts);
            });
        }
    }
?>
<?php if(isset($carts) && count($carts) > 0): ?>
    <div class="fs-16 fw-700 text-soft-dark pt-4 pb-2 mx-4 border-bottom" style="border-color: #e5e5e5 !important;">
        <?php echo e(translate('Cart Items')); ?>

    </div>
    <!-- Cart Products -->
    <ul class="h-360px overflow-auto c-scrollbar-light list-group list-group-flush mx-1">
        <?php $__currentLoopData = $carts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $cartItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php
                $product = get_single_product($cartItem['product_id']);
            ?>
            <?php if($product != null): ?>
                <li class="list-group-item border-0 hov-scale-img">
                    <span class="d-flex align-items-center">
                        <a href="<?php echo e(route('product', $product->slug)); ?>"
                            class="text-reset d-flex align-items-center flex-grow-1">
                            <img src="<?php echo e(static_asset('assets/img/placeholder.jpg')); ?>"
                                data-src="<?php echo e(uploaded_asset($product->thumbnail_img)); ?>"
                                class="img-fit lazyload size-60px has-transition"
                                alt="<?php echo e($product->getTranslation('name')); ?>"
                                onerror="this.onerror=null;this.src='<?php echo e(static_asset('assets/img/placeholder.jpg')); ?>';">
                            <span class="minw-0 pl-2 flex-grow-1">
                                <span class="fw-700 fs-13 text-dark mb-2 text-truncate-2" title="<?php echo e($product->getTranslation('name')); ?>">
                                    <?php echo e($product->getTranslation('name')); ?>

                                </span>
                                <span class="fs-14 fw-400 text-secondary"><?php echo e($cartItem['quantity']); ?>x</span>
                                <span class="fs-14 fw-400 text-secondary"><?php echo e(cart_product_price($cartItem, $product)); ?></span>
                            </span>
                        </a>
                        <span class="">
                            <button onclick="removeFromCart(<?php echo e($cartItem['id']); ?>)"
                                class="btn btn-sm btn-icon stop-propagation">
                                <i class="la la-close fs-18 fw-600 text-secondary"></i>
                            </button>
                        </span>
                    </span>
                </li>
            <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>
    <!-- Subtotal -->
    <div class="px-3 py-2 fs-15 border-top d-flex justify-content-between mx-4" style="border-color: #e5e5e5 !important;">
        <span class="fs-14 fw-400 text-secondary"><?php echo e(translate('Subtotal')); ?></span>
        <span class="fs-16 fw-700 text-dark"><?php echo e(single_price($total)); ?></span>
    </div>
    <!-- View cart & Checkout Buttons -->
    <div class="py-3 text-center border-top mx-4" style="border-color: #e5e5e5 !important;">
        <div class="row gutters-10 justify-content-center">
            <div class="col-sm-6 mb-2">
                <a href="<?php echo e(route('cart')); ?>" class="btn btn-secondary-base btn-sm btn-block rounded-4 text-white">
                    <?php echo e(translate('View cart')); ?>

                </a>
            </div>
        </div>
    </div>
<?php else: ?>
    <div class="text-center p-3">
        <i class="las la-frown la-3x opacity-60 mb-3"></i>
        <h3 class="h6 fw-700"><?php echo e(translate('Your Cart is empty')); ?></h3>
    </div>
<?php endif; ?>
<?php /**PATH /home/laltktyh/organic.lalteer.com/resources/views/frontend/partials/cart/cart_dropdown_content.blade.php ENDPATH**/ ?>
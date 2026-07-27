<?php
    $total = 0;
    $carts = get_user_cart();
    if(count($carts) > 0) {
        foreach ($carts as $key => $cartItem) {
            $product = get_single_product($cartItem['product_id']);
            $total = $total + cart_product_price($cartItem, $product, false) * $cartItem['quantity'];
        }
    }
?>
<!-- Cart button with cart count -->
<a href="javascript:void(0)" class="d-flex align-items-center text-dark px-3 h-100" data-toggle="dropdown" data-display="static" title="<?php echo e(translate('Cart')); ?>">
    <span class="">
        <i class="fa-solid fa-bag-shopping fs-20 text-dark"></i>
    </span>
    
    <span class="nav-box-text d-none d-xl-block ml-2 text-dark fs-12">

        <span class="cart-count"><?php echo e(count($carts) > 0 ? count($carts) : 0); ?></span>

    </span>
</a>

<!-- Cart Items -->
<div class="dropdown-menu dropdown-menu-right dropdown-menu-lg p-0 stop-propagation rounded-0" id="cart_items">
    <?php echo $__env->make('frontend.partials.cart.cart_dropdown_content', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</div>
<?php /**PATH /home/laltktyh/organic.lalteer.com/resources/views/frontend/partials/cart/cart.blade.php ENDPATH**/ ?>
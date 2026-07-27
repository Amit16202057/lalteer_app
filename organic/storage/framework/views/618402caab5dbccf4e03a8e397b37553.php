<div class="modal-body px-4 py-5 c-scrollbar-light">
    <div class="row">
        <!-- Product Image gallery -->
        <div class="col-md-12">
            <div class="row">
                <div class="col-lg-4">
                    <img style="padding: 20px;background-color: #edeaea;" height="200px" width="100%"
                        class="lazyload mx-auto  has-transition" src="<?php echo e(get_image($product->thumbnail)); ?>"
                        alt="<?php echo e($product->getTranslation('name')); ?>" title="<?php echo e($product->getTranslation('name')); ?>"
                        onerror="this.onerror=null;this.src='<?php echo e(static_asset('assets/img/placeholder.jpg')); ?>';">

                </div>
                <div class="col-lg-8">
                    <h2 class="mb-2 fs-28 fw-700 text-dark">
                        <?php echo e($product->getTranslation('name')); ?>

                    </h2>
                    <div class="category_nam text-dark opacity-80">
                        <?php echo e(translate(getCategoryName($product->category_id))); ?></div>
                    <div class="cat_des">
                        <?php echo \Illuminate\Support\Str::words($product->getTranslation('description', app()->getLocale()), 100); ?>

                    </div>

                </div>
            </div>
        </div>

        <!-- Product Info -->
        <div class="col-lg-12 pt-3">
            <div class="text-left">
                <!-- Product name -->
                <strong><?php echo e(translate('Choose a size')); ?></strong>
                <form id="option-choice-form">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" name="id" value="<?php echo e($product->id); ?>">
                    <?php
                        $qty = 0;
                        foreach ($product->stocks as $key => $stock) {
                            $qty += $stock->qty;
                        }
                    ?>

                    <?php if($product->digital != 1): ?>
                        <!-- Product Choice options -->
                        <?php if($product->choice_options != null): ?>
                            <?php $__currentLoopData = json_decode($product->choice_options); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $choice): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="row no-gutters mt-3">
                                    <div class="col-12">
                                        <div class="aiz-radio-inline">
                                            <?php $__currentLoopData = $choice->values; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <div class="my_cart mb-4">
                                                    <div class="product-name">
                                                        <!-- Display the product name here -->
                                                        <h5 class="text-dark"><?php echo e($product->getTranslation('name')); ?> (
                                                            <span class="text-primary"><?php echo e(translate($value)); ?></span>)
                                                        </h5>
                                                        <div class="">
                                                            <strong class="fs-16 fw-700 text-dark">
                                                                <?php echo e(home_discounted_price_cart($product, $value)); ?>

                                                                <!-- Pass the variant value here -->
                                                            </strong>
                                                            <?php if(home_price($product) != home_discounted_price($product)): ?>
                                                            <sup>
                                                            <del class="fs-12 opacity-60 ml-2">
                                                                <?php echo e(home_price_cart($product, true, $value)); ?>

                                                            </del>
                                                            </sup>
                                                            <?php endif; ?>
                                                            <!--<?php if($product->unit != null): ?>-->
                                                            <!--    <span-->
                                                            <!--        class="opacity-70 ml-1">/<?php echo e($product->getTranslation('unit')); ?></span>-->
                                                            <!--<?php endif; ?>-->

                                                            <?php if(discount_in_percentage($product) > 0): ?>
                                                                <span
                                                                    class="bg-danger ml-2 fs-11 fw-700 text-white w-35px text-center px-2"
                                                                    style="padding-top:2px;padding-bottom:2px;">
                                                                    -<?php echo e(discount_in_percentage($product)); ?>%</span>
                                                            <?php endif; ?>
                                                        </div>
                                                    </div>
                                                    <label class="aiz-megabox pl-0 mr-2 mb-0">
                                                        <input type="radio"
                                                            name="attribute_id_<?php echo e($choice->attribute_id); ?>"
                                                            value="<?php echo e($value); ?>"
                                                            >
                                                        <div
                                                            class="aiz-megabox-elem rounded-1 d-flex btn btn-primary align-items-center justify-content-center py-1 px-3">
                                                            <?php echo e(translate('Add To Cart')); ?>

                                                        </div>

                                                    </label>
                                                </div>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        <?php endif; ?>

                        <!-- Color -->
                        <?php if($product->colors && count(json_decode($product->colors)) > 0): ?>
                            <div class="row no-gutters mt-3">
                                <div class="col-3">
                                    <div class="text-secondary fs-14 fw-400 mt-2"><?php echo e(translate('Color')); ?></div>
                                </div>
                                <div class="col-9">
                                    <div class="aiz-radio-inline">
                                        <?php $__currentLoopData = json_decode($product->colors); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $color): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <label class="aiz-megabox pl-0 mr-2 mb-0" data-toggle="tooltip"
                                                data-title="<?php echo e(get_single_color_name($color)); ?>">
                                                <input type="radio" name="color"
                                                    value="<?php echo e(get_single_color_name($color)); ?>"
                                                    <?php if($key == 0): ?> checked <?php endif; ?>>
                                                <span
                                                    class="aiz-megabox-elem rounded-0 d-flex align-items-center justify-content-center p-1">
                                                    <span class="size-25px d-inline-block rounded"
                                                        style="background: <?php echo e($color); ?>;"></span>
                                                </span>
                                            </label>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                        <div class="row no-gutters d-none mt-3">
                            <div class="col-3">
                                <div class="text-secondary fs-14 fw-400 mt-2"><?php echo e(translate('Quantity')); ?></div>
                            </div>
                            <div class="col-9">
                                <div class="product-quantity d-flex align-items-center">
                                    <div class="row no-gutters align-items-center aiz-plus-minus mr-3"
                                        style="width: 130px;">
                                        <button class="btn col-auto btn-icon btn-sm btn-light rounded-0" type="button"
                                            data-type="minus" data-field="quantity" disabled="">
                                            <i class="las la-minus"></i>
                                        </button>
                                        <input type="number" name="quantity"
                                            class="col border-0 text-center flex-grow-1 fs-16 input-number"
                                            placeholder="1" value="<?php echo e($product->min_qty); ?>"
                                            min="<?php echo e($product->min_qty); ?>" max="10" lang="en">
                                        <button class="btn col-auto btn-icon btn-sm btn-light rounded-0" type="button"
                                            data-type="plus" data-field="quantity">
                                            <i class="las la-plus"></i>
                                        </button>
                                    </div>
                                    <div class="avialable-amount opacity-60">
                                        <?php if($product->stock_visibility_state == 'quantity'): ?>
                                            (<span id="available-quantity"><?php echo e($qty); ?></span>
                                            <?php echo e(translate('available')); ?>)
                                        <?php elseif($product->stock_visibility_state == 'text' && $qty >= 1): ?>
                                            (<span id="available-quantity"><?php echo e(translate('In Stock')); ?></span>)
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Show Add to Cart Button if no variants -->
                        <?php if($product->choice_options == null || count(json_decode($product->choice_options)) == 0): ?>
                            <div class="row no-gutters mt-3">

                                <button class="btn btn-primary w-100" onclick="addToCart()">
                                    Add To Cart
                                </button>
                            </div>
                        <?php endif; ?>
                    <?php else: ?>
                        <!-- Quantity -->
                        <input type="hidden" name="quantity" value="1">

                    <?php endif; ?>
                </form>




            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $('#option-choice-form input').on('change', function() {
        checked = true;
        getVariantPrice();
    });
</script>
<?php /**PATH /home/laltktyh/organic.lalteer.com/resources/views/frontend/partials/cart/addToCart.blade.php ENDPATH**/ ?>
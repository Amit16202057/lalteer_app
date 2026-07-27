<?php
    $best_selling_products = get_best_selling_products(20);
?>
<?php if(get_setting('best_selling') == 1 && count($best_selling_products) > 0): ?>
 <section class="mb-2 mb-md-3 mt-2 mt-md-3" style="background: url('<?php echo e(asset('public/assets/img/product_bg.jpg')); ?>') no-repeat center center/cover;">

        <div class="">
            <!-- Top Section -->
            <div class="d-flex mb-2 mb-md-3 align-items-baseline justify-content-between">
                <!-- Title -->
                <h3 class="fs-16 fs-md-20 fw-700 mb-2 mb-sm-0">
                    <span class="p-3"><?php echo e(translate('Top Product')); ?></span>
                </h3>
                <!-- Links -->
                
            </div>
            <!-- Product Section -->
            <div class="px-sm-3">
                <div class="row">
                    <?php $__currentLoopData = $best_selling_products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-md-3 <?php echo e($loop->last ? '' : 'mb-2'); ?>">
                            <div
                                class=" position-relative has-transition hov-animate-outline border <?php if($key == 0): ?> border-left <?php endif; ?>">
                                <?php echo $__env->make(
                                    'frontend.' . get_setting('homepage_select') . '.partials.product_box_1',
                                    ['product' => $product]
                                , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>

        </div>
    </section>
<?php endif; ?>
<?php /**PATH /home/laltktyh/organic.lalteer.com/resources/views/frontend/classic/partials/best_selling_section.blade.php ENDPATH**/ ?>
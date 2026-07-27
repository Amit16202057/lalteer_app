<div class="border rounded-2">
    <div class="p-3 p-sm-4">
        <h3 class="fs-16 fw-700 mb-0">
            <span class="mr-4 text-uppercase"><?php echo e(translate('Related Products')); ?></span>
        </h3>
    </div>
    <div class="px-4">
        <div class="aiz-carousel gutters-4 half-outside-arrow gap-3" data-items="4" data-xl-items="3" data-lg-items="4"
            data-md-items="3" data-sm-items="2" data-xs-items="2" data-arrows='true' data-infinite='true'>
            <?php $__currentLoopData = \App\Models\Product::inRandomOrder()->take(10)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $related_product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div
                    class="carousel-box px-3 position-relative has-transition border-right border-top border-bottom <?php if($key == 0): ?> border-left <?php endif; ?> hov-animate-outline">
                    <?php echo $__env->make('frontend.' . get_setting('homepage_select') . '.partials.product_box_1', [
                        'product' => $related_product,
                    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</div>
<?php /**PATH /home/laltktyh/organic.lalteer.com/resources/views/preorder/frontend/product_details/related_products.blade.php ENDPATH**/ ?>
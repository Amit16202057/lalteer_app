<?php $__env->startSection('content'); ?>
    <section class="mb-5 mt-3">
        <div class="container">
            <!-- Top Section -->
            <div class="pt-2 pt-lg-4 mb-2 mb-lg-4">
                <!-- Title -->
                <h1 class="fw-700 fs-20 fs-md-24 text-dark"><?php echo e($flash_deal->title); ?></h1>
            </div>

            <div class="row gutters-16">
                <!-- Flash Deals Baner & Countdown -->
                <div class="col-xxl-3 col-lg-4 mb-3 mb-lg-0">
                    <div class="z-3 sticky-top-lg py-3 py-lg-0 h-400px h-md-570px h-lg-400px h-xl-475px">
                        <div class="h-100 w-100 w-xl-auto position-relative"
                            style="background-image: url('<?php echo e(uploaded_asset($flash_deal->banner)); ?>'); background-size: cover; background-position: center center;">
                            <div class="position-absolute" style="left: 14px; right: 14px; top: 14px;">
                                <div class="bg-white rounded px-2 py-2">
                                    <div class="aiz-count-down-circle"
                                        end-date="<?php echo e(date('Y/m/d H:i:s', $flash_deal->end_date)); ?>"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Flash Deals Products -->
                <div class="col-xxl-9 col-lg-8">
                    <?php if($flash_deal->status == 1 && strtotime(date('Y-m-d H:i:s')) <= $flash_deal->end_date): ?>
                        <div class="z-5">
                            <div class="row row-cols-xxl-3 row-cols-xl-3 row-cols-lg-3 row-cols-md-2 row-cols-sm-2 row-cols-1 gutters-16">
                                <?php $__currentLoopData = $flash_deal->flash_deal_products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $flash_deal_product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php
                                        $product = get_single_product($flash_deal_product->product_id);
                                    ?>
                                    <?php if($product != null && $product->published != 0): ?>
                                        <?php
                                            $product_url = route('product', $product->slug);
                                            if($product->auction_product == 1) {
                                                $product_url = route('auction-product', $product->slug);
                                            }
                                        ?>
                                        <div class="col text-center has-transition hov-shadow-out z-1">
                                            <?php echo $__env->make('frontend.'.get_setting('homepage_select').'.partials.product_box_1',['product' => $product], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                        </div>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>
                    <?php else: ?>
                        <div class="text-center text-dark">
                            <h1 class="h3 my-4"><?php echo e($flash_deal->title); ?></h1>
                            <p class="h4"><?php echo e(translate('This offer has been expired.')); ?></p>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/laltktyh/organic.lalteer.com/resources/views/frontend/flash_deal_details.blade.php ENDPATH**/ ?>
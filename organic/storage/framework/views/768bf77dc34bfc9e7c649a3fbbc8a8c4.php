

<?php $__env->startSection('content'); ?>

    <section class="mb-1 pt-3">
        <div class="product-details-bredcrumb" style="position: relative; text-align: center;">
            <img src="<?php echo e(static_asset('assets/img/Frame 1171276523.png')); ?>" alt=""
                style="width: 100%; height: 200px;">
            <h2
                style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); color: white; font-size: 26px;">
                <?php echo e(translate('Compare Products')); ?></h2>
        </div>
    </section>

    <section
        style="background-image: url('<?php echo e(static_asset('assets/img/p_details_bg.jpg')); ?>'); background-size: cover; background-position: center;">
        <section class="mb-4">
            <div class="container text-left">
                <div class="row">
                    <div class="col-md-2 p-4">
                        <div class="dotted_box">
                            Remove any
                            varieties that
                            you don’t want
                            to include in
                            this planting
                            or
                        </div>
                    </div>
                    <div class="col-md-10">
                        
                        <?php if(Session::has('compare')): ?>
                            <?php if(count(Session::get('compare')) > 0): ?>
                                <div class="py-3">
                                    <div class="row gutters-16 mb-4">
                                        <?php $__currentLoopData = Session::get('compare'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php
                                                $product = get_single_product($item);
                                            ?>
                                            <div class="col-xl-4 col-lg-4 col-md-6 py-3">
                                                <div class="border">
                                                    <!-- Product Image -->
                                                    <div class="border-bottom">
                                                        <div>
                                                            <img loading="lazy" height="200px" width="100%"
                                                                src="<?php echo e(uploaded_asset(get_single_product($item)->thumbnail_img)); ?>"
                                                                alt="<?php echo e(translate('Product Image')); ?>" class="">
                                                        </div>
                                                    </div>
                                                    <!-- Product Name -->
                                                    <div class="p-3 border-bottom d-flex justify-content-between">
                                                        <div>
                                                            <h5 class="mb-0 text-dark text-truncate-2">
                                                                <a class="text-reset fs-14 fw-700 hov-text-primary"
                                                                    href="<?php echo e(route('product', get_single_product($item)->slug)); ?>"
                                                                    title="<?php echo e(get_single_product($item)->getTranslation('name')); ?>">
                                                                    <?php echo e(get_single_product($item)->getTranslation('name')); ?>

                                                                </a>
                                                            </h5>
                                                            <span class="opacity-50">
                                                                <?php if(get_single_product($item)->main_category != null): ?>
                                                                    <?php echo e(get_single_product($item)->main_category->getTranslation('name')); ?>

                                                                <?php endif; ?>
                                                            </span>
                                                        </div>
                                                        <!-- Price -->
                                                        <div class="mt-2">
                                                            
                                                            <h5 class="mb-0 fs-14">

                                                                <span
                                                                    class="fw-700 text-primary"><?php echo e(home_discounted_base_price($product)); ?></span>
                                                                <?php if(home_base_price($product) != home_discounted_base_price($product)): ?>
                                                                    <del
                                                                        class="fw-400 fs-10 opacity-50 mr-1"><?php echo e(home_base_price($product)); ?></del>
                                                                <?php endif; ?>
                                                            </h5>
                                                        </div>
                                                    </div>

                                                    <!-- Category -->
                                                    <div class="p-3 border-bottom" style="background-color: #D9EDC4">
                                                        Specifications
                                                    </div>
                                                    <div class="border-bottom">
                                                        <?php echo $product->specification; ?>

                                                    </div>
                                                    <div class="p-3 border-bottom" style="background-color: #D9EDC4">
                                                        Description
                                                    </div>
                                                    <div class="border-bottom p-3">
                                                        <?php echo $product->description; ?>

                                                    </div>

                                                    <?php
                                                        $total = 0;
                                                        $total += $product->reviews->where('status', 1)->count();
                                                    ?>
                                                    <div class="p-3 border-bottom" style="background-color: #D9EDC4">
                                                        <span class="rating rating-mr-2 text-warning">
                                                            <?php echo e(renderStarRating($product->rating)); ?>

                                                        </span>
                                                        <span class="ml-1 opacity-50 fs-14">(<?php echo e($total); ?>)</span>
                                                    </div>
                                                    <div class="p-3" style="background-color: #D9EDC4">
                                                        <i class="fa-solid fa-message pr-2 mt-1"></i>Comments

                                                    </div>
                                                    <div class="comments_content">
                                                        <?php $__currentLoopData = $product->reviews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $review): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <?php

                                                                $customerName = null;
                                                                $customerAvatar = null;
                                                                if ($review->type == 'real') {
                                                                    $customerName =
                                                                        $review->user != null
                                                                            ? $review->user->name
                                                                            : translate('Use is Not Available');
                                                                    $customerAvatar =
                                                                        $review->user != null
                                                                            ? uploaded_asset(
                                                                                $review->user->avatar_original,
                                                                            )
                                                                            : static_asset(
                                                                                'assets/img/placeholder.jpg',
                                                                            );
                                                                } else {
                                                                    $customerName = $review->custom_reviewer_name;
                                                                    $customerAvatar = uploaded_asset(
                                                                        $review->custom_reviewer_image,
                                                                    );
                                                                }
                                                            ?>
                                                            <li class="media list-group-item d-flex px-3 px-md-4 border-0">
                                                                <!-- Review User Image -->
                                                                <span class="avatar avatar-md mr-3">
                                                                    <img class="lazyload"
                                                                        src="<?php echo e(static_asset('assets/img/placeholder.jpg')); ?>"
                                                                        onerror="this.onerror=null;this.src='<?php echo e(static_asset('assets/img/placeholder.jpg')); ?>';"
                                                                        data-src="<?php echo e($customerAvatar); ?>">
                                                                </span>
                                                                <div class="media-body text-left">
                                                                    <!-- Review Date -->
                                                                    <div class="mb-1 fw-600">
                                                                        <?php echo e(date('d-m-Y', strtotime($review->created_at))); ?>

                                                                    </div>
                                                                    <!-- Review User Name -->
                                                                    <h3 class="fs-15  mb-0"><?php echo e($customerName); ?>

                                                                    </h3>
                                                                    <!-- Review Comment -->
                                                                    <p class="comment-text mt-2 fs-14">
                                                                        <?php echo e($review->comment); ?>

                                                                    </p>


                                                                </div>
                                                            </li>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </div>
                                                    <!-- Add to cart -->
                                                    <div class="p-4">
                                                        <button type="button"
                                                            class="btn btn-block btn-primary rounded-2 fs-13 fw-700 has-transition opacity-80 hov-opacity-100"
                                                            onclick="showAddToCartModal(<?php echo e($item); ?>)">
                                                            <?php echo e(translate('Buy Now')); ?>

                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>
                                </div>
                            <?php endif; ?>
                        <?php else: ?>
                            <div class="text-center p-4">
                                <p class="fs-17"><?php echo e(translate('Your comparison list is empty')); ?></p>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </section>
    </section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/laltktyh/organic.lalteer.com/resources/views/frontend/view_compare.blade.php ENDPATH**/ ?>
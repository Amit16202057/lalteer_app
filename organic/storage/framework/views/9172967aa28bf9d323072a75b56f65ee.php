

<?php $__env->startSection('meta_title'); ?><?php echo e($blog->meta_title); ?><?php $__env->stopSection(); ?>

<?php $__env->startSection('meta_description'); ?><?php echo e($blog->meta_description); ?><?php $__env->stopSection(); ?>

<?php $__env->startSection('meta_keywords'); ?><?php echo e($blog->meta_keywords); ?><?php $__env->stopSection(); ?>

<?php $__env->startSection('meta'); ?>
    <!-- Schema.org markup for Google+ -->
    <meta itemprop="name" content="<?php echo e($blog->meta_title); ?>">
    <meta itemprop="description" content="<?php echo e($blog->meta_description); ?>">
    <meta itemprop="image" content="<?php echo e(uploaded_asset($blog->meta_img)); ?>">

    <!-- Twitter Card data -->
    <meta name="twitter:card" content="summary">
    <meta name="twitter:site" content="@publisher_handle">
    <meta name="twitter:title" content="<?php echo e($blog->meta_title); ?>">
    <meta name="twitter:description" content="<?php echo e($blog->meta_description); ?>">
    <meta name="twitter:creator"
        content="@author_handle">
    <meta name="twitter:image" content="<?php echo e(uploaded_asset($blog->meta_img)); ?>">

    <!-- Open Graph data -->
    <meta property="og:title" content="<?php echo e($blog->meta_title); ?>" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="<?php echo e(route('blog.details', $blog->slug)); ?>" />
    <meta property="og:image" content="<?php echo e(uploaded_asset($blog->meta_img)); ?>" />
    <meta property="og:description" content="<?php echo e($blog->meta_description); ?>" />
    <meta property="og:site_name" content="<?php echo e(env('APP_NAME')); ?>" />
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<section class="mb-1 pt-3">
    <div class="product-details-bredcrumb" style="position: relative; text-align: center;">
        <img src="<?php echo e(static_asset('assets/img/Frame 1171276523.png')); ?>" alt=""
            style="width: 100%; height: 200px;">
        <h2
            style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); color: white; font-size: 26px;">
            <?php echo e(translate('Blog details')); ?></h2>
    </div>
</section>

<section class="py-4" style="background-image: url('<?php echo e(static_asset('assets/img/p_details_bg.jpg')); ?>'); background-size: cover; background-position: center;">
    <div class="container-fluid">
        <div class="row gutters-16 justify-content-center">

            <!-- recent posts -->
            <div class="col-xxl-3 col-lg-4">
                <div class="p-3">
                    <h3 class="fs-23 fw-700 text-dark mb-3"><?php echo e(translate('Recent Posts')); ?></h3>
                    <hr>
                    <div class="row">
                        <?php $__currentLoopData = $recent_blogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $recent_blog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-lg-12 col-sm-6 mb-4 hov-scale-img">
                            <div class="d-flex">
                                <div class="">
                                    <a href="<?php echo e(url('blog') . '/' . $recent_blog->slug); ?>" class="text-reset d-block overflow-hidden size-80px size-xl-90px mr-2">
                                        <img src="<?php echo e(static_asset('assets/img/placeholder-rect.jpg')); ?>"
                                            data-src="<?php echo e(uploaded_asset($recent_blog->banner)); ?>"
                                            alt="<?php echo e($recent_blog->title); ?>"
                                            class="img-fit lazyload h-100 has-transition rounded-1">
                                    </a>
                                </div>
                                <div class="">
                                    <h2 class="fs-18 fw-700 text-truncate-2">
                                        <a href="<?php echo e(url('blog') . '/' . $recent_blog->slug); ?>" class="text-reset hov-text-primary" title="<?php echo e($recent_blog->title); ?>">
                                            <?php echo e($recent_blog->title); ?>

                                        </a>
                                    </h2>
                                    <?php if($recent_blog->category != null): ?>
                                        <div class="mb-2 mb-xl-3">
                                            <small class="fs-12 fw-400 opacity-70"><?php echo e($recent_blog->category->category_name); ?></small>
                                        </div>
                                    <?php endif; ?>
                                    <div>
                                        <small
                                            class="fs-12 fw-400 opacity-60"><?php echo e(date('M d, Y', strtotime($recent_blog->created_at))); ?></small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>

                <!-- newsletter -->
                <div class="mb-3 mx-3 mx-xl-0">
                    <div class="fs-23 fw-700 px-3"><?php echo e(translate('Newsletter')); ?></div>
                    <div class="p-3">
                        <a href="mailto:email@example.com"
                            class="p-2 rounded-2 d-inline-flex align-items-center text-decoration-none"
                            style="background-color: #86C440; color: inherit; margin-right: 10px !important;">
                            <span>email@example.com</span>
                            <i class="fa-regular fa-envelope text-success ms-2"></i>
                        </a>
                    </div>
                </div>
            </div>
            
            <!-- Blog Details -->
            <div class="col-xxl-7 col-lg-8">
                <div class="mb-4">
                    <!-- Image -->
                    <img src="<?php echo e(static_asset('assets/img/placeholder-rect.jpg')); ?>"
                        data-src="<?php echo e(uploaded_asset($blog->banner)); ?>"
                        alt="<?php echo e($blog->title); ?>"
                        class="img-fluid lazyload w-100 mt-3 mb-4">

                        <div class="mb-1">
                            <div class="d-flex flex-row justify-content-between">
                                <!-- Date -->
                                <div>
                                    <small class="fs-12 fw-400"><?php echo e(date('M d, Y', strtotime($blog->created_at))); ?></small>
                                </div>
                                <!-- Caregory -->
                                <?php if($blog->category != null): ?>
                                    <div>
                                        <small class="fs-12 fw-400"><?php echo e($blog->category->category_name); ?></small>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>

                    <!-- Title -->
                    <h2 class="fs-23 fs-md-24 fw-700 mb-3">
                        <a href="<?php echo e(url('blog') . '/' . $blog->slug); ?>" class="text-reset hov-text-primary" title="<?php echo e($blog->title); ?>">
                            <?php echo e($blog->title); ?>

                        </a>
                    </h2>
                    
                    <!-- Description -->
                    <div class="mb-4 overflow-hidden fs-18">
                        <?php echo $blog->description; ?>

                    </div>
                    <!-- Facebook Comment -->
                    <?php if(get_setting('facebook_comment') == 1): ?>
                    <div class="mb-4">
                        <div class="fb-comments" data-href="<?php echo e(route('blog', $blog->slug)); ?>" data-width="" data-numposts="5"></div>
                    </div> <?php endif; ?>
                </div>
            </div>

            
        </div>
    </div>
</section>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('script'); ?>
    <?php if(get_setting('facebook_comment') == 1): ?>
<div id="fb-root">
    </div>
    <script async defer crossorigin="anonymous"
        src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v9.0&appId=<?php echo e(env('FACEBOOK_APP_ID')); ?>&autoLogAppEvents=1"
        nonce="ji6tXwgZ"></script>
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/laltktyh/organic.lalteer.com/resources/views/frontend/blog/details.blade.php ENDPATH**/ ?>
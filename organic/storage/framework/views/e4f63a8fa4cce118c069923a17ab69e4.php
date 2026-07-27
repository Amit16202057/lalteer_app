<?php $__env->startSection('meta_title'); ?><?php echo e($page->meta_title ?? $page->getTranslation('title')); ?><?php $__env->stopSection(); ?>
<?php $__env->startSection('meta_description'); ?><?php echo e($page->meta_description); ?><?php $__env->stopSection(); ?>
<?php $__env->startSection('meta_keywords'); ?><?php echo e($page->tags); ?><?php $__env->stopSection(); ?>

<?php $__env->startSection('meta'); ?>
    <meta itemprop="name" content="<?php echo e($page->meta_title ?? $page->getTranslation('title')); ?>">
    <meta itemprop="description" content="<?php echo e($page->meta_description); ?>">
    <meta itemprop="image" content="<?php echo e(uploaded_asset($page->meta_image)); ?>">

    <meta name="twitter:card" content="website">
    <meta name="twitter:site" content="@publisher_handle">
    <meta name="twitter:title" content="<?php echo e($page->meta_title ?? $page->getTranslation('title')); ?>">
    <meta name="twitter:description" content="<?php echo e($page->meta_description); ?>">
    <meta name="twitter:creator" content="@author_handle">
    <meta name="twitter:image" content="<?php echo e(uploaded_asset($page->meta_image)); ?>">

    <meta property="og:title" content="<?php echo e($page->meta_title ?? $page->getTranslation('title')); ?>" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="<?php echo e(URL($page->slug)); ?>" />
    <meta property="og:image" content="<?php echo e(uploaded_asset($page->meta_image)); ?>" />
    <meta property="og:description" content="<?php echo e($page->meta_description); ?>" />
    <meta property="og:site_name" content="<?php echo e(env('APP_NAME')); ?>" />
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php
        $pageTitle = $page->getTranslation('title');
        $pageContent = $page->getTranslation('content');
        $isPlainText = strip_tags($pageContent) === $pageContent;
        $bannerImage = $page->bradcamp_image ? uploaded_asset($page->bradcamp_image) : static_asset('assets/img/Frame 1171276523.png');
    ?>

    <section class="mb-1 pt-3">
        <div class="product-details-bredcrumb" style="position: relative; text-align: center;">
            <img src="<?php echo e($bannerImage); ?>"
                alt="<?php echo e($pageTitle); ?>" style="width: 100%; height: 200px; object-fit: cover;">
            <h2 style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); color: white; font-size: 26px;">
                <?php echo e($pageTitle); ?>

            </h2>
        </div>
    </section>

    <section class="pt-4 pb-5" style="background-image: url('<?php echo e(static_asset('assets/img/p_details_bg.jpg')); ?>'); background-size: cover; background-position: center;">
        <div class="container">
            <div class="p-3 p-md-4 p-xl-5" style="background-color: <?php echo e(hex2rgba(get_setting('base_color', '#d43533'), 0.02)); ?>;">
                <div class="bg-white p-3 p-md-4 p-xl-5">
                    <h1 class="fs-24 fw-700 mb-3"><?php echo e($pageTitle); ?></h1>
                    <div class="fs-15 text-soft-dark text-left" style="line-height: 1.8;">
                        <?php if($isPlainText): ?>
                            <?php echo nl2br(e($pageContent)); ?>

                        <?php else: ?>
                            <?php echo $pageContent; ?>

                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/laltktyh/organic.lalteer.com/resources/views/frontend/data_deletion_page.blade.php ENDPATH**/ ?>
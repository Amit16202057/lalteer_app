

<?php $__env->startSection('content'); ?>

<?php
  $bradcamp = \App\Models\Page::where('page_name','blog')->first();
?>
    <section class="mb-1 pt-3">
        <div class="product-details-bredcrumb" style="position: relative; text-align: center;">
            <img src="<?php echo e(uploaded_asset($bradcamp->bradcamp_image)??static_asset('assets/img/Frame 1171276523.png')); ?>" alt=""
                style="width: 100%; height: 200px;">
            <h2
                style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); color: white; font-size: 26px;">
                <?php echo e(translate('All Blogs')); ?></h2>
        </div>
    </section>

    <section class="pb-4 pt-5"
        style="background-image: url('<?php echo e(static_asset('assets/img/p_details_bg.jpg')); ?>'); background-size: cover; background-position: center;">
        <div class="container-fluid">
            <div class="row gutters-16">
                <!-- Contents -->
                <div class="col-xl-8 order-xl-1">
                    <!-- Breadcrumb -->
                    
                    <!-- Blogs -->
                    <div class="blog card-columns">
                        <?php $__currentLoopData = $blogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $blog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="card mb-4 overflow-hidden shadow-none border-0 rounded-2 hov-scale-img p-3">
                                <a href="<?php echo e(url('blog') . '/' . $blog->slug); ?>"
                                    class="text-reset d-block overflow-hidden h-180px">
                                    <img src="<?php echo e(static_asset('assets/img/placeholder-rect.jpg')); ?>"
                                        data-src="<?php echo e(uploaded_asset($blog->banner)); ?>" alt="<?php echo e($blog->title); ?>"
                                        class="img-fit lazyload h-100 has-transition"
                                        style="object-fit: cover;">
                                </a>
                                <div class="py-3">
                                    <div class="d-flex flex-row justify-content-between mb-2">
                                        <div>
                                            <small
                                                class="fs-12 fw-400"><?php echo e(date('M d, Y', strtotime($blog->created_at))); ?></small>
                                        </div>
                                        <?php if($blog->category != null): ?>
                                            <div>
                                                <small
                                                    class="fs-12 fw-400"><?php echo e($blog->category->category_name); ?></small>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                    <h2 class="fs-23 fw-700 mb-2 h-60px text-truncate-2">
                                        <a href="<?php echo e(url('blog') . '/' . $blog->slug); ?>" class="text-reset hov-text-primary" style="color: black !important"
                                            title="<?php echo e($blog->title); ?>">
                                            <?php echo e($blog->title); ?>

                                        </a>
                                    </h2>
                                    
                                    <div class="mt-3">
                                        <a href="<?php echo e(url('blog') . '/' . $blog->slug); ?>"
                                            class="fs-14 fw-700 has-transition d-flex align-items-center justify-content-center hov-column-gap-1">
                                            <?php echo e(translate('Read More')); ?>

                                            <i class="las las-2x la-arrow-right fs-24 ml-1"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </div>
                    <!-- Pagination -->
                    <div class="aiz-pagination mt-4">
                        <?php echo e($blogs->links()); ?>

                    </div>
                </div>

                <!-- Sidebar -->
                <div class="col-xl-4">

                    <!-- Filters -->
                    <form class="mb-4" id="search-form" action="" method="GET">
                        <div class="aiz-filter-sidebar collapse-sidebar-wrap sidebar-xl sidebar-right z-1035">
                            <div class="overlay overlay-fixed dark c-pointer" data-toggle="class-toggle"
                                data-target=".aiz-filter-sidebar" data-same=".filter-sidebar-thumb"></div>
                            <div class="collapse-sidebar c-scrollbar-light text-left" style="overflow-y: auto;">
                                <div class="d-flex d-xl-none justify-content-between align-items-center pl-3 border-bottom">
                                    <h3 class="h6 mb-0 fw-600"><?php echo e(translate('Filters')); ?></h3>
                                    <button type="button" class="btn btn-sm p-2 filter-sidebar-thumb"
                                        data-toggle="class-toggle" data-target=".aiz-filter-sidebar">
                                        <i class="las la-times la-2x"></i>
                                    </button>
                                </div>
                                <!-- Search -->
                                <div class="mb-4 mt-3 px-3 mt-xl-0 px-xl-0">
                                    <div class="input-group w-100">
                                        <input type="text" class="border border-right-0 rounded-0 fs-14 flex-grow-1"
                                            name="search" value="<?php echo e($search); ?>"
                                            placeholder="<?php echo e(translate('Search...')); ?>" autocomplete="off"
                                            style="padding: 14px;">
                                        <div class="input-group-append">
                                            <button class="btn bg-transparent hov-bg-light rounded-0 border border-left-0"
                                                type="submit" style="">
                                                <i class="la la-search la-flip-horizontal fs-18 text-gray"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>

                                <!-- recent posts -->
                                <div class="p-3">
                                    <h3 class="fs-23 fw-700 text-dark mb-3"><?php echo e(translate('Recent Posts')); ?></h3>
                                    <hr>
                                    <div class="row">
                                        <?php $__currentLoopData = $recent_blogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $recent_blog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="col-xl-12 col-lg-4 col-sm-6 mb-4 hov-scale-img">
                                                <div class="d-flex">
                                                    <div class="">
                                                        <a href="<?php echo e(url('blog') . '/' . $recent_blog->slug); ?>"
                                                            class="text-reset d-block overflow-hidden size-80px size-xl-90px mr-2">
                                                            <img src="<?php echo e(static_asset('assets/img/placeholder-rect.jpg')); ?>"
                                                                data-src="<?php echo e(uploaded_asset($recent_blog->banner)); ?>"
                                                                alt="<?php echo e($recent_blog->title); ?>"
                                                                class="img-fit lazyload h-100 has-transition rounded-2">
                                                        </a>
                                                    </div>
                                                    <div class="">
                                                        <h2 class="fs-18 fw-700 text-truncate-2">
                                                            <a href="<?php echo e(url('blog') . '/' . $recent_blog->slug); ?>"
                                                                class="text-reset hov-text-primary"
                                                                title="<?php echo e($recent_blog->title); ?>">
                                                                <?php echo e($recent_blog->title); ?>

                                                            </a>
                                                        </h2>
                                                        <?php if($recent_blog->category != null): ?>
                                                            <div class="mb-2 mb-xl-3">
                                                                <small
                                                                    class="fs-12 fw-400 opacity-70"><?php echo e($recent_blog->category->category_name); ?></small>
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

                                <!-- Categories -->
                                <div class="mb-3 mx-3 mx-xl-0">
                                    <div class="fs-23 fw-700 p-3"><?php echo e(translate('Categories')); ?></div>
                                    <div class="p-3 aiz-checkbox-list">
                                        <?php $__currentLoopData = get_all_blog_categories(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <label class="aiz-checkbox mb-3">
                                                <input type="checkbox" name="selected_categories[]"
                                                    value="<?php echo e($category->slug); ?>"
                                                    <?php if(in_array($category->slug, $selected_categories)): ?> checked <?php endif; ?> onchange="filter()">
                                                <span class="aiz-square-check"></span>
                                                <span
                                                    class="fs-14 fw-400 text-dark has-transition hov-text-primary"><?php echo e($category->category_name); ?></span>
                                            </label>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>
                                </div>

                                <!-- newsletter -->
                                <div class="mb-3 mx-3 mx-xl-0">
                                    <div class="fs-23 fw-700 px-3"><?php echo e(translate('Newsletter')); ?></div>
                                    <div class="p-3">
                                        <a href="mailto:lalteer@multimodebd.com"
                                            class="p-2 rounded-2 d-inline-flex align-items-center text-decoration-none"
                                            style="background-color: #86C440; color: inherit; margin-right: 10px !important;">
                                            <span>lalteer@multimodebd.com</span>
                                            <i class="fa-regular fa-envelope text-success ms-2"></i>
                                        </a>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </form>



                </div>

            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script type="text/javascript">
        function filter() {
            $('#search-form').submit();
        }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/laltktyh/organic.lalteer.com/resources/views/frontend/blog/listing.blade.php ENDPATH**/ ?>
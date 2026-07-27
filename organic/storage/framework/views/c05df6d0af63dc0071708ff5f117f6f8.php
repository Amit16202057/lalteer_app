<?php if(count($featured_categories) > 0): ?>
    <section class="mb-2 mb-md-3 mt-2 mt-md-3">
        <div class="">
            <div class="bg-white">
                <!-- Top Section -->
                <div class="d-flex mb-2 mb-md-3 align-items-baseline justify-content-between">
                    <!-- Title -->
                    
                    <!-- Links -->
                    
                </div>
            </div>
            <!-- Categories -->

            <div class="bg-white position-relative">
                <img width="100%" src="<?php echo e(static_asset('assets/img/home_category.jpg')); ?>" alt="" class="featured-categories-res-section-bg-img">

                <!-- Blurred background with white text for 'Exclusive' -->
                <div class="feature_title position-absolute top-50 start-50 translate-middle bg-opacity-50 text-white ">
                    <?php echo e(translate('Exclusive')); ?>

                </div>

                <!-- Category images with background overlay -->
                <div style="gap: 60px; margin-top: -170px"
                    class="position-relative bottom-0 start-0  d-flex align-items-center justify-content-center featured-categories-res-section"
                    style="background: rgba(0, 0, 0, 0.4);">
                    <?php $__currentLoopData = $featured_categories->take(4); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php
                            $category_name = $category->getTranslation('name');
                        ?>
                        <a href="<?php echo e(route('products.category', $category->slug)); ?>">
                            <div class="text-center category_" style="position: relative;">
                                <img src="<?php echo e(isset($category->bannerImage->file_name) ? my_asset($category->bannerImage->file_name) : static_asset('assets/img/placeholder.jpg')); ?>"
                                    class="lazyload h-auto mx-auto has-transition featured-categories-res-img"
                                    alt="<?php echo e($category->getTranslation('name')); ?>"
                                    onerror="this.onerror=null;this.src='<?php echo e(static_asset('assets/img/placeholder.jpg')); ?>';">
                                <div class="home_category_name">
                                    <?php echo e(translate($category->name)); ?>

                                </div>
                            </div>
                        </a>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>







        </div>
    </section>
<?php endif; ?>
<?php /**PATH /home/laltktyh/organic.lalteer.com/resources/views/frontend/classic/partials/featured_category.blade.php ENDPATH**/ ?>
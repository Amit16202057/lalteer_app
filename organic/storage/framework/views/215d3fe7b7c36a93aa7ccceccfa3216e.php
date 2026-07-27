<div class="sticky-top z-3 row gutters-10">
    <?php
        $photos = $detailedProduct->photos != null ? explode(',', $detailedProduct->photos) : [];
    ?>

    <!-- Gallery Images -->
    <div class="col-12 mt-4">
        <div class="aiz-carousel product-gallery arrow-inactive-transparent arrow-lg-none"
            data-nav-for='.product-gallery-thumb' data-fade='true' data-auto-height='true' data-arrows='true'>
            <?php if($detailedProduct->digital == 0): ?>
                <?php $__currentLoopData = $detailedProduct->stocks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $stock): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($stock->image != null): ?>
                        <div class="carousel-box img-zoom rounded-0">
                            <img class="product-details-big-img lazyload mx-auto"
                                src="<?php echo e(static_asset('assets/img/placeholder.jpg')); ?>"
                                data-src="<?php echo e(uploaded_asset($stock->image)); ?>"
                                onerror="this.onerror=null;this.src='<?php echo e(static_asset('assets/img/placeholder.jpg')); ?>';">
                        </div>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>

            <?php $__currentLoopData = $photos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $photo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="carousel-box img-zoom rounded-0">
                    <img class="product-details-big-img lazyload mx-auto"
                        src="<?php echo e(static_asset('assets/img/placeholder.jpg')); ?>" data-src="<?php echo e(uploaded_asset($photo)); ?>"
                        onerror="this.onerror=null;this.src='<?php echo e(static_asset('assets/img/placeholder.jpg')); ?>';">
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        </div>
    </div>
    <!-- Thumbnail Images -->
    <div class="col-12 mt-3 d-none d-lg-block">
        <div class="aiz-carousel half-outside-arrow product-gallery-thumb" data-items='7'
            data-nav-for='.product-gallery' data-focus-select='true' data-arrows='true' data-vertical='false'
            data-auto-height='true'>

            <?php if($detailedProduct->digital == 0): ?>
                <?php $__currentLoopData = $detailedProduct->stocks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $stock): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($stock->image != null): ?>
                        <div class="carousel-box c-pointer rounded-0" data-variation="<?php echo e($stock->variant); ?>">
                            <img class="lazyload mw-100 size-60px mx-auto  p-1"
                                src="<?php echo e(static_asset('assets/img/placeholder.jpg')); ?>"
                                data-src="<?php echo e(uploaded_asset($stock->image)); ?>"
                                onerror="this.onerror=null;this.src='<?php echo e(static_asset('assets/img/placeholder.jpg')); ?>';">
                        </div>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>

            <?php $__currentLoopData = $photos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $photo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="carousel-box c-pointer rounded-0">
                    <img class="lazyload mw-100 size-60px mx-auto  p-1"
                        src="<?php echo e(static_asset('assets/img/placeholder.jpg')); ?>" data-src="<?php echo e(uploaded_asset($photo)); ?>"
                        onerror="this.onerror=null;this.src='<?php echo e(static_asset('assets/img/placeholder.jpg')); ?>';">
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        </div>
    </div>


</div>
<?php /**PATH /home/laltktyh/organic.lalteer.com/resources/views/frontend/product_details/image_gallery.blade.php ENDPATH**/ ?>
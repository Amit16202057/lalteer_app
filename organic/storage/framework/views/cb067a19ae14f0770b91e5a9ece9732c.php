<?php $__env->startSection('content'); ?>
<?php
  $bradcamp = \App\Models\Page::where('page_name','about_us')->first();
 
?>
    <!-- Breadcrumb -->
    <section class="mb-1 pt-3">
        <div class="product-details-bredcrumb" style="position: relative; text-align: center;">
            <img src="<?php echo e(uploaded_asset($bradcamp->bradcamp_image)??static_asset('assets/img/Frame 1171276523.png')); ?>" alt=""
                style="width: 100%; height: 200px;">
            <h2
                style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); color: white; font-size: 26px;">
                <?php echo e(translate('About Us')); ?></h2>
        </div>
    </section>

    <!-- About Us Section -->
 <section style="background: url('<?php echo e(asset('public/assets/img/product_bg.jpg')); ?>') no-repeat center center/cover;">
    
            <div class="px-3 pt-3">
                <?php
                    $about_us_images = DB::table('business_settings')->where('type', 'about_us_images')->value('value');
                    $about_us_links = DB::table('business_settings')->where('type', 'about_us_links')->value('value');

                    $images = $about_us_images ? json_decode($about_us_images, true) : [];
                    $links = $about_us_links ? json_decode($about_us_links, true) : [];
                ?>

                <?php if(!empty($images)): ?>
                    <?php $__currentLoopData = $images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="row align-items-center mb-4">
                            <?php if($key % 2 == 1): ?>
                                <!-- Image on Left, Text on Right -->
                                <div class="col-md-6 d-flex justify-content-center">
                                    <img src="<?php echo e(uploaded_asset($image)); ?>" class="img-fluid rounded" alt="About Us Image">
                                </div>
                                <div class="col-md-6">
                                    <p class="about_us_title"><?php echo e(translate($links[$key] ?? '')); ?></p>
                                </div>
                            <?php else: ?>
                                <!-- Text on Left, Image on Right -->
                                <div class="col-md-6 order-md-2 d-flex justify-content-center">
                                    <img src="<?php echo e(uploaded_asset($image)); ?>" class="img-fluid rounded" alt="About Us Image">
                                </div>
                                <div class="col-md-6 order-md-1">
                                    <p class="about_us_title"><?php echo e(translate($links[$key] ?? '')); ?></p>
                                </div>
                            <?php endif; ?>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
            </div>
            
               <?php
                    $exclusive_shipping_images = json_decode(get_setting('exclusive_shipping_images', null, $lang), true);
                    $sliders = get_slider_images($exclusive_shipping_images);
                    $exclusive_shipping_links = get_setting('exclusive_shipping_links', null, $lang);
                    $exclusive_shipping_title1 = get_setting('exclusive_shipping_title1', null, $lang);
                    $exclusive_shipping_description = get_setting('exclusive_shipping_description', null, $lang);
                ?>
            
                <div class="below_slider" style= "top: 0px !important;">
                    <?php $__currentLoopData = $sliders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $slider): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="item_1">
                            <img src="<?php echo e($slider ? my_asset($slider->file_name) : static_asset('assets/img/placeholder.jpg')); ?>" alt="" style="width: 65px; height: 47px;">
                            <div class="ex_shipping"><?php echo e(isset(json_decode($exclusive_shipping_title1, true)[$key]) ? json_decode($exclusive_shipping_title1, true)[$key] : ''); ?></div>
                            <div class="ex_description"><?php echo e(isset(json_decode($exclusive_shipping_description, true)[$key]) ? json_decode($exclusive_shipping_description, true)[$key] : ''); ?></div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
      
    </section>
  
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/laltktyh/organic.lalteer.com/resources/views/frontend/about_us.blade.php ENDPATH**/ ?>
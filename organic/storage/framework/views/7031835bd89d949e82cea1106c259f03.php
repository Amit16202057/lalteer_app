

<?php $__env->startSection('content'); ?>
    <style>
        @media (max-width: 767px) {
            #flash_deal .flash-deals-baner {
                height: 203px !important;
            }
        }

        .text-overlay {
            height: 100%;
            position: absolute;
            top: 100px;
            left: 35px;
            z-index: 1;
        }
    </style>
    <?php $lang = get_system_language()->code;  ?>
    <!-- Sliders -->
    <?php echo $__env->make('frontend.classic.slider', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <!-- Today's deal -->
    

    <!-- Featured Categories -->

    <!-- Best Selling  -->
    <div id="section_best_selling">

    </div>
    <?php echo $__env->make('frontend.classic.partials.featured_category', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php echo $__env->make('frontend.classic.partials.flash_deal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- Featured Products -->
    <div id="section_featured" style="background: url('<?php echo e(asset('public/assets/img/product_bg.jpg')); ?>') no-repeat center center/cover;">

    </div>








    <!-- New Products -->
    

    <?php
        $ads_banner_images = json_decode(get_setting('ads_banner_images', null, $lang), true) ?? [];
        $sliders = get_slider_images($ads_banner_images) ?? [];
        $ads_banner_title1 = json_decode(get_setting('ads_banner_title1', null, $lang), true) ?? [];
        $ads_banner_title2 = json_decode(get_setting('ads_banner_title2', null, $lang), true) ?? [];
        $ads_banner_btn_text = json_decode(get_setting('ads_banner_btn_text', null, $lang), true) ?? [];
        $home_slider_links = json_decode(get_setting('home_slider_links', null, $lang), true) ?? [];
    ?>

    <div class="container-fluid">
        <div class="row">
            <?php $__currentLoopData = $sliders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $slider): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <?php if($key==0): ?>
                <div class="col-md-8 mb-4">
                    <div class="position-relative">
                        <div class="text-overlay top-50 start-50 text-white ads-banner-text-centent-sec">
                            <span><?php echo e($ads_banner_title1[$key] ?? ''); ?></span>
                            <h1 class="py-4"><?php echo e($ads_banner_title2[$key] ?? ''); ?></h1>
                            <a href="<?php echo e($home_slider_links[$key] ?? '#'); ?>" class="btn btn-light text-dark">
                                <?php echo e($ads_banner_btn_text[$key] ?? 'Click Here'); ?>

                            </a>
                        </div>
                        <img class="ads-banner-text-centent-sec-img" src="<?php echo e(isset($slider['file_name']) ? my_asset($slider['file_name']) : static_asset('assets/img/placeholder.jpg')); ?>"
                            alt="" style="width: 100%; height: 400px;">
                    </div>
                </div>
              <?php elseif($key==1): ?>
                <div class="col-md-4 mb-4">
                    <div class="position-relative">
                        <div class="text-overlay top-50 start-50 text-white ads-banner-text-centent-sec">
                            <span><?php echo e($ads_banner_title1[$key] ?? ''); ?></span>
                            <h1 class="py-4"><?php echo e($ads_banner_title2[$key] ?? ''); ?></h1>
                            <a href="<?php echo e($home_slider_links[$key] ?? '#'); ?>" class="btn btn-light text-dark">
                                <?php echo e($ads_banner_btn_text[$key] ?? 'Click Here'); ?>

                            </a>
                        </div>
                        <img class="ads-banner-text-centent-sec-img" src="<?php echo e(isset($slider['file_name']) ? my_asset($slider['file_name']) : static_asset('assets/img/placeholder.jpg')); ?>"
                            alt="" style="width: 100%; height: 400px;">
                    </div>
                </div>
              <?php elseif($key==2): ?>
                <div class="col-md-5 mb-4">
                    <div class="position-relative">
                        <div class="text-overlay top-50 start-50 text-white ads-banner-text-centent-sec">
                            <span><?php echo e($ads_banner_title1[$key] ?? ''); ?></span>
                            <h1 class="py-4"><?php echo e($ads_banner_title2[$key] ?? ''); ?></h1>
                            <a href="<?php echo e($home_slider_links[$key] ?? '#'); ?>" class="btn btn-light text-dark">
                                <?php echo e($ads_banner_btn_text[$key] ?? 'Click Here'); ?>

                            </a>
                        </div>
                        <img class="ads-banner-text-centent-sec-img" src="<?php echo e(isset($slider['file_name']) ? my_asset($slider['file_name']) : static_asset('assets/img/placeholder.jpg')); ?>"
                            alt="" style="width: 100%; height: 400px;">
                    </div>
                </div>
              <?php elseif($key==3): ?>
                <div class="col-md-7 mb-4">
                    <div class="position-relative">
                        <div class="text-overlay top-50 start-50 text-white ads-banner-text-centent-sec">
                            <span><?php echo e($ads_banner_title1[$key] ?? ''); ?></span>
                            <h1 class="py-4"><?php echo e($ads_banner_title2[$key] ?? ''); ?></h1>
                            <a href="<?php echo e($home_slider_links[$key] ?? '#'); ?>" class="btn btn-light text-dark">
                                <?php echo e($ads_banner_btn_text[$key] ?? 'Click Here'); ?>

                            </a>
                        </div>
                        <img class="ads-banner-text-centent-sec-img" src="<?php echo e(isset($slider['file_name']) ? my_asset($slider['file_name']) : static_asset('assets/img/placeholder.jpg')); ?>"
                            alt="" style="width: 100%; height: 400px;">
                    </div>
                </div>
            
             <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>




    <!-- Banner section 1 -->
    

    <!-- Banner Section 2 -->
    
    <!-- Banner Section 3 -->
    

    <!-- Auction Product -->
    <?php if(addon_is_activated('auction')): ?>
        <div id="auction_products">

        </div>
    <?php endif; ?>

    <!-- Cupon -->
    

    <!-- Category wise Products -->
    <div id="section_home_categories" class="mb-2 mb-md-3 mt-2 mt-md-3">

    </div>
    <!-- Classified Product -->
    <?php if(get_setting('classified_product') == 1): ?>
        <?php
            $classified_products = get_home_page_classified_products(6);
        ?>
        <?php if(count($classified_products) > 0): ?>
            <section class="mb-2 mb-md-3 mt-2 mt-md-3">
                <div class="container">
                    <!-- Top Section -->
                    <div class="d-flex mb-2 mb-md-3 align-items-baseline justify-content-between">
                        <!-- Title -->
                        <h3 class="fs-16 fs-md-20 fw-700 mb-2 mb-sm-0">
                            <span class=""><?php echo e(translate('Classified Ads')); ?></span>
                        </h3>
                        <!-- Links -->
                        <div class="d-flex">
                            <a class="text-blue fs-10 fs-md-12 fw-700 hov-text-primary animate-underline-primary"
                                href="<?php echo e(route('customer.products')); ?>"><?php echo e(translate('View All Products')); ?></a>
                        </div>
                    </div>
                    <!-- Banner -->
                    <?php
                        $classifiedBannerImage = get_setting('classified_banner_image', null, $lang);
                        $classifiedBannerImageSmall = get_setting('classified_banner_image_small', null, $lang);
                    ?>
                    <?php if($classifiedBannerImage != null || $classifiedBannerImageSmall != null): ?>
                        <div class="mb-3 overflow-hidden hov-scale-img d-none d-md-block">
                            <img src="<?php echo e(static_asset('assets/img/placeholder-rect.jpg')); ?>"
                                data-src="<?php echo e(uploaded_asset($classifiedBannerImage)); ?>" alt="<?php echo e(env('APP_NAME')); ?> promo"
                                class="lazyload img-fit h-100 has-transition"
                                onerror="this.onerror=null;this.src='<?php echo e(static_asset('assets/img/placeholder-rect.jpg')); ?>';">
                        </div>
                        <div class="mb-3 overflow-hidden hov-scale-img d-md-none">
                            <img src="<?php echo e(static_asset('assets/img/placeholder-rect.jpg')); ?>"
                                data-src="<?php echo e($classifiedBannerImageSmall != null ? uploaded_asset($classifiedBannerImageSmall) : uploaded_asset($classifiedBannerImage)); ?>"
                                alt="<?php echo e(env('APP_NAME')); ?> promo" class="lazyload img-fit h-100 has-transition"
                                onerror="this.onerror=null;this.src='<?php echo e(static_asset('assets/img/placeholder-rect.jpg')); ?>';">
                        </div>
                    <?php endif; ?>
                    <!-- Products Section -->
                    <div class="bg-white">
                        <div class="row no-gutters border-top border-left">
                            <?php $__currentLoopData = $classified_products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $classified_product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="col-xl-4 col-md-6 border-right border-bottom has-transition hov-shadow-out z-1">
                                    <div class="aiz-card-box p-2 has-transition bg-white">
                                        <div class="row hov-scale-img">
                                            <div class="col-4 col-md-5 mb-3 mb-md-0">
                                                <a href="<?php echo e(route('customer.product', $classified_product->slug)); ?>"
                                                    class="d-block overflow-hidden h-auto h-md-150px text-center">
                                                    <img class="img-fluid lazyload mx-auto has-transition"
                                                        src="<?php echo e(static_asset('assets/img/placeholder.jpg')); ?>"
                                                        data-src="<?php echo e(isset($classified_product->thumbnail->file_name) ? my_asset($classified_product->thumbnail->file_name) : static_asset('assets/img/placeholder.jpg')); ?>"
                                                        alt="<?php echo e($classified_product->getTranslation('name')); ?>"
                                                        onerror="this.onerror=null;this.src='<?php echo e(static_asset('assets/img/placeholder.jpg')); ?>';">
                                                </a>
                                            </div>
                                            <div class="col">
                                                <h3
                                                    class="fw-400 fs-14 text-dark text-truncate-2 lh-1-4 mb-3 h-35px d-none d-sm-block">
                                                    <a href="<?php echo e(route('customer.product', $classified_product->slug)); ?>"
                                                        class="d-block text-reset hov-text-primary"><?php echo e($classified_product->getTranslation('name')); ?></a>
                                                </h3>
                                                <div class="fs-14 mb-3">
                                                    <span
                                                        class="text-secondary"><?php echo e($classified_product->user ? $classified_product->user->name : ''); ?></span><br>
                                                    <span
                                                        class="fw-700 text-primary"><?php echo e(single_price($classified_product->unit_price)); ?></span>
                                                </div>
                                                <?php if($classified_product->conditon == 'new'): ?>
                                                    <span
                                                        class="badge badge-inline badge-soft-info fs-13 fw-700 p-3 text-info"
                                                        style="border-radius: 20px;"><?php echo e(translate('New')); ?></span>
                                                <?php elseif($classified_product->conditon == 'used'): ?>
                                                    <span
                                                        class="badge badge-inline badge-soft-danger fs-13 fw-700 p-3 text-danger"
                                                        style="border-radius: 20px;"><?php echo e(translate('Used')); ?></span>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                </div>
            </section>
        <?php endif; ?>
    <?php endif; ?>

    <!-- Top Sellers -->
    <?php if(get_setting('vendor_system_activation') == 1): ?>
        <?php
            $best_selers = get_best_sellers(10);
        ?>
        <?php if(count($best_selers) > 0): ?>
            <section class="mb-2 mb-md-3 mt-2 mt-md-3">
                <div class="container">
                    <!-- Top Section -->
                    <div class="d-flex mb-2 mb-md-3 align-items-baseline justify-content-between">
                        <!-- Title -->
                        <h3 class="fs-16 fs-md-20 fw-700 mb-2 mb-sm-0">
                            <span class="pb-3"><?php echo e(translate('Top Sellers')); ?></span>
                        </h3>
                        <!-- Links -->
                        <div class="d-flex">
                            <a class="text-blue fs-10 fs-md-12 fw-700 hov-text-primary animate-underline-primary"
                                href="<?php echo e(route('sellers')); ?>"><?php echo e(translate('View All Sellers')); ?></a>
                        </div>
                    </div>
                    <!-- Sellers Section -->
                    <div class="aiz-carousel arrow-x-0 arrow-inactive-none" data-items="5" data-xxl-items="5"
                        data-xl-items="4" data-lg-items="3.4" data-md-items="2.5" data-sm-items="2" data-xs-items="1.4"
                        data-arrows="true" data-dots="false">
                        <?php $__currentLoopData = $best_selers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $seller): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($seller->user != null): ?>
                                <div
                                    class="carousel-box h-100 position-relative text-center border-right border-top border-bottom <?php if($key == 0): ?> border-left <?php endif; ?> has-transition hov-animate-outline">
                                    <div class="position-relative px-3" style="padding-top: 2rem; padding-bottom:2rem;">
                                        <!-- Shop logo & Verification Status -->
                                        <div class="position-relative mx-auto size-100px size-md-120px">
                                            <a href="<?php echo e(route('shop.visit', $seller->slug)); ?>"
                                                class="d-flex mx-auto justify-content-center align-item-center size-100px size-md-120px border overflow-hidden hov-scale-img"
                                                tabindex="0"
                                                style="border: 1px solid #e5e5e5; border-radius: 50%; box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.06);">
                                                <img src="<?php echo e(static_asset('assets/img/placeholder-rect.jpg')); ?>"
                                                    data-src="<?php echo e(uploaded_asset($seller->logo)); ?>"
                                                    alt="<?php echo e($seller->name); ?>" class="img-fit lazyload has-transition"
                                                    onerror="this.onerror=null;this.src='<?php echo e(static_asset('assets/img/placeholder-rect.jpg')); ?>';">
                                            </a>
                                            <div class="absolute-top-right z-1 mr-md-2 mt-1 rounded-content bg-white">
                                                <?php if($seller->verification_status == 1): ?>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24.001" height="24"
                                                        viewBox="0 0 24.001 24">
                                                        <g id="Group_25929" data-name="Group 25929"
                                                            transform="translate(-480 -345)">
                                                            <circle id="Ellipse_637" data-name="Ellipse 637"
                                                                cx="12" cy="12" r="12"
                                                                transform="translate(480 345)" fill="#fff" />
                                                            <g id="Group_25927" data-name="Group 25927"
                                                                transform="translate(480 345)">
                                                                <path id="Union_5" data-name="Union 5"
                                                                    d="M0,12A12,12,0,1,1,12,24,12,12,0,0,1,0,12Zm1.2,0A10.8,10.8,0,1,0,12,1.2,10.812,10.812,0,0,0,1.2,12Zm1.2,0A9.6,9.6,0,1,1,12,21.6,9.611,9.611,0,0,1,2.4,12Zm5.115-1.244a1.083,1.083,0,0,0,0,1.529l3.059,3.059a1.081,1.081,0,0,0,1.529,0l5.1-5.1a1.084,1.084,0,0,0,0-1.53,1.081,1.081,0,0,0-1.529,0L11.339,13.05,9.045,10.756a1.082,1.082,0,0,0-1.53,0Z"
                                                                    transform="translate(0 0)" fill="#3490f3" />
                                                            </g>
                                                        </g>
                                                    </svg>
                                                <?php else: ?>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24.001" height="24"
                                                        viewBox="0 0 24.001 24">
                                                        <g id="Group_25929" data-name="Group 25929"
                                                            transform="translate(-480 -345)">
                                                            <circle id="Ellipse_637" data-name="Ellipse 637"
                                                                cx="12" cy="12" r="12"
                                                                transform="translate(480 345)" fill="#fff" />
                                                            <g id="Group_25927" data-name="Group 25927"
                                                                transform="translate(480 345)">
                                                                <path id="Union_5" data-name="Union 5"
                                                                    d="M0,12A12,12,0,1,1,12,24,12,12,0,0,1,0,12Zm1.2,0A10.8,10.8,0,1,0,12,1.2,10.812,10.812,0,0,0,1.2,12Zm1.2,0A9.6,9.6,0,1,1,12,21.6,9.611,9.611,0,0,1,2.4,12Zm5.115-1.244a1.083,1.083,0,0,0,0,1.529l3.059,3.059a1.081,1.081,0,0,0,1.529,0l5.1-5.1a1.084,1.084,0,0,0,0-1.53,1.081,1.081,0,0,0-1.529,0L11.339,13.05,9.045,10.756a1.082,1.082,0,0,0-1.53,0Z"
                                                                    transform="translate(0 0)" fill="red" />
                                                            </g>
                                                        </g>
                                                    </svg>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        <!-- Shop name -->
                                        <h2
                                            class="fs-14 fw-700 text-dark text-truncate-2 h-40px mt-3 mt-md-4 mb-0 mb-md-3">
                                            <a href="<?php echo e(route('shop.visit', $seller->slug)); ?>"
                                                class="text-reset hov-text-primary"
                                                tabindex="0"><?php echo e($seller->name); ?></a>
                                        </h2>
                                        <!-- Shop Rating -->
                                        <div class="rating rating-mr-2 text-dark mb-3">
                                            <?php echo e(renderStarRating($seller->rating)); ?>

                                            <span class="opacity-60 fs-14">(<?php echo e($seller->num_of_reviews); ?>

                                                <?php echo e(translate('Reviews')); ?>)</span>
                                        </div>
                                        <!-- Visit Button -->
                                        <a href="<?php echo e(route('shop.visit', $seller->slug)); ?>" class="btn-visit">
                                            <span class="circle" aria-hidden="true">
                                                <span class="icon arrow"></span>
                                            </span>
                                            <span class="button-text"><?php echo e(translate('Visit Store')); ?></span>
                                        </a>
                                    </div>
                                </div>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </section>
        <?php endif; ?>
    <?php endif; ?>

    <!-- Top Brands -->
    <?php if(get_setting('top_brands') != null): ?>
        <section class="mb-2 mb-md-3 mt-2 mt-md-3">
            <div class="container">
                <!-- Top Section -->
                <div class="d-flex mb-2 mb-md-3 align-items-baseline justify-content-between">
                    <!-- Title -->
                    <h3 class="fs-16 fs-md-20 fw-700 mb-2 mb-sm-0"><?php echo e(translate('Top Brands')); ?></h3>
                    <!-- Links -->
                    <div class="d-flex">
                        <a class="text-blue fs-10 fs-md-12 fw-700 hov-text-primary animate-underline-primary"
                            href="<?php echo e(route('brands.all')); ?>"><?php echo e(translate('View All Brands')); ?></a>
                    </div>
                </div>
                <!-- Brands Section -->
                <div class="bg-white px-3">
                    <div
                        class="row row-cols-xxl-6 row-cols-xl-6 row-cols-lg-4 row-cols-md-4 row-cols-3 gutters-16 border-top border-left">
                        <?php
                            $top_brands = json_decode(get_setting('top_brands'));
                            $brands = get_brands($top_brands);
                        ?>
                        <?php $__currentLoopData = $brands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div
                                class="col text-center border-right border-bottom hov-scale-img has-transition hov-shadow-out z-1">
                                <a href="<?php echo e(route('products.brand', $brand->slug)); ?>" class="d-block p-sm-3">
                                    <img src="<?php echo e($brand->logo != null ? uploaded_asset($brand->logo) : static_asset('assets/img/placeholder.jpg')); ?>"
                                        class="lazyload h-100 h-md-100px mx-auto has-transition p-2 p-sm-4 mw-100"
                                        alt="<?php echo e($brand->getTranslation('name')); ?>"
                                        onerror="this.onerror=null;this.src='<?php echo e(static_asset('assets/img/placeholder.jpg')); ?>';">
                                    <p class="text-center text-dark fs-12 fs-md-14 fw-700 mt-2">
                                        <?php echo e($brand->getTranslation('name')); ?>

                                    </p>
                                </a>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </div>
        </section>
    <?php endif; ?>
    <?php echo $__env->make('frontend.classic.partials.newsletter', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/laltktyh/organic.lalteer.com/resources/views/frontend/classic/index.blade.php ENDPATH**/ ?>
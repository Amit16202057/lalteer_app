<!-- Last Viewed Products  -->
<?php if(get_setting('last_viewed_product_activation') == 1 && Auth::check() && auth()->user()->user_type == 'customer'): ?>
    <div class="border-top" id="section_last_viewed_products" style="background-color: #fcfcfc;">
        <?php
            $lastViewedProducts = getLastViewedProducts();
        ?>
        <?php if(count($lastViewedProducts) > 0): ?>
            <section class="my-2 my-md-3">
                <div class="container">
                    <!-- Top Section -->
                    <div class="d-flex mb-2 mb-md-3 align-items-baseline justify-content-between">
                        <!-- Title -->
                        <h3 class="fs-16 fw-700 mb-2 mb-sm-0">
                            <span class=""><?php echo e(translate('Last Viewed Products')); ?></span>
                        </h3>
                        <!-- Links -->
                        <div class="d-flex">
                            <a type="button" class="arrow-prev slide-arrow link-disable text-secondary mr-2"
                                onclick="clickToSlide('slick-prev','section_last_viewed_products')"><i
                                    class="las la-angle-left fs-20 fw-600"></i></a>
                            <a type="button" class="arrow-next slide-arrow text-secondary ml-2"
                                onclick="clickToSlide('slick-next','section_last_viewed_products')"><i
                                    class="las la-angle-right fs-20 fw-600"></i></a>
                        </div>
                    </div>
                    <!-- Product Section -->
                    <div class="px-sm-3">
                        <div class="aiz-carousel slick-left sm-gutters-16 arrow-none" data-items="6" data-xl-items="5"
                            data-lg-items="4" data-md-items="3" data-sm-items="2" data-xs-items="2" data-arrows='true'
                            data-infinite='false'>
                            <?php $__currentLoopData = $lastViewedProducts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $lastViewedProduct): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div
                                    class="carousel-box px-3 position-relative has-transition hov-animate-outline border-right border-top border-bottom <?php if($key == 0): ?> border-left <?php endif; ?>">
                                    <?php echo $__env->make(
                                        'frontend.' . get_setting('homepage_select') . '.partials.product_box_1',
                                        ['product' => $lastViewedProduct->product]
                                    , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                </div>
            </section>
        <?php endif; ?>
    </div>
<?php endif; ?>

<!-- footer Description -->
<?php if(get_setting('footer_title') != null || get_setting('footer_description') != null): ?>
    <section class="bg-light border-top border-bottom mt-auto">
        <div class="container py-4">
            <h1 class="fs-18 fw-700 text-gray-dark mb-3"><?php echo e(get_setting('footer_title', null, $system_language->code)); ?>

            </h1>
            <p class="fs-13 text-gray-dark text-justify mb-0">
                <?php echo nl2br(get_setting('footer_description', null, $system_language->code)); ?>

            </p>
        </div>
    </section>
<?php endif; ?>

<!-- footer top Bar -->


<!-- footer subscription & icons -->
<section class="py-3 text-light footer-widget border-bottom"
    style="border-color: #3d3d46 !important; background-color: #EDEDED !important;">
    <div class="container">
        <!-- footer logo -->
        <div class="mt-3 mb-4">
            <a href="<?php echo e(route('home')); ?>" class="d-block">
                <?php if(get_setting('footer_logo') != null): ?>
                    <img class="lazyload h-45px" src="<?php echo e(static_asset('assets/img/placeholder-rect.jpg')); ?>"
                        data-src="<?php echo e(uploaded_asset(get_setting('footer_logo'))); ?>" alt="<?php echo e(env('APP_NAME')); ?>"
                        height="45">
                <?php else: ?>
                    <img class="lazyload h-45px" src="<?php echo e(static_asset('assets/img/placeholder-rect.jpg')); ?>"
                        data-src="<?php echo e(static_asset('assets/img/logo.png')); ?>" alt="<?php echo e(env('APP_NAME')); ?>" height="45">
                <?php endif; ?>
            </a>
        </div>
        <div class="row">
            <?php
                $col_values =
                    get_setting('vendor_system_activation') == 1 || addon_is_activated('delivery_boy')
                        ? 'col-lg-3 col-md-6 col-sm-6'
                        : 'col-md-4 col-sm-6';
            ?>
            <!-- about & subscription -->

            <div class="col-xl-3 col-lg-3">
                <div class="mb-4 text-dark text-justify">
                    <?php echo get_setting('about_us_description', null, App::getLocale()); ?>

                </div>
                
            </div>
            <div class="col-md-3">
                <!-- Quick links -->
                <div class="col-md-6 col-sm-6">
                    <div class=" text-sm-left mt-4">
                        <h4 class="fs-14 text-dark text-uppercase fw-700 mb-3">
                            <?php echo e(get_setting('widget_one', null, App::getLocale())); ?>

                        </h4>
                        <ul class="list-unstyled">
                            <?php if(get_setting('widget_one_labels', null, App::getLocale()) != null): ?>
                                <?php $__currentLoopData = json_decode(get_setting('widget_one_labels', null, App::getLocale()), true); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php
                                        $widget_one_links = '';
                                        if (isset(json_decode(get_setting('widget_one_links'), true)[$key])) {
                                            $widget_one_links = json_decode(get_setting('widget_one_links'), true)[
                                                $key
                                            ];
                                        }
                                    ?>
                                    <li class="mb-2">
                                        <a href="<?php echo e($widget_one_links); ?>"
                                            class="fs-13 text-dark animate-underline-white">
                                            <?php echo e($value); ?>

                                        </a>
                                    </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        </ul>
                    </div>
                </div>

            </div>


            <div class="col-md-3">
                <!-- My Account -->
                <div class="col-md-6 col-sm-6">
                    <div class="text-dark text-sm-left mt-4">
                        <h4 class="fs-14 text-dark text-uppercase fw-700 mb-3"><?php echo e(translate('Account')); ?></h4>
                        <ul class="list-unstyled">
                            <?php if(Auth::check()): ?>
                                <li class="mb-2">
                                    <a class="fs-13 text-dark animate-underline-white" href="<?php echo e(route('logout')); ?>">
                                        <?php echo e(translate('Logout')); ?>

                                    </a>
                                </li>
                            <?php else: ?>
                                <li class="mb-2">
                                    <a class="fs-13 text-dark animate-underline-white"
                                        href="<?php echo e(route('user.login')); ?>">
                                        <?php echo e(translate('Login')); ?>

                                    </a>
                                </li>
                            <?php endif; ?>
                            <li class="mb-2">
                                <a class="fs-13 text-dark animate-underline-white"
                                    href="<?php echo e(route('purchase_history.index')); ?>">
                                    <?php echo e(translate('Order History')); ?>

                                </a>
                            </li>
                            <li class="mb-2">
                                <a class="fs-13 text-dark animate-underline-white"
                                    href="<?php echo e(route('wishlists.index')); ?>">
                                    <?php echo e(translate('My Wishlist')); ?>

                                </a>
                            </li>
                            <li class="mb-2">
                                <a class="fs-13 text-dark animate-underline-white" href="<?php echo e(route('orders.track')); ?>">
                                    <?php echo e(translate('Track Order')); ?>

                                </a>
                            </li>
                            <?php if(addon_is_activated('affiliate_system')): ?>
                                <li class="mb-2">
                                    <a class="fs-13 text-dark animate-underline-white"
                                        href="<?php echo e(route('affiliate.apply')); ?>">
                                        <?php echo e(translate('Be an affiliate partner')); ?>

                                    </a>
                                </li>
                            <?php endif; ?>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-3">

                <!-- Contacts -->
                <div class="col-md-8 col-sm-6">
                    <div class="text-sm-left mt-4">
                        <h4 class="fs-14 text-dark text-uppercase fw-700 mb-3"><?php echo e(translate('Contacts')); ?></h4>
                        <ul class="list-unstyled">

                            <li class="mb-2">

                                <p class="d-flex fs-13 text-dark"><i class="fa-solid fa-phone pr-2 mt-1"></i>
                                    <?php echo e(get_setting('contact_phone')); ?></p>
                            </li>
                            <li class="mb-2">

                                <p class="">
                                    <a href="mailto:<?php echo e(get_setting('contact_email')); ?>"
                                        class="d-flex fs-13 text-dark hov-text-primary"><i
                                            class="fa-solid fa-envelope pr-2 mt-1"></i>
                                        <?php echo e(get_setting('contact_email')); ?></a>
                                </p>
                            </li>
                            <li class="mb-2">

                                <p class="d-flex fs-13 text-dark"><i class="fa-solid fa-location-dot mt-1 pr-2"></i>
                                    <?php echo e(get_setting('contact_address', null, App::getLocale())); ?></p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <!-- Payment Method Images -->
                <div class="text-left">
                    <p class="text-dark"><?php echo e(translate('We accept payments')); ?></p>
                    <ul class="list-inline mb-0">
                        <?php if(get_setting('payment_method_images') != null): ?>
                            <?php $__currentLoopData = explode(',', get_setting('payment_method_images')); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li class="list-inline-item mr-3">
                                    <img src="<?php echo e(uploaded_asset($value)); ?>" height="20" class="mw-100 h-auto"
                                        style="max-height: 20px" alt="<?php echo e(translate('payment_method')); ?>">
                                </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
            <!-- Follow & Apps -->
            <div class="col-xxl-3 col-xl-4 col-lg-4 pt-3">
                <!-- Social -->
                <?php if(get_setting('show_social_links')): ?>
                    <h5 class="fs-14 fw-700 text-secondary text-uppercase mt-3 mt-lg-0"><?php echo e(translate('Follow Us')); ?>

                    </h5>
                    <ul class="list-inline social colored mb-4">
                        <?php if(!empty(get_setting('facebook_link'))): ?>
                            <li class="list-inline-item ml-2 mr-2">
                                <a href="<?php echo e(get_setting('facebook_link')); ?>" target="_blank" class="facebook"><i
                                        class="lab la-facebook-f"></i></a>
                            </li>
                        <?php endif; ?>
                        <?php if(!empty(get_setting('twitter_link'))): ?>
                            <li class="list-inline-item ml-2 mr-2">
                                <a href="<?php echo e(get_setting('twitter_link')); ?>" target="_blank" class="twitter"><i
                                        class="lab la-twitter"></i></a>
                            </li>
                        <?php endif; ?>
                        <?php if(!empty(get_setting('instagram_link'))): ?>
                            <li class="list-inline-item ml-2 mr-2">
                                <a href="<?php echo e(get_setting('instagram_link')); ?>" target="_blank" class="instagram"><i
                                        class="lab la-instagram"></i></a>
                            </li>
                        <?php endif; ?>
                        <?php if(!empty(get_setting('youtube_link'))): ?>
                            <li class="list-inline-item ml-2 mr-2">
                                <a href="<?php echo e(get_setting('youtube_link')); ?>" target="_blank" class="youtube"><i
                                        class="lab la-youtube"></i></a>
                            </li>
                        <?php endif; ?>
                        <?php if(!empty(get_setting('linkedin_link'))): ?>
                            <li class="list-inline-item ml-2 mr-2">
                                <a href="<?php echo e(get_setting('linkedin_link')); ?>" target="_blank" class="linkedin"><i
                                        class="lab la-linkedin-in"></i></a>
                            </li>
                        <?php endif; ?>
                    </ul>
                <?php endif; ?>

                <!-- Apps link -->
                <?php if(get_setting('play_store_link') != null): ?>
                    <h5 class="fs-14 fw-700 text-dark text-uppercase mt-3"><?php echo e(translate('Download App')); ?></h5>
                    <div class="d-flex mt-3">
                        <div class="">
                            <a href="<?php echo e(get_setting('play_store_link')); ?>" target="_blank"
                                class="mr-2 mb-2 overflow-hidden hov-scale-img">
                                <img class="lazyload has-transition"
                                    src="<?php echo e(static_asset('assets/img/placeholder-rect.jpg')); ?>"
                                    data-src="<?php echo e(static_asset('assets/img/play.png')); ?>" alt="<?php echo e(env('APP_NAME')); ?>"
                                    height="44">
                            </a>
                        </div>
                        <?php if(get_setting('app_store_link') != null): ?>
                        <div class="">
                            <a href="<?php echo e(get_setting('app_store_link')); ?>" target="_blank"
                                class="overflow-hidden hov-scale-img">
                                <img class="lazyload has-transition"
                                    src="<?php echo e(static_asset('assets/img/placeholder-rect.jpg')); ?>"
                                    data-src="<?php echo e(static_asset('assets/img/app.png')); ?>" alt="<?php echo e(env('APP_NAME')); ?>"
                                    height="44">
                            </a>
                        </div>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>

            </div>
        </div>
    </div>
</section>




<!-- FOOTER -->
<footer style="background-color: #ededed" class=" text-dark">
    <div class="container">
        <div class="row align-items-center py-3">
            <!-- Copyright -->
            <div class="col-lg-12 d-flex justify-content-center">
                <div class="text-center text-lg-left fs-14" current-verison="<?php echo e(get_setting('current_version')); ?>">
                    <?php echo get_setting('frontend_copyright_text', null, App::getLocale()); ?>

                </div>
            </div>


        </div>
    </div>
</footer>

<!-- Mobile bottom nav -->
<div class="aiz-mobile-bottom-nav d-xl-none fixed-bottom border-top border-sm-bottom border-sm-left border-sm-right mx-auto mb-sm-2"
    style="background-color: rgb(255 255 255 / 90%)!important;">
    <div class="row align-items-center gutters-5">
        <!-- Home -->
        <div class="col">
            <a href="<?php echo e(route('home')); ?>"
                class="text-secondary d-block text-center pb-2 pt-3 <?php echo e(areActiveRoutes(['home'], 'svg-active')); ?>">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16">
                    <g id="Group_24768" data-name="Group 24768" transform="translate(3495.144 -602)">
                        <path id="Path_2916" data-name="Path 2916"
                            d="M15.3,5.4,9.561.481A2,2,0,0,0,8.26,0H7.74a2,2,0,0,0-1.3.481L.7,5.4A2,2,0,0,0,0,6.92V14a2,2,0,0,0,2,2H14a2,2,0,0,0,2-2V6.92A2,2,0,0,0,15.3,5.4M10,15H6V9A1,1,0,0,1,7,8H9a1,1,0,0,1,1,1Zm5-1a1,1,0,0,1-1,1H11V9A2,2,0,0,0,9,7H7A2,2,0,0,0,5,9v6H2a1,1,0,0,1-1-1V6.92a1,1,0,0,1,.349-.76l5.74-4.92A1,1,0,0,1,7.74,1h.52a1,1,0,0,1,.651.24l5.74,4.92A1,1,0,0,1,15,6.92Z"
                            transform="translate(-3495.144 602)" fill="#b5b5bf" />
                    </g>
                </svg>
                <span
                    class="d-block mt-1 fs-10 fw-600 text-reset <?php echo e(areActiveRoutes(['home'], 'text-primary')); ?>"><?php echo e(translate('Home')); ?></span>
            </a>
        </div>

        <!-- Categories -->
        <div class="col">
            <a href="<?php echo e(route('categories.all')); ?>"
                class="text-secondary d-block text-center pb-2 pt-3 <?php echo e(areActiveRoutes(['categories.all'], 'svg-active')); ?>">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16">
                    <g id="Group_25497" data-name="Group 25497" transform="translate(3373.432 -602)">
                        <path id="Path_2917" data-name="Path 2917"
                            d="M126.713,0h-5V5a2,2,0,0,0,2,2h3a2,2,0,0,0,2-2V2a2,2,0,0,0-2-2m1,5a1,1,0,0,1-1,1h-3a1,1,0,0,1-1-1V1h4a1,1,0,0,1,1,1Z"
                            transform="translate(-3495.144 602)" fill="#91919c" />
                        <path id="Path_2918" data-name="Path 2918"
                            d="M144.713,18h-3a2,2,0,0,0-2,2v3a2,2,0,0,0,2,2h5V20a2,2,0,0,0-2-2m1,6h-4a1,1,0,0,1-1-1V20a1,1,0,0,1,1-1h3a1,1,0,0,1,1,1Z"
                            transform="translate(-3504.144 593)" fill="#91919c" />
                        <path id="Path_2919" data-name="Path 2919"
                            d="M143.213,0a3.5,3.5,0,1,0,3.5,3.5,3.5,3.5,0,0,0-3.5-3.5m0,6a2.5,2.5,0,1,1,2.5-2.5,2.5,2.5,0,0,1-2.5,2.5"
                            transform="translate(-3504.144 602)" fill="#91919c" />
                        <path id="Path_2920" data-name="Path 2920"
                            d="M125.213,18a3.5,3.5,0,1,0,3.5,3.5,3.5,3.5,0,0,0-3.5-3.5m0,6a2.5,2.5,0,1,1,2.5-2.5,2.5,2.5,0,0,1-2.5,2.5"
                            transform="translate(-3495.144 593)" fill="#91919c" />
                    </g>
                </svg>
                <span
                    class="d-block mt-1 fs-10 fw-600 text-reset <?php echo e(areActiveRoutes(['categories.all'], 'text-primary')); ?>"><?php echo e(translate('Categories')); ?></span>
            </a>
        </div>

        <?php if(Auth::check() && auth()->user()->user_type == 'customer'): ?>
            <!-- Cart -->
            <?php
                $count = count(get_user_cart());
            ?>
            <div class="col-auto">
                <a href="<?php echo e(route('cart')); ?>"
                    class="text-secondary d-block text-center pb-2 pt-3 px-3 <?php echo e(areActiveRoutes(['cart'], 'svg-active')); ?>">
                    <span class="d-inline-block position-relative px-2">
                        <svg id="Group_25499" data-name="Group 25499" xmlns="http://www.w3.org/2000/svg"
                            xmlns:xlink="http://www.w3.org/1999/xlink" width="16.001" height="16"
                            viewBox="0 0 16.001 16">
                            <defs>
                                <clipPath id="clip-pathw">
                                    <rect id="Rectangle_1383" data-name="Rectangle 1383" width="16"
                                        height="16" fill="#91919c" />
                                </clipPath>
                            </defs>
                            <g id="Group_8095" data-name="Group 8095" transform="translate(0 0)"
                                clip-path="url(#clip-pathw)">
                                <path id="Path_2926" data-name="Path 2926"
                                    d="M8,24a2,2,0,1,0,2,2,2,2,0,0,0-2-2m0,3a1,1,0,1,1,1-1,1,1,0,0,1-1,1"
                                    transform="translate(-3 -11.999)" fill="#91919c" />
                                <path id="Path_2927" data-name="Path 2927"
                                    d="M24,24a2,2,0,1,0,2,2,2,2,0,0,0-2-2m0,3a1,1,0,1,1,1-1,1,1,0,0,1-1,1"
                                    transform="translate(-10.999 -11.999)" fill="#91919c" />
                                <path id="Path_2928" data-name="Path 2928"
                                    d="M15.923,3.975A1.5,1.5,0,0,0,14.5,2h-9a.5.5,0,1,0,0,1h9a.507.507,0,0,1,.129.017.5.5,0,0,1,.355.612l-1.581,6a.5.5,0,0,1-.483.372H5.456a.5.5,0,0,1-.489-.392L3.1,1.176A1.5,1.5,0,0,0,1.632,0H.5a.5.5,0,1,0,0,1H1.544a.5.5,0,0,1,.489.392L3.9,9.826A1.5,1.5,0,0,0,5.368,11h7.551a1.5,1.5,0,0,0,1.423-1.026Z"
                                    transform="translate(0 -0.001)" fill="#91919c" />
                            </g>
                        </svg>
                        <?php if($count > 0): ?>
                            <span
                                class="badge badge-sm badge-dot badge-circle badge-primary position-absolute absolute-top-right"
                                style="right: 5px;top: -2px;"></span>
                        <?php endif; ?>
                    </span>
                    <span
                        class="d-block mt-1 fs-10 fw-600 text-reset <?php echo e(areActiveRoutes(['cart'], 'text-primary')); ?>">
                        <?php echo e(translate('Cart')); ?>

                        (<span class="cart-count"><?php echo e($count); ?></span>)
                    </span>
                </a>
            </div>

            <!-- Notifications -->
            <div class="col">
                <a href="<?php echo e(route('customer.all-notifications')); ?>"
                    class="text-secondary d-block text-center pb-2 pt-3 <?php echo e(areActiveRoutes(['customer.all-notifications'], 'svg-active')); ?>">
                    <span class="d-inline-block position-relative px-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="13.6" height="16" viewBox="0 0 13.6 16">
                            <path id="ecf3cc267cd87627e58c1954dc6fbcc2"
                                d="M5.488,14.056a.617.617,0,0,0-.8-.016.6.6,0,0,0-.082.855A2.847,2.847,0,0,0,6.835,16h0l.174-.007a2.846,2.846,0,0,0,2.048-1.1h0l.053-.073a.6.6,0,0,0-.134-.782.616.616,0,0,0-.862.081,1.647,1.647,0,0,1-.334.331,1.591,1.591,0,0,1-2.222-.331H5.55ZM6.828,0C4.372,0,1.618,1.732,1.306,4.512h0v1.45A3,3,0,0,1,.6,7.37a.535.535,0,0,0-.057.077A3.248,3.248,0,0,0,0,9.088H0l.021.148a3.312,3.312,0,0,0,.752,2.2,3.909,3.909,0,0,0,2.5,1.232,32.525,32.525,0,0,0,7.1,0,3.865,3.865,0,0,0,2.456-1.232A3.264,3.264,0,0,0,13.6,9.249h0v-.1a3.361,3.361,0,0,0-.582-1.682h0L12.96,7.4a3.067,3.067,0,0,1-.71-1.408h0V4.54l-.039-.081a.612.612,0,0,0-1.132.208h0v1.45a.363.363,0,0,0,0,.077,4.21,4.21,0,0,0,.979,1.957,2.022,2.022,0,0,1,.312,1h0v.155a2.059,2.059,0,0,1-.468,1.373,2.656,2.656,0,0,1-1.661.788,32.024,32.024,0,0,1-6.87,0,2.663,2.663,0,0,1-1.7-.824,2.037,2.037,0,0,1-.447-1.33h0V9.151a2.1,2.1,0,0,1,.305-1.007A4.212,4.212,0,0,0,2.569,6.187a.363.363,0,0,0,0-.077h0V4.653a4.157,4.157,0,0,1,4.2-3.442,4.608,4.608,0,0,1,2.257.584h0l.084.042A.615.615,0,0,0,9.649,1.8.6.6,0,0,0,9.624.739,5.8,5.8,0,0,0,6.828,0Z"
                                fill="#91919b" />
                        </svg>
                        <?php if(Auth::check() && count(Auth::user()->unreadNotifications) > 0): ?>
                            <span
                                class="badge badge-sm badge-dot badge-circle badge-primary position-absolute absolute-top-right"
                                style="right: 5px;top: -2px;"></span>
                        <?php endif; ?>
                    </span>
                    <span
                        class="d-block mt-1 fs-10 fw-600 text-reset <?php echo e(areActiveRoutes(['customer.all-notifications'], 'text-primary')); ?>"><?php echo e(translate('Notifications')); ?></span>
                </a>
            </div>
        <?php endif; ?>

        <!-- Account -->
        <div class="col">
            <?php if(Auth::check()): ?>
                <?php if(isAdmin()): ?>
                    <a href="<?php echo e(route('admin.dashboard')); ?>" class="text-secondary d-block text-center pb-2 pt-3">
                        <span class="d-block mx-auto">
                            <?php if($user->avatar_original != null): ?>
                                <img src="<?php echo e($user_avatar); ?>" alt="<?php echo e(translate('avatar')); ?>"
                                    class="rounded-circle size-20px">
                            <?php else: ?>
                                <img src="<?php echo e(static_asset('assets/img/avatar-place.png')); ?>"
                                    alt="<?php echo e(translate('avatar')); ?>" class="rounded-circle size-20px">
                            <?php endif; ?>
                        </span>
                        <span class="d-block mt-1 fs-10 fw-600 text-reset"><?php echo e(translate('My Account')); ?></span>
                    </a>
                <?php elseif(isSeller()): ?>
                    <a href="<?php echo e(route('dashboard')); ?>" class="text-secondary d-block text-center pb-2 pt-3">
                        <span class="d-block mx-auto">
                            <?php if($user->avatar_original != null): ?>
                                <img src="<?php echo e($user_avatar); ?>" alt="<?php echo e(translate('avatar')); ?>"
                                    class="rounded-circle size-20px">
                            <?php else: ?>
                                <img src="<?php echo e(static_asset('assets/img/avatar-place.png')); ?>"
                                    alt="<?php echo e(translate('avatar')); ?>" class="rounded-circle size-20px">
                            <?php endif; ?>
                        </span>
                        <span class="d-block mt-1 fs-10 fw-600 text-reset"><?php echo e(translate('My Account')); ?></span>
                    </a>
                <?php else: ?>
                    <a href="javascript:void(0)"
                        class="text-secondary d-block text-center pb-2 pt-3 mobile-side-nav-thumb"
                        data-toggle="class-toggle" data-backdrop="static" data-target=".aiz-mobile-side-nav">
                        <span class="d-block mx-auto">
                            <?php if($user->avatar_original != null): ?>
                                <img src="<?php echo e($user_avatar); ?>" alt="<?php echo e(translate('avatar')); ?>"
                                    class="rounded-circle size-20px">
                            <?php else: ?>
                                <img src="<?php echo e(static_asset('assets/img/avatar-place.png')); ?>"
                                    alt="<?php echo e(translate('avatar')); ?>" class="rounded-circle size-20px">
                            <?php endif; ?>
                        </span>
                        <span class="d-block mt-1 fs-10 fw-600 text-reset"><?php echo e(translate('My Account')); ?></span>
                    </a>
                <?php endif; ?>
            <?php else: ?>
                <a href="<?php echo e(route('user.login')); ?>" class="text-secondary d-block text-center pb-2 pt-3">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16">
                        <g id="Group_8094" data-name="Group 8094" transform="translate(3176 -602)">
                            <path id="Path_2924" data-name="Path 2924"
                                d="M331.144,0a4,4,0,1,0,4,4,4,4,0,0,0-4-4m0,7a3,3,0,1,1,3-3,3,3,0,0,1-3,3"
                                transform="translate(-3499.144 602)" fill="#b5b5bf" />
                            <path id="Path_2925" data-name="Path 2925"
                                d="M332.144,20h-10a3,3,0,0,0,0,6h10a3,3,0,0,0,0-6m0,5h-10a2,2,0,0,1,0-4h10a2,2,0,0,1,0,4"
                                transform="translate(-3495.144 592)" fill="#b5b5bf" />
                        </g>
                    </svg>
                    <span class="d-block mt-1 fs-10 fw-600 text-reset"><?php echo e(translate('My Account')); ?></span>
                </a>
            <?php endif; ?>
        </div>

    </div>
</div>

<?php if(Auth::check() && auth()->user()->user_type == 'customer'): ?>
    <!-- User Side nav -->
    <div class="aiz-mobile-side-nav collapse-sidebar-wrap sidebar-xl d-xl-none z-1035">
        <div class="overlay dark c-pointer overlay-fixed" data-toggle="class-toggle" data-backdrop="static"
            data-target=".aiz-mobile-side-nav" data-same=".mobile-side-nav-thumb"></div>
        <div class="collapse-sidebar bg-white">
            <?php echo $__env->make('frontend.inc.user_side_nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
    </div>
<?php endif; ?>
<?php /**PATH /home/laltktyh/organic.lalteer.com/resources/views/frontend/inc/footer.blade.php ENDPATH**/ ?>
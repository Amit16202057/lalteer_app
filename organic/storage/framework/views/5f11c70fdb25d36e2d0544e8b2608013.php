<!DOCTYPE html>

<?php
    $rtl = get_session_language()->rtl;
?>

<?php if($rtl == 1): ?>
    <html dir="rtl" lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<?php else: ?>
    <html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<?php endif; ?>

<head>
     <?php echo $__env->make('partials.analytics', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <meta name="app-url" content="<?php echo e(getBaseURL()); ?>">
    <meta name="file-base-url" content="<?php echo e(getFileBaseURL()); ?>">

    <title><?php echo $__env->yieldContent('meta_title', get_setting('website_name') . ' | ' . get_setting('site_motto')); ?></title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="index, follow">
    <meta name="description" content="<?php echo $__env->yieldContent('meta_description', get_setting('meta_description')); ?>" />
    <meta name="keywords" content="<?php echo $__env->yieldContent('meta_keywords', get_setting('meta_keywords')); ?>">

    <?php echo $__env->yieldContent('meta'); ?>

    <?php if(!isset($detailedProduct) && !isset($customer_product) && !isset($shop) && !isset($page) && !isset($blog)): ?>
        <?php
            $meta_image = uploaded_asset(get_setting('meta_image'));
        ?>
        <!-- Schema.org markup for Google+ -->
        <meta itemprop="name" content="<?php echo e(get_setting('meta_title')); ?>">
        <meta itemprop="description" content="<?php echo e(get_setting('meta_description')); ?>">
        <meta itemprop="image" content="<?php echo e($meta_image); ?>">

        <!-- Twitter Card data -->
        <meta name="twitter:card" content="product">
        <meta name="twitter:site" content="@publisher_handle">
        <meta name="twitter:title" content="<?php echo e(get_setting('meta_title')); ?>">
        <meta name="twitter:description" content="<?php echo e(get_setting('meta_description')); ?>">
        <meta name="twitter:creator" content="@author_handle">
        <meta name="twitter:image" content="<?php echo e($meta_image); ?>">

        <!-- Open Graph data -->
        <meta property="og:title" content="<?php echo e(get_setting('meta_title')); ?>" />
        <meta property="og:type" content="website" />
        <meta property="og:url" content="<?php echo e(route('home')); ?>" />
        <meta property="og:image" content="<?php echo e($meta_image); ?>" />
        <meta property="og:description" content="<?php echo e(get_setting('meta_description')); ?>" />
        <meta property="og:site_name" content="<?php echo e(env('APP_NAME')); ?>" />
        <meta property="fb:app_id" content="<?php echo e(env('FACEBOOK_PIXEL_ID')); ?>">
    <?php endif; ?>

    <!-- Favicon -->
    <?php
        $site_icon = uploaded_asset(get_setting('site_icon'));
    ?>
    <link rel="icon" href="<?php echo e($site_icon); ?>">
    <link rel="apple-touch-icon" href="<?php echo e($site_icon); ?>">
    <link rel="apple-touch-startup-image" href="<?php echo e(static_asset('assets/img/app.png')); ?>">
    <link rel="manifest" href="<?php echo e(route('manifest')); ?>">
    <meta name="theme-color" content="#28a745">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <!-- CSS Files -->
    <link rel="stylesheet" href="<?php echo e(static_asset('assets/css/vendors.css')); ?>">
    <?php if($rtl == 1): ?>
        <link rel="stylesheet" href="<?php echo e(static_asset('assets/css/bootstrap-rtl.min.css')); ?>">
    <?php endif; ?>
    <link rel="stylesheet" href="<?php echo e(static_asset('assets/css/aiz-core.css?v=')); ?><?php echo e(rand(1000, 9999)); ?>">
    <link rel="stylesheet" href="<?php echo e(static_asset('assets/css/custom-style.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(static_asset('assets/css/all.min.css')); ?>">

<link rel="stylesheet" href="<?php echo e(static_asset('assets/css/styleHim.css?v4')); ?>">
<link rel="stylesheet" href="<?php echo e(static_asset('assets/css/styleMasum.css')); ?>">
<link rel="stylesheet" href="<?php echo e(static_asset('assets/css/responsiveHim.css?v1')); ?>">
    <script>
        var AIZ = AIZ || {};
        AIZ.local = {
            nothing_selected: '<?php echo translate('Nothing selected', null, true); ?>',
            nothing_found: '<?php echo translate('Nothing found', null, true); ?>',
            choose_file: '<?php echo e(translate('Choose file')); ?>',
            file_selected: '<?php echo e(translate('File selected')); ?>',
            files_selected: '<?php echo e(translate('Files selected')); ?>',
            add_more_files: '<?php echo e(translate('Add more files')); ?>',
            adding_more_files: '<?php echo e(translate('Adding more files')); ?>',
            drop_files_here_paste_or: '<?php echo e(translate('Drop files here, paste or')); ?>',
            browse: '<?php echo e(translate('Browse')); ?>',
            upload_complete: '<?php echo e(translate('Upload complete')); ?>',
            upload_paused: '<?php echo e(translate('Upload paused')); ?>',
            resume_upload: '<?php echo e(translate('Resume upload')); ?>',
            pause_upload: '<?php echo e(translate('Pause upload')); ?>',
            retry_upload: '<?php echo e(translate('Retry upload')); ?>',
            cancel_upload: '<?php echo e(translate('Cancel upload')); ?>',
            uploading: '<?php echo e(translate('Uploading')); ?>',
            processing: '<?php echo e(translate('Processing')); ?>',
            complete: '<?php echo e(translate('Complete')); ?>',
            file: '<?php echo e(translate('File')); ?>',
            files: '<?php echo e(translate('Files')); ?>',
        }
    </script>

    <style>
        :root{
            --blue: #3490f3;
            --hov-blue: #2e7fd6;
            --soft-blue: rgba(0, 123, 255, 0.15);
            --secondary-base: <?php echo e(get_setting('secondary_base_color', '#ffc519')); ?>;
            --hov-secondary-base: <?php echo e(get_setting('secondary_base_hov_color', '#dbaa17')); ?>;
            --soft-secondary-base: <?php echo e(hex2rgba(get_setting('secondary_base_color', '#ffc519'), 0.15)); ?>;
            --gray: #9d9da6;
            --gray-dark: #8d8d8d;
            --secondary: #919199;
            --soft-secondary: rgba(145, 145, 153, 0.15);
            --success: #367736;
            --soft-success: rgba(133, 181, 103, 0.15);
            --warning: #f3af3d;
            --soft-warning: rgba(243, 175, 61, 0.15);
            --light: #f5f5f5;
            --soft-light: #dfdfe6;
            --soft-white: #b5b5bf;
            --dark: #292933;
            --soft-dark: #1b1b28;
            --primary: <?php echo e(get_setting('base_color', '#86C440')); ?>;
            --hov-primary: <?php echo e(get_setting('base_hov_color', '#9d1b1a')); ?>;
            --soft-primary: <?php echo e(hex2rgba(get_setting('base_color', '#d43533'), 0.15)); ?>;
        }
        body{
            font-family: 'Public Sans', sans-serif;
            font-weight: 400;
        }

        .pagination .page-link,
        .page-item.disabled .page-link {
            min-width: 32px;
            min-height: 32px;
            line-height: 32px;
            text-align: center;
            padding: 0;
            border: 1px solid var(--soft-light);
            font-size: 0.875rem;
            border-radius: 0 !important;
            color: var(--dark);
        }
        .pagination .page-item {
            margin: 0 5px;
        }

        .form-control:focus {
            border-width: 2px !important;
        }
        .iti__flag-container {
            padding: 2px;
        }
        .modal-content {
            border: 0 !important;
            border-radius: 0 !important;
        }

        .tagify.tagify--focus{
            border-width: 2px;
            border-color: var(--primary);
        }

        #map{
            width: 100%;
            height: 250px;
        }
        #edit_map{
            width: 100%;
            height: 250px;
        }

        .pac-container { z-index: 100000; }
    </style>

<?php if(get_setting('google_analytics') == 1): ?>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=<?php echo e(env('TRACKING_ID')); ?>"></script>

    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        gtag('config', '<?php echo e(env('TRACKING_ID')); ?>');
    </script>
<?php endif; ?>

<?php if(get_setting('facebook_pixel') == 1): ?>
    <!-- Facebook Pixel Code -->
    <script>
        !function(f,b,e,v,n,t,s)
        {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
        n.callMethod.apply(n,arguments):n.queue.push(arguments)};
        if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
        n.queue=[];t=b.createElement(e);t.async=!0;
        t.src=v;s=b.getElementsByTagName(e)[0];
        s.parentNode.insertBefore(t,s)}(window, document,'script',
        'https://connect.facebook.net/en_US/fbevents.js');
        fbq('init', '<?php echo e(env('FACEBOOK_PIXEL_ID')); ?>');
        fbq('track', 'PageView');
    </script>
    <noscript>
        <img height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id=<?php echo e(env('FACEBOOK_PIXEL_ID')); ?>&ev=PageView&noscript=1"/>
    </noscript>
    <!-- End Facebook Pixel Code -->
<?php endif; ?>

<?php
    echo get_setting('header_script');
?>

</head>
<body>
    <!-- Splash Screen -->
    <div id="splash-screen" style="position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(255, 255, 255, 0.95); z-index: 9999; display: flex; align-items: center; justify-content: center; backdrop-filter: blur(2px);">
        <img src="<?php echo e($site_icon); ?>" alt="Logo" id="splash-logo" style="max-width: 200px; max-height: 200px; animation: bounce 2s infinite;">
    </div>

    <style>
        @keyframes bounce {
            0%, 20%, 50%, 80%, 100% {
                transform: translateY(0);
            }
            40% {
                transform: translateY(-30px);
            }
            60% {
                transform: translateY(-15px);
            }
        }

        #splash-screen {
            transition: all 1.5s ease-out;
        }

        #splash-screen.fade-out {
            background: rgba(255, 255, 255, 0) !important;
            backdrop-filter: blur(0px) !important;
        }

        #splash-logo {
            transition: opacity 1s ease-out;
        }

        #splash-screen.fade-out #splash-logo {
            opacity: 0;
            animation: none;
        }
    </style>

    <!-- aiz-main-wrapper -->
    <div class="aiz-main-wrapper d-flex flex-column bg-white">
        <?php
            $user = auth()->user();
            $user_avatar = null;
            $carts = [];
            if ($user && $user->avatar_original != null) {
                $user_avatar = uploaded_asset($user->avatar_original);
            }

            $system_language = get_system_language();
        ?>
        <!-- Header -->
        <?php echo $__env->make('frontend.inc.nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <?php echo $__env->yieldContent('content'); ?>

        <!-- footer -->
        <?php echo $__env->make('frontend.inc.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    </div>

    <?php if(get_setting('use_floating_buttons') == 1): ?>
        <!-- Floating Buttons -->
        <?php echo $__env->make('frontend.inc.floating_buttons', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>

    <div class="aiz-refresh">
        <div class="aiz-refresh-content"><div></div><div></div><div></div></div>
    </div>


    <?php if(env('DEMO_MODE') == 'On'): ?>
        <!-- demo nav -->
        <?php echo $__env->make('frontend.inc.demo_nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>

    <!-- cookies agreement -->
    <?php
        $alert_location = get_setting('custom_alert_location');
        $order = in_array($alert_location, ['top-left', 'top-right']) ? 'asc' : 'desc';
        $custom_alerts = App\Models\CustomAlert::where('status', 1)->orderBy('id', $order)->get();
    ?>

    <div class="aiz-custom-alert <?php echo e(get_setting('custom_alert_location')); ?>">
        <?php $__currentLoopData = $custom_alerts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $custom_alert): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if($custom_alert->id == 1): ?>
                <div class="aiz-cookie-alert mb-3" style="box-shadow: 0px 6px 10px rgba(0, 0, 0, 0.24);">
                    <div class="p-3 px-lg-2rem rounded-0" style="background: <?php echo e($custom_alert->background_color); ?>;">
                        <div class="text-<?php echo e($custom_alert->text_color); ?> mb-3">
                            <?php echo $custom_alert->description; ?>

                        </div>
                        <button class="btn btn-block btn-primary rounded-0 aiz-cookie-accept">
                            <?php echo e(translate('Ok. I Understood')); ?>

                        </button>
                    </div>
                </div>
            <?php else: ?>
                <div class="mb-3 custom-alert-box removable-session d-none" data-key="custom-alert-box-<?php echo e($custom_alert->id); ?>" data-value="removed" style="box-shadow: 0px 6px 10px rgba(0, 0, 0, 0.24);">
                    <div class="rounded-0 position-relative" style="background: <?php echo e($custom_alert->background_color); ?>;">
                        <a href="<?php echo e($custom_alert->link); ?>" class="d-block h-100 w-100">
                            <div class="<?php if($custom_alert->type == 'small'): ?> d-flex <?php endif; ?>">
                                <img class="<?php if($custom_alert->type == 'small'): ?> h-140px w-120px img-fit <?php else: ?> w-100 <?php endif; ?>" src="<?php echo e(uploaded_asset($custom_alert->banner)); ?>" alt="custom_alert">
                                <div class="text-<?php echo e($custom_alert->text_color); ?> p-2rem">
                                    <?php echo $custom_alert->description; ?>

                                </div>
                            </div>
                        </a>
                        <button class="absolute-top-right bg-transparent btn btn-circle btn-icon d-flex align-items-center justify-content-center text-<?php echo e($custom_alert->text_color); ?> hov-text-primary set-session" data-key="custom-alert-box-<?php echo e($custom_alert->id); ?>" data-value="removed" data-toggle="remove-parent" data-parent=".custom-alert-box">
                            <i class="la la-close fs-20"></i>
                        </button>
                    </div>
                </div>
            <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>

    <!-- website popup -->
    <?php
        $dynamic_popups = App\Models\DynamicPopup::where('status', 1)->orderBy('id', 'asc')->get();
    ?>
    <?php $__currentLoopData = $dynamic_popups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $dynamic_popup): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php if($dynamic_popup->id == 1): ?>
            <div class="modal website-popup removable-session d-none" data-key="website-popup" data-value="removed">
                <div class="absolute-full bg-black opacity-60"></div>
                <div class="modal-dialog modal-dialog-centered modal-dialog-zoom modal-md mx-4 mx-md-auto">
                    <div class="modal-content position-relative border-0 rounded-0">
                        <div class="aiz-editor-data">
                            <div class="d-block">
                                <img class="w-100" src="<?php echo e(uploaded_asset($dynamic_popup->banner)); ?>" alt="dynamic_popup">
                            </div>
                        </div>
                        <div class="pb-5 pt-4 px-3 px-md-2rem">
                            <h1 class="fs-30 fw-700 text-dark"><?php echo e(translate($dynamic_popup->title)); ?></h1>
                            <p class="fs-14 fw-400 mt-3 mb-4"><?php echo e(translate($dynamic_popup->summary)); ?></p>
                            <?php if($dynamic_popup->show_subscribe_form == 'on'): ?>
                                <form class="" method="POST" action="<?php echo e(route('subscribers.store')); ?>">
                                    <?php echo csrf_field(); ?>
                                    <div class="form-group mb-0">
                                        <input type="email" class="form-control" placeholder="<?php echo e(translate('Your Email Address')); ?>" name="email" required>
                                    </div>
                                    <button type="submit" class="btn btn-block mt-3 rounded-0 text-<?php echo e($dynamic_popup->btn_text_color); ?>" style="background: <?php echo e($dynamic_popup->btn_background_color); ?>;">
                                        <?php echo e(translate($dynamic_popup->btn_text)); ?>

                                    </button>
                                </form>
                            <?php endif; ?>
                        </div>
                        <button class="absolute-top-right bg-white shadow-lg btn btn-circle btn-icon mr-n3 mt-n3 set-session" data-key="website-popup" data-value="removed" data-toggle="remove-parent" data-parent=".website-popup">
                            <i class="la la-close fs-20"></i>
                        </button>
                    </div>
                </div>
            </div>
        <?php else: ?>
            <div class="modal website-popup removable-session d-none" data-key="website-popup-<?php echo e($dynamic_popup->id); ?>" data-value="removed">
                <div class="absolute-full bg-black opacity-60"></div>
                <div class="modal-dialog modal-dialog-centered modal-dialog-zoom modal-md mx-4 mx-md-auto">
                    <div class="modal-content position-relative border-0 rounded-0">
                        <div class="aiz-editor-data">
                            <div class="d-block">
                                <img class="w-100" src="<?php echo e(uploaded_asset($dynamic_popup->banner)); ?>" alt="dynamic_popup">
                            </div>
                        </div>
                        <div class="pb-5 pt-4 px-3 px-md-2rem">
                            <h1 class="fs-30 fw-700 text-dark"><?php echo e(translate($dynamic_popup->title)); ?></h1>
                            <p class="fs-14 fw-400 mt-3 mb-4"><?php echo e(translate($dynamic_popup->summary)); ?></p>
                            <a href="<?php echo e($dynamic_popup->btn_link); ?>" class="btn btn-block mt-3 rounded-0 text-<?php echo e($dynamic_popup->btn_text_color); ?>" style="background: <?php echo e($dynamic_popup->btn_background_color); ?>;">
                                <?php echo e($dynamic_popup->btn_text); ?>

                            </a>
                        </div>
                        <button class="absolute-top-right bg-white shadow-lg btn btn-circle btn-icon mr-n3 mt-n3 set-session" data-key="website-popup-<?php echo e($dynamic_popup->id); ?>" data-value="removed" data-toggle="remove-parent" data-parent=".website-popup">
                            <i class="la la-close fs-20"></i>
                        </button>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    <?php echo $__env->make('frontend.partials.modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php echo $__env->make('frontend.partials.account_delete_modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <div class="modal fade" id="addToCart">
        <div style="max-width:550px" class="modal-dialog  modal-dialog-centered modal-dialog-zoom product-modal" id="modal-size" role="document">
            <div class="modal-content position-relative">
                <div class="c-preloader text-center p-3">
                    <i class="las la-spinner la-spin la-3x"></i>
                </div>
                <button type="button" class="close absolute-top-right btn-icon close z-1 btn-circle bg-gray mr-2 mt-2 d-flex justify-content-center align-items-center" data-dismiss="modal" aria-label="Close" style="background: #ededf2; width: calc(2rem + 2px); height: calc(2rem + 2px);">
                    <span aria-hidden="true" class="fs-24 fw-700" style="margin-left: 2px;">&times;</span>
                </button>
                <div id="addToCart-modal-body">

                </div>
            </div>
        </div>
    </div>

    <?php echo $__env->yieldContent('modal'); ?>

    <!-- SCRIPTS -->
    <script src="<?php echo e(static_asset('assets/js/vendors.js')); ?>"></script>
    <script src="<?php echo e(static_asset('assets/js/aiz-core.js?v=')); ?><?php echo e(rand(1000, 9999)); ?>"></script>

<script src="<?php echo e(static_asset('assets/js/all.min.js')); ?>"></script>
    <?php if(get_setting('facebook_chat') == 1): ?>
        <script type="text/javascript">
            window.fbAsyncInit = function() {
                FB.init({
                  xfbml            : true,
                  version          : 'v3.3'
                });
              };

              (function(d, s, id) {
              var js, fjs = d.getElementsByTagName(s)[0];
              if (d.getElementById(id)) return;
              js = d.createElement(s); js.id = id;
              js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js';
              fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));
        </script>
        <div id="fb-root"></div>
        <!-- Your customer chat code -->
        <div class="fb-customerchat"
          attribution=setup_tool
          page_id="<?php echo e(env('FACEBOOK_PAGE_ID')); ?>">
        </div>
    <?php endif; ?>

    <script>
        <?php $__currentLoopData = session('flash_notification', collect())->toArray(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            AIZ.plugins.notify('<?php echo e($message['level']); ?>', '<?php echo e($message['message']); ?>');
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </script>

    <script>
        var checked = false;
        <?php if(Route::currentRouteName() == 'home' || Route::currentRouteName() == '/'): ?>

            $.post('<?php echo e(route('home.section.featured')); ?>', {
                _token: '<?php echo e(csrf_token()); ?>'
            }, function(data) {
                $('#section_featured').html(data);
                AIZ.plugins.slickCarousel();
            });

            $.post('<?php echo e(route('home.section.todays_deal')); ?>', {
                _token: '<?php echo e(csrf_token()); ?>'
            }, function(data) {
                $('#todays_deal').html(data);
                AIZ.plugins.slickCarousel();
            });

            $.post('<?php echo e(route('home.section.best_selling')); ?>', {
                _token: '<?php echo e(csrf_token()); ?>'
            }, function(data) {
                $('#section_best_selling').html(data);
                AIZ.plugins.slickCarousel();
            });

            $.post('<?php echo e(route('home.section.newest_products')); ?>', {
                _token: '<?php echo e(csrf_token()); ?>'
            }, function(data) {
                $('#section_newest').html(data);
                AIZ.plugins.slickCarousel();
            });

            $.post('<?php echo e(route('home.section.auction_products')); ?>', {
                _token: '<?php echo e(csrf_token()); ?>'
            }, function(data) {
                $('#auction_products').html(data);
                AIZ.plugins.slickCarousel();
            });

            // $.post('<?php echo e(route('home.section.preorder_products')); ?>', {
            //     _token: '<?php echo e(csrf_token()); ?>'
            // }, function(data) {
            //     $('#section_featured_preorder_products').html(data);
            //     AIZ.plugins.slickCarousel();
            // });

            $.post('<?php echo e(route('home.section.home_categories')); ?>', {
                _token: '<?php echo e(csrf_token()); ?>'
            }, function(data) {
                $('#section_home_categories').html(data);
                AIZ.plugins.slickCarousel();
            });

        <?php endif; ?>

        $(document).ready(function() {
            $('.category-nav-element').each(function(i, el) {

                $(el).on('mouseover', function(){
                    if(!$(el).find('.sub-cat-menu').hasClass('loaded')){
                        $.post('<?php echo e(route('category.elements')); ?>', {
                            _token: AIZ.data.csrf,
                            id:$(el).data('id'
                            )}, function(data){
                            $(el).find('.sub-cat-menu').addClass('loaded').html(data);
                        });
                    }
                });
            });

            if ($('#lang-change').length > 0) {
                $('#lang-change .dropdown-menu a').each(function() {
                    $(this).on('click', function(e){
                        e.preventDefault();
                        var $this = $(this);
                        var locale = $this.data('flag');
                        $.post('<?php echo e(route('language.change')); ?>',{_token: AIZ.data.csrf, locale:locale}, function(data){
                            location.reload();
                        });

                    });
                });
            }

            if ($('#currency-change').length > 0) {
                $('#currency-change .dropdown-menu a').each(function() {
                    $(this).on('click', function(e){
                        e.preventDefault();
                        var $this = $(this);
                        var currency_code = $this.data('currency');
                        $.post('<?php echo e(route('currency.change')); ?>',{_token: AIZ.data.csrf, currency_code:currency_code}, function(data){
                            location.reload();
                        });

                    });
                });
            }
        });

        $('#search').on('keyup', function(){
            search();
        });

        $('#search').on('focus', function(){
            search();
        });

        function search(){
            var searchKey = $('#search').val();
            if(searchKey.length > 0){
                $('body').addClass("typed-search-box-shown");

                $('.typed-search-box').removeClass('d-none');
                $('.search-preloader').removeClass('d-none');
                $.post('<?php echo e(route('search.ajax')); ?>', { _token: AIZ.data.csrf, search:searchKey}, function(data){
                    if(data == '0'){
                        // $('.typed-search-box').addClass('d-none');
                        $('#search-content').html(null);
                        $('.typed-search-box .search-nothing').removeClass('d-none').html('<?php echo e(translate('Sorry, nothing found for')); ?> <strong>"'+searchKey+'"</strong>');
                        $('.search-preloader').addClass('d-none');

                    }
                    else{
                        $('.typed-search-box .search-nothing').addClass('d-none').html(null);
                        $('#search-content').html(data);
                        $('.search-preloader').addClass('d-none');
                    }
                });
            }
            else {
                $('.typed-search-box').addClass('d-none');
                $('body').removeClass("typed-search-box-shown");
            }
        }

        $(".aiz-user-top-menu").on("mouseover", function (event) {
            $(".hover-user-top-menu").addClass('active');
        })
        .on("mouseout", function (event) {
            $(".hover-user-top-menu").removeClass('active');
        });

        $(document).on("click", function(event){
            var $trigger = $("#category-menu-bar");
            if($trigger !== event.target && !$trigger.has(event.target).length){
                $("#click-category-menu").slideUp("fast");;
                $("#category-menu-bar-icon").removeClass('show');
            }
        });

        function updateNavCart(view,count){
            $('.cart-count').html(count);
            $('#cart_items').html(view);
            // Reinitialize lazyload for newly loaded images
            if (typeof AIZ !== 'undefined' && AIZ.plugins && typeof AIZ.plugins.lazyload === 'function') {
                AIZ.plugins.lazyload();
            }
        }

        function removeFromCart(key){
            $.post('<?php echo e(route('cart.removeFromCart')); ?>', {
                _token  : AIZ.data.csrf,
                id      :  key
            }, function(data){
                updateNavCart(data.nav_cart_view,data.cart_count);
                $('#cart-details').html(data.cart_view);
                AIZ.plugins.notify('success', "<?php echo e(translate('Item has been removed from cart')); ?>");
                $('#cart_items_sidenav').html(parseInt($('#cart_items_sidenav').html())-1);
            });
        }

        function showLoginModal() {
            $('#login_modal').modal();
        }

        function addToCompare(id){
            $.post('<?php echo e(route('compare.addToCompare')); ?>', {_token: AIZ.data.csrf, id:id}, function(data){
                $('#compare').html(data);
                AIZ.plugins.notify('success', "<?php echo e(translate('Item has been added to compare list')); ?>");
                $('#compare_items_sidenav').html(parseInt($('#compare_items_sidenav').html())+1);
            });
        }

        function addToWishList(id){
            <?php if(Auth::check() && Auth::user()->user_type == 'customer'): ?>
                $.post('<?php echo e(route('wishlists.store')); ?>', {_token: AIZ.data.csrf, id:id}, function(data){
                    if(data != 0){
                        $('#wishlist').html(data);
                        AIZ.plugins.notify('success', "<?php echo e(translate('Item has been added to wishlist')); ?>");
                    }
                    else{
                        AIZ.plugins.notify('warning', "<?php echo e(translate('Please login first')); ?>");
                    }
                });
            <?php elseif(Auth::check() && Auth::user()->user_type != 'customer'): ?>
                AIZ.plugins.notify('warning', "<?php echo e(translate('Please Login as a customer to add products to the WishList.')); ?>");
            <?php else: ?>
                AIZ.plugins.notify('warning', "<?php echo e(translate('Please login first')); ?>");
            <?php endif; ?>
        }

        function showAddToCartModal(id){
            if(!$('#modal-size').hasClass('modal-lg')){
                $('#modal-size').addClass('modal-lg');
            }
            $('#addToCart-modal-body').html(null);
            $('#addToCart').modal();
            $('.c-preloader').show();
            $.post('<?php echo e(route('cart.showCartModal')); ?>', {_token: AIZ.data.csrf, id:id}, function(data){
                $('.c-preloader').hide();
                $('#addToCart-modal-body').html(data);
                AIZ.plugins.slickCarousel();
                AIZ.plugins.zoom();
                AIZ.extra.plusMinus();
                getVariantPrice();
            });
        }

        $('#option-choice-form input').on('change', function(){
            // checked = true;
            getVariantPrice();
        });

        function getVariantPrice(){
            if($('#option-choice-form input[name=quantity]').val() > 0 && checkAddToCartValidity()){
                $.ajax({
                    type:"POST",
                    url: '<?php echo e(route('products.variant_price')); ?>',
                    data: $('#option-choice-form').serializeArray(),
                    success: function(data){
                        $('.product-gallery-thumb .carousel-box').each(function (i) {
                            if($(this).data('variation') && data.variation == $(this).data('variation')){
                                $('.product-gallery-thumb').slick('slickGoTo', i);
                            }
                        })

                        $('#option-choice-form #chosen_price_div').removeClass('d-none');
                        $('#option-choice-form #chosen_price_div #chosen_price').html(data.price);
                        $('#available-quantity').html(data.quantity);
                        $('.input-number').prop('max', data.max_limit);
                        if(parseInt(data.in_stock) == 0 && data.digital  == 0){
                           $('.buy-now').addClass('d-none');
                           $('.add-to-cart').addClass('d-none');
                           $('.out-of-stock').removeClass('d-none');
                        }
                        else{
                           $('.buy-now').removeClass('d-none');
                           $('.add-to-cart').removeClass('d-none');
                           $('.out-of-stock').addClass('d-none');
                        }

                        AIZ.extra.plusMinus();
                        if(checked){
                            addToCart();
                        }
                    }
                });
            }
        }

        function checkAddToCartValidity(){
            var names = {};
            $('#option-choice-form input:radio').each(function() { // find unique names
                names[$(this).attr('name')] = true;
            });
            var count = 0;
            $.each(names, function() { // then count them
                count++;
            });

            if($('#option-choice-form input:radio:checked').length == count){
                return true;
            }

            return false;
        }

        function addToCart(){
            checked = false;
            <?php if(Auth::check() && Auth::user()->user_type != 'customer'): ?>
                AIZ.plugins.notify('warning', "<?php echo e(translate('Please Login as a customer to add products to the Cart.')); ?>");
                return false;
            <?php endif; ?>

            if(checkAddToCartValidity()) {
                $('#addToCart').modal();
                $('.c-preloader').show();
                $.ajax({
                    type:"POST",
                    url: '<?php echo e(route('cart.addToCart')); ?>',
                    data: $('#option-choice-form').serializeArray(),
                    success: function(data){
                       $('#addToCart-modal-body').html(null);
                       $('.c-preloader').hide();
                       $('#modal-size').removeClass('modal-lg');
                       $('#addToCart-modal-body').html(data.modal_view);
                       AIZ.extra.plusMinus();
                       AIZ.plugins.slickCarousel();
                       updateNavCart(data.nav_cart_view,data.cart_count);
                    }
                });

                if ("<?php echo e(get_setting('facebook_pixel')); ?>" == 1){
                    // Facebook Pixel AddToCart Event
                    fbq('track', 'AddToCart', {content_type: 'product'});
                    // Facebook Pixel AddToCart Event
                }
            }
            else{
                AIZ.plugins.notify('warning', "<?php echo e(translate('Please choose all the options')); ?>");
            }
        }

        function buyNow(){
            <?php if(Auth::check() && Auth::user()->user_type != 'customer'): ?>
                AIZ.plugins.notify('warning', "<?php echo e(translate('Please Login as a customer to add products to the Cart.')); ?>");
                return false;
            <?php endif; ?>

            if(checkAddToCartValidity()) {
                $('#addToCart-modal-body').html(null);
                $('#addToCart').modal();
                $('.c-preloader').show();
                $.ajax({
                    type:"POST",
                    url: '<?php echo e(route('cart.addToCart')); ?>',
                    data: $('#option-choice-form').serializeArray(),
                    success: function(data){
                        if(data.status == 1){
                            $('#addToCart-modal-body').html(data.modal_view);
                            updateNavCart(data.nav_cart_view,data.cart_count);
                            window.location.replace("<?php echo e(route('cart')); ?>");
                        }
                        else{
                            $('#addToCart-modal-body').html(null);
                            $('.c-preloader').hide();
                            $('#modal-size').removeClass('modal-lg');
                            $('#addToCart-modal-body').html(data.modal_view);
                        }
                    }
               });
            }
            else{
                AIZ.plugins.notify('warning', "<?php echo e(translate('Please choose all the options')); ?>");
            }
        }

        function bid_single_modal(bid_product_id, min_bid_amount){
            <?php if(Auth::check() && (isCustomer() || isSeller())): ?>
                var min_bid_amount_text = "(<?php echo e(translate('Min Bid Amount: ')); ?>"+min_bid_amount+")";
                $('#min_bid_amount').text(min_bid_amount_text);
                $('#bid_product_id').val(bid_product_id);
                $('#bid_amount').attr('min', min_bid_amount);
                $('#bid_for_product').modal('show');
            <?php elseif(Auth::check() && isAdmin()): ?>
                AIZ.plugins.notify('warning', '<?php echo e(translate('Sorry, Only customers & Sellers can Bid.')); ?>');
            <?php else: ?>
                $('#login_modal').modal('show');
            <?php endif; ?>
        }

        function clickToSlide(btn,id){
            $('#'+id+' .aiz-carousel').find('.'+btn).trigger('click');
            $('#'+id+' .slide-arrow').removeClass('link-disable');
            var arrow = btn=='slick-prev' ? 'arrow-prev' : 'arrow-next';
            if ($('#'+id+' .aiz-carousel').find('.'+btn).hasClass('slick-disabled')) {
                $('#'+id).find('.'+arrow).addClass('link-disable');
            }
        }

        function goToView(params) {
            document.getElementById(params).scrollIntoView({behavior: "smooth", block: "center"});
        }

        function copyCouponCode(code){
            navigator.clipboard.writeText(code);
            AIZ.plugins.notify('success', "<?php echo e(translate('Coupon Code Copied')); ?>");
        }

        $(document).ready(function(){
            $('.cart-animate').animate({margin : 0}, "slow");

            $({deg: 0}).animate({deg: 360}, {
                duration: 2000,
                step: function(now) {
                    $('.cart-rotate').css({
                        transform: 'rotate(' + now + 'deg)'
                    });
                }
            });

            setTimeout(function(){
                $('.cart-ok').css({ fill: '#d43533' });
            }, 2000);

        });

        function nonLinkableNotificationRead(){
            $.get('<?php echo e(route('non-linkable-notification-read')); ?>',function(data){
                $('.unread-notification-count').html(data);
            });
        }
    </script>


    <script type="text/javascript">
        if ($('input[name=country_code]').length > 0){
            // Country Code
            var isPhoneShown = true,
                countryData = window.intlTelInputGlobals.getCountryData(),
                input = document.querySelector("#phone-code");

            for (var i = 0; i < countryData.length; i++) {
                var country = countryData[i];
                if (country.iso2 == 'bd') {
                    country.dialCode = '88';
                }
            }

            var iti = intlTelInput(input, {
                separateDialCode: true,
                utilsScript: "<?php echo e(static_asset('assets/js/intlTelutils.js')); ?>?1590403638580",
                onlyCountries: <?php echo get_active_countries()->pluck('code') ?>,
                customPlaceholder: function(selectedCountryPlaceholder, selectedCountryData) {
                    if (selectedCountryData.iso2 == 'bd') {
                        return "01xxxxxxxxx";
                    }
                    return selectedCountryPlaceholder;
                }
            });

            var country = iti.getSelectedCountryData();
            $('input[name=country_code]').val(country.dialCode);

            input.addEventListener("countrychange", function(e) {
                // var currentMask = e.currentTarget.placeholder;
                var country = iti.getSelectedCountryData();
                $('input[name=country_code]').val(country.dialCode);

            });

            function toggleEmailPhone(el) {
                if (isPhoneShown) {
                    $('.phone-form-group').addClass('d-none');
                    $('.email-form-group').removeClass('d-none');
                    $('input[name=phone]').val(null);
                    isPhoneShown = false;
                    $(el).html('*<?php echo e(translate('Use Phone Number Instead')); ?>');
                } else {
                    $('.phone-form-group').removeClass('d-none');
                    $('.email-form-group').addClass('d-none');
                    $('input[name=email]').val(null);
                    isPhoneShown = true;
                    $(el).html('<i>*<?php echo e(translate('Use Email Instead')); ?></i>');
                }
            }
        }
    </script>

    <script>
        var acc = document.getElementsByClassName("aiz-accordion-heading");
        var i;
        for (i = 0; i < acc.length; i++) {
            acc[i].addEventListener("click", function() {
                this.classList.toggle("active");
                var panel = this.nextElementSibling;
                if (panel.style.maxHeight) {
                    panel.style.maxHeight = null;
                } else {
                    panel.style.maxHeight = panel.scrollHeight + "px";
                }
            });
        }
    </script>

    <script>
        function showFloatingButtons() {
            document.querySelector('.floating-buttons-section').classList.toggle('show');;
        }
    </script>

    <?php if(env('DEMO_MODE') == 'On'): ?>
        <script>
            var demoNav = document.querySelector('.aiz-demo-nav');
            var menuBtn = document.querySelector('.aiz-demo-nav-toggler');
            var lineOne = document.querySelector('.aiz-demo-nav-toggler .aiz-demo-nav-btn .line--1');
            var lineTwo = document.querySelector('.aiz-demo-nav-toggler .aiz-demo-nav-btn .line--2');
            var lineThree = document.querySelector('.aiz-demo-nav-toggler .aiz-demo-nav-btn .line--3');
            menuBtn.addEventListener('click', () => {
                toggleDemoNav();
            });

            function toggleDemoNav() {
                // demoNav.classList.toggle('show');
                demoNav.classList.toggle('shadow-none');
                lineOne.classList.toggle('line-cross');
                lineTwo.classList.toggle('line-fade-out');
                lineThree.classList.toggle('line-cross');
                if ($('.aiz-demo-nav-toggler').hasClass('show')) {
                    $('.aiz-demo-nav-toggler').removeClass('show');
                    demoHideOverlay();
                }else{
                    $('.aiz-demo-nav-toggler').addClass('show');
                    demoShowOverlay();
                }
            }

            $('.aiz-demos').click(function(e){
                if (!e.target.closest('.aiz-demos .aiz-demo-content')) {
                    toggleDemoNav();
                }
            });

            function demoShowOverlay(){
                $('.top-banner').removeClass('z-1035').addClass('z-1');
                $('.top-navbar').removeClass('z-1035').addClass('z-1');
                $('header').removeClass('z-1020').addClass('z-1');
                $('.aiz-demos').addClass('show');
            }

            function demoHideOverlay(cls=null){
                if($('.aiz-demos').hasClass('show')){
                    $('.aiz-demos').removeClass('show');
                    $('.top-banner').delay(800).removeClass('z-1').addClass('z-1035');
                    $('.top-navbar').delay(800).removeClass('z-1').addClass('z-1035');
                    $('header').delay(800).removeClass('z-1').addClass('z-1020');
                }
            }
        </script> <?php endif; ?>

    <script>
        window.addEventListener('load', function() {
            setTimeout(function() {
                const splash = document.getElementById('splash-screen');
                if (splash) {
                    splash.classList.add('fade-out');
                    setTimeout(function() {
                        splash.style.display = 'none';
                    }, 1500); // Match the CSS transition duration
                }
            }, 1000); // Show splash for 1 second
        });
    </script>

    <?php echo $__env->yieldContent('script'); ?>

    <?php
echo get_setting('footer_script'); ?>


    <!--Start of Tawk.to Script-->
    <script type="text/javascript">
    var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
    (function(){
    var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
    s1.async=true;
    s1.src='https://embed.tawk.to/67c40f6fdd2110190babc170/1ilatoj60';
    s1.charset='UTF-8';
    s1.setAttribute('crossorigin','*');
    s0.parentNode.insertBefore(s1,s0);
    })();
    </script>
    <!--End of Tawk.to Script-->

</body>
</html>
<?php /**PATH /home/laltktyh/organic.lalteer.com/resources/views/frontend/layouts/app.blade.php ENDPATH**/ ?>
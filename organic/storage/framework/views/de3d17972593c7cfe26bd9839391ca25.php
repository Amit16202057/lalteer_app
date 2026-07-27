<?php $__env->startSection('content'); ?>
    <?php
        $user = auth()->user();
        $user_avatar = null;
        $carts = [];
        if ($user && $user->avatar_original != null) {
            $user_avatar = uploaded_asset($user->avatar_original);
        }
        $system_language = get_system_language();
    ?>
    <?php echo $__env->make('frontend.inc.nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    
    <style>
        .mySlides {
            display: none;
        }

        img {
            vertical-align: middle;
        }

        /* Slideshow container */
        .slideshow-container {
            max-width: 1000px;
            position: relative;
            margin: auto;
        }

        /* Caption text */
        .text {
            color: #f2f2f2;
            font-size: 15px;
            padding: 8px 12px;
            position: absolute;
            bottom: 8px;
            width: 100%;
            text-align: center;
        }

        /* Number text (1/3 etc) */
        .numbertext {
            color: #f2f2f2;
            font-size: 12px;
            padding: 8px 12px;
            position: absolute;
            top: 0;
        }

        /* The dots/bullets/indicators */
        .dot {
            height: 15px;
            width: 15px;
            margin: 0 2px;
            background-color: #bbb;
            border-radius: 50%;
            display: inline-block;
            transition: background-color 0.6s ease;
        }

        .active {
            background-color: #717171;
        }

        /* Fading animation */
        .fade {
            animation-name: fade;
            animation-duration: 1.5s;
        }

        @keyframes fade {
            from {
                opacity: .4
            }

            to {
                opacity: 1
            }
        }

        /* On smaller screens, decrease text size */
        @media only screen and (max-width: 300px) {
            .text {
                font-size: 11px
            }
        }

        @media(max-width: 768px) {
            .user-registration-page{
                margin-top: 250px;
            }
        }
    </style>

    <section class="breadcrumb-section">
        <div class="product-details-breadcrumb position-relative text-center">
            <img src="<?php echo e(static_asset('assets/img/Frame 1171276523.png')); ?>" alt="Banner Image" class="w-100"
                style="height: 200px; object-fit: cover;">

            <!-- Wrapper for Text Elements -->
            <div class="breadcrumb-text position-absolute"
                style="top: 50%; left: 50%; transform: translate(-50%, -50%); color: white;">
                <h2 style="font-size: 26px;">Login / Registration</h2>
                <p class="opacity-80" style="font-size: 16px; margin-top: 8px;">Please fill your details to access your
                    account</p>
            </div>
        </div>
    </section>

    <!-- aiz-main-wrapper -->
    <div class="aiz-main-wrapper d-flex flex-column justify-content-center bg-white">
        <section class="bg-white overflow-hidden" style="min-height:100vh;">
            <div class="row" style="min-height: 100vh;">
                <!-- Left Side Image-->
                <div class="col-xxl-6 col-lg-5">
                    <div class="right-content">
                        <div class="row align-items-center justify-content-center justify-content-lg-start">
                            <div class="col-xxl-12 p-4 p-lg-5">
                                <!-- Site Icon -->
                                
                                <!-- Titles -->
                                
                                <!-- Register form -->
                                <div class="bg-white user-registration-page">
                                    <div class="">
                                        <form id="reg-form" class="form-default" role="form"
                                            action="<?php echo e(route('register')); ?>" method="POST">
                                            <?php echo csrf_field(); ?>
                                            <!-- Name -->
                                            <div class="form-group">
                                                <label for="name"
                                                    class="fs-15 fw-700 text-soft-dark"><?php echo e(translate('Full Name')); ?></label>
                                                <input type="text"
                                                    class="form-control rounded-1<?php echo e($errors->has('name') ? ' is-invalid' : ''); ?>"
                                                    value="<?php echo e(old('name')); ?>" placeholder="<?php echo e(translate('Full Name')); ?>"
                                                    name="name">
                                                <?php if($errors->has('name')): ?>
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong><?php echo e($errors->first('name')); ?></strong>
                                                    </span>
                                                <?php endif; ?>
                                            </div>

                                            <!-- Email or Phone -->
                                            <?php if(addon_is_activated('otp_system')): ?>
                                                <div class="form-group phone-form-group mb-1">
                                                    <label for="phone"
                                                        class="fs-15 fw-700 text-soft-dark"><?php echo e(translate('Phone')); ?></label>
                                                    <input type="tel" id="phone-code"
                                                        class="form-control rounded-1<?php echo e($errors->has('phone') ? ' is-invalid' : ''); ?>"
                                                        value="<?php echo e(old('phone')); ?>" placeholder="" name="phone"
                                                        autocomplete="off">
                                                </div>

                                                <input type="hidden" name="country_code" value="">

                                                <div class="form-group email-form-group mb-1 d-none">
                                                    <label for="email"
                                                        class="fs-15 fw-700 text-soft-dark"><?php echo e(translate('Email Address')); ?></label>
                                                    <input type="email"
                                                        class="form-control rounded-1 <?php echo e($errors->has('email') ? ' is-invalid' : ''); ?>"
                                                        value="<?php echo e(old('email')); ?>" placeholder="<?php echo e(translate('Email')); ?>"
                                                        name="email" autocomplete="off">
                                                    <?php if($errors->has('email')): ?>
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong><?php echo e($errors->first('email')); ?></strong>
                                                        </span>
                                                    <?php endif; ?>
                                                </div>

                                                <div class="form-group text-right">
                                                    <button class="btn btn-link p-0 text-primary" type="button"
                                                        onclick="toggleEmailPhone(this)"><i>*<?php echo e(translate('Use Email Instead')); ?></i></button>
                                                </div>
                                            <?php else: ?>
                                                <div class="form-group">
                                                    <label for="email"
                                                        class="fs-15 fw-700 text-soft-dark"><?php echo e(translate('Email Address')); ?></label>
                                                    <input type="email"
                                                        class="form-control rounded-1<?php echo e($errors->has('email') ? ' is-invalid' : ''); ?>"
                                                        value="<?php echo e(old('email')); ?>" placeholder="<?php echo e(translate('Email')); ?>"
                                                        name="email">
                                                    <?php if($errors->has('email')): ?>
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong><?php echo e($errors->first('email')); ?></strong>
                                                        </span>
                                                    <?php endif; ?>
                                                </div>
                                            <?php endif; ?>

                                            <!-- password -->
                                            <div class="form-group mb-0">
                                                <label for="password"
                                                    class="fs-15 fw-700 text-soft-dark"><?php echo e(translate('Password')); ?></label>
                                                <div class="position-relative">
                                                    <input type="password"
                                                        class="form-control rounded-1<?php echo e($errors->has('password') ? ' is-invalid' : ''); ?>"
                                                        placeholder="<?php echo e(translate('Password')); ?>" name="password">
                                                    <i class="password-toggle las la-2x la-eye"></i>
                                                </div>
                                                <div class="text-right mt-1">
                                                    <span
                                                        class="fs-15 fw-400 text-gray-dark"><?php echo e(translate('Password must contain at least 6 digits')); ?></span>
                                                </div>
                                                <?php if($errors->has('password')): ?>
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong><?php echo e($errors->first('password')); ?></strong>
                                                    </span>
                                                <?php endif; ?>
                                            </div>

                                            <!-- password Confirm -->
                                            <div class="form-group">
                                                <label for="password_confirmation"
                                                    class="fs-15 fw-700 text-soft-dark"><?php echo e(translate('Confirm Password')); ?></label>
                                                <div class="position-relative">
                                                    <input type="password" class="form-control rounded-1"
                                                        placeholder="<?php echo e(translate('Confirm Password')); ?>"
                                                        name="password_confirmation">
                                                    <i class="password-toggle las la-2x la-eye"></i>
                                                </div>
                                            </div>

                                            <!-- Recaptcha -->
                                            <?php if(get_setting('google_recaptcha') == 1): ?>
                                                <div class="form-group">
                                                    <div class="g-recaptcha" data-sitekey="<?php echo e(env('CAPTCHA_KEY')); ?>">
                                                    </div>
                                                </div>
                                                <?php if($errors->has('g-recaptcha-response')): ?>
                                                    <span class="invalid-feedback" role="alert"
                                                        style="display: block;">
                                                        <strong><?php echo e($errors->first('g-recaptcha-response')); ?></strong>
                                                    </span>
                                                <?php endif; ?>
                                            <?php endif; ?>

                                            <!-- Terms and Conditions -->
                                            <div class="mb-3">
                                                <label class="aiz-checkbox">
                                                    <input type="checkbox" name="checkbox_example_1" required>
                                                    <span class=""><?php echo e(translate('I agree to the')); ?>

                                                        <a href="<?php echo e(route('terms')); ?>"
                                                            class="fw-500"><?php echo e(translate('terms and conditions.')); ?></a></span>
                                                    <span class="aiz-square-check"></span>
                                                </label>
                                            </div>

                                            <!-- Submit Button -->
                                            <div class="mb-4 mt-4">
                                                <button type="submit"
                                                    class="btn btn-primary btn-block fw-600 fs-15 rounded-2"><?php echo e(translate('Register')); ?></button>
                                            </div>
                                        </form>

                                        <!-- Social Login -->
                                        <?php if(get_setting('google_login') == 1 ||
                                                get_setting('facebook_login') == 1 ||
                                                get_setting('twitter_login') == 1 ||
                                                get_setting('apple_login') == 1): ?>
                                            <div class="text-center mb-3">
                                                <span
                                                    class="bg-white fs-12 text-gray"><?php echo e(translate('Or Join With')); ?></span>
                                            </div>
                                            <ul class="list-inline social colored text-center mb-4">
                                                <?php if(get_setting('facebook_login') == 1): ?>
                                                    <li class="list-inline-item">
                                                        <a href="<?php echo e(route('social.login', ['provider' => 'facebook'])); ?>"
                                                            class="facebook">
                                                            <i class="lab la-facebook-f"></i>
                                                        </a>
                                                    </li>
                                                <?php endif; ?>
                                                <?php if(get_setting('google_login') == 1): ?>
                                                    <li class="list-inline-item">
                                                        <a href="<?php echo e(route('social.login', ['provider' => 'google'])); ?>"
                                                            class="google">
                                                            <i class="lab la-google"></i>
                                                        </a>
                                                    </li>
                                                <?php endif; ?>
                                                <?php if(get_setting('twitter_login') == 1): ?>
                                                    <li class="list-inline-item">
                                                        <a href="<?php echo e(route('social.login', ['provider' => 'twitter'])); ?>"
                                                            class="twitter">
                                                            <i class="lab la-twitter"></i>
                                                        </a>
                                                    </li>
                                                <?php endif; ?>
                                                <?php if(get_setting('apple_login') == 1): ?>
                                                    <li class="list-inline-item">
                                                        <a href="<?php echo e(route('social.login', ['provider' => 'apple'])); ?>"
                                                            class="apple">
                                                            <i class="lab la-apple"></i>
                                                        </a>
                                                    </li>
                                                <?php endif; ?>
                                            </ul>
                                        <?php endif; ?>
                                    </div>

                                    <!-- Log In -->
                                    <p class="fs-12 text-gray mb-0 text-center">
                                        <?php echo e(translate('Already have an account?')); ?>

                                        <a href="<?php echo e(route('user.login')); ?>"
                                            class="ml-2 fs-14 fw-700 animate-underline-primary"><u><?php echo e(translate('Log In')); ?></u></a>
                                    </p>
                                    <!-- Go Back -->
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right Side -->
                <div class="col-xxl-6 col-lg-5 pt-5 px-5">
                    <div class="rounded-3 px-5" style="background-color: #CFE661">
                        


                        <?php
    $lang = app()->getLocale(); // 👈 get current language

    // Use current language for dynamic data
    $login_imgs = json_decode(get_setting('login_info_images', null, $lang), true) ?? [];
    $login_titles = json_decode(get_setting('login_info_title1', null, $lang), true) ?? [];
    $login_designations = json_decode(get_setting('login_info_designation', null, $lang), true) ?? [];
    $login_descriptions = json_decode(get_setting('login_info_des', null, $lang), true) ?? [];

    $max_count = max(count($login_imgs), count($login_titles), count($login_designations), count($login_descriptions));
?>


<div class="slideshow-container">
    <?php for($i = 0; $i < $max_count; $i++): ?>
        <div class="mySlides fade">
            <div class="pt-5">
                <img src="<?php echo e(isset($login_imgs[$i]) ? uploaded_asset($login_imgs[$i]) : static_asset('assets/img/default.png')); ?>"
                     alt="" class="d-flex align-items-center mx-auto img-circle"
                     style="width: 116px; height: 116px;">
            </div>
            <div class="pt-2 pb-5">
                <div style="position: absolute; z-index: 1;">
                    <img src="<?php echo e(static_asset('assets/img/first cotation 2.png')); ?>" alt="">
                </div>
                <div class="bg-white py-4 rounded-2 custom-box position-relative">
                    <span class="d-flex flex-column">
                        <span class="opacity-80 fs-17 text-center">
                            <?php echo e($login_titles[$i] ?? 'No Title'); ?>

                        </span>
                        <span class="opacity-80 fs-17 text-center">
                            <?php echo e($login_designations[$i] ?? 'No Designation'); ?>

                        </span>
                    </span>
                    <p class="opacity-80 pt-3 px-3 justify-content">
                        <?php echo e($login_descriptions[$i] ?? 'No Description Available.'); ?>

                    </p>
                </div>
                <div style="position: absolute; z-index: 1; right: 0; margin-top: -25px !important; margin-right: 5px;">
                    <img src="<?php echo e(static_asset('assets/img/first cotation 1.png')); ?>" alt="">
                </div>
            </div>
        </div>
    <?php endfor; ?>
</div>
                        <br>

                        <div style="text-align:center">
                            <span class="dot"></span>
                            <span class="dot"></span>
                            <span class="dot"></span>
                        </div>
                    </div>

                </div>
            </div>
        </section>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <?php if(get_setting('google_recaptcha') == 1): ?>
        <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <?php endif; ?>

    <script type="text/javascript">
        <?php if(get_setting('google_recaptcha') == 1): ?>
            // making the CAPTCHA  a required field for form submission
            $(document).ready(function() {
                $("#reg-form").on("submit", function(evt) {
                    var response = grecaptcha.getResponse();
                    if (response.length == 0) {
                        //reCaptcha not verified
                        alert("please verify you are human!");
                        evt.preventDefault();
                        return false;
                    }
                    //captcha verified
                    //do the rest of your validations here
                    $("#reg-form").submit();
                });
            });
        <?php endif; ?>


        let slideIndex = 0;
        showSlides();

        function showSlides() {
            let i;
            let slides = document.getElementsByClassName("mySlides");
            let dots = document.getElementsByClassName("dot");
            for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
            }
            slideIndex++;
            if (slideIndex > slides.length) {
                slideIndex = 1
            }
            for (i = 0; i < dots.length; i++) {
                dots[i].className = dots[i].className.replace(" active", "");
            }
            slides[slideIndex - 1].style.display = "block";
            dots[slideIndex - 1].className += " active";
            setTimeout(showSlides, 2000); // Change image every 2 seconds
        }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('auth.layouts.authentication', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/laltktyh/organic.lalteer.com/resources/views/auth/free/user_registration.blade.php ENDPATH**/ ?>
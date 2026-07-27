

<?php $__env->startSection('meta_title'); ?><?php echo e($page->meta_title ?? 'Lalteer | Contact Us'); ?><?php $__env->stopSection(); ?>

<?php $__env->startSection('meta_description'); ?><?php echo e($page->meta_description); ?><?php $__env->stopSection(); ?>

<?php $__env->startSection('meta_keywords'); ?><?php echo e($page->tags); ?><?php $__env->stopSection(); ?>

<?php $__env->startSection('meta'); ?>
    <!-- Schema.org markup for Google+ -->
    <meta itemprop="name" content="<?php echo e($page->meta_title); ?>">
    <meta itemprop="description" content="<?php echo e($page->meta_description); ?>">
    <meta itemprop="image" content="<?php echo e(uploaded_asset($page->meta_image)); ?>">

    <!-- Twitter Card data -->
    <meta name="twitter:card" content="website">
    <meta name="twitter:site" content="@publisher_handle">
    <meta name="twitter:title" content="<?php echo e($page->meta_title); ?>">
    <meta name="twitter:description" content="<?php echo e($page->meta_description); ?>">
    <meta name="twitter:creator" content="@author_handle">
    <meta name="twitter:image" content="<?php echo e(uploaded_asset($page->meta_image)); ?>">

    <!-- Open Graph data -->
    <meta property="og:title" content="<?php echo e($page->meta_title); ?>" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="<?php echo e(URL($page->slug)); ?>" />
    <meta property="og:image" content="<?php echo e(uploaded_asset($page->meta_image)); ?>" />
    <meta property="og:description" content="<?php echo e($page->meta_description); ?>" />
    <meta property="og:site_name" content="<?php echo e(env('APP_NAME')); ?>" />
<?php $__env->stopSection(); ?>
    <?php $__env->startSection('content'); ?>

    <?php
    $bradcamp = \App\Models\Page::where('page_name','contact_us')->first();
    ?>

    <section class="mb-1 pt-3">
        <div class="product-details-bredcrumb" style="position: relative; text-align: center;">
            <img src="<?php echo e(uploaded_asset($bradcamp->bradcamp_image)??static_asset('assets/img/Frame 1171276523.png')); ?>" alt=""
                style="width: 100%; height: 200px;">
            <h2
                style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); color: white; font-size: 26px;">
                <?php echo e(translate($page->getTranslation('title'))); ?></h2>
        </div>
    </section>

    <section class="pt-4 my-4" style="background-image: url('<?php echo e(static_asset('assets/img/p_details_bg.jpg')); ?>'); background-size: cover; background-position: center;">
        <?php
            $lang = str_replace('_', '-', app()->getLocale());
            $content = json_decode($page->getTranslation('content', $lang));
        ?>
        <div class="container">
            <div class="" style="background-color: <?php echo e(hex2rgba(get_setting('base_color', '#d43533'), 0.02)); ?>">
                <div class="row">
                    <div class="col-lg-4 text-center text-lg-left">
                        <div class="p-3 p-md-4 p-xl-5">
                            
                            <div class="d-flex pb-2 ">
                                <span class="d-flex align-items-center justify-content-center pr-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" viewBox="0 0 24 24" fill="none">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M13.304 23.2653L13.6931 22.6079C14.3168 21.5542 14.6286 21.0273 15.1254 20.7335C15.6221 20.4397 16.2701 20.4189 17.566 20.3775C18.7811 20.3386 19.5978 20.2326 20.2961 19.9434C21.7663 19.3344 22.9343 18.1663 23.5433 16.6962C24 15.5935 24 14.1957 24 11.4V10.2C24 6.27191 24 4.30784 23.1158 2.86502C22.6211 2.05768 21.9423 1.3789 21.135 0.884163C19.6922 6.49318e-07 17.7281 0 13.8 0H10.2C6.27188 0 4.30782 6.49318e-07 2.86501 0.884163C2.05768 1.3789 1.37889 2.05768 0.884159 2.86502C0 4.30784 0 6.27191 0 10.2V11.4C0 14.1957 0 15.5935 0.456723 16.6962C1.06569 18.1663 2.23373 19.3344 3.7039 19.9434C4.40218 20.2326 5.21885 20.3386 6.43396 20.3775C7.72986 20.4189 8.37782 20.4397 8.87456 20.7335C9.37131 21.0273 9.68315 21.5542 10.3068 22.6079L10.696 23.2653C11.2758 24.2449 12.7242 24.2449 13.304 23.2653ZM17.25 12C18.0784 12 18.75 11.3284 18.75 10.5C18.75 9.67157 18.0784 9 17.25 9C16.4216 9 15.75 9.67157 15.75 10.5C15.75 11.3284 16.4216 12 17.25 12ZM13.5 10.5C13.5 11.3284 12.8284 12 12 12C11.1716 12 10.5 11.3284 10.5 10.5C10.5 9.67157 11.1716 9 12 9C12.8284 9 13.5 9.67157 13.5 10.5ZM6.75 12C7.57843 12 8.25 11.3284 8.25 10.5C8.25 9.67157 7.57843 9 6.75 9C5.92157 9 5.25 9.67157 5.25 10.5C5.25 11.3284 5.92157 12 6.75 12Z" fill="#3A3939"/>
                                    </svg>
                                </span>
                                <span class="fs-19 fw-700"><?php echo e(translate('Customer Support')); ?></span><br>
                            </div>
                            <div class="mb-4">
                                <span class="fs-14"><?php echo str_replace(['<?php echo e(customer_support); ?>', "\n"], [translate('Customer Support'), '<br>'], $content->description); ?></span>
                            </div>
                            <div class="d-flex pb-2">
                                <span class="d-flex align-items-center justify-content-center pr-2">
                                    <i class="las la-2x la-phone"></i>
                                </span>
                            
                                    <span class="fs-19 fw-700"><?php echo e(translate('Call Us')); ?></span><br>
                            </div>
                            <div class="fs-14 mb-4"><?php echo e(translate($content->phone)); ?></div>
                            <div class="d-flex pb-2">
                                <span class="d-flex align-items-center justify-content-center pr-2">
                                    <i class="las la-2x la-envelope"></i>
                                </span>
                                
                                    <span class="fs-19 fw-700"><?php echo e(translate('Email Support')); ?></span><br>
                            </div>
                            <div class="fs-14 "><a href="mailto:<?php echo e($content->email); ?>"><?php echo e(translate($content->email)); ?></a></div>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="pb-3 ">
                        
                            <div class=" p-4 p-xl-2rem">
                                <form class="form-default" role="form" action="<?php echo e(route('contact')); ?>" method="POST">
                                    <?php echo csrf_field(); ?>

                                    <!-- Name -->
                                    <div class="form-group">
                                        <label for="name" class="fs-14 fw-700 text-soft-dark"><?php echo e(translate('Name')); ?></label>
                                        <input type="text" class="form-control rounded-0" value="<?php echo e(old('name')); ?>" placeholder="<?php echo e(translate('Enter Name')); ?>" name="name" required>
                                    </div>
                                    <!-- Name -->
                                    <div class="form-group">
                                        <label for="name" class="fs-14 fw-700 text-soft-dark"><?php echo e(translate('Company Name')); ?></label>
                                        <input type="text" class="form-control rounded-0" value="<?php echo e(old('company_name')); ?>" placeholder="<?php echo e(translate('Company Name')); ?>" name="company_name">
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                        <!-- Email -->
                                        <div class="form-group">
                                            <label for="email" class="fs-14 fw-700 text-soft-dark"><?php echo e(translate('Email Address')); ?></label>
                                            <input type="email" class="form-control rounded-0" value="<?php echo e(old('email')); ?>" placeholder="<?php echo e(translate('Enter Email')); ?>" name="email" required>
                                        </div>
                                        </div>
                                        <div class="col-md-6">
                                        <!-- Phone -->
                                        <div class="form-group">
                                            <label for="phone" class="fs-14 fw-700 text-soft-dark"><?php echo e(translate('Phone Number')); ?></label>
                                            <input type="tel" class="form-control rounded-0" value="<?php echo e(old('phone')); ?>" placeholder="<?php echo e(translate('Enter Phone')); ?>" name="phone">
                                        </div>
                                    </div>
                                    </div>
                                
                                
                                    <!-- Query -->
                                    <div class="form-group">
                                        <label for="query" class="fs-14 fw-700 text-soft-dark"><?php echo e(translate('How can we help?')); ?></label>
                                        <textarea
                                            class="form-control rounded-0"
                                            placeholder="<?php echo e(translate('Type here...')); ?>"
                                            name="content"
                                            rows="3"
                                            required
                                        ></textarea>
                                    </div>

                                    <!-- Recaptcha -->
                                    <?php if(get_setting('google_recaptcha') == 1): ?>
                                        <div class="form-group">
                                            <div class="g-recaptcha" data-sitekey="<?php echo e(env('CAPTCHA_KEY')); ?>"></div>
                                        </div>
                                        <?php if($errors->has('g-recaptcha-response')): ?>
                                            <span class="invalid-feedback" role="alert" style="display: block;">
                                                <strong><?php echo e($errors->first('g-recaptcha-response')); ?></strong>
                                            </span>
                                        <?php endif; ?>
                                    <?php endif; ?>

                                    <!-- Submit Button -->
                                    <div class="mt-4">
                                        <?php if(env('MAIL_USERNAME') == null && env('MAIL_PASSWORD') == null): ?>
                                            <a class="btn btn-primary fw-700 fs-14 rounded-0 w-200px"
                                                href="javascript:void(1)" onclick="showWarning()">
                                                <?php echo e(translate('Submit')); ?>

                                            </a>
                                        <?php else: ?>
                                            <button type="submit" class="btn btn-primary fw-700 fs-14 rounded-0 w-200px"><?php echo e(translate('Submit')); ?></button>
                                        <?php endif; ?>

                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
        <?php
            $map = \App\Models\BusinessSetting::where('type','map_link')->first();
        ?>
        <div class="col-md-12">
            <div class="d-flex justify-content-center">
            <h2><?php echo e(translate('Our Location')); ?></h2>
            </div>
            <iframe src="<?php echo e($map->value); ?>" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <?php if(get_setting('google_recaptcha') == 1): ?>
        <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <?php endif; ?>
    
    <script type="text/javascript">
        <?php if(get_setting('google_recaptcha') == 1): ?>
        // making the CAPTCHA  a required field for form submission
        $(document).ready(function(){
            $("#reg-form").on("submit", function(evt)
            {
                var response = grecaptcha.getResponse();
                if(response.length == 0)
                {
                //reCaptcha not verified
                    alert("please verify you are human!");
                    evt.preventDefault();
                    return false;
                }
                //captcha verified
                //do the rest of your validations here
                $("#reg-form").submit();
            });
        }); <?php endif; ?>
    </script>
    <script type="text/javascript">
        function showWarning() {
            AIZ.plugins.notify('warning', "<?php echo e(translate('Something went wrong.')); ?>");
            return false;
        }
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/laltktyh/organic.lalteer.com/resources/views/frontend/contact_us_page.blade.php ENDPATH**/ ?>
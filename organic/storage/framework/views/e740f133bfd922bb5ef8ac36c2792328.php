<?php $__env->startSection('content'); ?>

<style>
    .res-faq-padding{
        padding: 5px 5px !important;
    }
    .faq-section {
        margin-left: 15px;
    }

    @media (max-width: 1400px) {
      .faq-section {
            margin-left: 80px;
        }
    }

    @media (max-width: 1200px) {
      .faq-section {
            margin-left: 140px;
        }
    }
</style>
    <?php
        $bradcamp = \App\Models\Page::where('page_name', 'faq')->first();
    ?>
    <section class="mb-1 pt-3">
        <div class="product-details-bredcrumb" style="position: relative; text-align: center;">
            <img src="<?php echo e(uploaded_asset($bradcamp->bradcamp_image) ?? static_asset('assets/img/Frame 1171276523.png')); ?>"
                alt="" style="width: 100%; height: 200px;">
            <h2
                style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); color: white; font-size: 26px;">
                <?php echo e(translate('Faq')); ?></h2>
        </div>
    </section>

    <section class="py-4"
        style="background-image: url('<?php echo e(static_asset('assets/img/p_details_bg.jpg')); ?>'); background-size: cover; background-position: center;">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-12 col-lg-4 col-xl-4">
                </div>
                <div class="col-12 col-sm-12 col-md-12 col-lg-4 col-xl-4">
                    <h1 class="text-center mb-4"><?php echo e(translate('General FAQS')); ?></h1>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-sm-12 col-md-12 col-lg-4 col-xl-4">
                    <div class="d-flex justify-content-between p-2 rounded-1" style="background-color: #F3F9EC">
                        <!-- Search Label -->
                        <div class="d-flex align-items-center">
                            <input type="text" id="searchInput" class="ml-2 py-2 px-6 border-0 faq-search-input-padding"
                                placeholder="<?php echo e(translate('Search FAQ')); ?>">
                        </div>

                        <!-- Category Dropdown -->
                        <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle exclusive_btn-download" type="button" id="categoryDropdown"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <?php echo e(translate('Select Category')); ?>

                            </button>
                            <div class="dropdown-menu shadow" aria-labelledby="categoryDropdown">
                                <div class="row">
                                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="col-2">
                                            <a class="dropdown-item category-link text-truncate" href="#"
                                                data-id="<?php echo e($category->id); ?>">
                                                <?php echo e($category->getTranslation('name')); ?>

                                                <!--<?php echo e($category->name); ?>-->
                                            </a>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </div>

                        </div>
                    </div>


                    <!-- FAQ Section -->
                    <div id="faqAccordion" class="mt-4">
                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="accordion" id="accordion<?php echo e($category->id); ?>">
                                <?php if(!empty($category->faq_questions) && !empty($category->faq_answers)): ?>
                                    <?php $__currentLoopData = $category->faq_questions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $question): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="card" style="background-color: #D9EDC4">
                                            <div class="card-header" id="heading<?php echo e($category->id); ?><?php echo e($index); ?>">
                                                <h5 class="mb-0">
                                                    <button class="btn btn-link fs-17" type="button" data-toggle="collapse"
                                                        data-target="#collapse<?php echo e($category->id); ?><?php echo e($index); ?>"
                                                        aria-expanded="true"
                                                        aria-controls="collapse<?php echo e($category->id); ?><?php echo e($index); ?>">
                                                        <?php echo e($question); ?>

                                                    </button>
                                                </h5>
                                            </div>

                                            <div id="collapse<?php echo e($category->id); ?><?php echo e($index); ?>" class="collapse"
                                                aria-labelledby="heading<?php echo e($category->id); ?><?php echo e($index); ?>"
                                                data-parent="#accordion<?php echo e($category->id); ?>">
                                                <div class="card-body fs-16">
                                                    <?php echo e($category->faq_answers[$index] ?? 'No answer available'); ?>

                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php else: ?>
                                    <p>No FAQs available for this category.</p>
                                <?php endif; ?>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>

                </div>

                <div class="col-12 col-sm-12 col-md-12 col-lg-8 col-xl-8">
                    <?php
                        $lang = app()->getLocale(); // Get the current language (Laravel's way)
                    ?>


                    <div class="faq-section">
                        <?php if(get_setting('faq_tab_title', null, $lang) != null && get_setting('faq_tab_description', null, $lang) != null): ?>
                            <div class="faq-container">
                                <?php
                                    $faq_tab_titles = json_decode(get_setting('faq_tab_title', null, $lang), true) ?? [];
                                    $faq_tab_descriptions =
                                        json_decode(get_setting('faq_tab_description', null, $lang), true) ?? [];
                                ?>

                                <?php $__currentLoopData = $faq_tab_titles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $title): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="faq-box position-relative mb-3" style="text-decoration: none; background: #EDEDED;">
                                        <button class="faq-question btn btn-link fs-20 res-faq-padding"
                                            data-toggle="collapse" data-target="#faq-collapse<?php echo e($key); ?>"
                                            aria-expanded="<?php echo e($key === 0 ? 'true' : 'false'); ?>"
                                            aria-controls="faq-collapse<?php echo e($key); ?>">
                                            <?php echo e($title); ?>

                                        </button>

                                        <div id="faq-collapse<?php echo e($key); ?>"
                                            class="collapse <?php echo e($key === 0 ? 'show' : ''); ?>"
                                            aria-labelledby="faq-heading<?php echo e($key); ?>" data-parent=".faq-container">
                                            <div class="faq-answer fs-16 p-2">
                                                <?php
                                                    $faqDescription = $faq_tab_descriptions[$key] ?? 'No description available.';
                                                    $faqDescription = preg_replace('/\s*(•|\d+\.\s*|\d+\)\s*)/u', "\n$1", $faqDescription);
                                                    $faqDescription = preg_replace('/\n+/', "\n", trim($faqDescription));
                                                ?>
                                                <?php echo nl2br(e($faqDescription)); ?>

                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>

            </div>

            <div class="container" style="margin-top: 30px;">
                <h3 class="text-center"><?php echo e(translate('Still stuck ask directly')); ?></h3>
                <div class="pb-3 ">
                    <div class=" p-4 p-xl-2rem">
                        <form class="form-default" role="form" action="<?php echo e(route('contact')); ?>" method="POST">
                            <?php echo csrf_field(); ?>

                            <!-- Name -->
                            <div class="form-group">
                                <label for="name" class="fs-14 fw-700 text-soft-dark"><?php echo e(translate('Name')); ?></label>
                                <input type="text" class="form-control rounded-0" value="<?php echo e(old('name')); ?>"
                                    placeholder="<?php echo e(translate('Enter Name')); ?>" name="name" required>
                            </div>
                            <!-- Name -->
                            <div class="form-group">
                                <label for="name"
                                    class="fs-14 fw-700 text-soft-dark"><?php echo e(translate('Company Name')); ?></label>
                                <input type="text" class="form-control rounded-0" value="<?php echo e(old('company_name')); ?>"
                                    placeholder="<?php echo e(translate('Company Name')); ?>" name="company_name">
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <!-- Email -->
                                    <div class="form-group">
                                        <label for="email"
                                            class="fs-14 fw-700 text-soft-dark"><?php echo e(translate('Email Address')); ?></label>
                                        <input type="email" class="form-control rounded-0" value="<?php echo e(old('email')); ?>"
                                            placeholder="<?php echo e(translate('Enter Email')); ?>" name="email" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <!-- Phone -->
                                    <div class="form-group">
                                        <label for="phone"
                                            class="fs-14 fw-700 text-soft-dark"><?php echo e(translate('Phone Number')); ?></label>
                                        <input type="tel" class="form-control rounded-0" value="<?php echo e(old('phone')); ?>"
                                            placeholder="<?php echo e(translate('Enter Phone')); ?>" name="phone">
                                    </div>
                                </div>
                            </div>


                            <!-- Query -->
                            <div class="form-group">
                                <label for="query"
                                    class="fs-14 fw-700 text-soft-dark"><?php echo e(translate('How can we help?')); ?></label>
                                <textarea class="form-control rounded-0" placeholder="<?php echo e(translate('Type here...')); ?>" name="content"
                                    rows="3" required></textarea>
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
                                    <a class="btn btn-primary fw-700 fs-14 rounded-0 w-200px" href="javascript:void(1)"
                                        onclick="showWarning()">
                                        <?php echo e(translate('Submit')); ?>

                                    </a>
                                <?php else: ?>
                                    <button type="submit"
                                        class="btn btn-primary fw-700 fs-14 rounded-0 w-200px"><?php echo e(translate('Submit')); ?></button>
                                <?php endif; ?>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </section>
    <style>
        .dropdown-menu {

            overflow-y: auto;
            padding: 10px;
            min-width: 869px;
        }

        .dropdown-menu .row {
            flex-wrap: wrap;
            /* Ensure proper wrapping */
        }

        .dropdown-menu .col-6 {
            padding: 5px 10px;
            /* Add spacing */
        }
    </style>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('script'); ?>
    <script>
        $(document).ready(function() {
            // Initially hide all FAQ sections
            $('.accordion').hide();

            // Handle category selection
            $(document).on('click', '.category-link', function() {
                var categoryId = $(this).data('id');
                $('.accordion').hide(); // Hide all sections
                $('#accordion' + categoryId).show(); // Show selected category

                // Optionally, update the dropdown button text
                var selectedCategoryName = $(this).text();
                $('#categoryDropdown').text(selectedCategoryName);
            });

            // Search functionality
            $('#searchInput').on('input', function() {
                var query = $(this).val().toLowerCase(); // Get the search query in lowercase

                // Loop through all FAQs and hide/show based on search match
                $('.accordion .card').each(function() {
                    var questionText = $(this).find('.card-header button').text()
                        .toLowerCase(); // Get the question text

                    // Check if the question matches the search query
                    if (questionText.includes(query)) {
                        $(this).show(); // Show the card if it matches
                        // Ensure the parent accordion is visible
                        $(this).closest('.accordion').show();
                    } else {
                        $(this).hide(); // Hide the card if it doesn't match
                    }
                });
            });
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/laltktyh/organic.lalteer.com/resources/views/frontend/faq/faq.blade.php ENDPATH**/ ?>
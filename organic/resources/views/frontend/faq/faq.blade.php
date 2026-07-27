@extends('frontend.layouts.app')


@section('content')

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
    @php
        $bradcamp = \App\Models\Page::where('page_name', 'faq')->first();
    @endphp
    <section class="mb-1 pt-3">
        <div class="product-details-bredcrumb" style="position: relative; text-align: center;">
            <img src="{{ uploaded_asset($bradcamp->bradcamp_image) ?? static_asset('assets/img/Frame 1171276523.png') }}"
                alt="" style="width: 100%; height: 200px;">
            <h2
                style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); color: white; font-size: 26px;">
                {{ translate('Faq') }}</h2>
        </div>
    </section>

    <section class="py-4"
        style="background-image: url('{{ static_asset('assets/img/p_details_bg.jpg') }}'); background-size: cover; background-position: center;">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-12 col-lg-4 col-xl-4">
                </div>
                <div class="col-12 col-sm-12 col-md-12 col-lg-4 col-xl-4">
                    <h1 class="text-center mb-4">{{ translate('General FAQS') }}</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-sm-12 col-md-12 col-lg-4 col-xl-4">
                    <div class="d-flex justify-content-between p-2 rounded-1" style="background-color: #F3F9EC">
                        <!-- Search Label -->
                        <div class="d-flex align-items-center">
                            <input type="text" id="searchInput" class="ml-2 py-2 px-6 border-0 faq-search-input-padding"
                                placeholder="{{ translate('Search FAQ') }}">
                        </div>

                        <!-- Category Dropdown -->
                        <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle exclusive_btn-download" type="button" id="categoryDropdown"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {{ translate('Select Category') }}
                            </button>
                            <div class="dropdown-menu shadow" aria-labelledby="categoryDropdown">
                                <div class="row">
                                    @foreach ($categories as $category)
                                        <div class="col-2">
                                            <a class="dropdown-item category-link text-truncate" href="#"
                                                data-id="{{ $category->id }}">
                                                {{$category->getTranslation('name')}}
                                                <!--{{ $category->name }}-->
                                            </a>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                        </div>
                    </div>


                    <!-- FAQ Section -->
                    <div id="faqAccordion" class="mt-4">
                        @foreach ($categories as $category)
                            <div class="accordion" id="accordion{{ $category->id }}">
                                @if (!empty($category->faq_questions) && !empty($category->faq_answers))
                                    @foreach ($category->faq_questions as $index => $question)
                                        <div class="card" style="background-color: #D9EDC4">
                                            <div class="card-header" id="heading{{ $category->id }}{{ $index }}">
                                                <h5 class="mb-0">
                                                    <button class="btn btn-link fs-17" type="button" data-toggle="collapse"
                                                        data-target="#collapse{{ $category->id }}{{ $index }}"
                                                        aria-expanded="true"
                                                        aria-controls="collapse{{ $category->id }}{{ $index }}">
                                                        {{ $question }}
                                                    </button>
                                                </h5>
                                            </div>

                                            <div id="collapse{{ $category->id }}{{ $index }}" class="collapse"
                                                aria-labelledby="heading{{ $category->id }}{{ $index }}"
                                                data-parent="#accordion{{ $category->id }}">
                                                <div class="card-body fs-16">
                                                    {{ $category->faq_answers[$index] ?? 'No answer available' }}
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @else
                                    <p>No FAQs available for this category.</p>
                                @endif
                            </div>
                        @endforeach
                    </div>

                </div>

                <div class="col-12 col-sm-12 col-md-12 col-lg-8 col-xl-8">
                    @php
                        $lang = app()->getLocale(); // Get the current language (Laravel's way)
                    @endphp


                    <div class="faq-section">
                        @if (get_setting('faq_tab_title', null, $lang) != null && get_setting('faq_tab_description', null, $lang) != null)
                            <div class="faq-container">
                                @php
                                    $faq_tab_titles = json_decode(get_setting('faq_tab_title', null, $lang), true) ?? [];
                                    $faq_tab_descriptions =
                                        json_decode(get_setting('faq_tab_description', null, $lang), true) ?? [];
                                @endphp

                                @foreach ($faq_tab_titles as $key => $title)
                                    <div class="faq-box position-relative mb-3" style="text-decoration: none; background: #EDEDED;">
                                        <button class="faq-question btn btn-link fs-20 res-faq-padding"
                                            data-toggle="collapse" data-target="#faq-collapse{{ $key }}"
                                            aria-expanded="{{ $key === 0 ? 'true' : 'false' }}"
                                            aria-controls="faq-collapse{{ $key }}">
                                            {{ $title }}
                                        </button>

                                        <div id="faq-collapse{{ $key }}"
                                            class="collapse {{ $key === 0 ? 'show' : '' }}"
                                            aria-labelledby="faq-heading{{ $key }}" data-parent=".faq-container">
                                            <div class="faq-answer fs-16 p-2">
                                                @php
                                                    $faqDescription = $faq_tab_descriptions[$key] ?? 'No description available.';
                                                    $faqDescription = preg_replace('/\s*(•|\d+\.\s*|\d+\)\s*)/u', "\n$1", $faqDescription);
                                                    $faqDescription = preg_replace('/\n+/', "\n", trim($faqDescription));
                                                @endphp
                                                {!! nl2br(e($faqDescription)) !!}
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    </div>
                </div>

            </div>

            <div class="container" style="margin-top: 30px;">
                <h3 class="text-center">{{ translate('Still stuck ask directly') }}</h3>
                <div class="pb-3 ">
                    <div class=" p-4 p-xl-2rem">
                        <form class="form-default" role="form" action="{{ route('contact') }}" method="POST">
                            @csrf

                            <!-- Name -->
                            <div class="form-group">
                                <label for="name" class="fs-14 fw-700 text-soft-dark">{{ translate('Name') }}</label>
                                <input type="text" class="form-control rounded-0" value="{{ old('name') }}"
                                    placeholder="{{ translate('Enter Name') }}" name="name" required>
                            </div>
                            <!-- Name -->
                            <div class="form-group">
                                <label for="name"
                                    class="fs-14 fw-700 text-soft-dark">{{ translate('Company Name') }}</label>
                                <input type="text" class="form-control rounded-0" value="{{ old('company_name') }}"
                                    placeholder="{{ translate('Company Name') }}" name="company_name">
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <!-- Email -->
                                    <div class="form-group">
                                        <label for="email"
                                            class="fs-14 fw-700 text-soft-dark">{{ translate('Email Address') }}</label>
                                        <input type="email" class="form-control rounded-0" value="{{ old('email') }}"
                                            placeholder="{{ translate('Enter Email') }}" name="email" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <!-- Phone -->
                                    <div class="form-group">
                                        <label for="phone"
                                            class="fs-14 fw-700 text-soft-dark">{{ translate('Phone Number') }}</label>
                                        <input type="tel" class="form-control rounded-0" value="{{ old('phone') }}"
                                            placeholder="{{ translate('Enter Phone') }}" name="phone">
                                    </div>
                                </div>
                            </div>


                            <!-- Query -->
                            <div class="form-group">
                                <label for="query"
                                    class="fs-14 fw-700 text-soft-dark">{{ translate('How can we help?') }}</label>
                                <textarea class="form-control rounded-0" placeholder="{{ translate('Type here...') }}" name="content"
                                    rows="3" required></textarea>
                            </div>

                            <!-- Recaptcha -->
                            @if (get_setting('google_recaptcha') == 1)
                                <div class="form-group">
                                    <div class="g-recaptcha" data-sitekey="{{ env('CAPTCHA_KEY') }}"></div>
                                </div>
                                @if ($errors->has('g-recaptcha-response'))
                                    <span class="invalid-feedback" role="alert" style="display: block;">
                                        <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
                                    </span>
                                @endif
                            @endif

                            <!-- Submit Button -->
                            <div class="mt-4">
                                @if (env('MAIL_USERNAME') == null && env('MAIL_PASSWORD') == null)
                                    <a class="btn btn-primary fw-700 fs-14 rounded-0 w-200px" href="javascript:void(1)"
                                        onclick="showWarning()">
                                        {{ translate('Submit') }}
                                    </a>
                                @else
                                    <button type="submit"
                                        class="btn btn-primary fw-700 fs-14 rounded-0 w-200px">{{ translate('Submit') }}</button>
                                @endif

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
@endsection


@section('script')
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
@endsection

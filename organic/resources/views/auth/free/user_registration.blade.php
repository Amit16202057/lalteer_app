@extends('auth.layouts.authentication')

@section('content')
    @php
        $user = auth()->user();
        $user_avatar = null;
        $carts = [];
        if ($user && $user->avatar_original != null) {
            $user_avatar = uploaded_asset($user->avatar_original);
        }
        $system_language = get_system_language();
    @endphp
    @include('frontend.inc.nav')
    
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
            <img src="{{ static_asset('assets/img/Frame 1171276523.png') }}" alt="Banner Image" class="w-100"
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
                                {{-- <div class="size-48px mb-3 mx-auto mx-lg-0">
                                    <img src="{{ uploaded_asset(get_setting('site_icon')) }}"
                                        alt="{{ translate('Site Icon') }}" class="img-fit h-100">
                                </div> --}}
                                <!-- Titles -->
                                {{-- <div class="text-center text-lg-left">
                                    <h1 class="fs-20 fs-md-24 fw-700 text-primary" style="text-transform: uppercase;">
                                        {{ translate('Create an account') }}</h1>
                                </div> --}}
                                <!-- Register form -->
                                <div class="bg-white user-registration-page">
                                    <div class="">
                                        <form id="reg-form" class="form-default" role="form"
                                            action="{{ route('register') }}" method="POST">
                                            @csrf
                                            <!-- Name -->
                                            <div class="form-group">
                                                <label for="name"
                                                    class="fs-15 fw-700 text-soft-dark">{{ translate('Full Name') }}</label>
                                                <input type="text"
                                                    class="form-control rounded-1{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                                    value="{{ old('name') }}" placeholder="{{ translate('Full Name') }}"
                                                    name="name">
                                                @if ($errors->has('name'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('name') }}</strong>
                                                    </span>
                                                @endif
                                            </div>

                                            <!-- Email or Phone -->
                                            @if (addon_is_activated('otp_system'))
                                                <div class="form-group phone-form-group mb-1">
                                                    <label for="phone"
                                                        class="fs-15 fw-700 text-soft-dark">{{ translate('Phone') }}</label>
                                                    <input type="tel" id="phone-code"
                                                        class="form-control rounded-1{{ $errors->has('phone') ? ' is-invalid' : '' }}"
                                                        value="{{ old('phone') }}" placeholder="" name="phone"
                                                        autocomplete="off">
                                                </div>

                                                <input type="hidden" name="country_code" value="">

                                                <div class="form-group email-form-group mb-1 d-none">
                                                    <label for="email"
                                                        class="fs-15 fw-700 text-soft-dark">{{ translate('Email Address') }}</label>
                                                    <input type="email"
                                                        class="form-control rounded-1 {{ $errors->has('email') ? ' is-invalid' : '' }}"
                                                        value="{{ old('email') }}" placeholder="{{ translate('Email') }}"
                                                        name="email" autocomplete="off">
                                                    @if ($errors->has('email'))
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $errors->first('email') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>

                                                <div class="form-group text-right">
                                                    <button class="btn btn-link p-0 text-primary" type="button"
                                                        onclick="toggleEmailPhone(this)"><i>*{{ translate('Use Email Instead') }}</i></button>
                                                </div>
                                            @else
                                                <div class="form-group">
                                                    <label for="email"
                                                        class="fs-15 fw-700 text-soft-dark">{{ translate('Email Address') }}</label>
                                                    <input type="email"
                                                        class="form-control rounded-1{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                                        value="{{ old('email') }}" placeholder="{{ translate('Email') }}"
                                                        name="email">
                                                    @if ($errors->has('email'))
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $errors->first('email') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            @endif

                                            <!-- password -->
                                            <div class="form-group mb-0">
                                                <label for="password"
                                                    class="fs-15 fw-700 text-soft-dark">{{ translate('Password') }}</label>
                                                <div class="position-relative">
                                                    <input type="password"
                                                        class="form-control rounded-1{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                                        placeholder="{{ translate('Password') }}" name="password">
                                                    <i class="password-toggle las la-2x la-eye"></i>
                                                </div>
                                                <div class="text-right mt-1">
                                                    <span
                                                        class="fs-15 fw-400 text-gray-dark">{{ translate('Password must contain at least 6 digits') }}</span>
                                                </div>
                                                @if ($errors->has('password'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('password') }}</strong>
                                                    </span>
                                                @endif
                                            </div>

                                            <!-- password Confirm -->
                                            <div class="form-group">
                                                <label for="password_confirmation"
                                                    class="fs-15 fw-700 text-soft-dark">{{ translate('Confirm Password') }}</label>
                                                <div class="position-relative">
                                                    <input type="password" class="form-control rounded-1"
                                                        placeholder="{{ translate('Confirm Password') }}"
                                                        name="password_confirmation">
                                                    <i class="password-toggle las la-2x la-eye"></i>
                                                </div>
                                            </div>

                                            <!-- Recaptcha -->
                                            @if (get_setting('google_recaptcha') == 1)
                                                <div class="form-group">
                                                    <div class="g-recaptcha" data-sitekey="{{ env('CAPTCHA_KEY') }}">
                                                    </div>
                                                </div>
                                                @if ($errors->has('g-recaptcha-response'))
                                                    <span class="invalid-feedback" role="alert"
                                                        style="display: block;">
                                                        <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
                                                    </span>
                                                @endif
                                            @endif

                                            <!-- Terms and Conditions -->
                                            <div class="mb-3">
                                                <label class="aiz-checkbox">
                                                    <input type="checkbox" name="checkbox_example_1" required>
                                                    <span class="">{{ translate('I agree to the') }}
                                                        <a href="{{ route('terms') }}"
                                                            class="fw-500">{{ translate('terms and conditions.') }}</a></span>
                                                    <span class="aiz-square-check"></span>
                                                </label>
                                            </div>

                                            <!-- Submit Button -->
                                            <div class="mb-4 mt-4">
                                                <button type="submit"
                                                    class="btn btn-primary btn-block fw-600 fs-15 rounded-2">{{ translate('Register') }}</button>
                                            </div>
                                        </form>

                                        <!-- Social Login -->
                                        @if (get_setting('google_login') == 1 ||
                                                get_setting('facebook_login') == 1 ||
                                                get_setting('twitter_login') == 1 ||
                                                get_setting('apple_login') == 1)
                                            <div class="text-center mb-3">
                                                <span
                                                    class="bg-white fs-12 text-gray">{{ translate('Or Join With') }}</span>
                                            </div>
                                            <ul class="list-inline social colored text-center mb-4">
                                                @if (get_setting('facebook_login') == 1)
                                                    <li class="list-inline-item">
                                                        <a href="{{ route('social.login', ['provider' => 'facebook']) }}"
                                                            class="facebook">
                                                            <i class="lab la-facebook-f"></i>
                                                        </a>
                                                    </li>
                                                @endif
                                                @if (get_setting('google_login') == 1)
                                                    <li class="list-inline-item">
                                                        <a href="{{ route('social.login', ['provider' => 'google']) }}"
                                                            class="google">
                                                            <i class="lab la-google"></i>
                                                        </a>
                                                    </li>
                                                @endif
                                                @if (get_setting('twitter_login') == 1)
                                                    <li class="list-inline-item">
                                                        <a href="{{ route('social.login', ['provider' => 'twitter']) }}"
                                                            class="twitter">
                                                            <i class="lab la-twitter"></i>
                                                        </a>
                                                    </li>
                                                @endif
                                                @if (get_setting('apple_login') == 1)
                                                    <li class="list-inline-item">
                                                        <a href="{{ route('social.login', ['provider' => 'apple']) }}"
                                                            class="apple">
                                                            <i class="lab la-apple"></i>
                                                        </a>
                                                    </li>
                                                @endif
                                            </ul>
                                        @endif
                                    </div>

                                    <!-- Log In -->
                                    <p class="fs-12 text-gray mb-0 text-center">
                                        {{ translate('Already have an account?') }}
                                        <a href="{{ route('user.login') }}"
                                            class="ml-2 fs-14 fw-700 animate-underline-primary"><u>{{ translate('Log In') }}</u></a>
                                    </p>
                                    <!-- Go Back -->
                                    {{-- <a href="{{ url()->previous() }}"
                                        class="mt-3 fs-14 fw-700 d-flex align-items-center text-primary"
                                        style="max-width: fit-content;">
                                        <i class="las la-arrow-left fs-20 mr-1"></i>
                                        {{ translate('Back to Previous Page') }}
                                    </a> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right Side -->
                <div class="col-xxl-6 col-lg-5 pt-5 px-5">
                    <div class="rounded-3 px-5" style="background-color: #CFE661">
                        {{-- <img src="{{ uploaded_asset(get_setting('customer_login_page_image')) }}" alt=""
                            class="img-fit h-100"> --}}


                        @php
    $lang = app()->getLocale(); // 👈 get current language

    // Use current language for dynamic data
    $login_imgs = json_decode(get_setting('login_info_images', null, $lang), true) ?? [];
    $login_titles = json_decode(get_setting('login_info_title1', null, $lang), true) ?? [];
    $login_designations = json_decode(get_setting('login_info_designation', null, $lang), true) ?? [];
    $login_descriptions = json_decode(get_setting('login_info_des', null, $lang), true) ?? [];

    $max_count = max(count($login_imgs), count($login_titles), count($login_designations), count($login_descriptions));
@endphp


<div class="slideshow-container">
    @for ($i = 0; $i < $max_count; $i++)
        <div class="mySlides fade">
            <div class="pt-5">
                <img src="{{ isset($login_imgs[$i]) ? uploaded_asset($login_imgs[$i]) : static_asset('assets/img/default.png') }}"
                     alt="" class="d-flex align-items-center mx-auto img-circle"
                     style="width: 116px; height: 116px;">
            </div>
            <div class="pt-2 pb-5">
                <div style="position: absolute; z-index: 1;">
                    <img src="{{ static_asset('assets/img/first cotation 2.png') }}" alt="">
                </div>
                <div class="bg-white py-4 rounded-2 custom-box position-relative">
                    <span class="d-flex flex-column">
                        <span class="opacity-80 fs-17 text-center">
                            {{ $login_titles[$i] ?? 'No Title' }}
                        </span>
                        <span class="opacity-80 fs-17 text-center">
                            {{ $login_designations[$i] ?? 'No Designation' }}
                        </span>
                    </span>
                    <p class="opacity-80 pt-3 px-3 justify-content">
                        {{ $login_descriptions[$i] ?? 'No Description Available.' }}
                    </p>
                </div>
                <div style="position: absolute; z-index: 1; right: 0; margin-top: -25px !important; margin-right: 5px;">
                    <img src="{{ static_asset('assets/img/first cotation 1.png') }}" alt="">
                </div>
            </div>
        </div>
    @endfor
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
@endsection

@section('script')
    @if (get_setting('google_recaptcha') == 1)
        <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    @endif

    <script type="text/javascript">
        @if (get_setting('google_recaptcha') == 1)
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
        @endif


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
@endsection

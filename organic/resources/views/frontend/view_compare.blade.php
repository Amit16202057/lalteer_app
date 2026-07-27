@extends('frontend.layouts.app')

@section('content')

    <section class="mb-1 pt-3">
        <div class="product-details-bredcrumb" style="position: relative; text-align: center;">
            <img src="{{ static_asset('assets/img/Frame 1171276523.png') }}" alt=""
                style="width: 100%; height: 200px;">
            <h2
                style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); color: white; font-size: 26px;">
                {{ translate('Compare Products') }}</h2>
        </div>
    </section>

    <section
        style="background-image: url('{{ static_asset('assets/img/p_details_bg.jpg') }}'); background-size: cover; background-position: center;">
        <section class="mb-4">
            <div class="container text-left">
                <div class="row">
                    <div class="col-md-2 p-4">
                        <div class="dotted_box">
                            Remove any
                            varieties that
                            you don’t want
                            to include in
                            this planting
                            or
                        </div>
                    </div>
                    <div class="col-md-10">
                        {{-- <div class="py-3 d-flex justify-content-between align-items-center">
                        <div class="fs-16 fs-md-20 fw-700 text-dark">{{ translate('Compare Products') }}</div>
                        <a href="{{ route('compare.reset') }}" style="text-decoration: none;border-radius: 25px;"
                            class="btn btn-soft-primary btn-sm fs-12 fw-600">{{ translate('Reset Compare List') }}</a>
                    </div> --}}
                        @if (Session::has('compare'))
                            @if (count(Session::get('compare')) > 0)
                                <div class="py-3">
                                    <div class="row gutters-16 mb-4">
                                        @foreach (Session::get('compare') as $key => $item)
                                            @php
                                                $product = get_single_product($item);
                                            @endphp
                                            <div class="col-xl-4 col-lg-4 col-md-6 py-3">
                                                <div class="border">
                                                    <!-- Product Image -->
                                                    <div class="border-bottom">
                                                        <div>
                                                            <img loading="lazy" height="200px" width="100%"
                                                                src="{{ uploaded_asset(get_single_product($item)->thumbnail_img) }}"
                                                                alt="{{ translate('Product Image') }}" class="">
                                                        </div>
                                                    </div>
                                                    <!-- Product Name -->
                                                    <div class="p-3 border-bottom d-flex justify-content-between">
                                                        <div>
                                                            <h5 class="mb-0 text-dark text-truncate-2">
                                                                <a class="text-reset fs-14 fw-700 hov-text-primary"
                                                                    href="{{ route('product', get_single_product($item)->slug) }}"
                                                                    title="{{ get_single_product($item)->getTranslation('name') }}">
                                                                    {{ get_single_product($item)->getTranslation('name') }}
                                                                </a>
                                                            </h5>
                                                            <span class="opacity-50">
                                                                @if (get_single_product($item)->main_category != null)
                                                                    {{ get_single_product($item)->main_category->getTranslation('name') }}
                                                                @endif
                                                            </span>
                                                        </div>
                                                        <!-- Price -->
                                                        <div class="mt-2">
                                                            {{-- <span class="fs-12 text-gray">{{ translate('Price') }}</span> --}}
                                                            <h5 class="mb-0 fs-14">

                                                                <span
                                                                    class="fw-700 text-primary">{{ home_discounted_base_price($product) }}</span>
                                                                @if (home_base_price($product) != home_discounted_base_price($product))
                                                                    <del
                                                                        class="fw-400 fs-10 opacity-50 mr-1">{{ home_base_price($product) }}</del>
                                                                @endif
                                                            </h5>
                                                        </div>
                                                    </div>

                                                    <!-- Category -->
                                                    <div class="p-3 border-bottom" style="background-color: #D9EDC4">
                                                        Specifications
                                                    </div>
                                                    <div class="border-bottom">
                                                        {!! $product->specification !!}
                                                    </div>
                                                    <div class="p-3 border-bottom" style="background-color: #D9EDC4">
                                                        Description
                                                    </div>
                                                    <div class="border-bottom p-3">
                                                        {!! $product->description !!}
                                                    </div>

                                                    @php
                                                        $total = 0;
                                                        $total += $product->reviews->where('status', 1)->count();
                                                    @endphp
                                                    <div class="p-3 border-bottom" style="background-color: #D9EDC4">
                                                        <span class="rating rating-mr-2 text-warning">
                                                            {{ renderStarRating($product->rating) }}
                                                        </span>
                                                        <span class="ml-1 opacity-50 fs-14">({{ $total }})</span>
                                                    </div>
                                                    <div class="p-3" style="background-color: #D9EDC4">
                                                        <i class="fa-solid fa-message pr-2 mt-1"></i>Comments

                                                    </div>
                                                    <div class="comments_content">
                                                        @foreach ($product->reviews as $key => $review)
                                                            @php

                                                                $customerName = null;
                                                                $customerAvatar = null;
                                                                if ($review->type == 'real') {
                                                                    $customerName =
                                                                        $review->user != null
                                                                            ? $review->user->name
                                                                            : translate('Use is Not Available');
                                                                    $customerAvatar =
                                                                        $review->user != null
                                                                            ? uploaded_asset(
                                                                                $review->user->avatar_original,
                                                                            )
                                                                            : static_asset(
                                                                                'assets/img/placeholder.jpg',
                                                                            );
                                                                } else {
                                                                    $customerName = $review->custom_reviewer_name;
                                                                    $customerAvatar = uploaded_asset(
                                                                        $review->custom_reviewer_image,
                                                                    );
                                                                }
                                                            @endphp
                                                            <li class="media list-group-item d-flex px-3 px-md-4 border-0">
                                                                <!-- Review User Image -->
                                                                <span class="avatar avatar-md mr-3">
                                                                    <img class="lazyload"
                                                                        src="{{ static_asset('assets/img/placeholder.jpg') }}"
                                                                        onerror="this.onerror=null;this.src='{{ static_asset('assets/img/placeholder.jpg') }}';"
                                                                        data-src="{{ $customerAvatar }}">
                                                                </span>
                                                                <div class="media-body text-left">
                                                                    <!-- Review Date -->
                                                                    <div class="mb-1 fw-600">
                                                                        {{ date('d-m-Y', strtotime($review->created_at)) }}
                                                                    </div>
                                                                    <!-- Review User Name -->
                                                                    <h3 class="fs-15  mb-0">{{ $customerName }}
                                                                    </h3>
                                                                    <!-- Review Comment -->
                                                                    <p class="comment-text mt-2 fs-14">
                                                                        {{ $review->comment }}
                                                                    </p>


                                                                </div>
                                                            </li>
                                                        @endforeach
                                                    </div>
                                                    <!-- Add to cart -->
                                                    <div class="p-4">
                                                        <button type="button"
                                                            class="btn btn-block btn-primary rounded-2 fs-13 fw-700 has-transition opacity-80 hov-opacity-100"
                                                            onclick="showAddToCartModal({{ $item }})">
                                                            {{ translate('Buy Now') }}
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @endif
                        @else
                            <div class="text-center p-4">
                                <p class="fs-17">{{ translate('Your comparison list is empty') }}</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </section>
    </section>

@endsection

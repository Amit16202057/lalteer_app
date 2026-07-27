@extends('frontend.layouts.app')

@section('meta_title'){{ $page->meta_title ?? $page->getTranslation('title') }}@stop
@section('meta_description'){{ $page->meta_description }}@stop
@section('meta_keywords'){{ $page->tags }}@stop

@section('meta')
    <meta itemprop="name" content="{{ $page->meta_title ?? $page->getTranslation('title') }}">
    <meta itemprop="description" content="{{ $page->meta_description }}">
    <meta itemprop="image" content="{{ uploaded_asset($page->meta_image) }}">

    <meta name="twitter:card" content="website">
    <meta name="twitter:site" content="@publisher_handle">
    <meta name="twitter:title" content="{{ $page->meta_title ?? $page->getTranslation('title') }}">
    <meta name="twitter:description" content="{{ $page->meta_description }}">
    <meta name="twitter:creator" content="@author_handle">
    <meta name="twitter:image" content="{{ uploaded_asset($page->meta_image) }}">

    <meta property="og:title" content="{{ $page->meta_title ?? $page->getTranslation('title') }}" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="{{ URL($page->slug) }}" />
    <meta property="og:image" content="{{ uploaded_asset($page->meta_image) }}" />
    <meta property="og:description" content="{{ $page->meta_description }}" />
    <meta property="og:site_name" content="{{ env('APP_NAME') }}" />
@endsection

@section('content')
    @php
        $pageTitle = $page->getTranslation('title');
        $pageContent = $page->getTranslation('content');
        $isPlainText = strip_tags($pageContent) === $pageContent;
        $bannerImage = $page->bradcamp_image ? uploaded_asset($page->bradcamp_image) : static_asset('assets/img/Frame 1171276523.png');
    @endphp

    <section class="mb-1 pt-3">
        <div class="product-details-bredcrumb" style="position: relative; text-align: center;">
            <img src="{{ $bannerImage }}"
                alt="{{ $pageTitle }}" style="width: 100%; height: 200px; object-fit: cover;">
            <h2 style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); color: white; font-size: 26px;">
                {{ $pageTitle }}
            </h2>
        </div>
    </section>

    <section class="pt-4 pb-5" style="background-image: url('{{ static_asset('assets/img/p_details_bg.jpg') }}'); background-size: cover; background-position: center;">
        <div class="container">
            <div class="p-3 p-md-4 p-xl-5" style="background-color: {{ hex2rgba(get_setting('base_color', '#d43533'), 0.02) }};">
                <div class="bg-white p-3 p-md-4 p-xl-5">
                    <h1 class="fs-24 fw-700 mb-3">{{ $pageTitle }}</h1>
                    <div class="fs-15 text-soft-dark text-left" style="line-height: 1.8;">
                        @if ($isPlainText)
                            {!! nl2br(e($pageContent)) !!}
                        @else
                            {!! $pageContent !!}
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

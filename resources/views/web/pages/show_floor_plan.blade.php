@extends('web.layouts.frontend', ['title' => $floorPlan->title])

@section('meta_tags')
<meta name="title" Content="{{ gs('site_name')}} - {{ $floorPlan->title}}">
<meta name="keywords" content="property">
<link rel="shortcut icon" href="{{ siteFavicon() }}" type="image/x-icon">

{{--<!-- Apple Stuff -->--}}
<link rel="apple-touch-icon" href="{{ siteLogo() }}">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<meta name="apple-mobile-web-app-title" content="{{ gs('site_name') }} - {{ $floorPlan->title }}">

{{--<!-- Google / Search Engine Tags -->--}}
<meta itemprop="name" content="{{ gs('site_name')}} - {{ $floorPlan->title }}">
<meta itemprop="description" content="{{ $floorPlan->title }}">
<meta itemprop="image"
    content="{{ getImage('assets/images/frontend/floor_plan/' . @$floorPlan->plan, '315x180') }}">

{{--<!-- Facebook Meta Tags -->--}}
<meta property="og:type" content="website">
<meta property="og:title" content="{{ $floorPlan->title }}">
<meta property="og:description" content="{{ $floorPlan->title }}">
<meta property="og:image"
    content="{{ getImage('assets/images/frontend/floor_plan/' . @$floorPlan->plan, '315x180') }}" />
<meta property="og:image:type"
    content="image/{{ getImage('assets/images/frontend/floor_plan/' . @$floorPlan->plan, '315x180') }}" />
<meta property="og:image:width" content="{{ getImage('assets/images/frontend/floor_plan/' . @$floorPlan->plan, '315x180') }}" />
<meta property="og:image:height" content="{{ getImage('assets/images/frontend/floor_plan/' . @$floorPlan->plan, '315x180') }}" />
<meta property="og:url" content="{{ url()->current() }}">

{{--<!-- Twitter Meta Tags -->--}}
<meta name="twitter:card" content="summary_large_image">
@endsection

@section('content')

<section class="py-5 property-details-main">
    <div class="container">
        <div class="row">
            <div class="mt-5 col-12 col-lg-6 col-xl-6">
                <div class="property--details-gallery">
                    <div class="w-100">
                        <div class="first--image h-100">
                            @if (!empty($floorPlan->plan))
                            <a href="{{ getImage('assets/images/frontend/floor_plan/' . @$floorPlan->plan, '315x180') }}"
                                class="h-100">
                                <img src="{{ getImage('assets/images/frontend/floor_plan/' . @$floorPlan->plan, '315x180') }}"
                                    alt="Image" class="w-100"></a>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="mt-4 property--details">
                    <div class="">
                        <div>
                            <h4>
                                {{ app()->getLocale() == 'en' ? $floorPlan->title : $floorPlan->title_ar}}
                            </h4>
                        </div>
                        <a href="{{ route('floorPlanRequest', ['title' => urlencode(app()->getLocale() == 'en' ? $floorPlan->title : $floorPlan->title_ar)]) }}" class="btn" style="background-color: #39004E !important; color: #FFF">@lang('Request')</a>
                       <a href="tel:+9660550217734" class="btn btn-success m-2">
                            <i class="fab fa-whatsapp"></i>
                            <span>@lang('Whatsapp')</span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-6 col-xl-6 mt-4">
                <h5>{{ __('Floor Information') }} :</h5>
                <div class="border shadow-none card">
                    <div class="p-0 card-body">
                        <div class="p-3">
                            <p><b>@lang('Title')</b></p>
                            <p>{{  app()->getLocale() == 'en' ? $floorPlan->title : $floorPlan->title_ar }}</p>
                        </div>

                        <div class="p-3">
                            <p><b>@lang('Description')</b></p>
                            <p>{!! app()->getLocale() == 'en' ? $floorPlan->description : $floorPlan->description_ar !!}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('style')
<style>
    .property--details-gallery img {
        width: 100%;
        object-fit: cover;
        height: 100%;
    }

    .property--details-gallery .first--image img {
        width: 100%;
        height: 300px;

    }

    .property--details-gallery .second--image a:first-child img {
        padding-bottom: 5px;
    }

    .property--details-gallery .second--image {
        position: relative;
    }

    .property--details-gallery .second--image span {
        position: absolute;
        bottom: 10px;
        right: 10px;
        background: hsl(var(--base)/0.8);
        display: inline-block;
        padding: 0px 10px;
        font-size: 14px;
        color: #ffffff;
    }

    @media only screen and (max-width: 1399px) {
        .property--details-gallery .first--image img {
            width: 450px;
        }
    }

    @media only screen and (max-width: 1199px) {
        .property--details-gallery .first--image img {
            width: 360px;
        }
    }

    @media only screen and (max-width: 991px) {
        .property--details-gallery .first--image img {
            width: 450px;
        }
    }

    @media only screen and (max-width: 768px) {
        .property--details-gallery .first--image img {
            width: 340px;
        }
    }

    .property--details-slider .slick-dots li {
        height: 5px;
        width: 5px;
        background: #000000;
        list-style: none;
        border-radius: 50%;
    }

    .property--details-slider .slick-dots li.slick-active {
        background: #cccccc;
    }

    .property--details-slider .slick-initialized .slick-slide {
        overflow: hidden;
        max-height: 100%;
    }

    .property--details-slider .slick-dotted.slick-slider {
        margin-bottom: 50px;
    }

    .slick-dots li button:before {
        display: none;
    }

    /* property */
    .property-details-right {
        padding: 15px;
        border: 1px solid #cccccc;
        border-radius: 10px;
    }

    .property-details-right .author-profile img {
        width: 50px;
        height: 50px;
        border-radius: 50%;
    }

    .property-details-right .property2-contact .whatsapp {
        padding: 10px 10px;
        color: #03AD00;
    }

    .property-details-right .property2-contact .phone {
        padding: 10px 20px;
    }

    .property2-contact .whatsapp {
        border: 1px solid #03AD00;
        padding: 5px 10px;
        border-radius: 2px;
        font-weight: 600;
    }

    .property2-contact .phone {
        border: 1px solid #000000;
        padding: 5px 20px;
        border-radius: 2px;
        font-weight: 600;
        background: #000000;
        color: #ffffff;
    }

    .property2-contact .phone:hover {
        background: none;
        color: #000000;
    }

    .property-details-main .list-group {
        max-width: 500px;
    }

    .property-details-main .list-group .list-group-item {
        display: flex;
        flex-wrap: nowrap;
        justify-content: space-between;
        background-color: #fafafa;
    }

    .list-group-item:first-child {
        border-top-left-radius: inherit;
        border-top-right-radius: inherit;
    }

    .property-details-main ul li {
        border-top: none;
        border-left: none;
        border-right: none;
        border-bottom: 1px dotted #000 !important;
    }

    .card-body .card-list {
        display: flex;
        padding: 8px;
        flex-wrap: nowrap;
        border-bottom: 1px solid #cccccc;
        justify-content: space-between;

    }

    .card-body .card-list:last-child {
        border-bottom: none;
    }
</style>
@endpush

@push('style-lib')
<link rel="stylesheet" href="{{ asset('assets/global/css/magnific-popup.css') }}">
<link rel="stylesheet" href="{{ asset('assets/web/css/slick.css') }}">
<link rel="stylesheet" href="{{ asset('assets/web/css/slick-theme.css') }}">
@endpush

@push('script-lib')
<script src="{{ asset('assets/global/js/magnific-popup.js') }}"></script>
<script src="{{ asset('assets/web/js/slick.min.js') }}"></script>
@endpush

@push('script')
<script>
    $('.property--details-gallery').each(function() { // the containers for all your galleries
        $(this).magnificPopup({
            delegate: 'a', // the selector for gallery item
            type: 'image',
            gallery: {
                enabled: true
            }
        });
    });
    $(".property--details-slider").slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 3000,
        speed: 1800,
        dots: true,
        arrows: false,
    });
</script>
@endpush

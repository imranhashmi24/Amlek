@extends('web.layouts.frontend', ['title' => 'Property Detail'])
@push('style')
    <link rel="stylesheet" href="{{ asset('assets/web/css/propertryslider.css') }}">
@endpush

@section('meta_tags')
    <meta name="title" Content="{{ gs('site_name')}} - {{ $property->lang('title') }}">
    <meta name="description" content="{{ $property->lang('description') }}">
    <meta name="keywords" content="property">
    <link rel="shortcut icon" href="{{ siteFavicon() }}" type="image/x-icon">

    {{--<!-- Apple Stuff -->--}}
    <link rel="apple-touch-icon" href="{{ siteLogo() }}">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-title" content="{{ gs('site_name') }} - {{ $property->lang('title') }}">

    {{--<!-- Google / Search Engine Tags -->--}}
    <meta itemprop="name" content="{{ gs('site_name')}} - {{ $property->lang('title') }}">
    <meta itemprop="description" content="{{ $property->lang('description') }}">
    <meta itemprop="image" content="{{ getImage(getFilePath('property_thumb') . '/' . $property->thumb_image, getFileSize('property_thumb')) }}">

    {{--<!-- Facebook Meta Tags -->--}}
    <meta property="og:type" content="website">
    <meta property="og:title" content="{{ $property->lang('title') }}">
    <meta property="og:description" content="{{ $property->lang('description') }}">
    <meta property="og:image" content="{{ getImage(getFilePath('property_thumb') . '/' . $property->thumb_image, getFileSize('property_thumb')) }}"/>
    <meta property="og:image:type" content="image/{{ getImage(getFilePath('property_thumb') . '/' . $property->thumb_image, getFileSize('property_thumb')) }}" />
    <meta property="og:image:width" content="{{ getFileSize('property_thumb') }}" />
    <meta property="og:image:height" content="{{ getFileSize('property_thumb') }}" />
    <meta property="og:url" content="{{ url()->current() }}">

    {{--<!-- Twitter Meta Tags -->--}}
    <meta name="twitter:card" content="summary_large_image">
@endsection

@section('content')


    <section class="py-5 property-details-main">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-7 col-xl-8">
                    <div class="property--details-gallery d-none d-sm-flex">
                        <div class="w-100">
                            <div class="first--image h-100">
                                @if (!empty($property->thumb_image))
                                    <a href="{{ getImage(getFilePath('property_thumb') . '/' . $property->thumb_image, getFileSize('property_thumb')) }}"
                                        class="h-100">
                                        <img src="{{ getImage(getFilePath('property_thumb') . '/' . $property->thumb_image, getFileSize('property_thumb')) }}"
                                            alt="Image"></a>
                                @endif
                            </div>
                        </div>
                        <div class="flex-shrink-1 second--image">
                            @if (!empty($propertyImages))
                                @foreach ($propertyImages as $key => $image)
                                    <a href="{{ getImage(getFilePath('property') . '/' . $image->image, getFileSize('property')) }}"
                                        class="h-50 ms-2 w-100 {{ $key > 1 ? 'd-none' : '' }}">
                                        <img src="{{ getImage(getFilePath('property') . '/' . $image->image, getFileSize('property')) }}"
                                            alt="Image"></a>
                                @endforeach
                            @endif
                            <span> <i class="bi bi-camera"></i> {{ $propertyImages->count() + 1 }} </span>
                        </div>
                    </div>

                    <div class="property--details-slider d-sm-none">
                        @if (!empty($property->thumb_image))
                            <img src="{{ getImage(getFilePath('property_thumb') . '/' . $property->thumb_image, getFileSize('property_thumb')) }}"
                                alt="Image">
                        @endif
                        @if (!empty($propertyImages))
                            @foreach ($propertyImages as $key => $image)
                                <img src="{{ getImage(getFilePath('property') . '/' . $image->image, getFileSize('property')) }}"
                                    alt="Image">
                            @endforeach
                        @endif
                    </div>


                    <div class="mt-4 property--details">
                        <div class="flex-wrap property--title d-flex justify-content-between">
                            <div>
                                <h4>
                                    {{ $property->lang('title') }}
                                </h4>
                                <p class="mt-2 mb-0 property-type-property">
                                    <img src="{{ getImage(getFilePath('propertyType') . '/' . $property->propertyType->icon, getFileSize('propertyType')) }}"
                                        alt="">
                                    {{ @$property->propertyType->lang('name') }}

                                </p>
                            </div>
                            <div>
                                <p>
                                    <i class="bi bi-geo-alt"></i>
                                    {{ $property->country->lang('name') }},
                                    {{ $property->city->lang('name') }}
                                </p>
                            </div>

                            <div>
                                <a href=""  data-bs-toggle="modal"
                                data-bs-target="#propertyRequestForm" class="btn" style="background-color: #39004E !important; color: #FFF"> @lang('Request') </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="my-3 col-12 col-lg-5 col-xl-4 mt-lg-0">
                    <div class="property-details-right wow fadeInUp" data-wow-duration="1s">
                        <h4> {{ $property->price ?? '' }} {{ __('SAR') }}/{{ __('month') }}</h4>
                        <span class="author">{{  __('Authorized Broker') }}</span>
                        <div class="gap-3 mt-3 author-profile d-flex">
                            <div>
                                <img src="{{ asset('assets/images') }}/default.png">
                            </div>
                            <div>
                                <span>{{ __('Listed by') }}</span>
                                <h5>
                                    @if (!empty($property->user))
                                        {{ $property->user->name }}
                                    @else
                                      {{ __('Admin') }}
                                    @endif
                                </h5>
                            </div>
                        </div>
                        <div class="gap-2 mt-4 d-flex property2-contact">
                            <a href="https://wa.me/966551175959" class="text-center whatsapp w-100">
                                <i class="bi bi-whatsapp"></i>
                                <span>{{ __('Whatsapp') }}</span>
                            </a>
                            <a href="tel:+966550217734" class="text-center phone w-100">
                                <i class="bi bi-telephone-fill"></i>
                                <span>{{ __('Call us') }}</span>
                            </a>
                        </div>
                    </div>

                    <div>
                        @include('web.component.map')
                    </div>
                </div>


                <div class="col-12 col-lg-7 col-xl-8">
                    <div class="mt-5">
                        <h5>{{ __('Property Information') }} :</h5>
                        <div class="border shadow-none card">
                            <div class="p-0">
                                <table class="table table-bordered table-striped">
                                    <tbody>
                                        <tr>
                                            <th>@lang('Title')</th>
                                            <td>{{ $property->lang('title') }}</td>
                                        </tr>
                                        <tr>
                                            <th>@lang('Property Type')</th>
                                            <td>{{ $property->propertyType->lang('name') }}</td>
                                        </tr>
                                        <tr>
                                            <th>@lang('Property Type')</th>
                                            <td>{{ @$property->subPropertyType->lang('name') }}</td>
                                        </tr>
                                        <tr>
                                            <th> @lang('Construction Type')</th>
                                            <td>{{ __($property->construction_type) }}</td>
                                        </tr>
                                        <tr>
                                            <th> @lang('Type')</th>
                                            <td>{{ __($property->purpose) }}</td>
                                        </tr>


                                @foreach ($property->details as $detail)
                                        <tr>
                                            <th> @lang(keyToTitle($detail->field))</th>
                                            <td>{{ __($detail->val) }}</td>
                                        </tr>
                                @endforeach
                                <tr>
                                    <th>@lang('Price')</th>
                                    <td>{{ $property->price }} {{ gs('cur_sym') }}</td>
                                </tr>
                                <tr>
                                    <th>@lang('Sqr Price')</th>
                                    <td>{{ $property->sqr_price }} {{ gs('cur_sym') }}</td>
                                </tr>
                                <tr>
                                    <th>@lang('Reference no')</th>
                                    <td>{{ $property->reference_no }}</td>
                                </tr>
                                <tr>
                                    <th>@lang('Ad license number')</th>
                                    <td>{{ $property->ad_license_number }}</td>
                                </tr>
                                </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="mt-5">
                        <h5>{{ __('Location Information') }} :</h5>
                        <div class="border shadow-none card">
                            <table class="p-0 table">
                                <tbody>
                                <tr>
                                    <th>@lang('Country')</th>
                                    <td> {{ $property->country->lang('name') }}</td>
                                </tr>
                                <tr>
                                    <th>@lang('City')</th>
                                    <td> {{ $property->city->lang('name') }} </td>
                                </tr>
                                <tr>
                                    <th>@lang('Features')</th>
                                    <td>{{ $property->lang('features') }}</td>
                                </tr>

                                <tr>
                                  <td colspan="2">

                                    @php echo $property->lang('description') @endphp
                                    </td>
                                </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @include('web.component.property_request_form')
@endsection

@push('style')
    <style>
        
        @if(app()->getLocale() == 'en')
            table tr td:last-child
            {
                text-align:left;
            }
        @else
        
            table tr td:last-child
            {
                text-align:right;
            }
        @endif
        
        
        .property--details-gallery img {
            width: 100%;
            object-fit: cover;
            height: 100%;
        }

        .property--details-gallery .first--image img {
            width: 570px;
            height: 100%;

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

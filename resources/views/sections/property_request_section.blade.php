@php
    $requestProperties = \App\Models\PropertyRequest::accepted()->latest()->take(10)->get();
@endphp

<section class="py-3 py-lg-5">
    <div class="container">
        <div class="gap-3 d-flex align-items-center justify-content-between">
            <div>
                <h5 class="py-3 pt-3 m-0 fs-3">@lang('Opportunities')</h5>
            </div>
            <div class="">
                <a href="{{ route('propertyRequestPage') }}" class="text-decoration-none">
                    @lang('See more')
                </a>
            </div>
        </div>
        <div class="property_request_slider service-slider">
            @foreach ($requestProperties as $propertyRequestElement)
                <div class="mx-1">
                    <a href="{{ route('propertyRequestDetails', $propertyRequestElement->id) }}">
                        <div class="p-2">
                            <div class="service-slider-box-plain">
                                <img src="{{ getImage('assets/admin/images/property_thumb/' . @$propertyRequestElement->thumb_image, '500x350') }}"
                                alt="">
                                <div class="overlay-service-plain">
                                    <h5 class="px-2">{{ Str::limit(@$propertyRequestElement->detail, 30, '...') }}</h5>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</section>


@push('style-lib')
    <link rel="stylesheet" href="{{ asset('assets/web/css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/web/css/slick-theme.css') }}">
@endpush

@push('script-lib')
    <script src="{{ asset('assets/web/js/slick.min.js') }}"></script>
@endpush

@push('script')
    <script>

        $(".property_request_slider").slick({
            slidesToShow: 4,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 3000,
            speed: 1800,
            dots: false,
            arrows: false,
            @if (session()->get('lang') == 'ar')
                rtl: true,
            @endif
            responsive: [{
                    breakpoint: 1200,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 1,
                    }
                },
                {
                    breakpoint: 992,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 1,
                    }
                },
                {
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1,
                    }
                },

            ]

        });
    </script>
@endpush


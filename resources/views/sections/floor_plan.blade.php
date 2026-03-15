@php
    $floorPlanElements = getContent('floor_plan.element', null, false, true);
@endphp

<section class="py-3 py-lg-5">
    <div class="container">
        <div class="gap-3 d-flex align-items-center justify-content-between">
            <div class="">
                <h5 class="py-3 pt-3 m-0 fs-3">@lang('Properties area plan on offers')</h5>
            </div>
            <div class="">
                <a href="{{ route('floor-plans') }}" class="text-decoration-none">
                    @lang('See more')
                </a>
            </div>
        </div>
        <div class="floor_plan service-slider">
            @foreach ($floorPlanElements as $floorPlanElement)
                <div class="mx-1">
                    <a href="{{ route('showFloorPlan', $floorPlanElement->id) }}">
                        <div class="p-2">
                            <div class="service-slider-box-plain">
                                <img src="{{ getImage('assets/images/frontend/floor_plan/' . @$floorPlanElement->lang('plan'), '315x180') }}" alt="">
                                <div class="overlay-service-plain">
                                    <h5>{{ Str::limit(@$floorPlanElement->lang('title'), 30, '...') }}</h5>
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
        $(".floor_plan").slick({
            slidesToShow: 4,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 3000,
            speed: 1000,
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

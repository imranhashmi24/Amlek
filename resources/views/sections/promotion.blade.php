@php
    $promotionElements = getContent('promotion.element', null, false, true);
    $countries = App\Models\Country::with('city')->get();
@endphp

<section class="py-3 py-lg-5">
    <div class="container">
        <div class="gap-3 d-flex align-itmes-center">
            <div>
                <h5 class="py-3 pt-3 m-0 fs-3">{{ __('Requests') }}</h5>
            </div>
        </div>
        <div class="promo_slider service-slider">
            @foreach ($promotionElements as $promotionElement)
                <div class="mx-1">
                    <a href="{{ route('promotion.request',$promotionElement->id) }}">
                       <div class="p-2">
                            <div class="service-slider-box-plain">
                                <img src="{{ getImage('assets/images/frontend/promotion/' . @$promotionElement->data_values->image) }}"
                                    alt="" />
                                <div class="overlay-service-plain">
                                    <h5 class="px-2">{!! Str::limit(@$promotionElement->lang('short_description'), 30, '...') !!}</h5>
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


        $('[name=country_id]').on('change', function() {
            var cities = $(this).find('option:selected').data('cities');
            var option = '<option value="">@lang('Select one')</option>';
            $.each(cities, function(index, value) {

                var name = "{{ app()->getLocale() }}" == 'en' ? value.name : value.name_ar;

                option += "<option value='" + value.id + "' " + (value.id == "" ? "selected" : "") +
                    "data-lat='" + value.lat + "' data-lng='" + value.lng + "'>" +
                    name + "</option>";
            });

            $('select[name=city_id]').html(option);
        }).change();


        $(".promo_slider").slick({
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

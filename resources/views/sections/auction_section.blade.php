
<section class="py-3 py-lg-5">
    <div class="container">
        <div class="gap-3 d-flex align-items-center justify-content-between">
            <div class="">
                <h5 class="py-3 pt-3 m-0 fs-3">@lang('Auctions')</h5>
            </div>
            <div class="">
                <a href="{{ route('auctions') }}" class="text-decoration-none">
                    @lang('See more')
                </a>
            </div>
        </div>
        <div class="auction-slider">
            @foreach ($auctions as $auction)
                <div class="card">
                    <div class="card-image">
                        <img src="{{ getImage(getFilePath('auction_thumb') . '/' . $auction->thumb_image, getFileSize('auction_thumb')) }}" alt="">
                        <div class="card-love">
                            <button type="button" class="love-btn react"  data-type="auction" data-item="{{ $auction->id }}">
                                <i class="fa fa-heart {{ findMyFvt('auction', $auction->id) ? 'text-danger' : '' }}"></i>
                            </button>
                        </div>
                    </div>

                    <div class="card-content">
                        <p><span>@lang('Start on'): {{ showDateTime($auction->beginning_time, 'l h:i A') }}</span></p>
                        <p><span>@lang('Duration'):{{ $auction->auction_day }} @lang('Days')</span></p>
                        <a href="{{ route('auction.details', $auction->slug) }}" class="view-btn">
                            @lang('View Details')
                        </a>
                    </div>

                    <div class="title-overlay">
                        <div class="title-content">
                            <h3>
                                @if(app()->getLocale() == 'en')
                                    {{ $auction->title }}
                                @else
                                    {{ $auction->title_ar }}
                                @endif
                            </h3>
                            <p>
                                <i class="bi bi-geo-alt-fill"></i>
                                @if(app()->getLocale() == 'en')
                                    {{ optional($auction->city)->name }} , {{ optional($auction->country)->name }}
                                @else
                                    {{ optional($auction->city)->name_ar }}, {{ optional($auction->country)->name_ar }}
                                @endif
                            </p>
                        </div>
                    </div>
                    <div class="card-overlay" id="countdown_{{ $auction->id }}">
                        @include('web.pages.includes.__auction_time')
                    </div>
                </div>
            @endforeach
        </div>

    </div>
</section>


@include('web.component.__js_fvt_react')



@push('style-lib')
    <link rel="stylesheet" href="{{ asset('assets/web/css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/web/css/slick-theme.css') }}">
@endpush

@push('script-lib')
    <script src="{{ asset('assets/web/js/slick.min.js') }}"></script>
@endpush


@push('script')
    <script>
        $(".auction-slider").slick({
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
                        slidesToShow: 1,
                        slidesToScroll: 1,
                    }
                },
                {
                    breakpoint: 992,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                    }
                },
                {
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 2,
                    }
                },

            ]

        });
    </script>
@endpush


@push('style')
    <style>
        .auction-slider .card{
            margin: 10px !important;
            height: 400px !important;
        }

        .card-overlay {
            position: absolute;
            top: 58%;
        }

        /* Image styles */
        .card-image {
            position: relative;
            width: 100%;
            border-radius: 15px 15px 0 0;
            overflow: hidden;
            z-index: 0;

        }

        .card-image img {
            width: 100%;
            height: 215px !important;
            object-fit: cover;
            transition: transform 0.3s ease;
        }

        @media (max-width: 768px) {
            .auction-slider .card{
                margin: 10px !important;
                height: 280px !important;
            }

            .card-overlay {
                position: absolute;
                top: 50%;
                height: 50px !important;

            }
            .time-count{
                width: 50px !important;
            }

            .overly-content p{
                color: #000 !important;
                line-height: 2px;
                font-size: 10px;
            }

            .overly-content p:nth-of-type(2){
                font-size: 8px;
            }

            .card-content{
                padding: 45px 20px 0px 20px;
                background-color: #ffffff;
                border-radius: 0 0 15px 15px;
                box-shadow: 0 8px 12px rgba(0, 0, 0, 0.1);
                z-index: 1;
            }

            .card-content p span{
                line-height: 5px !important;
                font-size: 9px !important;
            }

            /* Image styles */
            .card-image {
                position: relative;
                width: 100%;
                border-radius: 15px 15px 0 0;
                overflow: hidden;
                z-index: 0;

            }

            .card-image img {
                width: 100%;
                height: 130px !important;
                object-fit: cover;
                transition: transform 0.3s ease;
            }

            .view-btn{
                height: 28px;
                padding: 5px;
                gap: 5px;
                border-radius: 8px;
                opacity: 1;
                background: var(--theme-color);
                color: var(--white);
                justify-content: center;
                align-items: center;
                margin: 5px 0px 20px 0px;
                text-transform: uppercase;
                z-index: 9;
                font-size: 12px;
            }

            .title-overlay{
                position: absolute;
                top: 70px;
                left: 25px;
                width: 90%;
            }

            .title-overlay .title-content{
                color: var(--white);
                line-height: 2px;
            }

            .title-overlay .title-content h3
            {
                font-size: 14px;
            }

            .title-overlay .title-content p{
                font-size: 10px;
            }

            .card-love{
                position: absolute;
                top: 20px;
                left: 20px;
            }

            .card-love .love-btn{
                padding: 0px;
                width: 25px;
                height: 25px;
                border-radius: 50%;
                border: none;
                background-color: rgba(136, 136, 136, 1);
            }

            .card-love .love-btn i{
                padding-top: -20px !important;
                font-size: 14px;
            }

            .expired{
                padding-top: 15px;
                font-size: 10px;
            }
        }
    </style>
@endpush

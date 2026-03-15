@extends('web.layouts.frontend', ['title' => 'Auctions'])

@section('content')
<section class="py-5 property property-bg-color">
    <div class="container">
       @include('web.pages.includes.__auction_nav')
        <hr>

        <div class="py-3 row">
            @foreach ($auctions as $auction)
            <div class="my-3 col-md-4">
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
                        <p>@lang('Start on'):  {{ showDateTime($auction->beginning_time, 'l h:i A') }}</p>
                        <p>@lang('Duration'): {{ $auction->auction_day }} @lang('Days')</p>
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
            </div>
            @endforeach
        </div>

    </div>
</section>

@if(@$sections->secs != null)
    @foreach (json_decode($sections->secs) as $sec)
      @include('sections.' . $sec)
    @endforeach
@endif

@endsection

@push('style-lib')
    <link rel="stylesheet" href="{{ asset('assets/global/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/web/css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/web/css/slick-theme.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/web/css/custom.css') }}">
@endpush

@push('style')
<style>


.property-image img{
        height: 200px !important;
    }
    .body-content{
        margin-bottom: 7px !important;
        height: 150px !important;
        overflow: hidden;
    }
</style>
@endpush


@push('script-lib')
    <script src="{{ asset('assets/global/js/magnific-popup.js') }}"></script>
    <script src="{{ asset('assets/web/js/slick.min.js') }}"></script>
@endpush

@push('script')
    <script>
        $('.flan-view').each(function() { // the containers for all your galleries
            $(this).magnificPopup({
                delegate: 'a', // the selector for gallery item
                type: 'image',
                gallery: {
                    enabled: true
                }
            });
        });

        $(".clickType").click(function(){
            var type = $(this).val();
            $("#typeValue").val(type);
        });
    </script>
@endpush


@include('web.component.__js_fvt_react')

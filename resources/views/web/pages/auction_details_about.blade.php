@extends('web.layouts.frontend', ['title' => $title])

@section('content')
<section class="py-5">
    <div class="container">
        @include('web.pages.includes.__auction_nav_detail')
        <hr>
        <div class="row">
            <div class="col-12 col-md-8 col-lg-8">
                <div class="card round-card">
                    <img src="{{ getImage(getFilePath('auction_thumb') . '/' . $auction->thumb_image, getFileSize('auction_thumb')) }}" alt="">
                </div>
                <div class="py-4 d-flex justify-content-between">
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
                    <div>
                        <button type="button" class="love-btn "  data-type="auction" data-item="{{ $auction->id }}">
                            <i class="fa fa-share"></i>
                        </button>
                        <button type="button" class="love-btn react"  data-type="auction" data-item="{{ $auction->id }}">
                            <i class="fa fa-heart {{ findMyFvt('auction', $auction->id) ? 'text-danger' : '' }}"></i>
                        </button>
                    </div>
                </div>

                <div class="time-count" id="countdown_{{ $auction->id }}">
                    @include('web.pages.includes.__auction_time')
                </div>

                <div class="auction-info">
                    <div class="info-content" id="day-info">
                        <i class="fas fa-calendar-day"></i>
                        <p class="day">{{ @$auction->auction_day }}</p>
                        <p>@lang('Auction Days')</p>
                    </div>
                    <div class="info-content" id="date-info">
                        <i class="fas fa-calendar-alt"></i>
                        <p class="hour">{{ showDateTime($auction->beginning_time, 'd/m/Y') }}</p>
                        <p>@lang('Auction Date')</p>
                    </div>
                    <div class="info-content" id="time-info">
                        <i class="fas fa-clock"></i>
                        <p class="minutes">{{ showDateTime($auction->beginning_time, 'h:i A') }}</p>
                        <p>@lang('Beginning time')</p>
                    </div>
                    <div class="info-content" id="item-info">
                        <i class="fas fa-gavel"></i>
                        <p class="seconds">{{ count($auction->properties) }}</p>
                        <p>@lang('Auction Items')</p>
                    </div>
                </div>

                @if(!empty($auction->document))
                <div class="download-pdf">
                    <div class="download-content">
                        <i class="fas fa-download"></i>
                        <a href="{{ $auction->document }}" download>@lang('Download')</a>
                    </div>
                    <div class="download-content">
                        <p>{{ $auction->document }}</p>
                        <i class="fas fa-file-pdf"></i>
                    </div>
                </div>
                @endif

                <div class="my-4 register-btn">
                    <a href="#" class="btn btn-dark">@lang('Registration for the Auction')</a>
                </div>
            </div>
            <div class="col-12 col-md-4 col-lg-4">
                @include('web.pages.includes.__auction_profile_card')
            </div>
        </div>
    </div>
</section>

@if(@$sections->secs != null)
    @foreach (json_decode($sections->secs) as $sec)
      @include('sections.' . $sec)
    @endforeach
@endif

@endsection

@include('web.pages.includes.__auction_common_js')

@include('web.component.__js_fvt_react')

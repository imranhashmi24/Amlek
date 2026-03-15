@extends('web.layouts.frontend', ['title' => $title])

@section('content')
<section class="py-5">
    <div class="container">
         @include('web.pages.includes.__auction_nav_detail')
        <hr>
        <div class="row">
            @if($auction->properties)
                @forelse ($auction->properties as $item)
                <div class="my-3 col-12 col-md-12 col-lg-12">
                    <div class="property-card">
                        <div class="mb-4 card-title d-flex justify-content-start">
                            <div class="toggle-box toggle-box-{{ $item->id }}" data-bs-toggle="collapse" href="#multiCollapseExample_{{ $item->id }}" role="button" aria-expanded="false" aria-controls="multiCollapseExample_{{ $item->id }}">
                                <i class="fas fa-angle-down"></i>
                            </div>
                            <div class="toggle-title">
                                <h3>
                                @if(app()->getLocale() == 'en')
                                    {{ optional($item->property)->title }}
                                @else
                                    {{ optional($item->property)->title_ar }}
                                @endif
                                </h3>
                            </div>
                        </div>
                        <div class="my-4 div-content collapse" id="multiCollapseExample_{{ $item->id }}">
                            <div class="row">
                                <div class="col-12 col-md-6 col-lg-6">
                                    <div class="div-card">
                                        <img src="{{ getImage(getFilePath('property_thumb') . '/' . $item->property->thumb_image, getFileSize('property_thumb')) }}" alt="">
                                        <div class="mt-3 content-div">
                                            <div class="content-div-header d-flex justify-content-between">
                                                <div>@lang('City'):
                                                    @if (app()->getLocale() == 'en')
                                                        {{ optional($item->property->city)->name }}
                                                    @else
                                                        {{ optional($item->property->city)->name_ar }}
                                                    @endif
                                                </div>
                                                <div>@lang('The viewer'):
                                                    @if (app()->getLocale() == 'en')
                                                        {{ optional($item->property->city)->name }}
                                                    @else
                                                        {{ optional($item->property->city)->name_ar }}
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="my-2">
                                                <div class="py-2 d-flex justify-content-between">
                                                    <div>
                                                        @lang('Instrument Number')
                                                    </div>
                                                    <div>
                                                        : {{ $item->property->id }}
                                                    </div>
                                                </div>
                                                <div class="py-2 d-flex justify-content-between">
                                                    <div>
                                                        @lang('Instrument Date')
                                                    </div>
                                                    <div>
                                                        : {{ showDateTime($item->property->created_at, 'd-m-Y') }}
                                                    </div>
                                                </div>
                                                <div class="py-2 d-flex justify-content-between">
                                                    <div>
                                                        @lang('Product Type')
                                                    </div>
                                                    <div>
                                                        : @lang(optional($item->property)->purpose)
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 col-lg-6">
                                    <div class="div-card">
                                        <div class="content-div">
                                            <div>
                                                <b>@lang('The description')</b>
                                            </div>
                                            <div>
                                                @if (app()->getLocale() == 'en')
                                                    {!! optional($item->property)->description !!}
                                                @else
                                                    {!! optional($item->property)->description_ar !!}
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="my-3 div-card">
                                        <div class="content-div">
                                            <div class="content-div-header d-flex justify-content-between">
                                                <div>@lang('Limit & Length')</div>
                                                <div data-bs-toggle="collapse" class="item1_{{ $item->id }}" href="#item1_{{ $item->id }}" role="button" aria-expanded="false" aria-controls="item1_{{ $item->id }}"><i class="fas fa-angle-down"></i></div>
                                            </div>
                                            <div class="my-2" id="item1_{{ $item->id }}">
                                                <div class="py-2 d-flex justify-content-between">
                                                    <div>
                                                        @if (app()->getLocale() == 'en')
                                                            {{ optional($item->property->country)->name }}
                                                        @else
                                                            {{ optional($item->property->country)->name_ar }}
                                                        @endif
                                                    </div>
                                                    <div>
                                                        @if (app()->getLocale() == 'en')
                                                            {{ optional($item->property->city)->name }}
                                                        @else
                                                            {{ optional($item->property->city)->name_ar }}
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="my-3 div-card">
                                        <div class="content-div">
                                            <div class="content-div-header d-flex justify-content-between">
                                                <div>@lang('Land Information')</div>
                                                <div data-bs-toggle="collapse" class="item2_{{ $item->id }}" href="#item2_{{ $item->id }}" role="button" aria-expanded="false" aria-controls="item2_{{ $item->id }}"><i class="fas fa-angle-down"></i></div>
                                            </div>
                                            <div class="my-2" id="item2_{{ $item->id }}">
                                                @foreach ($item->property->details as $detail)
                                                    <div class="py-2 d-flex justify-content-between">
                                                        <div>
                                                            @lang(keyToTitle($detail->field))
                                                        </div>
                                                        <div>
                                                            {{ $detail->val }}
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                    <div class="my-3 div-card">
                                        <div class="content-div">
                                            <div class="content-div-header d-flex justify-content-between">
                                                <div>@lang('Public Service')</div>
                                                <div data-bs-toggle="collapse" class="item3_{{ $item->id }}" href="#item3_{{ $item->id }}" role="button" aria-expanded="false" aria-controls="item3_{{ $item->id }}"><i class="fas fa-angle-down"></i></div>
                                            </div>
                                            <div class="my-2" id="item3_{{ $item->id }}">
                                                <div class="py-2 d-flex justify-content-between">
                                                    <div>
                                                        @lang('Public network')
                                                    </div>
                                                    <div>
                                                        @lang('Water')
                                                    </div>
                                                </div>
                                                <div class="py-2 d-flex justify-content-between">
                                                    <div>
                                                        @lang('General electricity')
                                                    </div>
                                                    <div>
                                                        @lang('Ele')
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="my-3 div-card">
                                        <div class="content-div">
                                            <div class="content-div-header d-flex justify-content-between">
                                                <div>@lang('Type of ownership rights')</div>
                                                <div data-bs-toggle="collapse" class="item4_{{ $item->id }}" href="#item4_{{ $item->id }}" role="button" aria-expanded="false" aria-controls="item4_{{ $item->id }}"><i class="fas fa-angle-down"></i></div>
                                            </div>
                                            <div class="my-2" id="item4_{{ $item->id }}">
                                                <div class="py-2 d-flex justify-content-between">
                                                    <div>
                                                        @lang('Rights Over Property')
                                                    </div>
                                                    <div>
                                                        : {{ optional($item->property->user)->name ?? __('Free') }}
                                                    </div>
                                                </div>
                                                <div class="py-2 d-flex justify-content-between">
                                                    <div>
                                                        @lang('Property type')
                                                    </div>
                                                    <div>
                                                        : {{ app()->getLocale() == 'en' ?  optional($item->property->propertyType)->name : optional($item->property->propertyType)->name_ar }}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="time-card d-flex justify-content-start">
                            <div class="mx-4 my-4 time-count w-100" id="countdown_{{ $item->id }}" style="background: transparent">
                                <div class="overly-content">
                                    <p class="day">00</p>
                                    <p>@lang('Days')</p>
                                </div>
                                <div class="overly-content">
                                    <p class="hour">00</p>
                                    <p>@lang('Hours')</p>
                                </div>
                                <div class="overly-content">
                                    <p class="minutes">00</p>
                                    <p>@lang('Minutes')</p>
                                </div>
                                <div class="overly-content">
                                    <p class="seconds">00</p>
                                    <p>@lang('Seconds')</p>
                                </div>

                                <script>
                                    var countDownDate_{{ $item->id }} = new Date("{{ $auction->beginning_time }}").getTime();
                                    var x_{{ $item->id }} = setInterval(function() {
                                        var now = new Date().getTime();
                                        var distance = countDownDate_{{ $item->id }} - now;
                                        var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                                        var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                                        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                                        var seconds = Math.floor((distance % (1000 * 60)) / 1000);

                                        document.getElementById("countdown_{{ $item->id }}").innerHTML =
                                            "<div class='overly-content'><p class='day'>" + days + "</p><p>@lang('Days')</p></div>" +
                                            "<div class='overly-content'><p class='hour'>" + hours + "</p><p>@lang('Hours')</p></div>" +
                                            "<div class='overly-content'><p class='minutes'>" + minutes + "</p><p>@lang('Minutes')</p></div>" +
                                            "<div class='overly-content'><p class='seconds'>" + seconds + "</p><p>@lang('Seconds')</p></div>";

                                        if (distance < 0) {
                                            clearInterval(x_{{ $item->id }});
                                            document.getElementById("countdown_{{ $item->id }}").innerHTML = "{{ __('EXPIRED') }}";
                                        }
                                    }, 1000);
                                </script>
                            </div>
                            <div class="bid w-100">
                                <div>@lang('Highest Bid')</div>
                                <div>@lang('SAR')
                                    @if(!empty($item->property->biddings))
                                        {{ $item->property->biddings->max('amount') ?? __('N\A') }}
                                    @else
                                     {{ __('N\A') }}
                                    @endif
                                </div>
                            </div>
                            <div class="bid w-100">
                                <div>@lang('Entry Amount')</div>
                                <div>@lang('SAR') {{ $item->property->price }}</div>
                            </div>
                            <div class="bid w-100">
                                <div class="react"  data-type="item" data-item="{{ $item->id }}">
                                    <i class="fa fa-heart {{ findMyFvt('item', $item->id) ? 'text-danger' : '' }}"></i>
                                    <span>{{ getFvtCount('item', $item->id) }}</span>
                                </div>
                            </div>
                            <div class="bid w-100">
                                <a href="{{ url(route('bidding.request.page', [
                                    'auction' => urlencode($auction->id),
                                    'property' => urlencode($item->property->id)
                                ])) }}" class="bidding-btn">@lang('Bidding Board')</a>

                            </div>
                        </div>
                    </div>
                </div>

                <script>
                    document.addEventListener('DOMContentLoaded', function () {
                        const toggleBox = document.querySelector('.toggle-box-{{ $item->id }}');
                        const icon = toggleBox.querySelector('i');

                        toggleBox.addEventListener('click', function () {
                            if (icon.classList.contains('fa-angle-up')) {
                                icon.classList.remove('fa-angle-up');
                                icon.classList.add('fa-angle-down');
                            } else {
                                icon.classList.remove('fa-angle-down');
                                icon.classList.add('fa-angle-up');
                            }
                        });
                    });

                    document.addEventListener('DOMContentLoaded', function () {
                        const items = document.querySelectorAll('[class^="item"]');
                        items.forEach(function (item) {
                            const icon = item.querySelector('i');

                            item.addEventListener('click', function () {
                                if (icon.classList.contains('fa-angle-up')) {
                                    icon.classList.remove('fa-angle-up');
                                    icon.classList.add('fa-angle-down');
                                } else {
                                    icon.classList.remove('fa-angle-down');
                                    icon.classList.add('fa-angle-up');
                                }
                            });
                        });
                    });

                </script>

                @empty

                @endforelse
            @endif
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

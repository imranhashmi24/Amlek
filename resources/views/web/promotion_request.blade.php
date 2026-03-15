@extends('web.layouts.frontend', ['title' => @$title])
@push('seo')
    <meta name="title" Content="{{ @$promotion->lang('short_description') }}">
    <meta name="description" content="{{ @$promotion->lang('short_description') }}">
    <meta name="keywords" content="{{ implode(',',$seo->keywords) }}">
    <link rel="shortcut icon" href="{{ siteFavicon() }}" type="image/x-icon">

    {{--<!-- Apple Stuff -->--}}
    <link rel="apple-touch-icon" href="{{ siteLogo() }}">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-title" content="{{ @$promotion->lang('short_description') }}">
    {{--<!-- Google / Search Engine Tags -->--}}
    <meta itemprop="name" content="{{ @$promotion->lang('short_description') }}">
    <meta itemprop="description" content="{{ @$promotion->lang('short_description') }}">
    <meta itemprop="image" content="{{ getImage('assets/images/frontend/promotion/' . @$promotion->data_values->image) }}">
    {{--<!-- Facebook Meta Tags -->--}}
    <meta property="og:type" content="website">
    <meta property="og:title" content="{{ @$promotion->lang('short_description') }}">
    <meta property="og:description" content="{{ @$promotion->lang('short_description') }}">
    <meta property="og:image" content="{{ getImage('assets/images/frontend/promotion/' . @$promotion->data_values->image) }}"/>
    @php $socialImageSize = explode('x', getFileSize('seo')) @endphp
    <meta property="og:image:width" content="{{ $socialImageSize[0] }}" />
    <meta property="og:image:height" content="{{ $socialImageSize[1] }}" />
    <meta property="og:url" content="{{ url()->current() }}">
    {{--<!-- Twitter Meta Tags -->--}}
    <meta name="twitter:card" content="summary_large_image">
@endpush
@php
    $o_countries = App\Models\Country::orderByRaw('ISNULL(sort_order), sort_order')->with('city')->get();
    $countries = sortOrder($o_countries);
@endphp
@section('content')
    <section class="py-5 pages-banner" style="background-image: url({{ asset('assets/images/frontend/breadcrumb/65c196d169df31707185873.png') }});">
        <div class="container">
            <div class="row">
                <div class="py-5 col-12">
                    <h1 class="p-0 m-0 text-center my-5"></h1>
                </div>
            </div>
        </div>
    </section>

    <section class="py-5">
        <div class="container">
            <div class="card">
                <div class="card-header">
                    {!! @$promotion->lang('short_description') !!}
                </div>
                <div class="card-body">
                    <form action="{{route('promotion.request.store')}}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="form-label">@lang('Name') <span class="text-danger fs-6">*</span></label>
                            <input type="text" name="name" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="form-label">@lang('Email') <span class="text-danger fs-6">*</span></label>
                            <input type="email" name="email" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="form-label">@lang('Mobile Number') <span class="text-danger fs-6">*</span></label>
                            <input type="text" name="mobile" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="form-label">@lang('Country') <span class="text-danger fs-6">*</span></label>
                            <select name="country_id" class="form-select" required>
                                <option value="">@lang('Select One')</option>
                                @foreach ($countries as $country)
                                    <option value="{{ $country->id }}" data-cities="{{ $country->city }}"
                                        @selected(old('country_id' == @$country->id))>
                                        @if (app()->getLocale() == 'en')
                                            {{ $country->name }}
                                        @else
                                            {{ $country->name_ar }}
                                        @endif
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="form-label">@lang('City') <span class="text-danger fs-6">*</span></label>
                            <select name="city_id" class="form-select" required>
                                <option value="">@lang('Select One')</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="form-label">@lang('Message') <span class="text-danger fs-6">*</span></label>
                            <textarea name="message" class="form-control" id="" cols="30" rows="10" required></textarea>
                        </div>

                        <div class="text-center">
                            <button type="submit" class="btn btn-base w-25">@lang('Submit Request')</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </section>

@endsection


@push('script')
    <script>
        $('[name=country_id]').on('change', function() {
            var cities = $(this).find('option:selected').data('cities');
            var option = [`<option value="">@lang('Select One')</option>`];
            $.each(cities, function(index, value) {
                var name = "{{ app()->getLocale() }}" == 'en' ? value.name : value.name_ar;

                option += "<option value='" + value.id + "' " + (value.id == "" ? "selected" : "") + ">" +
                    name + "</option>";
            });
            $('select[name=city_id]').html(option);
        }).change();
    </script>
@endpush

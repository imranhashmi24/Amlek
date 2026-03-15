@extends('web.layouts.frontend', ['title' => 'Auctions Maps'])

@section('content')
<section class="py-5 property property-bg-color">
    <div class="container">
        @include($navbar)
        <hr>
        <div class="py-3 row">
            <div class="pb-3 col-12">
                <div class="sort-property d-flex justify-content-between align-items-center">
                    <div>
                        <?php
                            $property_count = count($property_items);
                        ?>
                        <p class="m-0">@lang('Find') <b><?php echo $property_count; ?></b> @lang('properties')</p>
                    </div>
                </div>
            </div>
            @include('web.component.all_property_map')
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


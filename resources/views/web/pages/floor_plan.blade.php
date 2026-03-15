@extends('web.layouts.frontend', ['title' => 'Floor Plans'])

@section('content')
<section class="py-5 property property-bg-color">
    <div class="container">
        <div class="row">
            @forelse ($floorPlanElements as $floorPlanElement)
            <div class="my-2 col-12 col-sm-6 col-md-4 col-lg-3">
                <div class="card w-100 propertybox">
                    <div class="property-image position-relative">
                        <img src="{{ getImage('assets/images/frontend/floor_plan/' . @$floorPlanElement->lang('plan'), '315x180') }}"  alt="@lang('Image')" class="card-img-top">
                    </div>

                    <div class="card-body">
                       <div class="body-content">
                            <h5 class="card-title property-title">
                                <a href="#">
                                    {{ @$floorPlanElement->lang('title') }}
                                </a>
                            </h5>
                            <p>
                                {!! @$floorPlanElement->lang('description') !!}
                            </p>
                       </div>
                        <div class="flan-view">
                            <a href="{{ getImage('assets/images/frontend/floor_plan/' . @$floorPlanElement->lang('plan'), '315x180') }}" class="m-2 btn" style="background-color: #39004E !important; color: #FFF"> @lang('show Image') </a>
                            <a href="{{ route('showFloorPlan', $floorPlanElement->id) }}" class="btn btn-info m-2" style="background-color: #39004E !important; color: #FFF"> @lang('View Floor Plan') </a>
                            
                            <a href="tel:+9660550217734" class="btn btn-success m-2">
                                <i class="fab fa-whatsapp"></i>
                                <span>@lang('Whatsapp')</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @empty
            <h4 class="py-5 text-center">@lang('Floor plan not found')</h4>
            @endforelse
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
@endpush


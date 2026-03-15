@extends('web.layouts.master', ['title' => 'Dashboard'])
@section('content')
    <div class="row">
        <div class="pb-3 col-12 col-lg-4">
            <div class="dashboard-card" style="background: #00A3FF;">
                <div>
                    <i class="bi bi-houses"></i>
                </div>
                <div>
                    <h3> {{ $propertyCount }}</h3>
                    <h6>@lang('Properties')</h6>
                </div>
            </div>
        </div>
        <div class="pb-3 col-12 col-lg-4">
            <div class="dashboard-card" style="background: #FF5C00;">
                <div>
                    <i class="bi bi-house-check"></i>
                </div>
                <div>
                    <h3> {{ $propertyRequestCount }} </h3>
                    <h6>@lang('Property Request')</h6>
                </div>
            </div>
        </div>
        <div class="pb-3 col-12 col-lg-4">
            <div class="dashboard-card" style="background: #A100DC;">
                <div>
                    <i class="bi bi-cash-coin"></i>
                </div>
                <div>
                    <h3> {{ $financeRequestCount }} </h3>
                    <h6>@lang('Finance Request')</h6>
                </div>
            </div>
        </div>
        <div class="pb-3 col-12 col-lg-4">
            <div class="dashboard-card" style="background: #FF407D;">
                <div>
                    <i class="bi bi-shop"></i>
                </div>
                <div>
                    <h3> {{ $marketingRequestCount }} </h3>
                    <h6>@lang('Marketing Request')</h6>
                </div>
            </div>
        </div>
        <div class="pb-3 col-12 col-lg-4">
            <div class="dashboard-card" style="background: #0C359E;">
                <div>
                    <i class="bi bi-gear"></i>
                </div>
                <div>
                    <h3> {{ $serviceRequestCount }} </h3>
                    <h6>@lang('Service Request')</h6>
                </div>
            </div>
        </div>
        <div class="pb-3 col-12 col-lg-4">
            <div class="dashboard-card" style="background: #265073;">
                <div>
                    <i class="bi bi-envelope"></i>
                </div>
                <div>
                    <h3> {{ $supportCount }} </h3>
                    <h6>@lang('Supports')</h6>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('title')
    <a href="{{ route('user.properties.create') }}" class="add-property-btn"><i class="bi bi-plus-circle-dotted pe-1"></i>
        @lang('Add Property')</a>
@endpush

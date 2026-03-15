@extends('web.layouts.master', ['title' => 'Finance Request'])
@section('content')
    <div class="card custom-card p-3">
        <div class="p-0 card-body">
            <div class="card-list">
                <span>@lang('Family Name')</span>
                <b>{{ $financeRequest->family_name }}</b>
            </div>

            <div class="card-list">
                <span>@lang('Request Name')</span>
                <b>{{ $financeRequest->name }}</b>
            </div>

            <div class="card-list">
                <span>@lang('Country')</span>
                <b>{{ @$financeRequest->country->name }}</b>
            </div>
            <div class="card-list">
                <span>@lang('Email')</span>
                <b>{{ @$financeRequest->email }}</b>
            </div>
            <div class="card-list">
                <span>@lang('Mobile Number')</span>
                <b>{{ @$financeRequest->mobile }}</b>
            </div>
            <div class="card-list">
                <span>@lang('City')</span>
                <b>{{ @$financeRequest->city->name }}</b>
            </div>
            <div class="card-list">
                <span>@lang('NID')</span>
                <b>{{ @$financeRequest->city->name }}</b>
            </div>
            <div class="card-list">
                <span>@lang('Alawwal')</span>
                <b>{{ $financeRequest->alawwal }}</b>
            </div>
            <div class="card-list">
                <span>@lang('Property Type')</span>
                <b>{{ @$financeRequest->propertyType->name }}</b>
            </div>

            <div class="card-list">
                <span>@lang('Status')</span>
                <b> @php echo  $financeRequest->statusBadge @endphp</b>
            </div>
        </div>
    </div>
@endsection

@push('title')
    <h5>@lang('Finance Request')</h5>
@endpush

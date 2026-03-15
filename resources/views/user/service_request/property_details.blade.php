@extends('web.layouts.master', ['title' => 'Property Request'])
@section('content')
<div class="card custom-card p-3">
    <div class="p-0 card-body">
        <div class="card-list">
            <span>@lang('Request Name')</span>
            <b>{{ $propertyRequest->name }}</b>
        </div>

        <div class="card-list">
            <span>@lang('Country')</span>
            <b>{{ @$propertyRequest->country->name }}</b>
        </div>
        <div class="card-list">
            <span>@lang('City')</span>
            <b>{{ @$propertyRequest->city->name }}</b>
        </div>
         <div class="card-list">
            <span>@lang('Email')</span>
            <b>{{ @$propertyRequest->email }}</b>
        </div>
         <div class="card-list">
            <span>@lang('Mobile Number')</span>
            <b>{{ @$propertyRequest->mobile }}</b>
        </div>

        <div class="card-list">
            <span>@lang('Property Type')</span>
            <b>{{ $propertyRequest->propertyType->name }}</b>
        </div>

        <div class="card-list">
            <span>@lang('Nature Of Property')</span>
            <b>{{ $propertyRequest->nature_of_property }}</b>
        </div>
         <div class="card-list">
            <span>@lang('Budget')</span>
            <b>{{ $propertyRequest->budget }}</b>
        </div>
        <div class="card-list">
            <span>@lang('Purpose')</span>
            <b>{{ $propertyRequest->purpose }}</b>
        </div>
         <div class="card-list">
            <span>@lang('Area')</span>
            <b>{{ $propertyRequest->area }}</b>
        </div>

        <div class="card-list">
            <span>@lang('Status')</span>
            <b> @php echo  $propertyRequest->statusBadge @endphp</b>
        </div>
    </div>
</div>
@endsection

@push('title')
    <h5>@lang('Properties Request')</h5>
@endpush

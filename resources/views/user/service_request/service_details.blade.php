@extends('web.layouts.master', ['title' => 'Service Request'])
@section('content')
<div class="card custom-card p-3">
    <div class="p-0 card-body">
        <div class="card-list">
            <span>@lang('Request Name')</span>
            <b>{{ $serviceRequest->name }}</b>
        </div>

        <div class="card-list">
            <span>@lang('Country')</span>
            <b>{{ @$serviceRequest->country->name }}</b>
        </div>
         <div class="card-list">
            <span>@lang('Email')</span>
            <b>{{ @$serviceRequest->email }}</b>
        </div>
         <div class="card-list">
            <span>@lang('Mobile Number')</span>
            <b>{{ @$serviceRequest->mobile }}</b>
        </div>
        <div class="card-list">
            <span>@lang('City')</span>
            <b>{{ @$serviceRequest->city->name }}</b>
        </div>
        <div class="card-list">
            <span>@lang('Property Type')</span>
            <b>{{ @$serviceRequest->propertyType->name }}</b>
        </div>
        <div class="card-list">
            <span>@lang('Description')</span>
            <b>{{ $serviceRequest->description }}</b>
        </div>

        <div class="card-list">
            <span>@lang('Status')</span>
            <b> @php echo  $serviceRequest->statusBadge @endphp</b>
        </div>
    </div>
</div>
@endsection

@push('title')
    <h5>@lang('Service Request')</h5>
@endpush

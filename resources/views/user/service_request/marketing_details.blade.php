@extends('web.layouts.master', ['title' => 'Marketing Request'])
@section('content')
<div class="card custom-card">
    <div class="p-0 card-body">
        <div class="card-list">
            <span>@lang('Request Name')</span>
            <b>{{ $marketingRequest->name }}</b>
        </div>
    
        <div class="card-list">
            <span>@lang('Job Title')</span>
            <b>{{ @$marketingRequest->job_title }}</b>
        </div>
         <div class="card-list">
            <span>@lang('Company')</span>
            <b>{{ @$marketingRequest->company }}</b>
        </div>
        <div class="card-list">
            <span>@lang('Email')</span>
            <b>{{ @$marketingRequest->email }}</b>
        </div>
        <div class="card-list">
            <span>@lang('Mobile Number')</span>
            <b>{{ @$marketingRequest->mobile }}</b>
        </div>
        <div class="card-list">
            <span>@lang('City')</span>
            <b>{{ @$marketingRequest->city->name }}</b>
        </div>
        <div class="card-list">
            <span>@lang('Activity')</span>
            <b>{{ @$marketingRequest->activity }}</b>
        </div>
    
        <div class="card-list">
            <span>@lang('Status')</span>
            <b> @php echo  $marketingRequest->statusBadge @endphp</b>
        </div>
    </div>
</div>
@endsection

@push('title')
    <h5>@lang('Marketing Request')</h5>
@endpush

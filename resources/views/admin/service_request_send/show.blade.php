@extends('admin.layouts.app', ['title' => 'Property Request Send Details'])

@section('panel')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="p-3 row">
                <div class="col-md-6 col-12">
                    <div class="border shadow-none card">
                        <div class="p-0 card-body">
                            <div class="card-list">
                                <span>@lang('Request Name')</span>
                                <b>
                                    {{ $propertyRequestSend->name }} </br>
                                    <a href="{{ $propertyRequestSend->user_id ? route('admin.users.detail', $propertyRequestSend->user_id) : '' }}">
                                        <span>@</span>{{ $propertyRequestSend?->user?->username }}
                                    </a>
                                </b>
                            </div>
                            <div class="card-list">
                                <span>@lang('Email')</span>
                                <b>{{ $propertyRequestSend->email }}</b>
                            </div>
                            <div class="card-list">
                                <span>@lang('Mobile Number')</span>
                                <b>{{ $propertyRequestSend->mobile }}</b>
                            </div>
                            <div class="card-list">
                                <span>@lang('Property')</span>
                                <b>
                                    <a href="{{ route('admin.properties.show', $propertyRequestSend->property_id) }}">
                                        @if(app()->getLocale() == 'en')
                                            {{ $propertyRequestSend->property->title }}
                                        @else
                                            {{ $propertyRequestSend->property->title_ar }}
                                        @endif
                                    </a>
                                </b>
                            </div>
                            <div class="card-list">
                                <span>@lang('Status')</span>
                                <b><?php echo $propertyRequestSend->statusBadge ?></b>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-12">
                    <div class="border shadow-none card">
                        <div class="card-header">
                            {{ __('Message') }}
                        </div>
                        <div class="card-body">
                            {{ $propertyRequestSend->message }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<x-confirmation-modal />
@endsection

@push('breadcrumb-plugins')
<div class="flex-wrap gap-2 d-flex">
    <a href="{{ route('admin.property-request.send.index') }}" class="btn btn-primary">
        <i class="bi bi-arrow-clockwise pe-1"></i>@lang('Back')
    </a>
    <a href="{{ route('admin.property-request.send.status', [$propertyRequestSend->id, Status::REVIEW]) }}" class="btn btn-success">
        <i class="bi bi-check2 pe-1"></i>@lang('Approved')
    </a>
    <a href="{{ route('admin.property-request.send.status', [$propertyRequestSend->id, Status::REJECT]) }}" class="btn btn-danger">
        <i class="bi bi-x pe-1"></i>@lang('Rejected')
    </a>
</div>
@endpush


@push('style')
<style>
    .card-body .card-list {
        display: flex;
        padding: 8px;
        flex-wrap: nowrap;
        border-bottom: 1px solid #cccccc;
        justify-content: space-between;

    }

    .card-body .card-list:last-child {
        border-bottom: none;
    }

    .property-image {
        display: flex;
        gap: 10px;
        flex-wrap: wrap;
    }

    .property-image>a {
        width: 170px;
        display: flex;
        border: 1px solid #cccccc;
        border-radius: 5px;
        overflow: hidden;
    }

    .property-image img {
        width: 100%;
    }
</style>
@endpush

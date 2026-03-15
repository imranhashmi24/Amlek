@extends('admin.layouts.app', ['title' => 'Finance Request Details'])
@section('panel')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="border shadow-none card">
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
        <a href="{{ route('admin.finance.request.index') }}" class="btn btn-primary"><i
                class="bi bi-arrow-clockwise pe-1"></i>@lang('Back')</a>

        <a href="{{ route('admin.finance.request.status', [$financeRequest->id, Status::REVIEW]) }}"
            class="btn btn-success"><i class="bi bi-check2 pe-1"></i>@lang('Approved')</a>
        <a href="{{ route('admin.finance.request.status', [$financeRequest->id, Status::REJECT]) }}"
            class="btn btn-danger"><i class="bi bi-x pe-1"></i>@lang('Rejected')</a>

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

@extends('admin.layouts.app', ['title' => 'Service Request Details'])
@section('panel')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="border shadow-none card">
                                <div class="p-0 card-body">
                                    <div class="card-list">
                                        <span>@lang('Request Name')</span>
                                        <b>{{ $serviceRequest->name }}</b>
                                    </div>

                                    <div class="card-list">
                                        <span>@lang('Country')</span>
                                        <b>
                                            @if (app()->getLocale() == 'en')
                                            {{ @$serviceRequest->country->name }}
                                            @else
                                            {{ @$serviceRequest->country->name_ar }}
                                            @endif
                                        </b>
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
                                        <b>
                                            @if (app()->getLocale() == 'en')
                                                {{ @$serviceRequest->city->name }}
                                            @else
                                                {{ @$serviceRequest->city->name_ar }}
                                            @endif
                                        </b>
                                    </div>
                                    <div class="card-list">
                                        <span>@lang('Sector')</span>
                                        <b>
                                            {{ @$serviceRequest->sectors }}
                                        </b>
                                    </div>
                                    <div class="card-list">
                                        <span>@lang('Description')</span>
                                        <b>{{ @$serviceRequest->detail }}</b>
                                    </div>

                                    <div class="card-list">
                                        <span>@lang('Status')</span>
                                        <b> @php echo  $serviceRequest->statusBadge @endphp</b>
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
        <a href="{{ route('admin.property.form.request.index') }}" class="btn btn-primary"><i
                class="bi bi-arrow-clockwise pe-1"></i>@lang('Back')</a>

        <a href="{{ route('admin.property.form.request.status', [$serviceRequest->id, Status::REVIEW]) }}" class="btn btn-success"><i
                class="bi bi-check2 pe-1"></i>@lang('Approved')</a>
        <a href="{{ route('admin.property.form.request.status', [$serviceRequest->id, Status::REJECT]) }}" class="btn btn-danger"><i
                class="bi bi-x pe-1"></i>@lang('Rejected')</a>

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

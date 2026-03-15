@extends('admin.layouts.app', ['title' => 'Service Request Details'])
@section('panel')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-9">
                            <div class="border shadow-none card">
                                <div class="p-0 card-body">
                                    <div class="card-list">
                                        <span>@lang('Opportunity Title')</span>
                                        <b>{{ __($serviceRequest->title) }}</b>
                                    </div>
                                    
                                    <div class="card-list">
                                        <span>@lang('Full Name')</span>
                                        <b>{{ $serviceRequest->full_name }}</b>
                                    </div>

                                     <div class="card-list">
                                        <span>@lang('Email')</span>
                                        <b>{{ @$serviceRequest->email }}</b>
                                    </div>
                                    
                                    <div class="card-list">
                                        <span>@lang('Mobile Number')</span>
                                        <b>{{ @$serviceRequest->mobile_number }}</b>
                                    </div>
                                    
                                    <div class="card-list">
                                        <span>@lang('Id Number')</span>
                                        <b>{{ @$serviceRequest->id_number }}</b>
                                    </div>
                                    
                                    <div class="card-list">
                                        <span>@lang('Establishment Name')</span>
                                        <b>{{ @$serviceRequest->establishment_name }}</b>
                                    </div>
                                    
                                    <div class="card-list">
                                        <span>@lang('Commercial Registration Number')</span>
                                        <b>{{ @$serviceRequest->commercial_registration_number }}</b>
                                    </div>
                                   
                                    <div class="card-list">
                                        <span>@lang('Sector')</span>
                                        <b>
                                            {{ __($serviceRequest->sector) }}
                                        </b>
                                    </div>
                                    <div class="card-list">
                                        <span>@lang('Description')</span>
                                        <b>{{ __($serviceRequest->opportunity_description) }}</b>
                                    </div>
                                    
                                    <div class="card-list">
                                        <h6>@lang('Investment Opportunity Information')</h6>
                                    </div>
                                    
                                    <div class="card-list">
                                        <span>@lang('Property Type')</span>
                                        <b>{{ __($serviceRequest->property_type) }}</b>
                                    </div>
                                    
                                    <div class="card-list">
                                        <span>@lang('City')</span>
                                        <b>{{ __($serviceRequest->city) }}</b>
                                    </div>
                                    
                                    <div class="card-list">
                                        <span>@lang('Area')</span>
                                        <b>{{ __($serviceRequest->area) }}</b>
                                    </div>
                                    
                                    <div class="card-list">
                                        <span>@lang('Address')</span>
                                        <b>{{ __($serviceRequest->address) }}</b>
                                    </div>
                                    
                                    <div class="card-list">
                                        <span>@lang('Location features')</span>
                                        <b>{{ __($serviceRequest->location_features) }}</b>
                                    </div>
                                    
                                    <div class="card-list">
                                        <span>@lang('Tenant Type')</span>
                                        <b>{{ __($serviceRequest->tenant_type) }}</b>
                                    </div>
                                    
                                    <div class="card-list">
                                        <span>@lang('Tenant Capital Construction Value')</span>
                                        <b>{{ __($serviceRequest->tenant_capital_construction_value) }}</b>
                                    </div>
                                    
                                    <div class="card-list">
                                        <span>@lang('Selling Price')</span>
                                        <b>{{ __($serviceRequest->selling_price) }}</b>
                                    </div>
                                    
                                    <div class="card-list">
                                        <span>@lang('Income ratio')</span>
                                        <b>{{ __($serviceRequest->income_ratio) }}</b>
                                    </div>
                                    
                                    <div class="card-list">
                                        <span>@lang('Property Nature')</span>
                                        <b>{{ __($serviceRequest->property_nature) }}</b>
                                    </div>
                                    
                                    <div class="card-list">
                                        <span>@lang('Rental Status')</span>
                                        <b>{{ __($serviceRequest->rental_status) }}</b>
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
        <a href="{{ route('admin.oportunity.form.request.index') }}" class="btn btn-primary"><i
                class="bi bi-arrow-clockwise pe-1"></i>@lang('Back')</a>

        <a href="{{ route('admin.oportunity.form.request.status', [$serviceRequest->id, Status::REVIEW]) }}" class="btn btn-success"><i
                class="bi bi-check2 pe-1"></i>@lang('Approved')</a>
        <a href="{{ route('admin.oportunity.form.request.status', [$serviceRequest->id, Status::REJECT]) }}" class="btn btn-danger"><i
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

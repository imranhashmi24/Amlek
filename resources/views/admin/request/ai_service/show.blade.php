@extends('admin.layouts.app', ['title' => 'Ai Service Request Details'])
@section('panel')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="border shadow-none card">
                                <div class="card-header">
                                    <h6><b>@lang('Contract Data')</b></h6>
                                </div>
                                <div class="p-0 card-body">
                                    
                                     <div class="card-list">
                                        <span>@lang('Contract number')</span>
                                        <b>{{ __($serviceRequest->contract_number) }}</b>
                                    </div>
                                    
                                    <div class="card-list">
                                        <span>@lang('Contract type')</span>
                                        <b>{{ __($serviceRequest->contract_type) }}</b>
                                    </div>
                                    
                                    <div class="card-list">
                                        <span>@lang('Contract sealing date')</span>
                                        <b>{{ __($serviceRequest->contract_sealing_date) }}</b>
                                    </div>
                                    
                                    <div class="card-list">
                                        <span>@lang('Contract sealing location')</span>
                                        <b>{{ __($serviceRequest->contract_sealing_location) }}</b>
                                    </div>
                                    
                                    <div class="card-list">
                                        <span>@lang('Tenancy start date')</span>
                                        <b>{{ __($serviceRequest->tenancy_start_date) }}</b>
                                    </div>
                                    
                                    <div class="card-list">
                                        <span>@lang('Tenancy end date')</span>
                                        <b>{{ __($serviceRequest->tenancy_end_date) }}</b>
                                    </div>
                                    
                                    <div class="card-list">
                                        <span>@lang('Status')</span>
                                        <b> @php echo  $serviceRequest->statusBadge @endphp</b>
                                    </div>
                                </div>
                            </div>
                            
                            
                        </div>
                        
                        <div class="col-md-6">
                            <div class="border shadow-none card">
                                <div class="card-header">
                                    <h6><b>@lang('Lessor')</b></h6>
                                </div>
                                <div class="p-0 card-body">
                                    
                                     <div class="card-list">
                                        <span>@lang("Landlord’s status")</span>
                                        <b>{{ __($serviceRequest->landlord_status_representative) }}</b>
                                    </div>
                                    
                                    <div class="card-list">
                                        <span>@lang('Landlord representative agency')</span>
                                        <b>{{ __($serviceRequest->landlord_representative_agency) }}</b>
                                    </div>
                                    
                                    <div class="card-list">
                                        <span>@lang('Date of birth')</span>
                                        <b>{{ __($serviceRequest->date_of_birth) }}</b>
                                    </div>
                                    
                                    <div class="card-list">
                                        <span>@lang('Nationality')</span>
                                        <b>{{ __($serviceRequest->nationality) }}</b>
                                    </div>
                                    
                                    <div class="card-list">
                                        <span>@lang('ID type')</span>
                                        <b>{{ __($serviceRequest->lessor_id_type) }}</b>
                                    </div>
                                    
                                    <div class="card-list">
                                        <span>@lang('ID No')</span>
                                        <b>{{ __($serviceRequest->lessor_id_no) }}</b>
                                    </div>
                                    
                                    <div class="card-list">
                                        <span>@lang('Mobile phone')</span>
                                        <b>{{ __($serviceRequest->lessor_mobile) }}</b>
                                    </div>
                                    
                                    <div class="card-list">
                                        <span>@lang('E-mail')</span>
                                        <b>{{ __($serviceRequest->lessor_email) }}</b>
                                    </div>
                                    
                                    <div class="card-list">
                                        <span>@lang('Region')</span>
                                        <b>{{ __($serviceRequest->lessor_region) }}</b>
                                    </div>
                                    
                                    <div class="card-list">
                                        <span>@lang('City')</span>
                                        <b>{{ __($serviceRequest->lessor_city) }}</b>
                                    </div>
                                    
                                    <div class="card-list">
                                        <span>@lang('Street Name')</span>
                                        <b>{{ __($serviceRequest->lessor_street_name) }}</b>
                                    </div>
                                    
                                    
                                    <div class="card-list">
                                        <span>@lang('Building Number')</span>
                                        <b>{{ __($serviceRequest->lessor_building_number) }}</b>
                                    </div>
                                    
                                    <div class="card-list">
                                        <span>@lang('Additional Number')</span>
                                        <b>{{ __($serviceRequest->lessor_additional_number) }}</b>
                                    </div>
                                    
                                    <div class="card-list">
                                        <span>@lang('Zip Code')</span>
                                        <b>{{ __($serviceRequest->lessor_zip_code) }}</b>
                                    </div>
                                    
                                    <div class="card-list">
                                        <span>@lang('Title Deed')</span>
                                        <b>{{ __($serviceRequest->lessor_title_deed) }}</b>
                                    </div>
                                    
                                    <div class="card-list">
                                        <span>@lang('Tax Number')</span>
                                        <b>{{ __($serviceRequest->lessor_tax_number) }}</b>
                                    </div>
                                    
                                    <div class="card-list">
                                        <span>@lang('IBAN')</span>
                                        <b>{{ __($serviceRequest->lessor_iban) }}</b>
                                    </div>
                                    
                                   
                                    
                                </div>
                            </div>
                        </div>
                        
                        
                         <div class="col-md-6">
                            <div class="border shadow-none card">
                                <div class="card-header">
                                    <h6><b>@lang('Tenant')</b></h6>
                                </div>
                                <div class="p-0 card-body">
                                    
                                     <div class="card-list">
                                        <span>@lang("Name")</span>
                                        <b>{{ __($serviceRequest->tenant_name) }}</b>
                                    </div>
                                    
                                    <div class="card-list">
                                        <span>@lang('Date of birth')</span>
                                        <b>{{ __($serviceRequest->tenant_date_of_birth) }}</b>
                                    </div>
                                    
                                 
                                    <div class="card-list">
                                        <span>@lang('Nationality')</span>
                                        <b>{{ __($serviceRequest->tenant_nationality) }}</b>
                                    </div>
                                    
                                    <div class="card-list">
                                        <span>@lang('ID type')</span>
                                        <b>{{ __($serviceRequest->tenant_id_type) }}</b>
                                    </div>
                                    
                                    <div class="card-list">
                                        <span>@lang('ID No')</span>
                                        <b>{{ __($serviceRequest->tenant_id_no) }}</b>
                                    </div>
                                    
                                    <div class="card-list">
                                        <span>@lang('Mobile phone')</span>
                                        <b>{{ __($serviceRequest->tenant_mobile) }}</b>
                                    </div>
                                    
                                    <div class="card-list">
                                        <span>@lang('E-mail')</span>
                                        <b>{{ __($serviceRequest->tenant_email) }}</b>
                                    </div>
                                    
                                    <div class="card-list">
                                        <span>@lang('Region')</span>
                                        <b>{{ __($serviceRequest->tenant_region) }}</b>
                                    </div>
                                    
                                    <div class="card-list">
                                        <span>@lang('City')</span>
                                        <b>{{ __($serviceRequest->tenant_city) }}</b>
                                    </div>
                                    
                                    <div class="card-list">
                                        <span>@lang('Street Name')</span>
                                        <b>{{ __($serviceRequest->tentent_street_name) }}</b>
                                    </div>
                                    
                                    
                                    <div class="card-list">
                                        <span>@lang('Building Number')</span>
                                        <b>{{ __($serviceRequest->tenant_building_number) }}</b>
                                    </div>
                                    
                                    <div class="card-list">
                                        <span>@lang('Additional Number')</span>
                                        <b>{{ __($serviceRequest->tenant_additional_number) }}</b>
                                    </div>
                                    
                                    <div class="card-list">
                                        <span>@lang('Zip Code')</span>
                                        <b>{{ __($serviceRequest->tenant_zip_code) }}</b>
                                    </div>
                                    
                                    <div class="card-list">
                                        <span>@lang('Tenant type')</span>
                                        <b>{{ __($serviceRequest->tenant_type) }}</b>
                                    </div>
                                    
                                    <div class="card-list">
                                        <span>@lang('If the tenant is an institution, enter the commercial registration number')</span>
                                        <b>{{ __($serviceRequest->tenant_institution_registration_number) }}</b>
                                    </div>
                                    
                                    <div class="card-list">
                                        <span>@lang('If you has a contract of association, enter the number of the contract of association')</span>
                                        <b>{{ __($serviceRequest->tenant_association_contract_number) }}</b>
                                    </div>
                                    
                                    <div class="card-list">
                                        <span>@lang('If the tenant is an individual enter the number of family members')</span>
                                        <b>{{ __($serviceRequest->tenant_family_members) }}</b>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                        
                         <div class="col-md-6">
                            <div class="border shadow-none card">
                                <div class="card-header">
                                    <h6><b>@lang('Property')</b></h6>
                                </div>
                                <div class="p-0 card-body">
                                    
                                     <div class="card-list">
                                        <span>@lang("National address")</span>
                                        <b>{{ __($serviceRequest->property_national_address) }}</b>
                                    </div>
                                    
                                    <div class="card-list">
                                        <span>@lang('Property type')</span>
                                        <b>{{ __($serviceRequest->property_type) }}</b>
                                    </div>
                                    
                                 
                                    <div class="card-list">
                                        <span>@lang('Property usage')</span>
                                        <b>{{ __($serviceRequest->property_usage) }}</b>
                                    </div>
                                    
                                    <div class="card-list">
                                        <span>@lang('Number of floors')</span>
                                        <b>{{ __($serviceRequest->property_number_of_floors) }}</b>
                                    </div>
                                    
                                    <div class="card-list">
                                        <span>@lang('Number of units')</span>
                                        <b>{{ __($serviceRequest->property_number_of_units) }}</b>
                                    </div>
                                    
                                    <div class="card-list">
                                        <span>@lang('Is there an elevator or not?')</span>
                                        <b>{{ __($serviceRequest->property_elevator_or_not) }}</b>
                                    </div>
                                    
                                    <div class="card-list">
                                        <span>@lang('Electricity meter number')</span>
                                        <b>{{ __($serviceRequest->property_electricity_meter_number) }}</b>
                                    </div>
                                    
                                    <div class="card-list">
                                        <span>@lang('Current meter reading Or a fixed amount')</span>
                                        <b>{{ __($serviceRequest->property_current_meter_reading_or_a_fixed_amount) }}</b>
                                    </div>
                                    
                                    <div class="card-list">
                                        <span>@lang('Water meter number')</span>
                                        <b>{{ __($serviceRequest->property_water_meter_number) }}</b>
                                    </div>
                                    
                                    <div class="card-list">
                                        <span>@lang('Gas meter number')</span>
                                        <b>{{ __($serviceRequest->property_gas_meter_number) }}</b>
                                    </div>
                                    
                                    
                                    <div class="card-list">
                                        <span>@lang('Value Rent Annual rental fees for the unit')</span>
                                        <b>{{ __($serviceRequest->property_rent_annual_rental_fees) }}</b>
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

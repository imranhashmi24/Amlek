@extends('web.layouts.frontend', ['title' => @$title])


@section('content')

@php
    $breadcrumbContent = getContent('breadcrumb.content', true);
@endphp


<section class="py-5 pages-banner" style="background-image: url({{ getImage('assets/images/frontend/breadcrumb/' . @$breadcrumbContent->data_values->image, '1900x250') }});">
    <div class="container">
        <div class="row">
            <div class="py-5 col-12">
                <h1 class="p-0 m-0 text-center"> {{ __('The electronic lease documentation') }}</h1>
            </div>
        </div>
    </div>
</section>

<section class="py-5">
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h3 class="mb-0">
                    {!! __(@$title)  !!}
                </h3>
            </div>
            <div class="card-body">
                <form action="{{ route('ai.service.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card">
                        <div class="card-header">
                            <h4 class="mb-0">
                                {{ __('Contract Data') }}
                            </h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="mb-3 col-12">
                                    <div class="form-group">
                                        <label class="form-label">@lang('Contract number') </label>
                                        <input type="text" name="contract_number" class="form-control" required>
                                    </div>
                                </div>

                                <div class="mb-3 col-12">
                                    <div class="form-group">
                                        <label class="form-label">@lang('Contract type') </label>
                                        <input type="text" name="contract_type" class="form-control" required>
                                    </div>
                                </div>

                                <div class="mb-3 col-12">
                                    <div class="form-group">
                                        <label class="form-label">@lang('Contract sealing date')</label>
                                        <input type="date" name="contract_sealing_date" class="form-control" required>
                                    </div>
                                </div>
                                <div class="mb-3 col-12">
                                    <div class="form-group">
                                        <label class="form-label">@lang('Contract sealing location') </label>
                                        <input type="text" name="contract_sealing_location" class="form-control" required>
                                    </div>
                                </div>

                                <div class="mb-3 col-12">
                                    <div class="form-group">
                                        <label class="form-label">@lang('Tenancy start date') </label>
                                        <input type="date" name="tenancy_start_date" class="form-control" required>
                                    </div>
                                </div>

                                <div class="mb-3 col-12">
                                    <div class="form-group">
                                        <label class="form-label">@lang('Tenancy end date') </label>
                                        <input type="date" name="tenancy_end_date" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="my-3 card">
                        <div class="card-header">
                            <h4 class="mb-0">
                                {{ __('Lessor') }}
                            </h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="mb-3 col-12">
                                    <div class="form-group">
                                        <label class="form-label">@lang("Landlord’s status") </label>
                                        <input type="text" name="landlord_status_representative" class="form-control" required>
                                    </div>
                                </div>

                                <div class="mb-3 col-12">
                                    <div class="form-group">
                                        <label class="form-label">@lang('Landlord representative agency') /label>
                                        <input type="text" name="landlord_representative_agency" class="form-control" required>
                                    </div>
                                </div>

                                <div class="mb-3 col-12">
                                    <div class="form-group">
                                        <label class="form-label">@lang('Date of birth')</label>
                                        <input type="text" name="date_of_birth" class="form-control" required>
                                    </div>
                                </div>

                                <div class="mb-3 col-12">
                                    <div class="form-group">
                                        <label class="form-label">@lang('Nationality') </label>
                                        <input type="text" name="nationality" class="form-control" required>
                                    </div>
                                </div>

                                <div class="mb-3 col-12">
                                    <div class="form-group">
                                        <label class="form-label">@lang('ID type') </label>
                                        <select name="lessor_id_type" class="form-select">
                                            <option value="0">@lang('Select one')</option>
                                            <option value="National ID">@lang('National ID')</option>
                                            <option value="Resident ID">@lang('Resident ID')</option>
                                            <option value="Privileged Residency">@lang('Privileged Residency')</option>
                                            <option value="Passport">@lang('Passport')</option>
                                            <option value="Gulf Cooperation Council countries">@lang('Gulf Cooperation Council countries')</option>
                                            <option value="Others">@lang('Others')</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="mb-3 col-12">
                                    <div class="form-group">
                                        <label class="form-label">@lang('ID No')</label>
                                        <input type="text" name="lessor_id_no" class="form-control" required>
                                    </div>
                                </div>


                                <div class="mb-3 col-12">
                                    <div class="form-group">
                                        <label class="form-label">@lang('Mobile phone')</label>
                                        <input type="text" name="lessor_mobile" class="form-control" required>
                                    </div>
                                </div>

                                <div class="mb-3 col-12">
                                    <div class="form-group">
                                        <label class="form-label">@lang('E-mail') </label>
                                        <input type="text" name="lessor_email" class="form-control" required>
                                    </div>
                                </div>

                                <div class="mb-3 col-12">
                                    <div class="form-group">
                                        <label class="form-label">@lang('Region')</label>
                                        <input type="text" name="lessor_region" class="form-control" required>
                                    </div>
                                </div>

                                <div class="mb-3 col-12">
                                    <div class="form-group">
                                        <label class="form-label">@lang('City') </label>
                                        <input type="text" name="lessor_city" class="form-control" required>
                                    </div>
                                </div>

                                <div class="mb-3 col-12">
                                    <div class="form-group">
                                        <label class="form-label">@lang('Street Name') </label>
                                        <input type="text" name="lessor_street_name" class="form-control" required>
                                    </div>
                                </div>

                                <div class="mb-3 col-12">
                                    <div class="form-group">
                                        <label class="form-label">@lang('Building Number')</label>
                                        <input type="text" name="lessor_building_number" class="form-control" required>
                                    </div>
                                </div>

                                <div class="mb-3 col-12">
                                    <div class="form-group">
                                        <label class="form-label">@lang('Additional Number') </label>
                                        <input type="text" name="lessor_additional_number" class="form-control" required>
                                    </div>
                                </div>

                                <div class="mb-3 col-12">
                                    <div class="form-group">
                                        <label class="form-label">@lang('Zip Code') </label>
                                        <input type="text" name="lessor_zip_code" class="form-control" required>
                                    </div>
                                </div>

                                <div class="mb-3 col-12">
                                    <div class="form-group">
                                        <label class="form-label">@lang('Title Deed') </label>
                                        <input type="text" name="lessor_title_deed" class="form-control" required>
                                    </div>
                                </div>

                                <div class="mb-3 col-12">
                                    <div class="form-group">
                                        <label class="form-label">@lang('Tax Number')</label>
                                        <input type="text" name="lessor_tax_number" class="form-control" required>
                                    </div>
                                </div>

                                <div class="mb-3 col-12">
                                    <div class="form-group">
                                        <label class="form-label">@lang('IBAN') </label>
                                        <input type="text" name="lessor_iban" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="my-3 card">
                        <div class="card-header">
                            <h5 class="mb-0">
                                {{ __('Tenant') }}
                            </h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="mb-3 col-12">
                                    <div class="form-group">
                                        <label class="form-label">@lang("Name") <span class="text-danger fs-6">*</span></label>
                                        <input type="text" name="tenant_name" class="form-control" required>
                                    </div>
                                </div>

                                <div class="mb-3 col-12">
                                    <div class="form-group">
                                        <label class="form-label">@lang('Date of birth') <span class="text-danger fs-6">*</span></label>
                                        <input type="date" name="tenant_date_of_birth" class="form-control" required>
                                    </div>
                                </div>

                                <div class="mb-3 col-12">
                                    <div class="form-group">
                                        <label class="form-label">@lang('Nationality') <span class="text-danger fs-6">*</span></label>
                                        <input type="text" name="tenant_nationality" class="form-control" required>
                                    </div>
                                </div>

                                <div class="mb-3 col-12">
                                    <div class="form-group">
                                        <label class="form-label">@lang('ID type') <span class="text-danger fs-6">*</span></label>
                                        <select name="tenant_id_type" class="form-select">
                                            <option value="0">@lang('Select one')</option>
                                            <option value="National ID">@lang('National ID')</option>
                                            <option value="Resident ID">@lang('Resident ID')</option>
                                            <option value="Privileged Residency">@lang('Privileged Residency')</option>
                                            <option value="Passport">@lang('Passport')</option>
                                            <option value="Gulf Cooperation Council countries">@lang('Gulf Cooperation Council countries')</option>
                                            <option value="Others">@lang('Others')</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="mb-3 col-12">
                                    <div class="form-group">
                                        <label class="form-label">@lang('ID No') <span class="text-danger fs-6">*</span></label>
                                        <input type="text" name="tenant_id_no" class="form-control" required>
                                    </div>
                                </div>

                                <div class="mb-3 col-12">
                                    <div class="form-group">
                                        <label class="form-label">@lang('Mobile phone') <span class="text-danger fs-6">*</span></label>
                                        <input type="text" name="tenant_mobile" class="form-control" required>
                                    </div>
                                </div>

                                <div class="mb-3 col-12">
                                    <div class="form-group">
                                        <label class="form-label">@lang('E-mail') <span class="text-danger fs-6">*</span></label>
                                        <input type="text" name="tenant_email" class="form-control" required>
                                    </div>
                                </div>

                                <div class="mb-3 col-12">
                                    <div class="form-group">
                                        <label class="form-label">@lang('Region') <span class="text-danger fs-6">*</span></label>
                                        <input type="text" name="tenant_region" class="form-control" required>
                                    </div>
                                </div>

                                <div class="mb-3 col-12">
                                    <div class="form-group">
                                        <label class="form-label">@lang('City') <span class="text-danger fs-6">*</span></label>
                                        <input type="text" name="tenant_city" class="form-control" required>
                                    </div>
                                </div>

                                <div class="mb-3 col-12">
                                    <div class="form-group">
                                        <label class="form-label">@lang('Street Name') <span class="text-danger fs-6">*</span></label>
                                        <input type="text" name="tentent_street_name" class="form-control" required>
                                    </div>
                                </div>

                                <div class="mb-3 col-12">
                                    <div class="form-group">
                                        <label class="form-label">@lang('Building Number') </label>
                                        <input type="text" name="tenant_building_number" class="form-control" required>
                                    </div>
                                </div>

                                <div class="mb-3 col-12">
                                    <div class="form-group">
                                        <label class="form-label">@lang('Additional Number')</label>
                                        <input type="text" name="tenant_additional_number" class="form-control" required>
                                    </div>
                                </div>

                                <div class="mb-3 col-12">
                                    <div class="form-group">
                                        <label class="form-label">@lang('Zip Code') </label>
                                        <input type="text" name="tenant_zip_code" class="form-control" required>
                                    </div>
                                </div>

                                <div class="mb-3 col-12">
                                    <div class="form-group">
                                        <label class="form-label">@lang('Tenant type')</label>
                                        <select name="tenant_type" class="form-select">
                                            <option value="0">@lang('Select one')</option>
                                            <option value="Individual">@lang('Individual')</option>
                                            <option value="Institution">@lang('Institution')</option>
                                            <option value="Organization">@lang('Organization')</option>
                                            <option value="Government">@lang('Government')</option>
                                            <option value="Others">@lang('Others')</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="mb-3 col-12">
                                    <div class="form-group">
                                        <label class="form-label">@lang('If the tenant is an institution, enter the commercial registration number')</label>
                                        <input type="text" name="tenant_institution_registration_number" class="form-control" required>
                                    </div>
                                </div>

                                <div class="mb-3 col-12">
                                    <div class="form-group">
                                        <label class="form-label">@lang('If you has a contract of association, enter the number of the contract of association') </label>
                                        <input type="text" name="tenant_association_contract_number" class="form-control" required>
                                    </div>
                                </div>

                                <div class="mb-3 col-12">
                                    <div class="form-group">
                                        <label class="form-label">@lang('If the tenant is an individual enter the number of family members') </label>
                                        <input type="text" name="tenant_family_members" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="my-3 card">
                        <div class="card-header">
                            <h5 class="mb-0">
                                {{ __('Property') }}
                            </h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="mb-3 col-12">
                                    <div class="form-group">
                                        <label class="form-label">@lang("National address") </label>
                                        <input type="text" name="property_national_address" class="form-control" required>
                                    </div>
                                </div>

                                <div class="mb-3 col-12">
                                    <div class="form-group">
                                        <label class="form-label">@lang('Property type')</label>
                                        <input type="text" name="property_type" class="form-control" required>
                                    </div>
                                </div>

                                <div class="mb-3 col-12">
                                    <div class="form-group">
                                        <label class="form-label">@lang('Property usage')</label>
                                        <input type="text" name="property_usage" class="form-control" required>
                                    </div>
                                </div>

                                <div class="mb-3 col-12">
                                    <div class="form-group">
                                        <label class="form-label">@lang('Number of floors') </label>
                                        <input type="text" name="property_number_of_floors" class="form-control" required>
                                    </div>
                                </div>
                                <div class="mb-3 col-12">
                                    <div class="form-group">
                                        <label class="form-label">@lang('Number of units')</label>
                                        <input type="text" name="property_number_of_units" class="form-control" required>
                                    </div>
                                </div>

                                <div class="mb-3 col-12">
                                    <div class="form-group">
                                        <label class="form-label">@lang('Is there an elevator or not?') </label>
                                        <input type="text" name="property_elevator_or_not" class="form-control" required>
                                    </div>
                                </div>


                                <div class="mb-3 col-12">
                                    <div class="form-group">
                                        <label class="form-label">@lang('Electricity meter number') </label>
                                        <input type="text" name="property_electricity_meter_number" class="form-control" required>
                                    </div>
                                </div>

                                <div class="mb-3 col-12">
                                    <div class="form-group">
                                        <label class="form-label">@lang('Current meter reading Or a fixed amount') </label>
                                        <input type="text" name="property_current_meter_reading_or_a_fixed_amount" class="form-control" required>
                                    </div>
                                </div>

                                <div class="mb-3 col-12">
                                    <div class="form-group">
                                        <label class="form-label">@lang('Water meter number') </label>
                                        <input type="text" name="property_water_meter_number" class="form-control" required>
                                    </div>
                                </div>

                              

                                <div class="mb-3 col-12">
                                    <div class="form-group">
                                        <label class="form-label">@lang('Gas meter number') </label>
                                        <input type="text" name="property_gas_meter_number" class="form-control" required>
                                    </div>
                                </div>

                                <div class="mb-3 col-12">
                                    <div class="form-group">
                                        <label class="form-label">@lang('Value Rent Annual rental fees for the unit') </label>
                                        <select name="property_rent_annual_rental_fees" class="form-select">
                                            <option value="0">@lang('Choose how the tenant will pay the total contract value')</option>
                                            <option value="Single Payment">@lang('Single Payment')</option>
                                            <option value="Recurring Payments">@lang('Recurring Payments')</option>
                                            <option value="Flexible Payments">@lang('Flexible Payments')</option>
                                            <option value="Monthly">@lang('Monthly')</option>
                                            <option value="Quarterly">@lang('Quarterly')</option>
                                            <option value="Semi-annual">@lang('Semi-annual')</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="mt-3 text-center col-12">
                                <button class="submit-btn w-100">@lang('Send Request')</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>



@if (@$sections->secs != null)
    @foreach (json_decode($sections->secs) as $sec)
        @include('sections.' . $sec)
    @endforeach
@endif


@endsection


@push('script')
    <script>
        $('[name=country_id]').on('change', function() {
            var cities = $(this).find('option:selected').data('cities');
            var option = [`<option value="">@lang('Select One')</option>`];
            $.each(cities, function(index, value) {
                var name = "{{ app()->getLocale() }}" == 'en' ? value.name : value.name_ar;
                option += "<option value='" + value.id + "' " + (value.id == "" ? "selected" : "") + ">" +
                    name + "</option>";
            });
            $('select[name=city_id]').html(option);
        }).change();
    </script>
@endpush

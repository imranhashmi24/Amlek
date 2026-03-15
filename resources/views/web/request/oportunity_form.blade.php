
@php

if(request('t')){
    $title = request('t') ?? '';
}
@endphp

@extends('web.layouts.frontend', ['title' => @$title])


@section('content')

    @include('sections.breadcrumb')
    <section class="py-5">
        <div class="container">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('request.oportunity_form_submit') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="mb-3 col-12">
                                <div class="form-group">
                                    <label class="form-label">@lang('Opportunity Title') <span class="text-danger fs-6">*</span></label>
                                    <input type="text" name="title" value="{{ @$title }}" class="form-control" required>
                                </div>
                            </div>
                            <div class="mb-3 col-md-6">
                                <div class="form-group">
                                    <label class="form-label">@lang('Sector') <span class="text-danger fs-6">*</span></label>
                                    <select class="form-control" name="sector">
                                        <option value="n/a">@lang('Select one')</option>
                                        <option value="Industry and Mining">@lang('Industry and Mining')</option>
                                        <option value="Tourism Sector">@lang('Tourism Sector')</option>
                                        <option value="Education Sector">@lang('Education Sector')</option>
                                        <option value="Medical and Care Sector">@lang('Medical and Care Sector')</option>
                                        <option value="Hospitality Sector">@lang('Hospitality Sector')</option>
                                        <option value="Commercial Sector">@lang('Commercial Sector')</option>
                                        <option value="Mass Housing Sector">@lang('Mass Housing Sector')</option>
                                        <option value="Construction Sector">@lang('Construction Sector')</option>
                                        <option value="Logistics and Transportation">@lang('Logistics and Transportation')</option>
                                        <option value="Agricultural Sector">@lang('Agricultural Sector')</option>
                                        <option value="Gas Stations Sector">@lang('Gas Stations Sector')</option>
                                        <option value="Commercial Buildings and Complexes Sectorr">@lang('Commercial Buildings and Complexes Sector')</option>
                                        <option value="Commercial and Residential Land Sector">@lang('Commercial and Residential Land Sector')</option>
                                        <option value="Sports Facilities Sector">@lang('Sports Facilities Sector')</option>
                                        <option value="Family Business Sector">@lang('Family Business Sector')</option>
                                    </select>
                                </div>
                            </div>
                            
                             <div class="mb-3 col-md-12">
                                <div class="form-group">
                                    <label class="form-label">@lang('Opportunity Description')</label>
                                    <textarea name="opportunity_description" value="{{ old('opportunity_description') }}"
                                        class="form-control">{{ old('opportunity_description') }}</textarea>
                                </div>
                            </div>
                            
                            <h6 class="my-5">@lang('Investment Opportunity Information')</h6>
                            
                            <div class="mb-3 col-md-6">
                                <div class="form-group">
                                    <label class="form-label">@lang('Property Type') <span class="text-danger fs-6">*</span></label>
                                    <select class="form-control" name="property_type" required>
                                        <option value="n/a">@lang('Select one')</option>
                                        <option value="Hotel">@lang('Hotel')</option>
                                        <option value="Factory">@lang('Factory')</option>
                                        <option value="Farm">@lang('Farm')</option>
                                        <option value="School">@lang('School')</option>
                                        <option value="etc">@lang('etc')</option>
                                    </select>
                                </div>
                            </div>
                            
                            <div class="mb-3 col-12 col-md-6">
                                <div class="form-group">
                                    <label class="form-label">@lang('City') <span class="text-danger fs-6">*</span></label>
                                    <input type="text" name="city" value="{{ old('city') }}" class="form-control" required>
                                </div>
                            </div>
                            
                            
                            <div class="mt-3 mb-3 col-12 col-md-6">
                                <div class="form-group">
                                    <label class="form-label">@lang('Area')</label>
                                    <input type="text" name="area" value="{{ old('area') }}" class="form-control">
                                </div>
                            </div>
                            
                            <div class="mt-3 mb-3 col-12 col-md-6">
                                <div class="form-group">
                                    <label class="form-label">@lang('Address')</label>
                                    <input type="text" name="address" value="{{ old('address') }}" class="form-control">
                                </div>
                            </div>
                            
                            <div class="mt-3 mb-3 col-12 col-md-6">
                                <div class="form-group">
                                    <label class="form-label">@lang('Location features')</label>
                                    <input type="text" name="location_features" value="{{ old('location_features') }}" class="form-control">
                                </div>
                            </div>
                            
                            <div class="mt-3 mb-3 col-12 col-md-6">
                                <div class="form-group">
                                    <label class="form-label">@lang('Tenant Type')</label>
                                    <input type="text" name="tenant_type" value="{{ old('tenant_type') }}" class="form-control">
                                </div>
                            </div>
                            
                            <div class="mt-3 mb-3 col-12 col-md-6">
                                <div class="form-group">
                                    <label class="form-label">@lang('Tenant Capital Construction Value')</label>
                                    <input type="text" name="tenant_capital_construction_value" value="{{ old('tenant_capital_construction_value') }}" class="form-control">
                                </div>
                            </div>
                            
                            <div class="mt-3 mb-3 col-12 col-md-6">
                                <div class="form-group">
                                    <label class="form-label">@lang('Selling Price')</label>
                                    <input type="text" name="selling_price" value="{{ old('selling_price') }}" class="form-control">
                                </div>
                            </div>
                            
                            <div class="mt-3 mb-3 col-12 col-md-6">
                                <div class="form-group">
                                    <label class="form-label">@lang('Income ratio')</label>
                                    <input type="number" name="income_ratio" value="{{ old('income_ratio') }}" class="form-control">
                                </div>
                            </div>
                            
                            <div class="mt-3 mb-3 col-12 col-md-6">
                                <div class="form-group">
                                    <label class="form-label">@lang('Property Nature')</label>
                                    <select class="form-control" name="property_nature">
                                        <option value="n/a">@lang('Select one')</option>
                                        <option value="Mortgage">@lang('Mortgage')</option>
                                        <option value="Resident">@lang('Resident')</option>
                                        <option value="Non-Resident">@lang('Non-Resident')</option>
                                    </select>
                                </div>
                            </div>
                            
                            <div class="mt-3 mb-3 col-12 col-md-6">
                                <div class="form-group">
                                    <label class="form-label">@lang('Rental Status') <span class="text-danger fs-6">*</span></label>
                                    <select class="form-control" name="rental_status" required>
                                        <option value="n/a">@lang('Select one')</option>
                                        <option value="Active">@lang('Active')</option>
                                        <option value="Pending">@lang('Pending')</option>
                                    </select>
                                </div>
                            </div>

                            <div class="mb-3 col-md-6">
                                <div class="form-group">
                                    <label class="form-label">@lang('Full Name') <span class="text-danger fs-6">*</span></label>
                                    <input type="text" name="full_name" value="{{ old('full_name') }}" class="form-control" required>
                                </div>
                            </div>
                            
                            <div class="mb-3 col-md-6">
                                <div class="form-group">
                                    <label class="form-label">@lang('ID Number')</label>
                                    <input type="text" name="id_number" value="{{ old('id_number') }}" class="form-control">
                                </div>
                            </div>
                            
                            <div class="mb-3 col-md-6">
                                <div class="form-group">
                                    <label class="form-label">@lang('Establishment Name')</label>
                                    <input type="text" name="establishment_name" value="{{ old('establishment_name') }}" class="form-control">
                                </div>
                            </div>
                            
                            <div class="mb-3 col-md-6">
                                <div class="form-group">
                                    <label class="form-label">@lang('Commercial Registration Number')</label>
                                    <input type="text" name="commercial_registration_number" value="{{ old('commercial_registration_number') }}" class="form-control">
                                </div>
                            </div>
                            
                            <div class="mb-3 col-md-6">
                                <div class="form-group">
                                    <label class="form-label">@lang('Mobile Number') <span class="text-danger fs-6">*</span></label>
                                    <input type="text" name="mobile_number" value="{{ old('mobile_number') }}" class="form-control" required>
                                </div>
                            </div>
                          
                            <div class="mt-3 mb-3 col-12">
                                <div class="form-group">
                                    <label class="form-label">@lang('Email') <span class="text-danger fs-6">*</span></label>
                                    <input type="email" name="email" value="{{ old('email') }}" class="form-control" required>
                                </div>
                            </div>
                            
                           
                            
                            
                            
                            <div class="mt-3 text-center col-12">
                                <button class="submit-btn w-100">@lang('Send Request')</button>
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

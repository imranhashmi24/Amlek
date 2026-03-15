@extends('web.layouts.frontend', ['title' => @$title])


@section('content')

    @include('sections.breadcrumb')

    <section class="py-5">
        <div class="container">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('finance.request.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <div class="form-group">
                                    <label class="form-label">@lang('Name')<span class="text-danger fs-6">*</span></label>
                                    <input type="text" name="name" value="{{ old('name') }}" class="form-control" required>
                                </div>
                            </div>
                            <div class="mb-3 col-md-6">
                                <div class="form-group">
                                    <label class="form-label">@lang('Family Name')<span class="text-danger fs-6">*</span></label>
                                    <input type="text" name="family_name" value="{{ old('family_name') }}" required
                                        class="form-control">
                                </div>
                            </div>

                            <div class="mb-3 col-md-6">
                                <div class="form-group">
                                    <label class="form-label">@lang('National ID number / Iqama number') <span class="text-danger fs-6">*</span></label>
                                    <input type="text" name="nid" value="{{ old('nid') }}" class="form-control" required>
                                </div>
                            </div>

                            <div class="mb-3 col-md-6">
                                <div class="form-group">
                                    <label class="form-label">@lang('Email') <span class="text-danger fs-6">*</span></label>
                                    <input type="email" id="Email" name="email" value="{{ old('email') }}" required
                                        class="form-control">
                                </div>
                            </div>
                            <div class="mb-3 col-md-6">
                                <div class="form-group">
                                    <label class="form-label">@lang('Mobile Number') <span class="text-danger fs-6">*</span></label>
                                    <input type="text" name="mobile" value="{{ old('mobile') }}" class="form-control" required>
                                </div>
                            </div>
                            <div class="mb-3 col-md-6">
                                <div class="form-group">
                                    <label class="form-label">@lang('Do you have an account with Alawwal?') <span class="text-danger fs-6">*</span></label>
                                    <select name="alawwal" class="form-control" required>
                                        <option value="yes" @selected(old('alawwal') == 'yes')>@lang('Yes')</option>
                                        <option value="no" @selected(old('alawwal') == 'no')>@lang('No')</option>
                                    </select>
                                </div>
                            </div>

                            <div class="mb-3 col-md-6">
                                <div class="form-group">
                                    <label class="form-label">@lang('Property Type') <span class="text-danger fs-6">*</span></label>
                                    <select name="property_type_id" class="form-select" required>
                                        <option value="">@lang('Select One')</option>
                                        @foreach ($propertyTypes as $type)
                                            <option @selected(old('property_type_id') == $type->id) value="{{ $type->id }}">
                                                {{ $type->lang('name') }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="mb-3 col-md-6">
                                <div class="form-group">
                                    <label class="form-label">@lang('Country') <span class="text-danger fs-6">*</span></label>
                                    <select name="country_id" class="form-control select2-basic" required>
                                        <option value="">@lang('Select One')</option>
                                        @foreach ($countries as $country)
                                            <option value="{{ $country->id }}" data-cities="{{ $country->city  }}"
                                                @selected(old('country_id', @$propertyTypeArea->country_id == @$country->id))>
                                                {{ $country->lang('name') }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="mb-3 col-md-6">
                                <div class="form-group">
                                    <label class="form-label">@lang('City') <span class="text-danger fs-6">*</span></label>
                                    <select name="city_id" class="form-control select2-basic" required>
                                    </select>
                                </div>
                            </div>

                            <div class="mb-3 col-md-6">
                                <div class="form-group">
                                    <label class="form-label">@lang('Activity') <span class="text-danger fs-6">*</span></label>
                                    <select name="monthly_income" id="monthlyincome" class="form-select" required>
                                        <option value="5,000 - 12,499" @selected(old('monthly_income') == '5,000 - 12,499')>5,000 - 12,499
                                            {{ gs('cur_sym') }}</option>
                                        <option value="12,500 - 19,999 SAR" @selected(old('monthly_income') == '12,500 - 19,999')> 12,500 - 19,999
                                            {{ gs('cur_sym') }}</option>
                                        <option value="20,000 or more" @selected(old('monthly_income') == '20,000 or more')> 20,000 @lang('or more')</option>
                                    </select>
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

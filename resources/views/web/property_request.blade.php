@extends('web.layouts.frontend', ['title' => @$title])


@section('content')

    @include('sections.breadcrumb')

    <section class="py-5">
        <div class="container">
            <div class="card">
                <div class="card-header">
                    <h5>@lang('To request a property, kindly fill in the forms')</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('property.request.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <div class="form-group">
                                    <label class="form-label">@lang('Name') <span class="text-danger fs-6">*</span></label>
                                    <input type="text" name="name" value="{{ old('name') }}" class="form-control" required>
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
                                    <label class="form-label">@lang('Email') <span class="text-danger fs-6">*</span></label>
                                    <input type="email" id="Email" name="email" value="{{ old('email') }}"  required
                                        class="form-control">
                                </div>
                            </div>
                            <div class="mb-3 col-md-6">
                                <div class="form-group">
                                    <label class="form-label">@lang('Country') <span class="text-danger fs-6">*</span></label>
                                    <select name="country_id" class="form-select select2-basic" required>
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
                                    <select name="city_id" class="form-select select2-basic" required>

                                    </select>
                                </div>
                            </div>
                            <div class="mb-3 col-md-6">
                                <div class="form-group">
                                    <label class="form-label">@lang('Nature of Property seeker') <span class="text-danger fs-6">*</span></label>
                                    <select class="form-control" name="nature_of_property">
                                        <option value="buyer" @selected(old('nature_of_property') == 'buyer')> @lang('buyer') </option>
                                        <option value="sponsored" @selected(old('nature_of_property') == 'sponsored')> @lang('sponsored') </option>
                                        <option value="investor" @selected(old('nature_of_property') == 'investor')> @lang('investor') </option>
                                    </select>
                                </div>
                            </div>

                            <div class="mb-3 col-md-4">
                                <div class="form-group">
                                    <label class="form-label">@lang('Property Type') <span class="text-danger fs-6">*</span></label>
                                    <select name="property_type_id" class="form-select" required>
                                        <option value="">@lang('Select One')</option>
                                        @foreach ($propertyTypes as $type)
                                            <option @selected(old('property_type_id') == $type->id) value="{{ $type->id }}" data-subpropertytypes="{{ $type->subproperty_types }}">
                                                {{ $type->lang('name') }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="mb-3 col-md-4">
                                <div class="form-group">
                                    <label class="form-label">@lang('Sub Property Type') <span class="text-danger fs-6">*</span></label>
                                    <select name="subproperty_type_id" class="form-select" required>
                                        <option value="">@lang('Select One')</option>
                                    </select>
                                </div>
                            </div>
                            <div class="mb-3 col-md-4">
                                <div class="form-group">
                                    <label class="form-label">@lang('Real estate budget') <span class="text-danger fs-6">*</span></label>
                                    <div class="input-group">
                                        <input type="text" name="budget" value="{{ old('budget') }}" required
                                            class="form-control" placeholder="">
                                        <span class="input-group-text">{{ gs('cur_sym') }}</span>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3 col-12">
                                <div class="form-group">
                                    <label class="form-label">@lang('The purpose of buying the property') <span class="text-danger fs-6">*</span></label>
                                    <textarea name="purpose" id="purpose" rows="3" class="form-control" required>{{ old('purpose') }}</textarea>
                                </div>
                            </div>

                            <div class="mb-3 col-5">
                                <div class="form-group">
                                    <label class="form-label">@lang('Image') <span class="text-danger fs-6">*</span></label>
                                    <x-image-uploader class="w-100" name="thumb_image" type="property_thumb" />
                                </div>
                            </div>

                            <div class="mb-3 col-7">
                                <div class="form-group">
                                    <label class="form-label">@lang('Preferred Area') <span class="text-danger fs-6">*</span></label>
                                    <textarea name="area" id="area" rows="3" class="form-control" required>{{ old('area') }}</textarea>
                                </div>
                            </div>

                            <div class="mb-3 col-12">
                                <div class="form-group">
                                    <label class="form-label">@lang('Details') <span class="text-danger fs-6">*</span></label>
                                    <textarea name="detail" id="detail" rows="3" class="form-control" required>{{ old('detail') }}</textarea>
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
        $('[name=property_type_id]').on('change', function() {
            var val = $(this).find('option:selected').val();

            var subPropertyType = $(this).find('option:selected').data('subpropertytypes');
            subPropetyTypes(subPropertyType);

            // $(".type-info-content").html('');
            // if (val !== undefined && val !== '') {

            //     $.ajax({
            //         url: '/get-property-type-info/' + val,
            //         type: 'GET',
            //         success: function(response) {
            //             $(".type-info-content").html(response);
            //         },
            //         error: function(xhr, status, error) {
            //             console.error(error);
            //         }
            //     });
            // } else {
            //     $(".type-info-content").html('');
            // }
        }).change();


        function subPropetyTypes(subpropertyTypes)
        {

            var option = '<option value="">' + "@lang('Select one')" + '</option>';
            $.each(subpropertyTypes, function(index, value) {
                var name = "{{ app()->getLocale() }}" == 'en' ? value.name : value.name_ar;
                option += "<option value='" + value.id + "'" + (value.id == "" ? " selected" : "") + ">" + name + "</option>";
            });

            $('select[name=subproperty_type_id]').html(option);
        }
    </script>
@endpush

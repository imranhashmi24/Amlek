@extends('admin.layouts.app', ['title' => @$title])
@section('panel')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.property.type.area.store', @$propertyTypeArea->id) }}" method="post"
                enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-4 form-group">
                        <label class="form-label">@lang('Image') <span class="text-danger fs-6">*</span></label>
                        <x-image-uploader image="{{ @$propertyTypeArea->image }}" name="image" class="w-100"
                            type="propertyTypeArea" />
                    </div>
                    <div class="col-md-8">
                        <div class="mb-3 form-group">
                            <label class="form-label">@lang('Property Type') <span class="text-danger fs-6">*</span></label>
                            <select name="property_type_id" class="form-control" required>
                                <option value="">@lang('Select One')</option>
                                @foreach ($propertyTypes as $propertyType)
                                    <option value="{{ $propertyType->id }}" @selected(old('property_type_id', @$propertyTypeArea->property_type_id == @$propertyType->id))>
                                        {{ $propertyType->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3 form-group">
                            <label class="form-label">@lang('Country') <span class="text-danger fs-6">*</span></label>
                            <select name="country_id" class="form-control select2-basic" required>
                                <option value="">@lang('Select One')</option>
                                @foreach ($countries as $country)
                                    <option value="{{ $country->id }}" data-cities="{{ $country->city }}"
                                        @selected(old('country_id', @$propertyTypeArea->country_id == @$country->id))>
                                        {{ $country->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3 form-group">
                            <label class="form-label">@lang('City') <span class="text-danger fs-6">*</span></label>
                            <select name="city_id" class="form-control select2-basic" required>
                                <option value="">@lang('Select One')</option>

                            </select>
                        </div>

                        <div class="mb-3 form-group">
                            <button type="submit" class="btn btn-primary w-100">@lang('Submit')</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('breadcrumb-plugins')
    <a href="{{ route('admin.property.type.area.index') }}" class="btn btn-primary"><i class="bi bi-arrow-clockwise"></i>
        @lang('Back')</a>
@endpush

@push('script')
    <script>
        $('[name=country_id]').on('change', function() {
            var cities = $(this).find('option:selected').data('cities');
            var option = [`<option value="">Select one</option>`];
            $.each(cities, function(index, value) {
                option += "<option value='" + value.id + "' " + (value.id == "{{ @$propertyTypeArea->city_id }}" ? "selected" : "") + ">" +
                    value.name + "</option>";
            });
            $('select[name=city_id]').html(option);
        }).change();
    </script>
@endpush

@push('script')
    <script>
        $('.select2-basic').select2({
            dropdownParent: $('.card-body')
        });
    </script>
@endpush


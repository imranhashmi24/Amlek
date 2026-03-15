@php
    $investmentSectorContent = getContent('social_investment_sector.content', true);
    $investmentSectorElements = getContent('social_investment_sector.element', null, false, true);

@endphp

<section class="py-5">
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h5 class="text-center">@lang('Please fill in the form detailing the required sector and we will contact you')</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('social.service.request.store') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="mb-3 col-12">
                            <div class="form-group">
                                <label class="form-label">@lang('Name') <span class="text-danger fs-6">*</span></label>
                                <input type="text" name="name" value="{{ old('name') }}" class="form-control" required>
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
                                <label>{{ $investmentSectorContent->lang('heading') ?? '' }}<span class="text-danger fs-6">*</span></label>
                                <select name="sectors[]" class="form-select select2-multiple" required multiple>
                                    <option value="">@lang('Select One')</option>
                                    @foreach ($investmentSectorElements as $investmentSectorElement)
                                        <option value="{{ $investmentSectorElement->data_values->sector_name }}">
                                            {{ $investmentSectorElement->lang('sector_name') }}
                                        </option>
                                    @endforeach
                                </select>
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
                                <label class="form-label">@lang('Select City') <span class="text-danger fs-6">*</span></label>
                                <select name="city_id" class="form-select select2-basic" required></select>
                            </div>
                        </div>
                        <div class="mb-3 col-md-6">
                            <div class="form-group">
                                <label class="form-label">@lang('Required sector') <span class="text-danger fs-6">*</span></label>
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
                                <label class="form-label">@lang('Budget') <span class="text-danger fs-6">*</span></label>
                               <input type="text" class="form-control" name="budget" required>
                            </div>
                        </div>
                        <div class="mt-3 mb-3 col-12">
                            <div class="form-group">
                                <label class="form-label">@lang('Brief description of the required Service') <span class="text-danger fs-6">*</span></label>
                                <textarea name="description" rows="4" class="form-control" required>{{ old('description') }}</textarea>
                            </div>
                        </div>
                        <div class="mt-3 col-12">
                            <button class="submit-btn w-100">@lang('Send Request')</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

@push('script')
    <script>
        $('[name=country_id]').on('change', function() {
            var cities = $(this).find('option:selected').data('cities');
            var option = [`<option value="">@lang('Select One')</option>`];

            $.each(cities, function(index, value) {
                option += "<option value='" + value.id + "' " + (value.id == "" ? "selected" : "") + ">" +
                    value.name + "</option>";
            });

            $('select[name=city_id]').html(option);
        }).change();
    </script>
@endpush

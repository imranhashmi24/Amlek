@extends('web.layouts.frontend', ['title' => @$title])


@section('content')

    @include('sections.breadcrumb')
    <section class="py-5">
        <div class="container">
            <div class="card">
                <div class="card-header">
                    <h5 class="text-center">@lang('Please fill in the form detailing the required sector and we will contact you')</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('service.request.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            @if(request()->has('title'))
                             <div class="mb-3 col-md-12">
                                <div class="form-group">
                                    <input type="hidden" name="title" value="{{ request()->title  }}" 
                                        class="form-control" readonly>
                                </div>
                            </div>
                            @endif
                            <div class="mb-3 col-12">
                                <div class="form-group">
                                    <label class="form-label">@lang('Name') <span class="text-danger fs-6">*</span></label>
                                    <input type="text" name="name" value="{{ old('name') }}" class="form-control" required>
                                     @if(request()->has('type'))
                                      <input type="hidden" name="type" value="{{ request()->type }}" >
                                     @endif
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


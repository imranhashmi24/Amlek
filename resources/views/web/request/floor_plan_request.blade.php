@extends('web.layouts.frontend', ['title' => __("Floor Plan Request")])


@section('content')
    @include('sections.breadcrumb')
    <section class="py-5">
        <div class="container">
            <div class="card">
                <div class="card-header">
                    <h5 class="text-center">{{ @$floor_title }}</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('floorPlanRequestStore') }}" method="POST">
                        @csrf
                        <input type="hidden" name="plan" value="{{ $floor_title }}">
                        <div class="row">
                            <div class="mb-3 col-12">
                                <div class="form-group">
                                    <label class="form-label">@lang('Name') <span class="text-danger fs-6">*</span></label>
                                    <input type="text" name="name" value="{{ old('name') }}" class="form-control" required>
                                </div>
                            </div>
                            <div class="mb-3 col-md-6">
                                <div class="form-group">
                                    <label class="form-label">@lang('Job Title') <span class="text-danger fs-6">*</span></label>
                                    <input type="text" name="job_title" value="{{ old('job_title') }}"
                                        class="form-control" required>
                                </div>
                            </div>

                            <div class="mb-3 col-md-6">
                                <div class="form-group">
                                    <label class="form-label">@lang('Company/Organization') <span class="text-danger fs-6">*</span></label>
                                    <input type="text" name="company" value="{{ old('company') }}" class="form-control" required>
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
                                    <label class="form-label">@lang('Mobile/WhatsApp Number') <span class="text-danger fs-6">*</span></label>
                                    <input type="text" name="mobile" value="{{ old('mobile') }}" class="form-control" required>
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
                                    <label class="form-label">@lang('Select City') <span class="text-danger fs-6">*</span></label>
                                    <select name="city_id" class="form-control select2-basic" required>

                                    </select>
                                </div>
                            </div>

                            <div class="mt-3 mb-3 col-12">
                                <div class="form-group">
                                    <label class="form-label">@lang('Detail') <span class="text-danger fs-6">*</span></label>
                                    <textarea name="detail" rows="4" class="form-control" required>{{ old('detail') }}</textarea>
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

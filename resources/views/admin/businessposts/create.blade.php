@extends('admin.layouts.app', ['title' => 'Create Business Post'])
@section('panel')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.businesspost.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="mb-3 col-12 col-md-6 col-lg-6">
                        <div class="form-group">
                            <label class="form-label">@lang('Title') <span class="text-danger fs-6">*</span></label>
                            <input type="text" name="title" value="{{ old('title') }}" class="form-control" required>
                        </div>
                    </div>
                    <div class="mb-3 col-12 col-md-6 col-lg-6">
                        <div class="form-group">
                            <label class="form-label">@lang('Title') (@lang('Arabic')) <span class="text-danger fs-6">*</span></label>
                            <input type="text" name="title_ar" value="{{ old('title_ar') }}" class="form-control"
                                required>
                        </div>
                    </div>
                    <div class="mb-3 col-12 col-md-6 col-lg-6">
                        <div class="form-group">
                            <label class="form-label">@lang('Slug') <span class="text-danger fs-6">*</span></label>
                            <input type="text" name="slug" value="{{ old('slug') }}" class="form-control" required>
                        </div>
                    </div>
                    <div class="mb-3 col-12 col-md-6 col-lg-6">
                        <div class="form-group">
                            <label class="form-label">@lang('Slug')(@lang('Arabic')) <span class="text-danger fs-6">*</span></label>
                            <input type="text" name="slug_ar" value="{{ old('slug_ar') }}" class="form-control" required>
                        </div>
                    </div>

                    <div class="mb-3 col-12 col-md-6 col-lg-6">
                        <div class="form-group">
                            <label class="form-label">@lang('Business Status') <span class="text-danger fs-6">*</span></label>
                            <select name="business_status" class="form-control" required>
                                <option value="">@lang('Select One')</option>
                                <option value="Active" @selected(old('business_status') == 'Active')>@lang('Active')</option>
                                <option value="Inactive" @selected(old('business_status') == 'Inactive')>@lang('Inactive')</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3 col-12 col-md-6 col-lg-6">
                        <div class="form-group">
                            <label class="form-label">@lang('Employee Number') <span class="text-danger fs-6">*</span></label>
                            <input type="text" name="employee_number" value="{{ old('employee_number') }}"
                                class="form-control" required>
                        </div>
                    </div>
                    <div class="mb-3 col-md-6 col-lg-6">
                        <div class="form-group">
                            <label class="form-label">@lang('Business Category') <span class="text-danger fs-6">*</span></label>
                            <select name="business_category_id" class="form-control" required>
                                <option value="">@lang('Select One')</option>
                                @foreach ($businesscategories as $businesscategory)
                                    <option value="{{ $businesscategory->id }}" @selected(old('business_category_id' == @$businesscategory->id))
                                        data-businesstypes="{{ $businesscategory->businesstypes }}">
                                        @if (app()->getLocale() == 'en')
                                            {{ $businesscategory->name }}
                                        @else
                                            {{ $businesscategory->name_ar }}
                                        @endif
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="mb-3 col-md-6 col-lg-6">
                        <div class="form-group">
                            <label class="form-label">@lang('Business Type') <span class="text-danger fs-6">*</span></label>
                            <select name="business_type_id" class="form-control" required>
                                <option value="">@lang('Select One')</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3 col-12 col-md-6 col-lg-6">
                        <div class="form-group">
                            <label class="form-label">@lang('Selling Price') <span class="text-danger fs-6">*</span></label>
                            <input type="text" name="selling_price" value="{{ old('selling_price') }}"
                                class="form-control" required>
                        </div>
                    </div>
                    <div class="mb-3 col-12 col-md-6 col-lg-6">
                        <div class="form-group">
                            <label class="form-label">@lang('Selling Price') (@lang('Arabic')) <span class="text-danger fs-6">*</span></label>
                            <input type="text" name="selling_price_ar" value="{{ old('selling_price_ar') }}"
                                class="form-control" required>
                        </div>
                    </div>
                    <div class="mb-3 col-12 col-md-6 col-lg-6">
                        <div class="form-group">
                            <label class="form-label">@lang('Address') <span class="text-danger fs-6">*</span></label>
                            <input type="text" name="address" value="{{ old('address') }}" class="form-control"
                                required>
                        </div>
                    </div>
                    <div class="mb-3 col-12 col-md-6 col-lg-6">
                        <div class="form-group">
                            <label class="form-label">@lang('Address') (@lang('Arabic')) <span class="text-danger fs-6">*</span></label>
                            <input type="text" name="address_ar" value="{{ old('address_ar') }}" class="form-control"
                                required>
                        </div>
                    </div>
                    <div class="mb-3 col-12 col-md-6 col-lg-6">
                        <div class="form-group">
                            <label class="form-label">@lang('Annual Income') <span class="text-danger fs-6">*</span></label>
                            <input type="text" name="annual_income" value="{{ old('annual_income') }}"
                                class="form-control" required>
                        </div>
                    </div>
                    <div class="mb-3 col-12 col-md-6 col-lg-6">
                        <div class="form-group">
                            <label class="form-label">@lang('Company Age') <span class="text-danger fs-6">*</span></label>
                            <input type="text" name="company_age" value="{{ old('company_age') }}"
                                class="form-control" required>
                        </div>
                    </div>
                    <div class="mb-3 col-12 col-md-12">
                        <div class="form-group">
                            <label class="form-label">@lang('Description') <span class="text-danger fs-6">*</span></label>
                            <textarea name="description" class="form-control nicEdit" rows="10" required>{{ old('description') }}</textarea>
                        </div>
                    </div>
                    <div class="mb-3 col-12 col-md-12">
                        <div class="form-group">
                            <label class="form-label">@lang('Description') (@lang('Arabic')) <span class="text-danger fs-6">*</span></label>
                            <textarea name="description_ar" class="form-control nicEdit" rows="10" required>{{ old('description_ar') }}</textarea>
                        </div>
                    </div>
                    <div class="mb-3 col-12 col-md-4">
                        <div class="form-group">
                            <label class="form-label">@lang('Image') <span class="text-danger fs-6">*</span></label>
                            <x-image-uploader class="w-100" name="image" type="business_image" />
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="mb-3 col-12 col-md-12">
                            <button type="submit" class="btn btn-primary float-end">@lang('Submit')</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('script-lib')
    <script src="{{ asset('assets/global/js/image-uploader.min.js') }}"></script>
@endpush

@push('style-lib')
    <link href="{{ asset('assets/global/css/image-uploader.min.css') }}" rel="stylesheet">
@endpush


@push('breadcrumb-plugins')
    <a href="{{ route('admin.businesspost.index') }}" class="btn btn-primary"><i class="bi bi-arrow-clockwise"></i>
        @lang('Back')</a>
@endpush

@push('script')
    <script>
        $("input[name=title]").on('keypress', function() {
            var title = $(this).val();
            var generateSlug = title.toLowerCase().replace(/ /g, '-').replace(/[^\w-]+/g, '');
            $("input[name=slug]").val(generateSlug);
        })

        $("input[name=title_ar]").on('keypress', function() {
            var title_ar = $(this).val();
            var generateSlug_ar = title_ar.toLowerCase().replace(/ /g, '-').replace(/[^\w-]+/g, '');
            $("input[name=slug_ar]").val(generateSlug_ar);
        })


        $('[name=business_category_id]').on('change', function() {
            var val = $(this).find('option:selected').val();
            var businesstype = $(this).find('option:selected').data('businesstypes');
            businesstypes(businesstype);
        }).change();


        function businesstypes(businesstypes) {
            var option = '<option value="">' + "@lang('Select one')" + '</option>';
            $.each(businesstypes, function(index, value) {
                var name = "{{ app()->getLocale() }}" == 'en' ? value.name : value.name_ar;
                option += "<option value='" + value.id + "'" + (value.id == "" ? " selected" : "") + ">" + name +
                    "</option>";
            });
            $('select[name=business_type_id]').html(option);
        }
    </script>
@endpush



@push('style')
    <style>
        .image-uploader {
            min-height: 278px !important;
        }
    </style>
@endpush

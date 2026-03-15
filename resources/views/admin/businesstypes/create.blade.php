@extends('admin.layouts.app', ['title' => @$title])
@section('panel')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.businesstype.store', @$businessType->id) }}" method="post"
                enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-8">
                        <div class="mb-3 form-group">
                            <label class="form-label">@lang('Business Category') <span class="text-danger fs-6">*</span></label>
                            <select name="business_category_id" id="business_category_id" class="form-select" required>
                                <option value="">@lang('Select One')</option>
                                @foreach ($businessCategories as $category)
                                    <option @selected(old('business_category_id', @$businessType->business_category_id == @$category->id)) value="{{ $category->id }}">
                                        {{ $category->lang('name') }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3 form-group">
                            <label class="form-label">@lang('Name') <span class="text-danger fs-6">*</span></label>
                            <input type="text" name="name" class="form-control" required
                                value="{{ old('name', @$businessType->name) }}">
                        </div>
                        <div class="mb-3 form-group">
                            <label class="form-label">@lang('Name Ar') <span class="text-danger fs-6">*</span></label>
                            <input type="text" name="name_ar" class="form-control" required
                                value="{{ old('name_ar', @$businessType->name_ar) }}">
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
    <a href="{{ route('admin.businesstype.index') }}" class="btn btn-primary"><i class="bi bi-arrow-clockwise"></i>
        @lang('Back')</a>
@endpush

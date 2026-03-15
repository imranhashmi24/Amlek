@extends('admin.layouts.app', ['title' => 'Busness Category'])
@section('panel')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.businesscategory.store', @$businessCategory->id) }}" method="post"
                enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-8">
                        <div class="mb-3 form-group">
                            <label class="form-label">@lang('Name') <span class="text-danger fs-6">*</span></label>
                            <input type="text" name="name" class="form-control" required
                                value="{{ old('name', @$businessCategory->name) }}">
                        </div>
                        <div class="mb-3 form-group">
                            <label class="form-label">@lang('Name (Arabic)') <span class="text-danger fs-6">*</span></label>
                            <input type="text" name="name_ar" class="form-control" required
                                value="{{ old('name_ar', @$businessCategory->name_ar) }}">
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
    <a href="{{ route('admin.businesscategory.index') }}" class="btn btn-primary"><i class="bi bi-arrow-clockwise"></i>
        @lang('Back')</a>
@endpush

@extends('admin.layouts.app', ['title' => @$title])
@section('panel')
    <div class="card">
        <div class="card-body">
            <form action="{{route('admin.sub.property.type.store',@$subpropertyType->id)}}" method="post"  enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-4 form-group">
                        <label class="form-label">@lang('Icon') <span class="text-danger fs-6">*</span></label>
                        <x-image-uploader image="{{@$subpropertyType->image}}" name="image" class="w-100" type="propertyType"/>
                    </div>
                    <div class="col-md-8">
                        <div class="mb-3 form-group">
                            <label class="form-label">@lang('Property Type') <span class="text-danger fs-6">*</span></label>
                            <select class="form-control" name="property_type_id" required>
                                <option value="" disabled>@lang('Select One')</option>
                                @foreach($property_types as $property_type)
                                    <option value="{{ $property_type->id }}" @selected(old('property_type_id',@$subpropertyType->property_type_id == @$property_type->id))>
                                        @if (app()->getLocale() == 'en')
                                        {{ $property_type->name }}
                                        @else
                                        {{ $property_type->name_ar }}
                                        @endif
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3 form-group">
                            <label class="form-label">@lang('Name') <span class="text-danger fs-6">*</span></label>
                            <input type="text" name="name" class="form-control" value="{{ old('name',@$subpropertyType->name) }}" required>
                        </div>

                        <div class="mb-3 form-group">
                            <label class="form-label">@lang('Name Ar') <span class="text-danger fs-6">*</span></label>
                            <input type="text" name="name_ar" class="form-control" value="{{ old('name_ar',@$subpropertyType->name_ar) }}" required>
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
    <a href="{{ route('admin.sub.property.type.index') }}" class="btn btn-primary"><i class="bi bi-arrow-clockwise"></i>
        @lang('Back')</a>
@endpush

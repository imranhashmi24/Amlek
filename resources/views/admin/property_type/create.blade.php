@extends('admin.layouts.app', ['title' => @$title])
@section('panel')
    <div class="card">
        <div class="card-body">
            <form action="{{route('admin.property.type.store',@$propertyType->id)}}" method="post"  enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-4 form-group">
                        <label class="form-label">@lang('Icon') <span class="text-danger fs-6">*</span></label>
                        <x-image-uploader image="{{@$propertyType->icon}}" name="icon" class="w-100" type="propertyType"/>
                    </div>
                    <div class="col-md-8">
                        {{-- <div class="mb-3 form-group">
                            <label class="form-label">City</label>
                            <select class="form-control" name="city_id">
                                <option value="" disabled>Select One</option>
                                @foreach($cities as $city)
                                    <option value="{{ $city->id }}" @selected(old('city_id',@$propertyType->city_id == @$city->id))>{{ $city->name }}</option>
                                @endforeach
                            </select>
                        </div> --}}
                        <div class="mb-3 form-group">
                            <label class="form-label">@lang('Name') <span class="text-danger fs-6">*</span></label>
                            <input type="text" name="name" class="form-control" value="{{ old('name',@$propertyType->name) }}" required>
                        </div>

                        <div class="mb-3 form-group">
                            <label class="form-label">@lang('Name Ar') <span class="text-danger fs-6">*</span></label>
                            <input type="text" name="name_ar" class="form-control" value="{{ old('name_ar',@$propertyType->name_ar) }}" required>
                        </div>

                        <div class="mb-3 form-group">
                            <label class="form-label">@lang('Description') <span class="text-danger fs-6">*</span></label>
                            <textarea name="description" class="form-control" id="" cols="30" rows="10" required>{{ old('description',@$propertyType->description) }}</textarea>
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
    <a href="{{ route('admin.property.type.index') }}" class="btn btn-primary"><i class="bi bi-arrow-clockwise"></i>
        @lang('Back')</a>
@endpush

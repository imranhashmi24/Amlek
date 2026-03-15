@extends('admin.layouts.app', ['title' => 'Property Request Details'])
@section('panel')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="border shadow-none card">
                                <div class="p-0 card-body">
                                    <div class="card-list">
                                        <span>@lang('Request Name')</span>
                                        <b>{{ $propertyRequest->name }}</b>
                                    </div>

                                    <div class="card-list">
                                        <span>@lang('Country')</span>
                                        <b>{{ @$propertyRequest->country->name }}</b>
                                    </div>
                                    <div class="card-list">
                                        <span>@lang('City')</span>
                                        <b>{{ @$propertyRequest->city->name }}</b>
                                    </div>
                                     <div class="card-list">
                                        <span>@lang('Email')</span>
                                        <b>{{ @$propertyRequest->email }}</b>
                                    </div>
                                     <div class="card-list">
                                        <span>@lang('Mobile Number')</span>
                                        <b>{{ @$propertyRequest->mobile }}</b>
                                    </div>

                                    <div class="card-list">
                                        <span>@lang('Property Type')</span>
                                        <b>{{ $propertyRequest->propertyType->name }}</b>
                                    </div>

                                    <div class="card-list">
                                        <span>@lang('Sub Property Type')</span>
                                        <b>{{ @$propertyRequest->subPropertyType->name }}</b>
                                    </div>

                                    <div class="card-list">
                                        <span>@lang('Nature Of Property')</span>
                                        <b>{{ $propertyRequest->nature_of_property }}</b>
                                    </div>
                                     <div class="card-list">
                                        <span>@lang('Budget')</span>
                                        <b>{{ $propertyRequest->budget }}</b>
                                    </div>
                                    <div class="card-list">
                                        <span>@lang('Purpose')</span>
                                        <b>{{ $propertyRequest->purpose }}</b>
                                    </div>

                                    <div class="card-list">
                                        <span>@lang('Area')</span>
                                        <b>{{ $propertyRequest->area }}</b>
                                    </div>

                                    <div class="card-list">
                                        <span>@lang('Detail')</span>
                                        <b>{{ $propertyRequest->detail }}</b>
                                    </div>
                                    <div class="card-list">
                                        <span>@lang('Status')</span>
                                        <b> @php echo  $propertyRequest->statusBadge @endphp</b>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div>
                                        <h6 class="pb-2">@lang('Thumb Image') :</h6>
                                        <div class="property-image">
                                            <a
                                                href="{{ getImage(getFilePath('property_thumb') . '/' . $propertyRequest->thumb_image, getFileSize('property_thumb')) }}">
                                                <img src="{{ getImage(getFilePath('property_thumb') . '/' . $propertyRequest->thumb_image, getFileSize('property_thumb')) }}"
                                                    alt="@lang('Image')">
                                            </a>
                                        </div>
                                    </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>

    <x-confirmation-modal />
@endsection

@push('breadcrumb-plugins')
    <div class="flex-wrap gap-2 d-flex">
        <a href="{{ route('admin.property.request.index') }}" class="btn btn-primary"><i
                class="bi bi-arrow-clockwise pe-1"></i>@lang('Back')</a>

        <a href="{{ route('admin.property.request.status', [$propertyRequest->id, Status::REVIEW]) }}" class="btn btn-success"><i
                class="bi bi-check2 pe-1"></i>@lang('Approved')</a>
        <a href="{{ route('admin.property.request.status', [$propertyRequest->id, Status::REJECT]) }}" class="btn btn-danger"><i
                class="bi bi-x pe-1"></i>@lang('Rejected')</a>

    </div>
@endpush

@push('style')
    <style>
        .card-body .card-list {
            display: flex;
            padding: 8px;
            flex-wrap: nowrap;
            border-bottom: 1px solid #cccccc;
            justify-content: space-between;

        }

        .card-body .card-list:last-child {
            border-bottom: none;
        }

        .property-image {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
        }

        .property-image>a {
            width: 170px;
            display: flex;
            border: 1px solid #cccccc;
            border-radius: 5px;
            overflow: hidden;
        }

        .property-image img {
            width: 100%;
        }
    </style>
@endpush

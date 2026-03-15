@extends('admin.layouts.app', ['title' => 'Proprty Details'])
@section('panel')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <div class="border shadow-none card">
                                <div class="p-0 card-body">
                                    @if ($property->user)
                                        <div class="card-list">
                                            <span>@lang('Creator User')</span>
                                            <b><a
                                                    href="{{ route('admin.users.detail', @$property->user->id) }}">{{ @$property->user->name }}</a></b>
                                        </div>
                                    @endif
                                    <div class="card-list">
                                        <span>@lang('Title')</span>
                                        <b>{{ $property->title }}</b>
                                    </div>
                                    <div class="card-list">
                                        <span>@lang('Title ar')</span>
                                        <b>{{ $property->title_ar }}</b>
                                    </div>
                                    <div class="card-list">
                                        <span>@lang('Property Type')</span>
                                        <b>{{ @$property->propertyType->name }}</b>
                                    </div>
                                    <div class="card-list">
                                        <span>@lang('Sub Property Type')</span>
                                        <b>
                                            {{ @$property->subPropertyType->name }}
                                        </b>
                                    </div>
                                    <div class="card-list">
                                        <span>@lang('Construction Type')</span>
                                        <b>{{ $property->construction_type }}</b>
                                    </div>
                                    <div class="card-list">
                                        <span>@lang('Type')</span>
                                        <b>{{ $property->purpose }}</b>
                                    </div>
                                    <div class="card-list">
                                        <span>@lang('Price')</span>
                                        <b>{{ $property->price }} {{ gs('cur_sym') }}</b>
                                    </div>
                                    <div class="card-list">
                                        <span>@lang('Sqr Price')</span>
                                        <b>{{ $property->sqr_price }} {{ gs('cur_sym') }}</b>
                                    </div>
                                    <div class="card-list">
                                        <span>@lang('Reference no')</span>
                                        <b>{{ $property->reference_no }}</b>
                                    </div>

                                    <div class="card-list">
                                        <span>@lang('Features')</span>
                                        <b>{{ $property->features }}</b>
                                    </div>
                                    <div class="card-list">
                                        <span>@lang('Status')</span>
                                        <b> @php echo  $property->statusBadge @endphp</b>
                                    </div>

                                    <div  class="card-list">
                                        <h6>@lang('Detail')</h6>
                                    </div>
                                    @foreach ($property->details as $detail)
                                    <div class="card-list">
                                        <span>@lang(keyToTitle($detail->field))</span>
                                        <b>{{ $detail->val }}</b>
                                    </div>
                                    @endforeach

                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="border shadow-none card">
                            <div class="card-header">
                                    <h5>@lang('Images')</h5>
                                </div>
                                <div class="card-body">
                                    <div>
                                        <h6 class="pb-2">@lang('Thumb Image') :</h6>
                                        <div class="property-image">
                                            <a
                                                href="{{ getImage(getFilePath('property_thumb') . '/' . $property->thumb_image, getFileSize('property_thumb')) }}">
                                                <img src="{{ getImage(getFilePath('property_thumb') . '/' . $property->thumb_image, getFileSize('property_thumb')) }}"
                                                    alt="@lang('Image')">
                                            </a>
                                        </div>
                                    </div>

                                    <div class="mt-4">
                                        <h6 class="pb-2">@lang('Images') :</h6>
                                        <div class="property-image">
                                            @foreach ($propertyImages as $image)
                                                <a
                                                    href="{{ getImage(getFilePath('property') . '/' . $image->image, getFileSize('property')) }}">
                                                    <img src="{{ getImage(getFilePath('property') . '/' . $image->image, getFileSize('property')) }}"
                                                        alt="@lang('Image')">
                                                </a>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="mt-4 border shadow-none card">
                                <div class="card-header">
                                    <h5>@lang('Locations')</h5>
                                </div>
                                <div class="card-body">
                                    <div class="card-list">
                                        <span>@lang('Country')</span>
                                        <b>
                                            @if (app()->getLocale() == 'en')
                                                {{ optional($property->country)->name }}
                                            @else
                                                {{ optional($property->country)->name_ar }}
                                            @endif

                                        </b>
                                    </div>
                                    <div class="card-list">
                                        <span>@lang('City')</span>
                                        <b>
                                            @if (app()->getLocale() == 'en')
                                                {{ optional($property->city)->name }}
                                            @else
                                                {{ optional($property->city)->name_ar }}
                                            @endif
                                        </b>
                                    </div>
                                    <div>
                                        @include('web.component.map')
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="border shadow-none card">
                                <div class="card-header">
                                    <h6>@lang('Description')</h6>
                                </div>
                                <div class="card-body">
                                    @php echo $property->description @endphp
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="border shadow-none card">
                                <div class="card-header">
                                    <h6>@lang('Description') @lang('Arabic')</h6>
                                </div>
                                <div class="card-body">
                                    @php echo $property->description_ar @endphp
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
        <a href="{{ route('admin.properties.index') }}" class="btn btn-primary"><i
                class="bi bi-arrow-clockwise pe-1"></i>@lang('Back')</a>

        <a href="{{ route('admin.properties.status', [$property->id, Status::REVIEW]) }}" class="btn btn-warning"><i
                class="bi bi-eye pe-1"></i>@lang('Review')</a>
        <a href="{{ route('admin.properties.status', [$property->id, Status::PUBLISHED]) }}" class="btn btn-success"><i
                class="bi bi-check2 pe-1"></i>@lang('Published')</a>
        <a href="{{ route('admin.properties.status', [$property->id, Status::REJECT]) }}" class="btn btn-danger"><i
                class="bi bi-x pe-1"></i>@lang('Rejected')</a>

    </div>
@endpush


@push('style-lib')
    <link rel="stylesheet" href="{{ asset('assets/global/css/magnific-popup.css') }}">
@endpush

@push('script-lib')
    <script src="{{ asset('assets/global/js/magnific-popup.js') }}"></script>
@endpush


@push('script')
    <script>
        $('.property-image').each(function() { // the containers for all your galleries
            $(this).magnificPopup({
                delegate: 'a', // the selector for gallery item
                type: 'image',
                gallery: {
                    enabled: true
                }
            });
        });
    </script>
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

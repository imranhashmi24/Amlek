@extends('web.layouts.master', ['title' => 'Proprty Details'])
@section('content')
    <div class="card custom-card">
        <div class="card-body">
            <div class="row">
                <div class="col-12 col-xl-6">
                    <div class="border shadow-none card">
                        <div class="p-0 card-body">
                            <div class="card-list">
                                <span>@lang('Title')</span>
                                <b>{{ $property->lang('title') }}</b>
                            </div>
                            <div class="card-list">
                                <span>@lang('Title ar')</span>
                                <b>{{ $property->title_ar }}</b>
                            </div>
                            <div class="card-list">
                                <span>@lang('Property Type')</span>
                                <b>{{ @$property->propertyType->lang('name') }}</b>
                            </div>
                            <div class="card-list">
                                <span>@lang('Sub Property Type')</span>
                                <b>{{ @$property->subPropertyType->lang('name') }}</b>
                            </div>
                            <div class="card-list">
                                <span>@lang('Construction Type')</span>
                                <b>{{ __($property->construction_type) }}</b>
                            </div>
                            <div class="card-list">
                                <span>@lang('Type')</span>
                                <b>{{ __($property->purpose) }}</b>
                            </div>
                            
                            <div class="card-list">
                                <span>@lang('FAL Number')</span>
                                <b>{{ __($property->fal) }}</b>
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
                                <span>@lang('Ad license number')</span>
                                <b>{{ $property->ad_license_number }}</b>
                            </div>
                            <div class="card-list">
                                <span>@lang('Status')</span>
                                <b> @php echo  $property->statusBadge @endphp</b>
                            </div>
                            <div class="card-list">
                                <h6>@lang('Detail')</h6>
                            </div>
                            @foreach ($property->details as $detail)
                            <div class="card-list">
                                <span>@lang(keyToTitle($detail->field))</span>
                                <b>{{ __($detail->val) }}</b>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="mt-4 col-12 col-xl-6 mt-xl-0">
                    <div class="border shadow-none card">
                        <div class="card-header">
                            <h5>@lang('Images')</h5>
                        </div>
                        <div class="card-body">

                            <div>
                                <h6 class="pb-2"> @lang('Thumbnail Image') :</h6>
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
                                <b>{{ optional($property->country)->lang('name') }}</b>
                            </div>
                            <div class="card-list">
                                <span>@lang('City')</span>
                                <b>{{ optional($property->city)->lang('name') }}</b>
                            </div>
                            <div>
                                @include('web.component.map')
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-4 row">
                <div class="col-12 col-xl-6">
                    <div class="border shadow-none card">
                        <div class="card-header">
                            <h6>@lang('Description')</h6>
                        </div>
                        <div class="card-body">
                            @php echo $property->description @endphp
                        </div>
                    </div>
                </div>
                <div class="mt-4 col-12 col-xl-6 mt-xl-0">
                    <div class="border shadow-none card">
                        <div class="card-header">
                            <h6>@lang('Description') (@lang('Arabic'))</h6>
                        </div>
                        <div class="card-body">
                            @php echo $property->description_ar @endphp
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <x-confirmation-modal />
@endsection

@push('breadcrumb-plugins')
    <div class="flex-wrap gap-3 d-flex">
        <a href="{{ route('admin.properties.index') }}" class="btn btn-primary"><i
                class="bi bi-arrow-clockwise"></i>@lang('Back')</a>
    </div>
@endpush


@push('style-lib')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.css"
        integrity="sha512-WEQNv9d3+sqyHjrqUZobDhFARZDko2wpWdfcpv44lsypsSuMO0kHGd3MQ8rrsBn/Qa39VojphdU6CMkpJUmDVw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
@endpush


@push('script-lib')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.js"
        integrity="sha512-C1zvdb9R55RAkl6xCLTPt+Wmcz6s+ccOvcr6G57lbm8M2fbgn2SUjUJbQ13fEyjuLViwe97uJvwa1EUf4F1Akw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
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


@push('title')
    <h5>@lang('Proprty Details')</h5>
@endpush

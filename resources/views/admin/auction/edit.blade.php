@extends('admin.layouts.app', ['title' => 'Edit Auction'])
@section('panel')
<form action="{{ route('admin.auction.update', @$auction->id) }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="mb-3 col-12 col-md-6 col-lg-6">
                    <div class="form-group">
                        <label class="form-label">@lang('Auction Title') <span class="text-danger fs-6">*</span></label>
                        <input type="text" name="title" value="{{ old('title', @$auction->title) }}" class="form-control" required>
                    </div>
                </div>
                <div class="mb-3 col-12 col-md-6 col-lg-6">
                    <div class="form-group">
                        <label class="form-label">@lang('Auction Title') (@lang('Arabic')) <span class="text-danger fs-6">*</span></label>
                        <input type="text" name="title_ar" value="{{ old('title_ar', @$auction->title_ar) }}" class="form-control" required>
                    </div>
                </div>
                <div class="mb-3 col-12 col-md-6 col-lg-6">
                    <div class="form-group">
                        <label class="form-label">@lang('Auction Slug') <span class="text-danger fs-6">*</span></label>
                        <input type="text" name="slug" value="{{ old('slug', @$auction->slug) }}" class="form-control" required>
                    </div>
                </div>
                <div class="mb-3 col-12 col-md-6 col-lg-6">
                    <div class="form-group">
                        <label class="form-label">@lang('Auction day') <span class="text-danger fs-6">*</span></label>
                        <div class="input-group">
                            <input type="number" name="auction_day" value="{{ old('auction_day', @$auction->auction_day) }}" required class="form-control">
                        </div>
                    </div>
                </div>
                <div class="mb-3 col-12 col-md-6 col-lg-6">
                    <div class="form-group">
                        <label class="form-label">@lang('Auction Date') <span class="text-danger fs-6">*</span></label>
                        <div class="input-group">
                            <input type="date" name="auction_date" value="{{ old('auction_date', @$auction->auction_date) }}" required class="form-control">
                        </div>
                    </div>
                </div>
                <div class="mb-3 col-12 col-md-6 col-lg-6">
                    <div class="form-group">
                        <label class="form-label">@lang('Beginning Time') <span class="text-danger fs-6">*</span></label>
                        <div class="input-group">
                            <input type="datetime-local" name="beginning_time" value="{{ old('beginning_time', @$auction->beginning_time) }}" class="form-control">
                        </div>
                    </div>
                </div>

                <div class="mb-3 col-12 col-md-12 col-lg-12">
                    <div class="form-group">
                        <label class="form-label">@lang('Properties') <span class="text-danger fs-6">*</span></label>
                        <div class="input-group">
                            <select class="form-control select2-multiple" name="property_ids[]" multiple>
                                <option value="0">@lang('Select multiple property')</option>

                                @foreach ($properties as $property)
                                    @php
                                        $selected = false;
                                        foreach ($auction_properties as $auction_property) {
                                            if ($property->id == $auction_property['property_id']) {
                                                $selected = true;
                                                break;
                                            }
                                        }
                                    @endphp
                                    <option value="{{ $property->id }}" {{ $selected ? 'selected' : '' }}>
                                        @if(app()->getLocale() == 'en')
                                            {{ $property->title }}
                                        @else
                                            {{ $property->title_ar }}
                                        @endif
                                    </option>
                                @endforeach

                            </select>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>

    <div class="my-3 product-card">
        <div class="product-card-header">
            <h6 class="m-0 text-light">@lang('Location Information')</h6>
        </div>
        <div class="product-card-body">
            <div class="row">
                <div class="mb-3 col-12 col-md-6 col-lg-6">
                    <div class="form-group">
                        <label class="form-label">@lang('Country') <span class="text-danger fs-6">*</span></label>
                        <select name="country_id" class="form-control" required>
                            <option value="">@lang('Select One')</option>
                            @foreach ($countries as $country)
                            <option  value="{{ $country->id }}" data-cities="{{ $country->city }}"  @selected(old('country_id', @$auction->country_id == @$country->id))>
                                @if(app()->getLocale() == 'en')
                                {{ $country->name }}
                                @else
                                {{ $country->name_ar }}
                                @endif
                            </option>
                            @endforeach
                        </select>
                    </div>

                </div>
                <div class="mb-3 col-12 col-md-6 col-lg-6">
                    <div class="form-group">
                        <label class="form-label">@lang('City') <span class="text-danger fs-6">*</span></label>
                        <select name="city_id" class="form-control">
                            <option value="">@lang('Select One')</option>
                            <option value="{{ @$auction->city_id }}" data-lat="{{ @$auction->latitude }}"
                                data-lng="{{ @$auction->longitude }}" selected>
                                {{ !empty($auction->city->name) }}</option>
                        </select>
                    </div>
                </div>


                <div class="mb-3 col-12 col-md-12 col-lg-12">
                    <div id="address-map-container" style="width:100%;height:400px; margin-top:10px">
                        <div style="width: 100%; height: 100%" id="address-map"></div>
                    </div>
                </div>

                <div class="mb-3 col-12 col-md-12 col-lg-12">
                    <div class="form-group">
                        <label for="address_address">@lang('Location')</label>
                        <input type="text" id="address-input" name="address" class="form-control map-input" value="{{ @$auction->address }}">
                        <input type="hidden" name="latitude" id="address-latitude" value="{{ @$auction->latitude }}" />
                        <input type="hidden" name="longitude" id="address-longitude" value="{{ @$auction->longitude }}"  />
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="my-3 product-card">
        <div class="product-card-header">
            <h6 class="m-0 text-light">@lang('Images')</h6>
        </div>
        <div class="product-card-body">
            <div class="row">
                <div class="mb-3 col-12 col-md-4">
                    <div class="form-group">
                        <label class="form-label">@lang('Thumb Image') <span class="text-danger fs-6">*</span></label>
                        <x-image-uploader image="{{@$auction->thumb_image  }}" class="w-100" name="thumb_image" type="auction_thumb" />
                    </div>
                </div>
                <div class="mb-3 col-12 col-md-8">
                    <div class="form-group">
                        <label class="form-label">@lang('Images')</label>
                        <div>
                            <div class="input-images"></div>
                        </div>
                        <div class="mt-3">
                            <small class="mt-3 text-muted"> @lang('Supported Files'):
                                @lang('Supported Files'): <b>.@lang('png'), .@lang('jpg'), .@lang('jpeg')</b> @lang('Image will be resized into')
                                <b>{{ getFileSize('auction') }}</b> @lang('px')
                            </small>
                        </div>
                    </div>
                </div>

                <div class="mb-3 col-12 col-md-12">
                    <div class="form-group">
                        <label class="form-label">@lang('Documents') (@lang('Support only pdf'))</label>
                        <input type="file" name="document" class="form-control" accept=".pdf">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="mb-3 col-12 col-md-12">
            <div class="form-group">
                <label class="form-label">@lang('Description') <span class="text-danger fs-6">*</span></label>
                <textarea name="description" class="form-control nicEdit" rows="10">{{ old('description', @$auction->description) }}</textarea>
            </div>
        </div>
        <div class="mb-3 col-12 col-md-12">
            <div class="form-group">
                <label class="form-label">@lang('Description') (@lang('Arabic')) <span class="text-danger fs-6">*</span></label>
                <textarea name="description_ar" class="form-control nicEdit" rows="10">{{ old('description_ar', @$auction->description_ar) }}</textarea>
            </div>
        </div>

        <div class="mb-3 col-12 col-md-12 col-lg-12">
            <div class="form-group">
                <label class="form-label">@lang('Status') <span class="text-danger fs-6">*</span></label>
                <select name="status" class="form-control" required>
                    <option value="">@lang('Select One')</option>
                    <option {{ @$auction->status == 0 ? 'selected' : '' }} value="0">@lang('Pending')</option>
                    <option {{ @$auction->status == 1 ? 'selected' : '' }} value="1">@lang('Current')</option>
                    <option {{ @$auction->status == 2 ? 'selected' : '' }} value="2">@lang('Upcoming')</option>
                    <option {{ @$auction->status == 3 ? 'selected' : '' }} value="2">@lang('Finished')</option>
                </select>
            </div>
        </div>
        <div class="col-12">
            <div class="mb-3 col-12 col-md-12">
                <button type="submit" class="btn btn-primary w-100">@lang('Submit')</button>
            </div>
        </div>
    </div>
</form>
@endsection

@push('script-lib')
<script src="{{ asset('assets/global/js/image-uploader.min.js') }}"></script>
@endpush

@push('style-lib')
<link href="{{ asset('assets/global/css/image-uploader.min.css') }}" rel="stylesheet">
@endpush


@push('breadcrumb-plugins')
<a href="{{ route('admin.auction.index') }}" class="btn btn-primary"><i class="bi bi-arrow-clockwise"></i>
    @lang('Back')</a>
@endpush

@push('script')

<script>


    $('[name=country_id]').on('change', function() {
        var cities = $(this).find('option:selected').data('cities');

        var option = '<option value="">@lang('Select one')</option>';
        $.each(cities, function(index, value) {

            var name = "{{ app()->getLocale() }}" == 'en' ? value.name : value.name_ar;

            option += "<option value='" + value.id + "' " + (value.id == "{{ $auction->city_id }}" ? "selected" : "") + "data-lat='" + value.lat + "' data-lng='" + value.lng + "'>" +
                name + "</option>";
        });

        $('select[name=city_id]').html(option);
    }).change();


    $("input[name=title]").on('	keypress', function() {
        var title = $(this).val();
        var generateSlug = title.toLowerCase().replace(/ /g, '-').replace(/[^\w-]+/g, '');
        $("input[name=slug]").val(generateSlug);
    })


    // image uploder
    @if(isset($images))
    let preloaded = @json($images);
    @else
    let preloaded = [];
    @endif

    $('.input-images').imageUploader({
        preloaded: preloaded
        , imagesInputName: 'images'
        , preloadedInputName: 'old'
        , maxSize: 3 * 1024 * 1024
        , maxFiles: 10
    , });


    $('[name=city_id]').on('change', function() {
        var lat = $(this).find('option:selected').data('lat');
        var lng = $(this).find('option:selected').data('lng');

        if (lat != undefined && lng != undefined) {
            $("#address-latitude").val(lat);
            $("#address-longitude").val(lng);

            initialize();
        }

    }).change();

</script>
@endpush


@push('script-lib')
<script src="{{ asset('assets/global/js/map.js') }}"></script>
<script src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAPS_API_KEY') }}&libraries=places&callback=initialize" async defer>
</script>
@endpush


@push('style')
<style>
    .product-card {
        border: 1px solid #1a2232;
        border-radius: 5px;
    }

    .product-card-body {
        padding: 15px;
    }

    .product-card-header {
        background: #1a2232;
        padding: 10px;
    }

    .image-uploader {
        min-height: 278px !important;
    }

</style>
@endpush


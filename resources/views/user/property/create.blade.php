@extends('web.layouts.master', ['title' => 'Create Property'])
@section('content')
<div class="card custom-card">
    <div class="card-body">
        <form action="{{ route('user.properties.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="mb-3 col-12 col-md-6 col-lg-4">
                    <div class="form-group">
                        <label class="form-label">@lang('Property Title') <span class="text-danger fs-6">*</span></label>
                        <input type="text" name="title" value="{{ old('title') }}" class="form-control" required>
                    </div>
                </div>
                <div class="mb-3 col-12 col-md-6 col-lg-4">
                    <div class="form-group">
                        <label class="form-label">@lang('Property Title') (@lang('Arabic')) <span class="text-danger fs-6">*</span></label>
                        <input type="text" name="title_ar" value="{{ old('title_ar') }}" required
                            class="form-control">
                    </div>
                </div>
                
                <div class="mb-3 col-12 col-md-6 col-lg-4">
                    <div class="form-group">
                        <label class="form-label">@lang('Property Slug') <span class="text-danger fs-6">*</span></label>
                        <input type="text" name="slug" value="{{ old('slug') }}" class="form-control" required>
                    </div>
                </div>

                <div class="mb-3 col-12 col-md-4 col-lg-4">
                    <div class="form-group">
                        <label class="form-label">@lang('Construction Type') <span class="text-danger fs-6">*</span></label>
                        <select name="construction_type" class="form-select" required>
                            <option value="">@lang('Select One')</option>
                            <option value="Under Construction" @selected(old('construction_type') == 'Under Construction')>@lang('Under Construction')
                            </option>
                            <option value="Ready" @selected(old('construction_type') == 'Ready')>@lang('Ready')</option>
                        </select>
                    </div>
                </div>
                <div class="mb-3 col-12 col-md-4 col-lg-4">
                    <div class="form-group">
                        <label class="form-label">@lang('Purpose') <span class="text-danger fs-6">*</span></label>
                        <select name="purpose" class="form-select" required>
                            <option value="">@lang('Select One')</option>
                            <option value="Purchase" @selected(old('purpose') == 'Purchase')>@lang('Purchase')</option>
                            <option value="Sale" @selected(old('purpose') == 'Sale')>@lang('Sale')</option>
                            <option value="Kissing" @selected(old('purpose') == 'Kissing')>@lang('Kissing')</option>
                            <option value="Exit" @selected(old('purpose') == 'Exit')>@lang('Exit')</option>
                            <option value="Faltering" @selected(old('purpose') == 'Faltering')>@lang('Faltering')</option>
                            <option value="Selling" @selected(old('purpose') == 'Selling')>@lang('Selling')</option>
                            <option value="Buying" @selected(old('purpose') == 'Buying')>@lang('Buying')</option>
                            <option value="Establishing" @selected(old('purpose') == 'Establishing')>@lang('Establishing')</option>
                        </select>
                    </div>
                </div>
                
                <div class="mb-3 col-12 col-md-4 col-lg-4">
                    <div class="form-group">
                        <label class="form-label">@lang('FAL Number')</label>
                        <input type="text" name="fal" value="{{ old('fal') }}" class="form-control">
                    </div>
                </div>

                <div class="mb-3 col-12 col-md-6 col-lg-6">
                    <div class="form-group">
                        <label class="form-label">@lang('Property Type') <span class="text-danger fs-6">*</span></label>
                        <select name="property_type_id" class="form-select" required>
                            <option value="">@lang('Select One')</option>
                            @foreach ($propertyTypes as $type)
                                <option value="{{ $type->id }}" @selected(old('property_type_id' == @$type->id)) data-subpropertytypes="{{ $type->subproperty_types }}">
                                    {{ $type->lang('name') }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="mb-3 col-md-6 col-lg-6">
                    <div class="form-group">
                        <label class="form-label">@lang('Sub Property Type')</label>
                        <select name="subproperty_type_id" class="form-select">
                            <option value="">@lang('Select One')</option>

                        </select>
                    </div>
                </div>
            </div>

            <div class="my-3 product-card">
                <div class="product-card-header">
                    <h6 class="m-0 text-light"><span>@lang('Detail')</span></h6>
                </div>
                <div class="product-card-body type-info-content">
                </div>
            </div>

            <div class="product-card">
                <div class="product-card-header">
                    <h6 class="m-0 text-light">@lang('Price Information')</h6>
                </div>
                <div class="product-card-body">
                    <div class="row">
                        <div class="mb-3 col-12 col-md-6 col-lg-4">
                            <div class="form-group">
                                <label class="form-label">@lang('Price') <span class="text-danger fs-6">*</span></label>
                                <div class="input-group">
                                    <input type="number" step="any" name="price"
                                        value="{{ old('price') }}" class="form-control" required>
                                    <span class="input-group-text">{{ gs('cur_sym') }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3 col-12 col-md-6 col-lg-4">
                            <div class="form-group">
                                <label class="form-label">@lang('Per Square Meter Price') <span class="text-danger fs-6">*</span></label>
                                <div class="input-group">
                                    <input type="text" name="sqr_price" value="{{ old('sqr_price') }}"
                                        class="form-control" required>
                                    <span class="input-group-text">{{ gs('cur_sym') }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3 col-12 col-md-6 col-lg-4">
                            <div class="form-group">
                                <label class="form-label">@lang('Ref no.')</label>
                                <input type="text" name="reference_no" value="{{ old('reference_no') }}"
                                    class="form-control">
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
                                <select name="country_id" class="form-select" required>
                                    <option value="">@lang('Select One')</option>
                                    @foreach ($countries as $country)
                                        <option value="{{ $country->id }}"
                                            data-cities="{{ $country->city }}"
                                            @selected(old('country_id' == @$country->id))>
                                            {{ $country->lang('name') }}</option>
                                    @endforeach
                                </select>
                            </div>

                        </div>
                        <div class="mb-3 col-12 col-md-6 col-lg-6">
                            <div class="form-group">
                                <label class="form-label">@lang('City') <span class="text-danger fs-6">*</span></label>
                                <select name="city_id" class="form-control" required>

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
                                <label for="address_address">@lang('Location & Nearby') (@lang('PB Value'))</label>
                                <input type="text" id="address-input" name="address" class="form-control map-input">
                                <input type="hidden" name="latitude" id="address-latitude" value="0" />
                                <input type="hidden" name="longitude" id="address-longitude" value="0" />
                            </div>

                        </div>


                        <div class="mb-3 col-12 col-md-6">
                            <div class="form-group">
                                <label class="form-label">@lang('Features and Amenities')  </label>
                                <textarea name="features" class="form-control tinymceeditor" rows="2">{{ old('features') }}</textarea>
                            </div>
                        </div>
                        <div class="mb-3 col-12 col-md-6">
                            <div class="form-group">
                                <label class="form-label">@lang('Features and Amenities') (@lang('Arabic'))  </label>
                                <textarea name="features_ar" class="form-control tinymceeditor" rows="2">{{ old('features_ar') }}</textarea>
                            </div>
                        </div>
                        <div class="mb-3 col-12 col-md-6">
                            <div class="form-group">
                                <label class="form-label">@lang('Fixtures and Fittings') </label>
                                <textarea name="fixtures" class="form-control tinymceeditor" rows="2">{{ old('fixtures') }}</textarea>
                            </div>
                        </div>
                        <div class="mb-3 col-12 col-md-6">
                            <div class="form-group">
                                <label class="form-label">@lang('Fixtures and Fittings') (@lang('Arabic'))</label>
                                <textarea name="fixtures_ar" class="form-control tinymceeditor" rows="2">{{ old('fixtures_ar') }}</textarea>
                            </div>
                        </div>

                        <div class="mb-3 col-12 col-md-6 col-lg-6">
                            <div class="form-group">
                                <label class="form-label">@lang('Street')</label>
                                <input type="text" name="street"
                                    value="{{ old('street', @$property->street) }}" class="form-control">
                            </div>
                        </div>
                        <div class="mb-3 col-12 col-md-6 col-lg-6">
                            <div class="form-group">
                                <label class="form-label">@lang('Width')</label>
                                <input type="text" name="street_width" value="{{ old('street_width') }}"
                                    class="form-control">
                            </div>
                        </div>
                        <div class="mb-3 col-12 col-md-6 col-lg-6">
                            <div class="form-group">
                                <label class="form-label">@lang('Facing')</label>
                                <input type="text" name="facing" value="{{ old('facing') }}"
                                    class="form-control">
                            </div>
                        </div>
                        <div class="mb-3 col-12 col-md-6 col-lg-6">
                            <div class="form-group">
                                <label class="form-label">@lang('Ad license number')</label>
                                <input type="text" name="ad_license_number" value="{{ old('ad_license_number') }}"
                                    class="form-control">
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
                                <label class="form-label">@lang('Thumbnail Image') <span class="text-danger fs-6">*</span></label>
                                <x-image-uploader class="w-100" name="thumb_image" type="property_thumb" />
                            </div>
                        </div>
                        <div class="mb-3 col-12 col-md-8">
                            <div class="form-group">
                                <label class="form-label">@lang('Images')</label>
                                <div>
                                    <div class="input-images"></div>
                                </div>
                                <div class="mt-3">
                                    <small class="mt-3 text-muted"> @lang('Supported Files:')
                                        @lang('Supported Files:') <b>.png, .jpg, .jpeg</b> @lang('Image will be resized into')
                                        <b>{{ getFileSize('property') }}</b> @lang('px')
                                    </small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="mb-3 col-12 col-md-12">
                    <div class="form-group">
                        <label class="form-label">@lang('Property Description') <span class="text-danger fs-6">*</span></label>
                        <textarea name="description" class="form-control nicEdit" rows="10" required>{{ old('description') }}</textarea>
                    </div>
                </div>
                <div class="mb-3 col-12 col-md-12">
                    <div class="form-group">
                        <label class="form-label">@lang('Property Description') (@lang('Arabic')) <span class="text-danger fs-6">*</span></label>
                        <textarea name="description_ar" class="form-control nicEdit" rows="10" required>{{ old('description_ar') }}</textarea>
                    </div>
                </div>
                <div class="col-12">
                    <div class="mb-3 col-12 col-md-12">
                        <button type="submit" class="btn btn-base w-100">@lang('Submit')</button>
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





@push('script')
    <script>
        $('[name=country_id]').on('change', function() {
            var cities = $(this).find('option:selected').data('cities');
            var option = '<option value="">Select one</option>';
            $.each(cities, function(index, value) {
                var name = "{{ app()->getLocale() }}" == 'en' ? value.name : value.name_ar;
                option += "<option value='" + value.id + "' " + (value.id == "" ? "selected" : "") + "data-lat='" + value.lat +"' data-lng='"+value.lng+"'>" +
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
        @if (isset($images))
            let preloaded = @json($images);
        @else
            let preloaded = [];
        @endif

        $('.input-images').imageUploader({
            preloaded: preloaded,
            imagesInputName: 'images',
            preloadedInputName: 'old',
            maxSize: 3 * 1024 * 1024,
            maxFiles: 10,
        });


        $('[name=city_id]').on('change', function() {
            var lat = $(this).find('option:selected').data('lat');
            var lng = $(this).find('option:selected').data('lng');

            if(lat != undefined && lng != undefined){
                $("#address-latitude").val(lat);
                $("#address-longitude").val(lng);

                initialize();
            }

        }).change();



        $('[name=property_type_id]').on('change', function() {

            var val = $(this).find('option:selected').val();
            var subPropertyType = $(this).find('option:selected').data('subpropertytypes');
            subPropetyTypes(subPropertyType);

            $(".type-info-content").html('');
            if (val !== undefined && val !== '') {

                $.ajax({
                    url: '/get-property-type-info/' + val,
                    type: 'GET',
                    success: function(response) {
                        $(".type-info-content").html(response);
                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                    }
                });
            } else {
                $(".type-info-content").html('');
            }
        }).change();


        function subPropetyTypes(subpropertyTypes)
        {

            var option = '<option value="">' + "@lang('Select one')" + '</option>';
            $.each(subpropertyTypes, function(index, value) {
                var name = "{{ app()->getLocale() }}" == 'en' ? value.name : value.name_ar;
                option += "<option value='" + value.id + "'" + (value.id == "" ? " selected" : "") + ">" + name + "</option>";
            });

            $('select[name=subproperty_type_id]').html(option);
        }
    </script>
@endpush

@push('script-lib')
<script src="{{ asset('assets/global/js/map.js') }}"></script>
<script
src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAPS_API_KEY') }}&libraries=places&callback=initialize"
async defer>
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
@push('title')
    <h5>@lang('Add Property')</h5>
@endpush

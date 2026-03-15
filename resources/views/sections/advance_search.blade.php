@php
    $propertySearchContent = getContent('property_search.content', true);
    $propertyTypes = App\Models\PropertyType::active()->with('subproperty_types')->get();
    $ocountries = App\Models\Country::orderByRaw('ISNULL(sort_order), sort_order')->with('city')->get();
    $countries = sortOrder($ocountries);
@endphp
{{-- search canvas --}}
<div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasAdvanceSearch" aria-labelledby="offcanvasSearchLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasExampleLabel">{{__('Search for Real Estate')}}</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body property-search-offcanvas">
        <form action="{{ route('property') }}" method="GET">
            <input type="hidden" name="tab" value="list">
            <div class="canvas-top">
                <div class="canvas--box">
                    <a href="javascript:void(0)">
                        <i class="text-white fa-solid fa-magnifying-glass fa-2x"></i>
                        <p>{{ __('Search') }}</p>
                    </a>
                </div>
                <div class="canvas--box">
                    <a href="#">
                        <i class="text-white fa-regular fa-map fa-2x"></i>
                        <p>{{ __('Map') }}</p>
                    </a>
                </div>
                <div class="canvas--box">
                    <a href="#">
                        <i class="text-white fa-solid fa-qrcode fa-2x"></i>
                        <p>{{ __('QR Reader') }}</p>
                    </a>
                </div>
            </div>
            <div class="custom--form">
                <div class="mb-4 row">
                    <div class="col-12 col-md-12">
                        <label class="form-label">{{__('Time Period')}}</label>
                    </div>
                    <div class="col-12 col-md-12">
                        <div class="text-center btn-group" role="group" aria-label="Basic radio toggle button group">
                            <input type="radio" class="btn-check visually-hidden" name="time_period" id="btnradio2"
                                value="All" autocomplete="off" {{ isset($_GET['time_period']) && $_GET['time_period'] == 'All' ? 'checked' : '' }}>
                            <label class="btn btn-outline-secondary custom-btn" for="btnradio2">{{__('All')}}</label>
                            <input type="radio" class="btn-check visually-hidden" name="time_period" id="btnradio1"
                                value="Newest" autocomplete="off" {{ isset($_GET['time_period']) && $_GET['time_period'] == 'Newest' ? 'checked' : '' }}>
                            <label class="text-center btn btn-outline-secondary custom-btn"
                                for="btnradio1">{{__('Newest')}}</label>

                        </div>
                    </div>
                </div>


                <div class="mb-4 row">
                    <div class="col-12 col-md-12">
                        <label class="form-label">{{__('Purpose')}}</label>
                    </div>
                    <div class="col-12 col-md-12">
                        <div class="text-center btn-group" role="group" aria-label="Basic radio toggle button group">
                            <input type="radio" class="btn-check visually-hidden" name="purpose" id="btnradio21"
                                value="Purchase" autocomplete="off" {{ isset($_GET['purpose']) && urldecode($_GET['purpose']) == 'Purchase' ? 'checked' : '' }}>
                            <label class="text-center btn btn-outline-secondary custom-btn" for="btnradio21"> @lang('Purchase')</label>
                            
                            <input type="radio" class="btn-check visually-hidden" name="purpose" id="btnradio22"
                                value="Sale" autocomplete="off" {{ isset($_GET['purpose']) && urldecode($_GET['purpose']) == 'Sale' ? 'checked' : '' }}>
                            <label class="btn btn-outline-secondary custom-btn" for="btnradio22"> @lang('Sale')</label>
                            
                            <input type="radio" class="btn-check visually-hidden" name="purpose" id="btnradio23"
                                value="Kissing" autocomplete="off" {{ isset($_GET['purpose']) && urldecode($_GET['purpose']) == 'Kissing' ? 'checked' : '' }}>
                            <label class="btn btn-outline-secondary custom-btn" for="btnradio23"> @lang('Kissing')</label>
                            
                            <input type="radio" class="btn-check visually-hidden" name="purpose" id="btnradio24"
                                value="Exit" autocomplete="off" {{ isset($_GET['purpose']) && urldecode($_GET['purpose']) == 'Exit' ? 'checked' : '' }}>
                            <label class="btn btn-outline-secondary custom-btn" for="btnradio24"> @lang('Exit')</label>
                            
                            
                            
                            <input type="radio" class="btn-check visually-hidden" name="purpose" id="btnradio25"
                                value="Faltering" autocomplete="off" {{ isset($_GET['purpose']) && urldecode($_GET['purpose']) == 'Faltering' ? 'checked' : '' }}>
                            <label class="btn btn-outline-secondary custom-btn" for="btnradio25"> @lang('Faltering')</label>
                            
                            <input type="radio" class="btn-check visually-hidden" name="purpose" id="btnradio26"
                                value="Selling" autocomplete="off" {{ isset($_GET['purpose']) && urldecode($_GET['purpose']) == 'Selling' ? 'checked' : '' }}>
                            <label class="btn btn-outline-secondary custom-btn" for="btnradio26"> @lang('Selling')</label>
                            
                            <input type="radio" class="btn-check visually-hidden" name="purpose" id="btnradio27"
                                value="Buying" autocomplete="off" {{ isset($_GET['purpose']) && urldecode($_GET['purpose']) == 'Buying' ? 'checked' : '' }}>
                            <label class="btn btn-outline-secondary custom-btn" for="btnradio27"> @lang('Buying')</label>
                            
                            <input type="radio" class="btn-check visually-hidden" name="purpose" id="btnradio24"
                                value="Establishing" autocomplete="off" {{ isset($_GET['purpose']) && urldecode($_GET['purpose']) == 'Establishing' ? 'checked' : '' }}>
                            <label class="btn btn-outline-secondary custom-btn" for="btnradio24"> @lang('Establishing')</label>
                            
                            
                        </div>
                    </div>
                </div>

                <div class="mb-4">
                    <label class="form-label">{{ __('Choose the price per square meter or square foot') }}</label>
                    <div class="gap-2 d-flex">
                        <div class="text-white input-group bg-secondary">
                            <span class="text-white btn btn-bg-color" type="button"
                                id="button-addon1">{{__('From')}}</span>
                            <input type="text" class="form-control" placeholder="" name="from_price" id="from_price"
                                value="{{ request()->has('from_price') ? request()->input('from_price') : '' }}"
                                aria-label="Example text with button addon" aria-describedby="button-addon1">
                        </div>
                        <div class="text-white input-group bg-secondary">
                            <span class="text-white btn btn-bg-color" type="button"
                                id="button-addon2">{{__('To')}}</span>
                            <input type="text" class="form-control" placeholder="" name="to_price" id="to_price"
                                value="{{ request()->has('to_price') ? request()->input('to_price') : '' }}"
                                aria-label="Example text with button addon" aria-describedby="button-addon2">
                        </div>
                    </div>
                </div>


                <div class="mb-4">
                    <label class="form-label">{{__('Property Type')}}</label>
                    <div>
                        <select name="property_type" id="search_property_type" class="form-control">
                            <option value="0">{{ __('Select one') }}</option>
                            @foreach($propertyTypes as $property_type)
                                @if (app()->getLocale() == 'en')
                                    <option value="{{ $property_type->id }}"  {{ isset($_GET['property_type']) && $_GET['property_type'] == $property_type->id ? 'selected' : '' }}>
                                        {{ $property_type->name }}
                                    </option>
                                @else
                                    <option value="{{ $property_type->id }}" {{ isset($_GET['property_type']) && $_GET['property_type'] == $property_type->id ? 'selected' : '' }}>
                                        {{ $property_type->name_ar }}
                                    </option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="mb-4 row">
                    <div class="mb-4 col-12 col-md-12">
                        <label class="form-label">{{__('Countries')}}</label>
                        <div>
                            <select name="country_id" id="country_map" class="form-control country_map">
                                <option value="1">{{ __('Select one') }}</option>
                                @foreach ($countries as $country)
                                    @if (app()->getLocale() == 'en')
                                    <option
                                        value="{{ $country->id  }}"
                                        {{ isset($_GET['country_id']) && $_GET['country_id'] == $country->id ? 'selected' : '' }}
                                        data-cities="{{ $country->city }}"
                                    >{{ $country->name  }}</option>
                                    @else
                                    <option
                                        value="{{ $country->id  }}"
                                        {{ isset($_GET['country_id']) && $_GET['country_id'] == $country->id ? 'selected' : '' }}
                                        data-cities="{{ $country->city }}"
                                    >{{ $country->name_ar  }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="mb-4 col-12 col-md-12">
                        <label class="form-label">{{__('City')}}</label>
                        <div>
                            <select name="city_id" class="form-control">
                                <option value="1">{{ __('Select one') }}</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-4">
                        <button class="btn btn-bg-color w-100" style="background-color: #39004E !important; color: #FFF"
                            type="submit"> <i class="mr-3 bi bi-search"></i>
                            {{__('Search')}}</button>
                    </div>
                </div>

            </div>
        </form>
    </div>
</div>
{{-- search canvas end --}}

@push('style')
<style>
    .custom-btn {
        background-color: #39004E;
        color: #FFFFFF;
        padding: 14px !important;
    }

    .custom-btn.selected {
        background-color: #39004E;
    }

    .btn-label {
        display: block;
        padding-left: 5px !important;
    }

    .btn-bg-color {
        background-color: #39004E;
    }

    .canvas-top {
        display: flex;
        width: 100%;
        overflow-y: hidden;
        overflow-x: hidden;
    }

    .canvas--box {
        width: 120px !important;
        height: 80px;
        background-color: #39004E;
        border: none;
        border-radius: 8px;
        margin: 5px 8px;
        padding: 10px;
        text-align: center;
    }

    .canvas--box img {
        width: 40px;
        height: 40px;
        padding: 5px;
        border-radius: 8px;
        fill: #fff;
        background-color: #fff;
    }

    .canvas--box p {
        color: #fff;
        font-size: 14px;
    }

    .canvas-top:hover {
        overflow-x: auto;
    }

    .canvas-top::-webkit-scrollbar {
        width: 50px !important;
        height: 5px;
        border-radius: 5px;
    }

    .canvas-top::-webkit-scrollbar-track {
        width: 50px !important;
        background: #39004E;
        border-radius: 5px;
    }

    .canvas-top::-webkit-scrollbar-thumb {
        width: 50px !important;
        background: #39004E;
        border-radius: 5px;
    }

    .canvas-top::-webkit-scrollbar-thumb:hover {
        background: #39004E;
    }
</style>
@endpush


@push('script')
    <script>

        $('[name=country_id]').on('change', function() {
            var cities = $(this).find('option:selected').data('cities');
            var option = `<option value="">@lang('Select City')</option>`;
            var locale = "{{ app()->getLocale() }}";

            $.each(cities, function(index, value) {
                var cityName = locale === 'ar' ? value.name_ar : value.name;
                option += `<option value="${value.id}" ${value.id == "{{ request('city_id') }}" ? "selected" : ""}>${cityName}</option>`;
            });

            $('select[name=city_id]').html(option);

        }).change();


        $('[name=property_type]').on('change', function() {

            var subpropertyTypes = $(this).find('option:selected').data('subpropertytypes');

            var option = '<option value="">' + "@lang('Select Sub type')" + '</option>';

            $.each(subpropertyTypes, function(index, value) {
                var name = "{{ app()->getLocale() }}" == 'en' ? value.name : value.name_ar;
                option += "<option value='" + value.id + "'" + (value.id == "{{ request('subproperty_type_id')  }}" ? " selected" : "") + ">" + name + "</option>";
            });

            $('select[name=subproperty_type_id]').html(option);
        }).change();
    </script>
@endpush

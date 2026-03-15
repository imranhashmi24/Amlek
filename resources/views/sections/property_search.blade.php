@php
$propertySearchContent = getContent('property_search.content', true);
$propertyTypes = App\Models\PropertyType::active()->with('subproperty_types')->get();
$ocountries = App\Models\Country::orderByRaw('ISNULL(sort_order), sort_order')->with('city')->get();
$countries = sortOrder($ocountries);
@endphp

<section class="py-3 py-lg-5 home-section"
    style="background-image: url({{ getImage('assets/images/frontend/property_search/' . @$propertySearchContent->data_values->background_image, '1900x250') }})">
    <div class="container">

        <div class="row justify-content-center">
            <div class="col-10">
                <h5 class="text-center text-dark">
                    @php echo $propertySearchContent->lang('title') @endphp
                </h5>
            </div>
        </div>
        <div class="mt-5 property-search">
            <form action="{{ route('property') }}" method="GET">
                <div class="card">
                    <div class="p-3 card-body p-md-4">
                        <div class="d-flex property-search-box">
                            <input type="hidden" name="tab" value="list">
                            <div class="col-2">
                                <select name="purpose" class="form-select">
                                    <option value="Purchase" @selected(urldecode(request('purpose'))=='Purchase' )>
                                        @lang('Purchase')</option>
                                    <option value="Sale" @selected(urldecode(request('purpose'))=='Sale' )>
                                        @lang('Sale')</option>
                                    <option value="Kissing" @selected(urldecode(request('purpose')) == 'Kissing')>@lang('Kissing')</option>
                                    <option value="Exit" @selected(urldecode(request('purpose')) == 'Exit')>@lang('Exit')</option>
                                    <option value="Faltering" @selected(urldecode(request('purpose')) == 'Faltering')>@lang('Faltering')</option>
                                    <option value="Selling" @selected(urldecode(request('purpose')) == 'Selling')>@lang('Selling')</option>
                                    <option value="Buying" @selected(urldecode(request('purpose')) == 'Buying')>@lang('Buying')</option>
                                    <option value="Establishing" @selected(urldecode(request('purpose')) == 'Establishing')>@lang('Establishing')</option>
                                </select>
                            </div>
                            <div class="col-2">
                                <select name="property_type" class="form-select">
                                    <option value="">@lang('Type')</option>
                                    @foreach ($propertyTypes as $propertyType)
                                    <option value="{{ $propertyType->id }}"
                                        @selected(request('property_type')==$propertyType->id)
                                        data-subpropertytypes="{{ $propertyType->subproperty_types }}">
                                        {{ $propertyType->lang('name') }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-2">
                                <select name="subproperty_type_id" class="form-select">
                                    <option value="">@lang('Sub-type')</option>
                                </select>
                            </div>

                            <div class="col-2">
                                <select name="country_id" class="form-select">
                                    <option value=""> @lang('Country') </option>
                                    @foreach ($countries as $country)
                                    <option value="{{ $country->id }}" @selected(request('country_id')==$country->id)
                                        data-cities="{{ $country->city }}">
                                        {{ $country->lang('name') }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-2">
                                <select name="city_id" class="form-select">

                                </select>
                            </div>
                            <div class="col-2">
                                <button type="submit" class="search-btn"> <i class="mx-1 fa fa-search"></i> @lang('Search') </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <div
                class="my-3 text-end text-dark advance-search-btn"
                data-bs-toggle="offcanvas"
                data-bs-target="#offcanvasAdvanceSearch" aria-controls="offcanvasSearchLabel">
                <i class="mx-1 fa fa-filter"></i>
                @lang('Advance Search')
            </div>
        </div>

    </div>
    </div>
</section>

@push('style')
<style>
    .property-search {
        max-width: 100%;
        margin: 0 auto;
    }

    .property-search-box {
        display: flex;
        gap: 10px;
        flex-wrap: nowrap;
    }

    .property-search-box>div {
        min-width: 200px;
    }

    .property-search-box>div>select {
        width: 100%;
    }

    .property-search-box>div button {
        width: 70%;
        background: var(--bgc);
        color: var(--theme-color);
        height: 100%;
        padding: 10px;
        border-radius: 5px;
    }

    .advance-search-btn {
        margin-right: 25px !important;
        cursor: pointer;
    }

    @media(max-width: 575px) {
        
        .property-search-box {
            flex-direction: column;
        }
        
        .property-search-box>div {

            min-width: inherit;
            width: 100%;
        }

        .property-search-box>div button {
            width: 100%;
        }
    }
</style>
@endpush

@push('script')
<script>
    $('[name=country_id]').on('change', function() {
        var cities = $(this).find('option:selected').data('cities');
        var option = [`<option value="">@lang('City')</option>`];
        $.each(cities, function(index, value) {
            var name = "{{ app()->getLocale() }}" == 'en' ? value.name : value.name_ar;
            option += "<option value='" + value.id + "' " + (value.id == "{{ request('city_id') }}" ?
                "selected" : "") + ">" + name + "</option>";
        });
        $('select[name=city_id]').html(option);
    }).change();
    $('[name=property_type]').on('change', function() {
        var subpropertyTypes = $(this).find('option:selected').data('subpropertytypes');
        var option = '<option value="">' + "@lang('Sub-type')" + '</option>';
        $.each(subpropertyTypes, function(index, value) {
            var name = "{{ app()->getLocale() }}" == 'en' ? value.name : value.name_ar;
            option += "<option value='" + value.id + "'" + (value.id ==
                    "{{ request('subproperty_type_id')  }}" ? " selected" : "") + ">" + name +
                "</option>";
        });
        $('select[name=subproperty_type_id]').html(option);
    }).change();
</script>
@endpush

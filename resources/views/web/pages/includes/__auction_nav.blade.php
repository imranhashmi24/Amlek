<div class="row">
    <div class="col-md-12">
        <div class="d-flex justify-content-between">
            <div>
                <h3 class="auction-title">@lang('Auctions')</h3>
            </div>
            <div>
                @if(request()->route()->getName() == 'auctions')
                    <a href="{{ route('auctions.maps') }}" class="btn btn-map-view">
                        <i class="bi bi-map"></i>
                        <span>@lang('View Maps')</span>
                    </a>
                @else
                    <a href="{{ route('auctions') }}" class="btn btn-map-view">
                        <i class="bi bi-list"></i>
                        <span>@lang('View List')</span>
                    </a>
                @endif
            </div>
        </div>
    </div>
</div>

<form action="{{ route($routes['auctions'], 'all') }}" method="GET">
    <input type="hidden" name="type" id="typeValue" value="{{ @$type }}">
    <div class="py-3 row">
        <div class="col-md-12">
            <div class="auction-card d-flex justify-content-between">
                <div class="d-flex justify-content-start">
                    <div class="state-box">
                        <label for="">@lang('City')</label>
                        <div class="d-flex justify-content-start">
                            <div>
                                <i class="bi bi-geo-alt-fill"></i>
                            </div>
                            <select class="state-select" name="city_id">
                                <option value="0">@lang('Select one')</option>
                                @foreach ($cities as $city)
                                    @if(app()->getLocale() == 'en')
                                        <option {{ @$city_id == $city->id ? 'selected' : ''   }} value="{{ $city->id }}">{{ $city->name }}</option>
                                    @else
                                        <option {{ @$city_id == $city->id ? 'selected' : ''   }} value="{{ $city->id }}">{{ $city->name_ar }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="search-box">
                        <input type="text" class="auction-search-input" name="title" value="{{ old('title', @$title) }}" placeholder="@lang('Find an auctions')">
                    </div>
                </div>
                <div class="search-btn">
                    <button type="submit" class="btn-auction-search">
                        <span>@lang('Search')</span>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div class="py-3 row">
        <div class="col-md-12">
            <div class="d-flex justify-content-start">
                <button type="submit" class="mr-2 btn btn-info clickType {{ $type == 'all' ? 'active' : '' }}" value="all">@lang('All auctions') ({{ @$all }})</button>
                <button type="submit" class="mx-2 btn btn-primary clickType {{ $type == 'current' ? 'active' : '' }}" value="current">@lang('Current') ({{ @$current }})</button>
                <button type="submit" class="mx-2 btn btn-success clickType {{ $type == 'upcoming' ? 'active' : '' }}" value="upcoming">@lang('Coming') ({{ @$upcoming }})</button>
                <button type="submit" class="mx-2 btn btn-danger clickType {{ $type == 'finished' ? 'active' : '' }}" value="finished">@lang('Finished') ({{ @$finished }})</button>
            </div>
        </div>
    </div>
</form>

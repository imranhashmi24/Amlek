<div class="row">
    <div class="col-md-12">
        <div class="d-flex justify-content-between">
            <div class="d-flex justify-content-start">
                <button type="button" class="mr-2 btn btn-info clickType2 {{ $type == 'about' ? 'active' : '' }}" value="about">@lang('About Auction')</button>
                <button type="button" class="mx-2 btn btn-primary clickType2 {{ $type == 'item' ? 'active' : '' }}" value="item">@lang('Auction Items')</button>
            </div>
            <div>
                @if(request()->route()->getName() == 'auction.details')
                    <a href="{{ route('auctions.maps', $auction->id) }}" class="btn btn-map-view">
                        <i class="bi bi-map"></i>
                        <span>@lang('View Maps')</span>
                    </a>
                @else
                    <a href="{{ route('auction.details', $auction->slug) }}" class="btn btn-map-view">
                        <i class="bi bi-list"></i>
                        <span>@lang('View List')</span>
                    </a>
                @endif
            </div>
        </div>
    </div>
</div>

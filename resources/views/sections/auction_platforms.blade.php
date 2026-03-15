@php
    $auctionPlatformContent = getContent('auction_platforms.content', true);
    $auctionPlatformElements = getContent('auction_platforms.element', null, false, true);
@endphp

<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h5> {{ __(@$auctionPlatformContent->lang('heading')) }} </h5>
            </div>
            @foreach ($auctionPlatformElements as $auctionPlatformElement)
                <div class="col-12 col-sm-4 col-md-2">
                    <img src="{{ getImage('assets/images/frontend/auction_platforms/' . @$auctionPlatformElement->data_values->image) }}"
                        class="img-thumbnail" style="width:100%;height:90px" alt="Methology">
                </div>
            @endforeach
        </div>
    </div>
</section>

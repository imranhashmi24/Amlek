@php
    $auctionBannerContent = getContent('auction_banner.content', true);
@endphp


<section class="py-5 pages-banner"
    style="background-image: url({{ getImage('assets/images/frontend/auction_banner/' . @$auctionBannerContent->data_values->image, '1900x250') }});">
    <div class="container">
        <div class="row">
            <div class="py-5 col-12">
                <h1>{{ @$auctionBannerContent->lang('title') }}</h1>
                <p>{{ @$auctionBannerContent->lang('description') }}</p>
            </div>
        </div>
    </div>
</section>

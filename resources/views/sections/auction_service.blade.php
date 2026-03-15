@php
    $auctionServiceContent = getContent('auction_service.content', true);
@endphp


<section class="aboutus py-5 border-top">
    <div class="container">
        <div class="row no-gutters  position-relative">
            <div class="col-md-6 mb-md-0 p-md-4">
                <img src="{{ getImage('assets/images/frontend/auction_service/' . @$auctionServiceContent->data_values->image, '615x410') }}" class="w-100" alt="service">
            </div>
            <div class="col-md-6 position-static p-4 pl-md-0">
                <h3 class="mt-5 text-dark"> {{ @$auctionServiceContent->lang('title')}} </h3>
                <p> {{ @$auctionServiceContent->lang('description')}} </p>
            </div>
        </div>
    </div>
</section>
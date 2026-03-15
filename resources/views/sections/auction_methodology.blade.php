@php
    $auctionMethodologyContent = getContent('auction_methodology.content', true);
    $auctionMethodologyElements = getContent('auction_methodology.element', null, false, true);
@endphp

<section class="pb-5 aboutus">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h5> {{@$auctionMethodologyContent->lang('heading')}} </h5>
                <ol>
                    @foreach($auctionMethodologyElements as $auctionMethodologyElement)
                    <li> {{ @$auctionMethodologyElement->lang('methodology_name')}} </li>
                    @endforeach

                </ol>
            </div>
        </div>
    </div>
</section>

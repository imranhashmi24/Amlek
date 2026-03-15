@php
    $investmentSectorContent = getContent('social_investment_sector.content', true);
    $investmentSectorElements = getContent('social_investment_sector.element', null, false, true);

@endphp

<section class="mb-5">
    <div class="container">
        <div class="sector">
            <div class="sector-title">
                <h4> {{ @$investmentSectorContent->lang('heading') }} </h4>
                <hr>
            </div>
            @if (!blank(@$investmentSectorElements))
                <div class="row">
                    @foreach ($investmentSectorElements as $key => $investmentSectorElement)
                        <div class="col-md-3">
                            <div class="sector-card">
                                <img src="{{ getImage('assets/images/frontend/social_investment_sector/' . @$investmentSectorElement->data_values->image, '310x210') }}"
                                    class="img-fluid" alt="service">
                                <div class="sector-body">
                                    <div class="sector-number">
                                        <p>{{ $key + 1 }}</p>
                                        <div class="card-base"></div>
                                    </div>
                                    <p class="sector-title">
                                        {{ @$investmentSectorElement->lang('sector_name') }}</p>
                                    <a href="{{ @$investmentSectorElement->data_values->button_url }}"
                                        class="apply-btn"> @lang('Send Request') </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
</section>

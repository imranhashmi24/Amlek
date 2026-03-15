@php
    $investmentContent = getContent('social_investment_service.content', true);
    $investmentElements = getContent('social_investment_service.element', null, false, true);
@endphp

<section class="py-5">
    <div class="container">
        <div class="intro-content">
            <div class="intru-text">
                <div class="intro-details">
                    <div class="row">
                        <div class="col-12 pb-md-5">
                            <h4>
                                {!! @$investmentContent->lang('short_description') !!}
                            </h4>
                        </div>
                    </div>
                    @if(!blank(@$investmentElements))
                    <div class="row">
                        @foreach ($investmentElements as $investmentElement)
                            <div class="col-md-6">
                                <div class="details-text">
                                    <p>
                                        {{ @$investmentElement->lang('title') }}
                                    </p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>

@php
    $evaluationSerivceElements = getContent('evaluation_service.element', null, false, true);
@endphp


<section class="py-5 aboutus border-top">
    <div class="container">
        @foreach ($evaluationSerivceElements as $key => $evaluationSerivceElement)
            @if ($key / 2 == 0)
                <div class="py-5 row align-items-center">
                    <div class="col-md-6">
                        <img src="{{ getImage('assets/images/frontend/evaluation_service/' . @$evaluationSerivceElement->data_values->image, '615x385') }}"
                            class="w-100" alt="service">
                    </div>
                    <div class="col-md-6">
                        <h3 class="mt-3 text-dark mt-md-0"> {{ @$evaluationSerivceElement->lang('title') }}
                        </h3>
                        <p>
                            @php echo @$evaluationSerivceElement->lang('description') @endphp
                        </p>
                        <a href="{{ @$evaluationSerivceElement->data_values->service_request_url . '?type=Evaluation&title=' . @$evaluationSerivceElement->lang('title') }}"
                            class="apply-btn mt-md-4"> @lang('Send Request') </a>
                    </div>
                </div>
            @else
                <div class="py-5 row align-items-center">
                    <div class="order-1 col-md-6 order-md-0">
                        <h3 class="mt-3 text-dark mt-md-0"> {{ @$evaluationSerivceElement->lang('title') }} </h3>
                        <p>   @php echo @$evaluationSerivceElement->lang('description') @endphp </p>
                        <a href="{{ @$evaluationSerivceElement->data_values->service_request_url }}" class="apply-btn mt-md-4"> @lang('Send Request') </a>
                    </div>
                    <div class="col-md-6 order-0 order-md-1">
                        <img src="{{ getImage('assets/images/frontend/evaluation_service/' . @$evaluationSerivceElement->data_values->image, '615x385') }}"
                            class="w-100" alt="service">
                    </div>
                </div>
            @endif
        @endforeach

    </div>
</section>

@php
    $marketingSerivceElements = getContent('marketing_service.element', null, false, true);
@endphp


<section class="py-5">
    <div class="container">
        <div class="row">
            @foreach ($marketingSerivceElements as $marketingSerivceElement)
                <div class="col-12 col-sm-6 col-md-3 mb-md-5">
                    <div class="card custom-card">
                     <div class="card-body">
                        <img src="{{ getImage('assets/images/frontend/marketing_service/' . @$marketingSerivceElement->data_values->image, '270x210') }}"
                        alt="Marketing Image" class="w-100">
                    <h5 class="my-3 text-dark"> {{ @$marketingSerivceElement->lang('title') }} </h5>
                    <p class="text-muted">
                        @php echo $marketingSerivceElement->lang('description'); @endphp
                    </p>
                    <a href="{{ @$marketingSerivceElement->data_values->service_request_url }}" class="apply-btn">
                        @lang('Request service')
                    </a>
                     </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

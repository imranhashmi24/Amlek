@php
    $financeServiceContent = getContent('finance_service.content', true);
@endphp


@if(!blank(@$financeServiceContent))
<section class="py-5 aboutus border-top">
    <div class="container">
        <div class="row no-gutters position-relative">
            <div class="col-md-6 mb-md-0 p-md-4">
              <img src="{{ getImage('assets/images/frontend/finance_service/' . @$financeServiceContent->data_values->image, '615x340') }}" class="w-100" alt="service">
            </div>
            <div class="p-4 col-md-6 position-static pl-md-0">
              <h3 class="mt-5 text-dark"> {{ @$financeServiceContent->lang('title')}} </h3>

              <p>  @php echo $financeServiceContent->lang('description'); @endphp </p>

              <a href="{{@$financeServiceContent->data_values->service_request_url}}" class="mt-4 submit-btn"> @lang('Request Real estate financing')  </a>
            </div>
          </div>
    </div>
</section>
@endif

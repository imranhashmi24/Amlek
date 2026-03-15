@php
    $serviceContent = getContent('service_section.content', true);
    $serviceElements = getContent('service_section.element', null, false, true);
@endphp

<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="text-center page-title">
                    <h3 class="pb-4 text-dark"> {{ @$serviceContent->lang('heading') }} </h3>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach ($serviceElements as $serviceElement)
                <div class="col-12 col-md-4 mb-md-5">
                    <div class="card custom-card">
                        <div class="card-body">
                            <img src="{{ getImage('assets/images/frontend/service_section/' . @$serviceElement->data_values->image, '380x235') }}"
                                alt="service" class="w-100">
                            <h5 class="my-3 text-dark"> {{ @$serviceElement->lang('title') }} </h5>
                            <div style="font-size: 12px !important" class="my-2"> @php echo @$serviceElement->lang('short_description') @endphp </div>
                     
                            <a href="{{ $serviceElement->data_values->button_url . '?type=about&title=' . @$serviceElement->lang('title') }}" class="apply-btn">
                                @lang('Request service')
                            </a>


                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>


@push('style')
<style>
    .MsoNormal span{
        font-size: 12px !important;
    }
</style>
@endpush

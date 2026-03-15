@php
    $financeContent = getContent('finance_banner.content', true);
@endphp

<section class="py-5 pages-banner"
    style="background-image: url({{ getImage('assets/images/frontend/finance_banner/' . @$financeContent->data_values->image, '1900x250') }});">
    <div class="container">
        <div class="row">
            <div class="py-5 col-12">
                <h1 class="text-center">{{ @$financeContent->lang('title') }}</h1>
                <p class="text-center">{{ @$financeContent->lang('description') }}</p>
            </div>
        </div>
    </div>
</section>

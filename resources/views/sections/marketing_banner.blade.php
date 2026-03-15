@php
    $marketingBannerContent = getContent('marketing_banner.content', true);
@endphp


<section class="py-5 pages-banner" style="background-image: url({{ getImage('assets/images/frontend/marketing_banner/' . @$marketingBannerContent->data_values->image, '1900x250') }});">
    <div class="container">
        <div class="row">

            <!--@if(app()->getLocale() == 'ar')-->
            <!--    <div class="py-5 col-6"></div>-->
            <!--@endif-->

            
            <div class="py-5 col-12">
                <h1 class="text-center">{!! __(@$marketingBannerContent->lang('title')) !!}</h1>
                <p class="text-center">{!! __(@$marketingBannerContent->lang('description')) !!}</p>
            </div>
        </div>
    </div>
</section>

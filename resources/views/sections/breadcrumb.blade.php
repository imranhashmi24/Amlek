@php
    $breadcrumbContent = getContent('breadcrumb.content', true);
@endphp


<section class="py-5 pages-banner" style="background-image: url({{ getImage('assets/images/frontend/breadcrumb/' . @$breadcrumbContent->data_values->image, '1900x250') }});">
    <div class="container">
        <div class="row">
            <div class="py-5 col-12">
                <h1 class="p-0 m-0 text-center"> {!! __(@$title)  !!}</h1>
            </div>
        </div>
    </div>
</section>
@extends('web.layouts.frontend',['title' => 'Marketing'])
@section('content')

    <x-page-top-banner
        title="Marketing"
        url="{{ getImage(getFilePath('service') . '/' . $page_content->image, getFileSize('service')) }}"
    />


    <div class="container">
        <div class="row">
            @if (Session::has('message'))
            <div class="col-12">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>{{ Session::get('message') }}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
        @endif
       </div>
    </div>

    @foreach ($page_content->childrens as $children)
        <section class="py-5">
            <div class="container">
                <div class="row">
                    @foreach ($children->contents as $content)
                    <div class="mx-auto col-12 col-sm-6 col-md-3 mb-md-5">
                        <div class="card custom-card">
                           <div class="card-body">
                            <img src="{{getImage(getFilePath('service_content').'/'.$content->image,getFileSize('service_content'))}}" alt="" class="w-100">
                            <h5 class="my-3 text-dark">{{ $content->title }}</h5>
                            <p class="text-muted">{{ $content->description }}</p>
                            <a href="#" data-bs-toggle="modal" data-bs-target=".requestform" class="apply-btn"> {{ __("Request Service") }}</a>
                           </div>
                        </div>
                    </div>
                    @include('web.pages.includes.__marketing_request_form')
                    @endforeach
                </div>
            </div>
        </section>
    @endforeach

    <!-- end marketing page section -->

    @include('web.component.addrentsell')
    @include('web.component.buyinvestsell')


@endsection


@push('script')
    <script>
        $('[name=country_id]').on('change', function() {
            var cities = $(this).find('option:selected').data('cities');
            var option = [`<option value="">Select one</option>`];
            $.each(cities, function(index, value) {
                option += "<option value='" + value.id + "' " + (value.id == "" ? "selected" : "") + ">" +
                    value.name + "</option>";
            });
            $('select[name=city_id]').html(option);
        }).change();
    </script>
@endpush

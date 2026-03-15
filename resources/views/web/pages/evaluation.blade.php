@extends('web.layouts.frontend',['title' => "Evaluation"])
@section('content')

<x-page-top-banner title="{{ $page_content->title  }}"
    url="{{ getImage(getFilePath('service') . '/' . $page_content->image, getFileSize('service')) }}" />

@foreach ($page_content->childrens as $key => $children)
    @if($key == 0)
        <section class="py-5 aboutus border-top">
            <div class="container">
                @foreach ($children->contents as $content)
                <div class="row no-gutters position-relative">
                    <div class="col-md-6 mb-md-0 p-md-4">
                        <img src="{{getImage(getFilePath('service_content').'/'.$content->image,getFileSize('service_content'))}}" alt="" class="w-100">
                    </div>
                    <div class="p-4 col-md-6 position-static pl-md-0">
                        <h3 class="mt-5 text-dark">{{ $content->title }}</h3>
                        <p class="text-muted">{{ $content->description }}</p>
                        <a href="#" class="apply-btn mt-md-5">{{ __('Send Request') }} </a>
                    </div>
                </div>
                @endforeach
            </div>
        </section>

    @else
    <section class="py-5">
        <div class="container">
            <div class="row">
                @foreach ($children->contents as $content)
                <div class="mb-3 col-12 col-sm-6 col-md-3">
                    <div class="card studiesservice">
                        <img src="{{getImage(getFilePath('service_content').'/'.$content->image,getFileSize('service_content'))}}" alt=""  class="mx-auto mt-2 w-25 mt-md-3">

                        <div class="card-body">
                            <h5>{{ $content->title }}</h5>
                            <p>{{ $content->description }}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif

@endforeach

@include('web.component.addrentsell')
@include('web.component.buyinvestsell')

@endsection

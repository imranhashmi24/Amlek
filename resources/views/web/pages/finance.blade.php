@extends('web.layouts.frontend',['title' => 'Marketing'])
@section('content')
    <x-page-top-banner
        title="{{ $page_content->title  }}"
        url="{{ getImage(getFilePath('service') . '/' . $page_content->image, getFileSize('service')) }}"
    />

    @foreach ($page_content->childrens as $children)
    <section class="py-5 aboutus border-top">
        <div class="container">
            @foreach($children->contents as $key => $content)
            <div class="row no-gutters position-relative">
                <div class="col-md-6 mb-md-0 p-md-4">
                <img src="{{ getImage(getFilePath('service_content') . '/' . $content->image, getFileSize('service_content')) }}" class="w-100" alt="...">
                </div>
                <div class="p-4 col-md-6 position-static pl-md-0">
                <h3 class="mt-5 text-dark">{{ $content->title }}</h3>
                <p>{{ $content->description }}</p>
                <a href="{{ route('finance.request') }}" class="mt-4 submit-btn">{{ __('Request real estate financing') }}</a>
                </div>
            </div>
            @endforeach
        </div>
    </section>
    @endforeach

    @include('web.component.addrentsell')
    @include('web.component.buyinvestsell')


@endsection

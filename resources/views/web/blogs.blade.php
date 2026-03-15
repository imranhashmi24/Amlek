@extends('web.layouts.frontend', ['title' => 'Blogs'])
@section('content')

    <!--    BLOG SECTION-->
    <section class="py-5">
        <div class="container">
            <div class="mt-5 row">
                @foreach ($blogs as $blog)
                    <div class="pb-4 col-12 col-sm-6 col-md-4 col-lg-3">
                        <div class="blog-box h-100">
                            <div class="blog-img">
                                <img src="{{ getImage(getFilePath('blog') . '/' . $blog->image) }}" alt="Blog Image">
                            </div>

                            <div class="p-3">
                                <h6> {{ $blog->lang('title') }} </h6>
                                <p>
                                    {{ strLimit(strip_tags($blog->lang('description')), 100) }}
                                </p>

                                <a href="{{ route('blog.details', $blog->slug) }}">{{ __('Read More') }} <i
                                        class="bi bi-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            @if ($blogs->hasPages())
                <div class="py-5 pagination-card-footer">
                    {{ paginateLinks($blogs) }}
                </div>
            @endif
        </div>
    </section>
    <!--    BLOG SECTION END-->



    @if (@$sections->secs != null)
        @foreach (json_decode($sections->secs) as $sec)
            @include('sections.' . $sec)
        @endforeach
    @endif


@endsection

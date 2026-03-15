@extends('web.layouts.frontend', ['title' => 'Blog Details'])
@section('content')
    <section class="blog-section" style="background: none;">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-8">
                    <div class="py-5 blog-left">
                        <div class="mb-2 blog-image">
                            <img src="{{ getImage(getFilePath('blog') . '/' . $blog->image) }}" alt="Blog Photo">
                        </div>
                        <span class="blog-date"><i class="bi bi-clock pe-1"></i>
                            {{ showDateTime($blog->created_at, 'd M Y') }}</span>
                        <h4 class="blog-details-head">
                            {{ $blog->lang('title') }}
                        </h4>

                        <div class="py-3 blog-ditails">
                            @php echo $blog->lang('description') @endphp
                        </div>

                        <div class="mt-5 social-icon social-icon-2">
                            <span>{{ __('Share') }} :</span>
                            <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url()->current()) }}"><i
                                    class="fab fa-facebook-f"></i></a>
                            <a
                                href="https://twitter.com/intent/tweet?text=my share text&amp;url={{ urlencode(url()->current()) }}">
                                <i class="fab fa-twitter"></i></a>
                            <a
                                href="http://www.linkedin.com/shareArticle?mini=true&amp;url={{ urlencode(url()->current()) }}&amp;title=my share text&amp;summary=dit is de linkedin summary">
                                <i class="fab fa-linkedin-in"></i></a>

                            <a target="_blank"
                                href="https://www.instagram.com/sharer.php?u={{ urlencode(url()->current()) }}">
                                <i class="fab fa-instagram"></i>
                            </a>

                        </div>

                    </div>
                </div>
                <div class="col-12 col-lg-4">
                    <div class="my-5 blog-right sticky-blog-right">
                        <div class="blog-sidbar-post">
                            <h3 class="border-bottom">{{ __('Recent Post') }}</h3>
                            @foreach ($recentPosts as $recentPos)
                                <div class="py-2 sidbar-blog-box d-flex">
                                    <img src="{{ getImage(getFilePath('blog') . '/' . $recentPos->image) }}"
                                        alt="Blog Photo">
                                    <div class="content">
                                        <a href="{{ route('blog.details', $recentPos->slug) }}">
                                            {{ strLimit($blog->lang('title'), 50) }}
                                        </a>
                                        <p>
                                            <span>{{ diffForHumans($blog->created_at) }}</span>
                                        </p>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <div class="mt-4 blog-sidbar-post">
                            <h3 class="border-bottom">{{ __('Popular Post') }}</h3>
                            @foreach ($popularPosts as $popularPost)
                                <div class="py-2 sidbar-blog-box d-flex">
                                    <img src="{{ getImage(getFilePath('blog') . '/' . $popularPost->image) }}"
                                        alt="Blog Photo">
                                    <div class="content">
                                        <a href="{{ route('blog.details', $popularPost->slug) }}">
                                            {{ strLimit($popularPost->title, 50) }}
                                        </a>
                                        <p>
                                            <span>{{ diffForHumans($popularPost->created_at) }}</span>
                                        </p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

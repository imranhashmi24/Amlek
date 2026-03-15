@extends('web.layouts.frontend',['title' => 'Investment'])

@section('content')
    <x-page-top-banner
        title="Investment"
        url="{{ getImage(getFilePath('service') . '/' . $page_content->image, getFileSize('service')) }}"
    />

    @foreach ($page_content->childrens as $key => $children)
        @if ($key === 0)
        <section class="py-5">
            <div class="container">
                <div class="intro-content">
                    <div class="intru-text">
                        <div class="intro-details">
                            <div class="row">
                                <div class="col-12 pb-md-5">
                                    <h4> @lang('homepage.social_investment_heading')</h4>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="details-text">
                                        <p>@lang('homepage.social_investment_p1')</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="details-text">
                                        <p>@lang('homepage.social_investment_p2')</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="details-text">
                                        <p>@lang('homepage.social_investment_p3')</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="details-text">
                                        <p>@lang('homepage.social_investment_p4')</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="details-text">
                                        <p>@lang('homepage.social_investment_p5')</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="details-text">
                                        <p>@lang('homepage.social_investment_p6')</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="details-text">
                                        <p>@lang('homepage.social_investment_p7')</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="details-text">
                                        <p>@lang('homepage.social_investment_p8')</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="details-text">
                                        <p>@lang('homepage.social_investment_p9')</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="details-text">
                                        <p>@lang('homepage.social_investment_p10')</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        @else
        <section class="mb-5">
            <div class="container">
                <div class="sector">
                    <div class="sector-title">
                        <h4> @lang('homepage.browsefeasibilitystudies')</h4>
                        <hr>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="sector-card">
                                <img src="{{ asset('images/sector/insector01.jpg') }}" class="img-fluid" alt="">
                                <div class="sector-body">
                                    <div class="sector-number">
                                        <p>01</p>
                                        <div class="card-base"></div>
                                    </div>
                                    <p class="sector-title">@lang('homepage.insector01')</p>
                                    <a href="{{ route('investment.send.request') }}" class="apply-btn ">@lang('homepage.sendrequest') </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="sector-card">
                                <img src="{{ asset('images/sector/insector02.jpg') }}" class="img-fluid" alt="">
                                <div class="sector-body">
                                    <div class="sector-number">
                                        <p>02</p>
                                        <div class="card-base"></div>
                                    </div>
                                    <p class="sector-title">@lang('homepage.insector02')</p>
                                    <a href="{{ route('investment.send.request') }}" class="apply-btn ">@lang('homepage.sendrequest') </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="sector-card">
                                <img src="{{ asset('images/sector/insector03.jpg') }}" class="img-fluid" alt="">
                                <div class="sector-body">
                                    <div class="sector-number">
                                        <p>03</p>
                                        <div class="card-base"></div>
                                    </div>
                                    <p class="sector-title">@lang('homepage.insector03')</p>
                                    <a href="{{ route('investment.send.request') }}" class="apply-btn ">@lang('homepage.sendrequest') </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="sector-card">
                                <img src="{{ asset('images/sector/insector04.jpg') }}" class="img-fluid" alt="">
                                <div class="sector-body">
                                    <div class="sector-number">
                                        <p>04</p>
                                        <div class="card-base"></div>
                                    </div>
                                    <p class="sector-title">@lang('homepage.insector04')</p>
                                    <a href="{{ route('investment.send.request') }}" class="apply-btn ">@lang('homepage.sendrequest') </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="sector-card">
                                <img src="{{ asset('images/sector/insector05.jpg') }}" class="img-fluid" alt="">
                                <div class="sector-body">
                                    <div class="sector-number">
                                        <p>05</p>
                                        <div class="card-base"></div>
                                    </div>
                                    <p class="sector-title">@lang('homepage.insector05')</p>
                                    <a href="{{ route('investment.send.request') }}" class="apply-btn ">@lang('homepage.sendrequest') </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="sector-card">
                                <img src="{{ asset('images/sector/insector06.jpg') }}" class="img-fluid" alt="">
                                <div class="sector-body">
                                    <div class="sector-number">
                                        <p>06</p>
                                        <div class="card-base"></div>
                                    </div>
                                    <p class="sector-title">@lang('homepage.insector06')</p>
                                    <a href="{{ route('investment.send.request') }}" class="apply-btn ">@lang('homepage.sendrequest') </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="sector-card">
                                <img src="{{ asset('images/sector/insector07.jpg') }}" class="img-fluid" alt="">
                                <div class="sector-body">
                                    <div class="sector-number">
                                        <p>07</p>
                                        <div class="card-base"></div>
                                    </div>
                                    <p class="sector-title">@lang('homepage.insector07')</p>
                                    <a href="{{ route('investment.send.request') }}" class="apply-btn ">@lang('homepage.sendrequest') </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="sector-card">
                                <img src="{{ asset('images/sector/insector08.webp') }}" class="img-fluid" alt="">
                                <div class="sector-body">
                                    <div class="sector-number">
                                        <p>08</p>
                                        <div class="card-base"></div>
                                    </div>
                                    <p class="sector-title">@lang('homepage.insector08')</p>
                                    <a href="{{ route('investment.send.request') }}" class="apply-btn ">@lang('homepage.sendrequest') </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="sector-card">
                                <img src="{{ asset('images/sector/insector09.jpg') }}" class="img-fluid" alt="">
                                <div class="sector-body">
                                    <div class="sector-number">
                                        <p>09</p>
                                        <div class="card-base"></div>
                                    </div>
                                    <p class="sector-title">@lang('homepage.insector09')</p>
                                    <a href="{{ route('investment.send.request') }}" class="apply-btn ">@lang('homepage.sendrequest') </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="sector-card">
                                <img src="{{ asset('images/sector/insector10.jpg') }}" class="img-fluid" alt="">
                                <div class="sector-body">
                                    <div class="sector-number">
                                        <p>10</p>
                                        <div class="card-base"></div>
                                    </div>
                                    <p class="sector-title">@lang('homepage.insector10')</p>
                                    <a href="{{ route('investment.send.request') }}" class="apply-btn ">@lang('homepage.sendrequest') </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="sector-card">
                                <img src="{{ asset('images/sector/insector11.jpg') }}" class="img-fluid" alt="">
                                <div class="sector-body">
                                    <div class="sector-number">
                                        <p>11</p>
                                        <div class="card-base"></div>
                                    </div>
                                    <p class="sector-title">@lang('homepage.insector11')</p>
                                    <a href="{{ route('investment.send.request') }}" class="apply-btn ">@lang('homepage.sendrequest') </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="sector-card">
                                <img src="{{ asset('images/sector/insector12.jpg') }}" class="img-fluid" alt="">
                                <div class="sector-body">
                                    <div class="sector-number">
                                        <p>12</p>
                                        <div class="card-base"></div>
                                    </div>
                                    <p class="sector-title">@lang('homepage.insector12')</p>
                                    <a href="{{ route('investment.send.request') }}" class="apply-btn ">@lang('homepage.sendrequest') </a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>
        @endif
    @endforeach
    @include('web.component.addrentsell')
    @include('web.component.buyinvestsell')

@endsection

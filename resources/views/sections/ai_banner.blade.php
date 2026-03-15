@php
    $aiBannerContent = getContent('ai_banner.content', true);
@endphp

<section class="py-3 py-lg-5 margin-top">
    <div class="container">
        <div class="ai_banner">
            <div class="px-2">
                <div class="ai_banner_image">
                    <img src="{{ getImage('assets/images/frontend/ai_banner/' . @$aiBannerContent->data_values->image) }}"
                        alt="">
                    <div class="flex-wrap ai_overlay align-content-center">
                        <h6>{{ @$aiBannerContent->lang('title') }}</h6>
                        <div class="overlay-btn">
                            <a href="{{ route('ai.service') }}" class="btn btn-primary">@lang('Get Started')</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


@push('style-lib')
    <style>
        .ai_banner_image{
            position: relative;
            border-radius: 10px;
            overflow: hidden;
        }

        .ai_banner_image img{
            width: 100%;
            height: 100%;
            border-radius: 10px;
        }

        .ai_banner_image .ai_overlay {
            position: absolute;
            height: 100%;
            width: 100%;
            background: #00000031;
            left: 0;
            top: 0;
            display: block;
            justify-content: center;
            align-items: center;
            text-align: center;
            color: #ffffff;
            border-radius: 10px;
        }

        .ai_banner_image .ai_overlay h6{
            font-weight: 400;
            font-size: 18px;
            line-height: 30px;
            color: #ffffff;
        }

        .btn-primary{
            background: #75418F !important;
            outline: none;
            border: none;
        }

        @media screen and (max-width: 767px) {
            .margin-top{
                margin-top: 20px !important;
            }
        }
    </style>
@endpush

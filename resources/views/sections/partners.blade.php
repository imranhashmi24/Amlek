@php
    $partnerContent = getContent('partners.content', true);
    $partnerElements = getContent('partners.element', null, false, true);
@endphp



<!--    SPECIAL COURSE-->
<section class="special-course py-5">
    <div class="container">
        <div class="section-title text-center">
            <h2 class="after-line text-capitalize"> {{$partnerContent->lang('header')}} </h2>
        </div>
        <div class="row justify-content-center mt-5">
            @foreach($partnerElements as $partnerElement)
            <div class="col-6 col-sm-4 col-md-3 col-lg-2 pb-4">
                <div class="special-course-box">
                    <div class="special-course-icon">
                        <img src="{{ getImage('assets/images/frontend/partners/' . @$partnerElement->data_values->image) }}" alt="image">
                    </div>
                    <h6>
                        {{$partnerElement->lang('title')}}
                    </h6>
                    <a href="javascript:void(0)" class="stretched-link"></a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
<!--    SPECIAL COURSE END-->

@push('style')
    <style>
        .special-course-icon {
            background: linear-gradient(132.13deg, #D7EDEC 0%, #F4FFFE 96.95%);
            box-shadow: 0px 12px 25px rgba(0, 0, 0, 0.12);
            border-radius: 10px;
            text-align: center;
            padding: 20px 0;
            transition: .2s;
        }

        .special-course-icon img {
            width: 80%;
        }

        .special-course-box h6 {
            font-weight: 700;
            font-size: 16px;
            line-height: 19px;
            margin: 0;
            padding: 15px 0;
            text-align: center;
        }

        .special-course-box:hover .special-course-icon {
            background:
                #00A550;
        }

        .special-course-box:hover .special-course-icon i {
            color: var(--wc);
        }

        .special-course-box {
            position: relative;
            height: 100%;
        }
    </style>
@endpush

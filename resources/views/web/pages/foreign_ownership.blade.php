@php
    $foreign_ownership_banner = getContent('foreign_ownership_banner.content', true);
    $foreign_property_development = getContent('foreign_property_development.content', true);
    $foreign_we_offer_you_content = getContent('foreign_we_offer_you.content', true);
    $foreign_we_offer_you_elements = getContent('foreign_we_offer_you.element', null, false, true);
    $foreign_our_service_content = getContent('foreign_our_services.content', true);
    $foreign_our_service_elements = getContent('foreign_our_services.element', null, false, true);
    $foreign_why_choose_content = getContent('foreign_why_choose.content', true);
    $foreign_why_choose_content_elements = getContent('foreign_why_choose.element', null, false, true);
@endphp


@extends('web.layouts.frontend',['title' => __('Foreign Ownership of Real Estate')])
@section('content')

<section style="background-image: url('{{ getImage('assets/images/frontend/foreign_ownership_banner/' . @$foreign_ownership_banner->data_values->image, '1900x150') }}'); min-height: 150px">
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4">
                <h2 class="pt-5 text-center text-white ">{{ @$foreign_ownership_banner->lang('title') }}</h2>
            </div>
        </div>
    </div>
</section>

<section class="mt-5">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="development-1">
                    <img src="{{ getImage('assets/images/frontend/foreign_property_development/' . @$foreign_property_development->data_values->image, '645x350') }}" alt="{{ @$foreign_property_development->lang('title') }}">
                </div>
            </div>
            <div class="col-md-6">
                <div class="development-2">
                    <h3>{{ @$foreign_property_development->lang('title') }}</h3>
                    <p>{{ @$foreign_property_development->lang('description') }}</p>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4 offset-md-4">
                <div class="development-3">
                    <img src="{{ getImage('assets/images/frontend/foreign_property_development/' . @$foreign_property_development->data_values->image_2, '645x350') }}" alt="{{ @$foreign_property_development->lang('title') }}">
                </div>
            </div>
        </div>
    </div>
</section>

<section class="my-5">
    <div class="container">
        <div class="mb-2 row">
            <div class="col-md-3">
                <img class="arrow-img" src="{{ asset('assets/images/arrow2.png') }}" alt="">
            </div>
        </div>
        <div class="mb-5 row">
            <div class="col-md-12">
                <h3 class="we-offer-you">{{ @$foreign_we_offer_you_content->lang('header') }}</h3>
            </div>
        </div>

        <div class="row">
            @foreach($foreign_we_offer_you_elements as $element)
            <div class="my-2 col-12 col-md-3">
                <div class="we-offer-box">
                    <h3>{{ @$element->lang('title') }}</h3>
                    <p>{{ @$element->lang('description') }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<section class="my-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="our-service-inc">
                    <div class="my-5 row">
                        <div class="col-md-12">
                            <img class="arrow-img-2" src="{{ asset('assets/images/arrow1.png') }}" alt="">
                            
                            <h3 class="text-center we-offer-you">{{ @$foreign_our_service_content->lang('header') }}</h3>
                        </div>
                    </div>
                    <div class="row">
                        @foreach($foreign_our_service_elements as $element)
                        <div class="my-3 col-12 col-md-3">
                            <div class="we-offer-box">
                                <h3>{{ @$element->lang('title') }}</h3>
                                <p>{{ @$element->lang('description') }}</p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="my-5 why-choose-development">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-4">
                <div class="development-4">
                    <img src="{{ getImage('assets/images/frontend/foreign_why_choose/' . @$foreign_why_choose_content->data_values->image, '645x350') }}" alt="{{ @$foreign_why_choose_content->lang('header') }}">
                </div>
            </div>
            <div class="col-12 col-md-8">
                <div class="development-5">

                    <h3 class="we-offer-you">{{ @$foreign_why_choose_content->lang('header') }}</h3>
                </div>

                <div class="development-6">
                    <div class="row">
                        @foreach($foreign_why_choose_content_elements as $element)
                        <div class="my-3 col-md-4">
                            <div class="why-choose-box">
                                <h3>{{ @$element->lang('title') }}</h3>
                                <p>{{ @$element->lang('description') }}</p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <form action="{{ route('foreign_ownership_request_store') }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="my-3 col-md-6">
                            <label for="full_name" class="form-label">@lang('Full Name') <span class="text-danger fs-6">*</span></label>
                            <input type="text" name="full_name" id="full_name" class="form-control custom-form" placeholder="@lang('Type Name')" required>
                        </div>

                        <div class="my-3 col-md-6">
                            <label for="nationality" class="form-label">@lang('Nationality') <span class="text-danger fs-6">*</span></label>
                            <select name="nationality" id="nationality" class="form-control custom-form" required>
                                <option value="0">@lang('Select Country')</option>
                                @foreach ($countries as $country)
                                    <option value="{{ $country->id }}">{{ app()->getLocale() == 'en' ? $country->name : $country->name_ar }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="my-3 col-md-6">
                            <label for="email" class="form-label">@lang('Email') <span class="text-danger fs-6">*</span></label>
                            <input type="email" name="email" id="email" class="form-control custom-form" placeholder="@lang('example@mail.com')" required>
                        </div>

                        <div class="my-3 col-md-6">
                            <label for="phone_number" class="form-label">@lang('Phone Number') <span class="text-danger fs-6">*</span></label>
                            <input type="text" name="phone_number" id="phone_number" class="form-control custom-form" placeholder="@lang('+996')" required>
                        </div>

                        <div class="my-3 col-md-6">
                            <label for="purpose_of_the_application" class="form-label">@lang('Purpose of the Application')</label>
                            <select name="purpose_of_the_application" id="purpose_of_the_application" class="form-control custom-form">
                                <option value="Property for obtaining a distinguished residence">@lang('Property for obtaining a distinguished residence')</option>
                                <option value="Investment in free zones">@lang('Investment in free zones')</option>
                                <option value="Individual property for purchase">@lang('Individual property for purchase')</option>
                                <option value="Other">@lang('Other')</option>
                            </select>
                        </div>

                        <div class="my-3 col-md-6">
                            <label for="property_requested_country" class="form-label">@lang('The country in which the property is requested')</label>
                            <select name="property_requested_country" id="property_requested_country" class="form-control custom-form">
                                <option value="0">@lang('Select Country')</option>
                                @foreach ($countries as $country)
                                    <option value="{{ $country->id }}" data-cities="{{ $country->city  }}">{{ app()->getLocale() == 'en' ? $country->name : $country->name_ar }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="my-3 col-md-6">
                            <label for="city" class="form-label">@lang('City')</label>
                            <select name="city" id="city" class="form-control custom-form">
                                <option value="">@lang('Select City')</option>
                            </select>
                        </div>

                        <div class="my-3 col-md-6">
                            <label for="type_of_property_required" class="form-label">@lang('Type of property required')</label>
                            <select name="type_of_property_required" id="type_of_property_required" class="form-control custom-form">
                                <option value="Residential">@lang('Residential')</option>
                                <option value="Commercial">@lang('Commercial')</option>
                                <option value="Industrial">@lang('Industrial')</option>
                                <option value="Land">@lang('Land')</option>
                            </select>
                        </div>

                        <div class="my-3 col-md-6">
                            <label for="estimated_budget" class="form-label">@lang('Estimated Budget')</label>
                            <div class="input-group">
                                <div class="input-group-text">@lang('SAR'):</div>
                                <input type="text" name="estimated_budget" id="estimated_budget" class="form-control custom-form" placeholder="@lang('Enter Amount')">
                            </div>
                        </div>

                        <div class="my-3 col-md-6">
                            <label for="type_of_priority" class="form-label">@lang('Type of Priority')</label>
                            <select name="type_of_priority" id="type_of_priority" class="form-control custom-form">
                                <option value="Urgent">@lang('Urgent')</option>
                                <option value="Later">@lang('Later')</option>
                            </select>
                        </div>

                        <div class="my-3 col-md-12">
                            <label for="message" class="form-label">@lang('Message')</label>
                            <textarea name="message" id="message" cols="30" rows="5" class="form-control custom-form" placeholder="@lang('Message')"></textarea>
                        </div>
                    </div>

                    <div class="row">
                        <div class="my-3 col-md-12">
                            <button type="submit" class="submit-btn">@lang('Submit Request')</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>


@if (@$sections->secs != null)
@foreach (json_decode($sections->secs) as $sec)
    @include('sections.' . $sec)
@endforeach
@endif


@endsection

@push('style')
<style>
    .arrow-img{
        width: 150px;
        height: 150px;
        margin-left: 100px;
    }

    .arrow-img-2{
        width: 100px;
        height: 100px;
        text-align: center;
        display: flex;
        justify-content: center;
        margin: 0 auto;
        align-items: center;
    }
    .development-2{
        margin-left: 20px;
    }

    .development-2 h3{
        font-weight: 600;
        font-size: 30px;
        color: var(--dvc);
        margin-bottom: 10px;
    }

    .development-2 p{
        font-weight: 400;
        font-size: 16px;
        color: var(--dvc);
        line-height: 24px;
    }

    .development-3{
        position: relative;
        top: -150px;
        margin: 0px;
        padding: 0px;
    }

    .we-offer-box{
        background-color: rgba(255, 255, 255, 1);
        padding: 20px;
        border-radius: 25px;
        color: var(--dvc);
        text-align: left;
        box-shadow: 0px 0px 10px 0px rgba(83, 83, 83, 0.2);
        height: 170px;
        overflow: hidden;
    }
    
    @if(app()->getLocale() == 'ar')
     .we-offer-box{
         direction: rtl;
         text-align: right;
     }
    @endif

    .we-offer-box h3{
        font-weight: 600;
        font-size: 20px;
        color: var(--dvc);
        margin-bottom: 10px;
    }

    .we-offer-box p{
        font-weight: 400;
        font-size: 16px;
        color: var(--dvc);
        line-height: 24px;
    }

    .our-service-inc{
        border: 1px solid #39004E;
        border-radius: 25px;
        padding: 20px;
        box-shadow: 0px 0px 10px 0px rgba(83, 83, 83, 0.2);
    }

    .why-choose-development{
        padding: 0px;
        margin: 0px;
        background: var(--bgc);
    }

    .development-4{
        padding-top: 100px;
    }

    .development-4 img {
        width: 100%;
        height: 100%;
    }
    
    /* @if(app()->getLocale() == 'ar')*/
    /*.development-4 img {*/
    /*    transform: rotate(-260deg);*/
    /*}*/
    /*@endif*/
    
    .development-5 h3{
        padding-top: 100px;
        font-weight: 600;
        width: 400px;
        font-size: 30px;
        color: #fff;
        margin-bottom: 10px;
    }

    .why-choose-box{
        background-color: rgba(46, 17, 64, 1);
        padding: 20px;
        border-radius: 25px;
        color: #fff;
        text-align: left;
        box-shadow: 0px 0px 10px 0px rgba(83, 83, 83, 0.2);
        height: 170px;
        overflow: hidden;
    }
    
     @if(app()->getLocale() == 'ar')
     .why-choose-box{
         direction: rtl;
         text-align: right;
     }
    @endif


    .why-choose-box h3{
        font-weight: 600;
        font-size: 20px;
        color: #fff;
        margin-bottom: 10px;
    }

    .why-choose-box p{
        font-weight: 400;
        font-size: 14px;
        color: rgba(189, 189, 189, 1);
        line-height: 24px;
    }

    .custom-form{
        background-color: transparent !important;
    }

    .highlight-text{
        color:rgba(255, 111, 5, 1);
        font-weight: 600;
        font-size: 30px !important;
    }

    @media (max-width: 768px) {
        .development-1{
            margin-bottom: 30px;
        }

        .development-1 img{
            width: 100%;
        }
        .development-2{
            margin-left: 0px;
        }

        .development-3{
            top: 0px;
            margin: 0px;
            padding: 0px;
        }

        .development-3 img{
            width: 100%;
            height: 100%;
        }

        .development-5 h3{
            width: 100%;
        }
    }
</style>
@endpush


@push('script')
<script>
    $(document).ready(function() {
        // Update cities dropdown based on selected country
        $('[name=property_requested_country]').on('change', function() {
            var cities = $(this).find('option:selected').data('cities');
            var option = [`<option value="">Select one</option>`];

            $.each(cities, function(index, value) {
                var name = "{{ app()->getLocale() }}" == 'en' ? value.name : value.name_ar;
                option.push("<option value='" + value.id + "' " + (value.id == "" ? "selected" : "") + ">" +
                    name + "</option>");
            });

            $('select[name=city]').html(option.join(''));
        }).change();

        // Highlight the second word in elements with class 'we-offer-you'
        var weOfferYou = $('.we-offer-you');
        if (weOfferYou.length > 0) {
            weOfferYou.each(function() {
                var text = $(this).text();
                var words = text.split(' ');

                if (words.length > 1) {
                    words[1] = '<span class="highlight-text">' + words[1] + '</span>';
                    $(this).html(words.join(' '));
                }
            });
        }
    });
</script>
@endpush

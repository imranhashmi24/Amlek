@extends('web.layouts.frontend', ['title' => 'Full purchase details'])


@section('content')
    @include('sections.breadcrumb', ['title' => 'Full purchase details'])


    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-8">
                    <div class="purchase-details-image">
                        <img src="{{ getImage(getFilePath('business_image') . '/' . $businessPost->image) }}" alt="">
                    </div>

                    <div class="py-4">
                        <h5 class="purchase-header">{{ $businessPost->lang('title') }}</h5>
                    </div>
                    <div>
                        @php echo $businessPost->lang('description')  @endphp
                    </div>

                    <div class="social-icon mt-5">
                        <b>Share :</b>
                        <a target="_blank"
                            href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url()->current()) }}"><i
                                class="fab fa-facebook-f"></i></a>
                        <a target="_blank"
                            href="https://twitter.com/intent/tweet?text=my share text&amp;url={{ urlencode(url()->current()) }}">
                            <i class="fab fa-twitter"></i></a>
                        <a target="_blank"
                            href="http://www.linkedin.com/shareArticle?mini=true&amp;url={{ urlencode(url()->current()) }}&amp;title=my share text&amp;summary=dit is de linkedin summary">
                            <i class="fab fa-linkedin-in"></i></a>

                        <a target="_blank" href="https://www.instagram.com/sharer.php?u={{ urlencode(url()->current()) }}">
                            <i class="fab fa-instagram"></i>
                        </a>

                    </div>



                </div>
                <div class="col-4">
                    <div class="purchase-right">
                        <p class="head">
                            @lang('Selling Price') {{ $businessPost->lang('selling_price') }}
                        </p>
                        <p>
                            <b> {{ $businessPost->lang('address') }} </b>
                        </p>
                        <p>
                            <b> @lang('Business Status') : {{ $businessPost->lang('business_status') }} </b>
                        </p>

                        <p>
                            <b>@lang('Business Type') : {{ @$businessPost->businesstype->lang('name') }} </b>
                        </p>

                        <p>
                            <b>@lang('Employees Number') : {{ $businessPost->employee_number }} </b>
                        </p>
                        <p>
                            <b>@lang('Annual Income') : {{ $businessPost->annual_income }} </b>
                        </p>

                        <p>
                            <b>@lang('Company Age') : {{ $businessPost->company_age }} </b>
                        </p>
                        <br>

                        @lang('Find out more about this business opportunity')


                        <a href="#" class="call-us">@lang('Call us')</a>

                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="py-5">
        <div class="container">


            <div class="full-purchase-form">
                <h4 class="pb-2">
                    Find out more about this business opportunity
                </h4>
                <hr>
                <form action="{{ route('business.post.request') }}" method="post">
                    @csrf

                    <input type="hidden" name="business_post_id" value="{{ $businessPost->id }}">

                    <div class="row">



                        <div class="col-12 col-md-6 pb-4">
                            <div class="form-group">
                                <label class="form-label">@lang('Country')</label>
                                <select name="country_id" class="form-select">
                                    <option value="">@lang('Select One')</option>
                                    @foreach ($countries as $country)
                                        <option value="{{ $country->id }}" data-cities="{{ $country->city }}"
                                            @selected(old('country_id' == @$country->id))>
                                            @if (app()->getLocale() == 'en')
                                                {{ $country->name }}
                                            @else
                                                {{ $country->name_ar }}
                                            @endif
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                        </div>
                        <div class="col-12 col-md-6 pb-4">
                            <div class="form-group">
                                <label class="form-label">@lang('City')</label>
                                <select name="city_id" class="form-select">
                                    <option value="">@lang('Select One')</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 pb-4">
                            <label class="form-label">Name</label>
                            <input type="text" class="form-control" name="name">
                        </div>

                        <div class="col-12 col-md-6 pb-4">
                            <label class="form-label">Position title</label>
                            <input type="text" class="form-control" name="position_title">
                        </div>

                        <div class="col-12 col-md-6 pb-4">
                            <label class="form-label">Email</label>
                            <input type="text" class="form-control" name="email">
                        </div>
                        <div class="col-12 col-md-6 pb-4">
                            <label class="form-label">Mobile Number</label>
                            <input type="text" class="form-control" name="mobile">
                        </div>
                        <div class="col-12 pb-4">
                            <label class="form-label">Comment or Message</label>
                            <textarea name="message" class="form-control" id="" cols="30" rows="10"></textarea>
                        </div>
                        <div class="col-12 pb-4">
                            <Button type="submit" class="btn btn-primary w-100">Submit</Button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection


@push('script')
    <script>
        $('[name=country_id]').on('change', function() {
            var cities = $(this).find('option:selected').data('cities');
            var option = '<option value="">@lang('Select one')</option>';
            $.each(cities, function(index, value) {

                var name = "{{ app()->getLocale() }}" == 'en' ? value.name : value.name_ar;

                option += "<option value='" + value.id + "' " + (value.id == "" ? "selected" : "") +
                    "data-lat='" + value.lat + "' data-lng='" + value.lng + "'>" +
                    name + "</option>";
            });

            $('select[name=city_id]').html(option);
        }).change();
    </script>
@endpush

@push('script')
    <style>
        .full-purchase-form {
            background: #f4f4f452;
            padding: 40px;
        }

        .purchase-details-image img {
            width: 100%;
        }

        .purchase-right {
            border: 1px solid #cccccc;
            padding: 10px;
        }

        .purchase-right p {
            padding: 10px;
            font-size: 16px;
            margin: 0;
            background: #e8e8e8;
            margin-bottom: 10px;
        }

        .purchase-right .head {
            background: blueviolet;
            text-align: center;
            color: #ffffff;

        }

        .purchase-right .call-us {
            padding: 5px 30px;
            color: #ffffff;
            background: blueviolet;
            margin-top: 20px;
            display: inline-block;
        }

        .social-icon i {
            height: 30px;
            width: 30px;
            border: 1px solid blueviolet;
            line-height: 30px;
            text-align: center;
            border-radius: 50%;
            background: blueviolet;
            color: #ffffff;
            margin: 0 3px;
        }

        .social-icon i:hover {
            background: #ffffff;
            color: blueviolet;
        }

        .purchase-header {
            line-height: 30px;
        }
    </style>
@endpush

@extends('web.layouts.frontend', ['title' => 'Full Purchase'])


@section('content')

    @include('sections.breadcrumb', ['title' => 'Full Purchase'])

    <section class="py-5">
        <div class="container">
            <div class="bussnesstype">
                <h5 class="mb-3">@lang('Business Types :')</h5>
                <a href="{{appendQuery('search','')}}" class="{{request()->search ? '' : 'active'}}">@lang('All Sectors')</a>
                @foreach($businessCategory as $businessCategor)
                <a href="{{appendQuery('search',$businessCategor->name)}}" class="{{request()->search == $businessCategor->name ? 'active' : ''}}"> {{$businessCategor->lang('name')}} </a>
                @endforeach
            </div>
        </div>
    </section>

    <section class="py-5">
        <div class="container">
                @foreach ($businessPosts as $businessPost)
                <div class="full-purchase p-3">
                    <div class="row">
                        <div class="col-12 col-md-6 col-lg-4">
                            <div class="full-purchase-img">
                                <img src="{{ getImage(getFilePath('business_image') . '/' . $businessPost->image) }}"
                                    alt="">
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-8 mt-3 mt-md-0">
                            <h4>
                                <a href="{{route('full.purchase.details',$businessPost->id)}}">
                                    {{strLimit($businessPost->lang('title'),70)}}
                                </a>
                            </h4>
                            <p>
                               {{strLimit(strip_tags($businessPost->lang('description')),200)}}
                            </p>
                            <p><b> @lang('Busness Status') : </b> {{$businessPost->business_status}}</p>
                            <p><b>@lang('Price') : </b> {{$businessPost->lang('selling_price')}} </p>

                            <div class="full-purchase-icon mb-3">
                                <a href="#"><i class="fa-brands fa-facebook-f"></i></a>
                                <a href="#"><i class="fa-brands fa-linkedin"></i></a>
                                <a href="#"><i class="fa-brands fa-whatsapp"></i></a>
                            </div>
                            <a class="read-more" href="{{route('full.purchase.details',$businessPost->id)}}">@lang('Read More')</a>
                        </div>
                    </div>
                </div>
                @endforeach
            

            @if ($businessPosts->hasPages())
            <div class="card-footer pagination-card-footer py-5">
                {{ paginateLinks($businessPosts) }}
            </div>
        @endif

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
        .full-purchase-img img {
            width: 100%;
        }

        .full-purchase h4 a:hover {
            color: blueviolet;
        }

        .full-purchase .read-more {
            width: 100%;
            display: block;
            background: blueviolet;
            color: #ffffff;
            padding: 7px;
            border-radius: 3px;
            text-align: center;
            transition: .3s;
        }
        .full-purchase .read-more:hover{
            background: rgba(137, 43, 226, 0.811);
        }
        .full-purchase-icon i {
            height: 30px;
            width: 30px;
            background: blueviolet;
            line-height: 30px;
            text-align: center;
            font-size: 20px;
            color: #ffffff;
            border: 1px solid blueviolet;
            border-radius: 2px;
            transition: .3s;
        }

        .full-purchase-icon i:hover {
            background: #ffffff;
            color: blueviolet;
        }

        .full-purchase:first-child {
            border-top: 1px solid #cccccc;
        }

        .full-purchase {
            border: 1px solid #cccccc;
            border-top: none;
        }
        .card-footer.pagination-card-footer{
            border-top: none;
        }
        
        .bussnesstype a{
            padding: 4px 10px;
            font-weight: 500;
        }
        .bussnesstype a:hover{
            color: blueviolet;
        }
        .bussnesstype a.active{
            background: blueviolet;
            color: #ffffff;
        }
    </style>
@endpush

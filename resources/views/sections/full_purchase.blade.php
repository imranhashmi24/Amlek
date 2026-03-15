@php
    $fullPurchases = $businessPosts = App\Models\BusinessPost::limit(4)->get();
@endphp


<section class="py-5">
    <div class="container">
        <div class="section-title">
            <h2 class="text-center">Full Purchase</h2>
        </div>
        <div class="row mt-5">
            @foreach ($fullPurchases as $fullPurchase)
                <div class="col-12 col-sm-6 col-lg-3 pb-4">
                    <div class="full-purchase">
                        <img src="{{ getImage(getFilePath('business_image') . '/' . $fullPurchase->image) }}" alt="Image">

                        <div class="pt-3">
                            <div class="d-flex justify-content-between flex-wrap gap-2">
                                <span><b> @lang('Busness Status') : </b> {{$fullPurchase->business_status}}</span>
                                <span><b> @lang('Price') : </b> {{$fullPurchase->lang('selling_price')}}</span>
                            </div>
                            <h6 class="m-0 py-2">{{  strLimit($fullPurchase->lang('title'),80) }}</h6>
                            <a href="{{route('full.purchase.details',$fullPurchase->id)}}">View Details <i class="bi bi-arrow-right"></i> </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="view-all mt-5">
            <a href="{{route('full.purchase')}}">@lang('View All')</a>
        </div>
    </div>
</section>

@push('style')
    <style>
        .full-purchase span{
            font-size: 14px;
            color: #6f6f6f;
        }
        .full-purchase img{
            width: 100%;
        }
        .full-purchase h6{
            font-size: 18px;
            line-height: 28px;
        }
        .full-purchase a{
            font-weight: 500;
            color: blueviolet;
        }
        .full-purchase a:hover{
            text-decoration: underline;
        }
        .view-all{
            text-align: center;
        }
        .view-all a{
            background: blueviolet;
            padding: 10px 30px;
            border-radius: 4px;
            color: #ffffff;
            transition: .3s;
        }
        .view-all a:hover{
            background: rgba(137, 43, 226, 0.749);
        }
    </style>
@endpush

@extends('admin.layouts.app', ['title' => 'Busness Request'])
@section('panel')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <div class="border shadow-none card">
                                <div class="p-0 card-body">
                                    <div class="card-list">
                                        <span>@lang('Name')</span>
                                        <b> {{ $promotionReq->name }} </b>
                                    </div>
                                     <div class="card-list">
                                        <span>@lang('Email')</span>
                                        <b> {{ $promotionReq->email }} </b>
                                    </div>
                                    
                                    <div class="card-list">
                                        <span>@lang('Mobile Number')</span>
                                        <b> {{ $promotionReq->mobile }} </b>
                                    </div>
                                    
                                   
                                    <div class="card-list">
                                        <span>@lang('Country')</span>
                                        <b> {{ @$promotionReq->country->name }} </b>
                                    </div>
                                    
                                    <div class="card-list">
                                        <span>@lang('City')</span>
                                        <b> {{ @$promotionReq->city->name }} </b>
                                    </div>
                                    
                                    <div class="card-list">
                                        <span>@lang('Message')</span>
                                        <span>{{ @$promotionReq->message }} </span>
                                    </div>
                                    
                                    <div class="card-list">
                                        <span>@lang('Status')</span>
                                        <b> @php echo  @$promotionReq->statusBadge @endphp </b>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('breadcrumb-plugins')
    <div class="flex-wrap gap-3 d-flex">
        <a href="{{ route('admin.promotion.request.approve',$promotionReq->id) }}" class="btn btn-success"><i class="bi bi-check2 pe-1"></i>
        @lang('Approve')</a>
        <a href="{{ route('admin.promotion.request.reject',$promotionReq->id) }}" class="btn btn-danger"><i class="bi bi-x pe-1"></i>
        @lang('Reject')</a>


        <a href="{{ route('admin.promotion.request.index') }}" class="btn btn-primary"><i
                class="bi bi-arrow-clockwise pe-1"></i>
            @lang('Back')</a>
    </div>
@endpush


@push('style')
    <style>
        .card-body .card-list {
            display: flex;
            padding: 8px;
            flex-wrap: nowrap;
            border-bottom: 1px solid #cccccc;
            justify-content: space-between;

        }

        .card-body .card-list:last-child {
            border-bottom: none;
        }
    </style>
@endpush

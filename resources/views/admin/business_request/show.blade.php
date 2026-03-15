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
                                    @if ($businessReq->user_id)
                                        <div class="card-list">
                                            <span>@lang('User')</span>
                                            <b> {{ $businessReq->user->name }}</b>
                                        </div>
                                    @endif
                                    <div class="card-list">
                                        <span>@lang('Name')</span>
                                        <b> {{ $businessReq->name }} </b>
                                    </div>
                                     <div class="card-list">
                                        <span>@lang('Email')</span>
                                        <b> {{ $businessReq->email }} </b>
                                    </div>
                                    
                                    <div class="card-list">
                                        <span>@lang('Mobile Number')</span>
                                        <b> {{ $businessReq->mobile }} </b>
                                    </div>
                                    
                                    <div class="card-list">
                                        <span>@lang('Business Post')</span>
                                        <b> {{ @$businessReq->businessPost->title }} </b>
                                    </div>
                                    
                                    <div class="card-list">
                                        <span>@lang('Position Title')</span>
                                        <b> {{ $businessReq->position_title }} </b>
                                    </div>
                                    
                                    <div class="card-list">
                                        <span>@lang('Country')</span>
                                        <b> {{ @$businessReq->country->name }} </b>
                                    </div>
                                    
                                    <div class="card-list">
                                        <span>@lang('City')</span>
                                        <b> {{ @$businessReq->city->name }} </b>
                                    </div>
                                    
                                    <div class="card-list">
                                        <span>@lang('Message')</span>
                                        <span>{{ @$businessReq->message }} </span>
                                    </div>
                                    
                                    <div class="card-list">
                                        <span>@lang('Status')</span>
                                        <b> @php echo  @$businessReq->statusBadge @endphp </b>
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
        <a href="{{ route('admin.business.request.approve',$businessReq->id) }}" class="btn btn-success"><i class="bi bi-check2 pe-1"></i>
        @lang('Approve')</a>
        <a href="{{ route('admin.business.request.reject',$businessReq->id) }}" class="btn btn-danger"><i class="bi bi-x pe-1"></i>
        @lang('Reject')</a>


        <a href="{{ route('admin.business.request.index') }}" class="btn btn-primary"><i
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

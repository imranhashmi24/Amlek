@extends('admin.layouts.app', ['title' => 'Asset Liability Request'])
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
                                        <b> {{ $asset_liability_req->name }} </b>
                                    </div>
                                     <div class="card-list">
                                        <span>@lang('Email')</span>
                                        <b> {{ $asset_liability_req->email }} </b>
                                    </div>

                                    <div class="card-list">
                                        <span>@lang('Mobile Number')</span>
                                        <b> {{ $asset_liability_req->mobile }} </b>
                                    </div>


                                    <div class="card-list">
                                        <span>@lang('Country')</span>
                                        <b> {{ @$asset_liability_req->country->name }} </b>
                                    </div>

                                    <div class="card-list">
                                        <span>@lang('City')</span>
                                        <b> {{ @$asset_liability_req->city->name }} </b>
                                    </div>

                                    <div class="card-list">
                                        <span>@lang('Message')</span>
                                        <span>{{ @$asset_liability_req->message }} </span>
                                    </div>

                                    <div class="card-list">
                                        <span>@lang('Status')</span>
                                        <b> @php echo  @$asset_liability_req->statusBadge @endphp </b>
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
        <a href="{{ route('admin.asset.liability.request.approve',$asset_liability_req->id) }}" class="btn btn-success"><i class="bi bi-check2 pe-1"></i>
        @lang('Approve')</a>
        <a href="{{ route('admin.asset.liability.request.reject',$asset_liability_req->id) }}" class="btn btn-danger"><i class="bi bi-x pe-1"></i>
        @lang('Reject')</a>


        <a href="{{ route('admin.asset.liability.request.index') }}" class="btn btn-primary"><i
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

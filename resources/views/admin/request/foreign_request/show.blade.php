@extends('admin.layouts.app', ['title' => 'Foreign Request Details'])
@section('panel')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="border shadow-none card">
                                <div class="p-0 card-body">
                                    <div class="card-list">
                                        <span>@lang('Full Name')</span>
                                        <b>{{ $serviceRequest->full_name }}</b>
                                    </div>

                                    <div class="card-list">
                                        <span>@lang('Nationality')</span>
                                        <b>
                                           {{ __($serviceRequest->nation?->name) }}
                                        </b>
                                    </div>
                                     <div class="card-list">
                                        <span>@lang('Email')</span>
                                        <b>{{ @$serviceRequest->email }}</b>
                                    </div>

                                    <div class="card-list">
                                        <span>@lang('Mobile Number')</span>
                                        <b>{{ @$serviceRequest->phone_number }}</b>
                                    </div>

                                    <div class="card-list">
                                        <span>@lang('Purpose of the Application')</span>
                                        <b>{{ @$serviceRequest->purpose_of_the_application }}</b>
                                    </div>

                                    <div class="card-list">
                                        <span>@lang('The country in which the property is requested')</span>
                                        <b>
                                            @if (app()->getLocale() == 'en')
                                                {{ @$serviceRequest->country?->name }}
                                            @else
                                                {{ @$serviceRequest->country?->name_ar }}
                                            @endif
                                        </b>
                                    </div>

                                    <div class="card-list">
                                        <span>@lang('City')</span>
                                        <b>
                                            @if (app()->getLocale() == 'en')
                                                {{ @$serviceRequest->getCity?->name }}
                                            @else
                                                {{ @$serviceRequest->getCity?->name_ar }}
                                            @endif
                                        </b>
                                    </div>

                                    <div class="card-list">
                                        <span>@lang('Type of property required')</span>
                                        <b>
                                            {{ __($serviceRequest->type_of_property_required) }}
                                        </b>
                                    </div>

                                    <div class="card-list">
                                        <span>@lang('Estimated Budget')</span>
                                        <b>{{ __($serviceRequest->estimated_budget) }}</b>
                                    </div>

                                    <div class="card-list">
                                        <span>@lang('Type of Priority')</span>
                                        <b>{{ __($serviceRequest->type_of_priority) }}</b>
                                    </div>

                                    <div class="card-list">
                                        <span>@lang('Message')</span>
                                        <b>{{ __($serviceRequest->message) }}</b>
                                    </div>

                                    <div class="card-list">
                                        <span>@lang('Status')</span>
                                        <b> @php echo  $serviceRequest->statusBadge @endphp</b>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>

    <x-confirmation-modal />
@endsection

@push('breadcrumb-plugins')
    <div class="flex-wrap gap-2 d-flex">
        <a href="{{ route('admin.foreign.form.request.index') }}" class="btn btn-primary"><i
                class="bi bi-arrow-clockwise pe-1"></i>@lang('Back')</a>

        <a href="{{ route('admin.foreign.form.request.status', [$serviceRequest->id, Status::REVIEW]) }}" class="btn btn-success"><i
                class="bi bi-check2 pe-1"></i>@lang('Approved')</a>
        <a href="{{ route('admin.foreign.form.request.status', [$serviceRequest->id, Status::REJECT]) }}" class="btn btn-danger"><i
                class="bi bi-x pe-1"></i>@lang('Rejected')</a>

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

        .property-image {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
        }

        .property-image>a {
            width: 170px;
            display: flex;
            border: 1px solid #cccccc;
            border-radius: 5px;
            overflow: hidden;
        }

        .property-image img {
            width: 100%;
        }
    </style>
@endpush

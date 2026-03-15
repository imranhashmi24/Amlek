@extends('admin.layouts.app', ['title' => 'Finance Request'])
@section('panel')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive--md table-responsive">
                        <table class="table">
                            <thead class="table-light">
                                <tr>
                                    <th>@lang('Name')</th>
                                    <th>@lang('Country') | @lang('City')</th>
                                    <th>@lang('Property Type')</th>
                                    <th>@lang('Request Date')</th>
                                    <th>@lang('Status')</th>
                                    <th>@lang('Action')</th>
                                </tr>
                            </thead>
                            <tbody>
                            @forelse ($financeRequests as $financeRequest)
                                <tr>
                                    <td>
                                        {{$financeRequest->name}}
                                    </td>
                                    <td>
                                        @if (app()->getLocale() == 'en')
                                            {{@$financeRequest->country->name}}
                                            <br>
                                            {{@$financeRequest->city->name}}
                                        @else
                                            {{@$financeRequest->country->name_ar}}
                                            <br>
                                            {{@$financeRequest->city->name_ar}}
                                        @endif
                                    </td>
                                    <td>
                                        @if (app()->getLocale() == 'en')
                                            {{@$financeRequest->propertyType->name}}
                                        @else
                                            {{@$financeRequest->propertyType->name_ar}}
                                        @endif
                                    </td>


                                    <td>
                                        <small>{{ showDateTime($financeRequest->created_at,'d M Y') }}</small>
                                        <br>
                                        <small>{{ showDateTime($financeRequest->created_at,'H:i A') }}</small>
                                    </td>

                                    <td>

                                        @php echo $financeRequest->statusBadge; @endphp

                                     </td>
                                    <td>
                                        <div class="btn-group">
                                            <button data-bs-toggle="dropdown">
                                                <i class="fa-solid fa-ellipsis-vertical"></i>
                                            </button>
                                            <ul class="dropdown-menu dropdown-menu-end">
                                                <li>
                                                    <a href="{{ route('admin.finance.request.show', $financeRequest->id) }}">
                                                        <i class="bi bi-eye"></i>@lang('Details')
                                                    </a>
                                                </li>

                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td class="text-center text-muted" colspan="100%">{{ __($emptyMessage) }}</td>
                                </tr>
                            @endforelse

                            </tbody>
                        </table><!-- table end -->
                    </div>
                </div>
                @if ($financeRequests->hasPages())
                    <div class="card-footer pagination-card-footer">
                        {{ paginateLinks($financeRequests) }}
                    </div>
                @endif
            </div>
        </div>
    </div>

    <x-confirmation-modal />
@endsection

@push('breadcrumb-plugins')
    <div class="flex-wrap gap-3 d-flex">
        <x-search-form placeholder="Search" />
    </div>
@endpush

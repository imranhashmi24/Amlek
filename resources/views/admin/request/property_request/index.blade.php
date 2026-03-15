@extends('admin.layouts.app', ['title' => 'Property Form Request'])
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
                                    <th>@lang('Sectors')</th>
                                    <th>@lang('Request Date')</th>
                                    <th>@lang('Status')</th>
                                    <th>@lang('Action')</th>
                                </tr>
                            </thead>
                            <tbody>
                            @forelse ($serviceRequests as $serviceRequest)
                                <tr>
                                    <td>
                                        @if(app()->getLocale() == 'en')
                                            {{$serviceRequest->name}}
                                        @else
                                            {{$serviceRequest->name_ar}}
                                        @endif
                                    </td>
                                    <td>
                                        @if(app()->getLocale() == 'en')
                                            {{@$serviceRequest->country->name}}
                                            <br>
                                            {{@$serviceRequest->city->name}}
                                        @else
                                            {{@$serviceRequest->country->name_ar}}
                                            <br>
                                            {{@$serviceRequest->city->name_ar}}
                                        @endif
                                    </td>
                                    <td>
                                        {{@$serviceRequest->sectors}}
                                    </td>

                                    <td>
                                        <small>{{ showDateTime($serviceRequest->created_at,'d M Y') }}</small>
                                        <br>
                                        <small>{{ showDateTime($serviceRequest->created_at,'H:i A') }}</small>
                                    </td>
                                    <td>

                                        @php echo $serviceRequest->statusBadge; @endphp

                                     </td>
                                    <td>
                                        <div class="btn-group">
                                            <button data-bs-toggle="dropdown">
                                                <i class="fa-solid fa-ellipsis-vertical"></i>
                                            </button>
                                            <ul class="dropdown-menu dropdown-menu-end">
                                                <li>
                                                    <a href="{{ route('admin.property.form.request.show', $serviceRequest->id) }}">
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
                @if ($serviceRequests->hasPages())
                    <div class="card-footer pagination-card-footer">
                        {{ paginateLinks($serviceRequests) }}
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection

@push('breadcrumb-plugins')
    <div class="flex-wrap gap-3 d-flex">
        <x-search-form placeholder="Search" />
    </div>
@endpush

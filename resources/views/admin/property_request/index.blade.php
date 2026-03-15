@extends('admin.layouts.app', ['title' => 'Service Request'])
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
                                    <th>@lang('Sub Property Type')</th>
                                    <th>@lang('Request Date')</th>
                                    <th>@lang('Status')</th>
                                    <th>@lang('Action')</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($propertyRequests as $propertyRequest)
                                    <tr>
                                        <td>
                                            @if(app()->getLocale() == 'en')
                                                {{ $propertyRequest->name }}
                                            @else
                                                {{ $propertyRequest->name_ar }}
                                            @endif
                                        </td>
                                        <td>
                                            @if(app()->getLocale() == 'en')
                                                {{ @$propertyRequest->country->name }}
                                                <br>
                                                {{ @$propertyRequest->city->name }}
                                            @else
                                                {{ @$propertyRequest->country->name_ar }}
                                                <br>
                                                {{ @$propertyRequest->city->name_ar }}
                                            @endif
                                        </td>
                                        <td>
                                            @if(app()->getLocale() == 'en')
                                                {{ @$propertyRequest->propertyType->name }}
                                            @else
                                                {{ @$propertyRequest->propertyType->name_ar }}
                                            @endif
                                        </td>

                                        <td>
                                            @if(app()->getLocale() == 'en')
                                                {{ @$propertyRequest->subPropertyType->name }}
                                            @else
                                                {{ @$propertyRequest->subPropertyType->name_ar }}
                                            @endif
                                        </td>

                                        <td>
                                            <small>{{ showDateTime($propertyRequest->created_at, 'd M Y') }}</small>
                                            <br>
                                            <small>{{ showDateTime($propertyRequest->created_at, 'H:i A') }}</small>
                                        </td>
                                        <td>

                                            @php echo $propertyRequest->statusBadge; @endphp

                                        </td>
                                        <td>
                                            <div class="btn-group">
                                                <button data-bs-toggle="dropdown">
                                                    <i class="fa-solid fa-ellipsis-vertical"></i>
                                                </button>
                                                <ul class="dropdown-menu dropdown-menu-end">
                                                    <li>
                                                        <a href="{{ route('admin.property.request.show', $propertyRequest->id) }}">
                                                            <i class="bi bi-eye me-1"></i> @lang('Details')
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
                @if ($propertyRequests->hasPages())
                    <div class="card-footer pagination-card-footer">
                        {{ paginateLinks($propertyRequests) }}
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

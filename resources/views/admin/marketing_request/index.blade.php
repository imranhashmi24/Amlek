@extends('admin.layouts.app', ['title' => 'Marketing Request'])
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
                                    <th>@lang('Sectors')</th>
                                    <th>@lang('Country') | @lang('City')</th>
                                    <th>@lang('Job Title')</th>
                                    <th>@lang('Company')</th>
                                    <th>@lang('Request Date')</th>
                                    <th>@lang('Status')</th>
                                    <th>@lang('Action')</th>
                                </tr>
                            </thead>
                            <tbody>
                            @forelse ($marketingRequests as $marketingRequest)
                                <tr>
                                    <td>
                                        {{$marketingRequest->name}}
                                    </td>
                                    <td>
                                        {{$marketingRequest->sectors }}
                                    </td>
                                    <td>
                                        {{@$marketingRequest->country->name}}
                                        <br>
                                        {{@$marketingRequest->city->name}}
                                    </td>
                                    <td>
                                        {{@$marketingRequest->job_title}}
                                    </td>
                                     <td>
                                        {{@$marketingRequest->company}}
                                    </td>


                                    <td>
                                        <small>{{ showDateTime($marketingRequest->created_at,'d M Y') }}</small>
                                        <br>
                                        <small>{{ showDateTime($marketingRequest->created_at,'H:i A') }}</small>
                                    </td>

                                    <td>

                                        @php echo $marketingRequest->statusBadge; @endphp

                                     </td>
                                    <td>
                                        <div class="btn-group">
                                            <button data-bs-toggle="dropdown">
                                                <i class="fa-solid fa-ellipsis-vertical"></i>
                                            </button>
                                            <ul class="dropdown-menu dropdown-menu-end">
                                                <li>
                                                    <a href="{{ route('admin.marketing.request.show', $marketingRequest->id) }}">
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
                @if ($marketingRequests->hasPages())
                    <div class="card-footer pagination-card-footer">
                        {{ paginateLinks($marketingRequests) }}
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

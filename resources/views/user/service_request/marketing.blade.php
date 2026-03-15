@extends('web.layouts.master', ['title' => 'Marketing Request'])
@section('content')
    <div class="card custom-card">
        <div class="card-body">
            <div class="table-responsive--md table-responsive">
                <table class="table">
                    <thead class="table-light">
                        <tr>
                            <th>@lang('Name')</th>
                            <th>@lang('Request Date')</th>
                            <th>@lang('Status')</th>
                            <th>@lang('Action')</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($marketingRequests as $marketingRequest)
                            <tr>
                                <td>
                                    {{ $marketingRequest->name }}
                                </td>


                                <td>
                                    <small>{{ showDateTime($marketingRequest->created_at, 'd M Y') }}</small>
                                </td>

                                <td>

                                    @php echo $marketingRequest->statusBadge; @endphp

                                </td>
                                <td>
                                    <a href="{{ route('user.marketing.request.details', $marketingRequest->id) }}"
                                        class="btn btn-sm btn-outline-info">
                                        <i class="bi bi-eye me-1"></i>@lang('Details')
                                    </a>
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
@endsection

@push('title')
    <h5>@lang('Marketing Request')</h5>
@endpush

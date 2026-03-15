@extends('web.layouts.master', ['title' => 'Finance Request'])
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
                @forelse ($financeRequests as $financeRequest)
                    <tr>
                        <td>
                            {{$financeRequest->name}}
                        </td>

                        <td>
                            <small>{{ showDateTime($financeRequest->created_at,'d M Y') }}</small>
                            
                        </td>

                        <td>

                            @php echo $financeRequest->statusBadge; @endphp

                         </td>
                        <td>
                            <a href="{{ route('user.finance.request.details',$financeRequest->id) }}"
                                class="btn btn-sm btn-outline-info">
                                <i class="bi bi-eye me-1"></i>@lang('Details')
                            </a>
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
@endsection

@push('title')
    <h5>@lang('Finance Request')</h5>
@endpush

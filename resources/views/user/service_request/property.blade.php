@extends('web.layouts.master', ['title' => 'Property Request'])
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
                        @forelse ($propertyRequests as $propertyRequest)
                            <tr>
                                <td>
                                    {{ $propertyRequest->name }}
                                </td>

                                <td>
                                    <small>{{ showDateTime($propertyRequest->created_at, 'd M Y') }}</small>
                                </td>
                                <td>

                                    @php echo $propertyRequest->statusBadge; @endphp

                                </td>
                                <td>
                                    <a href="{{ route('user.property.request.details',$propertyRequest->id) }}"
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
        @if ($propertyRequests->hasPages())
            <div class="card-footer pagination-card-footer">
                {{ paginateLinks($propertyRequests) }}
            </div>
        @endif
    </div>
@endsection

@push('title')
    <h5>@lang('Properties Request')</h5>
@endpush

@extends('admin.layouts.app', ['title' => 'Business Post Request'])
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
                                    <th>@lang('Mobile Number')</th>
                                    <th>@lang('Email')</th>
                                    <th>@lang('Status')</th>
                                    <th>@lang('Action')</th>
                                   
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($businessReqs as $item)
                                    <tr>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->mobile }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td>
                                            @php echo $item->statusBadge @endphp
                                        </td>
                
                                        <td>
                                            <div class="btn-group">
                                                <button data-bs-toggle="dropdown">
                                                    <i class="fa-solid fa-ellipsis-vertical"></i>
                                                </button>
                                                <ul class="dropdown-menu dropdown-menu-end">
                                                  
                                                    <li><a href="{{ route('admin.business.request.show', $item->id) }}"> <i
                                                                class="bi bi-eye me-1"></i> @lang('Details')</a></li>
                                                </ul>
                                            </div>
                                        </td>
                                       
                                @empty
                                    <tr>
                                        <td class="text-center text-muted" colspan="100%">{{ __($emptyMessage) }}</td>
                                    </tr>
                                @endforelse

                            </tbody>
                        </table><!-- table end -->
                    </div>
                </div>
                @if ($businessReqs->hasPages())
                    <div class="card-footer pagination-card-footer">
                        {{ paginateLinks($businessReqs) }}
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
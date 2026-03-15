@extends('admin.layouts.app', ['title' => 'Business Category'])
@section('panel')
    <div class="card">
        <div class="card-body">
            <div class="table-responsive--md table-responsive">
                <table class="table">
                    <thead class="table-light">
                        <tr>
                            <th>@lang('SL')</th>
                            <th>@lang('Name')</th>
                            <th>@lang('Status')</th>
                            <th>@lang('Action')</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($businesscategories as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    {{ $item->lang('name') }}
                                </td>
                                <td>
                                    @php echo $item->statusBadge @endphp
                                </td>

                                <td>
                                    <div class="btn-group">
                                        <button data-bs-toggle="dropdown">
                                            <i class="fa-solid fa-ellipsis-vertical"></i>
                                        </button>
                                        <ul class="dropdown-menu dropdown-menu-end">
                                            <li><a href="{{ route('admin.businesscategory.edit', $item->id) }}">
                                                    <i class="bi bi-pencil me-1"></i> @lang('Edit')
                                                </a>
                                            </li>

                                            @if ($item->status == Status::ENABLE)
                                                <li>
                                                    <button class="confirmationBtn" data-question="@lang('Are you sure to Inactive Property Type?')"
                                                        data-action="{{ route('admin.businesscategory.status', $item->id) }}">
                                                        <i class="bi bi-eye-slash me-1"></i>@lang('Active')</button>
                                                </li>
                                            @else
                                                <li>
                                                    <button class="confirmationBtn" data-question="@lang('Are you sure to Inactive Property Type?')"
                                                        data-action="{{ route('admin.businesscategory.status', $item->id) }}">
                                                        <i class="bi bi-eye-slash me-1"></i>@lang('Inactive')</button>
                                                </li>
                                            @endif
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
        @if ($businesscategories->hasPages())
            <div class="card-footer pagination-card-footer">
                {{ paginateLinks($businesscategories) }}
            </div>
        @endif
    </div>
    <x-confirmation-modal />
@endsection

@push('breadcrumb-plugins')
    <div class="flex-wrap gap-3 d-flex">
        <x-search-form placeholder="Search" />
        <a href="{{ route('admin.businesscategory.create') }}" class="btn btn-primary"><i class="fa-solid fa-plus"></i>
            @lang('Add New')</a>
    </div>
@endpush

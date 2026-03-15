@extends('admin.layouts.app', ['title' => 'Business Type'])
@section('panel')
    <div class="card">
        <div class="card-body">
            <div class="table-responsive--md table-responsive">
                <table class="table">
                    <thead class="table-light">
                        <tr>
                            <th>@lang('SL')</th>
                            <th>@lang('Name')</th>
                            <th>@lang('Category')</th>
                            <th>@lang('Status')</th>
                            <th>@lang('Action')</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($BusinessTypes as $businessType)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    {{ $businessType->lang('name') }}
                                </td>
                                <td>{{ optional($businessType->businesscategory)->name }}</td>
                                <td>
                                    @php echo $businessType->statusBadge @endphp
                                </td>

                                <td>
                                    <div class="btn-group">
                                        <button data-bs-toggle="dropdown">
                                            <i class="fa-solid fa-ellipsis-vertical"></i>
                                        </button>
                                        <ul class="dropdown-menu dropdown-menu-end">
                                            <li><a href="{{ route('admin.businesstype.edit', $businessType->id) }}">
                                                    <i class="bi bi-pencil me-1"></i> @lang('Edit')
                                                </a>
                                            </li>

                                            @if ($businessType->status == Status::ENABLE)
                                                <li>
                                                    <button class="confirmationBtn" data-question="@lang('Are you sure to Inactive Property Type?')"
                                                        data-action="{{ route('admin.businesstype.status', $businessType->id) }}">
                                                        <i class="bi bi-eye-slash me-1"></i>@lang('Active')</button>
                                                </li>
                                            @else
                                                <li>
                                                    <button class="confirmationBtn" data-question="@lang('Are you sure to Inactive Property Type?')"
                                                        data-action="{{ route('admin.businesstype.status', $businessType->id) }}">
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
        @if ($BusinessTypes->hasPages())
            <div class="card-footer pagination-card-footer">
                {{ paginateLinks($BusinessTypes) }}
            </div>
        @endif
    </div>

    <x-confirmation-modal />
@endsection

@push('breadcrumb-plugins')
    <div class="flex-wrap gap-3 d-flex">
        <x-search-form placeholder="Search" />
        <a href="{{ route('admin.businesstype.create') }}" class="btn btn-primary"><i class="fa-solid fa-plus"></i>
            @lang('Add New')</a>
    </div>
@endpush

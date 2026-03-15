@extends('admin.layouts.app', ['title' => 'Property Type'])
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
                                    <th>@lang('Icon')</th>
                                    <th>@lang('Status')</th>
                                    <th>@lang('Action')</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($propertyTypes as $propertyType)
                                    <tr>
                                        <td>
                                            {{ $propertyType->lang('name') }}
                                        </td>

                                        <td>
                                            <div class="avatar avatar--sm">
                                                <img src="{{ getImage(getFilePath('propertyType') . '/' . $propertyType->icon, getFileSize('propertyType')) }}"
                                                    alt="@lang('Image')">
                                            </div>
                                        </td>
                                        <td>
                                            @php echo $propertyType->statusBadge @endphp
                                        </td>

                                        <td>
                                            <div class="btn-group">
                                                <button data-bs-toggle="dropdown">
                                                    <i class="fa-solid fa-ellipsis-vertical"></i>
                                                </button>
                                                <ul class="dropdown-menu dropdown-menu-end">
                                                    <li><a
                                                            href="{{ route('admin.property.type.edit', $propertyType->id) }}">
                                                            <i class="bi bi-pencil me-1"></i> @lang('Edit')
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a
                                                            href="{{ route('admin.property.type.show', $propertyType->id) }}">
                                                            <i class="bi bi-eye me-1"></i> @lang('Show')
                                                        </a>
                                                    </li>
                                                    @if ($propertyType->status == Status::ENABLE)
                                                        <li>
                                                            <button class="confirmationBtn"
                                                                data-question="@lang('Are you sure to Inactive Property Type?')"
                                                                data-action="{{ route('admin.property.type.status', $propertyType->id) }}">
                                                                <i
                                                                    class="bi bi-eye-slash me-1"></i>@lang('Active')</button>
                                                        </li>
                                                    @else
                                                        <li>
                                                            <button class="confirmationBtn"
                                                                data-question="@lang('Are you sure to Inactive Property Type?')"
                                                                data-action="{{ route('admin.property.type.status', $propertyType->id) }}">
                                                                <i
                                                                    class="bi bi-eye-slash me-1"></i>@lang('Inactive')</button>
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
                @if ($propertyTypes->hasPages())
                    <div class="card-footer pagination-card-footer">
                        {{ paginateLinks($propertyTypes) }}
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
        <a href="{{ route('admin.property.type.create') }}" class="btn btn-primary"><i class="fa-solid fa-plus"></i>
            @lang('Add New')</a>
    </div>
@endpush



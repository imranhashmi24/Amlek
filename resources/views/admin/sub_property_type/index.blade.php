@extends('admin.layouts.app', ['title' => 'Sub Property Type'])
@section('panel')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive--md table-responsive">
                        <table class="table">
                            <thead class="table-light">
                                <tr>
                                    <th>@lang('Icon')</th>
                                    <th>@lang('Name')</th>
                                    <th>@lang('Property Type')</th>
                                    <th>@lang('Status')</th>
                                    <th>@lang('Action')</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($subpropertyTypes as $subpropertyType)
                                    <tr>
                                        <td>
                                            <div class="avatar avatar--sm">
                                                <img src="{{ getImage(getFilePath('propertyType') . '/' . $subpropertyType->image, getFileSize('propertyType')) }}"
                                                    alt="@lang('Image')">
                                            </div>
                                        </td>
                                        <td>
                                            {{ $subpropertyType->lang('name') }}
                                        </td>

                                        <td>
                                            @if(app()->getLocale() == 'en')
                                                {{ @$subpropertyType->property_type ? $subpropertyType->property_type->name : ''  }}
                                            @else
                                                {{ @$subpropertyType->property_type ? $subpropertyType->property_type->name_ar : ''  }}
                                            @endif

                                        </td>

                                        <td>
                                            @php echo $subpropertyType->statusBadge @endphp
                                        </td>

                                        <td>
                                            <div class="btn-group">
                                                <button data-bs-toggle="dropdown">
                                                    <i class="fa-solid fa-ellipsis-vertical"></i>
                                                </button>
                                                <ul class="dropdown-menu dropdown-menu-end">
                                                    <li><a
                                                            href="{{ route('admin.sub.property.type.edit', $subpropertyType->id) }}">
                                                            <i class="bi bi-pencil me-1"></i> @lang('Edit')
                                                        </a>
                                                    </li>
                                                    {{-- <li>
                                                        <a
                                                            href="{{ route('admin.property.type.show', $propertyType->id) }}">
                                                            <i class="bi bi-eye me-1"></i> @lang('Show')
                                                        </a>
                                                    </li> --}}
                                                    @if ($subpropertyType->status == Status::ENABLE)
                                                        <li>
                                                            <button class="confirmationBtn"
                                                                data-question="@lang('Are you sure to Inactive Sub Property Type?')"
                                                                data-action="{{ route('admin.sub.property.type.status', $subpropertyType->id) }}">
                                                                <i
                                                                    class="bi bi-eye-slash me-1"></i>@lang('Active')</button>
                                                        </li>
                                                    @else
                                                        <li>
                                                            <button class="confirmationBtn"
                                                                data-question="@lang('Are you sure to Inactive Sub Property Type?')"
                                                                data-action="{{ route('admin.sub.property.type.status', $subpropertyType->id) }}">
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
                @if ($subpropertyTypes->hasPages())
                    <div class="card-footer pagination-card-footer">
                        {{ paginateLinks($subpropertyTypes) }}
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
        <a href="{{ route('admin.sub.property.type.create') }}" class="btn btn-primary"><i class="fa-solid fa-plus"></i>
            @lang('Add New')</a>
    </div>
@endpush



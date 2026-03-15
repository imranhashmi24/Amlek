@extends('admin.layouts.app', ['title' => 'Property Type Area'])
@section('panel')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive--md table-responsive">
                        <table class="table">
                            <thead class="table-light">
                                <tr>
                                    <th>@lang('Image')</th>
                                    <th>@lang('Property Type')</th>
                                    <th>@lang('Country')</th>
                                    <th>@lang('City')</th>
                                    <th>@lang('Action')</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($propertyTypeAreas as $propertyTypeArea)
                                    <tr>
                                        <td>
                                            <div
                                                class="gap-2 d-md-flex align-items-center justify-content-end justify-content-lg-start">
                                                <div class="avatar avatar--sm">
                                                    <img src="{{ getImage(getFilePath('propertyTypeArea') . '/' . $propertyTypeArea->image, getFileSize('propertyTypeArea')) }}"
                                                        alt="@lang('Image')">
                                                </div>
                                                <span>
                                                    @if (app()->getLocale() == 'en')
                                                      {{ $propertyTypeArea->name }}
                                                    @else
                                                       {{ $propertyTypeArea->name_ar }}
                                                    @endif

                                                </span>
                                            </div>

                                        </td>
                                        <td>
                                            @if (app()->getLocale() == 'en')
                                                {{ @$propertyTypeArea->propertyType->name }}
                                            @else
                                                {{ @$propertyTypeArea->propertyType->name_ar }}
                                            @endif
                                        </td>
                                        <td>
                                            @if (app()->getLocale() == 'en')
                                                {{ @$propertyTypeArea->Country->name }}
                                            @else
                                                {{ @$propertyTypeArea->Country->name_ar }}
                                            @endif
                                        </td>
                                        <td>
                                            @if (app()->getLocale() == 'en')
                                               {{ @$propertyTypeArea->city->name }}
                                            @else
                                              {{ @$propertyTypeArea->city->name_ar }}
                                            @endif

                                        </td>

                                        <td>

                                            <div class="btn-group">
                                                <button data-bs-toggle="dropdown">
                                                    <i class="fa-solid fa-ellipsis-vertical"></i>
                                                </button>
                                                <ul class="dropdown-menu dropdown-menu-end">
                                                    <li>
                                                        <a
                                                            href="{{ route('admin.property.type.area.edit', $propertyTypeArea->id) }}">
                                                            <i class="bi bi-pencil me-1"></i> @lang('Edit')
                                                        </a>
                                                    </li>
                                                    @if ($propertyTypeArea->status == Status::ENABLE)
                                                        <li>
                                                            <button class="confirmationBtn"
                                                                data-question="@lang('Are you sure to Inactive this Property Type Area?')"
                                                                data-action="{{ route('admin.property.type.area.status', $propertyTypeArea->id) }}">
                                                                <i class="bi bi-eye-slash"></i>@lang('Active')
                                                            </button>
                                                        </li>
                                                    @else
                                                        <button class="confirmationBtn"
                                                            data-question="@lang('Are you sure to Active this Property Type Area?')"
                                                            data-action="{{ route('admin.property.type.area.status', $propertyTypeArea->id) }}">
                                                            <i class="bi bi-eye"></i>@lang('Inactive')
                                                        </button>
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
                @if ($propertyTypeAreas->hasPages())
                    <div class="card-footer pagination-card-footer">
                        {{ paginateLinks($propertyTypeAreas) }}
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
        <a href="{{ route('admin.property.type.area.create') }}" class="btn btn-primary"><i class="fa-solid fa-plus"></i>
            @lang('Add New')</a>
    </div>
@endpush

@extends('admin.layouts.app', ['title' => 'Properties'])
@section('panel')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive--md table-responsive">
                        <table class="table">
                            <thead class="table-light">
                                <tr>
                                    <th>@lang('Ref.')</th>
                                    <th>@lang('Thumb Image') | @lang('Title')</th>
                                    <th>@lang('Title') (@lang('Arabic'))</th>
                                    <th>@lang('Type')</th>
                                    <th>@lang('Sub Type')</th>
                                    <th>@lang('Status')</th>
                                    <th>@lang('Created At')</th>
                                    <th>@lang('Action')</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($properties as $property)
                                    <tr>
                                        <td>
                                            <a href="{{ route('admin.properties.show', $property->id) }}">
                                                {{ $property->user ? ($property->user->ref ?? 'REF' . $property->user->created_at->format('Y') . $property->user->id) : 'No Reference' }}
                                            </a>
                                        </td>

                                        <td>
                                            <div class="gap-2 d-flex align-items-center">
                                                <div class="avatar avatar--sm">
                                                    <img src="{{ getImage(getFilePath('property_thumb') . '/' . $property->thumb_image, getFileSize('property_thumb')) }}"
                                                        alt="@lang('Image')">
                                                </div>
                                                <a
                                                    href="{{ route('admin.properties.show', $property->id) }}">{{ strLimit($property->title, 15) }}</a>
                                            </div>
                                        </td>
                                        <td><a
                                                href="{{ route('admin.properties.show', $property->id) }}">{{ strLimit($property->title_ar, 15) }}</a>
                                        </td>
                                        <td>
                                            @if (app()->getLocale() == 'en')
                                                {{ optional($property->propertyType)->name }}
                                            @else
                                                {{ optional($property->propertyType)->name_ar }}
                                            @endif
                                        </td>
                                        
                                        <td>
                                            @if (app()->getLocale() == 'en')
                                                {{ optional($property->subPropertyType)->name }}
                                            @else
                                                {{ optional($property->subPropertyType)->name_ar }}
                                            @endif
                                        </td>
                                        <td>

                                            @php echo $property->statusBadge; @endphp

                                        </td>
                                        <td>
                                            <small>{{ showDateTime($property->created_at, 'd M Y') }}</small>
                                            <br>
                                            <small>{{ showDateTime($property->created_at, 'H:i A') }}</small>
                                        </td>
                                        <td>

                                            <div class="btn-group">
                                                <button data-bs-toggle="dropdown">
                                                    <i class="fa-solid fa-ellipsis-vertical"></i>
                                                </button>
                                                <ul class="dropdown-menu dropdown-menu-end">
                                                    <li><a href="{{ route('admin.properties.edit', $property->id) }}">
                                                            <i class="bi bi-pencil me-1"></i> @lang('Edit')
                                                        </a>
                                                    </li>
                                                    <li><a href="{{ route('admin.properties.show', $property->id) }}"> <i
                                                                class="bi bi-eye me-1"></i> @lang('Details')</a></li>
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
                @if ($properties->hasPages())
                    <div class="card-footer pagination-card-footer">
                        {{ paginateLinks($properties) }}
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection

@push('breadcrumb-plugins')
    <div class="flex-wrap gap-3 d-flex">
        <x-search-form placeholder="Search" />
        <a href="{{ route('admin.properties.create') }}" class="btn btn-primary"><i class="fa-solid fa-plus"></i> @lang('Add New')</a>
    </div>
@endpush

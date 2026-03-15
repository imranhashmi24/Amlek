@extends('web.layouts.master', ['title' => 'Favorite Properties'])
@section('content')
<div class="card custom-card">
    <div class="card-body">
        <div class="table-responsive--md table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th> @lang('Title') </th>
                        <th>@lang('Type')</th>
                        <th>@lang('Status')</th>
                        <th>@lang('Action')</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($properties as $property)
                        <tr>
                            <td>
                                <div class="gap-2 d-flex align-items-center">

                                    <a href="{{ route('user.properties.show', $property->id) }}">{{ strLimit($property->lang('title'), 15) }}</a>
                                </div>
                            </td>
                            <td>{{ optional($property->propertyType)->lang('name') }}</td>

                            <td>

                                @php echo $property->statusBadge; @endphp

                            </td>
                            <td>
                                <div>
                                    <button
                                        class="btn btn-sm btn-outline-danger confirmationBtn"
                                        data-question="@lang('Are you sure to Remove Favorite Property?')"
                                        data-action="{{ route('user.favorite.remove', $property->id) }}">
                                        <i class="bi bi-trash me-1"></i>@lang('Remove Favorite')
                                    </button>

                                    <a href="{{ route('user.properties.show', $property->id) }}"
                                        class="btn btn-sm btn-outline-info">
                                        <i class="bi bi-eye me-1"></i>@lang('Details')
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td class="text-center text-muted" colspan="100%">{{ __($emptyMessage) }}
                            </td>
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

    <x-confirmation-modal />
@endsection

@push('breadcrumb-plugins')
    <div class="flex-wrap gap-3 d-flex">
        <x-search-form placeholder="Search" />
        <a href="{{ route('admin.properties.create') }}" class="btn btn-primary"><i class="fa-solid fa-plus"></i> Add
            New</a>
    </div>
@endpush

@push('title')
<h5>@lang('Properties')</h5>
@endpush

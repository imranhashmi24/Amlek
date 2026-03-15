@extends('admin.layouts.app', ['title' => 'Business Post'])
@section('panel')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive--md table-responsive">
                        <table class="table">
                            <thead class="table-light">
                                <tr>
                                    <th>@lang('Title')</th>
                                    <th>@lang('Title') (@lang('Arabic'))</th>
                                    <th>@lang('Category')</th>
                                    <th>@lang('Type')</th>
                                    <th>@lang('Status')</th>
                                    <th>@lang('Created At')</th>
                                    <th>@lang('Action')</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($businessposts as $item)
                                    <tr>
                                        <td>{{ $item->title }}</td>
                                        <td>
                                            <a href="{{ route('admin.businesspost.show', $item->id) }}">
                                                {{ strLimit($item->title_ar, 15) }}
                                            </a>
                                        </td>
                                        <td>
                                            @if (app()->getLocale() == 'en')
                                                {{ optional($item->businesscategory)->name }}
                                            @else
                                                {{ optional($item->businesscategory)->name_ar }}
                                            @endif
                                        </td>
                                        <td>
                                            @if (app()->getLocale() == 'en')
                                                {{ optional($item->businesstype)->name }}
                                            @else
                                                {{ optional($item->businesstype)->name_ar }}
                                            @endif
                                        </td>
                                        <td>
                                            @php echo $item->statusBadge; @endphp
                                        </td>
                                        <td>
                                            <small>{{ showDateTime($item->created_at, 'd M Y') }}</small>
                                            <br>
                                            <small>{{ showDateTime($item->created_at, 'H:i A') }}</small>
                                        </td>
                                        <td>

                                            <div class="btn-group">
                                                <button data-bs-toggle="dropdown">
                                                    <i class="fa-solid fa-ellipsis-vertical"></i>
                                                </button>
                                                <ul class="dropdown-menu dropdown-menu-end">
                                                    <li><a href="{{ route('admin.businesspost.edit', $item->id) }}">
                                                            <i class="bi bi-pencil me-1"></i> @lang('Edit')
                                                        </a>
                                                    </li>
                                                    <li><a href="{{ route('admin.businesspost.show', $item->id) }}"> <i
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
                @if ($businessposts->hasPages())
                    <div class="card-footer pagination-card-footer">
                        {{ paginateLinks($businessposts) }}
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection

@push('breadcrumb-plugins')
    <div class="flex-wrap gap-3 d-flex">
        <x-search-form placeholder="Search" />
        <a href="{{ route('admin.businesspost.create') }}" class="btn btn-primary"><i class="fa-solid fa-plus"></i>
            @lang('Add New')</a>
    </div>
@endpush

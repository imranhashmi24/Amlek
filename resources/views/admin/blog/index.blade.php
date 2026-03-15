@extends('admin.layouts.app', ['title' => 'Blogs'])
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
                                    <th>@lang('Title')</th>
                                    <th>@lang('Status')</th>
                                    <th>@lang('Action')</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($blogs as $blog)
                                    <tr>

                                        <td>
                                            <div class="avatar avatar--sm">
                                                <img src="{{ getImage(getFilePath('blog') . '/' . $blog->image) }}"
                                                    alt="Image">
                                            </div>
                                        </td>
                                        <td> {{ $blog->lang('title') }} </td>
                                        <td> {{ $blog->status }}</td>
                                        <td>
                                            <div class="btn-group">
                                                <button data-bs-toggle="dropdown">
                                                    <i class="fa-solid fa-ellipsis-vertical"></i>
                                                </button>
                                                <ul class="dropdown-menu dropdown-menu-end">
                                                    <li>
                                                        <a href="{{ route('admin.blog.edit', $blog->id) }}">
                                                            <i class="bi bi-pencil"></i>@lang('Edit')
                                                        </a>
                                                    </li>

                                                    @if ($blog->status == 'active')
                                                        <li>

                                                            <button class="confirmationBtn"
                                                                data-question="@lang('Are you sure to inactive this blog?')"
                                                                data-action="{{ route('admin.blog.status', $blog->id) }}">
                                                                <i class="bi bi-eye pe-1"></i>@lang('Inactive')
                                                            </button>
                                                        </li>
                                                    @else
                                                        <li>

                                                            <button class="confirmationBtn"
                                                                data-question="@lang('Are you sure to active this blog?')"
                                                                data-action="{{ route('admin.blog.status', $blog->id) }}">
                                                                <i class="bi bi-eye-slash pe-1"></i>@lang('Active')
                                                            </button>
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
                @if ($blogs->hasPages())
                    <div class="card-footer pagination-card-footer">
                        {{ paginateLinks($blogs) }}
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
        <a href="{{ route('admin.blog.create') }}" class="btn btn-primary"> <i
                class="bi bi-plus-lg pe-2"></i>@lang('Add New')</a>
    </div>
@endpush

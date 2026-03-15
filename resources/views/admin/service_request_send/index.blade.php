@extends('admin.layouts.app', ['title' => 'Property Request Send'])
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
                                    <th>@lang('Email')</th>
                                    <th>@lang('Mobile')</th>
                                    <th>@lang('Job Title')</th>
                                    <th>@lang('Message')</th>
                                    <th>@lang('Created At')</th>
                                    <th>@lang('Status')</th>
                                    <th>@lang('Action')</th>
                                </tr>
                            </thead>
                            <tbody>
                            @forelse ($propertyRequestSends as $propertyRequestSend)
                                <tr>
                                    <td>
                                        {{$propertyRequestSend->name}} </br>
                                        <a href="{{ $propertyRequestSend->user_id ? route('admin.users.detail', $propertyRequestSend->user_id) : '' }}"><span>@</span>{{ @$propertyRequestSend?->user?->username }}</a>
                                    </td>
                                    <td>
                                        {{$propertyRequestSend->email}}
                                    </td>
                                    <td>
                                        {{$propertyRequestSend->mobile}}
                                    </td>
                                    <td>
                                        {{$propertyRequestSend->job_title}}
                                    </td>
                                    <td>
                                        {{ Str::limit($propertyRequestSend->message, '10', '...')}}
                                    </td>
                                    <td>
                                        <small>{{ showDateTime($propertyRequestSend->created_at,'d M Y') }}</small>
                                        <br>
                                        <small>{{ showDateTime($propertyRequestSend->created_at,'H:i A') }}</small>
                                    </td>
                                    <td>

                                        @php echo $propertyRequestSend->statusBadge; @endphp

                                     </td>
                                    <td>
                                        <div class="btn-group">
                                            <button data-bs-toggle="dropdown">
                                                <i class="fa-solid fa-ellipsis-vertical"></i>
                                            </button>
                                            <ul class="dropdown-menu dropdown-menu-end">
                                                <li>
                                                    <a href="{{ route('admin.property-request.send.show', $propertyRequestSend->id) }}">
                                                        <i class="bi bi-eye"></i>@lang('Details')
                                                    </a>
                                                </li>

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
                @if ($propertyRequestSends->hasPages())
                    <div class="card-footer pagination-card-footer">
                        {{ paginateLinks($propertyRequestSends) }}
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

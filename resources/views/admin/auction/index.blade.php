@extends('admin.layouts.app', ['title' => 'Auctions'])
@section('panel')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive--md table-responsive">
                        <table class="table">
                            <thead class="table-light">
                                <tr>

                                    <th>@lang('Thumb Image') | @lang('Title')</th>
                                    <th>@lang('Title') (@lang('Arabic'))</th>
                                    <th>@lang('Total Project')</th>
                                    <th>@lang('Auction Day')</th>
                                    <th>@lang('Auction Date')</th>
                                    <th>@lang('Beginning Time')</th>
                                    <th>@lang('Status')</th>
                                    <th>@lang('Created At')</th>
                                    <th>@lang('Action')</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($auctions as $auction)
                                    <tr>
                                        <td>
                                            <div class="gap-2 d-flex align-items-center">
                                                <div class="avatar avatar--sm">
                                                    <img src="{{ getImage(getFilePath('auction_thumb') . '/' . $auction->thumb_image, getFileSize('auction_thumb')) }}"
                                                        alt="@lang('Image')">
                                                </div>
                                                <a
                                                    href="{{ route('admin.auction.show', $auction->id) }}">{{ strLimit($auction->title, 15) }}</a>
                                            </div>
                                        </td>
                                        <td><a
                                                href="{{ route('admin.auction.show', $auction->id) }}">{{ strLimit($auction->title_ar, 15) }}</a>
                                        </td>

                                        <td>
                                            <span class="badge bg-primary">{{ optional($auction->properties)->count() }}</span>
                                        </td>

                                        <td>
                                            <span class="badge bg-primary">{{ @$auction->auction_day }}</span>
                                        </td>

                                        <td>
                                            <small>{{ showDateTime($auction->auction_date, 'd M Y') }}</small>
                                        </td>

                                        <td>
                                            <small>{{ showDateTime($auction->beginning_time, 'd M Y') }}</small>
                                            <br>
                                            <small>{{ showDateTime($auction->beginning_time, 'H:i A') }}</small>
                                        </td>

                                        <td>
                                            @php echo $auction->statusBadge; @endphp
                                        </td>

                                        <td>
                                            <small>{{ showDateTime($auction->created_at, 'd M Y') }}</small>
                                            <br>
                                            <small>{{ showDateTime($auction->created_at, 'H:i A') }}</small>
                                        </td>

                                        <td>

                                            <div class="btn-group">
                                                <button data-bs-toggle="dropdown">
                                                    <i class="fa-solid fa-ellipsis-vertical"></i>
                                                </button>
                                                <ul class="dropdown-menu dropdown-menu-end">
                                                    <li><a href="{{ route('admin.auction.edit', $auction->id) }}">
                                                            <i class="bi bi-pencil me-1"></i> @lang('Edit')
                                                        </a>
                                                    </li>
                                                    <li><a href="{{ route('admin.auction.show', $auction->id) }}"> <i
                                                                class="bi bi-eye me-1"></i> @lang('Details')</a></li>

                                                    <li><a href="{{ route('admin.bidding.board.show', $auction->id) }}"> <i
                                                        class="bi bi-eye me-1"></i> @lang('See Bidding Board')</a></li>
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
                @if ($auctions->hasPages())
                    <div class="card-footer pagination-card-footer">
                        {{ paginateLinks($auctions) }}
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection

@push('breadcrumb-plugins')
    <div class="flex-wrap gap-3 d-flex">
        <x-search-form placeholder="Search" />
        <a href="{{ route('admin.auction.create') }}" class="btn btn-primary"><i class="fa-solid fa-plus"></i> @lang('Add New')</a>
    </div>
@endpush

@extends('admin.layouts.app', ['title' => 'Auction Details'])
@section('panel')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <div class="border shadow-none card">
                                <div class="p-0 card-body">
                                    @if ($auction->user)
                                        <div class="card-list">
                                            <span>@lang('Creator User')</span>
                                            <b>{{ optional($auction->create_by)->name }}</b>
                                        </div>
                                    @endif
                                    <div class="card-list">
                                        <span>@lang('Title')</span>
                                        <b>{{ $auction->title }}</b>
                                    </div>
                                    <div class="card-list">
                                        <span>@lang('Title ar')</span>
                                        <b>{{ $auction->title_ar }}</b>
                                    </div>

                                    <div class="card-list">
                                        <span>@lang('Total Project')</span>
                                        <b>{{ optional($auction->properties)->count() }}</b>
                                    </div>
                                    <div class="card-list">
                                        <span>@lang('Auction Day')</span>
                                        <b>{{ @$auction->auction_day }}</b>
                                    </div>
                                    <div class="card-list">
                                        <span>@lang('Auction Date')</span>
                                        <b><small>{{ showDateTime($auction->auction_date, 'd M Y') }}</small></b>
                                    </div>
                                    <div class="card-list">
                                        <span>@lang('Beginning Time')</span>
                                        <b><small>{{ showDateTime($auction->beginning_time, 'd M Y') }}</small>
                                            <br>
                                            <small>{{ showDateTime($auction->beginning_time, 'H:i A') }}</small>
                                        </b>
                                    </div>
                                    <div class="card-list">
                                        <span>@lang('Status')</span>
                                        <b>@php echo $auction->statusBadge; @endphp</b>
                                    </div>
                                    <div class="card-list">
                                        <span>@lang('Created At')</span>
                                        <b> <small>{{ showDateTime($auction->created_at, 'd M Y') }}</small>
                                            <br>
                                            <small>{{ showDateTime($auction->created_at, 'H:i A') }}</small>
                                        </b>
                                    </div>

                                    <div class="card-list">
                                        <b>@lang('Auction Project Lists')</b>
                                    </div>
                                    @if($auction->properties)
                                        @foreach ($auction->properties as $auction_property)
                                            <div class="card-list">
                                                <b><a href="{{ route('admin.properties.show', $auction_property->property_id) }}">
                                                    @if (app()->getLocale() == 'en')
                                                        {{ $auction_property->property->title }}
                                                    @else
                                                        {{ $auction_property->property->title_ar }}
                                                    @endif
                                                </a></b>
                                            </div>
                                        @endforeach
                                    @endif

                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="border shadow-none card">
                            <div class="card-header">
                                    <h5>@lang('Images')</h5>
                                </div>
                                <div class="card-body">
                                    <div>
                                        <h6 class="pb-2">@lang('Thumb Image') :</h6>
                                        <div class="property-image">
                                            <a
                                                href="{{ getImage(getFilePath('auction_thumb') . '/' . $auction->thumb_image, getFileSize('auction_thumb')) }}">
                                                <img src="{{ getImage(getFilePath('auction_thumb') . '/' . $auction->thumb_image, getFileSize('auction_thumb')) }}"
                                                    alt="@lang('Image')">
                                            </a>
                                        </div>
                                    </div>

                                    <div class="mt-4">
                                        <h6 class="pb-2">@lang('Images') :</h6>
                                        <div class="property-image">
                                            @foreach ($auctionImages as $image)
                                                <a
                                                    href="{{ getImage(getFilePath('auction') . '/' . $image->image, getFileSize('auction')) }}">
                                                    <img src="{{ getImage(getFilePath('auction') . '/' . $image->image, getFileSize('auction')) }}"
                                                        alt="@lang('Image')">
                                                </a>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="mt-4 border shadow-none card">
                                <div class="card-header">
                                    <h5>@lang('Locations')</h5>
                                </div>
                                <div class="card-body">
                                    <div class="card-list">
                                        <span>@lang('Country')</span>
                                        <b>
                                            @if (app()->getLocale() == 'en')
                                                {{ optional($auction->country)->name }}
                                            @else
                                                {{ optional($auction->country)->name_ar }}
                                            @endif

                                        </b>
                                    </div>
                                    <div class="card-list">
                                        <span>@lang('City')</span>
                                        <b>
                                            @if (app()->getLocale() == 'en')
                                                {{ optional($auction->city)->name }}
                                            @else
                                                {{ optional($auction->city)->name_ar }}
                                            @endif
                                        </b>
                                    </div>
                                    <div>
                                        @include('web.component.auction_map')
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="border shadow-none card">
                                <div class="card-header">
                                    <h6>@lang('Description')</h6>
                                </div>
                                <div class="card-body">
                                    @php echo $auction->description @endphp
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="border shadow-none card">
                                <div class="card-header">
                                    <h6>@lang('Description') @lang('Arabic')</h6>
                                </div>
                                <div class="card-body">
                                    @php echo $auction->description_ar @endphp
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>

    <x-confirmation-modal />
@endsection

@push('breadcrumb-plugins')
    <div class="flex-wrap gap-2 d-flex">
        <a href="{{ route('admin.auction.index') }}" class="btn btn-primary"><i
                class="bi bi-arrow-clockwise pe-1"></i>@lang('Back')</a>

        <a href="{{ route('admin.auction.status', [$auction->id, Status::PENDING]) }}" class="btn btn-warning"><i
                class="bi bi-x pe-1"></i>@lang('Pending')</a>
        <a href="{{ route('admin.auction.status', [$auction->id, Status::CURRENT]) }}" class="btn btn-primary"><i
                class="bi bi-check2 pe-1"></i>@lang('Current')</a>
        <a href="{{ route('admin.auction.status', [$auction->id, Status::FINISHED]) }}" class="btn btn-success"><i
                    class="bi bi-check2 pe-1"></i>@lang('Finished')</a>
        <a href="{{ route('admin.auction.status', [$auction->id, Status::UPCOMING]) }}" class="btn btn-info"><i
            class="bi bi-check2 pe-1"></i>@lang('Upcoming')</a>

    </div>
@endpush


@push('style-lib')
    <link rel="stylesheet" href="{{ asset('assets/global/css/magnific-popup.css') }}">
@endpush

@push('script-lib')
    <script src="{{ asset('assets/global/js/magnific-popup.js') }}"></script>
@endpush


@push('script')
    <script>
        $('.property-image').each(function() { // the containers for all your galleries
            $(this).magnificPopup({
                delegate: 'a', // the selector for gallery item
                type: 'image',
                gallery: {
                    enabled: true
                }
            });
        });
    </script>
@endpush



@push('style')
    <style>
        .card-body .card-list {
            display: flex;
            padding: 8px;
            flex-wrap: nowrap;
            border-bottom: 1px solid #cccccc;
            justify-content: space-between;

        }

        .card-body .card-list:last-child {
            border-bottom: none;
        }

        .property-image {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
        }

        .property-image>a {
            width: 170px;
            display: flex;
            border: 1px solid #cccccc;
            border-radius: 5px;
            overflow: hidden;
        }

        .property-image img {
            width: 100%;
        }
    </style>
@endpush

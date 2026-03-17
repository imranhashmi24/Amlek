@extends('web.layouts.frontend', ['title' => isset($category) ? $category->name . ' Auctions' : __('All Auctions')])

@section('content')
	<section class="auction-header">
		<div class="container text-center">
			<h2>{{ isset($category) ? $category->name : __('All Auctions') }}</h2>
			<p>@lang('Home') // {{ isset($category) ? $category->name : __('Auctions') }} // @lang('Browse all')</p>
		</div>
	</section>

	<section class="auction-filter">
		<div class="container">
			<form action="{{ route($routes['auctions'], ['slug' => $category->slug ?? null]) }}" method="GET">
				<input type="hidden" name="type" value="{{ $type ?? 'all' }}">

				<div class="row g-3 align-items-center">
					<div class="col-md">
						<select name="category_id" class="form-select custom-select">
							<option value="">@lang('Auction Category')</option>
							@foreach ($categories ?? [] as $cat)
								<option value="{{ $cat->id }}" @selected(request('category_id') == $cat->id)>
									{{ app()->getLocale() == 'en' ? $cat->name : $cat->name_ar }}
								</option>
							@endforeach
						</select>
					</div>

					<div class="col-md">
						<select name="condition" class="form-select custom-select">
							<option value="">@lang('Condition')</option>
							{{-- Populate with actual conditions if needed --}}
						</select>
					</div>

					<div class="col-md">
						<select name="brand" class="form-select custom-select">
							<option value="">@lang('Brand')</option>
							{{-- Populate with brands if needed --}}
						</select>
					</div>

					<div class="col-md">
						<select name="year" class="form-select custom-select">
							<option value="">@lang('Year')</option>
							{{-- Populate with years if needed --}}
						</select>
					</div>

					<div class="col-md">
						<select name="country_id" class="form-select custom-select">
							<option value="">@lang('Country')</option>
							@foreach ($countries ?? [] as $country)
								<option value="{{ $country->id }}" @selected(request('country_id') == $country->id)>
									{{ app()->getLocale() == 'en' ? $country->name : $country->name_ar }}
								</option>
							@endforeach
						</select>
					</div>

					<div class="col-md-auto">
						<button type="submit" class="btn btn-search w-100">
							@lang('Search')
						</button>
					</div>
				</div>
			</form>
		</div>
	</section>

	<section class="auction-list">
		<div class="container">
			<div class="row g-4">
				@forelse ($auctions as $auction)
					<div class="col-lg-3 col-md-4 col-sm-6">
						<div class="auction-card">
							<div class="auction-img">
								<img
									src="{{ getImage(getFilePath('auction_thumb') . '/' . $auction->thumb_image, getFileSize('auction_thumb')) }}"
									alt="{{ $auction->title }}"
									onerror="this.src='https://via.placeholder.com/400x250/424242/cccccc?text=No+Image'">

								<span class="auction-days">
									{{ \Carbon\Carbon::now()->diffInDays($auction->end_date, false) }} @lang('DAYS')
								</span>
							</div>

							<div class="auction-content">
								<h6 class="auction-title">
									@if (app()->getLocale() == 'en')
										{{ $auction->title }}
									@else
										{{ $auction->title_ar }}
									@endif
								</h6>

								<div class="auction-feature">
									<div class="feature-row-full">
										<i class="bi bi-check2"></i>
										@lang('Comprehensive Inspection')
									</div>
									<div class="feature-row-split">
										<span>
											<i class="bi bi-clock"></i> @lang('Live Bidding')
										</span>
										<span>
											<i class="bi bi-truck"></i> @lang('Delivery Options')
										</span>
									</div>
								</div>

								<div class="auction-footer">
									<div class="price-info">
										<span class="starting-label">@lang('Starting at'):</span>
										<div class="auction-price">{{ showAmount($auction->starting_price ?? 0) }}</div>
									</div>

									@if ($auction->status == 3)
										<span class="btn-closed">@lang('Closed')</span>
									@else
										<a href="{{ route('auction.details', $auction->slug) }}" class="btn-bid">
											@lang('Bid Now')
										</a>
									@endif
								</div>
							</div>
						</div>
					</div>
				@empty
					<div class="col-12 text-center py-5">
						<p class="text-muted">@lang('No auctions found.')</p>
					</div>
				@endforelse
			</div>

			<div class="mt-4">
				{{ $auctions->appends(request()->query())->links() }}
			</div>
		</div>
	</section>
@endsection

@push('style')
	<style>
		body {
			background: #f4f6f9;
		}

		.auction-header {
			background: linear-gradient(to right, #0b192c, #0a3d4f, #0b192c);
			padding: 70px 0;
			color: white;
		}

		.auction-header h2 {
			font-weight: 700;
			margin-bottom: 8px;
			font-size: 28px;
		}

		.auction-header p {
			font-size: 13px;
			color: #e0e0e0;
			margin: 0;
		}

		.auction-filter {
			background: #fff;
			padding: 20px;
			margin-top: -45px;
			margin-bottom: 40px;
			border-radius: 6px;
			box-shadow: 0 5px 20px rgba(0, 0, 0, 0.04);
		}

		.custom-select {
			font-size: 14px;
			color: #555;
			border: 1px solid #e0e0e0;
			box-shadow: none;
		}

		.custom-select:focus {
			border-color: #ff6a00;
			box-shadow: none;
		}

		.btn-search {
			background: #ff6a00;
			color: white;
			padding: 9px 35px;
			font-weight: 500;
			border-radius: 4px;
		}

		.btn-search:hover {
			background: #e65c00;
			color: white;
		}

		.auction-card {
			background: white;
			border-radius: 12px;
			overflow: hidden;
			border: 1px solid #f0f0f0;
			transition: .3s;
			height: 100%;
			box-shadow: 0 4px 15px rgba(0, 0, 0, 0.02);
		}

		.auction-card:hover {
			transform: translateY(-5px);
			box-shadow: 0 15px 35px rgba(0, 0, 0, 0.08);
		}

		.auction-img {
			background: #ffffff;
			padding: 20px;
			position: relative;
			border-bottom: 1px solid #f8f8f8;
		}

		.auction-img img {
			width: 100%;
			height: 140px;
			object-fit: contain;
		}

		.auction-days {
			position: absolute;
			top: 15px;
			left: 15px;
			background: #39185a;
			color: white;
			padding: 4px 10px;
			font-size: 11px;
			font-weight: 600;
			border-radius: 4px;
			letter-spacing: 0.5px;
		}

		.auction-content {
			padding: 16px 20px 20px 20px;
		}

		.auction-title {
			font-size: 14px;
			font-weight: 700;
			color: #222;
			margin-bottom: 15px;
			line-height: 1.4;
			height: 40px;
			overflow: hidden;
			display: -webkit-box;
			-webkit-line-clamp: 2;
			-webkit-box-orient: vertical;
		}

		.auction-feature {
			margin-bottom: 15px;
			padding-bottom: 15px;
			border-bottom: 1px solid #f0f0f0;
		}

		.auction-feature .feature-row-full {
			font-size: 11px;
			color: #444;
			margin-bottom: 6px;
			font-weight: 500;
		}

		.auction-feature .feature-row-split {
			display: flex;
			align-items: center;
			gap: 12px;
			font-size: 11px;
			color: #444;
			font-weight: 500;
		}

		.auction-feature i {
			color: #333;
			margin-right: 4px;
			font-size: 12px;
		}

		.auction-footer {
			display: flex;
			justify-content: space-between;
			align-items: flex-end;
		}

		.price-info {
			display: flex;
			flex-direction: column;
		}

		.starting-label {
			font-size: 10px;
			color: #888;
			margin-bottom: 2px;
		}

		.auction-price {
			color: #5d1b8c;
			font-weight: 700;
			font-size: 14px;
		}

		.btn-bid {
			background: #5d1b8c;
			color: white;
			padding: 7px 18px;
			border-radius: 4px;
			font-size: 12px;
			font-weight: 600;
			text-decoration: none;
			transition: 0.2s;
		}

		.btn-bid:hover {
			background: #46146b;
			color: white;
		}

		.btn-closed {
			background: #e95322;
			color: white;
			padding: 7px 18px;
			border-radius: 4px;
			font-size: 12px;
			font-weight: 600;
			text-decoration: none;
			transition: 0.2s;
			cursor: default;
		}

		.btn-closed:hover {
			background: #c94317;
			color: white;
		}

		@media (max-width:768px) {
			.auction-img img {
				height: 130px;
			}

			.auction-filter {
				margin-top: -20px;
			}
		}
	</style>
@endpush

<div class="dark-page-wrapper">
	<div class="container py-5">

		@foreach ($categories as $category)
			@if ($category->auctions->count())
				<section class="auction-category-section mb-5">
					<div class="section-header d-flex justify-content-between align-items-end mb-4">
						<div class="header-text">
							<h3 class="section-title">
								{{ app()->getLocale() == 'en' ? $category->name : $category->name_ar }}
							</h3>
							<p class="section-subtitle mb-0">
								@lang('Discover premium items from our large selection.')
							</p>
						</div>
						<div class="header-actions d-none d-md-flex gap-2">
							<a href="{{ route('auctions', ['slug' => $category->slug]) }}" class="btn btn-outline-dark-custom">
								@lang('Browse All')
							</a>
						</div>
					</div>

					<div class="row g-4">
						@foreach ($category->auctions->take(6) as $auction)
							<div class="col-lg-4 col-md-6">
								<div class="dark-theme-card">
									<div class="card-img-wrap">
										<img
											src="{{ getImage(getFilePath('auction_thumb') . '/' . $auction->thumb_image, getFileSize('auction_thumb')) }}"
											alt="{{ $auction->title }}"
											onerror="this.src='https://via.placeholder.com/400x250/424242/cccccc?text=No+Image'">

										<div class="timer-bar" data-end="{{ $auction->auction_date }}">
											<div class="time-segment"><span class="time-val days">00</span><span
													class="time-label">@lang('Days')</span></div>
											<div class="time-segment"><span class="time-val hours">00</span><span
													class="time-label">@lang('Hours')</span></div>
											<div class="time-segment"><span class="time-val minutes">00</span><span
													class="time-label">@lang('Mins')</span></div>
											<div class="time-segment"><span class="time-val seconds">00</span><span
													class="time-label">@lang('Secs')</span></div>
										</div>
									</div>

									<div class="card-info">
										<h6 class="card-title">{{ Str::limit($auction->title, 60) }}</h6>

										<div class="card-features">
											@if ($auction->inspection ?? false)
												<div class="feature-item"><i class="bi bi-shield-check"></i> @lang('Comprehensive Inspection')</div>
											@endif
											<div class="feature-item"><i class="bi bi-geo-alt"></i> {{ optional($auction->city)->name ?? __('Unknown') }}
											</div>
											<div class="feature-item"><i class="bi bi-clock-history"></i> @lang('Live Bidding')</div>
										</div>

										<div class="card-footer-box">
											<div class="price-data">
												<span class="price-label">@lang('Starting at')</span>
												<span class="price-amount">{{ showAmount($auction->starting_price ?? 0) }}</span>
											</div>

											@if ($auction->status == 3)
												<button class="btn btn-closed-orange" disabled>@lang('Closed')</button>
											@else
												<a href="{{ route('auction.details', $auction->slug) }}" class="btn btn-bid-purple">@lang('Bid Now')</a>
											@endif
										</div>
									</div>
								</div>
							</div>
						@endforeach
					</div>
				</section>
			@endif
		@endforeach

	</div>
</div>

@push('script')
	<script>
		function updateTimers() {
			document.querySelectorAll('.timer-bar').forEach(timerBar => {
				const endTime = new Date(timerBar.dataset.end).getTime();
				const now = new Date().getTime();
				const distance = endTime - now;

				if (distance < 0) {
					timerBar.querySelector('.days').textContent = '00';
					timerBar.querySelector('.hours').textContent = '00';
					timerBar.querySelector('.minutes').textContent = '00';
					timerBar.querySelector('.seconds').textContent = '00';
					return;
				}

				const days = Math.floor(distance / (1000 * 60 * 60 * 24));
				const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
				const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
				const seconds = Math.floor((distance % (1000 * 60)) / 1000);

				timerBar.querySelector('.days').textContent = days.toString().padStart(2, '0');
				timerBar.querySelector('.hours').textContent = hours.toString().padStart(2, '0');
				timerBar.querySelector('.minutes').textContent = minutes.toString().padStart(2, '0');
				timerBar.querySelector('.seconds').textContent = seconds.toString().padStart(2, '0');
			});
		}

		setInterval(updateTimers, 1000);
		updateTimers();
	</script>
@endpush

@push('style')
	<style>
		.dark-page-wrapper {
			background-color: transparent;
			color: #424242;
			font-family: 'Inter', sans-serif;
		}

		.section-title {
			font-size: 24px;
			font-weight: 700;
			color: #424242;
			margin-bottom: 6px;
		}

		.section-subtitle {
			font-size: 13px;
			color: #888888;
		}

		.btn-outline-dark-custom {
			background: transparent;
			border: 1px solid #333333;
			color: #aaaaaa;
			font-size: 12px;
			padding: 6px 16px;
			border-radius: 6px;
			transition: 0.3s;
			text-decoration: none;
		}

		.btn-outline-dark-custom:hover {
			background: #222222;
			color: #ffffff;
			border-color: #555555;
		}

		.dark-theme-card {
			background-color: #ffffff;
			border-radius: 12px;
			overflow: hidden;
			display: flex;
			flex-direction: column;
			height: 100%;
			transition: transform 0.3s ease;
			box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
		}

		.dark-theme-card:hover {
			transform: translateY(-5px);
		}

		.card-img-wrap {
			position: relative;
			background-color: #ffffff;
			padding-bottom: 10px;
		}

		.card-img-wrap img {
			width: 100%;
			height: 180px;
			object-fit: contain;
			padding: 15px;
		}

		.timer-bar {
			position: absolute;
			bottom: 10px;
			left: 5%;
			width: 90%;
			background-color: #6a329f;
			border-radius: 8px;
			display: flex;
			justify-content: space-between;
			padding: 8px 15px;
			box-shadow: 0 4px 10px rgba(0, 0, 0, 0.15);
		}

		.time-segment {
			display: flex;
			flex-direction: column;
			align-items: center;
			color: #ffffff;
		}

		.time-val {
			font-size: 13px;
			font-weight: 700;
			line-height: 1;
			margin-bottom: 2px;
		}

		.time-label {
			font-size: 9px;
			text-transform: uppercase;
			opacity: 0.8;
		}

		.card-info {
			padding: 20px;
			display: flex;
			flex-direction: column;
			flex-grow: 1;
		}

		.card-title {
			color: #111111;
			font-weight: 700;
			font-size: 15px;
			line-height: 1.4;
			margin-bottom: 15px;
			height: 42px;
			overflow: hidden;
			display: -webkit-box;
			-webkit-line-clamp: 2;
			-webkit-box-orient: vertical;
		}

		.card-features {
			display: flex;
			flex-wrap: wrap;
			gap: 10px 15px;
			margin-bottom: 20px;
		}

		.feature-item {
			font-size: 11px;
			color: #555555;
			display: flex;
			align-items: center;
		}

		.feature-item i {
			font-size: 13px;
			margin-right: 5px;
			color: #888888;
		}

		.card-footer-box {
			margin-top: auto;
			display: flex;
			justify-content: space-between;
			align-items: flex-end;
			border-top: 1px solid #f0f0f0;
			padding-top: 15px;
		}

		.price-data {
			display: flex;
			flex-direction: column;
		}

		.price-label {
			font-size: 10px;
			color: #888888;
			margin-bottom: 2px;
		}

		.price-amount {
			color: #6a329f;
			font-weight: 800;
			font-size: 14px;
		}

		.btn-bid-purple {
			background-color: #6a329f;
			color: #ffffff;
			font-size: 12px;
			font-weight: 600;
			padding: 8px 20px;
			border-radius: 6px;
			border: none;
			transition: 0.3s;
			text-decoration: none;
			display: inline-block;
		}

		.btn-bid-purple:hover {
			background-color: #52257d;
			color: #ffffff;
		}

		.btn-closed-orange {
			background-color: #f25c05;
			color: #ffffff;
			font-size: 12px;
			font-weight: 600;
			padding: 8px 20px;
			border-radius: 6px;
			border: none;
			transition: 0.3s;
			opacity: 0.8;
			cursor: default;
		}

		.btn-closed-orange:hover {
			background-color: #cc4d04;
			color: #ffffff;
		}

		@media (max-width: 768px) {
			.timer-bar {
				padding: 6px 10px;
			}

			.section-title {
				font-size: 20px;
			}
		}
	</style>
@endpush

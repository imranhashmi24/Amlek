@php
	$pages = App\Models\Page::where('is_default', Status::NO)->get();
	$lang = Session::get('lang');
@endphp

<section class="py-2 header-top">
	<div class="container">
		<div class="row">
			<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 text-end">
				<div class="menubar">
					<ul>
						@if (gs('multi_language'))

							<li>
								@if (@$lang == 'en')
									<button class="no-border head-lang-button langSel" data-lang="ar"> <img class="lang-flag"
											src="{{ asset('assets/images/frontend/uploads/saudi-arabia.png') }}">
										@lang('Arabic')</button>
								@endif

								@if (@$lang == 'ar')
									<button class="no-border head-lang-button langSel" data-lang="en"> <img class="lang-flag"
											src="{{ asset('assets/images/frontend/uploads/english.jpg') }}">
										@lang('English')</button>
								@endif
							</li>
						@endif
						@guest
							<li class="sub-btn button1">
								<a href="#"> <i class="fa fa-user-circle"></i> @lang('Accounts') <i class="fa-solid fa-angle-down"></i>
								</a>
								<div class="sub-menu">
									<a href="{{ route('user.login') }}"> <i class="fa-solid fa-arrow-right-to-bracket"></i>
										@lang('Sign In')</a>
									<a href="{{ route('user.register') }}"> <i class="fa-solid fa-arrow-right-to-bracket"></i> @lang('Sign Up')</a>

								</div>
							</li>
						@endguest

						@auth
							<li class="dashboard-btn">
								<a href="{{ route('user.home') }}">
									<i class="bi bi-speedometer2"></i>
									@lang('Dashboard')
								</a>
							</li>
						@endauth
					</ul>

				</div>
			</div>

		</div>
	</div>
</section>

<header class="py-2 d-flex align-items-center scrolled">
	<div class="container">
		<div class="row align-items-center">
			<div class="col-12 col-xl-2">
				<div class="logo d-flex justify-content-between align-items-center">
					<a href="{{ route('home') }}">
						<img src="{{ siteLogo() }}" alt="Logo">
					</a>
					<i class="fa fa-bars d-xl-none" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample"
						aria-controls="offcanvasExample" onclick="mobileClick()" aria-hidden="true"></i>
				</div>
			</div>
			<div class="col-md-10 d-none d-xl-block">
				<div class="menubar">
					<ul>
						<li>
							<a href="{{ route('home') }}"> @lang('Homepage') </a>
						</li>
						@foreach ($pages as $page)
							<li>
								<a href="{{ route('pages', [$page->slug]) }}"> {{ __($page->name) }} </a>
							</li>
						@endforeach

						<li>
							<a href="{{ route('service') }}"> @lang('Service') </a>
						</li>
						<li>
							<a href="{{ route('marketing') }}"> @lang('Marketing') </a>
						</li>

						<li>
							<a href="{{ route('finance') }}"> @lang('Finance') </a>
						</li>

						<li>
							<a href="{{ route('evaluation') }}"> @lang('Evaluation and studies') </a>
						</li>

						<li>
							<a href="{{ route('investment') }}"> @lang('Social investment') </a>
						</li>

						<li>
							<a href="{{ route('events') }}"> @lang('Events') </a>
						</li>

						<li>
							<a href="{{ route('auction.category') }}"> @lang('Auctions') </a>
						</li>

						<li>
							<a href="{{ route('blogs') }}"> @lang('Blogs') </a>
						</li>

						<li class="sub-btn">
							<a href="javascript:void(0)"> <i class="bi bi-houses"></i> @lang('Add')/@lang('Request Property')
								<i class="fa-solid fa-angle-down"></i></a>
							<div class="sub-menu">
								<a href="{{ route('property-request') }}">@lang('Request Property')</a>
								<a href="{{ route('user.properties.create') }}">@lang('Add Property')</a>
							</div>
						</li>

					</ul>
				</div>
			</div>
		</div>
	</div>
</header>

<div class="offcanvas offcanvas-mobile-menu {{ $lang == 'ar' ? 'offcanvas-end' : 'offcanvas-start' }}" tabindex="-1"
	id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
	<div class="offcanvas-header">
		<h5 class="offcanvas-title" id="offcanvasExampleLabel">
			<a href="{{ route('home') }}" class="mobile-logo">
				<img src="{{ siteLogo() }}" alt="Logo">
			</a>
		</h5>
		<button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
	</div>
	<div class="offcanvas-body">
		<div class="canvas-mobile-menu">

			<a href="{{ route('home') }}"> <i class="bi bi-chevron-right"></i> @lang('Homepage') </a>

			@foreach ($pages as $page)
				<a href="{{ route('pages', [$page->slug]) }}"><i class="bi bi-chevron-right"></i>
					{{ __($page->name) }} </a>
			@endforeach

			<a href="{{ route('marketing') }}"> <i class="bi bi-chevron-right"></i> @lang('Marketing') </a>
			<a href="{{ route('finance') }}"> <i class="bi bi-chevron-right"></i> @lang('Finance') </a>
			<a href="{{ route('evaluation') }}"> <i class="bi bi-chevron-right"></i> @lang('Evaluation and studies') </a>
			<a href="{{ route('investment') }}"> <i class="bi bi-chevron-right"></i> @lang('Social investment') </a>
			<a href="{{ route('events') }}"><i class="bi bi-chevron-right"></i> @lang('Events') </a>
			<a href="{{ route('auction.category') }}"><i class="bi bi-chevron-right"></i> @lang('Auctions') </a>
			<a href="{{ route('blogs') }}"><i class="bi bi-chevron-right"></i> @lang('Blogs') </a>
			<a href="{{ route('property-request') }}"><i class="bi bi-chevron-right"></i> @lang('Request Property')</a>
			<a href="{{ route('user.properties.create') }}"><i class="bi bi-chevron-right"></i> @lang('Add Property')</a>
		</div>
	</div>
</div>

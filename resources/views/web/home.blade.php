@extends('web.layouts.frontend', ['title' => __('Amlaek for Real Estate Services')])

@section('meta_tags')
	@if (app()->getLocale() == 'en')
		<meta name="locale" content="{{ app()->getLocale() }}" />
		<link rel="canonical" href="https://amlaek.com/" />
		<meta property="og:locale" content="en" />
		<meta property="og:type" content="article" />
		<meta property="og:title" content="Amlaek" />
		<meta property="og:description" content="Amlaek for Real Estate Services" />
		<meta property="og:keyword"
			content="Properties, Amlaek,Real estate investment,Properties for sale,Properties for purchase,Real estate development,Design and development,Real Estate Management,Real estate valuation,Real estate consultancy,Real estate rehabilitation,real estate market,Real estate financing,Real estate projects" />
		<meta property="og:url" content="https://amlaek.com" />
		<meta property=" og:site_name" content="Amlaek   " />
		<meta property="article:author" content="Muhammad Al Sari" />
		<meta property="article:published_time" content="2024-05-15T15:31:38+00:00" />
		<meta property="article:modified_time" content="2024-05-15T15:32:33+00:00" />
		<meta property="og:image" content="{{ siteLogo() }}" />
		<meta property="og:image:width" content="1280" />
		<meta property="og:image:height" content="853" />
		<meta name="twitter:card" content="summary_large_image" />
		<meta name="twitter:creator" content="@#" />
		<meta name="twitter:label1" content="Written by" />
		<meta name="twitter:data1" content="خليل النمازي" />
	@else
		<meta name="locale" content="{{ app()->getLocale() }}" />
		<link rel="canonical" href="https://amlaek.com/" />
		<meta property="og:locale" content="ar" />
		<meta property="og:type" content="article" />
		<meta property="og:title" content="تنمية الأملاك" />
		<meta property="og:description" content="تنمية الاملاك للخدمات العقارية" />
		<meta property="og:keyword"
			content="تنمية الأملاك,استثمار عقاري,عقارات للبيع,عقارات للشراء,تطوير العقارات,تصميم وتطوير,إدارة العقارات,تقييم العقارات,استشارات عقارية,إعادة التأهيل العقاري,سوق العقارات" />
		<meta property="og:url" content="https://amlaek.com" />
		<meta property=" og:site_name" content="" />
		<meta property="article:author" content="لمستشار  محمد آل ساري " />
		<meta property="article:published_time" content="2024-05-15T15:31:38+00:00" />
		<meta property="article:modified_time" content="2024-05-15T15:32:33+00:00" />
		<meta property="og:image" content="{{ siteLogo() }}" />
		<meta property="og:image:width" content="1280" />
		<meta property="og:image:height" content="853" />
		<meta name="twitter:card" content="summary_large_image" />
		<meta name="twitter:creator" content="@#" />
		<meta name="twitter:label1" content="Written by" />
		<meta name="twitter:data1" content="خليل النمازي" />
	@endif
@endsection
@section('content')

	@include('sections.banner')
	@include('sections.property_search')
	@include('sections.ai_banner')
	@include('sections.promotion')
	@include('sections.offer_banner')
	@include('sections.property_request_section')
	@include('sections.auction_section')
	@include('sections.floor_plan')

	{{-- @include('sections.full_purchase') --}}

	<div class="container py-3 py-lg-3">
		<div class="row">
			<div class="col-10">
				<h3 class="text-left text-dark">
					@lang('Search according to sectors')
				</h3>
			</div>
		</div>
	</div>
	<div class="container py-3 py-lg-5">
		@foreach ($propertyTypes as $propertyType)
			<div class="mb-4">
				<div class="gap-3 propertyTyper-header d-flex align-itmes-center">
					<div>
						<img src="{{ getImage(getFilePath('propertyType') . '/' . $propertyType->icon, getFileSize('propertyType')) }}"
							alt="">
					</div>
					<div>
						<h5 class="pt-3 m-0">{{ $propertyType->lang('name') }}</h5>
					</div>
				</div>

				<div class="mt-4 row property-type-area-slider">
					@foreach ($propertyType->property_type_cities as $property_type_city)
						<div class="pb-4 col-12 col-sm-6 col-md-4 col-lg-3">
							<div class="property-type-area">
								<a
									href="{{ route('property', ['tab' => 'list', 'property_type' => $propertyType->id, 'city_id' => $property_type_city->city->id]) }}">
									<img
										src="{{ getImage(getFilePath('propertyTypeArea') . '/' . $property_type_city->image, getFileSize('propertyTypeArea')) }}"
										alt="Image" class="rounded">

									<div class="type-area-overlay">
										<i class="fa-regular fa-map"></i>
										<span> {{ $property_type_city->city->lang('name') }}</span>
									</div>
								</a>
							</div>
						</div>
					@endforeach
				</div>
			</div>
		@endforeach
	</div>

	@include('sections.all_auction_section')

	<div class="container py-3 py-lg-3">
		<div class="row">
			<div class="col-12">
				<h3 class="text-center text-dark">
					@lang('Blogs')
				</h3>
			</div>
		</div>
	</div>

	@if (@$sections->secs != null)
		@foreach (json_decode($sections->secs) as $sec)
			@include('sections.' . $sec)
		@endforeach
	@endif

	@include('sections.advance_search')

@endsection

@push('style-lib')
	<link rel="stylesheet" href="{{ asset('assets/web/css/slick.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/web/css/slick-theme.css') }}">
@endpush

@push('script-lib')
	<script src="{{ asset('assets/web/js/slick.min.js') }}"></script>
@endpush

@push('script')
	<script>
		$(window).on('resize', function(event) {
			let width = $(document).width()

			if (width < 576) {
				$(".property-type-area-slider").slick({
					slidesToShow: 2,
					slidesToScroll: 2,
					autoplay: true,
					autoplaySpeed: 3000,
					speed: 1800,
					dots: false,
					arrows: false,
					@if (session()->get('lang') == 'ar')
						rtl: true,
					@endif
				});
			}
		});

		if ($(window).width() < 576) {
			$(".property-type-area-slider").slick({
				slidesToShow: 2,
				slidesToScroll: 2,
				autoplay: true,
				autoplaySpeed: 3000,
				speed: 1800,
				dots: true,
				arrows: false,
				@if (session()->get('lang') == 'ar')
					rtl: true,
				@endif
			});
		}
	</script>
@endpush

@extends('web.layouts.frontend', ['title' => isset($category) ? $category->name . ' Auctions' : __('Auctions')])

@section('content')
	<section class="auction-header">
		<div class="container text-center">
			<h2>{{ isset($category) ? $category->name : __('Auctions') }}</h2>
			<p>@lang('Home') // {{ isset($category) ? $category->name : __('Auctions') }} // @lang('Browse all')</p>
		</div>
	</section>

	@include('sections.all_auction_section')
@endsection

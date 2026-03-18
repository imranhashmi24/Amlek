@php
	$pageTitle = $title;
@endphp

@extends('web.layouts.frontend')

@section('content')
	<section class="py-5">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="section-title-form">
						<h5 class="mb-0 p-3">{{ $title }} {{ __('Form') }}</h5>
					</div>
				</div>
				<div class="col-12">

					<form method="POST" action="{{ route($route) }}" enctype="multipart/form-data">
						@csrf
						<input type="hidden" name="service_id" value="{{ $service_id }}">
						<input type="hidden" name="type" value="{{ $type }}">
						@php
							echo getForm($service_id, $model, $field);
						@endphp

						<button type="submit" class="btn btn-primary submit-btn">{{ __('Submit Request') }}</button>
					</form>
				</div>
			</div>
		</div>
	</section>
@endsection

@push('style')
	<style>
		.pages-banner {
			height: 150px;
		}

		.section-title-form {
			text-align: center;
			background-color: #0D47A1 !important;
			color: #fff;
			padding-top: 5px;
			padding-bottom: 1px;
			margin-bottom: 5px;
		}

		.submit-btn {
			margin-top: 2rem;
			padding: 0.5rem 2rem;
			background-color: #0D47A1 !important;
			color: #fff !important;
			border-radius: 0;
		}
	</style>
@endpush

@php
	$facilityServices = \App\Models\FacilityService::where('status', 'active')->take(4)->get();
@endphp

<section class="facility-section py-5">
	<div class="container">
		<div class="text-center mb-5">
			<h2 class="fw-bold">@lang('Facility Management & <br> Maintenance Services')</h2>
			<p class="text-muted">
				@lang('We offer comprehensive facility management and maintenance services covering residential, commercial, and industrial buildings, using advanced systems and specialized teams to ensure the highest operational efficiency and service quality.')</p>
		</div>

		<div class="row g-4">
			@if ($facilityServices->count() > 0)
				@foreach ($facilityServices as $facilityService)
					<div class="col-lg-3 col-md-6">
						<div class="service-card h-100">
							<img
								src="{{ getImage(getFilePath('facility_services') . '/' . $facilityService->image, getFileSize('facility_services')) }}"
								class="img-fluid rounded" alt="">
							<h5 class="mt-3">
								{{ $facilityService->lang('title') }}
							</h5>

							<p class="text-muted small">
								{{ $facilityService->lang('description') }}
							</p>
							<ul>
								@if (!empty($facilityService->lists))
									@foreach ($facilityService->lists as $list)
										<li>{{ $list->lang('title') }}</li>
									@endforeach
								@endif
							</ul>
							<a href="{{ route('facility-service-request.index', ['id' => base64urlEncode($facilityService->id)]) }}"
								class="btn btn-outline-primary w-100 mt-auto">@lang('Request Service')</a>
						</div>
					</div>
				@endforeach
			@endif
		</div>

		<div class="row g-4 my-3">
			<div class="col-12 text-center">
				<a href="{{ route('facility.services') }}" class="btn btn-primary">
					@lang('Show All')
				</a>
			</div>
		</div>
	</div>
</section>

@push('style')
	<style>
		.service-card {
			background: transparent;
			border-radius: 12px;
			padding: 15px;
			border: 1px solid #e5e7eb;
			display: flex;
			flex-direction: column;
			height: 100%;
			transition: 0.3s;
		}

		.service-card:hover {
			transform: translateY(-5px);
			box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08);
		}

		.service-card img {
			height: 160px;
			object-fit: cover;
		}

		.service-card h5 {
			font-weight: 600;
		}

		.service-card ul {
			margin-bottom: 15px;
		}

		.service-card ul li {
			font-size: 14px;
			margin-bottom: 5px;
			list-style: none;
			position: relative;
			padding-left: 20px;
		}

		.service-card ul li::before {
			content: "✔";
			color: #0d6efd;
			position: absolute;
			left: 0px;
			padding-right: 20px;
		}
	</style>
@endpush

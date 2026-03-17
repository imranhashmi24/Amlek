@extends('admin.layouts.app', ['title' => 'Edit Auction'])
@section('panel')
	<form action="{{ route('admin.auction.update', $auction->id) }}" method="POST" enctype="multipart/form-data">
		@csrf

		<div class="row">
			<div class="col-6">
				<div class="card">
					<div class="card-body">
						<div class="row">
							<!-- Category -->
							<div class="mb-3 col-12 col-md-6 col-lg-6">
								<div class="form-group">
									<label class="form-label">@lang('Auction Category') <span class="text-danger fs-6">*</span></label>
									<select name="category_id" id="auction_category" class="form-control" required>
										<option value="">@lang('Select Category')</option>
										@foreach ($categories as $category)
											<option value="{{ $category->id }}" @selected(old('category_id', $auction->category_id) == $category->id)>
												@if (app()->getLocale() == 'en')
													{{ $category->name }}
												@else
													{{ $category->name_ar }}
												@endif
											</option>
										@endforeach
									</select>
								</div>
							</div>

							<!-- Title -->
							<div class="mb-3 col-12 col-md-6 col-lg-6">
								<div class="form-group">
									<label class="form-label">@lang('Auction Title') <span class="text-danger fs-6">*</span></label>
									<input type="text" name="title" value="{{ old('title', $auction->title) }}" class="form-control" required>
								</div>
							</div>
							<div class="mb-3 col-12 col-md-6 col-lg-6">
								<div class="form-group">
									<label class="form-label">@lang('Auction Title') (@lang('Arabic')) <span class="text-danger fs-6">*</span></label>
									<input type="text" name="title_ar" value="{{ old('title_ar', $auction->title_ar) }}" class="form-control"
										required>
								</div>
							</div>
							<div class="mb-3 col-12 col-md-6 col-lg-6">
								<div class="form-group">
									<label class="form-label">@lang('Auction Slug') <span class="text-danger fs-6">*</span></label>
									<input type="text" name="slug" value="{{ old('slug', $auction->slug) }}" class="form-control" required>
								</div>
							</div>
							<div class="mb-3 col-12 col-md-6 col-lg-6">
								<div class="form-group">
									<label class="form-label">@lang('Auction day') <span class="text-danger fs-6">*</span></label>
									<div class="input-group">
										<input type="number" name="auction_day" value="{{ old('auction_day', $auction->auction_day) }}" required
											class="form-control">
									</div>
								</div>
							</div>
							<div class="mb-3 col-12 col-md-6 col-lg-6">
								<div class="form-group">
									<label class="form-label">@lang('Auction Date') <span class="text-danger fs-6">*</span></label>
									<div class="input-group">
										<input type="date" name="auction_date" value="{{ old('auction_date', $auction->auction_date) }}" required
											class="form-control">
									</div>
								</div>
							</div>
							<div class="mb-3 col-12 col-md-6 col-lg-6">
								<div class="form-group">
									<label class="form-label">@lang('Beginning Time') <span class="text-danger fs-6">*</span></label>
									<div class="input-group">
										<input type="datetime-local" name="beginning_time"
											value="{{ old('beginning_time', $auction->beginning_time) }}" class="form-control">
									</div>
								</div>
							</div>

							<div class="mb-3 col-12 col-md-6 col-lg-6">
								<div class="form-group">
									<label class="form-label">@lang('Starting price') <span class="text-danger fs-6">*</span></label>
									<div class="input-group">
										<input type="number" name="starting_price" value="{{ old('starting_price', $auction->starting_price) }}"
											class="form-control">
									</div>
								</div>
							</div>

							<!-- Status -->
							<div class="mb-3 col-12 col-md-12 col-lg-12">
								<div class="form-group">
									<label class="form-label">@lang('Status') <span class="text-danger fs-6">*</span></label>
									<select name="status" class="form-control" required>
										<option value="">@lang('Select One')</option>
										<option value="0" @selected(old('status', $auction->status) == 0)>@lang('Pending')</option>
										<option value="1" @selected(old('status', $auction->status) == 1)>@lang('Current')</option>
										<option value="2" @selected(old('status', $auction->status) == 2)>@lang('Upcoming')</option>
										<option value="3" @selected(old('status', $auction->status) == 3)>@lang('Finished')</option>
									</select>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="col-6">
				<!-- Location Information -->
				<div class="my-3 product-card">
					<div class="product-card-header">
						<h6 class="m-0 text-light">@lang('Location Information')</h6>
					</div>
					<div class="product-card-body">
						<div class="row">
							<div class="mb-3 col-12 col-md-6 col-lg-6">
								<div class="form-group">
									<label class="form-label">@lang('Country') <span class="text-danger fs-6">*</span></label>
									<select name="country_id" class="form-control" required>
										<option value="">@lang('Select One')</option>
										@foreach ($countries as $country)
											<option value="{{ $country->id }}" data-cities="{{ $country->city }}" @selected(old('country_id', $auction->country_id) == $country->id)>
												@if (app()->getLocale() == 'en')
													{{ $country->name }}
												@else
													{{ $country->name_ar }}
												@endif
											</option>
										@endforeach
									</select>
								</div>
							</div>
							<div class="mb-3 col-12 col-md-6 col-lg-6">
								<div class="form-group">
									<label class="form-label">@lang('City') <span class="text-danger fs-6">*</span></label>
									<select name="city_id" class="form-control">
										<option value="">@lang('Select One')</option>
										@if ($auction->city)
											<option value="{{ $auction->city->id }}" data-lat="{{ $auction->latitude }}"
												data-lng="{{ $auction->longitude }}" selected>
												{{ app()->getLocale() == 'en' ? $auction->city->name : $auction->city->name_ar }}
											</option>
										@endif
									</select>
								</div>
							</div>

							<div class="mb-3 col-12 col-md-12 col-lg-12">
								<div id="address-map-container" style="width:100%;height:400px; margin-top:10px">
									<div style="width: 100%; height: 100%" id="address-map"></div>
								</div>
							</div>

							<div class="mb-3 col-12 col-md-12 col-lg-12">
								<div class="form-group">
									<label for="address_address">@lang('Location')</label>
									<input type="text" id="address-input" name="address" class="form-control map-input"
										value="{{ old('address', $auction->address) }}">
									<input type="hidden" name="latitude" id="address-latitude"
										value="{{ old('latitude', $auction->latitude) }}" />
									<input type="hidden" name="longitude" id="address-longitude"
										value="{{ old('longitude', $auction->longitude) }}" />
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- ========= CATEGORY SPECIFIC DETAILS ========= -->
		<!-- Car / Truck Details (category ids 1,2) -->
		<div class="my-3 product-card category-details" data-category-ids="1,2">
			<div class="product-card-header">
				<h6 class="m-0 text-light">@lang('Car / Truck Details')</h6>
			</div>
			<div class="product-card-body">
				<div class="row">
					<div class="mb-3 col-12 col-md-6 col-lg-4">
						<label class="form-label">@lang('Make')</label>
						<input type="text" name="make" value="{{ old('make', $auction->make) }}" class="form-control">
					</div>
					<div class="mb-3 col-12 col-md-6 col-lg-4">
						<label class="form-label">@lang('Make') (@lang('Arabic'))</label>
						<input type="text" name="make_ar" value="{{ old('make_ar', $auction->make_ar) }}" class="form-control">
					</div>
					<div class="mb-3 col-12 col-md-6 col-lg-4">
						<label class="form-label">@lang('Model')</label>
						<input type="text" name="model" value="{{ old('model', $auction->model) }}" class="form-control">
					</div>
					<div class="mb-3 col-12 col-md-6 col-lg-4">
						<label class="form-label">@lang('Model') (@lang('Arabic'))</label>
						<input type="text" name="model_ar" value="{{ old('model_ar', $auction->model_ar) }}" class="form-control">
					</div>
					<div class="mb-3 col-12 col-md-6 col-lg-4">
						<label class="form-label">@lang('Year')</label>
						<input type="number" name="year" value="{{ old('year', $auction->year) }}" class="form-control"
							min="1900" max="2099">
					</div>
					<div class="mb-3 col-12 col-md-6 col-lg-4">
						<label class="form-label">@lang('Mileage')</label>
						<input type="number" name="mileage" value="{{ old('mileage', $auction->mileage) }}" class="form-control">
					</div>
					<div class="mb-3 col-12 col-md-6 col-lg-4">
						<label class="form-label">@lang('VIN')</label>
						<input type="text" name="vin" value="{{ old('vin', $auction->vin) }}" class="form-control">
					</div>
					<div class="mb-3 col-12 col-md-6 col-lg-4">
						<label class="form-label">@lang('Title Status')</label>
						<input type="text" name="title_status" value="{{ old('title_status', $auction->title_status) }}"
							class="form-control" placeholder="e.g. Clean">
					</div>
					<div class="mb-3 col-12 col-md-6 col-lg-4">
						<label class="form-label">@lang('Engine')</label>
						<input type="text" name="engine" value="{{ old('engine', $auction->engine) }}" class="form-control"
							placeholder="5.0L V10">
					</div>
					<div class="mb-3 col-12 col-md-6 col-lg-4">
						<label class="form-label">@lang('Drivetrain')</label>
						<input type="text" name="drivetrain" value="{{ old('drivetrain', $auction->drivetrain) }}"
							class="form-control" placeholder="Rear-Wheel Drive">
					</div>
					<div class="mb-3 col-12 col-md-6 col-lg-4">
						<label class="form-label">@lang('Transmission')</label>
						<input type="text" name="transmission" value="{{ old('transmission', $auction->transmission) }}"
							class="form-control" placeholder="Automatic">
					</div>
					<div class="mb-3 col-12 col-md-6 col-lg-4">
						<label class="form-label">@lang('Body Style')</label>
						<input type="text" name="body_style" value="{{ old('body_style', $auction->body_style) }}"
							class="form-control" placeholder="Sedan">
					</div>
					<div class="mb-3 col-12 col-md-6 col-lg-4">
						<label class="form-label">@lang('Exterior Color')</label>
						<input type="text" name="exterior_color" value="{{ old('exterior_color', $auction->exterior_color) }}"
							class="form-control" placeholder="Alpine white">
					</div>
					<div class="mb-3 col-12 col-md-6 col-lg-4">
						<label class="form-label">@lang('Interior Color')</label>
						<input type="text" name="interior_color" value="{{ old('interior_color', $auction->interior_color) }}"
							class="form-control" placeholder="Soaring">
					</div>
					<div class="mb-3 col-12 col-md-6 col-lg-4">
						<label class="form-label">@lang('Owner Count')</label>
						<input type="text" name="owner_count" value="{{ old('owner_count', $auction->owner_count) }}"
							class="form-control" placeholder="1 Owner">
					</div>
					<div class="mb-3 col-12 col-md-6 col-lg-4">
						<label class="form-label">@lang('Seller Name')</label>
						<input type="text" name="seller_name" value="{{ old('seller_name', $auction->seller_name) }}"
							class="form-control" placeholder="Zayan Ibrahim">
					</div>
					<div class="mb-3 col-12 col-md-6 col-lg-4">
						<label class="form-label">@lang('Seller Type')</label>
						<select name="seller_type" class="form-control">
							<option value="">@lang('Select')</option>
							<option value="Private Party" @selected(old('seller_type', $auction->seller_type) == 'Private Party')>@lang('Private Party')</option>
							<option value="Dealer" @selected(old('seller_type', $auction->seller_type) == 'Dealer')>@lang('Dealer')</option>
						</select>
					</div>
					<div class="mb-3 col-12 col-md-12">
						<label class="form-label">@lang('Highlights')</label>
						<textarea name="highlights" class="form-control" rows="3">{{ old('highlights', $auction->highlights) }}</textarea>
					</div>
					<div class="mb-3 col-12 col-md-12">
						<label class="form-label">@lang('Seller Notes')</label>
						<textarea name="seller_notes" class="form-control" rows="3">{{ old('seller_notes', $auction->seller_notes) }}</textarea>
					</div>
					<div class="mb-3 col-12 col-md-12">
						<label class="form-label">@lang('Other Items Included In Sale')</label>
						<textarea name="other_items" class="form-control" rows="3">{{ old('other_items', $auction->other_items) }}</textarea>
					</div>
				</div>
			</div>
		</div>

		<!-- Real Estate Details (category id 3) -->
		<div class="my-3 product-card category-details" data-category-ids="3">
			<div class="product-card-header">
				<h6 class="m-0 text-light">@lang('Real Estate Details')</h6>
			</div>
			<div class="product-card-body">
				<div class="row">
					<div class="mb-3 col-12 col-md-6">
						<label class="form-label">@lang('Property Type')</label>
						<select name="property_type" class="form-control">
							<option value="">@lang('Select')</option>
							<option value="House" @selected(old('property_type', $auction->property_type) == 'House')>@lang('House')</option>
							<option value="Apartment" @selected(old('property_type', $auction->property_type) == 'Apartment')>@lang('Apartment')</option>
							<option value="Land" @selected(old('property_type', $auction->property_type) == 'Land')>@lang('Land')</option>
							<option value="Commercial" @selected(old('property_type', $auction->property_type) == 'Commercial')>@lang('Commercial')</option>
						</select>
					</div>
					<div class="mb-3 col-12 col-md-6">
						<label class="form-label">@lang('Bedrooms')</label>
						<input type="number" name="bedrooms" value="{{ old('bedrooms', $auction->bedrooms) }}" class="form-control">
					</div>
					<div class="mb-3 col-12 col-md-6">
						<label class="form-label">@lang('Bathrooms')</label>
						<input type="number" step="0.5" name="bathrooms" value="{{ old('bathrooms', $auction->bathrooms) }}"
							class="form-control">
					</div>
					<div class="mb-3 col-12 col-md-6">
						<label class="form-label">@lang('Square Footage')</label>
						<input type="number" name="sqft" value="{{ old('sqft', $auction->sqft) }}" class="form-control">
					</div>
					<div class="mb-3 col-12 col-md-6">
						<label class="form-label">@lang('Lot Size')</label>
						<input type="text" name="lot_size" value="{{ old('lot_size', $auction->lot_size) }}" class="form-control"
							placeholder="e.g. 0.25 acres">
					</div>
					<div class="mb-3 col-12 col-md-6">
						<label class="form-label">@lang('Year Built')</label>
						<input type="number" name="year_built" value="{{ old('year_built', $auction->year_built) }}"
							class="form-control">
					</div>
					<div class="mb-3 col-12 col-md-6">
						<label class="form-label">@lang('Garage Spaces')</label>
						<input type="number" name="garage" value="{{ old('garage', $auction->garage) }}" class="form-control">
					</div>
					<div class="mb-3 col-12 col-md-12">
						<label class="form-label">@lang('Additional Features')</label>
						<textarea name="re_features" class="form-control" rows="3">{{ old('re_features', $auction->re_features) }}</textarea>
					</div>
				</div>
			</div>
		</div>

		<!-- Antiques & Collectibles Details (category id 4) -->
		<div class="my-3 product-card category-details" data-category-ids="4">
			<div class="product-card-header">
				<h6 class="m-0 text-light">@lang('Antiques & Collectibles Details')</h6>
			</div>
			<div class="product-card-body">
				<div class="row">
					<div class="mb-3 col-12 col-md-6">
						<label class="form-label">@lang('Era / Period')</label>
						<input type="text" name="era" value="{{ old('era', $auction->era) }}" class="form-control"
							placeholder="e.g. Victorian, 1920s">
					</div>
					<div class="mb-3 col-12 col-md-6">
						<label class="form-label">@lang('Material')</label>
						<input type="text" name="material" value="{{ old('material', $auction->material) }}" class="form-control">
					</div>
					<div class="mb-3 col-12 col-md-6">
						<label class="form-label">@lang('Dimensions')</label>
						<input type="text" name="dimensions" value="{{ old('dimensions', $auction->dimensions) }}"
							class="form-control" placeholder="e.g. 10x10x5 in">
					</div>
					<div class="mb-3 col-12 col-md-6">
						<label class="form-label">@lang('Condition')</label>
						<select name="condition" class="form-control">
							<option value="">@lang('Select')</option>
							<option value="Mint" @selected(old('condition', $auction->condition) == 'Mint')>@lang('Mint')</option>
							<option value="Excellent" @selected(old('condition', $auction->condition) == 'Excellent')>@lang('Excellent')</option>
							<option value="Good" @selected(old('condition', $auction->condition) == 'Good')>@lang('Good')</option>
							<option value="Fair" @selected(old('condition', $auction->condition) == 'Fair')>@lang('Fair')</option>
							<option value="Poor" @selected(old('condition', $auction->condition) == 'Poor')>@lang('Poor')</option>
						</select>
					</div>
					<div class="mb-3 col-12 col-md-6">
						<label class="form-label">@lang('Provenance')</label>
						<input type="text" name="provenance" value="{{ old('provenance', $auction->provenance) }}"
							class="form-control">
					</div>
					<div class="mb-3 col-12 col-md-6">
						<label class="form-label">@lang('Artist / Maker')</label>
						<input type="text" name="artist" value="{{ old('artist', $auction->artist) }}" class="form-control">
					</div>
					<div class="mb-3 col-12 col-md-12">
						<label class="form-label">@lang('Additional Notes')</label>
						<textarea name="antique_notes" class="form-control" rows="3">{{ old('antique_notes', $auction->antique_notes) }}</textarea>
					</div>
				</div>
			</div>
		</div>

		<!-- Animal Details (category id 5) -->
		<div class="my-3 product-card category-details" data-category-ids="5">
			<div class="product-card-header">
				<h6 class="m-0 text-light">@lang('Animal Details')</h6>
			</div>
			<div class="product-card-body">
				<div class="row">
					<div class="mb-3 col-12 col-md-6">
						<label class="form-label">@lang('Species')</label>
						<input type="text" name="species" value="{{ old('species', $auction->species) }}" class="form-control">
					</div>
					<div class="mb-3 col-12 col-md-6">
						<label class="form-label">@lang('Breed')</label>
						<input type="text" name="breed" value="{{ old('breed', $auction->breed) }}" class="form-control">
					</div>
					<div class="mb-3 col-12 col-md-6">
						<label class="form-label">@lang('Age')</label>
						<input type="text" name="animal_age" value="{{ old('animal_age', $auction->animal_age) }}"
							class="form-control" placeholder="e.g. 2 years">
					</div>
					<div class="mb-3 col-12 col-md-6">
						<label class="form-label">@lang('Gender')</label>
						<select name="gender" class="form-control">
							<option value="">@lang('Select')</option>
							<option value="Male" @selected(old('gender', $auction->gender) == 'Male')>@lang('Male')</option>
							<option value="Female" @selected(old('gender', $auction->gender) == 'Female')>@lang('Female')</option>
						</select>
					</div>
					<div class="mb-3 col-12 col-md-6">
						<label class="form-label">@lang('Weight')</label>
						<input type="text" name="weight" value="{{ old('weight', $auction->weight) }}" class="form-control"
							placeholder="e.g. 50 kg">
					</div>
					<div class="mb-3 col-12 col-md-6">
						<label class="form-label">@lang('Health Records')</label>
						<input type="text" name="health_records" value="{{ old('health_records', $auction->health_records) }}"
							class="form-control" placeholder="Vaccinated, dewormed">
					</div>
					<div class="mb-3 col-12 col-md-12">
						<label class="form-label">@lang('Additional Info')</label>
						<textarea name="animal_info" class="form-control" rows="3">{{ old('animal_info', $auction->animal_info) }}</textarea>
					</div>
				</div>
			</div>
		</div>

		<!-- Fruits & Vegetables Details (category id 6) -->
		<div class="my-3 product-card category-details" data-category-ids="6">
			<div class="product-card-header">
				<h6 class="m-0 text-light">@lang('Fruits & Vegetables Details')</h6>
			</div>
			<div class="product-card-body">
				<div class="row">
					<div class="mb-3 col-12 col-md-6">
						<label class="form-label">@lang('Type')</label>
						<input type="text" name="produce_type" value="{{ old('produce_type', $auction->produce_type) }}"
							class="form-control" placeholder="e.g. Apple, Tomato">
					</div>
					<div class="mb-3 col-12 col-md-6">
						<label class="form-label">@lang('Variety')</label>
						<input type="text" name="variety" value="{{ old('variety', $auction->variety) }}" class="form-control"
							placeholder="e.g. Gala, Roma">
					</div>
					<div class="mb-3 col-12 col-md-6">
						<label class="form-label">@lang('Quantity')</label>
						<input type="text" name="quantity" value="{{ old('quantity', $auction->quantity) }}" class="form-control"
							placeholder="e.g. 1000 kg">
					</div>
					<div class="mb-3 col-12 col-md-6">
						<label class="form-label">@lang('Harvest Date')</label>
						<input type="date" name="harvest_date" value="{{ old('harvest_date', $auction->harvest_date) }}"
							class="form-control">
					</div>
					<div class="mb-3 col-12 col-md-6">
						<label class="form-label">@lang('Grade')</label>
						<input type="text" name="grade" value="{{ old('grade', $auction->grade) }}" class="form-control"
							placeholder="e.g. A, Organic">
					</div>
					<div class="mb-3 col-12 col-md-12">
						<label class="form-label">@lang('Additional Details')</label>
						<textarea name="produce_notes" class="form-control" rows="3">{{ old('produce_notes', $auction->produce_notes) }}</textarea>
					</div>
				</div>
			</div>
		</div>

		<!-- Images Card -->
		<div class="my-3 product-card">
			<div class="product-card-header">
				<h6 class="m-0 text-light">@lang('Images')</h6>
			</div>
			<div class="product-card-body">
				<div class="row">
					<div class="mb-3 col-12 col-md-4">
						<div class="form-group">
							<label class="form-label">@lang('Thumb Image') <span class="text-danger fs-6">*</span></label>
							<x-image-uploader image="{{ $auction->thumb_image }}" class="w-100" name="thumb_image"
								type="auction_thumb" />
						</div>
					</div>
					<div class="mb-3 col-12 col-md-8">
						<div class="form-group">
							<label class="form-label">@lang('Images')</label>
							<div>
								<div class="input-images"></div>
							</div>
							<div class="mt-3">
								<small class="mt-3 text-muted"> @lang('Supported Files'):
									<b>.@lang('png'), .@lang('jpg'), .@lang('jpeg')</b> @lang('Image will be resized into')
									<b>{{ getFileSize('auction') }}</b> @lang('px')
								</small>
							</div>
						</div>
					</div>

					<div class="mb-3 col-12 col-md-12">
						<div class="form-group">
							<label class="form-label">@lang('Documents') (@lang('Support only pdf'))</label>
							<input type="file" name="document" class="form-control" accept=".pdf">
							@if ($auction->document)
								<small><a href="{{ asset($auction->document) }}" target="_blank">@lang('View current document')</a></small>
							@endif
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Descriptions -->
		<div class="row">
			<div class="mb-3 col-12 col-md-12">
				<div class="form-group">
					<label class="form-label">@lang('Description') <span class="text-danger fs-6">*</span></label>
					<textarea name="description" class="form-control nicEdit" rows="10">{{ old('description', $auction->description) }}</textarea>
				</div>
			</div>
			<div class="mb-3 col-12 col-md-12">
				<div class="form-group">
					<label class="form-label">@lang('Description') (@lang('Arabic')) <span
							class="text-danger fs-6">*</span></label>
					<textarea name="description_ar" class="form-control nicEdit" rows="10">{{ old('description_ar', $auction->description_ar) }}</textarea>
				</div>
			</div>

			<div class="col-12">
				<div class="mb-3 col-12 col-md-12">
					<button type="submit" class="btn btn-primary w-100">@lang('Submit')</button>
				</div>
			</div>
		</div>
	</form>
@endsection

@push('script-lib')
	<script src="{{ asset('assets/global/js/image-uploader.min.js') }}"></script>
@endpush

@push('style-lib')
	<link href="{{ asset('assets/global/css/image-uploader.min.css') }}" rel="stylesheet">
@endpush

@push('breadcrumb-plugins')
	<a href="{{ route('admin.auction.index') }}" class="btn btn-primary"><i class="bi bi-arrow-clockwise"></i>
		@lang('Back')</a>
@endpush

@push('script')
	<script>
		// Category toggle
		$('#auction_category').on('change', function() {
			var selected = $(this).val();
			$('.category-details').hide();
			if (selected) {
				$('.category-details').each(function() {
					var ids = $(this).data('category-ids').toString().split(',');
					if (ids.includes(selected)) {
						$(this).show();
					}
				});
			}
		}).change(); // trigger on load to show correct section

		// Country -> City
		$('[name=country_id]').on('change', function() {
			var cities = $(this).find('option:selected').data('cities');
			var selectedCityId = "{{ $auction->city_id }}";
			var option = '<option value="">@lang('Select one')</option>';
			if (cities) {
				$.each(cities, function(index, value) {
					var name = "{{ app()->getLocale() }}" == 'en' ? value.name : value.name_ar;
					option += "<option value='" + value.id + "' " + (value.id == selectedCityId ? "selected" :
							"") +
						" data-lat='" + value.lat + "' data-lng='" + value.lng + "'>" + name + "</option>";
				});
			}
			$('select[name=city_id]').html(option);
		}).change();

		// Slug generation
		$("input[name=title]").on('input', function() {
			var title = $(this).val();
			var generateSlug = title.toLowerCase().replace(/ /g, '-').replace(/[^\w-]+/g, '');
			$("input[name=slug]").val(generateSlug);
		});

		// Image uploader
		@if (isset($images))
			let preloaded = @json($images);
		@else
			let preloaded = [];
		@endif

		$('.input-images').imageUploader({
			preloaded: preloaded,
			imagesInputName: 'images',
			preloadedInputName: 'old',
			maxSize: 3 * 1024 * 1024,
			maxFiles: 10,
		});

		// Update lat/lng when city changes
		$('[name=city_id]').on('change', function() {
			var lat = $(this).find('option:selected').data('lat');
			var lng = $(this).find('option:selected').data('lng');
			if (lat != undefined && lng != undefined) {
				$("#address-latitude").val(lat);
				$("#address-longitude").val(lng);
				initialize();
			}
		}).change();
	</script>
@endpush

@push('script-lib')
	<script src="{{ asset('assets/global/js/map.js') }}"></script>
	<script
		src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAPS_API_KEY') }}&libraries=places&callback=initialize"
		async defer></script>
@endpush

@push('style')
	<style>
		.product-card {
			border: 1px solid #1a2232;
			border-radius: 5px;
		}

		.product-card-body {
			padding: 15px;
		}

		.product-card-header {
			background: #1a2232;
			padding: 10px;
		}

		.image-uploader {
			min-height: 278px !important;
		}
	</style>
@endpush

<?php $__env->startSection('panel'); ?>
	<form action="<?php echo e(route('admin.auction.update', $auction->id)); ?>" method="POST" enctype="multipart/form-data">
		<?php echo csrf_field(); ?>

		<div class="row">
			<div class="col-6">
				<div class="card">
					<div class="card-body">
						<div class="row">
							<!-- Category -->
							<div class="mb-3 col-12 col-md-6 col-lg-6">
								<div class="form-group">
									<label class="form-label"><?php echo app('translator')->get('Auction Category'); ?> <span class="text-danger fs-6">*</span></label>
									<select name="category_id" id="auction_category" class="form-control" required>
										<option value=""><?php echo app('translator')->get('Select Category'); ?></option>
										<?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
											<option value="<?php echo e($category->id); ?>" <?php if(old('category_id', $auction->category_id) == $category->id): echo 'selected'; endif; ?>>
												<?php if(app()->getLocale() == 'en'): ?>
													<?php echo e($category->name); ?>

												<?php else: ?>
													<?php echo e($category->name_ar); ?>

												<?php endif; ?>
											</option>
										<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
									</select>
								</div>
							</div>

							<!-- Title -->
							<div class="mb-3 col-12 col-md-6 col-lg-6">
								<div class="form-group">
									<label class="form-label"><?php echo app('translator')->get('Auction Title'); ?> <span class="text-danger fs-6">*</span></label>
									<input type="text" name="title" value="<?php echo e(old('title', $auction->title)); ?>" class="form-control" required>
								</div>
							</div>
							<div class="mb-3 col-12 col-md-6 col-lg-6">
								<div class="form-group">
									<label class="form-label"><?php echo app('translator')->get('Auction Title'); ?> (<?php echo app('translator')->get('Arabic'); ?>) <span class="text-danger fs-6">*</span></label>
									<input type="text" name="title_ar" value="<?php echo e(old('title_ar', $auction->title_ar)); ?>" class="form-control"
										required>
								</div>
							</div>
							<div class="mb-3 col-12 col-md-6 col-lg-6">
								<div class="form-group">
									<label class="form-label"><?php echo app('translator')->get('Auction Slug'); ?> <span class="text-danger fs-6">*</span></label>
									<input type="text" name="slug" value="<?php echo e(old('slug', $auction->slug)); ?>" class="form-control" required>
								</div>
							</div>
							<div class="mb-3 col-12 col-md-6 col-lg-6">
								<div class="form-group">
									<label class="form-label"><?php echo app('translator')->get('Auction day'); ?> <span class="text-danger fs-6">*</span></label>
									<div class="input-group">
										<input type="number" name="auction_day" value="<?php echo e(old('auction_day', $auction->auction_day)); ?>" required
											class="form-control">
									</div>
								</div>
							</div>
							<div class="mb-3 col-12 col-md-6 col-lg-6">
								<div class="form-group">
									<label class="form-label"><?php echo app('translator')->get('Auction Date'); ?> <span class="text-danger fs-6">*</span></label>
									<div class="input-group">
										<input type="date" name="auction_date" value="<?php echo e(old('auction_date', $auction->auction_date)); ?>" required
											class="form-control">
									</div>
								</div>
							</div>
							<div class="mb-3 col-12 col-md-6 col-lg-6">
								<div class="form-group">
									<label class="form-label"><?php echo app('translator')->get('Beginning Time'); ?> <span class="text-danger fs-6">*</span></label>
									<div class="input-group">
										<input type="datetime-local" name="beginning_time"
											value="<?php echo e(old('beginning_time', $auction->beginning_time)); ?>" class="form-control">
									</div>
								</div>
							</div>

							<div class="mb-3 col-12 col-md-6 col-lg-6">
								<div class="form-group">
									<label class="form-label"><?php echo app('translator')->get('Starting price'); ?> <span class="text-danger fs-6">*</span></label>
									<div class="input-group">
										<input type="number" name="starting_price" value="<?php echo e(old('starting_price', $auction->starting_price)); ?>"
											class="form-control">
									</div>
								</div>
							</div>

							<!-- Status -->
							<div class="mb-3 col-12 col-md-12 col-lg-12">
								<div class="form-group">
									<label class="form-label"><?php echo app('translator')->get('Status'); ?> <span class="text-danger fs-6">*</span></label>
									<select name="status" class="form-control" required>
										<option value=""><?php echo app('translator')->get('Select One'); ?></option>
										<option value="0" <?php if(old('status', $auction->status) == 0): echo 'selected'; endif; ?>><?php echo app('translator')->get('Pending'); ?></option>
										<option value="1" <?php if(old('status', $auction->status) == 1): echo 'selected'; endif; ?>><?php echo app('translator')->get('Current'); ?></option>
										<option value="2" <?php if(old('status', $auction->status) == 2): echo 'selected'; endif; ?>><?php echo app('translator')->get('Upcoming'); ?></option>
										<option value="3" <?php if(old('status', $auction->status) == 3): echo 'selected'; endif; ?>><?php echo app('translator')->get('Finished'); ?></option>
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
						<h6 class="m-0 text-light"><?php echo app('translator')->get('Location Information'); ?></h6>
					</div>
					<div class="product-card-body">
						<div class="row">
							<div class="mb-3 col-12 col-md-6 col-lg-6">
								<div class="form-group">
									<label class="form-label"><?php echo app('translator')->get('Country'); ?> <span class="text-danger fs-6">*</span></label>
									<select name="country_id" class="form-control" required>
										<option value=""><?php echo app('translator')->get('Select One'); ?></option>
										<?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
											<option value="<?php echo e($country->id); ?>" data-cities="<?php echo e($country->city); ?>" <?php if(old('country_id', $auction->country_id) == $country->id): echo 'selected'; endif; ?>>
												<?php if(app()->getLocale() == 'en'): ?>
													<?php echo e($country->name); ?>

												<?php else: ?>
													<?php echo e($country->name_ar); ?>

												<?php endif; ?>
											</option>
										<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
									</select>
								</div>
							</div>
							<div class="mb-3 col-12 col-md-6 col-lg-6">
								<div class="form-group">
									<label class="form-label"><?php echo app('translator')->get('City'); ?> <span class="text-danger fs-6">*</span></label>
									<select name="city_id" class="form-control">
										<option value=""><?php echo app('translator')->get('Select One'); ?></option>
										<?php if($auction->city): ?>
											<option value="<?php echo e($auction->city->id); ?>" data-lat="<?php echo e($auction->latitude); ?>"
												data-lng="<?php echo e($auction->longitude); ?>" selected>
												<?php echo e(app()->getLocale() == 'en' ? $auction->city->name : $auction->city->name_ar); ?>

											</option>
										<?php endif; ?>
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
									<label for="address_address"><?php echo app('translator')->get('Location'); ?></label>
									<input type="text" id="address-input" name="address" class="form-control map-input"
										value="<?php echo e(old('address', $auction->address)); ?>">
									<input type="hidden" name="latitude" id="address-latitude"
										value="<?php echo e(old('latitude', $auction->latitude)); ?>" />
									<input type="hidden" name="longitude" id="address-longitude"
										value="<?php echo e(old('longitude', $auction->longitude)); ?>" />
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
				<h6 class="m-0 text-light"><?php echo app('translator')->get('Car / Truck Details'); ?></h6>
			</div>
			<div class="product-card-body">
				<div class="row">
					<div class="mb-3 col-12 col-md-6 col-lg-4">
						<label class="form-label"><?php echo app('translator')->get('Make'); ?></label>
						<input type="text" name="make" value="<?php echo e(old('make', $auction->make)); ?>" class="form-control">
					</div>
					<div class="mb-3 col-12 col-md-6 col-lg-4">
						<label class="form-label"><?php echo app('translator')->get('Make'); ?> (<?php echo app('translator')->get('Arabic'); ?>)</label>
						<input type="text" name="make_ar" value="<?php echo e(old('make_ar', $auction->make_ar)); ?>" class="form-control">
					</div>
					<div class="mb-3 col-12 col-md-6 col-lg-4">
						<label class="form-label"><?php echo app('translator')->get('Model'); ?></label>
						<input type="text" name="model" value="<?php echo e(old('model', $auction->model)); ?>" class="form-control">
					</div>
					<div class="mb-3 col-12 col-md-6 col-lg-4">
						<label class="form-label"><?php echo app('translator')->get('Model'); ?> (<?php echo app('translator')->get('Arabic'); ?>)</label>
						<input type="text" name="model_ar" value="<?php echo e(old('model_ar', $auction->model_ar)); ?>" class="form-control">
					</div>
					<div class="mb-3 col-12 col-md-6 col-lg-4">
						<label class="form-label"><?php echo app('translator')->get('Year'); ?></label>
						<input type="number" name="year" value="<?php echo e(old('year', $auction->year)); ?>" class="form-control"
							min="1900" max="2099">
					</div>
					<div class="mb-3 col-12 col-md-6 col-lg-4">
						<label class="form-label"><?php echo app('translator')->get('Mileage'); ?></label>
						<input type="number" name="mileage" value="<?php echo e(old('mileage', $auction->mileage)); ?>" class="form-control">
					</div>
					<div class="mb-3 col-12 col-md-6 col-lg-4">
						<label class="form-label"><?php echo app('translator')->get('VIN'); ?></label>
						<input type="text" name="vin" value="<?php echo e(old('vin', $auction->vin)); ?>" class="form-control">
					</div>
					<div class="mb-3 col-12 col-md-6 col-lg-4">
						<label class="form-label"><?php echo app('translator')->get('Title Status'); ?></label>
						<input type="text" name="title_status" value="<?php echo e(old('title_status', $auction->title_status)); ?>"
							class="form-control" placeholder="e.g. Clean">
					</div>
					<div class="mb-3 col-12 col-md-6 col-lg-4">
						<label class="form-label"><?php echo app('translator')->get('Engine'); ?></label>
						<input type="text" name="engine" value="<?php echo e(old('engine', $auction->engine)); ?>" class="form-control"
							placeholder="5.0L V10">
					</div>
					<div class="mb-3 col-12 col-md-6 col-lg-4">
						<label class="form-label"><?php echo app('translator')->get('Drivetrain'); ?></label>
						<input type="text" name="drivetrain" value="<?php echo e(old('drivetrain', $auction->drivetrain)); ?>"
							class="form-control" placeholder="Rear-Wheel Drive">
					</div>
					<div class="mb-3 col-12 col-md-6 col-lg-4">
						<label class="form-label"><?php echo app('translator')->get('Transmission'); ?></label>
						<input type="text" name="transmission" value="<?php echo e(old('transmission', $auction->transmission)); ?>"
							class="form-control" placeholder="Automatic">
					</div>
					<div class="mb-3 col-12 col-md-6 col-lg-4">
						<label class="form-label"><?php echo app('translator')->get('Body Style'); ?></label>
						<input type="text" name="body_style" value="<?php echo e(old('body_style', $auction->body_style)); ?>"
							class="form-control" placeholder="Sedan">
					</div>
					<div class="mb-3 col-12 col-md-6 col-lg-4">
						<label class="form-label"><?php echo app('translator')->get('Exterior Color'); ?></label>
						<input type="text" name="exterior_color" value="<?php echo e(old('exterior_color', $auction->exterior_color)); ?>"
							class="form-control" placeholder="Alpine white">
					</div>
					<div class="mb-3 col-12 col-md-6 col-lg-4">
						<label class="form-label"><?php echo app('translator')->get('Interior Color'); ?></label>
						<input type="text" name="interior_color" value="<?php echo e(old('interior_color', $auction->interior_color)); ?>"
							class="form-control" placeholder="Soaring">
					</div>
					<div class="mb-3 col-12 col-md-6 col-lg-4">
						<label class="form-label"><?php echo app('translator')->get('Owner Count'); ?></label>
						<input type="text" name="owner_count" value="<?php echo e(old('owner_count', $auction->owner_count)); ?>"
							class="form-control" placeholder="1 Owner">
					</div>
					<div class="mb-3 col-12 col-md-6 col-lg-4">
						<label class="form-label"><?php echo app('translator')->get('Seller Name'); ?></label>
						<input type="text" name="seller_name" value="<?php echo e(old('seller_name', $auction->seller_name)); ?>"
							class="form-control" placeholder="Zayan Ibrahim">
					</div>
					<div class="mb-3 col-12 col-md-6 col-lg-4">
						<label class="form-label"><?php echo app('translator')->get('Seller Type'); ?></label>
						<select name="seller_type" class="form-control">
							<option value=""><?php echo app('translator')->get('Select'); ?></option>
							<option value="Private Party" <?php if(old('seller_type', $auction->seller_type) == 'Private Party'): echo 'selected'; endif; ?>><?php echo app('translator')->get('Private Party'); ?></option>
							<option value="Dealer" <?php if(old('seller_type', $auction->seller_type) == 'Dealer'): echo 'selected'; endif; ?>><?php echo app('translator')->get('Dealer'); ?></option>
						</select>
					</div>
					<div class="mb-3 col-12 col-md-12">
						<label class="form-label"><?php echo app('translator')->get('Highlights'); ?></label>
						<textarea name="highlights" class="form-control" rows="3"><?php echo e(old('highlights', $auction->highlights)); ?></textarea>
					</div>
					<div class="mb-3 col-12 col-md-12">
						<label class="form-label"><?php echo app('translator')->get('Seller Notes'); ?></label>
						<textarea name="seller_notes" class="form-control" rows="3"><?php echo e(old('seller_notes', $auction->seller_notes)); ?></textarea>
					</div>
					<div class="mb-3 col-12 col-md-12">
						<label class="form-label"><?php echo app('translator')->get('Other Items Included In Sale'); ?></label>
						<textarea name="other_items" class="form-control" rows="3"><?php echo e(old('other_items', $auction->other_items)); ?></textarea>
					</div>
				</div>
			</div>
		</div>

		<!-- Real Estate Details (category id 3) -->
		<div class="my-3 product-card category-details" data-category-ids="3">
			<div class="product-card-header">
				<h6 class="m-0 text-light"><?php echo app('translator')->get('Real Estate Details'); ?></h6>
			</div>
			<div class="product-card-body">
				<div class="row">
					<div class="mb-3 col-12 col-md-6">
						<label class="form-label"><?php echo app('translator')->get('Property Type'); ?></label>
						<select name="property_type" class="form-control">
							<option value=""><?php echo app('translator')->get('Select'); ?></option>
							<option value="House" <?php if(old('property_type', $auction->property_type) == 'House'): echo 'selected'; endif; ?>><?php echo app('translator')->get('House'); ?></option>
							<option value="Apartment" <?php if(old('property_type', $auction->property_type) == 'Apartment'): echo 'selected'; endif; ?>><?php echo app('translator')->get('Apartment'); ?></option>
							<option value="Land" <?php if(old('property_type', $auction->property_type) == 'Land'): echo 'selected'; endif; ?>><?php echo app('translator')->get('Land'); ?></option>
							<option value="Commercial" <?php if(old('property_type', $auction->property_type) == 'Commercial'): echo 'selected'; endif; ?>><?php echo app('translator')->get('Commercial'); ?></option>
						</select>
					</div>
					<div class="mb-3 col-12 col-md-6">
						<label class="form-label"><?php echo app('translator')->get('Bedrooms'); ?></label>
						<input type="number" name="bedrooms" value="<?php echo e(old('bedrooms', $auction->bedrooms)); ?>" class="form-control">
					</div>
					<div class="mb-3 col-12 col-md-6">
						<label class="form-label"><?php echo app('translator')->get('Bathrooms'); ?></label>
						<input type="number" step="0.5" name="bathrooms" value="<?php echo e(old('bathrooms', $auction->bathrooms)); ?>"
							class="form-control">
					</div>
					<div class="mb-3 col-12 col-md-6">
						<label class="form-label"><?php echo app('translator')->get('Square Footage'); ?></label>
						<input type="number" name="sqft" value="<?php echo e(old('sqft', $auction->sqft)); ?>" class="form-control">
					</div>
					<div class="mb-3 col-12 col-md-6">
						<label class="form-label"><?php echo app('translator')->get('Lot Size'); ?></label>
						<input type="text" name="lot_size" value="<?php echo e(old('lot_size', $auction->lot_size)); ?>" class="form-control"
							placeholder="e.g. 0.25 acres">
					</div>
					<div class="mb-3 col-12 col-md-6">
						<label class="form-label"><?php echo app('translator')->get('Year Built'); ?></label>
						<input type="number" name="year_built" value="<?php echo e(old('year_built', $auction->year_built)); ?>"
							class="form-control">
					</div>
					<div class="mb-3 col-12 col-md-6">
						<label class="form-label"><?php echo app('translator')->get('Garage Spaces'); ?></label>
						<input type="number" name="garage" value="<?php echo e(old('garage', $auction->garage)); ?>" class="form-control">
					</div>
					<div class="mb-3 col-12 col-md-12">
						<label class="form-label"><?php echo app('translator')->get('Additional Features'); ?></label>
						<textarea name="re_features" class="form-control" rows="3"><?php echo e(old('re_features', $auction->re_features)); ?></textarea>
					</div>
				</div>
			</div>
		</div>

		<!-- Antiques & Collectibles Details (category id 4) -->
		<div class="my-3 product-card category-details" data-category-ids="4">
			<div class="product-card-header">
				<h6 class="m-0 text-light"><?php echo app('translator')->get('Antiques & Collectibles Details'); ?></h6>
			</div>
			<div class="product-card-body">
				<div class="row">
					<div class="mb-3 col-12 col-md-6">
						<label class="form-label"><?php echo app('translator')->get('Era / Period'); ?></label>
						<input type="text" name="era" value="<?php echo e(old('era', $auction->era)); ?>" class="form-control"
							placeholder="e.g. Victorian, 1920s">
					</div>
					<div class="mb-3 col-12 col-md-6">
						<label class="form-label"><?php echo app('translator')->get('Material'); ?></label>
						<input type="text" name="material" value="<?php echo e(old('material', $auction->material)); ?>" class="form-control">
					</div>
					<div class="mb-3 col-12 col-md-6">
						<label class="form-label"><?php echo app('translator')->get('Dimensions'); ?></label>
						<input type="text" name="dimensions" value="<?php echo e(old('dimensions', $auction->dimensions)); ?>"
							class="form-control" placeholder="e.g. 10x10x5 in">
					</div>
					<div class="mb-3 col-12 col-md-6">
						<label class="form-label"><?php echo app('translator')->get('Condition'); ?></label>
						<select name="condition" class="form-control">
							<option value=""><?php echo app('translator')->get('Select'); ?></option>
							<option value="Mint" <?php if(old('condition', $auction->condition) == 'Mint'): echo 'selected'; endif; ?>><?php echo app('translator')->get('Mint'); ?></option>
							<option value="Excellent" <?php if(old('condition', $auction->condition) == 'Excellent'): echo 'selected'; endif; ?>><?php echo app('translator')->get('Excellent'); ?></option>
							<option value="Good" <?php if(old('condition', $auction->condition) == 'Good'): echo 'selected'; endif; ?>><?php echo app('translator')->get('Good'); ?></option>
							<option value="Fair" <?php if(old('condition', $auction->condition) == 'Fair'): echo 'selected'; endif; ?>><?php echo app('translator')->get('Fair'); ?></option>
							<option value="Poor" <?php if(old('condition', $auction->condition) == 'Poor'): echo 'selected'; endif; ?>><?php echo app('translator')->get('Poor'); ?></option>
						</select>
					</div>
					<div class="mb-3 col-12 col-md-6">
						<label class="form-label"><?php echo app('translator')->get('Provenance'); ?></label>
						<input type="text" name="provenance" value="<?php echo e(old('provenance', $auction->provenance)); ?>"
							class="form-control">
					</div>
					<div class="mb-3 col-12 col-md-6">
						<label class="form-label"><?php echo app('translator')->get('Artist / Maker'); ?></label>
						<input type="text" name="artist" value="<?php echo e(old('artist', $auction->artist)); ?>" class="form-control">
					</div>
					<div class="mb-3 col-12 col-md-12">
						<label class="form-label"><?php echo app('translator')->get('Additional Notes'); ?></label>
						<textarea name="antique_notes" class="form-control" rows="3"><?php echo e(old('antique_notes', $auction->antique_notes)); ?></textarea>
					</div>
				</div>
			</div>
		</div>

		<!-- Animal Details (category id 5) -->
		<div class="my-3 product-card category-details" data-category-ids="5">
			<div class="product-card-header">
				<h6 class="m-0 text-light"><?php echo app('translator')->get('Animal Details'); ?></h6>
			</div>
			<div class="product-card-body">
				<div class="row">
					<div class="mb-3 col-12 col-md-6">
						<label class="form-label"><?php echo app('translator')->get('Species'); ?></label>
						<input type="text" name="species" value="<?php echo e(old('species', $auction->species)); ?>" class="form-control">
					</div>
					<div class="mb-3 col-12 col-md-6">
						<label class="form-label"><?php echo app('translator')->get('Breed'); ?></label>
						<input type="text" name="breed" value="<?php echo e(old('breed', $auction->breed)); ?>" class="form-control">
					</div>
					<div class="mb-3 col-12 col-md-6">
						<label class="form-label"><?php echo app('translator')->get('Age'); ?></label>
						<input type="text" name="animal_age" value="<?php echo e(old('animal_age', $auction->animal_age)); ?>"
							class="form-control" placeholder="e.g. 2 years">
					</div>
					<div class="mb-3 col-12 col-md-6">
						<label class="form-label"><?php echo app('translator')->get('Gender'); ?></label>
						<select name="gender" class="form-control">
							<option value=""><?php echo app('translator')->get('Select'); ?></option>
							<option value="Male" <?php if(old('gender', $auction->gender) == 'Male'): echo 'selected'; endif; ?>><?php echo app('translator')->get('Male'); ?></option>
							<option value="Female" <?php if(old('gender', $auction->gender) == 'Female'): echo 'selected'; endif; ?>><?php echo app('translator')->get('Female'); ?></option>
						</select>
					</div>
					<div class="mb-3 col-12 col-md-6">
						<label class="form-label"><?php echo app('translator')->get('Weight'); ?></label>
						<input type="text" name="weight" value="<?php echo e(old('weight', $auction->weight)); ?>" class="form-control"
							placeholder="e.g. 50 kg">
					</div>
					<div class="mb-3 col-12 col-md-6">
						<label class="form-label"><?php echo app('translator')->get('Health Records'); ?></label>
						<input type="text" name="health_records" value="<?php echo e(old('health_records', $auction->health_records)); ?>"
							class="form-control" placeholder="Vaccinated, dewormed">
					</div>
					<div class="mb-3 col-12 col-md-12">
						<label class="form-label"><?php echo app('translator')->get('Additional Info'); ?></label>
						<textarea name="animal_info" class="form-control" rows="3"><?php echo e(old('animal_info', $auction->animal_info)); ?></textarea>
					</div>
				</div>
			</div>
		</div>

		<!-- Fruits & Vegetables Details (category id 6) -->
		<div class="my-3 product-card category-details" data-category-ids="6">
			<div class="product-card-header">
				<h6 class="m-0 text-light"><?php echo app('translator')->get('Fruits & Vegetables Details'); ?></h6>
			</div>
			<div class="product-card-body">
				<div class="row">
					<div class="mb-3 col-12 col-md-6">
						<label class="form-label"><?php echo app('translator')->get('Type'); ?></label>
						<input type="text" name="produce_type" value="<?php echo e(old('produce_type', $auction->produce_type)); ?>"
							class="form-control" placeholder="e.g. Apple, Tomato">
					</div>
					<div class="mb-3 col-12 col-md-6">
						<label class="form-label"><?php echo app('translator')->get('Variety'); ?></label>
						<input type="text" name="variety" value="<?php echo e(old('variety', $auction->variety)); ?>" class="form-control"
							placeholder="e.g. Gala, Roma">
					</div>
					<div class="mb-3 col-12 col-md-6">
						<label class="form-label"><?php echo app('translator')->get('Quantity'); ?></label>
						<input type="text" name="quantity" value="<?php echo e(old('quantity', $auction->quantity)); ?>" class="form-control"
							placeholder="e.g. 1000 kg">
					</div>
					<div class="mb-3 col-12 col-md-6">
						<label class="form-label"><?php echo app('translator')->get('Harvest Date'); ?></label>
						<input type="date" name="harvest_date" value="<?php echo e(old('harvest_date', $auction->harvest_date)); ?>"
							class="form-control">
					</div>
					<div class="mb-3 col-12 col-md-6">
						<label class="form-label"><?php echo app('translator')->get('Grade'); ?></label>
						<input type="text" name="grade" value="<?php echo e(old('grade', $auction->grade)); ?>" class="form-control"
							placeholder="e.g. A, Organic">
					</div>
					<div class="mb-3 col-12 col-md-12">
						<label class="form-label"><?php echo app('translator')->get('Additional Details'); ?></label>
						<textarea name="produce_notes" class="form-control" rows="3"><?php echo e(old('produce_notes', $auction->produce_notes)); ?></textarea>
					</div>
				</div>
			</div>
		</div>

		<!-- Images Card -->
		<div class="my-3 product-card">
			<div class="product-card-header">
				<h6 class="m-0 text-light"><?php echo app('translator')->get('Images'); ?></h6>
			</div>
			<div class="product-card-body">
				<div class="row">
					<div class="mb-3 col-12 col-md-4">
						<div class="form-group">
							<label class="form-label"><?php echo app('translator')->get('Thumb Image'); ?> <span class="text-danger fs-6">*</span></label>
							<?php if (isset($component)) { $__componentOriginaldbcc027cdd3569f61821c56d10b77c01 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginaldbcc027cdd3569f61821c56d10b77c01 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.image-uploader','data' => ['image' => ''.e($auction->thumb_image).'','class' => 'w-100','name' => 'thumb_image','type' => 'auction_thumb']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('image-uploader'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['image' => ''.e($auction->thumb_image).'','class' => 'w-100','name' => 'thumb_image','type' => 'auction_thumb']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginaldbcc027cdd3569f61821c56d10b77c01)): ?>
<?php $attributes = $__attributesOriginaldbcc027cdd3569f61821c56d10b77c01; ?>
<?php unset($__attributesOriginaldbcc027cdd3569f61821c56d10b77c01); ?>
<?php endif; ?>
<?php if (isset($__componentOriginaldbcc027cdd3569f61821c56d10b77c01)): ?>
<?php $component = $__componentOriginaldbcc027cdd3569f61821c56d10b77c01; ?>
<?php unset($__componentOriginaldbcc027cdd3569f61821c56d10b77c01); ?>
<?php endif; ?>
						</div>
					</div>
					<div class="mb-3 col-12 col-md-8">
						<div class="form-group">
							<label class="form-label"><?php echo app('translator')->get('Images'); ?></label>
							<div>
								<div class="input-images"></div>
							</div>
							<div class="mt-3">
								<small class="mt-3 text-muted"> <?php echo app('translator')->get('Supported Files'); ?>:
									<b>.<?php echo app('translator')->get('png'); ?>, .<?php echo app('translator')->get('jpg'); ?>, .<?php echo app('translator')->get('jpeg'); ?></b> <?php echo app('translator')->get('Image will be resized into'); ?>
									<b><?php echo e(getFileSize('auction')); ?></b> <?php echo app('translator')->get('px'); ?>
								</small>
							</div>
						</div>
					</div>

					<div class="mb-3 col-12 col-md-12">
						<div class="form-group">
							<label class="form-label"><?php echo app('translator')->get('Documents'); ?> (<?php echo app('translator')->get('Support only pdf'); ?>)</label>
							<input type="file" name="document" class="form-control" accept=".pdf">
							<?php if($auction->document): ?>
								<small><a href="<?php echo e(asset($auction->document)); ?>" target="_blank"><?php echo app('translator')->get('View current document'); ?></a></small>
							<?php endif; ?>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Descriptions -->
		<div class="row">
			<div class="mb-3 col-12 col-md-12">
				<div class="form-group">
					<label class="form-label"><?php echo app('translator')->get('Description'); ?> <span class="text-danger fs-6">*</span></label>
					<textarea name="description" class="form-control nicEdit" rows="10"><?php echo e(old('description', $auction->description)); ?></textarea>
				</div>
			</div>
			<div class="mb-3 col-12 col-md-12">
				<div class="form-group">
					<label class="form-label"><?php echo app('translator')->get('Description'); ?> (<?php echo app('translator')->get('Arabic'); ?>) <span
							class="text-danger fs-6">*</span></label>
					<textarea name="description_ar" class="form-control nicEdit" rows="10"><?php echo e(old('description_ar', $auction->description_ar)); ?></textarea>
				</div>
			</div>

			<div class="col-12">
				<div class="mb-3 col-12 col-md-12">
					<button type="submit" class="btn btn-primary w-100"><?php echo app('translator')->get('Submit'); ?></button>
				</div>
			</div>
		</div>
	</form>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script-lib'); ?>
	<script src="<?php echo e(asset('assets/global/js/image-uploader.min.js')); ?>"></script>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('style-lib'); ?>
	<link href="<?php echo e(asset('assets/global/css/image-uploader.min.css')); ?>" rel="stylesheet">
<?php $__env->stopPush(); ?>

<?php $__env->startPush('breadcrumb-plugins'); ?>
	<a href="<?php echo e(route('admin.auction.index')); ?>" class="btn btn-primary"><i class="bi bi-arrow-clockwise"></i>
		<?php echo app('translator')->get('Back'); ?></a>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('script'); ?>
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
			var selectedCityId = "<?php echo e($auction->city_id); ?>";
			var option = '<option value=""><?php echo app('translator')->get('Select one'); ?></option>';
			if (cities) {
				$.each(cities, function(index, value) {
					var name = "<?php echo e(app()->getLocale()); ?>" == 'en' ? value.name : value.name_ar;
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
		<?php if(isset($images)): ?>
			let preloaded = <?php echo json_encode($images, 15, 512) ?>;
		<?php else: ?>
			let preloaded = [];
		<?php endif; ?>

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
<?php $__env->stopPush(); ?>

<?php $__env->startPush('script-lib'); ?>
	<script src="<?php echo e(asset('assets/global/js/map.js')); ?>"></script>
	<script
		src="https://maps.googleapis.com/maps/api/js?key=<?php echo e(env('GOOGLE_MAPS_API_KEY')); ?>&libraries=places&callback=initialize"
		async defer></script>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('style'); ?>
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
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.app', ['title' => 'Edit Auction'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\soudi-project\Amlek\resources\views/admin/auction/edit.blade.php ENDPATH**/ ?>
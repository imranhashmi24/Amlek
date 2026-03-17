<?php $__env->startSection('panel'); ?>
	<form action="<?php echo e(route('admin.auction.store')); ?>" method="POST" enctype="multipart/form-data">
		<?php echo csrf_field(); ?>

		<div class="row">
			<div class="col-6">
				<div class="card">
					<div class="card-body">
						<div class="row">
							<div class="mb-3 col-12 col-md-6 col-lg-6">
								<div class="form-group">
									<label class="form-label"><?php echo app('translator')->get('Auction Category'); ?> <span class="text-danger fs-6">*</span></label>
									<select name="category_id" id="auction_category" class="form-control" required>
										<option value=""><?php echo app('translator')->get('Select Category'); ?></option>
										<?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
											<option value="<?php echo e($category->id); ?>" <?php echo e(old('category_id') == $category->id ? 'selected' : ''); ?>>
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

							<div class="mb-3 col-12 col-md-6 col-lg-6">
								<div class="form-group">
									<label class="form-label"><?php echo app('translator')->get('Auction Title'); ?> <span class="text-danger fs-6">*</span></label>
									<input type="text" name="title" value="<?php echo e(old('title')); ?>" class="form-control" required>
								</div>
							</div>
							<div class="mb-3 col-12 col-md-6 col-lg-6">
								<div class="form-group">
									<label class="form-label"><?php echo app('translator')->get('Auction Title'); ?> (<?php echo app('translator')->get('Arabic'); ?>) <span class="text-danger fs-6">*</span></label>
									<input type="text" name="title_ar" value="<?php echo e(old('title_ar')); ?>" class="form-control" required>
								</div>
							</div>
							<div class="mb-3 col-12 col-md-6 col-lg-6">
								<div class="form-group">
									<label class="form-label"><?php echo app('translator')->get('Auction Slug'); ?> <span class="text-danger fs-6">*</span></label>
									<input type="text" name="slug" value="<?php echo e(old('slug')); ?>" class="form-control" required>
								</div>
							</div>
							<div class="mb-3 col-12 col-md-6 col-lg-6">
								<div class="form-group">
									<label class="form-label"><?php echo app('translator')->get('Auction day'); ?> <span class="text-danger fs-6">*</span></label>
									<div class="input-group">
										<input type="number" name="auction_day" value="<?php echo e(old('auction_day')); ?>" required class="form-control">
									</div>
								</div>
							</div>
							<div class="mb-3 col-12 col-md-6 col-lg-6">
								<div class="form-group">
									<label class="form-label"><?php echo app('translator')->get('Auction Date'); ?> <span class="text-danger fs-6">*</span></label>
									<div class="input-group">
										<input type="date" name="auction_date" value="<?php echo e(old('auction_date')); ?>" required class="form-control">
									</div>
								</div>
							</div>
							<div class="mb-3 col-12 col-md-6 col-lg-6">
								<div class="form-group">
									<label class="form-label"><?php echo app('translator')->get('Beginning Time'); ?> <span class="text-danger fs-6">*</span></label>
									<div class="input-group">
										<input type="datetime-local" name="beginning_time" value="<?php echo e(old('beginning_time')); ?>" class="form-control">
									</div>
								</div>
							</div>

							<div class="mb-3 col-12 col-md-12 col-lg-12">
								<div class="form-group">
									<label class="form-label"><?php echo app('translator')->get('Status'); ?> <span class="text-danger fs-6">*</span></label>
									<select name="status" class="form-control" required>
										<option value=""><?php echo app('translator')->get('Select One'); ?></option>
										<option <?php echo e(old('status') == 0 ? 'selected' : ''); ?> value="0"><?php echo app('translator')->get('Pending'); ?></option>
										<option <?php echo e(old('status') == 1 ? 'selected' : ''); ?> value="1"><?php echo app('translator')->get('Current'); ?></option>
										<option <?php echo e(old('status') == 2 ? 'selected' : ''); ?> value="2"><?php echo app('translator')->get('Upcoming'); ?></option>
										<option <?php echo e(old('status') == 3 ? 'selected' : ''); ?> value="3"><?php echo app('translator')->get('Finished'); ?></option>
									</select>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="col-6">
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
											<option value="<?php echo e($country->id); ?>" data-cities="<?php echo e($country->city); ?>" <?php if(old('country_id' == @$country->id)): echo 'selected'; endif; ?>>
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
									<input type="text" id="address-input" name="address" class="form-control map-input">
									<input type="hidden" name="latitude" id="address-latitude" value="0" />
									<input type="hidden" name="longitude" id="address-longitude" value="0" />
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="my-3 product-card category-details" data-category-ids="1,2">
			<div class="product-card-header">
				<h6 class="m-0 text-light"><?php echo app('translator')->get('Car / Truck Details'); ?></h6>
			</div>
			<div class="product-card-body">
				<div class="row">
					<div class="mb-3 col-12 col-md-6 col-lg-4">
						<div class="form-group">
							<label class="form-label"><?php echo app('translator')->get('Make'); ?></label>
							<input type="text" name="make" value="<?php echo e(old('make')); ?>" class="form-control">
						</div>
					</div>
					<div class="mb-3 col-12 col-md-6 col-lg-4">
						<div class="form-group">
							<label class="form-label"><?php echo app('translator')->get('Make'); ?> (<?php echo app('translator')->get('Arabic'); ?>)</label>
							<input type="text" name="make_ar" value="<?php echo e(old('make_ar')); ?>" class="form-control">
						</div>
					</div>
					<div class="mb-3 col-12 col-md-6 col-lg-4">
						<div class="form-group">
							<label class="form-label"><?php echo app('translator')->get('Model'); ?></label>
							<input type="text" name="model" value="<?php echo e(old('model')); ?>" class="form-control">
						</div>
					</div>
					<div class="mb-3 col-12 col-md-6 col-lg-4">
						<div class="form-group">
							<label class="form-label"><?php echo app('translator')->get('Model'); ?> (<?php echo app('translator')->get('Arabic'); ?>)</label>
							<input type="text" name="model_ar" value="<?php echo e(old('model_ar')); ?>" class="form-control">
						</div>
					</div>
					<div class="mb-3 col-12 col-md-6 col-lg-4">
						<div class="form-group">
							<label class="form-label"><?php echo app('translator')->get('Year'); ?></label>
							<input type="number" name="year" value="<?php echo e(old('year')); ?>" class="form-control" min="1900"
								max="2099">
						</div>
					</div>
					<div class="mb-3 col-12 col-md-6 col-lg-4">
						<div class="form-group">
							<label class="form-label"><?php echo app('translator')->get('Mileage'); ?></label>
							<input type="number" name="mileage" value="<?php echo e(old('mileage')); ?>" class="form-control">
						</div>
					</div>
					<div class="mb-3 col-12 col-md-6 col-lg-4">
						<div class="form-group">
							<label class="form-label"><?php echo app('translator')->get('VIN'); ?></label>
							<input type="text" name="vin" value="<?php echo e(old('vin')); ?>" class="form-control">
						</div>
					</div>
					<div class="mb-3 col-12 col-md-6 col-lg-4">
						<div class="form-group">
							<label class="form-label"><?php echo app('translator')->get('Title Status'); ?></label>
							<input type="text" name="title_status" value="<?php echo e(old('title_status')); ?>" class="form-control"
								placeholder="e.g. Clean">
						</div>
					</div>
					<div class="mb-3 col-12 col-md-6 col-lg-4">
						<div class="form-group">
							<label class="form-label"><?php echo app('translator')->get('Engine'); ?></label>
							<input type="text" name="engine" value="<?php echo e(old('engine')); ?>" class="form-control"
								placeholder="5.0L V10">
						</div>
					</div>
					<!-- Drivetrain -->
					<div class="mb-3 col-12 col-md-6 col-lg-4">
						<div class="form-group">
							<label class="form-label"><?php echo app('translator')->get('Drivetrain'); ?></label>
							<input type="text" name="drivetrain" value="<?php echo e(old('drivetrain')); ?>" class="form-control"
								placeholder="Rear-Wheel Drive">
						</div>
					</div>
					<!-- Transmission -->
					<div class="mb-3 col-12 col-md-6 col-lg-4">
						<div class="form-group">
							<label class="form-label"><?php echo app('translator')->get('Transmission'); ?></label>
							<input type="text" name="transmission" value="<?php echo e(old('transmission')); ?>" class="form-control"
								placeholder="Automatic">
						</div>
					</div>
					<!-- Body Style -->
					<div class="mb-3 col-12 col-md-6 col-lg-4">
						<div class="form-group">
							<label class="form-label"><?php echo app('translator')->get('Body Style'); ?></label>
							<input type="text" name="body_style" value="<?php echo e(old('body_style')); ?>" class="form-control"
								placeholder="Sedan">
						</div>
					</div>
					<!-- Exterior Color -->
					<div class="mb-3 col-12 col-md-6 col-lg-4">
						<div class="form-group">
							<label class="form-label"><?php echo app('translator')->get('Exterior Color'); ?></label>
							<input type="text" name="exterior_color" value="<?php echo e(old('exterior_color')); ?>" class="form-control"
								placeholder="Alpine white">
						</div>
					</div>
					<!-- Interior Color -->
					<div class="mb-3 col-12 col-md-6 col-lg-4">
						<div class="form-group">
							<label class="form-label"><?php echo app('translator')->get('Interior Color'); ?></label>
							<input type="text" name="interior_color" value="<?php echo e(old('interior_color')); ?>" class="form-control"
								placeholder="Soaring">
						</div>
					</div>
					<!-- Owner Count -->
					<div class="mb-3 col-12 col-md-6 col-lg-4">
						<div class="form-group">
							<label class="form-label"><?php echo app('translator')->get('Owner Count'); ?></label>
							<input type="text" name="owner_count" value="<?php echo e(old('owner_count')); ?>" class="form-control"
								placeholder="1 Owner">
						</div>
					</div>
					<!-- Seller Name -->
					<div class="mb-3 col-12 col-md-6 col-lg-4">
						<div class="form-group">
							<label class="form-label"><?php echo app('translator')->get('Seller Name'); ?></label>
							<input type="text" name="seller_name" value="<?php echo e(old('seller_name')); ?>" class="form-control"
								placeholder="Zayan Ibrahim">
						</div>
					</div>
					<!-- Seller Type -->
					<div class="mb-3 col-12 col-md-6 col-lg-4">
						<div class="form-group">
							<label class="form-label"><?php echo app('translator')->get('Seller Type'); ?></label>
							<select name="seller_type" class="form-control">
								<option value=""><?php echo app('translator')->get('Select'); ?></option>
								<option value="Private Party" <?php echo e(old('seller_type') == 'Private Party' ? 'selected' : ''); ?>><?php echo app('translator')->get('Private Party'); ?>
								</option>
								<option value="Dealer" <?php echo e(old('seller_type') == 'Dealer' ? 'selected' : ''); ?>><?php echo app('translator')->get('Dealer'); ?></option>
							</select>
						</div>
					</div>
					<!-- Highlights (textarea) -->
					<div class="mb-3 col-12 col-md-12">
						<div class="form-group">
							<label class="form-label"><?php echo app('translator')->get('Highlights'); ?></label>
							<textarea name="highlights" class="form-control" rows="3"><?php echo e(old('highlights')); ?></textarea>
						</div>
					</div>
					<!-- Seller Notes (textarea) -->
					<div class="mb-3 col-12 col-md-12">
						<div class="form-group">
							<label class="form-label"><?php echo app('translator')->get('Seller Notes'); ?></label>
							<textarea name="seller_notes" class="form-control" rows="3"><?php echo e(old('seller_notes')); ?></textarea>
						</div>
					</div>
					<!-- Other Items Included (textarea) -->
					<div class="mb-3 col-12 col-md-12">
						<div class="form-group">
							<label class="form-label"><?php echo app('translator')->get('Other Items Included In Sale'); ?></label>
							<textarea name="other_items" class="form-control" rows="3"><?php echo e(old('other_items')); ?></textarea>
						</div>
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
							<option value="House"><?php echo app('translator')->get('House'); ?></option>
							<option value="Apartment"><?php echo app('translator')->get('Apartment'); ?></option>
							<option value="Land"><?php echo app('translator')->get('Land'); ?></option>
							<option value="Commercial"><?php echo app('translator')->get('Commercial'); ?></option>
						</select>
					</div>
					<div class="mb-3 col-12 col-md-6">
						<label class="form-label"><?php echo app('translator')->get('Bedrooms'); ?></label>
						<input type="number" name="bedrooms" value="<?php echo e(old('bedrooms')); ?>" class="form-control">
					</div>
					<div class="mb-3 col-12 col-md-6">
						<label class="form-label"><?php echo app('translator')->get('Bathrooms'); ?></label>
						<input type="number" step="0.5" name="bathrooms" value="<?php echo e(old('bathrooms')); ?>" class="form-control">
					</div>
					<div class="mb-3 col-12 col-md-6">
						<label class="form-label"><?php echo app('translator')->get('Square Footage'); ?></label>
						<input type="number" name="sqft" value="<?php echo e(old('sqft')); ?>" class="form-control">
					</div>
					<div class="mb-3 col-12 col-md-6">
						<label class="form-label"><?php echo app('translator')->get('Lot Size'); ?></label>
						<input type="text" name="lot_size" value="<?php echo e(old('lot_size')); ?>" class="form-control"
							placeholder="e.g. 0.25 acres">
					</div>
					<div class="mb-3 col-12 col-md-6">
						<label class="form-label"><?php echo app('translator')->get('Year Built'); ?></label>
						<input type="number" name="year_built" value="<?php echo e(old('year_built')); ?>" class="form-control">
					</div>
					<div class="mb-3 col-12 col-md-6">
						<label class="form-label"><?php echo app('translator')->get('Garage Spaces'); ?></label>
						<input type="number" name="garage" value="<?php echo e(old('garage')); ?>" class="form-control">
					</div>
					<div class="mb-3 col-12 col-md-12">
						<label class="form-label"><?php echo app('translator')->get('Additional Features'); ?></label>
						<textarea name="re_features" class="form-control" rows="3"><?php echo e(old('re_features')); ?></textarea>
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
						<input type="text" name="era" value="<?php echo e(old('era')); ?>" class="form-control"
							placeholder="e.g. Victorian, 1920s">
					</div>
					<div class="mb-3 col-12 col-md-6">
						<label class="form-label"><?php echo app('translator')->get('Material'); ?></label>
						<input type="text" name="material" value="<?php echo e(old('material')); ?>" class="form-control">
					</div>
					<div class="mb-3 col-12 col-md-6">
						<label class="form-label"><?php echo app('translator')->get('Dimensions'); ?></label>
						<input type="text" name="dimensions" value="<?php echo e(old('dimensions')); ?>" class="form-control"
							placeholder="e.g. 10x10x5 in">
					</div>
					<div class="mb-3 col-12 col-md-6">
						<label class="form-label"><?php echo app('translator')->get('Condition'); ?></label>
						<select name="condition" class="form-control">
							<option value=""><?php echo app('translator')->get('Select'); ?></option>
							<option value="Mint"><?php echo app('translator')->get('Mint'); ?></option>
							<option value="Excellent"><?php echo app('translator')->get('Excellent'); ?></option>
							<option value="Good"><?php echo app('translator')->get('Good'); ?></option>
							<option value="Fair"><?php echo app('translator')->get('Fair'); ?></option>
							<option value="Poor"><?php echo app('translator')->get('Poor'); ?></option>
						</select>
					</div>
					<div class="mb-3 col-12 col-md-6">
						<label class="form-label"><?php echo app('translator')->get('Provenance'); ?></label>
						<input type="text" name="provenance" value="<?php echo e(old('provenance')); ?>" class="form-control">
					</div>
					<div class="mb-3 col-12 col-md-6">
						<label class="form-label"><?php echo app('translator')->get('Artist / Maker'); ?></label>
						<input type="text" name="artist" value="<?php echo e(old('artist')); ?>" class="form-control">
					</div>
					<div class="mb-3 col-12 col-md-12">
						<label class="form-label"><?php echo app('translator')->get('Additional Notes'); ?></label>
						<textarea name="antique_notes" class="form-control" rows="3"><?php echo e(old('antique_notes')); ?></textarea>
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
						<input type="text" name="species" value="<?php echo e(old('species')); ?>" class="form-control">
					</div>
					<div class="mb-3 col-12 col-md-6">
						<label class="form-label"><?php echo app('translator')->get('Breed'); ?></label>
						<input type="text" name="breed" value="<?php echo e(old('breed')); ?>" class="form-control">
					</div>
					<div class="mb-3 col-12 col-md-6">
						<label class="form-label"><?php echo app('translator')->get('Age'); ?></label>
						<input type="text" name="animal_age" value="<?php echo e(old('animal_age')); ?>" class="form-control"
							placeholder="e.g. 2 years">
					</div>
					<div class="mb-3 col-12 col-md-6">
						<label class="form-label"><?php echo app('translator')->get('Gender'); ?></label>
						<select name="gender" class="form-control">
							<option value=""><?php echo app('translator')->get('Select'); ?></option>
							<option value="Male"><?php echo app('translator')->get('Male'); ?></option>
							<option value="Female"><?php echo app('translator')->get('Female'); ?></option>
						</select>
					</div>
					<div class="mb-3 col-12 col-md-6">
						<label class="form-label"><?php echo app('translator')->get('Weight'); ?></label>
						<input type="text" name="weight" value="<?php echo e(old('weight')); ?>" class="form-control"
							placeholder="e.g. 50 kg">
					</div>
					<div class="mb-3 col-12 col-md-6">
						<label class="form-label"><?php echo app('translator')->get('Health Records'); ?></label>
						<input type="text" name="health_records" value="<?php echo e(old('health_records')); ?>" class="form-control"
							placeholder="Vaccinated, dewormed">
					</div>
					<div class="mb-3 col-12 col-md-12">
						<label class="form-label"><?php echo app('translator')->get('Additional Info'); ?></label>
						<textarea name="animal_info" class="form-control" rows="3"><?php echo e(old('animal_info')); ?></textarea>
					</div>
				</div>
			</div>
		</div>

		<div class="my-3 product-card category-details" data-category-ids="6">
			<div class="product-card-header">
				<h6 class="m-0 text-light"><?php echo app('translator')->get('Fruits & Vegetables Details'); ?></h6>
			</div>
			<div class="product-card-body">
				<div class="row">
					<div class="mb-3 col-12 col-md-6">
						<label class="form-label"><?php echo app('translator')->get('Type'); ?></label>
						<input type="text" name="produce_type" value="<?php echo e(old('produce_type')); ?>" class="form-control"
							placeholder="e.g. Apple, Tomato">
					</div>
					<div class="mb-3 col-12 col-md-6">
						<label class="form-label"><?php echo app('translator')->get('Variety'); ?></label>
						<input type="text" name="variety" value="<?php echo e(old('variety')); ?>" class="form-control"
							placeholder="e.g. Gala, Roma">
					</div>
					<div class="mb-3 col-12 col-md-6">
						<label class="form-label"><?php echo app('translator')->get('Quantity'); ?></label>
						<input type="text" name="quantity" value="<?php echo e(old('quantity')); ?>" class="form-control"
							placeholder="e.g. 1000 kg">
					</div>
					<div class="mb-3 col-12 col-md-6">
						<label class="form-label"><?php echo app('translator')->get('Harvest Date'); ?></label>
						<input type="date" name="harvest_date" value="<?php echo e(old('harvest_date')); ?>" class="form-control">
					</div>
					<div class="mb-3 col-12 col-md-6">
						<label class="form-label"><?php echo app('translator')->get('Grade'); ?></label>
						<input type="text" name="grade" value="<?php echo e(old('grade')); ?>" class="form-control"
							placeholder="e.g. A, Organic">
					</div>
					<div class="mb-3 col-12 col-md-12">
						<label class="form-label"><?php echo app('translator')->get('Additional Details'); ?></label>
						<textarea name="produce_notes" class="form-control" rows="3"><?php echo e(old('produce_notes')); ?></textarea>
					</div>
				</div>
			</div>
		</div>

		<!-- Images Card (unchanged) -->
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.image-uploader','data' => ['class' => 'w-100','name' => 'thumb_image','type' => 'auction_thumb']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('image-uploader'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'w-100','name' => 'thumb_image','type' => 'auction_thumb']); ?>
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
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="mb-3 col-12 col-md-12">
				<div class="form-group">
					<label class="form-label"><?php echo app('translator')->get('Description'); ?> <span class="text-danger fs-6">*</span></label>
					<textarea name="description" class="form-control nicEdit" rows="10"><?php echo e(old('description')); ?></textarea>
				</div>
			</div>
			<div class="mb-3 col-12 col-md-12">
				<div class="form-group">
					<label class="form-label"><?php echo app('translator')->get('Description'); ?> (<?php echo app('translator')->get('Arabic'); ?>) <span
							class="text-danger fs-6">*</span></label>
					<textarea name="description_ar" class="form-control nicEdit" rows="10"><?php echo e(old('description_ar')); ?></textarea>
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

		}).change();

		$('[name=country_id]').on('change', function() {
			var cities = $(this).find('option:selected').data('cities');
			var option = '<option value=""><?php echo app('translator')->get('Select one'); ?></option>';
			$.each(cities, function(index, value) {
				var name = "<?php echo e(app()->getLocale()); ?>" == 'en' ? value.name : value.name_ar;
				option += "<option value='" + value.id + "' " + (value.id == "" ? "selected" : "") +
					"data-lat='" + value.lat + "' data-lng='" + value.lng + "'>" +
					name + "</option>";
			});
			$('select[name=city_id]').html(option);
		}).change();

		$("input[name=title]").on('input', function() {
			var title = $(this).val();
			var generateSlug = title.toLowerCase().replace(/ /g, '-').replace(/[^\w-]+/g, '');
			$("input[name=slug]").val(generateSlug);
		});

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

<?php echo $__env->make('admin.layouts.app', ['title' => 'Create Auction'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\soudi-project\Amlek\resources\views/admin/auction/create.blade.php ENDPATH**/ ?>
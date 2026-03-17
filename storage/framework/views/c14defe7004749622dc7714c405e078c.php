<?php $__env->startSection('content'); ?>

	<section class="auction-details-content pb-5">
		<div class="container">
			<div class="row g-4">
				<!-- Left Column: Gallery & Details -->
				<div class="col-xl-8 col-lg-7">
					<!-- Gallery -->
					<div class="car-gallery mb-4">
						<div class="main-image mb-2">
							<img src="<?php echo e(getImage(getFilePath('auction_thumb') . '/' . $auction->thumb_image, getFileSize('auction_thumb'))); ?>"
								alt="<?php echo e($auction->title); ?>" class="img-fluid rounded"
								onerror="this.src='https://via.placeholder.com/1000x500/eeeeee/999999?text=No+Image'">
						</div>
						<div class="row g-2 thumb-gallery">
							<?php $__currentLoopData = $auction->images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<div class="col-3">
									<img src="<?php echo e(getImage(getFilePath('auction') . '/' . $image->image, getFileSize('auction'))); ?>" alt="Thumb"
										class="img-fluid rounded">
								</div>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							<?php if($auction->images->count() < 4): ?>
								<?php for($i = $auction->images->count(); $i < 4; $i++): ?>
									<div class="col-3">
										<div class="thumb-wrapper position-relative h-100">
											<img src="https://via.placeholder.com/250x150/eeeeee/999999?text=No+Image" alt="Placeholder"
												class="img-fluid rounded h-100 w-100 object-fit-cover">
										</div>
									</div>
								<?php endfor; ?>
							<?php endif; ?>
						</div>
					</div>

					<!-- Title & Subtitle -->
					<div class="car-header-info mb-4">
						<h3 class="car-title fw-bold"><?php echo e(app()->getLocale() == 'en' ? $auction->title : $auction->title_ar); ?></h3>
						<?php
							$subtitleParts = [];
							if ($auction->mileage) {
							    $subtitleParts[] = number_format($auction->mileage) . ' ' . __('Miles');
							}
							if ($auction->engine) {
							    $subtitleParts[] = $auction->engine;
							}
							if ($auction->owner_count) {
							    $subtitleParts[] = $auction->owner_count . ' ' . __('Owner');
							}
							if ($auction->exterior_color) {
							    $subtitleParts[] = $auction->exterior_color;
							}
						?>
						<?php if(!empty($subtitleParts)): ?>
							<p class="text-muted small"><?php echo e(implode(', ', $subtitleParts)); ?></p>
						<?php endif; ?>
					</div>

					<!-- Specifications Table (Dynamic by Category) -->
					<div class="car-specs-table mb-5">
						<table class="table table-bordered align-middle">
							<tbody>
								<?php
									$specs = [];
									// Car / Truck fields
									if (in_array($auction->category_id, [1, 2])) {
									    $specs = [
									        __('Make') => $auction->make,
									        __('Model') => $auction->model,
									        __('Year') => $auction->year,
									        __('Mileage') => $auction->mileage ? number_format($auction->mileage) : null,
									        __('VIN') => $auction->vin,
									        __('Title Status') => $auction->title_status,
									        __('Engine') => $auction->engine,
									        __('Drivetrain') => $auction->drivetrain,
									        __('Transmission') => $auction->transmission,
									        __('Body Style') => $auction->body_style,
									        __('Exterior Color') => $auction->exterior_color,
									        __('Interior Color') => $auction->interior_color,
									        __('Owner Count') => $auction->owner_count,
									        __('Seller') => $auction->seller_name,
									        __('Seller Type') => $auction->seller_type,
									        __('Location') => optional($auction->city)->name . ', ' . optional($auction->country)->name,
									    ];
									}
									// Real Estate
									elseif ($auction->category_id == 3) {
									    $specs = [
									        __('Property Type') => $auction->property_type,
									        __('Bedrooms') => $auction->bedrooms,
									        __('Bathrooms') => $auction->bathrooms,
									        __('Square Footage') => $auction->sqft,
									        __('Lot Size') => $auction->lot_size,
									        __('Year Built') => $auction->year_built,
									        __('Garage') => $auction->garage,
									        __('Additional Features') => $auction->re_features,
									        __('Location') => optional($auction->city)->name . ', ' . optional($auction->country)->name,
									    ];
									}
									// Antiques
									elseif ($auction->category_id == 4) {
									    $specs = [
									        __('Era / Period') => $auction->era,
									        __('Material') => $auction->material,
									        __('Dimensions') => $auction->dimensions,
									        __('Condition') => $auction->condition,
									        __('Provenance') => $auction->provenance,
									        __('Artist / Maker') => $auction->artist,
									        __('Location') => optional($auction->city)->name . ', ' . optional($auction->country)->name,
									    ];
									}
									// Animals
									elseif ($auction->category_id == 5) {
									    $specs = [
									        __('Species') => $auction->species,
									        __('Breed') => $auction->breed,
									        __('Age') => $auction->animal_age,
									        __('Gender') => $auction->gender,
									        __('Weight') => $auction->weight,
									        __('Health Records') => $auction->health_records,
									        __('Location') => optional($auction->city)->name . ', ' . optional($auction->country)->name,
									    ];
									}
									// Fruits & Vegetables
									elseif ($auction->category_id == 6) {
									    $specs = [
									        __('Type') => $auction->produce_type,
									        __('Variety') => $auction->variety,
									        __('Quantity') => $auction->quantity,
									        __('Harvest Date') => $auction->harvest_date
									            ? \Carbon\Carbon::parse($auction->harvest_date)->format('d M Y')
									            : null,
									        __('Grade') => $auction->grade,
									        __('Location') => optional($auction->city)->name . ', ' . optional($auction->country)->name,
									    ];
									}
								?>

								<?php $__currentLoopData = $specs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $label => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<?php if($value): ?>
										<tr>
											<td class="bg-light fw-semibold text-muted label-col"><?php echo e($label); ?></td>
											<td><?php echo e($value); ?></td>
											<?php if($loop->iteration % 2 == 1 && !$loop->last): ?>
												<?php
													$next = array_slice($specs, $loop->iteration, 1, true);
													$nextLabel = key($next);
													$nextValue = current($next);
												?>
												<?php if($nextValue): ?>
													<td class="bg-light fw-semibold text-muted label-col"><?php echo e($nextLabel); ?></td>
													<td><?php echo e($nextValue); ?></td>
												<?php else: ?>
													<td></td>
													<td></td>
												<?php endif; ?>
											<?php endif; ?>
										</tr>
									<?php endif; ?>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							</tbody>
						</table>
					</div>

					<!-- Additional Sections (Highlights, Other Items, etc.) -->
					<div class="car-details-sections">
						<?php if($auction->highlights): ?>
							<div class="detail-section mb-4">
								<h5 class="fw-bold mb-3"><?php echo app('translator')->get('Highlights'); ?></h5>
								<ul class="custom-check-list">
									<?php $__currentLoopData = explode("\n", $auction->highlights); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $line): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
										<?php if(trim($line)): ?>
											<li><?php echo e(trim($line)); ?></li>
										<?php endif; ?>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
								</ul>
							</div>
						<?php endif; ?>

						<?php if($auction->other_items): ?>
							<div class="detail-section mb-4">
								<h5 class="fw-bold mb-3"><?php echo app('translator')->get('Other Items Included in Sale'); ?></h5>
								<ul class="custom-check-list">
									<?php $__currentLoopData = explode("\n", $auction->other_items); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $line): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
										<?php if(trim($line)): ?>
											<li><?php echo e(trim($line)); ?></li>
										<?php endif; ?>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
								</ul>
							</div>
						<?php endif; ?>

						<?php if($auction->seller_notes): ?>
							<div class="detail-section mb-4">
								<h5 class="fw-bold mb-3"><?php echo app('translator')->get('Seller Notes'); ?></h5>
								<ul class="custom-check-list">
									<?php $__currentLoopData = explode("\n", $auction->seller_notes); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $line): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
										<?php if(trim($line)): ?>
											<li><?php echo e(trim($line)); ?></li>
										<?php endif; ?>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
								</ul>
							</div>
						<?php endif; ?>
					</div>
				</div>

				<!-- Right Column: Bid Box & Similar Auctions -->
				<div class="col-xl-4 col-lg-5">
					<div class="bid-action-box mb-4">
						<p class="text-muted small mb-1"><?php echo app('translator')->get('Current Bid'); ?></p>
						<h2 class="bid-price fw-bold mb-4"><?php echo e(showAmount($auction->starting_price ?? 0)); ?></h2>

						<?php
							$start = \Carbon\Carbon::parse($auction->beginning_time);
							$endDate = $start->copy()->addDays($auction->auction_day ?? 0);
							$now = \Carbon\Carbon::now();
							$diff = $now->diff($endDate);
						?>

						<p class="text-muted small mb-1"><?php echo app('translator')->get('Ending'); ?>:</p>
						<p class="fw-bold mb-3">
							<?php if($endDate->gt($now)): ?>
								<?php echo e($diff->d); ?> <?php echo app('translator')->get('Days'); ?> | <?php echo e($diff->h); ?> <?php echo app('translator')->get('Hours'); ?> | <?php echo e($diff->i); ?>

								<?php echo app('translator')->get('Minutes'); ?>
							<?php else: ?>
								<?php echo app('translator')->get('Auction ended'); ?>
							<?php endif; ?>
						</p>

						<?php if($endDate->gt($now)): ?>
							<a href="<?php echo e(route('bidding.request.page', $auction->slug)); ?>"
								class="btn btn-primary w-100 btn-lg mb-3 place-bid-btn"><?php echo app('translator')->get('Place Bid'); ?></a>
						<?php else: ?>
							<button class="btn btn-secondary w-100 btn-lg mb-3" disabled><?php echo app('translator')->get('Closed'); ?></button>
						<?php endif; ?>

						<div class="watching-bidders d-flex align-items-center">
							<div class="avatar-group me-2">
								<?php $__currentLoopData = $auction->biddings->take(4); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bid): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<img src="<?php echo e(getImage(getFilePath('userProfile') . '/' . $bid->user->image)); ?>"
										class="rounded-circle border border-white" alt="bidder">
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							</div>
							<span class="small fw-semibold"><?php echo app('translator')->get('Watching Bidder'); ?></span>
						</div>
					</div>

					<!-- Similar Auctions (from same category) -->
					<?php if(isset($relatedAuctions) && $relatedAuctions->count()): ?>
						<div class="row g-3">
							<?php $__currentLoopData = $relatedAuctions->take(2); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $related): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<div class="col-6">
									<div class="auction-card">
										<div class="auction-img">
											<img
												src="<?php echo e(getImage(getFilePath('auction_thumb') . '/' . $related->thumb_image, getFileSize('auction_thumb'))); ?>"
												alt="<?php echo e($related->title); ?>" onerror="this.src='https://via.placeholder.com/300x150/eeeeee/999999'">
										</div>
										<div class="auction-content">
											<h6 class="auction-title">
												<?php echo e(Str::limit(app()->getLocale() == 'en' ? $related->title : $related->title_ar, 40)); ?></h6>
											<div class="auction-feature">
												<div class="feature-row-full"><i class="bi bi-check2"></i> <?php echo app('translator')->get('Comprehensive Inspection'); ?></div>
												<div class="feature-row-full"><i class="bi bi-clock"></i> <?php echo app('translator')->get('Live Bidding'); ?></div>
												<div class="feature-row-full"><i class="bi bi-truck"></i> <?php echo app('translator')->get('Delivery Options'); ?></div>
											</div>
											<div class="auction-footer">
												<div class="price-info">
													<span class="starting-label"><?php echo app('translator')->get('Starting at'); ?>:</span>
													<div class="auction-price"><?php echo e(showAmount($related->starting_price ?? 0)); ?></div>
												</div>
												<a href="<?php echo e(route('auction.details', $related->slug)); ?>"
													class="btn-bid text-center mt-2 d-block"><?php echo app('translator')->get('Bid Now'); ?></a>
											</div>
										</div>
									</div>
								</div>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						</div>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</section>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('style'); ?>
	<style>
		/* Header & Filters (Reused) */
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

		/* Left Gallery */
		.main-image img {
			width: 100%;
			height: 300px;
			object-fit: cover;
		}

		.thumb-wrapper {
			cursor: pointer;
		}

		.thumb-overlay {
			position: absolute;
			top: 0;
			left: 0;
			right: 0;
			bottom: 0;
			background: rgba(0, 0, 0, 0.6);
			color: white;
			display: flex;
			align-items: center;
			justify-content: center;
			text-align: center;
			font-size: 13px;
			font-weight: 600;
			transition: 0.3s;
		}

		.thumb-overlay:hover {
			background: rgba(0, 0, 0, 0.7);
		}

		/* Specs Table */
		.car-specs-table .table {
			font-size: 13px;
			border-color: #e9ecef;
		}

		.car-specs-table td {
			padding: 12px 15px;
		}

		.car-specs-table .label-col {
			width: 20%;
			color: #555;
		}

		/* Details Checklist */
		.custom-check-list {
			list-style: none;
			padding-left: 0;
		}

		.custom-check-list li {
			position: relative;
			padding-left: 28px;
			margin-bottom: 12px;
			font-size: 13.5px;
			color: #444;
			line-height: 1.6;
		}

		.custom-check-list li::before {
			content: '✓';
			position: absolute;
			left: 0;
			top: 0;
			color: #333;
			font-weight: bold;
			font-size: 14px;
		}

		/* Right Sidebar: Bid Box */
		.bid-action-box {
			background: #fff;
			padding: 25px;
			border-radius: 8px;
			box-shadow: 0 4px 15px rgba(0, 0, 0, 0.03);
			border: 1px solid #f0f0f0;
		}

		.bid-price {
			font-size: 28px;
			color: #222;
		}

		.place-bid-btn {
			background: #007bff;
			border: none;
			font-weight: 600;
			padding: 12px;
			border-radius: 6px;
		}

		.place-bid-btn:hover {
			background: #0056b3;
		}

		/* Avatar Group */
		.avatar-group img {
			width: 32px;
			height: 32px;
			margin-right: -10px;
			position: relative;
		}

		.avatar-group img:last-child {
			margin-right: 0;
		}

		/* Similar Cards */
		.auction-card {
			background: white;
			border-radius: 8px;
			overflow: hidden;
			border: 1px solid #f0f0f0;
			transition: .3s;
			height: 100%;
			display: flex;
			flex-direction: column;
		}

		.auction-img {
			background: #fff;
			padding: 10px;
			border-bottom: 1px solid #f8f8f8;
		}

		.auction-img img {
			width: 100%;
			height: 80px;
			object-fit: contain;
		}

		.auction-content {
			padding: 12px;
			flex-grow: 1;
			display: flex;
			flex-direction: column;
		}

		.auction-title {
			font-size: 11px;
			font-weight: 700;
			color: #222;
			margin-bottom: 10px;
			line-height: 1.3;
			height: 30px;
			overflow: hidden;
		}

		.auction-feature {
			margin-bottom: auto;
			padding-bottom: 10px;
			border-bottom: 1px solid #f0f0f0;
		}

		.feature-row-full {
			font-size: 9px;
			color: #555;
			margin-bottom: 4px;
			font-weight: 500;
			white-space: nowrap;
			overflow: hidden;
			text-overflow: ellipsis;
		}

		.feature-row-full i {
			color: #333;
			margin-right: 3px;
		}

		.auction-footer {
			margin-top: 10px;
		}

		.starting-label {
			font-size: 9px;
			color: #888;
			margin-bottom: 2px;
			display: block;
		}

		.auction-price {
			color: #5d1b8c;
			font-weight: 700;
			font-size: 11px;
		}

		.btn-bid {
			background: #5d1b8c;
			color: white;
			padding: 5px 10px;
			border-radius: 4px;
			font-size: 11px;
			font-weight: 600;
			text-decoration: none;
			transition: 0.2s;
		}

		.btn-bid:hover {
			background: #46146b;
			color: white;
		}
	</style>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('web.layouts.frontend', ['title' => $auction->category->name . ' Auction Details'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\soudi-project\Amlek\resources\views/web/pages/auction_details_about.blade.php ENDPATH**/ ?>
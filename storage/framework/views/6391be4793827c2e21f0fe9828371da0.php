<?php $__env->startSection('panel'); ?>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <div class="border shadow-none card">
                                <div class="p-0 card-body">
                                    <?php if($auction->user): ?>
                                        <div class="card-list">
                                            <span><?php echo app('translator')->get('Creator User'); ?></span>
                                            <b><?php echo e(optional($auction->create_by)->name); ?></b>
                                        </div>
                                    <?php endif; ?>
                                    <div class="card-list">
                                        <span><?php echo app('translator')->get('Category'); ?></span>
                                        <b>
                                            <?php if(app()->getLocale() == 'en'): ?>
                                                <?php echo e(optional($auction->category)->name); ?>

                                            <?php else: ?>
                                                <?php echo e(optional($auction->category)->name_ar); ?>

                                            <?php endif; ?>
                                        </b>
                                    </div>
                                    <div class="card-list">
                                        <span><?php echo app('translator')->get('Title'); ?></span>
                                        <b><?php echo e($auction->title); ?></b>
                                    </div>
                                    <div class="card-list">
                                        <span><?php echo app('translator')->get('Title ar'); ?></span>
                                        <b><?php echo e($auction->title_ar); ?></b>
                                    </div>

                                    <div class="card-list">
                                        <span><?php echo app('translator')->get('Total Project'); ?></span>
                                        <b><?php echo e(optional($auction->properties)->count()); ?></b>
                                    </div>
                                    <div class="card-list">
                                        <span><?php echo app('translator')->get('Auction Day'); ?></span>
                                        <b><?php echo e(@$auction->auction_day); ?></b>
                                    </div>
                                    <div class="card-list">
                                        <span><?php echo app('translator')->get('Auction Date'); ?></span>
                                        <b><small><?php echo e(showDateTime($auction->auction_date, 'd M Y')); ?></small></b>
                                    </div>
                                    <div class="card-list">
                                        <span><?php echo app('translator')->get('Beginning Time'); ?></span>
                                        <b><small><?php echo e(showDateTime($auction->beginning_time, 'd M Y')); ?></small>
                                            <br>
                                            <small><?php echo e(showDateTime($auction->beginning_time, 'H:i A')); ?></small>
                                        </b>
                                    </div>
                                    <div class="card-list">
                                        <span><?php echo app('translator')->get('Status'); ?></span>
                                        <b><?php echo $auction->statusBadge; ?></b>
                                    </div>
                                    <div class="card-list">
                                        <span><?php echo app('translator')->get('Created At'); ?></span>
                                        <b> <small><?php echo e(showDateTime($auction->created_at, 'd M Y')); ?></small>
                                            <br>
                                            <small><?php echo e(showDateTime($auction->created_at, 'H:i A')); ?></small>
                                        </b>
                                    </div>

                                    <div class="card-list">
                                        <b><?php echo app('translator')->get('Auction Project Lists'); ?></b>
                                    </div>
                                    <?php if($auction->properties): ?>
                                        <?php $__currentLoopData = $auction->properties; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $auction_property): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="card-list">
                                                <b><a href="<?php echo e(route('admin.properties.show', $auction_property->property_id)); ?>">
                                                    <?php if(app()->getLocale() == 'en'): ?>
                                                        <?php echo e($auction_property->property->title); ?>

                                                    <?php else: ?>
                                                        <?php echo e($auction_property->property->title_ar); ?>

                                                    <?php endif; ?>
                                                </a></b>
                                            </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>

                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="border shadow-none card">
                            <div class="card-header">
                                    <h5><?php echo app('translator')->get('Images'); ?></h5>
                                </div>
                                <div class="card-body">
                                    <div>
                                        <h6 class="pb-2"><?php echo app('translator')->get('Thumb Image'); ?> :</h6>
                                        <div class="property-image">
                                            <a
                                                href="<?php echo e(getImage(getFilePath('auction_thumb') . '/' . $auction->thumb_image, getFileSize('auction_thumb'))); ?>">
                                                <img src="<?php echo e(getImage(getFilePath('auction_thumb') . '/' . $auction->thumb_image, getFileSize('auction_thumb'))); ?>"
                                                    alt="<?php echo app('translator')->get('Image'); ?>">
                                            </a>
                                        </div>
                                    </div>

                                    <div class="mt-4">
                                        <h6 class="pb-2"><?php echo app('translator')->get('Images'); ?> :</h6>
                                        <div class="property-image">
                                            <?php $__currentLoopData = $auctionImages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <a
                                                    href="<?php echo e(getImage(getFilePath('auction') . '/' . $image->image, getFileSize('auction'))); ?>">
                                                    <img src="<?php echo e(getImage(getFilePath('auction') . '/' . $image->image, getFileSize('auction'))); ?>"
                                                        alt="<?php echo app('translator')->get('Image'); ?>">
                                                </a>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="mt-4 border shadow-none card">
                                <div class="card-header">
                                    <h5><?php echo app('translator')->get('Locations'); ?></h5>
                                </div>
                                <div class="card-body">
                                    <div class="card-list">
                                        <span><?php echo app('translator')->get('Country'); ?></span>
                                        <b>
                                            <?php if(app()->getLocale() == 'en'): ?>
                                                <?php echo e(optional($auction->country)->name); ?>

                                            <?php else: ?>
                                                <?php echo e(optional($auction->country)->name_ar); ?>

                                            <?php endif; ?>
                                        </b>
                                    </div>
                                    <div class="card-list">
                                        <span><?php echo app('translator')->get('City'); ?></span>
                                        <b>
                                            <?php if(app()->getLocale() == 'en'): ?>
                                                <?php echo e(optional($auction->city)->name); ?>

                                            <?php else: ?>
                                                <?php echo e(optional($auction->city)->name_ar); ?>

                                            <?php endif; ?>
                                        </b>
                                    </div>
                                    <div>
                                        <?php echo $__env->make('web.component.auction_map', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- ========= NEW: ADDITIONAL AUCTION DETAILS ========= -->
                    <?php
                        $additionalFields = [
                            // Car / Truck
                            'make'          => __('Make'),
                            'make_ar'       => __('Make (Arabic)'),
                            'model'         => __('Model'),
                            'model_ar'      => __('Model (Arabic)'),
                            'year'          => __('Year'),
                            'mileage'       => __('Mileage'),
                            'vin'           => __('VIN'),
                            'title_status'  => __('Title Status'),
                            'engine'        => __('Engine'),
                            'drivetrain'    => __('Drivetrain'),
                            'transmission'  => __('Transmission'),
                            'body_style'    => __('Body Style'),
                            'exterior_color'=> __('Exterior Color'),
                            'interior_color'=> __('Interior Color'),
                            'owner_count'   => __('Owner Count'),
                            'seller_name'   => __('Seller Name'),
                            'seller_type'   => __('Seller Type'),
                            'highlights'    => __('Highlights'),
                            'seller_notes'  => __('Seller Notes'),
                            'other_items'   => __('Other Items Included'),
                            // Real Estate
                            'property_type' => __('Property Type'),
                            'bedrooms'      => __('Bedrooms'),
                            'bathrooms'     => __('Bathrooms'),
                            'sqft'          => __('Square Footage'),
                            'lot_size'      => __('Lot Size'),
                            'year_built'    => __('Year Built'),
                            'garage'        => __('Garage Spaces'),
                            're_features'   => __('Additional Features'),
                            // Antiques
                            'era'           => __('Era / Period'),
                            'material'      => __('Material'),
                            'dimensions'    => __('Dimensions'),
                            'condition'     => __('Condition'),
                            'provenance'    => __('Provenance'),
                            'artist'        => __('Artist / Maker'),
                            'antique_notes' => __('Additional Notes'),
                            // Animals
                            'species'       => __('Species'),
                            'breed'         => __('Breed'),
                            'animal_age'    => __('Age'),
                            'gender'        => __('Gender'),
                            'weight'        => __('Weight'),
                            'health_records'=> __('Health Records'),
                            'animal_info'   => __('Additional Info'),
                            // Fruits & Vegetables
                            'produce_type'  => __('Type'),
                            'variety'       => __('Variety'),
                            'quantity'      => __('Quantity'),
                            'harvest_date'  => __('Harvest Date'),
                            'grade'         => __('Grade'),
                            'produce_notes' => __('Additional Details'),
                        ];
                    ?>

                    <div class="row mt-4">
                        <div class="col-12">
                            <div class="border shadow-none card">
                                <div class="card-header">
                                    <h5><?php echo app('translator')->get('Additional Auction Details'); ?></h5>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <?php $__currentLoopData = $additionalFields; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $field => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if(!is_null($auction->$field) && $auction->$field !== ''): ?>
                                                <div class="col-md-6 mb-2">
                                                    <strong><?php echo e($label); ?>:</strong>
                                                    <span><?php echo e($auction->$field); ?></span>
                                                </div>
                                            <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ========= END ADDITIONAL DETAILS ========= -->

                    <div class="row mt-4">
                        <div class="col-md-6">
                            <div class="border shadow-none card">
                                <div class="card-header">
                                    <h6><?php echo app('translator')->get('Description'); ?></h6>
                                </div>
                                <div class="card-body">
                                    <?php echo $auction->description ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="border shadow-none card">
                                <div class="card-header">
                                    <h6><?php echo app('translator')->get('Description'); ?> <?php echo app('translator')->get('Arabic'); ?></h6>
                                </div>
                                <div class="card-body">
                                    <?php echo $auction->description_ar ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php if (isset($component)) { $__componentOriginal5b8b2d0f151a30be878e1a760ec3900c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal5b8b2d0f151a30be878e1a760ec3900c = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.confirmation-modal','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('confirmation-modal'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal5b8b2d0f151a30be878e1a760ec3900c)): ?>
<?php $attributes = $__attributesOriginal5b8b2d0f151a30be878e1a760ec3900c; ?>
<?php unset($__attributesOriginal5b8b2d0f151a30be878e1a760ec3900c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal5b8b2d0f151a30be878e1a760ec3900c)): ?>
<?php $component = $__componentOriginal5b8b2d0f151a30be878e1a760ec3900c; ?>
<?php unset($__componentOriginal5b8b2d0f151a30be878e1a760ec3900c); ?>
<?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('breadcrumb-plugins'); ?>
    <div class="flex-wrap gap-2 d-flex">
        <a href="<?php echo e(route('admin.auction.index')); ?>" class="btn btn-primary"><i
                class="bi bi-arrow-clockwise pe-1"></i><?php echo app('translator')->get('Back'); ?></a>

        <a href="<?php echo e(route('admin.auction.status', [$auction->id, Status::PENDING])); ?>" class="btn btn-warning"><i
                class="bi bi-x pe-1"></i><?php echo app('translator')->get('Pending'); ?></a>
        <a href="<?php echo e(route('admin.auction.status', [$auction->id, Status::CURRENT])); ?>" class="btn btn-primary"><i
                class="bi bi-check2 pe-1"></i><?php echo app('translator')->get('Current'); ?></a>
        <a href="<?php echo e(route('admin.auction.status', [$auction->id, Status::FINISHED])); ?>" class="btn btn-success"><i
                    class="bi bi-check2 pe-1"></i><?php echo app('translator')->get('Finished'); ?></a>
        <a href="<?php echo e(route('admin.auction.status', [$auction->id, Status::UPCOMING])); ?>" class="btn btn-info"><i
            class="bi bi-check2 pe-1"></i><?php echo app('translator')->get('Upcoming'); ?></a>
    </div>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('style-lib'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('assets/global/css/magnific-popup.css')); ?>">
<?php $__env->stopPush(); ?>

<?php $__env->startPush('script-lib'); ?>
    <script src="<?php echo e(asset('assets/global/js/magnific-popup.js')); ?>"></script>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('script'); ?>
    <script>
        $('.property-image').each(function() {
            $(this).magnificPopup({
                delegate: 'a',
                type: 'image',
                gallery: { enabled: true }
            });
        });
    </script>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('style'); ?>
    <style>
        .card-body .card-list {
            display: flex;
            padding: 8px;
            flex-wrap: nowrap;
            border-bottom: 1px solid #cccccc;
            justify-content: space-between;
        }
        .card-body .card-list:last-child {
            border-bottom: none;
        }
        .property-image {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
        }
        .property-image>a {
            width: 170px;
            display: flex;
            border: 1px solid #cccccc;
            border-radius: 5px;
            overflow: hidden;
        }
        .property-image img {
            width: 100%;
        }
    </style>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('admin.layouts.app', ['title' => 'Auction Details'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\soudi-project\Amlek\resources\views/admin/auction/show.blade.php ENDPATH**/ ?>
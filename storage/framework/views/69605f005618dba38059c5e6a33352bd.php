<?php $__env->startSection('panel'); ?>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <div class="border shadow-none card">
                                <div class="p-0 card-body">
                                     <div class="card-list">
                                         <span><?php echo app('translator')->get('Ref.'); ?></span>
                                         <b><a
                                                    href="<?php echo e(route('admin.users.detail', @$property->user->id)); ?>">
                                            <?php echo e($property->user ? ($property->user->ref ?? 'REF' . $property->user->created_at->format('Y') . $property->user->id) : 'No Reference'); ?>

                                            </a></b>
                                    </div>
                                    <?php if($property->user): ?>
                                        <div class="card-list">
                                            <span><?php echo app('translator')->get('Creator User'); ?></span>
                                            <b><a
                                                    href="<?php echo e(route('admin.users.detail', @$property->user->id)); ?>"><?php echo e(@$property->user->name); ?></a></b>
                                        </div>
                                    <?php endif; ?>
                                    <div class="card-list">
                                        <span><?php echo app('translator')->get('Title'); ?></span>
                                        <b><?php echo e($property->title); ?></b>
                                    </div>
                                    <div class="card-list">
                                        <span><?php echo app('translator')->get('Title ar'); ?></span>
                                        <b><?php echo e($property->title_ar); ?></b>
                                    </div>
                                    <div class="card-list">
                                        <span><?php echo app('translator')->get('Property Type'); ?></span>
                                        <b><?php echo e(@$property->propertyType->name); ?></b>
                                    </div>
                                    <div class="card-list">
                                        <span><?php echo app('translator')->get('Sub Property Type'); ?></span>
                                        <b>
                                            <?php echo e(@$property->subPropertyType->name); ?>

                                        </b>
                                    </div>
                                    <div class="card-list">
                                        <span><?php echo app('translator')->get('Construction Type'); ?></span>
                                        <b><?php echo e($property->construction_type); ?></b>
                                    </div>
                                    <div class="card-list">
                                        <span><?php echo app('translator')->get('Type'); ?></span>
                                        <b><?php echo e($property->purpose); ?></b>
                                    </div>
                                    <div class="card-list">
                                        <span><?php echo app('translator')->get('Price'); ?></span>
                                        <b><?php echo e($property->price); ?> <?php echo e(gs('cur_sym')); ?></b>
                                    </div>
                                    <div class="card-list">
                                        <span><?php echo app('translator')->get('Sqr Price'); ?></span>
                                        <b><?php echo e($property->sqr_price); ?> <?php echo e(gs('cur_sym')); ?></b>
                                    </div>
                                    <div class="card-list">
                                        <span><?php echo app('translator')->get('Reference no'); ?></span>
                                        <b><?php echo e($property->reference_no); ?></b>
                                    </div>

                                    <div class="card-list">
                                        <span><?php echo app('translator')->get('Features'); ?></span>
                                        <b><?php echo e($property->features); ?></b>
                                    </div>
                                    <div class="card-list">
                                        <span><?php echo app('translator')->get('Ad license number'); ?></span>
                                        <b><?php echo e($property->ad_license_number); ?></b>
                                    </div>
                                    <div class="card-list">
                                        <span><?php echo app('translator')->get('Status'); ?></span>
                                        <b> <?php echo  $property->statusBadge ?></b>
                                    </div>

                                    <div  class="card-list">
                                        <h6><?php echo app('translator')->get('Detail'); ?></h6>
                                    </div>
                                    <?php $__currentLoopData = $property->details; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $detail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="card-list">
                                        <span><?php echo app('translator')->get(keyToTitle($detail->field)); ?></span>
                                        <b><?php echo e($detail->val); ?></b>
                                    </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

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
                                                href="<?php echo e(getImage(getFilePath('property_thumb') . '/' . $property->thumb_image, getFileSize('property_thumb'))); ?>">
                                                <img src="<?php echo e(getImage(getFilePath('property_thumb') . '/' . $property->thumb_image, getFileSize('property_thumb'))); ?>"
                                                    alt="<?php echo app('translator')->get('Image'); ?>">
                                            </a>
                                        </div>
                                    </div>

                                    <div class="mt-4">
                                        <h6 class="pb-2"><?php echo app('translator')->get('Images'); ?> :</h6>
                                        <div class="property-image">
                                            <?php $__currentLoopData = $propertyImages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <a
                                                    href="<?php echo e(getImage(getFilePath('property') . '/' . $image->image, getFileSize('property'))); ?>">
                                                    <img src="<?php echo e(getImage(getFilePath('property') . '/' . $image->image, getFileSize('property'))); ?>"
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
                                                <?php echo e(optional($property->country)->name); ?>

                                            <?php else: ?>
                                                <?php echo e(optional($property->country)->name_ar); ?>

                                            <?php endif; ?>

                                        </b>
                                    </div>
                                    <div class="card-list">
                                        <span><?php echo app('translator')->get('City'); ?></span>
                                        <b>
                                            <?php if(app()->getLocale() == 'en'): ?>
                                                <?php echo e(optional($property->city)->name); ?>

                                            <?php else: ?>
                                                <?php echo e(optional($property->city)->name_ar); ?>

                                            <?php endif; ?>
                                        </b>
                                    </div>
                                    <div>
                                        <?php echo $__env->make('web.component.map', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="border shadow-none card">
                                <div class="card-header">
                                    <h6><?php echo app('translator')->get('Description'); ?></h6>
                                </div>
                                <div class="card-body">
                                    <?php echo $property->description ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="border shadow-none card">
                                <div class="card-header">
                                    <h6><?php echo app('translator')->get('Description'); ?> <?php echo app('translator')->get('Arabic'); ?></h6>
                                </div>
                                <div class="card-body">
                                    <?php echo $property->description_ar ?>
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
        <a href="<?php echo e(route('admin.properties.index')); ?>" class="btn btn-primary"><i
                class="bi bi-arrow-clockwise pe-1"></i><?php echo app('translator')->get('Back'); ?></a>

        <a href="<?php echo e(route('admin.properties.status', [$property->id, Status::REVIEW])); ?>" class="btn btn-warning"><i
                class="bi bi-eye pe-1"></i><?php echo app('translator')->get('Review'); ?></a>
        <a href="<?php echo e(route('admin.properties.status', [$property->id, Status::PUBLISHED])); ?>" class="btn btn-success"><i
                class="bi bi-check2 pe-1"></i><?php echo app('translator')->get('Published'); ?></a>
        <a href="<?php echo e(route('admin.properties.status', [$property->id, Status::REJECT])); ?>" class="btn btn-danger"><i
                class="bi bi-x pe-1"></i><?php echo app('translator')->get('Rejected'); ?></a>

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
        $('.property-image').each(function() { // the containers for all your galleries
            $(this).magnificPopup({
                delegate: 'a', // the selector for gallery item
                type: 'image',
                gallery: {
                    enabled: true
                }
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

<?php echo $__env->make('admin.layouts.app', ['title' => 'Proprty Details'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/amlaek/public_html/resources/views/admin/property/show.blade.php ENDPATH**/ ?>
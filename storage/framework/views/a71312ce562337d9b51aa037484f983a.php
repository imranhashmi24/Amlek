<?php $__env->startSection('panel'); ?>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="border shadow-none card">
                                <div class="p-0 card-body">
                                    <div class="card-list">
                                        <span><?php echo app('translator')->get('Request Name'); ?></span>
                                        <b><?php echo e($propertyRequest->name); ?></b>
                                    </div>

                                    <div class="card-list">
                                        <span><?php echo app('translator')->get('Country'); ?></span>
                                        <b><?php echo e(@$propertyRequest->country->name); ?></b>
                                    </div>
                                    <div class="card-list">
                                        <span><?php echo app('translator')->get('City'); ?></span>
                                        <b><?php echo e(@$propertyRequest->city->name); ?></b>
                                    </div>
                                     <div class="card-list">
                                        <span><?php echo app('translator')->get('Email'); ?></span>
                                        <b><?php echo e(@$propertyRequest->email); ?></b>
                                    </div>
                                     <div class="card-list">
                                        <span><?php echo app('translator')->get('Mobile Number'); ?></span>
                                        <b><?php echo e(@$propertyRequest->mobile); ?></b>
                                    </div>

                                    <div class="card-list">
                                        <span><?php echo app('translator')->get('Property Type'); ?></span>
                                        <b><?php echo e($propertyRequest->propertyType->name); ?></b>
                                    </div>

                                    <div class="card-list">
                                        <span><?php echo app('translator')->get('Sub Property Type'); ?></span>
                                        <b><?php echo e(@$propertyRequest->subPropertyType->name); ?></b>
                                    </div>

                                    <div class="card-list">
                                        <span><?php echo app('translator')->get('Nature Of Property'); ?></span>
                                        <b><?php echo e($propertyRequest->nature_of_property); ?></b>
                                    </div>
                                     <div class="card-list">
                                        <span><?php echo app('translator')->get('Budget'); ?></span>
                                        <b><?php echo e($propertyRequest->budget); ?></b>
                                    </div>
                                    <div class="card-list">
                                        <span><?php echo app('translator')->get('Purpose'); ?></span>
                                        <b><?php echo e($propertyRequest->purpose); ?></b>
                                    </div>

                                    <div class="card-list">
                                        <span><?php echo app('translator')->get('Area'); ?></span>
                                        <b><?php echo e($propertyRequest->area); ?></b>
                                    </div>

                                    <div class="card-list">
                                        <span><?php echo app('translator')->get('Detail'); ?></span>
                                        <b><?php echo e($propertyRequest->detail); ?></b>
                                    </div>
                                    <div class="card-list">
                                        <span><?php echo app('translator')->get('Status'); ?></span>
                                        <b> <?php echo  $propertyRequest->statusBadge ?></b>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div>
                                        <h6 class="pb-2"><?php echo app('translator')->get('Thumb Image'); ?> :</h6>
                                        <div class="property-image">
                                            <a
                                                href="<?php echo e(getImage(getFilePath('property_thumb') . '/' . $propertyRequest->thumb_image, getFileSize('property_thumb'))); ?>">
                                                <img src="<?php echo e(getImage(getFilePath('property_thumb') . '/' . $propertyRequest->thumb_image, getFileSize('property_thumb'))); ?>"
                                                    alt="<?php echo app('translator')->get('Image'); ?>">
                                            </a>
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
        <a href="<?php echo e(route('admin.property.request.index')); ?>" class="btn btn-primary"><i
                class="bi bi-arrow-clockwise pe-1"></i><?php echo app('translator')->get('Back'); ?></a>

        <a href="<?php echo e(route('admin.property.request.status', [$propertyRequest->id, Status::REVIEW])); ?>" class="btn btn-success"><i
                class="bi bi-check2 pe-1"></i><?php echo app('translator')->get('Approved'); ?></a>
        <a href="<?php echo e(route('admin.property.request.status', [$propertyRequest->id, Status::REJECT])); ?>" class="btn btn-danger"><i
                class="bi bi-x pe-1"></i><?php echo app('translator')->get('Rejected'); ?></a>

    </div>
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

<?php echo $__env->make('admin.layouts.app', ['title' => 'Property Request Details'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/amlaek/public_html/resources/views/admin/property_request/show.blade.php ENDPATH**/ ?>
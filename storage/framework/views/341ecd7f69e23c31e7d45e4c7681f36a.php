
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
                                        <span><?php echo app('translator')->get('Full Name'); ?></span>
                                        <b><?php echo e($serviceRequest->full_name); ?></b>
                                    </div>

                                    <div class="card-list">
                                        <span><?php echo app('translator')->get('Nationality'); ?></span>
                                        <b>
                                           <?php echo e(__($serviceRequest->nation?->name)); ?>

                                        </b>
                                    </div>
                                     <div class="card-list">
                                        <span><?php echo app('translator')->get('Email'); ?></span>
                                        <b><?php echo e(@$serviceRequest->email); ?></b>
                                    </div>

                                    <div class="card-list">
                                        <span><?php echo app('translator')->get('Mobile Number'); ?></span>
                                        <b><?php echo e(@$serviceRequest->phone_number); ?></b>
                                    </div>

                                    <div class="card-list">
                                        <span><?php echo app('translator')->get('Purpose of the Application'); ?></span>
                                        <b><?php echo e(@$serviceRequest->purpose_of_the_application); ?></b>
                                    </div>

                                    <div class="card-list">
                                        <span><?php echo app('translator')->get('The country in which the property is requested'); ?></span>
                                        <b>
                                            <?php if(app()->getLocale() == 'en'): ?>
                                                <?php echo e(@$serviceRequest->country?->name); ?>

                                            <?php else: ?>
                                                <?php echo e(@$serviceRequest->country?->name_ar); ?>

                                            <?php endif; ?>
                                        </b>
                                    </div>

                                    <div class="card-list">
                                        <span><?php echo app('translator')->get('City'); ?></span>
                                        <b>
                                            <?php if(app()->getLocale() == 'en'): ?>
                                                <?php echo e(@$serviceRequest->getCity?->name); ?>

                                            <?php else: ?>
                                                <?php echo e(@$serviceRequest->getCity?->name_ar); ?>

                                            <?php endif; ?>
                                        </b>
                                    </div>

                                    <div class="card-list">
                                        <span><?php echo app('translator')->get('Type of property required'); ?></span>
                                        <b>
                                            <?php echo e(__($serviceRequest->type_of_property_required)); ?>

                                        </b>
                                    </div>

                                    <div class="card-list">
                                        <span><?php echo app('translator')->get('Estimated Budget'); ?></span>
                                        <b><?php echo e(__($serviceRequest->estimated_budget)); ?></b>
                                    </div>

                                    <div class="card-list">
                                        <span><?php echo app('translator')->get('Type of Priority'); ?></span>
                                        <b><?php echo e(__($serviceRequest->type_of_priority)); ?></b>
                                    </div>

                                    <div class="card-list">
                                        <span><?php echo app('translator')->get('Message'); ?></span>
                                        <b><?php echo e(__($serviceRequest->message)); ?></b>
                                    </div>

                                    <div class="card-list">
                                        <span><?php echo app('translator')->get('Status'); ?></span>
                                        <b> <?php echo  $serviceRequest->statusBadge ?></b>
                                    </div>
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
        <a href="<?php echo e(route('admin.foreign.form.request.index')); ?>" class="btn btn-primary"><i
                class="bi bi-arrow-clockwise pe-1"></i><?php echo app('translator')->get('Back'); ?></a>

        <a href="<?php echo e(route('admin.foreign.form.request.status', [$serviceRequest->id, Status::REVIEW])); ?>" class="btn btn-success"><i
                class="bi bi-check2 pe-1"></i><?php echo app('translator')->get('Approved'); ?></a>
        <a href="<?php echo e(route('admin.foreign.form.request.status', [$serviceRequest->id, Status::REJECT])); ?>" class="btn btn-danger"><i
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

<?php echo $__env->make('admin.layouts.app', ['title' => 'Foreign Request Details'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/amlaek/public_html/resources/views/admin/request/foreign_request/show.blade.php ENDPATH**/ ?>
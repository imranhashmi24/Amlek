<?php $__env->startSection('panel'); ?>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-9">
                            <div class="border shadow-none card">
                                <div class="p-0 card-body">
                                    <div class="card-list">
                                        <span><?php echo app('translator')->get('Opportunity Title'); ?></span>
                                        <b><?php echo e(__($serviceRequest->title)); ?></b>
                                    </div>
                                    
                                    <div class="card-list">
                                        <span><?php echo app('translator')->get('Full Name'); ?></span>
                                        <b><?php echo e($serviceRequest->full_name); ?></b>
                                    </div>

                                     <div class="card-list">
                                        <span><?php echo app('translator')->get('Email'); ?></span>
                                        <b><?php echo e(@$serviceRequest->email); ?></b>
                                    </div>
                                    
                                    <div class="card-list">
                                        <span><?php echo app('translator')->get('Mobile Number'); ?></span>
                                        <b><?php echo e(@$serviceRequest->mobile_number); ?></b>
                                    </div>
                                    
                                    <div class="card-list">
                                        <span><?php echo app('translator')->get('Id Number'); ?></span>
                                        <b><?php echo e(@$serviceRequest->id_number); ?></b>
                                    </div>
                                    
                                    <div class="card-list">
                                        <span><?php echo app('translator')->get('Establishment Name'); ?></span>
                                        <b><?php echo e(@$serviceRequest->establishment_name); ?></b>
                                    </div>
                                    
                                    <div class="card-list">
                                        <span><?php echo app('translator')->get('Commercial Registration Number'); ?></span>
                                        <b><?php echo e(@$serviceRequest->commercial_registration_number); ?></b>
                                    </div>
                                   
                                    <div class="card-list">
                                        <span><?php echo app('translator')->get('Sector'); ?></span>
                                        <b>
                                            <?php echo e(__($serviceRequest->sector)); ?>

                                        </b>
                                    </div>
                                    <div class="card-list">
                                        <span><?php echo app('translator')->get('Description'); ?></span>
                                        <b><?php echo e(__($serviceRequest->opportunity_description)); ?></b>
                                    </div>
                                    
                                    <div class="card-list">
                                        <h6><?php echo app('translator')->get('Investment Opportunity Information'); ?></h6>
                                    </div>
                                    
                                    <div class="card-list">
                                        <span><?php echo app('translator')->get('Property Type'); ?></span>
                                        <b><?php echo e(__($serviceRequest->property_type)); ?></b>
                                    </div>
                                    
                                    <div class="card-list">
                                        <span><?php echo app('translator')->get('City'); ?></span>
                                        <b><?php echo e(__($serviceRequest->city)); ?></b>
                                    </div>
                                    
                                    <div class="card-list">
                                        <span><?php echo app('translator')->get('Area'); ?></span>
                                        <b><?php echo e(__($serviceRequest->area)); ?></b>
                                    </div>
                                    
                                    <div class="card-list">
                                        <span><?php echo app('translator')->get('Address'); ?></span>
                                        <b><?php echo e(__($serviceRequest->address)); ?></b>
                                    </div>
                                    
                                    <div class="card-list">
                                        <span><?php echo app('translator')->get('Location features'); ?></span>
                                        <b><?php echo e(__($serviceRequest->location_features)); ?></b>
                                    </div>
                                    
                                    <div class="card-list">
                                        <span><?php echo app('translator')->get('Tenant Type'); ?></span>
                                        <b><?php echo e(__($serviceRequest->tenant_type)); ?></b>
                                    </div>
                                    
                                    <div class="card-list">
                                        <span><?php echo app('translator')->get('Tenant Capital Construction Value'); ?></span>
                                        <b><?php echo e(__($serviceRequest->tenant_capital_construction_value)); ?></b>
                                    </div>
                                    
                                    <div class="card-list">
                                        <span><?php echo app('translator')->get('Selling Price'); ?></span>
                                        <b><?php echo e(__($serviceRequest->selling_price)); ?></b>
                                    </div>
                                    
                                    <div class="card-list">
                                        <span><?php echo app('translator')->get('Income ratio'); ?></span>
                                        <b><?php echo e(__($serviceRequest->income_ratio)); ?></b>
                                    </div>
                                    
                                    <div class="card-list">
                                        <span><?php echo app('translator')->get('Property Nature'); ?></span>
                                        <b><?php echo e(__($serviceRequest->property_nature)); ?></b>
                                    </div>
                                    
                                    <div class="card-list">
                                        <span><?php echo app('translator')->get('Rental Status'); ?></span>
                                        <b><?php echo e(__($serviceRequest->rental_status)); ?></b>
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
        <a href="<?php echo e(route('admin.oportunity.form.request.index')); ?>" class="btn btn-primary"><i
                class="bi bi-arrow-clockwise pe-1"></i><?php echo app('translator')->get('Back'); ?></a>

        <a href="<?php echo e(route('admin.oportunity.form.request.status', [$serviceRequest->id, Status::REVIEW])); ?>" class="btn btn-success"><i
                class="bi bi-check2 pe-1"></i><?php echo app('translator')->get('Approved'); ?></a>
        <a href="<?php echo e(route('admin.oportunity.form.request.status', [$serviceRequest->id, Status::REJECT])); ?>" class="btn btn-danger"><i
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

<?php echo $__env->make('admin.layouts.app', ['title' => 'Service Request Details'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/amlaek/public_html/resources/views/admin/request/oportunity_request/show.blade.php ENDPATH**/ ?>
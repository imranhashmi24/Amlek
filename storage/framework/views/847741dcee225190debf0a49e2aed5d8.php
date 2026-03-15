<?php $__env->startSection('panel'); ?>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive--md table-responsive">
                        <table class="table">
                            <thead class="table-light">
                                <tr>
                                    <th><?php echo app('translator')->get('Name'); ?></th>
                                    <th><?php echo app('translator')->get('Country'); ?> | <?php echo app('translator')->get('City'); ?></th>
                                    <th><?php echo app('translator')->get('Property Type'); ?></th>
                                    <th><?php echo app('translator')->get('Sub Property Type'); ?></th>
                                    <th><?php echo app('translator')->get('Request Date'); ?></th>
                                    <th><?php echo app('translator')->get('Status'); ?></th>
                                    <th><?php echo app('translator')->get('Action'); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__empty_1 = true; $__currentLoopData = $propertyRequests; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $propertyRequest): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <tr>
                                        <td>
                                            <?php if(app()->getLocale() == 'en'): ?>
                                                <?php echo e($propertyRequest->name); ?>

                                            <?php else: ?>
                                                <?php echo e($propertyRequest->name_ar); ?>

                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <?php if(app()->getLocale() == 'en'): ?>
                                                <?php echo e(@$propertyRequest->country->name); ?>

                                                <br>
                                                <?php echo e(@$propertyRequest->city->name); ?>

                                            <?php else: ?>
                                                <?php echo e(@$propertyRequest->country->name_ar); ?>

                                                <br>
                                                <?php echo e(@$propertyRequest->city->name_ar); ?>

                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <?php if(app()->getLocale() == 'en'): ?>
                                                <?php echo e(@$propertyRequest->propertyType->name); ?>

                                            <?php else: ?>
                                                <?php echo e(@$propertyRequest->propertyType->name_ar); ?>

                                            <?php endif; ?>
                                        </td>

                                        <td>
                                            <?php if(app()->getLocale() == 'en'): ?>
                                                <?php echo e(@$propertyRequest->subPropertyType->name); ?>

                                            <?php else: ?>
                                                <?php echo e(@$propertyRequest->subPropertyType->name_ar); ?>

                                            <?php endif; ?>
                                        </td>

                                        <td>
                                            <small><?php echo e(showDateTime($propertyRequest->created_at, 'd M Y')); ?></small>
                                            <br>
                                            <small><?php echo e(showDateTime($propertyRequest->created_at, 'H:i A')); ?></small>
                                        </td>
                                        <td>

                                            <?php echo $propertyRequest->statusBadge; ?>

                                        </td>
                                        <td>
                                            <div class="btn-group">
                                                <button data-bs-toggle="dropdown">
                                                    <i class="fa-solid fa-ellipsis-vertical"></i>
                                                </button>
                                                <ul class="dropdown-menu dropdown-menu-end">
                                                    <li>
                                                        <a href="<?php echo e(route('admin.property.request.show', $propertyRequest->id)); ?>">
                                                            <i class="bi bi-eye me-1"></i> <?php echo app('translator')->get('Details'); ?>
                                                        </a>
                                                    </li>

                                                </ul>
                                            </div>

                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <tr>
                                        <td class="text-center text-muted" colspan="100%"><?php echo e(__($emptyMessage)); ?></td>
                                    </tr>
                                <?php endif; ?>

                            </tbody>
                        </table><!-- table end -->
                    </div>
                </div>
                <?php if($propertyRequests->hasPages()): ?>
                    <div class="card-footer pagination-card-footer">
                        <?php echo e(paginateLinks($propertyRequests)); ?>

                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('breadcrumb-plugins'); ?>
    <div class="flex-wrap gap-3 d-flex">
        <?php if (isset($component)) { $__componentOriginale48b4598ffc2f41a085f001458a956d1 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale48b4598ffc2f41a085f001458a956d1 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.search-form','data' => ['placeholder' => 'Search']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('search-form'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['placeholder' => 'Search']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginale48b4598ffc2f41a085f001458a956d1)): ?>
<?php $attributes = $__attributesOriginale48b4598ffc2f41a085f001458a956d1; ?>
<?php unset($__attributesOriginale48b4598ffc2f41a085f001458a956d1); ?>
<?php endif; ?>
<?php if (isset($__componentOriginale48b4598ffc2f41a085f001458a956d1)): ?>
<?php $component = $__componentOriginale48b4598ffc2f41a085f001458a956d1; ?>
<?php unset($__componentOriginale48b4598ffc2f41a085f001458a956d1); ?>
<?php endif; ?>
    </div>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.app', ['title' => 'Service Request'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/amlaek/public_html/resources/views/admin/property_request/index.blade.php ENDPATH**/ ?>
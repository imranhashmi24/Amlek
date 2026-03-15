<?php $__env->startSection('panel'); ?>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive--md table-responsive">
                        <table class="table">
                            <thead class="table-light">
                                <tr>
                                    <th><?php echo app('translator')->get('Image'); ?></th>
                                    <th><?php echo app('translator')->get('Property Type'); ?></th>
                                    <th><?php echo app('translator')->get('Country'); ?></th>
                                    <th><?php echo app('translator')->get('City'); ?></th>
                                    <th><?php echo app('translator')->get('Action'); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__empty_1 = true; $__currentLoopData = $propertyTypeAreas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $propertyTypeArea): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <tr>
                                        <td>
                                            <div
                                                class="gap-2 d-md-flex align-items-center justify-content-end justify-content-lg-start">
                                                <div class="avatar avatar--sm">
                                                    <img src="<?php echo e(getImage(getFilePath('propertyTypeArea') . '/' . $propertyTypeArea->image, getFileSize('propertyTypeArea'))); ?>"
                                                        alt="<?php echo app('translator')->get('Image'); ?>">
                                                </div>
                                                <span>
                                                    <?php if(app()->getLocale() == 'en'): ?>
                                                      <?php echo e($propertyTypeArea->name); ?>

                                                    <?php else: ?>
                                                       <?php echo e($propertyTypeArea->name_ar); ?>

                                                    <?php endif; ?>

                                                </span>
                                            </div>

                                        </td>
                                        <td>
                                            <?php if(app()->getLocale() == 'en'): ?>
                                                <?php echo e(@$propertyTypeArea->propertyType->name); ?>

                                            <?php else: ?>
                                                <?php echo e(@$propertyTypeArea->propertyType->name_ar); ?>

                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <?php if(app()->getLocale() == 'en'): ?>
                                                <?php echo e(@$propertyTypeArea->Country->name); ?>

                                            <?php else: ?>
                                                <?php echo e(@$propertyTypeArea->Country->name_ar); ?>

                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <?php if(app()->getLocale() == 'en'): ?>
                                               <?php echo e(@$propertyTypeArea->city->name); ?>

                                            <?php else: ?>
                                              <?php echo e(@$propertyTypeArea->city->name_ar); ?>

                                            <?php endif; ?>

                                        </td>

                                        <td>

                                            <div class="btn-group">
                                                <button data-bs-toggle="dropdown">
                                                    <i class="fa-solid fa-ellipsis-vertical"></i>
                                                </button>
                                                <ul class="dropdown-menu dropdown-menu-end">
                                                    <li>
                                                        <a
                                                            href="<?php echo e(route('admin.property.type.area.edit', $propertyTypeArea->id)); ?>">
                                                            <i class="bi bi-pencil me-1"></i> <?php echo app('translator')->get('Edit'); ?>
                                                        </a>
                                                    </li>
                                                    <?php if($propertyTypeArea->status == Status::ENABLE): ?>
                                                        <li>
                                                            <button class="confirmationBtn"
                                                                data-question="<?php echo app('translator')->get('Are you sure to Inactive this Property Type Area?'); ?>"
                                                                data-action="<?php echo e(route('admin.property.type.area.status', $propertyTypeArea->id)); ?>">
                                                                <i class="bi bi-eye-slash"></i><?php echo app('translator')->get('Active'); ?>
                                                            </button>
                                                        </li>
                                                    <?php else: ?>
                                                        <button class="confirmationBtn"
                                                            data-question="<?php echo app('translator')->get('Are you sure to Active this Property Type Area?'); ?>"
                                                            data-action="<?php echo e(route('admin.property.type.area.status', $propertyTypeArea->id)); ?>">
                                                            <i class="bi bi-eye"></i><?php echo app('translator')->get('Inactive'); ?>
                                                        </button>
                                                    <?php endif; ?>

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
                <?php if($propertyTypeAreas->hasPages()): ?>
                    <div class="card-footer pagination-card-footer">
                        <?php echo e(paginateLinks($propertyTypeAreas)); ?>

                    </div>
                <?php endif; ?>
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
        <a href="<?php echo e(route('admin.property.type.area.create')); ?>" class="btn btn-primary"><i class="fa-solid fa-plus"></i>
            <?php echo app('translator')->get('Add New'); ?></a>
    </div>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.app', ['title' => 'Property Type Area'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/amlaek/public_html/resources/views/admin/property_type_area/index.blade.php ENDPATH**/ ?>
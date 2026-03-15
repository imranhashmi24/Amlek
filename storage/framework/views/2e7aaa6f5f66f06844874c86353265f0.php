<?php $__env->startSection('panel'); ?>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive--md table-responsive">
                        <table class="table">
                            <thead class="table-light">
                                <tr>

                                    <th><?php echo app('translator')->get('Image'); ?> | <?php echo app('translator')->get('Title'); ?></th>
                                    <th><?php echo app('translator')->get('Title'); ?> (<?php echo app('translator')->get('Arabic'); ?>)</th>
                                    <th><?php echo app('translator')->get('Category'); ?></th>
                                    <th><?php echo app('translator')->get('Type'); ?></th>
                                    <th><?php echo app('translator')->get('Status'); ?></th>
                                    <th><?php echo app('translator')->get('Created At'); ?></th>
                                    <th><?php echo app('translator')->get('Action'); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__empty_1 = true; $__currentLoopData = $events; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $event): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <tr>
                                        <td>
                                            <div class="gap-2 d-flex align-items-center">
                                                <div class="avatar avatar--sm">
                                                    <img src="<?php echo e(getImage(getFilePath('events') . '/' . $event->image, getFileSize('events'))); ?>"
                                                        alt="<?php echo app('translator')->get('Image'); ?>">
                                                </div>
                                                <a
                                                    href="<?php echo e(route('admin.events.show', $event->id)); ?>"><?php echo e(strLimit($event->title, 15)); ?></a>
                                            </div>
                                        </td>
                                        <td><a
                                                href="<?php echo e(route('admin.events.show', $event->id)); ?>"><?php echo e(strLimit($event->title_ar, 15)); ?></a>
                                        </td>
                                        <td>
                                            <?php if(app()->getLocale() == 'en'): ?>
                                                <?php echo e(optional($event->category)->name); ?>

                                            <?php else: ?>
                                                <?php echo e(optional($event->category)->name_ar); ?>

                                            <?php endif; ?>
                                        </td>

                                        <td>
                                           <?php echo e($event->type); ?>

                                        </td>
                                        <td>

                                            <?php echo $event->statusBadge; ?>

                                        </td>
                                        <td>
                                            <small><?php echo e(showDateTime($event->created_at, 'd M Y')); ?></small>
                                            <br>
                                            <small><?php echo e(showDateTime($event->created_at, 'H:i A')); ?></small>
                                        </td>
                                        <td>

                                            <div class="btn-group">
                                                <button data-bs-toggle="dropdown">
                                                    <i class="fa-solid fa-ellipsis-vertical"></i>
                                                </button>
                                                <ul class="dropdown-menu dropdown-menu-end">
                                                    <li><a href="<?php echo e(route('admin.events.edit', $event->id)); ?>">
                                                            <i class="bi bi-pencil me-1"></i> <?php echo app('translator')->get('Edit'); ?>
                                                        </a>
                                                    </li>
                                                    <li><a href="<?php echo e(route('admin.events.show', $event->id)); ?>"> <i
                                                                class="bi bi-eye me-1"></i> <?php echo app('translator')->get('Details'); ?></a></li>
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
                <?php if($events->hasPages()): ?>
                    <div class="card-footer pagination-card-footer">
                        <?php echo e(paginateLinks($events)); ?>

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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.search-form','data' => ['placeholder' => '@lang(\'Search\')']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('search-form'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['placeholder' => '@lang(\'Search\')']); ?>
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
        <a href="<?php echo e(route('admin.events.create')); ?>" class="btn btn-primary"><i class="fa-solid fa-plus"></i><?php echo app('translator')->get('Add New'); ?></a>
    </div>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.app', ['title' => 'Events'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/amlaek/public_html/resources/views/admin/event/index.blade.php ENDPATH**/ ?>
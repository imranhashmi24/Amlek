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
                                        <span><?php echo app('translator')->get('Title'); ?></span>
                                        <b><?php echo e($event->title); ?></b>
                                    </div>
                                    <div class="card-list">
                                        <span><?php echo app('translator')->get('Title ar'); ?></span>
                                        <b><?php echo e($event->title_ar); ?></b>
                                    </div>
                                    <div class="card-list">
                                        <span><?php echo app('translator')->get('Category'); ?></span>
                                        <b><?php echo e(app()->getLocale() == 'en' ? $event->category?->title : $event->category?->title_ar); ?></b>
                                    </div>
                                    <div class="card-list">
                                        <span><?php echo app('translator')->get('Type'); ?></span>
                                        <b><?php echo e(@$event->type); ?></b>
                                    </div>
                                    <div class="card-list">
                                        <span><?php echo app('translator')->get('Audience type'); ?></span>
                                        <b><?php echo e(@$event->audience_type); ?></b>
                                    </div>
                                    <div class="card-list">
                                        <span><?php echo app('translator')->get('Sector'); ?></span>
                                        <b><?php echo e(@$event->sector); ?></b>
                                    </div>

                                    <div class="card-list">
                                        <span><?php echo app('translator')->get('Same date & time'); ?></span>
                                        <b><?php echo e(@$event->same_time == 1 ? __('Yes') : __('No')); ?></b>
                                    </div>

                                    <?php if($event->same_time == 1): ?>
                                    <div class="card-list">
                                        <span><?php echo app('translator')->get('Date and Time'); ?></span>
                                        <b> <small><?php echo e(showDateTime($event->start_time, 'd M Y')); ?></small>
                                            <br>
                                            <small><?php echo e(showDateTime($event->start_time, 'H:i A')); ?></small>
                                        </b>
                                    </div>
                                    <?php else: ?>
                                    <div class="card-list">
                                        <span><?php echo app('translator')->get('Start Time'); ?></span>
                                        <b> <small><?php echo e(showDateTime($event->start_time, 'd M Y')); ?></small>
                                            <br>
                                            <small><?php echo e(showDateTime($event->start_time, 'H:i A')); ?></small>
                                        </b>
                                    </div>
                                    <div class="card-list">
                                        <span><?php echo app('translator')->get('End Time'); ?></span>
                                        <b> <small><?php echo e(showDateTime($event->end_time, 'd M Y')); ?></small>
                                            <br>
                                            <small><?php echo e(showDateTime($event->end_time, 'H:i A')); ?></small>
                                        </b>
                                    </div>
                                    <?php endif; ?>
                                    <div class="card-list">
                                        <span><?php echo app('translator')->get('Status'); ?></span>
                                        <b><?php echo $event->statusBadge; ?></b>
                                    </div>
                                    <div class="card-list">
                                        <span><?php echo app('translator')->get('Created At'); ?></span>
                                        <b> <small><?php echo e(showDateTime($event->created_at, 'd M Y')); ?></small>
                                            <br>
                                            <small><?php echo e(showDateTime($event->created_at, 'H:i A')); ?></small>
                                        </b>
                                    </div>
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
                                        <h6 class="pb-2"><?php echo app('translator')->get('Image'); ?> :</h6>
                                        <div class="property-image">
                                            <a
                                                href="<?php echo e(getImage(getFilePath('events') . '/' . $event->image, getFileSize('events'))); ?>">
                                                <img src="<?php echo e(getImage(getFilePath('events') . '/' . $event->image, getFileSize('events'))); ?>"
                                                    alt="<?php echo app('translator')->get('Image'); ?>">
                                            </a>
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
                                                <?php echo e(optional($event->country)->name); ?>

                                            <?php else: ?>
                                                <?php echo e(optional($event->country)->name_ar); ?>

                                            <?php endif; ?>

                                        </b>
                                    </div>
                                    <div class="card-list">
                                        <span><?php echo app('translator')->get('City'); ?></span>
                                        <b>
                                            <?php if(app()->getLocale() == 'en'): ?>
                                                <?php echo e(optional($event->city)->name); ?>

                                            <?php else: ?>
                                                <?php echo e(optional($event->city)->name_ar); ?>

                                            <?php endif; ?>
                                        </b>
                                    </div>
                                    <div class="card-list">
                                        <span><?php echo app('translator')->get('Location'); ?></span>
                                        <b>
                                            <?php echo e($event->address); ?>

                                        </b>
                                    </div>
                                    <div>
                                        <?php echo $__env->make('admin.event.map', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
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
                                    <?php echo $event->description ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="border shadow-none card">
                                <div class="card-header">
                                    <h6><?php echo app('translator')->get('Description'); ?> <?php echo app('translator')->get('Arabic'); ?></h6>
                                </div>
                                <div class="card-body">
                                    <?php echo $event->description_ar ?>
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
        <a href="<?php echo e(route('admin.events.index')); ?>" class="btn btn-primary"><i
                class="bi bi-arrow-clockwise pe-1"></i><?php echo app('translator')->get('Back'); ?></a>

        <a href="<?php echo e(route('admin.events.status', [$event->id, Status::INACTIVE])); ?>" class="btn btn-warning"><i
                class="bi bi-x pe-1"></i><?php echo app('translator')->get('Inactive'); ?></a>
        <a href="<?php echo e(route('admin.events.status', [$event->id, Status::ACTIVE])); ?>" class="btn btn-success"><i
                    class="bi bi-check2 pe-1"></i><?php echo app('translator')->get('Active'); ?></a>

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

<?php echo $__env->make('admin.layouts.app', ['title' => 'Event Details'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/amlaek/public_html/resources/views/admin/event/show.blade.php ENDPATH**/ ?>
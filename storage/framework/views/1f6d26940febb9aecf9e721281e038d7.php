<?php $__env->startSection('content'); ?>
    <div class="card custom-card">
        <div class="card-header d-flex flex-wrap justify-content-between align-items-center">
            <h5 class="mt-0">
                <?php echo $myTicket->statusBadge; ?>
                <?php echo e($myTicket->subject); ?>

            </h5>
            <?php if($myTicket->status != Status::TICKET_CLOSE && $myTicket->user): ?>
                <button class="btn btn-danger close-button btn-sm confirmationBtn" type="button"
                    data-question="<?php echo app('translator')->get('Are you sure to close this support?'); ?>" data-action="<?php echo e(route('support.close', $myTicket->id)); ?>"><i
                        class="fa fa-lg fa-times-circle"></i>
                </button>
            <?php endif; ?>
        </div>
        <div class="card-body">
            <form method="post" action="<?php echo e(route('support.reply', $myTicket->id)); ?>" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <div class="row justify-content-between">
                    <div class="col-md-12">
                        <div class="form-group">
                            <textarea name="message" class="form-control" rows="4"><?php echo e(old('message')); ?></textarea>
                        </div>
                    </div>
                </div>
                <div class="text-end mt-3">
                    <a href="javascript:void(0)" class="btn btn-base btn-sm addFile"><i class="bi bi-plus-circle"></i>
                        <?php echo app('translator')->get('Add New'); ?></a>
                </div>
                <div class="form-group">
                    <label class="form-label"><?php echo app('translator')->get('Attachments'); ?></label>
                    <input type="file" name="attachments[]" class="form-control" />
                    <div id="fileUploadsContainer"></div>
                    <p class="my-2 ticket-attachments-message text-muted">
                        <?php echo app('translator')->get('Allowed File Extensions'); ?>: .<?php echo app('translator')->get('jpg'); ?>, .<?php echo app('translator')->get('jpeg'); ?>, .<?php echo app('translator')->get('png'); ?>,
                        .<?php echo app('translator')->get('pdf'); ?>, .<?php echo app('translator')->get('doc'); ?>, .<?php echo app('translator')->get('docx'); ?>
                    </p>
                </div>
                <div class="text-end">
                    <button type="submit" class="btn btn-base btn-sm"> <i class="bi bi-reply-all"></i>
                        <?php echo app('translator')->get('Reply'); ?></button>
                </div>
            </form>
        </div>
    </div>

    <div class="card custom-card mt-4">
        <div class="card-body">
            <?php $__currentLoopData = $messages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($message->admin_id == 0): ?>
                    <div class="card mt-3">
                        <div class="card-header">
                            <span><?php echo e($message->ticket->name); ?></span>
                            |
                            <span class="text-muted fw-bold">
                                <small><?php echo e(showDateTime($message->created_at, 'd M Y')); ?></small>
                                @
                                <small><?php echo e(showDateTime($message->created_at, 'H:i A')); ?></small>
                            </span>
                        </div>
                        <div class="card-body">
                            <p><?php echo e($message->message); ?></p>

                            <?php if($message->attachments->count() > 0): ?>
                                <div class="mt-2">
                                    <?php $__currentLoopData = $message->attachments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <a href="<?php echo e(route('support.download', encrypt($image->id))); ?>" class="me-3"><i
                                                class="fa fa-file"></i> <?php echo app('translator')->get('Attachment'); ?>
                                            <?php echo e(++$k); ?> </a>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php else: ?>
                    <div class="card mt-3">
                        <div class="card-header" style="background:#f1f1f1">
                            <span><?php echo e($message->admin->name); ?></span>
                            |
                            <span class="text-muted fw-bold">
                                <small><?php echo e(showDateTime($message->created_at, 'd M Y')); ?></small>
                                @
                                <small><?php echo e(showDateTime($message->created_at, 'H:i A')); ?></small>
                            </span>

                        </div>
                        <div class="card-body">
                            <p><?php echo e($message->message); ?></p>

                            <?php if($message->attachments->count() > 0): ?>
                                <div class="mt-2">
                                    <?php $__currentLoopData = $message->attachments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <a href="<?php echo e(route('support.download', encrypt($image->id))); ?>" class="me-3"><i
                                                class="fa fa-file"></i> <?php echo app('translator')->get('Attachment'); ?>
                                            <?php echo e(++$k); ?> </a>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
<?php $__env->startPush('style'); ?>
    <style>
        .input-group-text:focus {
            box-shadow: none !important;
        }
    </style>
<?php $__env->stopPush(); ?>
<?php $__env->startPush('script'); ?>
    <script>
        (function($) {
            "use strict";
            var fileAdded = 0;
            $('.addFile').on('click', function() {
                if (fileAdded >= 4) {
                    notify('error', 'You\'ve added maximum number of file');
                    return false;
                }
                fileAdded++;
                $("#fileUploadsContainer").append(`
                    <div class="input-group my-3">
                        <input type="file" name="attachments[]" class="form-control" required />
                        <button type="submit" class="input-group-text btn-danger remove-btn"><i class="las la-times"></i></button>
                    </div>
                `)
            });
            $(document).on('click', '.remove-btn', function() {
                fileAdded--;
                $(this).closest('.input-group').remove();
            });
        })(jQuery);
    </script>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('title'); ?>
    <h5><?php echo app('translator')->get('Support'); ?>#<?php echo e($myTicket->ticket); ?></h5>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('web.layouts.master',['title'=>'Supports'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/amlaek/public_html/resources/views/user/support/view.blade.php ENDPATH**/ ?>
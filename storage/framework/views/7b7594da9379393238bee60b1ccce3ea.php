<?php $__env->startSection('content'); ?>
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-7 col-xl-5">
            <div class="card custom--card">
                <div class="card-header">
                    <h5 class="card-title"> <?php echo app('translator')->get('Contact Us'); ?> </h5>
                </div>
                <div class="card-body">
                    <form method="post" action="" class="verify-gcaptcha">
                        <?php echo csrf_field(); ?>
                        <div class="pb-3 form-group">
                            <label class="form-label"><?php echo app('translator')->get('Name'); ?></label>
                            <input name="name" type="text" class="form-control " value="<?php echo e(old('name',@$user->fullname)); ?>" <?php if($user && $user->profile_complete): ?> readonly <?php endif; ?> required>
                        </div>
                        <div class="pb-3 form-group">
                            <label class="form-label"><?php echo app('translator')->get('Email'); ?></label>
                            <input name="email" type="email" class="form-control " value="<?php echo e(old('email',@$user->email)); ?>" <?php if($user): ?> readonly <?php endif; ?> required>
                        </div>
                        <div class="pb-3 form-group">
                            <label class="form-label"><?php echo app('translator')->get('Subject'); ?></label>
                            <input name="subject" type="text" class="form-control " value="<?php echo e(old('subject')); ?>" required>
                        </div>
                        <div class="pb-3 form-group">
                            <label class="form-label"><?php echo app('translator')->get('Message'); ?></label>
                            <textarea name="message" wrap="off" class="form-control " required><?php echo e(old('message')); ?></textarea>
                        </div>
                        <?php if (isset($component)) { $__componentOriginalff0a9fdc5428085522b49c68070c11d6 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalff0a9fdc5428085522b49c68070c11d6 = $attributes; } ?>
<?php $component = App\View\Components\Captcha::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('captcha'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Captcha::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalff0a9fdc5428085522b49c68070c11d6)): ?>
<?php $attributes = $__attributesOriginalff0a9fdc5428085522b49c68070c11d6; ?>
<?php unset($__attributesOriginalff0a9fdc5428085522b49c68070c11d6); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalff0a9fdc5428085522b49c68070c11d6)): ?>
<?php $component = $__componentOriginalff0a9fdc5428085522b49c68070c11d6; ?>
<?php unset($__componentOriginalff0a9fdc5428085522b49c68070c11d6); ?>
<?php endif; ?>
                        <div class="pb-3 form-group">
                            <button type="submit" class="btn btn-base w-100"><?php echo app('translator')->get('Submit'); ?></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('web.layouts.frontend',['title' => 'Contact Us'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/amlaek/public_html/resources/views/web/contact.blade.php ENDPATH**/ ?>
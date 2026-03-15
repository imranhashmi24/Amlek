<?php $__env->startSection('content'); ?>
<div class="container py-5">
   <div class="row justify-content-center">
    <div class="col-12 col-md-5">
        <div class="card">
            <div class="card-body">
                <h5 class="pb-3 text-center border-bottom"><?php echo app('translator')->get('Verify Email Address'); ?></h5>
                <form action="<?php echo e(route('user.verify.email')); ?>" method="POST" class="submit-form">
                    <?php echo csrf_field(); ?>
                    <p class="verification-text"><?php echo app('translator')->get('A 6 digit verification code sent to your email address'); ?>:  <?php echo e(showEmailAddress(auth()->user()->email)); ?></p>

                    <?php echo $__env->make('partials.verification_code', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                    <div class="mb-3">
                        <button type="submit" class="btn btn-base w-100"><?php echo app('translator')->get('Submit'); ?></button>
                    </div>

                    <div class="mb-3">
                        <p>
                            <?php echo app('translator')->get('If you don\'t get any code'); ?>, <a href="<?php echo e(route('user.send.verify.code', 'email')); ?>"> <?php echo app('translator')->get('Try again'); ?></a>
                        </p>

                        <?php if($errors->has('resend')): ?>
                            <small class="text-danger d-block"><?php echo e($errors->first('resend')); ?></small>
                        <?php endif; ?>
                    </div>
                </form>
            </div>
        </div>
    </div>
   </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('web.layouts.frontend', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/amlaek/public_html/resources/views/user/auth/authorization/email.blade.php ENDPATH**/ ?>
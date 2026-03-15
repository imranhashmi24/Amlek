<?php $__env->startSection('content'); ?>
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-12 col-md-5">
            <div class="card custom-card">
                <div class="card-body px-4">
                    <h5 class="pb-3 text-center border-bottom"><?php echo app('translator')->get('Verify Email Address'); ?></h5>
                    <form action="<?php echo e(route('user.password.verify.code')); ?>" method="POST" class="submit-form">
                        <?php echo csrf_field(); ?>
                        <p class="verification-text"><?php echo app('translator')->get('A 6 digit verification code sent to your email address'); ?> :  <?php echo e(showEmailAddress($email)); ?></p>
                        <input type="hidden" name="email" value="<?php echo e($email); ?>">

                        <?php echo $__env->make('partials.verification_code', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                        <div class="form-group">
                            <button type="submit" class="btn btn-base w-100"><?php echo app('translator')->get('Submit'); ?></button>
                        </div>

                        <div class="form-group mt-3 text-center">
                            <a href="<?php echo e(route('user.password.request')); ?>"><?php echo app('translator')->get('Try to send again'); ?></a>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('web.layouts.frontend',['title' => 'Verify Email'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/amlaek/public_html/resources/views/user/auth/passwords/code_verify.blade.php ENDPATH**/ ?>
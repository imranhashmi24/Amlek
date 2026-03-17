<?php $__env->startSection('panel'); ?>

    <?php echo $__env->make('web.partials.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


    <?php echo $__env->yieldContent('content'); ?>


    <?php echo $__env->make('web.partials.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


    <?php
        $cookie = App\Models\Frontend::where('data_keys', 'cookie.data')->first();
    ?>

    <?php if($cookie->data_values->status == Status::ENABLE && !\Cookie::get('gdpr_cookie')): ?>
        <div class="text-center cookies-card hide">
            <div class="flex-wrap gap-2 cookie-consent d-flex align-items-center">
                <i class="las la-cookie-bite"></i>
                <h4><?php echo app('translator')->get('Cookies Consent'); ?></h4>
            </div>
            <p class="mt-4 cookies-card_content"><?php echo e($cookie->data_values->short_desc); ?></p>
            <div class="flex-wrap gap-3 mt-4 d-flex align-items-center justify-content-start">
                <a href="javascript:void(0)" class="btn coocke-btn policy"><?php echo app('translator')->get('I understand'); ?></a>
                <a href="<?php echo e(route('cookie.policy')); ?>" class="coocke-link" target="_blank"><?php echo app('translator')->get('learn more'); ?></a>
            </div>
        </div>
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>
    <script>
        (function($) {
            "use strict";
            setTimeout(function() {
                $('.cookies-card').removeClass('hide')
            }, 2000);
        })(jQuery);
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('web.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\soudi-project\Amlek\resources\views/web/layouts/frontend.blade.php ENDPATH**/ ?>
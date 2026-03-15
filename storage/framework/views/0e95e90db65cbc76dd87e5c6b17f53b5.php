<div>
    <div class="gap-4 profile d-flex align-items-center">
        <img src="<?php echo e(getImage(getFilepath('userProfile') . '/' . auth()->user()->image)); ?>">
        <div>
            <p><?php echo app('translator')->get('Welcome To'); ?></p>
            <h4><?php echo e(auth()->user()->name); ?></h4>
        </div>
    </div>
</div>

<div class="gap-3 d-flex justify-content-between align-items-end">
    <a href="<?php echo e(url('user/message')); ?>" class="btn-primary btn"><i class="bi bi-chat-dots"></i> <?php echo app('translator')->get('Message'); ?></a>
    <button class="d-mobile-btn d-mobile-toggle"><i class="bi bi-list"></i></button>
    <?php echo $__env->yieldPushContent('title'); ?>
</div>
<?php /**PATH /home/amlaek/public_html/resources/views/web/partials/dashboard_header.blade.php ENDPATH**/ ?>
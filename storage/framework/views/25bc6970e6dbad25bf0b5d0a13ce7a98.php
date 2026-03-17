<?php $__env->startSection('content'); ?>

    <?php echo $__env->make('admin.partials.topnav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php echo $__env->make('admin.partials.sidenav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


    <main class="page-content">
        <!--breadcrumb-->
        <div class="mb-4 page-breadcrumb d-sm-flex align-items-center justify-content-between">
            <div class="mb-2 breadcrumb-title mb-sm-0"><?php echo e(__(@$title)); ?></div>
           <div>
                <?php echo $__env->yieldPushContent('breadcrumb-plugins'); ?>
           </div>
        </div>
        <!--end breadcrumb-->

        <?php echo $__env->yieldContent('panel'); ?>
    </main>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\soudi-project\Amlek\resources\views/admin/layouts/app.blade.php ENDPATH**/ ?>
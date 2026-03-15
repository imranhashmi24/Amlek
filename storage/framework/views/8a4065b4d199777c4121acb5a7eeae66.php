<?php $__env->startSection('panel'); ?>
    <?php echo $__env->make('web.partials.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <section class="py-5 dashboard-main">
        <div class="container">
            <div class="dashboard">
                <div class="flex-wrap gap-4 dashboard-head align-items-end">
                    <?php echo $__env->make('web.partials.dashboard_header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
                <div class="row">
                    <div class="col-12 col-lg-3 d-mobile-menu">
                        <div class="dashboard-sidnav">
                            <?php echo $__env->make('web.partials.dashboard_sidnav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>
                    </div>
                    <div class="col-12 col-lg-9">
                        <div class="dashboard-body">
                            <?php echo $__env->yieldContent('content'); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php echo $__env->make('web.partials.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('web.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/amlaek/public_html/resources/views/web/layouts/master.blade.php ENDPATH**/ ?>
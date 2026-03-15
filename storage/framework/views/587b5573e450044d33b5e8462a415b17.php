<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="pb-3 col-12 col-lg-4">
            <div class="dashboard-card" style="background: #00A3FF;">
                <div>
                    <i class="bi bi-houses"></i>
                </div>
                <div>
                    <h3> <?php echo e($propertyCount); ?></h3>
                    <h6><?php echo app('translator')->get('Properties'); ?></h6>
                </div>
            </div>
        </div>
        <div class="pb-3 col-12 col-lg-4">
            <div class="dashboard-card" style="background: #FF5C00;">
                <div>
                    <i class="bi bi-house-check"></i>
                </div>
                <div>
                    <h3> <?php echo e($propertyRequestCount); ?> </h3>
                    <h6><?php echo app('translator')->get('Property Request'); ?></h6>
                </div>
            </div>
        </div>
        <div class="pb-3 col-12 col-lg-4">
            <div class="dashboard-card" style="background: #A100DC;">
                <div>
                    <i class="bi bi-cash-coin"></i>
                </div>
                <div>
                    <h3> <?php echo e($financeRequestCount); ?> </h3>
                    <h6><?php echo app('translator')->get('Finance Request'); ?></h6>
                </div>
            </div>
        </div>
        <div class="pb-3 col-12 col-lg-4">
            <div class="dashboard-card" style="background: #FF407D;">
                <div>
                    <i class="bi bi-shop"></i>
                </div>
                <div>
                    <h3> <?php echo e($marketingRequestCount); ?> </h3>
                    <h6><?php echo app('translator')->get('Marketing Request'); ?></h6>
                </div>
            </div>
        </div>
        <div class="pb-3 col-12 col-lg-4">
            <div class="dashboard-card" style="background: #0C359E;">
                <div>
                    <i class="bi bi-gear"></i>
                </div>
                <div>
                    <h3> <?php echo e($serviceRequestCount); ?> </h3>
                    <h6><?php echo app('translator')->get('Service Request'); ?></h6>
                </div>
            </div>
        </div>
        <div class="pb-3 col-12 col-lg-4">
            <div class="dashboard-card" style="background: #265073;">
                <div>
                    <i class="bi bi-envelope"></i>
                </div>
                <div>
                    <h3> <?php echo e($supportCount); ?> </h3>
                    <h6><?php echo app('translator')->get('Supports'); ?></h6>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('title'); ?>
    <a href="<?php echo e(route('user.properties.create')); ?>" class="add-property-btn"><i class="bi bi-plus-circle-dotted pe-1"></i>
        <?php echo app('translator')->get('Add Property'); ?></a>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('web.layouts.master', ['title' => 'Dashboard'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/amlaek/public_html/resources/views/user/dashboard.blade.php ENDPATH**/ ?>
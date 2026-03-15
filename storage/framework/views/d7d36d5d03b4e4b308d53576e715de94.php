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
                                        <span><?php echo app('translator')->get('Name'); ?></span>
                                        <b> <?php echo e($asset_liability_req->name); ?> </b>
                                    </div>
                                     <div class="card-list">
                                        <span><?php echo app('translator')->get('Email'); ?></span>
                                        <b> <?php echo e($asset_liability_req->email); ?> </b>
                                    </div>

                                    <div class="card-list">
                                        <span><?php echo app('translator')->get('Mobile Number'); ?></span>
                                        <b> <?php echo e($asset_liability_req->mobile); ?> </b>
                                    </div>


                                    <div class="card-list">
                                        <span><?php echo app('translator')->get('Country'); ?></span>
                                        <b> <?php echo e(@$asset_liability_req->country->name); ?> </b>
                                    </div>

                                    <div class="card-list">
                                        <span><?php echo app('translator')->get('City'); ?></span>
                                        <b> <?php echo e(@$asset_liability_req->city->name); ?> </b>
                                    </div>

                                    <div class="card-list">
                                        <span><?php echo app('translator')->get('Message'); ?></span>
                                        <span><?php echo e(@$asset_liability_req->message); ?> </span>
                                    </div>

                                    <div class="card-list">
                                        <span><?php echo app('translator')->get('Status'); ?></span>
                                        <b> <?php echo  @$asset_liability_req->statusBadge ?> </b>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('breadcrumb-plugins'); ?>
    <div class="flex-wrap gap-3 d-flex">
        <a href="<?php echo e(route('admin.asset.liability.request.approve',$asset_liability_req->id)); ?>" class="btn btn-success"><i class="bi bi-check2 pe-1"></i>
        <?php echo app('translator')->get('Approve'); ?></a>
        <a href="<?php echo e(route('admin.asset.liability.request.reject',$asset_liability_req->id)); ?>" class="btn btn-danger"><i class="bi bi-x pe-1"></i>
        <?php echo app('translator')->get('Reject'); ?></a>


        <a href="<?php echo e(route('admin.asset.liability.request.index')); ?>" class="btn btn-primary"><i
                class="bi bi-arrow-clockwise pe-1"></i>
            <?php echo app('translator')->get('Back'); ?></a>
    </div>
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
    </style>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.app', ['title' => 'Asset Liability Request'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/amlaek/public_html/resources/views/admin/asset_liability/show.blade.php ENDPATH**/ ?>
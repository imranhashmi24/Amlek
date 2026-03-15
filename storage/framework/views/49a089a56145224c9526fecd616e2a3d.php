<?php $__env->startSection('panel'); ?>
    <div class="card">
        <div class="card-body">
            <form action="<?php echo e(route('admin.businesscategory.store', @$businessCategory->id)); ?>" method="post"
                enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <div class="row">
                    <div class="col-md-8">
                        <div class="mb-3 form-group">
                            <label class="form-label"><?php echo app('translator')->get('Name'); ?> <span class="text-danger fs-6">*</span></label>
                            <input type="text" name="name" class="form-control" required
                                value="<?php echo e(old('name', @$businessCategory->name)); ?>">
                        </div>
                        <div class="mb-3 form-group">
                            <label class="form-label"><?php echo app('translator')->get('Name (Arabic)'); ?> <span class="text-danger fs-6">*</span></label>
                            <input type="text" name="name_ar" class="form-control" required
                                value="<?php echo e(old('name_ar', @$businessCategory->name_ar)); ?>">
                        </div>
                        <div class="mb-3 form-group">
                            <button type="submit" class="btn btn-primary w-100"><?php echo app('translator')->get('Submit'); ?></button>
                        </div>
                    </div>

                </div>
            </form>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('breadcrumb-plugins'); ?>
    <a href="<?php echo e(route('admin.businesscategory.index')); ?>" class="btn btn-primary"><i class="bi bi-arrow-clockwise"></i>
        <?php echo app('translator')->get('Back'); ?></a>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.app', ['title' => 'Busness Category'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/amlaek/public_html/resources/views/admin/businesscategories/create.blade.php ENDPATH**/ ?>
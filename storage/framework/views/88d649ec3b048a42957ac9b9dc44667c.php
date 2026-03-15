<?php $__env->startSection('panel'); ?>
    <div class="container-fluid">
        <div class="pb-2 mb-2 page-breadcrumb d-flex align-items-center border-bottom">
            <div class="ms-auto">
                <a href="<?php echo e(route('admin.category.index')); ?>" type="button" class="btn btn-primary btn-sm"> <i
                        class="bi bi-arrow-counterclockwise"></i> <?php echo app('translator')->get('Back To Category List'); ?></a>
            </div>
        </div>
        <!--breadcrumb-->
        <div class="card">
            <div class="card-body">
                <form action="<?php echo e(route('admin.category.store')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <div class="mb-3 row">
                        <div class="py-2 col-sm-7">
                            <div class="form-group">
                                <label for="title"><?php echo app('translator')->get('Name'); ?></label>
                                <input type="title" name="title" value="<?php echo e(old('title')); ?>" class="form-control">
                                <span class="text-danger"><?php echo e($errors->first('title')); ?></span>
                            </div>
                        </div>

                        <div class="py-2 col-sm-7">
                            <div class="form-group">
                                <label for="Type"><?php echo app('translator')->get('Type'); ?></label>
                                <select name="type" id="type" class="form-control">
                                    <option value="EMAIL"><?php echo app('translator')->get('EMAIL'); ?></option>
                                    <option value="SMS"><?php echo app('translator')->get('SMS'); ?></option>
                                </select>
                                <span class="text-danger"><?php echo e($errors->first('type')); ?></span>
                            </div>
                        </div>

                        <div class="mt-3 col-sm-12">
                            <a href="<?php echo e(route('admin.category.index')); ?>" class="px-3 btn btn-warning btn-sm"><?php echo app('translator')->get('Cancel'); ?></a>
                            <button type="submit" class="px-3 btn btn-primary btn-sm"><?php echo app('translator')->get('Submit'); ?></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', ['title' => 'Add New Category'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/amlaek/public_html/resources/views/mail_vendor/categories/create.blade.php ENDPATH**/ ?>
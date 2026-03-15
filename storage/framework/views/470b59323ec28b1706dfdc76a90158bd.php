<?php $__env->startSection('panel'); ?>
    <div class="container-fluid">
        <div class="pb-2 mb-2 page-breadcrumb d-flex align-items-center border-bottom">

            <div class="ms-auto">
                <a href="<?php echo e(route('admin.category.create')); ?>" type="button" class="btn btn-primary btn-sm"> <i
                        class="bi bi-plus-circle"></i> <?php echo app('translator')->get('Create New Category'); ?></a>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th><?php echo app('translator')->get('Subscribe'); ?></th>
                                <th><?php echo app('translator')->get('Type'); ?></th>
                                <th><?php echo app('translator')->get('Action'); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($loop->iteration); ?></td>
                                    <td><?php echo e($item->title); ?></td>
                                    <td><?php echo e($item->type); ?></td>
                                    <td>
                                        <div class="gap-3 table-actions d-flex align-items-center fs-6">
                                            <a href="<?php echo e(route('admin.category.edit', $item->id)); ?>"
                                                class="text-warning" data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                title="Edit"><i class="bi bi-pencil-fill"></i></a>
                                            <a href="javascript:;" class="text-danger"
                                                onclick="deleteItem(<?php echo e($item->id); ?>)" data-bs-toggle="tooltip"
                                                data-bs-placement="bottom" title="<?php echo app('translator')->get('Delete'); ?>"><i
                                                    class="bi bi-trash-fill"></i></a>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('delete'); ?>
    <form method="POST" id="deleteForm">
        <?php echo csrf_field(); ?>
        <?php echo method_field('delete'); ?>
    </form>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.app', ['title' => 'Category List'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/amlaek/public_html/resources/views/mail_vendor/categories/index.blade.php ENDPATH**/ ?>
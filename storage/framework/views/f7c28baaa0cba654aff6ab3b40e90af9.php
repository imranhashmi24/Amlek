
<?php $__env->startSection('panel'); ?>
    <div class="container-fluid">
        <div class="pb-2 mb-2 page-breadcrumb d-flex align-items-center border-bottom">
            <div class="ms-auto">
                <button type="button"  data-bs-toggle="modal" data-bs-target="#contactImportModal" class="btn btn-primary btn-sm"> <i
                    class="bi bi-excel"></i> <?php echo app('translator')->get('Import'); ?></button>
                <a href="<?php echo e(route('admin.contacts.create')); ?>" type="button" class="btn btn-primary btn-sm"> <i
                        class="bi bi-plus-circle"></i> <?php echo app('translator')->get('Create New Contacts'); ?></a>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th><?php echo app('translator')->get('Name'); ?></th>
                                <th><?php echo app('translator')->get('Phone'); ?></th>
                                <th><?php echo app('translator')->get('Email'); ?></th>
                                <th><?php echo app('translator')->get('Group'); ?></th>
                                <th><?php echo app('translator')->get('Status'); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $contacts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $contact): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($loop->iteration); ?></td>
                                    <td><?php echo e($contact->name); ?></td>
                                    <td><?php echo e($contact->phone); ?></td>
                                    <td><?php echo e($contact->email); ?></td>
                                    <td><?php echo e($contact->category->title); ?></td>
                                    <td>
                                        <?php if($contact->status == 1): ?>
                                            <span class="text-white badge bg-success"><?php echo app('translator')->get('Active'); ?></span>
                                        <?php elseif($contact->status == 2): ?>
                                            <span class="text-white badge bg-warning"><?php echo app('translator')->get('Inactive'); ?></span>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
                <div class="my-3">
                    <?php echo e($contacts->links()); ?>

                </div>
            </div>
        </div>
    </div>

    <div id="contactImportModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="mt-0 modal-title" id="myModalLabel"><?php echo app('translator')->get('Upload contact CSV File'); ?></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="form" action="<?php echo e(route('admin.contacts.contactBulkUpload')); ?>" method="POST" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <div class="modal-body">
                        <div class="row">
                            <div class="my-3 form-group">
                                <label for="" class="col-md-12 pull-left"><?php echo app('translator')->get('Group'); ?>  <sup class="text-danger">*</sup></label>
                                <div class="col-md-12">
                                    <select class="form-control" name="category_id" required>
                                        <option value="0"><?php echo app('translator')->get('Select one'); ?></option>
                                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($category->id); ?>" <?php echo e(old('category_id') == $category->id ? 'selected' : ''); ?>><?php echo e($category->title); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>
                            <div class="my-3 form-group">
                                <label for="file" class="form-label"><?php echo e(__('File')); ?> <sup class="text-danger">*</sup></label>
                                <div class="col-md-12">
                                    <input type="file" name="csvfile" class="form-control" required>
                                    <div class="form-text"><?php echo e(__('Supported files: csv & exel')); ?></div>
                                </div>
                            </div>
                            <div class="my-3 form-group">
                                <div class="progress">
                                    <div class="progress-bar"
                                        role="progressbar"
                                        style="width: 0%;"
                                        aria-valuenow="0"
                                        aria-valuemin="0"
                                        aria-valuemax="100">
                                        25%
                                    </div>
                                </div>
                            </div>
                            <div class="my-3 form-group">
                                <div class="form-text"><?php echo e(__('Download file format from here')); ?>

                                    <a href="<?php echo e(route('admin.demo.csv.downlode')); ?>"><?php echo e(__('csv')); ?></a> ,
                                    <a href="<?php echo e(route('admin.demo.exel.downlode','xlsx')); ?>"><?php echo e(__('exel')); ?></a>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><?php echo app('translator')->get('Close'); ?></button>
                        <button type="submit" class="btn btn-primary"><?php echo app('translator')->get('Save'); ?></button>
                    </div>
                </form>
            </div>

        </div>
    </div>
<?php $__env->stopSection(); ?>



<?php $__env->startPush('script'); ?>
<script>
    $(document).ready(function() {
        $('#form').submit(function(e) {
            e.preventDefault(); // prevent the form from submitting normally

            var form = $(this);
            var formData = new FormData(form[0]);

            $.ajax({
                xhr: function() {
                    var xhr = new window.XMLHttpRequest();
                    xhr.upload.addEventListener("progress", function(evt) {
                        if (evt.lengthComputable) {
                            var percentComplete = evt.loaded / evt.total * 100;
                            $('.progress-bar').width(percentComplete + '%');
                            $('.progress-bar').html(percentComplete + '%');
                        }
                    }, false);
                    return xhr;
                },
                type: form.attr('method'),
                url: form.attr('action'),
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    console.log(response);
                    if(response.status) {
                        window.location.reload();

                    } else {
                        $('.progress-bar').width('100%').removeClass('bg-success').addClass('bg-danger').html('Faild');
                    }
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                    $('.progress-bar').width('100%').removeClass('bg-success').addClass('bg-danger').html('Faild');
                }
            });
        });
    });
</script>
<?php $__env->stopPush(); ?>


<?php echo $__env->make('admin.layouts.app', ['title' => 'Contacts Person Lists'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/amlaek/public_html/resources/views/mail_vendor/contacts/email.blade.php ENDPATH**/ ?>
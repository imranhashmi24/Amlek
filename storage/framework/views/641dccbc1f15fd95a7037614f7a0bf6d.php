<!-- Modal -->
<div class="modal fade" id="propertyRequestForm" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="<?php echo e(route('property.request.send.store')); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <div class="modal-header">
                    <h1 class="modal-title fs-5"><?php echo e(__('Property Request')); ?></h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <input type="hidden" name="property_id" value="<?php echo e(@$property->id); ?>">
                        <div class="mb-3 col-12">
                            <label for="Name" class="form-label"><?php echo e(__('Name')); ?></label>
                            <input type="text" id="Name" name="name" value="<?php echo e(old('name')); ?>" class="form-control" a required>
                        </div>
                        <div class="mb-3 col-12">
                            <label for="email" class="form-label"><?php echo e(__('Email')); ?></label>
                            <input type="email" id="email" name="email" value="<?php echo e(old('email')); ?>" class="form-control"  required>
                        </div>
                        <div class="mb-3 col-12">
                            <label for="mobile" class="form-label"><?php echo e(__('Mobile number')); ?></label>
                            <input type="text" id="mobile" name="mobile" value="<?php echo e(old('mobile')); ?>" class="form-control" required>
                        </div>
                        <div class="mb-3 col-12">
                            <label for="jobtitle" class="form-label"><?php echo e(__('Job Title')); ?></label>
                            <input type="text" id="jobtitle" name="job_title" value="<?php echo e(old('job_title')); ?>" class="form-control" required>
                        </div>
                        <div class="mb-3 col-12">
                            <label for="message" class="form-label"><?php echo e(__('Message')); ?></label>
                            <textarea id="message" name="message" class="form-control" required><?php echo e(old('message')); ?></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary"><?php echo app('translator')->get('Send Request'); ?></button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php /**PATH /home/asoug/amlaek.asoug.com/resources/views/web/component/property_request_form.blade.php ENDPATH**/ ?>
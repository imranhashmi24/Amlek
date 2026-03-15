<?php $__env->startSection('panel'); ?>
    <div class="container-fluid">
        <form action="<?php echo e(route('admin.mail.sendmail')); ?>" method="post" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <div class="row">
                <div class="col-12 col-xl-12">
                    <?php if(session('success')): ?>
                        <div class="alert alert-success"><?php echo e(session('success')); ?></div>
                    <?php endif; ?>
                    <?php if(session('error')): ?>
                        <div class="alert alert-warning"><?php echo e(session('error')); ?></div>
                    <?php endif; ?>
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="py-3 col-12">
                                    <label for="" class="form-label"><?php echo app('translator')->get('Sender Email'); ?> </label>
                                    <select name="domain" id="domain" class="form-control" required>
                                        <option value=""><?php echo app('translator')->get('Select Email'); ?></option>
                                        <?php $__currentLoopData = $domainconfigs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $domainconfig): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($domainconfig->id); ?>"><?php echo e($domainconfig->domain); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                                <div class="py-3 col-12">
                                    <label for="" class="form-label"><?php echo app('translator')->get('Email Address'); ?><span
                                            class="text-danger">*</span></label>
                                    <textarea name="email_address" id="email" class="form-control" rows="3"
                                        placeholder=""></textarea>
                                </div>
                                <div class="py-3 col-12">
                                    <label for="" class="form-label"><?php echo app('translator')->get('Email Subject'); ?><span
                                            class="text-danger">*</span></label>
                                    <input type="text" name="subject" class="form-control">
                                </div>

                                <div class="py-3 col-12">
                                    <label for="" class="form-label"><?php echo app('translator')->get('Select Template'); ?></label>
                                    <select name="template" id="template_id" class="form-control">
                                        <option value="" data-content="0"><?php echo app('translator')->get('Select Template'); ?></option>
                                        <?php $__currentLoopData = $templates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $template): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($template->code); ?>" data-content="<?php echo e($template); ?>"><?php echo e($template->title); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    <?php $__errorArgs = ['template'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <p class="text-danger"><?php echo e($message); ?></p>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>

                                <div class="py-3 col-12">
                                    <label for="" class="form-label"><?php echo app('translator')->get('Message'); ?> <span
                                            class="text-danger">*</span></label>
                                    <textarea name="message" id="message" class="form-control message" rows="5"></textarea>
                                    <br>
                                    
                                </div>
                                <div class="py-3 col-12">
                                    <label for="" class="form-label"><?php echo app('translator')->get('Attachment'); ?> (<?php echo app('translator')->get('User can add multiple File'); ?>) (<?php echo app('translator')->get('Optional'); ?>)</label>
                                    <input type="file" name="attachment[]" class="form-control" multiple>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12">
                                    <button type="submit" class="px-4 btn btn-primary"> <i class="bi bi-send"></i>
                                        <?php echo app('translator')->get('Send'); ?></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startPush("script"); ?>
    <script>
        $(document).ready(function() {
            $("#template_id").on("change", function() {
                var template = $(this).find('option:selected').data('content');
                if(template === 0){
                    $(".code").html('');
                    $("#message").text('');
                }else{
                    var short_codes = template.short_code;
                    $(".code").html(short_codes);
                    $("#message").text(template.message_body);
                }
            });
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.app', ['title' => 'SMS Send'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/amlaek/public_html/resources/views/mail_vendor/mail/send.blade.php ENDPATH**/ ?>
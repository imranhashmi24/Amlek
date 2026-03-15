<?php $__env->startSection('panel'); ?>
    <div class="container-fluid">
        <div class="pb-2 mb-2 page-breadcrumb d-flex align-items-center border-bottom">
            <div class="ms-auto">
                <a href="<?php echo e(route('admin.contacts.email.index')); ?>" type="button" class="btn btn-primary btn-sm"> <i
                        class="bi bi-arrow-counterclockwise"></i> <?php echo app('translator')->get('Back'); ?></a>
            </div>
        </div>
        <!--breadcrumb-->
        <div class="card">
            <?php if(session('success')): ?>
                <div class="alert alert-success"><?php echo e(session('success')); ?></div>
            <?php endif; ?>
            <?php if(session('error')): ?>
                <div class="alert alert-warning"><?php echo e(session('error')); ?></div>
            <?php endif; ?>
            <div class="card-body">
                <form action="<?php echo e(route('admin.contacts.store')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <div class="mb-3 row">
                        <div class="py-2 col-sm-7">
                            <div class="form-group">
                                <label for="title"><?php echo app('translator')->get('Group'); ?></label>
                                <select name="category_id" class="form-control">
                                    <option value="0"><?php echo app('translator')->get('Select one'); ?></option>
                                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($category->id); ?>" <?php echo e(old('category_id') == $category->id ? 'selected' : ''); ?>><?php echo e($category->title); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <?php $__errorArgs = ['category_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="text-danger"><?php echo e($message); ?></span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>
                        <div class="py-2 col-sm-7">
                            <div class="form-group">
                                <label for="title"><?php echo app('translator')->get('Type'); ?></label>
                                <select name="type" class="form-control">
                                    
                                    <option value="EMAIL" <?php echo e(old('type') == 'EMAIL' ? 'selected' : ''); ?>><?php echo app('translator')->get('EMAIL'); ?></option>
                                    <option value="0"><?php echo app('translator')->get('Select type'); ?></option>
                                </select>
                                <?php $__errorArgs = ['type'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="text-danger"><?php echo e($message); ?></span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                            </div>
                        </div>
                        <div class="py-2 col-sm-7">
                            <div class="form-group">
                                <label for="name"><?php echo app('translator')->get('Name'); ?></label>
                                <input type="text" name="name" value="<?php echo e(old('name')); ?>" class="form-control">
                                <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="text-danger"><?php echo e($message); ?></span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>
                        <div class="py-2 col-sm-7">
                            <div class="form-group">
                                <label for="name"><?php echo app('translator')->get('Title'); ?></label>
                                <input type="text" name="title" value="<?php echo e(old('title')); ?>" class="form-control">
                                <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="text-danger"><?php echo e($message); ?></span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>
                        <div class="py-2 col-sm-7">
                            <div class="form-group">
                                <label for="name"><?php echo app('translator')->get('City'); ?></label>
                                <input type="text" name="city" value="<?php echo e(old('city')); ?>" class="form-control">
                                <?php $__errorArgs = ['city'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="text-danger"><?php echo e($message); ?></span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>
                        <div class="py-2 col-sm-7">
                            <div class="form-group">
                                <label for="title"><?php echo app('translator')->get('Phone'); ?></label>
                                <input type="text" name="phone" value="<?php echo e(old('phone')); ?>" class="form-control">
                                <?php $__errorArgs = ['phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="text-danger"><?php echo e($message); ?></span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>
                        <div class="py-2 col-sm-7">
                            <div class="form-group">
                                <label for="title"><?php echo app('translator')->get('Email'); ?></label>
                                <input type="text" name="email" value="<?php echo e(old('email')); ?>" class="form-control">
                                <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="text-danger"><?php echo e($message); ?></span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>
                        <div class="mt-3 col-sm-12">
                            <a href="<?php echo e(route('admin.contacts.sms.index')); ?>" class="px-3 btn btn-warning btn-sm">Cancel</a>
                            <button type="submit" class="px-3 btn btn-primary btn-sm"><?php echo app('translator')->get('Submit'); ?></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', ['title' => 'Add New Contact'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/amlaek/public_html/resources/views/mail_vendor/contacts/create.blade.php ENDPATH**/ ?>
<?php $__env->startSection('panel'); ?>

    <div class="row">
        <div class="col-12 col-lg-5">
            <div class="card">
                <div class="card-body">
                    <div class="flex-wrap gap-4 profile-img d-flex">
                        <div>
                            <img src="<?php echo e(getImage(getFilePath('userProfile') . '/' . $user->image)); ?>" alt="">
                        </div>
                        <div>
                            <h5><?php echo e($user->name); ?></h5>
                            <h6><?php echo e('@' . $user->username); ?></h6>
                            <h6><?php echo e($user->email); ?></h6>
                            <h6><?php echo e($user->mobile); ?></h6>
                            <h6><span class="badge bg-primary"><?php echo e(__($user->position_title)); ?></span></h6>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="flex-wrap gap-3 mt-4 d-flex">
                                <div class="flex-fill">
                                    <a href="<?php echo e(route('admin.report.login.history')); ?>?search=<?php echo e($user->username); ?>"
                                        class="px-5 btn btn-primary w-100">
                                        <i class="las la-list-alt me-2"></i><?php echo app('translator')->get('Logins'); ?>
                                    </a>
                                </div>

                                <div class="flex-fill">
                                    <a href="<?php echo e(route('admin.users.notification.log', $user->id)); ?>"
                                        class="px-5 btn btn-secondary w-100">
                                        <i class="las la-bell me-2"></i><?php echo app('translator')->get('Notifications'); ?>
                                    </a>
                                </div>

                                <div class="flex-fill">
                                    <a href="<?php echo e(route('admin.users.login', $user->id)); ?>" target="_blank"
                                        class="px-5 btn btn-success w-100">
                                        <i class="las la-sign-in-alt me-2"></i><?php echo app('translator')->get('Login as User'); ?>
                                    </a>
                                </div>

                                <div class="flex-fill">
                                    <?php if($user->status == Status::USER_ACTIVE): ?>
                                        <button type="button" class="px-5 btn btn-danger w-100" data-bs-toggle="modal"
                                            data-bs-target="#userStatusModal">
                                            <i class="las la-ban me-2"></i><?php echo app('translator')->get('Ban User'); ?>
                                        </button>
                                    <?php else: ?>
                                        <button type="button" class="px-5 btn btn-success w-100" data-bs-toggle="modal"
                                            data-bs-target="#userStatusModal">
                                            <i class="las la-undo me-2"></i><?php echo app('translator')->get('Unban User'); ?>
                                        </button>
                                    <?php endif; ?>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-7">
            <form action="<?php echo e(route('admin.users.update', [$user->id])); ?>" method="POST" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="pb-3 col-md-4">
                                <div class="form-group">
                                    <label class="form-label"><?php echo app('translator')->get('Name'); ?></label>
                                    <input class="form-control" type="text" name="name" required
                                        value="<?php echo e($user->name); ?>">
                                </div>
                            </div>
                            <div class="pb-3 col-md-4">
                                <div class="form-group">
                                    <label class="form-label"><?php echo app('translator')->get('Email'); ?> </label>
                                    <input class="form-control" type="email" name="email" value="<?php echo e($user->email); ?>"
                                        required>
                                </div>
                            </div>

                            <div class="pb-3 col-md-4">
                                <div class="form-group">
                                    <label class="form-label"><?php echo app('translator')->get('Mobile Number'); ?> </label>
                                    <input type="number" name="mobile" value="<?php echo e(old('mobile',@$user->mobile)); ?>" 
                                    class="form-control" required>
                                </div>
                            </div>

                            <div class="pb-3 col-md-6">
                                <div class="form-group ">
                                    <label class="form-label"><?php echo app('translator')->get('Address'); ?></label>
                                    <input class="form-control" type="text" name="address"
                                        value="<?php echo e(@$user->address->address); ?>">
                                </div>
                            </div>

                            <div class="pb-3 col-md-6">
                                <div class="form-group">
                                    <label class="form-label"><?php echo app('translator')->get('City'); ?></label>
                                    <input class="form-control" type="text" name="city"
                                        value="<?php echo e(@$user->address->city); ?>">
                                </div>
                            </div>

                            <div class="pb-3 col-md-4">
                                <div class="form-group ">
                                    <label class="form-label"><?php echo app('translator')->get('State'); ?></label>
                                    <input class="form-control" type="text" name="state"
                                        value="<?php echo e(@$user->address->state); ?>">
                                </div>
                            </div>

                            <div class="pb-3 col-md-4">
                                <div class="form-group ">
                                    <label class="form-label"><?php echo app('translator')->get('Zip/Postal'); ?></label>
                                    <input class="form-control" type="text" name="zip"
                                        value="<?php echo e(@$user->address->zip); ?>">
                                </div>
                            </div>

                            <div class="pb-3 col-md-4">
                                <div class="form-group ">
                                    <label class="form-label"><?php echo app('translator')->get('Country'); ?></label>
                                    <select name="country" class="form-select">
                                        <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($country->id); ?>" <?php if($country->id == $user->country_id): echo 'selected'; endif; ?>> <?php echo e($country->name); ?> </option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-sm-6">
                                <label class="form-label"><?php echo app('translator')->get('Email Verification'); ?></label>
                                <input type="checkbox" data-width="100%" data-onstyle="success" data-offstyle="danger"
                                    data-bs-toggle="toggle" data-on="<?php echo app('translator')->get('Verified'); ?>" data-off="<?php echo app('translator')->get('Unverified'); ?>"
                                    name="ev" <?php if($user->ev): ?> checked <?php endif; ?>>

                            </div>

                            <div class="form-group col-sm-6">
                                <label class="form-label"><?php echo app('translator')->get('Mobile Verification'); ?></label>
                                <input type="checkbox" data-width="100%" data-onstyle="success" data-offstyle="danger"
                                    data-bs-toggle="toggle" data-on="<?php echo app('translator')->get('Verified'); ?>" data-off="<?php echo app('translator')->get('Unverified'); ?>"
                                    name="sv" <?php if($user->sv): ?> checked <?php endif; ?>>
                            </div>
                        </div>

                        <div class="div">
                            <button type="submit" class="mt-4 btn btn-primary w-100"><?php echo app('translator')->get('Submit'); ?>
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>

    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>
    <script>
        (function($) {
            "use strict"
            $('.bal-btn').click(function() {
                var act = $(this).data('act');
                $('#addSubModal').find('input[name=act]').val(act);
                if (act == 'add') {
                    $('.type').text('Add');
                } else {
                    $('.type').text('Subtract');
                }
            });

            // let mobileElement = $('.mobile-code');

            // $('select[name=country]').change(function() {
            //     mobileElement.text(`+${$('select[name=country] :selected').data('mobile_code')}`);
            // });

            // $('select[name=country]').val('<?php echo e(@$user->country_code); ?>');

            // let dialCode = $('select[name=country] :selected').data('mobile_code');
            // let mobileNumber = `<?php echo e($user->mobile); ?>`;
            // mobileNumber = mobileNumber.replace(dialCode, '');
            // $('input[name=mobile]').val(mobileNumber);
            // mobileElement.text(`+${dialCode}`);

        })(jQuery);
    </script>
<?php $__env->stopPush(); ?>


<?php $__env->startPush('style'); ?>
    <style>
        .profile-img img {
            width: 100px;
            height: 100px;
            border-radius: 50%;
        }
    </style>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.app', ['title' => 'User Detail - ' . $user->username], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/amlaek/public_html/resources/views/admin/users/detail.blade.php ENDPATH**/ ?>
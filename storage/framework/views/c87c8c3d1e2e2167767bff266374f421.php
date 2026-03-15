<?php $__env->startSection('content'); ?>
<?php
    $policyPages = getContent('policy_pages.element',false,null,true);
?>

<div class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-6">
                <div class="card custom-card">
                    <div class="card-header">
                        <h5 class="card-title text-center"><?php echo app('translator')->get('Sign Up'); ?></h5>
                    </div>
                    <div class="card-body px-4">
                        <form method="POST" action="<?php echo e(route('user.register')); ?>">
                            <?php echo csrf_field(); ?>
                            <div class="row">
                                <div class="col-6 pb-3">
                                    <div class="form-group">
                                        <label class="form-label"><?php echo app('translator')->get('Username'); ?></label>
                                        <input type="text" class="form-control checkUser" name="username"
                                            value="<?php echo e(old('username')); ?>" required>
                                        <small class="text-danger usernameExist"></small>
                                    </div>
                                </div>
                                <div class="col-6 pb-3">
                                    <div class="form-group">
                                        <label class="form-label"><?php echo app('translator')->get('Email Address'); ?></label>
                                        <input type="email" class="form-control checkUser" name="email"
                                            value="<?php echo e(old('email')); ?>" required>

                                            <small class="text-danger emailExist"></small>
                                    </div>
                                </div>
                                <div class="col-6 pb-3">
                                    <div class="form-group">
                                        <label class="form-label"><?php echo app('translator')->get('Country'); ?></label>
                                        <select name="country" class="form-select ">
                                            <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php if(app()->getLocale()=='en'): ?>
                                                <option value="<?php echo e($country->id); ?>"><?php echo e(__($country->name)); ?></option>
                                                <?php else: ?>
                                                <option value="<?php echo e($country->id); ?>"><?php echo e(__($country->name_ar)); ?></option>
                                                <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-6 pb-3">
                                    <div class="form-group">
                                        <label class="form-label"><?php echo app('translator')->get('Mobile Number'); ?></label>
                                        <div class="input-group ">
                                            <input type="number" name="mobile" value="<?php echo e(old('mobile')); ?>"
                                                class="form-control  checkUser" required>
                                        </div>
                                        <small class="text-danger mobileExist"></small>
                                    </div>
                                </div>
                                <div class="col-6 pb-3">
                                    <div class="form-group">
                                        <label class="form-label"><?php echo app('translator')->get('Password'); ?></label>
                                        <input type="password"class="form-control  <?php if(gs('secure_password')): ?> secure-password <?php endif; ?>" name="password" required>
                                    </div>
                                </div>
                                <div class="col-6 pb-3">
                                    <div class="form-group">
                                        <label class="form-label"><?php echo app('translator')->get('Confirm Password'); ?></label>
                                        <input type="password" class="form-control " name="password_confirmation" required>
                                    </div>
                                </div>

                                <?php if (isset($component)) { $__componentOriginalff0a9fdc5428085522b49c68070c11d6 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalff0a9fdc5428085522b49c68070c11d6 = $attributes; } ?>
<?php $component = App\View\Components\Captcha::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('captcha'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Captcha::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalff0a9fdc5428085522b49c68070c11d6)): ?>
<?php $attributes = $__attributesOriginalff0a9fdc5428085522b49c68070c11d6; ?>
<?php unset($__attributesOriginalff0a9fdc5428085522b49c68070c11d6); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalff0a9fdc5428085522b49c68070c11d6)): ?>
<?php $component = $__componentOriginalff0a9fdc5428085522b49c68070c11d6; ?>
<?php unset($__componentOriginalff0a9fdc5428085522b49c68070c11d6); ?>
<?php endif; ?>

                                <?php if(gs()->agree): ?>
                                <div class="col-12 pb-3">
                                    <div class="form-group">
                                        <input type="checkbox" id="agree" <?php if(old('agree')): echo 'checked'; endif; ?> name="agree" required>
                                        <label for="agree"><?php echo app('translator')->get('I agree with'); ?></label> <span><?php $__currentLoopData = $policyPages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $policy): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <a href="<?php echo e(route('policy.pages',[slug($policy->data_values->title),$policy->id])); ?>" target="_blank"><?php echo e(__($policy->data_values->title)); ?></a> <?php if(!$loop->last): ?>, <?php endif; ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></span>
                                    </div>
                                </div>
                                <?php endif; ?>
                                <div class="col-12 pb-3">
                                    <div class="form-group">
                                        <button type="submit" id="recaptcha" class="btn btn-base w-100"> <?php echo app('translator')->get('Sign Up'); ?></button>
                                    </div>
                
                                    <p class="mb-0 text-center pt-3"><?php echo app('translator')->get('Already have an account?'); ?> <a href="<?php echo e(route('user.login')); ?>"><?php echo app('translator')->get('Sign In'); ?></a></p>
                                </div>
                            </div>
                
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>


<?php if(gs('secure_password')): ?>
    <?php $__env->startPush('script-lib'); ?>
        <script src="<?php echo e(asset('assets/global/js/secure_password.js')); ?>"></script>
    <?php $__env->stopPush(); ?>
<?php endif; ?>
<?php $__env->startPush('script'); ?>
    <script>
      "use strict";
        (function ($) {
            $('.checkUser').on('focusout',function(e){
          
                var url = '<?php echo e(route('user.checkUser')); ?>';
                var value = $(this).val();
                var token = '<?php echo e(csrf_token()); ?>';

                if ($(this).attr('name') == 'email') {
                    var data = {email:value,_token:token}
                }
                if ($(this).attr('name') == 'username') {
                    var data = {username:value,_token:token}
                }

                if ($(this).attr('name') == 'mobile') {
                    var data = {mobile:value,_token:token}
                }


                
                $.post(url,data,function(response) {
                  if(response.data != false){
                    $(`.${response.type}Exist`).text(`${response.type} already exists`);
                  }else{
                    $(`.${response.type}Exist`).text('');
                  }
                });


            });
        })(jQuery);

    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('web.layouts.frontend',['title'=>'Sign In'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/amlaek/public_html/resources/views/user/auth/register.blade.php ENDPATH**/ ?>
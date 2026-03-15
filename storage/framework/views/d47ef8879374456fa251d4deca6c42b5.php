<?php $__env->startSection('content'); ?>
    <div class="py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-md-6">
                    <div class="card custom-card">
                        <div class="card-header">
                            <h5 class="card-title text-center"><?php echo app('translator')->get('Sign In'); ?></h5>
                        </div>
                        <div class="card-body px-4">
                            <form method="POST" action="<?php echo e(route('user.login')); ?>" class="verify-gcaptcha">
                                <?php echo csrf_field(); ?>

                                <div class="form-group mb-3">
                                    <label for="username" class="form-label"><?php echo app('translator')->get('Username or Email'); ?></label>
                                    <input type="text" id="username" name="username" value="<?php echo e(old('username')); ?>"
                                        class="form-control " required>
                                </div>

                                <div class="form-group mb-3">
                                    <label for="password" class="form-label"><?php echo app('translator')->get('Password'); ?></label>
                                    <input id="password" type="password" class="form-control " name="password" required>
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

                                <div class="d-flex justify-content-between flex-wrap gap-3 mb-3">
                                    <div>
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                            <?php echo e(old('remember') ? 'checked' : ''); ?>>
                                        <label class="form-check-label" for="remember">
                                            <?php echo app('translator')->get('Remember Me'); ?>
                                        </label>
                                    </div>

                                    <div>
                                        <a class="fw-bold forgot-pass" href="<?php echo e(route('user.password.request')); ?>">
                                            <?php echo app('translator')->get('Forgot your password?'); ?>
                                        </a>
                                    </div>
                                </div>

                                <div class="form-group mb-3">
                                    <button type="submit" id="recaptcha" class="btn btn-base w-100">
                                        <?php echo app('translator')->get('Sign In'); ?>
                                    </button>
                                </div>
                                <p class="mb-0 text-center"><?php echo app('translator')->get('Don\'t have any account?'); ?> <a
                                        href="<?php echo e(route('user.register')); ?>"><?php echo app('translator')->get('Sign Up'); ?></a></p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>


<?php $__env->startPush('script'); ?>
    <script>
        $('form').on('submit', function() {
            if ($(this).valid()) {
                alert('sadf');
                $(':submit', this).attr('disabled', 'disabled');
            }
        });
    </script>
    <?php $__env->stopPush(); ?>

<?php echo $__env->make('web.layouts.frontend', ['title' => 'Sign In'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/asoug/amlaek.asoug.com/resources/views/user/auth/login.blade.php ENDPATH**/ ?>
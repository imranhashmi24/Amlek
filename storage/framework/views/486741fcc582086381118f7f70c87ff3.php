<?php $__env->startSection('content'); ?>
    <main class="authentication-content login-bg">
        <div class="container-fluid">
            <div class="authentication-card">
                <div class="overflow-hidden shadow card rounded-2">
                    <div class="p-4 card-body p-sm-5">
                        <h5 class="text-center card-title"><?php echo app('translator')->get('Welcome to'); ?> <?php echo e(__(gs('site_name'))); ?></h5>
                        <p class="mb-5 text-center card-text"><?php echo app('translator')->get('Admin Login'); ?><?php echo app('translator')->get('to'); ?> <?php echo e(__(gs('site_name'))); ?>

                            <?php echo app('translator')->get('Dashboard'); ?></p>
                        <form class="form-body" action="<?php echo e(route('admin.login')); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <div class="row g-3">
                                <div class="col-12">
                                    <label class="form-label"><?php echo app('translator')->get('Email/Username'); ?></label>
                                    <div class="ms-auto position-relative">
                                        <div class="px-3 position-absolute top-50 translate-middle-y search-icon"><i
                                                class="bi bi-person-fill"></i></div>
                                        <input type="text" class="form-control radius-30 ps-5"
                                            value="<?php echo e(old('username')); ?>" name="username" placeholder="<?php echo app('translator')->get('Enter Email/Username'); ?>"
                                            required>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <label class="form-label"><?php echo app('translator')->get('Password'); ?></label>
                                    <div class="ms-auto position-relative">
                                        <div class="px-3 position-absolute top-50 translate-middle-y search-icon"><i
                                                class="bi bi-lock-fill"></i></div>
                                        <input type="password" class="form-control radius-30 ps-5" name="password"
                                            placeholder="<?php echo app('translator')->get('Enter Password'); ?>" required>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" name="remember" type="checkbox" id="remember">
                                        <label class="form-check-label" for="remember"><?php echo app('translator')->get('Remember Me'); ?></label>
                                    </div>
                                </div>
                                <div class="col-6 text-end"> <a
                                        href="<?php echo e(route('admin.password.reset')); ?>"><?php echo app('translator')->get('Forgot Password?'); ?> </a>
                                </div>
                                <div class="col-12">
                                    <div class="d-grid">
                                        <button type="submit" class="btn btn-primary radius-30"><?php echo app('translator')->get('Sign In'); ?></button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.master', ['title' => 'Admin Login'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/amlaek/public_html/resources/views/admin/auth/login.blade.php ENDPATH**/ ?>
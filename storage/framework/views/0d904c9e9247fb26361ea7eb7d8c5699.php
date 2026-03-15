<?php
    $pages = App\Models\Page::where('is_default', Status::NO)->get();
    $lang = Session::get('lang');
?>

<section class="py-2 header-top">
    <div class="container">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 text-end">
                <div class="menubar">
                    <ul>
                        <?php if(gs('multi_language')): ?>

                            <li>
                                <?php if(@$lang == 'en'): ?>
                                    <button class="no-border head-lang-button langSel" data-lang="ar"> <img
                                            class="lang-flag"
                                            src="<?php echo e(asset('assets/images/frontend/uploads/saudi-arabia.png')); ?>">
                                        <?php echo app('translator')->get('Arabic'); ?></button>
                                <?php endif; ?>

                                <?php if(@$lang == 'ar'): ?>
                                    <button class="no-border head-lang-button langSel" data-lang="en"> <img
                                            class="lang-flag"
                                            src="<?php echo e(asset('assets/images/frontend/uploads/english.jpg')); ?>">
                                        <?php echo app('translator')->get('English'); ?></button>
                                <?php endif; ?>
                            </li>
                        <?php endif; ?>
                        <?php if(auth()->guard()->guest()): ?>
                            <li class="sub-btn button1">
                                <a href="#"> <i class="fa fa-user-circle"></i> <?php echo app('translator')->get('Accounts'); ?> <i
                                        class="fa-solid fa-angle-down"></i>
                                </a>
                                <div class="sub-menu">
                                    <a href="<?php echo e(route('user.login')); ?>"> <i class="fa-solid fa-arrow-right-to-bracket"></i>
                                        <?php echo app('translator')->get('Sign In'); ?></a>
                                    <a href="<?php echo e(route('user.register')); ?>"> <i
                                            class="fa-solid fa-arrow-right-to-bracket"></i> <?php echo app('translator')->get('Sign Up'); ?></a>

                                </div>
                            </li>
                        <?php endif; ?>

                        <?php if(auth()->guard()->check()): ?>
                            <li class="dashboard-btn">
                                <a href="<?php echo e(route('user.home')); ?>">
                                    <i class="bi bi-speedometer2"></i>
                                    <?php echo app('translator')->get('Dashboard'); ?>
                                </a>
                            </li>
                        <?php endif; ?>
                    </ul>

                </div>
            </div>

        </div>
    </div>
</section>

<header class="py-2 d-flex align-items-center scrolled">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-12 col-xl-2">
                <div class="logo d-flex justify-content-between align-items-center">
                    <a href="<?php echo e(route('home')); ?>">
                        <img src="<?php echo e(siteLogo()); ?>" alt="Logo">
                    </a>
                    <i class="fa fa-bars d-xl-none" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample"
                        aria-controls="offcanvasExample" onclick="mobileClick()" aria-hidden="true"></i>
                </div>
            </div>
            <div class="col-md-10 d-none d-xl-block">
                <div class="menubar">
                    <ul>
                        <li>
                            <a href="<?php echo e(route('home')); ?>"> <?php echo app('translator')->get('Homepage'); ?> </a>
                        </li>
                        <?php $__currentLoopData = $pages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li>
                                <a href="<?php echo e(route('pages', [$page->slug])); ?>"> <?php echo e(__($page->name)); ?> </a>
                            </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        <li>
                            <a href="<?php echo e(route('marketing')); ?>"> <?php echo app('translator')->get('Marketing'); ?> </a>
                        </li>

                        <li>
                            <a href="<?php echo e(route('finance')); ?>"> <?php echo app('translator')->get('Finance'); ?> </a>
                        </li>

                        <li>
                            <a href="<?php echo e(route('evaluation')); ?>"> <?php echo app('translator')->get('Evaluation and studies'); ?> </a>
                        </li>

                        <li>
                            <a href="<?php echo e(route('investment')); ?>"> <?php echo app('translator')->get('Social investment'); ?> </a>
                        </li>


                        <li>
                            <a href="<?php echo e(route('events')); ?>"> <?php echo app('translator')->get('Events'); ?> </a>
                        </li>

                        <li>
                            <a href="<?php echo e(route('auctions')); ?>"> <?php echo app('translator')->get('Auctions'); ?> </a>
                        </li>

                        <li>
                            <a href="<?php echo e(route('blogs')); ?>"> <?php echo app('translator')->get('Blogs'); ?> </a>
                        </li>

                        <li class="sub-btn">
                            <a href="javascript:void(0)"> <i class="bi bi-houses"></i> <?php echo app('translator')->get('Add'); ?>/<?php echo app('translator')->get('Request Property'); ?>
                                <i class="fa-solid fa-angle-down"></i></a>
                            <div class="sub-menu">
                                <a href="<?php echo e(route('property-request')); ?>"><?php echo app('translator')->get('Request Property'); ?></a>
                                <a href="<?php echo e(route('user.properties.create')); ?>"><?php echo app('translator')->get('Add Property'); ?></a>
                            </div>
                        </li>

                    </ul>
                </div>
            </div>
        </div>
    </div>
</header>

<div class="offcanvas offcanvas-mobile-menu <?php echo e($lang == 'ar' ? 'offcanvas-end' : 'offcanvas-start'); ?>" tabindex="-1"
    id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasExampleLabel">
            <a href="<?php echo e(route('home')); ?>" class="mobile-logo">
                <img src="<?php echo e(siteLogo()); ?>" alt="Logo">
            </a>
        </h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <div class="canvas-mobile-menu">

            <a href="<?php echo e(route('home')); ?>"> <i class="bi bi-chevron-right"></i> <?php echo app('translator')->get('Homepage'); ?> </a>

            <?php $__currentLoopData = $pages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <a href="<?php echo e(route('pages', [$page->slug])); ?>"><i class="bi bi-chevron-right"></i>
                    <?php echo e(__($page->name)); ?> </a>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            <a href="<?php echo e(route('marketing')); ?>"> <i class="bi bi-chevron-right"></i> <?php echo app('translator')->get('Marketing'); ?> </a>
            <a href="<?php echo e(route('finance')); ?>"> <i class="bi bi-chevron-right"></i> <?php echo app('translator')->get('Finance'); ?> </a>
            <a href="<?php echo e(route('evaluation')); ?>"> <i class="bi bi-chevron-right"></i> <?php echo app('translator')->get('Evaluation and studies'); ?> </a>
            <a href="<?php echo e(route('investment')); ?>"> <i class="bi bi-chevron-right"></i> <?php echo app('translator')->get('Social investment'); ?> </a>
            <a href="<?php echo e(route('events')); ?>"><i class="bi bi-chevron-right"></i> <?php echo app('translator')->get('Events'); ?> </a>
            <a href="<?php echo e(route('auctions')); ?>"><i class="bi bi-chevron-right"></i> <?php echo app('translator')->get('Auctions'); ?> </a>
            <a href="<?php echo e(route('blogs')); ?>"><i class="bi bi-chevron-right"></i> <?php echo app('translator')->get('Blogs'); ?> </a>
            <a href="<?php echo e(route('property-request')); ?>"><i class="bi bi-chevron-right"></i> <?php echo app('translator')->get('Request Property'); ?></a>
            <a href="<?php echo e(route('user.properties.create')); ?>"><i class="bi bi-chevron-right"></i> <?php echo app('translator')->get('Add Property'); ?></a>
        </div>
    </div>
</div>
<?php /**PATH /home/amlaek/public_html/resources/views/web/partials/header.blade.php ENDPATH**/ ?>

<?php
    $lang = Session::get('lang');
?>

<div class="float-left d-mobile-close d-mobile-toggle">
    <i class="bi bi-x-circle"></i>
</div>
<ul class="sm-ul">
    <li>
        <a href="<?php echo e(route('user.home')); ?>" class="<?php echo e(menuActive('user.home')); ?>">
            <i class="bi bi-speedometer2 me-1"></i>
            <?php echo app('translator')->get('Dashboard'); ?>
        </a>
    </li>
    <li class="d-subbtn <?php echo e(menuActive('user.properties*')); ?>">
        <a href="javascript:void(0)" class="aaaa">
            <i class="bi bi-houses me-1"></i>
            <?php echo app('translator')->get('Properties'); ?>
        </a>
        <div class="d-submenu <?php echo e(menuActive(['user.properties.index','user.properties.pending','user.properties.published','user.properties.review','user.properties.rejected','user.properties.create'])); ?>">
            <a href="<?php echo e(route('user.properties.index')); ?>" class="<?php echo e(menuActive('user.properties.index')); ?>">
                <i class="fa-regular fa-circle"></i>
                <?php echo app('translator')->get('All'); ?>
            </a>
            <a href="<?php echo e(route('user.properties.pending')); ?>" class="<?php echo e(menuActive('user.properties.pending')); ?>">
                <i class="fa-regular fa-circle"></i>
                <?php echo app('translator')->get('Pending'); ?>
            </a>
            <a href="<?php echo e(route('user.properties.published')); ?>" class="<?php echo e(menuActive('user.properties.published')); ?>">
                <i class="fa-regular fa-circle"></i>
                <?php echo app('translator')->get('Published'); ?>
            </a>
            <a href="<?php echo e(route('user.properties.review')); ?>" class="<?php echo e(menuActive('user.properties.review')); ?>">
                <i class="fa-regular fa-circle"></i>
                <?php echo app('translator')->get('Reviews'); ?>
            </a>
            <a href="<?php echo e(route('user.properties.rejected')); ?>" class="<?php echo e(menuActive('user.properties.rejected')); ?>">
                <i class="fa-regular fa-circle"></i>
                <?php echo app('translator')->get('Rejected'); ?>
            </a>
            <a href="<?php echo e(route('user.properties.create')); ?>" class="<?php echo e(menuActive('user.properties.create')); ?>">
                <i class="fa-regular fa-circle"></i>
                <?php echo app('translator')->get('Add'); ?>
            </a>
        </div>
    </li>
    <li>
        <a href="<?php echo e(route('user.property.request')); ?>" class="<?php echo e(menuActive('user.property.request')); ?>">
            <i class="bi bi-house-check me-1"></i>
            <?php echo app('translator')->get('Property Request'); ?>
        </a>
    </li>
    <li>
        <a href="<?php echo e(route('user.finance.request')); ?>" class="<?php echo e(menuActive('user.finance.request')); ?>">
            <i class="bi bi-cash-coin me-1"></i>
            <?php echo app('translator')->get('Finance Request'); ?>
        </a>
    </li>
    <li>
        <a href="<?php echo e(route('user.marketing.request')); ?>" class="<?php echo e(menuActive('user.marketing.request')); ?>">
            <i class="bi bi-shop me-1"></i>
            <?php echo app('translator')->get('Marketing Request'); ?>
        </a>
    </li>
    <li>
        <a href="<?php echo e(route('user.service.request')); ?>" class="<?php echo e(menuActive('user.service.request')); ?>">
            <i class="bi bi-gear me-1"></i>
            <?php echo app('translator')->get('Service Request'); ?>
        </a>
    </li>
    <li>
        <a href="<?php echo e(route('user.favorite.index')); ?>" class="<?php echo e(menuActive('user.favorite.index')); ?>">
            <i class="bi bi-heart me-1"></i>
            <?php echo app('translator')->get('Favorite'); ?>
        </a>
    </li>
    <li>
        <a href="<?php echo e(route('user.profile.setting')); ?>" class="<?php echo e(menuActive('user.profile.setting')); ?>">
            <i class="fa-regular fa-user me-1"></i>
            <?php echo app('translator')->get('Profile Settings'); ?>
        </a>
    </li>
    <li>
        <a href="<?php echo e(route('support.index')); ?>" class="<?php echo e(menuActive('support.index')); ?>">
            <i class="bi bi-envelope me-1"></i>
            <?php echo app('translator')->get('Support'); ?>
        </a>
    </li>
    <li>
        <a href="<?php echo e(route('user.change.password')); ?>" class="<?php echo e(menuActive('user.change.password')); ?>">
            <i class="bi bi-lock me-1"></i>
            <?php echo app('translator')->get('Change Password'); ?>
        </a>
    </li>
    <li>
        <a href="<?php echo e(route('user.logout')); ?>">
            <i class="bi bi-box-arrow-right me-1"></i>
            <?php echo app('translator')->get('Logout'); ?>
        </a>
    </li>
</ul>
<?php /**PATH /home/amlaek/public_html/resources/views/web/partials/dashboard_sidnav.blade.php ENDPATH**/ ?>
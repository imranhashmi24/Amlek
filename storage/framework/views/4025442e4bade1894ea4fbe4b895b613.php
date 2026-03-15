<?php
    $targetGroupContent = getContent('target_groups.content', true);
    $targetGroupElements = getContent('target_groups.element', null, false, true);
?>


<section class="target-group py-5">
    <div class="container">
        <div class="section-title">
            <h2 class="after-line text-capitalize text-center"> <?php echo e($targetGroupContent->lang('head')); ?> </h2>
        </div>

        <div class="row justify-content-center mt-5">
            <?php $__currentLoopData = $targetGroupElements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $targetGroupElement): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-12 col-sm-6 col-md-4 col-lg-3 pb-4">
                    <a href="#" class="target-group-box text-center">
                        <img src="<?php echo e(getImage('assets/images/frontend/target_groups/' . @$targetGroupElement->data_values->image)); ?>"
                            alt="target group">
                        <h6> <?php echo e($targetGroupElement->lang('title')); ?> </h6>
                    </a>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        </div>
    </div>
</section>


<?php $__env->startPush('style'); ?>
    <style>
        .target-group {
            background: #F3F3F3;
        }

        .target-group-box {
            background: #ffffff;
            border-radius: 10px;
            padding: 20px 15px;
            display: block;
            text-decoration: none;
            transition: .2s;
            height: 100%;
        }

        .target-group-box img {
            width: 60px;
            margin-bottom: 15px;
        }

        .target-group-box h6 {
            font-weight: 700;
            font-size: 16px;
            line-height: 26px;
            color: #3A3A3A;
            transition: .2s;
        }

        .target-group-box:hover {
            background: #00A550;
        }

        .target-group-box:hover h6 {
            color: #ffffff;
        }

        .after-line::after {
            content: "";
            height: 2px;
            width: 80px;
            background: purple;
            display: block;
            margin: 0 auto;
            margin-top: 15px;
        }
    </style>
<?php $__env->stopPush(); ?>
<?php /**PATH /home/asoug/amlaek.asoug.com/resources/views/sections/target_groups.blade.php ENDPATH**/ ?>
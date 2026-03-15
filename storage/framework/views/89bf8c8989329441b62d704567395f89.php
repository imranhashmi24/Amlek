<?php
    $programContent = getContent('program_duration.content', true);
    $programElements = getContent('program_duration.element', null, false, true);
?>

<section class="acquired-skills py-5">
    <div class="container">
        <div class="acquired-title border-bottom pb-3">
            <h2> <?php echo e($programContent->lang('header')); ?> </h2>
        </div>

        <div class="acq-list">
            <ul class="mt-3">
                <?php $__currentLoopData = $programElements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $programElement): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li>
                        <img src="<?php echo e(getImage('assets/images/frontend/program_duration/' . @$programContent->data_values->icon)); ?>"
                            alt="icon">
                        <?php echo e($programElement->lang('title')); ?>

                    </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    </div>
</section>


<?php $__env->startPush('style'); ?>
    <style>
        .acquired-title h2 {
            font-weight: 700;
            font-size: 35px;
            line-height: 42px;
        }

        .acq-list ul {
            padding: 0;
            margin: 0;
        }
        
        .acq-list ul li {
            list-style: none;
            position: relative;
            padding: 10px 0;
            padding-left: 35px;
            font-weight: 600;
            font-size: 22px;
            line-height: 32px;
            color: #555555;
            max-width: 790px;
        }

        .acq-list ul li img {
            position: absolute;
            left: 0;
            top: 18px;
            width: 18px;
        }
    </style>
<?php $__env->stopPush(); ?>
<?php /**PATH /home/amlaek/public_html/resources/views/sections/program_duration.blade.php ENDPATH**/ ?>
<?php
    $traningTrackContent = getContent('training_tracks.content', true);
    $traningTrackElements = getContent('training_tracks.element', null, false, true);
?>



<!--    TRANING SECTION-->
<section class="traning-section py-5">
    <div class="container">
        <div class="section-title text-center">
            <h2 class="after-line-white text-white text-capitalize"> <?php echo e($traningTrackContent->lang('header')); ?> </h2>
            <P class="text-white lead mt-3"> <?php echo e($traningTrackContent->lang('sub_header')); ?> </P>
        </div>

        <div class="row mt-5">
            <?php $__currentLoopData = $traningTrackElements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $traningTrackElement): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-12 col-sm-6 col-md-4 col-lg-3 pb-4">
                    <div class="traning-box">
                        <img src="<?php echo e(getImage('assets/images/frontend/training_tracks/' . @$traningTrackElement->data_values->image)); ?>"
                            alt="Traning image">
                        <div class="traning-text p-2">

                            <a href="javascript:void(0)">
                                <?php echo e($traningTrackElement->lang('title')); ?>

                            </a>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        </div>
    </div>
</section>
<!--    TRANING SECTION END-->

<?php $__env->startPush('style'); ?>
    <style>
        .traning-section {
            background: #353535;
        }

        .traning-box {
            background: #515050;
            border-radius: 10px;
            overflow: hidden;
            height: 100%;
        }

        .traning-box .traning-text span {
            font-weight: 400;
            font-size: 12px;
            line-height: 16px;
            color: #ffffff;
        }

        .traning-box .traning-text a {
            font-weight: 700;
            font-size: 18px;
            text-decoration: none;
            line-height: 27px;
            color: #ffffff;
            margin: 0;
            padding-top: 10px;
            display: block;
            text-align: center;
        }

        .traning-box img {
            width: 100%;
        }

        .after-line-white::after {
            content: "";
            height: 2px;
            width: 80px;
            background: #ffffff;
            display: block;
            margin: 0 auto;
            margin-top: 15px;
        }
    </style>
<?php $__env->stopPush(); ?>
<?php /**PATH /home/amlaek/public_html/resources/views/sections/training_tracks.blade.php ENDPATH**/ ?>
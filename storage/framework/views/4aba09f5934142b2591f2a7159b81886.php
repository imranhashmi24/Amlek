<?php
    $submissionContent = getContent('submission_criteria.content', true);
    $submissionElements = getContent('submission_criteria.element', null, false, true);
?>

<!--    Submission SECTION-->
<section class="submission-section py-5">
    <div class="container">
        <div class="section-title text-center">
            <h2 class="after-line text-capitalize"> <?php echo e($submissionContent->lang('heading')); ?> </h2>
        </div>

        <div class="row mt-5">
            <div class="col-12 col-md-6">
                <div class="submission-image">
                    <img src="<?php echo e(getImage('assets/images/frontend/submission_criteria/' . @$submissionContent->data_values->image)); ?>"
                        alt="image">
                </div>
            </div>
            <div class="col-12 col-md-6 mt-3 mt-md-0">
                <div class="submission-text">
                    <div class="acq-list">
                        <ul class="">
                            <?php $__currentLoopData = $submissionElements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $submissionElement): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li>
                                    <img src="<?php echo e(getImage('assets/images/frontend/submission_criteria/' . @$submissionContent->data_values->icon)); ?>"
                                        alt="icon">
                                    <?php echo e($submissionElement->lang('title')); ?>

                                </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>

                    <a href="<?php echo e(@$submissionContent->data_values->button_link); ?>" target="_blank">
                        <?php echo e($submissionContent->lang('button')); ?> </a>
                </div>
            </div>
        </div>
    </div>
</section>
<!--    Submission SECTION END-->

<?php $__env->startPush('style'); ?>
    <style>
        .submission-image img {
            width: 100%;
        }

        .submission-text a {
            font-weight: 600;
            font-size: 24px;
            line-height: 35px;
            background: #00A550;
            color: #ffffff;
            padding: 10px 25px;
            text-decoration: none;
            border-radius: 2px;
            margin-top: 30px;
            display: inline-block;
        }
    </style>
<?php $__env->stopPush(); ?>
<?php /**PATH /home/asoug/amlaek.asoug.com/resources/views/sections/submission_criteria.blade.php ENDPATH**/ ?>
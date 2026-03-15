<?php
    $rehabilitationContent = getContent('rehabilitation_empowerment.content', true);
?>

<section class="py-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-12 col-md-6">
                <div class="rehabilitation-image">
                    <img src="<?php echo e(getImage('assets/images/frontend/rehabilitation_empowerment/' . @$rehabilitationContent->data_values->image)); ?>"
                        alt="image">
                </div>
            </div>
            <div class="col-12 col-md-6 mt-4 mt-md-0">
                <div class="rehabilitation-text">
                    <p>
                        <?php echo e($rehabilitationContent->lang('description')); ?>

                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<?php $__env->startPush('style'); ?>
    <style>
        .rehabilitation-text p {
            line-height: 28px;
        }
        .rehabilitation-image img{
            width: 100%;
        }
    </style>
<?php $__env->stopPush(); ?>
<?php /**PATH /home/asoug/amlaek.asoug.com/resources/views/sections/rehabilitation_empowerment.blade.php ENDPATH**/ ?>
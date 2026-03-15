<?php $__env->startSection('content'); ?>

    <!--    BLOG SECTION-->
    <section class="py-5">
        <div class="container">
            <div class="mt-5 row">
                <?php $__currentLoopData = $blogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $blog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="pb-4 col-12 col-sm-6 col-md-4 col-lg-3">
                        <div class="blog-box h-100">
                            <div class="blog-img">
                                <img src="<?php echo e(getImage(getFilePath('blog') . '/' . $blog->image)); ?>" alt="Blog Image">
                            </div>

                            <div class="p-3">
                                <h6> <?php echo e($blog->lang('title')); ?> </h6>
                                <p>
                                    <?php echo e(strLimit(strip_tags($blog->lang('description')), 100)); ?>

                                </p>

                                <a href="<?php echo e(route('blog.details', $blog->slug)); ?>"><?php echo e(__('Read More')); ?> <i
                                        class="bi bi-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>

            <?php if($blogs->hasPages()): ?>
                <div class="py-5 pagination-card-footer">
                    <?php echo e(paginateLinks($blogs)); ?>

                </div>
            <?php endif; ?>
        </div>
    </section>
    <!--    BLOG SECTION END-->



    <?php if(@$sections->secs != null): ?>
        <?php $__currentLoopData = json_decode($sections->secs); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sec): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php echo $__env->make('sections.' . $sec, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('web.layouts.frontend', ['title' => 'Blogs'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/amlaek/public_html/resources/views/web/blogs.blade.php ENDPATH**/ ?>
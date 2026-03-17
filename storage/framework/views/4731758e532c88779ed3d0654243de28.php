<?php
    $blogContent = getContent('blog.content', true);
    $blogs = App\Models\Blog::active()->limit(4)->get();
?>


<!--    BLOG SECTION-->
<section class="py-5 blog-section">
    <div class="container">
        <div class="text-center section-title">
            <h2> <?php echo e(@$blogContent->data_values->title); ?> </h2>
            <p> <?php echo e(@$blogContent->data_values->sub_title); ?> </p>
        </div>
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
    </div>
</section>
<!--    BLOG SECTION END-->
<?php /**PATH D:\soudi-project\Amlek\resources\views/sections/blog.blade.php ENDPATH**/ ?>
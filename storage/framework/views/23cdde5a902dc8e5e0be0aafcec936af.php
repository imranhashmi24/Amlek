<?php $__env->startSection('content'); ?>
    <section class="blog-section" style="background: none;">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-8">
                    <div class="py-5 blog-left">
                        <div class="mb-2 blog-image">
                            <img src="<?php echo e(getImage(getFilePath('blog') . '/' . $blog->image)); ?>" alt="Blog Photo">
                        </div>
                        <span class="blog-date"><i class="bi bi-clock pe-1"></i>
                            <?php echo e(showDateTime($blog->created_at, 'd M Y')); ?></span>
                        <h4 class="blog-details-head">
                            <?php echo e($blog->lang('title')); ?>

                        </h4>

                        <div class="py-3 blog-ditails">
                            <?php echo $blog->lang('description') ?>
                        </div>

                        <div class="mt-5 social-icon social-icon-2">
                            <span><?php echo e(__('Share')); ?> :</span>
                            <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo e(urlencode(url()->current())); ?>"><i
                                    class="fab fa-facebook-f"></i></a>
                            <a
                                href="https://twitter.com/intent/tweet?text=my share text&amp;url=<?php echo e(urlencode(url()->current())); ?>">
                                <i class="fab fa-twitter"></i></a>
                            <a
                                href="http://www.linkedin.com/shareArticle?mini=true&amp;url=<?php echo e(urlencode(url()->current())); ?>&amp;title=my share text&amp;summary=dit is de linkedin summary">
                                <i class="fab fa-linkedin-in"></i></a>

                            <a target="_blank"
                                href="https://www.instagram.com/sharer.php?u=<?php echo e(urlencode(url()->current())); ?>">
                                <i class="fab fa-instagram"></i>
                            </a>

                        </div>

                    </div>
                </div>
                <div class="col-12 col-lg-4">
                    <div class="my-5 blog-right sticky-blog-right">
                        <div class="blog-sidbar-post">
                            <h3 class="border-bottom"><?php echo e(__('Recent Post')); ?></h3>
                            <?php $__currentLoopData = $recentPosts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $recentPos): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="py-2 sidbar-blog-box d-flex">
                                    <img src="<?php echo e(getImage(getFilePath('blog') . '/' . $recentPos->image)); ?>"
                                        alt="Blog Photo">
                                    <div class="content">
                                        <a href="<?php echo e(route('blog.details', $recentPos->slug)); ?>">
                                            <?php echo e(strLimit($blog->lang('title'), 50)); ?>

                                        </a>
                                        <p>
                                            <span><?php echo e(diffForHumans($blog->created_at)); ?></span>
                                        </p>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>

                        <div class="mt-4 blog-sidbar-post">
                            <h3 class="border-bottom"><?php echo e(__('Popular Post')); ?></h3>
                            <?php $__currentLoopData = $popularPosts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $popularPost): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="py-2 sidbar-blog-box d-flex">
                                    <img src="<?php echo e(getImage(getFilePath('blog') . '/' . $popularPost->image)); ?>"
                                        alt="Blog Photo">
                                    <div class="content">
                                        <a href="<?php echo e(route('blog.details', $popularPost->slug)); ?>">
                                            <?php echo e(strLimit($popularPost->title, 50)); ?>

                                        </a>
                                        <p>
                                            <span><?php echo e(diffForHumans($popularPost->created_at)); ?></span>
                                        </p>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('web.layouts.frontend', ['title' => 'Blog Details'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/amlaek/public_html/resources/views/web/blog_details.blade.php ENDPATH**/ ?>
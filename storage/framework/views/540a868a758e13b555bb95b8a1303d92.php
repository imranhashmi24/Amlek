<?php $__env->startSection('content'); ?>
<section class="blog-section" style="background: none;">
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-8">
                <div class="py-5 mt-3 blog-left">
                    <div class="mb-2">
                        <img src="<?php echo e(getImage(getFilePath('event_news') . '/' . $event->image)); ?>" alt="Event Photo"  style="width:100% !important; height: 400px !important; border-radius:40px !important">
                    </div>
                    <span class="blog-date"><i class="bi bi-clock pe-1"></i>
                        <?php echo e(showDateTime($event->created_at, 'd M Y')); ?></span>
                    <h4 class="blog-details-head">
                        <?php echo e($event->lang('title')); ?>

                    </h4>

                    <div class="py-3 blog-ditails">
                        <?php echo $event->lang('description') ?>
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
                        <h3 class="border-bottom"><?php echo e(__('Recent event news')); ?></h3>
                        <?php $__currentLoopData = $recentPosts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $recentPos): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="py-2 sidbar-blog-box d-flex">
                            <img src="<?php echo e(getImage(getFilePath('event_news') . '/' . $recentPos->image)); ?>" alt="Event Photo"  style="width:70px !important; height: 50px !important">
                            <div class="content">
                                <a href="<?php echo e(route('event.news.details', $recentPos->slug)); ?>">
                                    <?php echo e(strLimit($recentPos->lang('title'), 50)); ?>

                                </a>
                                <p>
                                    <span><?php echo e(diffForHumans($recentPos->created_at)); ?></span>
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

<?php echo $__env->make('web.layouts.frontend', ['title' => 'News Details'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/asoug/amlaek.asoug.com/resources/views/web/pages/event_news_details.blade.php ENDPATH**/ ?>
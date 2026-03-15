<?php
    $socialMediaElements = getContent('social_media.element', null, false, true);
    $footerContents = getContent('footer.content', true);
    $pages = App\Models\Page::where('is_default', Status::NO)->get();

    $policyPages = getContent('policy_pages.element', false, null, true);
    $propertyTypes = App\Models\PropertyType::get();

?>
<footer class="py-5 footer-part">
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-3">
                <div class="footer-left">
                    <div class="footer-logo">
                        <a href="<?php echo e(route('home')); ?>">
                            <img src="<?php echo e(siteLogo('dark')); ?>" alt="logo">
                        </a>
                    </div>
                    <p class="pt-4 text-white small-text">
                        <?php echo e(@$footerContents->lang('address')); ?>

                    </p>
                    <p> <i class="mx-2 fa fa-phone"></i>
                        <a
                            href="tel:<?php echo e(@$footerContents->data_values->mobile); ?>"><?php echo e(@$footerContents->data_values->mobile); ?></a>
                    </p>
                    <p> <i class="mx-2 fa fa-envelope"></i>
                        <a href="mailto:<?php echo e(@$footerContents->data_values->email); ?>">
                            <?php echo e(@$footerContents->data_values->email); ?>

                        </a>
                    </p>
                    <div class="mb-3 social-media-link">
                        <div class="my-3 footer-title">
                            <h6 class="pb-2 text-white"> <?php echo app('translator')->get('Social Connect'); ?></h6>
                        </div>
                        <ul class="d-flex">
                            <?php $__currentLoopData = $socialMediaElements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $socialMediaElement): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li class="mx-2">
                                    <a href="<?php echo e(@$socialMediaElement->data_values->link); ?>" target="_blank">
                                        <?php echo @$socialMediaElement->data_values->icon ?>
                                    </a>
                                </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-6">
                <div class="footer-title">
                    <h5 class="pb-3 text-white"> <?php echo app('translator')->get('Sectors'); ?> </h5>
                </div>
                <div class="footer-link">
                    <ul>
                        <div class="row">
                            <?php $__currentLoopData = $propertyTypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $propertyType): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="pb-2 col-6">
                                    <li>
                                        <a href="<?php echo e(route('property', ['tab' => 'list','property_type' => $propertyType->id])); ?>">
                                            <?php echo e($propertyType->lang('name')); ?> </a>
                                    </li>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <div class="pb-2 col-6">
                                <li>
                                    <a href="<?php echo e(route('rehabilitation.empowerment')); ?>">
                                        <?php echo app('translator')->get('Rehabilitation Empowerment'); ?> </a>
                                </li>
                            </div>
                        </div>
                    </ul>
                </div>
            </div>
            <div class="col-12 col-lg-3">
                <div class="footer-title">
                    <h5 class="pb-3 text-white"> <?php echo app('translator')->get('Important Link'); ?> </h5>
                </div>
                <div class="footer-link">
                    <ul>
                        <li>
                            <a href="<?php echo e(route('home')); ?>"> <?php echo app('translator')->get('Homepage'); ?></a>
                        </li>
                        <?php $__currentLoopData = $pages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li>
                                <a href="<?php echo e(route('pages', [$page->slug])); ?>">
                                    <?php echo e(__($page->name)); ?> </a>
                            </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <li>
                            <a href="<?php echo e(route('property')); ?>"><?php echo app('translator')->get('Search for properties'); ?></a>
                        </li>
                        <li>
                            <a href="<?php echo e(route('property-request')); ?>"><?php echo app('translator')->get('Request Property'); ?></a>
                        </li>
                        <li>
                            <a href="<?php echo e(route('user.properties.create')); ?>"><?php echo app('translator')->get('Add Property'); ?></a>
                        </li>

                        <?php $__currentLoopData = $policyPages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $policyPage): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li>
                                <a
                                    href="<?php echo e(route('policy.pages', [slug($policyPage->data_values->title), $policyPage->id])); ?>">
                                    <?php echo e(__($policyPage->data_values->title)); ?> </a>
                            </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </ul>
                </div>
                <div class="my-3 footer-title">
                    <h6 class="pb-2 text-white"> <?php echo app('translator')->get('Subscribe'); ?></h6>
                </div>
                <form action="" class="subscribe-form" method="post">
                    <?php echo csrf_field(); ?>
                    <div class="input-group">
                        <input type="text" name="email" class="form-control email-input"
                            placeholder="<?php echo app('translator')->get('Enter your email'); ?>">
                        <button class="input-group-text" type="submit"> <i class="fa fa-paper-plane"></i> </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</footer>

<section class="py-3 copyright-part">
    <div class="container">
        <div class="text-center">
            <p><?php echo app('translator')->get('Copyright'); ?> &copy; <?php echo e(date('Y')); ?>. <?php echo app('translator')->get('All Rights Reserved'); ?>
            </p>
        </div>
    </div>
</section>


<?php $__env->startPush('script'); ?>
    <script>
        $(document).on('submit', '.subscribe-form', function(e) {
            e.preventDefault();
            var email = $('.email-input').val();
            if (!email) {
                notify('error', 'Email field is required');
            } else {
                $.ajax({
                    headers: {
                        "X-CSRF-TOKEN": "<?php echo e(csrf_token()); ?>",
                    },
                    url: "<?php echo e(route('subscribe')); ?>",
                    method: "POST",
                    data: {
                        email: email
                    },
                    success: function(response) {
                        if (response.success) {
                            $('input[name="email"]').val('');
                            notify('success', response.message);
                        } else {
                            notify('error', response.error);
                        }

                    }
                });
            }
        });
    </script>
<?php $__env->stopPush(); ?>
<?php /**PATH E:\Alsari Office\Amlek\resources\views/web/partials/footer.blade.php ENDPATH**/ ?>
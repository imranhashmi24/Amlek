<?php $__env->startSection('content'); ?>
<section class="py-5">
    <div class="container">
         <?php echo $__env->make('web.pages.includes.__auction_nav_detail', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <hr>
        <div class="row">
            <?php if($auction->properties): ?>
                <?php $__empty_1 = true; $__currentLoopData = $auction->properties; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <div class="my-3 col-12 col-md-12 col-lg-12">
                    <div class="property-card">
                        <div class="mb-4 card-title d-flex justify-content-start">
                            <div class="toggle-box toggle-box-<?php echo e($item->id); ?>" data-bs-toggle="collapse" href="#multiCollapseExample_<?php echo e($item->id); ?>" role="button" aria-expanded="false" aria-controls="multiCollapseExample_<?php echo e($item->id); ?>">
                                <i class="fas fa-angle-down"></i>
                            </div>
                            <div class="toggle-title">
                                <h3>
                                <?php if(app()->getLocale() == 'en'): ?>
                                    <?php echo e(optional($item->property)->title); ?>

                                <?php else: ?>
                                    <?php echo e(optional($item->property)->title_ar); ?>

                                <?php endif; ?>
                                </h3>
                            </div>
                        </div>
                        <div class="my-4 div-content collapse" id="multiCollapseExample_<?php echo e($item->id); ?>">
                            <div class="row">
                                <div class="col-12 col-md-6 col-lg-6">
                                    <div class="div-card">
                                        <img src="<?php echo e(getImage(getFilePath('property_thumb') . '/' . $item->property->thumb_image, getFileSize('property_thumb'))); ?>" alt="">
                                        <div class="mt-3 content-div">
                                            <div class="content-div-header d-flex justify-content-between">
                                                <div><?php echo app('translator')->get('City'); ?>:
                                                    <?php if(app()->getLocale() == 'en'): ?>
                                                        <?php echo e(optional($item->property->city)->name); ?>

                                                    <?php else: ?>
                                                        <?php echo e(optional($item->property->city)->name_ar); ?>

                                                    <?php endif; ?>
                                                </div>
                                                <div><?php echo app('translator')->get('The viewer'); ?>:
                                                    <?php if(app()->getLocale() == 'en'): ?>
                                                        <?php echo e(optional($item->property->city)->name); ?>

                                                    <?php else: ?>
                                                        <?php echo e(optional($item->property->city)->name_ar); ?>

                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                            <div class="my-2">
                                                <div class="py-2 d-flex justify-content-between">
                                                    <div>
                                                        <?php echo app('translator')->get('Instrument Number'); ?>
                                                    </div>
                                                    <div>
                                                        : <?php echo e($item->property->id); ?>

                                                    </div>
                                                </div>
                                                <div class="py-2 d-flex justify-content-between">
                                                    <div>
                                                        <?php echo app('translator')->get('Instrument Date'); ?>
                                                    </div>
                                                    <div>
                                                        : <?php echo e(showDateTime($item->property->created_at, 'd-m-Y')); ?>

                                                    </div>
                                                </div>
                                                <div class="py-2 d-flex justify-content-between">
                                                    <div>
                                                        <?php echo app('translator')->get('Product Type'); ?>
                                                    </div>
                                                    <div>
                                                        : <?php echo app('translator')->get(optional($item->property)->purpose); ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 col-lg-6">
                                    <div class="div-card">
                                        <div class="content-div">
                                            <div>
                                                <b><?php echo app('translator')->get('The description'); ?></b>
                                            </div>
                                            <div>
                                                <?php if(app()->getLocale() == 'en'): ?>
                                                    <?php echo optional($item->property)->description; ?>

                                                <?php else: ?>
                                                    <?php echo optional($item->property)->description_ar; ?>

                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="my-3 div-card">
                                        <div class="content-div">
                                            <div class="content-div-header d-flex justify-content-between">
                                                <div><?php echo app('translator')->get('Limit & Length'); ?></div>
                                                <div data-bs-toggle="collapse" class="item1_<?php echo e($item->id); ?>" href="#item1_<?php echo e($item->id); ?>" role="button" aria-expanded="false" aria-controls="item1_<?php echo e($item->id); ?>"><i class="fas fa-angle-down"></i></div>
                                            </div>
                                            <div class="my-2" id="item1_<?php echo e($item->id); ?>">
                                                <div class="py-2 d-flex justify-content-between">
                                                    <div>
                                                        <?php if(app()->getLocale() == 'en'): ?>
                                                            <?php echo e(optional($item->property->country)->name); ?>

                                                        <?php else: ?>
                                                            <?php echo e(optional($item->property->country)->name_ar); ?>

                                                        <?php endif; ?>
                                                    </div>
                                                    <div>
                                                        <?php if(app()->getLocale() == 'en'): ?>
                                                            <?php echo e(optional($item->property->city)->name); ?>

                                                        <?php else: ?>
                                                            <?php echo e(optional($item->property->city)->name_ar); ?>

                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="my-3 div-card">
                                        <div class="content-div">
                                            <div class="content-div-header d-flex justify-content-between">
                                                <div><?php echo app('translator')->get('Land Information'); ?></div>
                                                <div data-bs-toggle="collapse" class="item2_<?php echo e($item->id); ?>" href="#item2_<?php echo e($item->id); ?>" role="button" aria-expanded="false" aria-controls="item2_<?php echo e($item->id); ?>"><i class="fas fa-angle-down"></i></div>
                                            </div>
                                            <div class="my-2" id="item2_<?php echo e($item->id); ?>">
                                                <?php $__currentLoopData = $item->property->details; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $detail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <div class="py-2 d-flex justify-content-between">
                                                        <div>
                                                            <?php echo app('translator')->get(keyToTitle($detail->field)); ?>
                                                        </div>
                                                        <div>
                                                            <?php echo e($detail->val); ?>

                                                        </div>
                                                    </div>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="my-3 div-card">
                                        <div class="content-div">
                                            <div class="content-div-header d-flex justify-content-between">
                                                <div><?php echo app('translator')->get('Public Service'); ?></div>
                                                <div data-bs-toggle="collapse" class="item3_<?php echo e($item->id); ?>" href="#item3_<?php echo e($item->id); ?>" role="button" aria-expanded="false" aria-controls="item3_<?php echo e($item->id); ?>"><i class="fas fa-angle-down"></i></div>
                                            </div>
                                            <div class="my-2" id="item3_<?php echo e($item->id); ?>">
                                                <div class="py-2 d-flex justify-content-between">
                                                    <div>
                                                        <?php echo app('translator')->get('Public network'); ?>
                                                    </div>
                                                    <div>
                                                        <?php echo app('translator')->get('Water'); ?>
                                                    </div>
                                                </div>
                                                <div class="py-2 d-flex justify-content-between">
                                                    <div>
                                                        <?php echo app('translator')->get('General electricity'); ?>
                                                    </div>
                                                    <div>
                                                        <?php echo app('translator')->get('Ele'); ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="my-3 div-card">
                                        <div class="content-div">
                                            <div class="content-div-header d-flex justify-content-between">
                                                <div><?php echo app('translator')->get('Type of ownership rights'); ?></div>
                                                <div data-bs-toggle="collapse" class="item4_<?php echo e($item->id); ?>" href="#item4_<?php echo e($item->id); ?>" role="button" aria-expanded="false" aria-controls="item4_<?php echo e($item->id); ?>"><i class="fas fa-angle-down"></i></div>
                                            </div>
                                            <div class="my-2" id="item4_<?php echo e($item->id); ?>">
                                                <div class="py-2 d-flex justify-content-between">
                                                    <div>
                                                        <?php echo app('translator')->get('Rights Over Property'); ?>
                                                    </div>
                                                    <div>
                                                        : <?php echo e(optional($item->property->user)->name ?? __('Free')); ?>

                                                    </div>
                                                </div>
                                                <div class="py-2 d-flex justify-content-between">
                                                    <div>
                                                        <?php echo app('translator')->get('Property type'); ?>
                                                    </div>
                                                    <div>
                                                        : <?php echo e(app()->getLocale() == 'en' ?  optional($item->property->propertyType)->name : optional($item->property->propertyType)->name_ar); ?>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="time-card d-flex justify-content-start">
                            <div class="mx-4 my-4 time-count w-100" id="countdown_<?php echo e($item->id); ?>" style="background: transparent">
                                <div class="overly-content">
                                    <p class="day">00</p>
                                    <p><?php echo app('translator')->get('Days'); ?></p>
                                </div>
                                <div class="overly-content">
                                    <p class="hour">00</p>
                                    <p><?php echo app('translator')->get('Hours'); ?></p>
                                </div>
                                <div class="overly-content">
                                    <p class="minutes">00</p>
                                    <p><?php echo app('translator')->get('Minutes'); ?></p>
                                </div>
                                <div class="overly-content">
                                    <p class="seconds">00</p>
                                    <p><?php echo app('translator')->get('Seconds'); ?></p>
                                </div>

                                <script>
                                    var countDownDate_<?php echo e($item->id); ?> = new Date("<?php echo e($auction->beginning_time); ?>").getTime();
                                    var x_<?php echo e($item->id); ?> = setInterval(function() {
                                        var now = new Date().getTime();
                                        var distance = countDownDate_<?php echo e($item->id); ?> - now;
                                        var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                                        var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                                        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                                        var seconds = Math.floor((distance % (1000 * 60)) / 1000);

                                        document.getElementById("countdown_<?php echo e($item->id); ?>").innerHTML =
                                            "<div class='overly-content'><p class='day'>" + days + "</p><p><?php echo app('translator')->get('Days'); ?></p></div>" +
                                            "<div class='overly-content'><p class='hour'>" + hours + "</p><p><?php echo app('translator')->get('Hours'); ?></p></div>" +
                                            "<div class='overly-content'><p class='minutes'>" + minutes + "</p><p><?php echo app('translator')->get('Minutes'); ?></p></div>" +
                                            "<div class='overly-content'><p class='seconds'>" + seconds + "</p><p><?php echo app('translator')->get('Seconds'); ?></p></div>";

                                        if (distance < 0) {
                                            clearInterval(x_<?php echo e($item->id); ?>);
                                            document.getElementById("countdown_<?php echo e($item->id); ?>").innerHTML = "<?php echo e(__('EXPIRED')); ?>";
                                        }
                                    }, 1000);
                                </script>
                            </div>
                            <div class="bid w-100">
                                <div><?php echo app('translator')->get('Highest Bid'); ?></div>
                                <div><?php echo app('translator')->get('SAR'); ?>
                                    <?php if(!empty($item->property->biddings)): ?>
                                        <?php echo e($item->property->biddings->max('amount') ?? __('N\A')); ?>

                                    <?php else: ?>
                                     <?php echo e(__('N\A')); ?>

                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="bid w-100">
                                <div><?php echo app('translator')->get('Entry Amount'); ?></div>
                                <div><?php echo app('translator')->get('SAR'); ?> <?php echo e($item->property->price); ?></div>
                            </div>
                            <div class="bid w-100">
                                <div class="react"  data-type="item" data-item="<?php echo e($item->id); ?>">
                                    <i class="fa fa-heart <?php echo e(findMyFvt('item', $item->id) ? 'text-danger' : ''); ?>"></i>
                                    <span><?php echo e(getFvtCount('item', $item->id)); ?></span>
                                </div>
                            </div>
                            <div class="bid w-100">
                                <a href="<?php echo e(url(route('bidding.request.page', [
                                    'auction' => urlencode($auction->id),
                                    'property' => urlencode($item->property->id)
                                ]))); ?>" class="bidding-btn"><?php echo app('translator')->get('Bidding Board'); ?></a>

                            </div>
                        </div>
                    </div>
                </div>

                <script>
                    document.addEventListener('DOMContentLoaded', function () {
                        const toggleBox = document.querySelector('.toggle-box-<?php echo e($item->id); ?>');
                        const icon = toggleBox.querySelector('i');

                        toggleBox.addEventListener('click', function () {
                            if (icon.classList.contains('fa-angle-up')) {
                                icon.classList.remove('fa-angle-up');
                                icon.classList.add('fa-angle-down');
                            } else {
                                icon.classList.remove('fa-angle-down');
                                icon.classList.add('fa-angle-up');
                            }
                        });
                    });

                    document.addEventListener('DOMContentLoaded', function () {
                        const items = document.querySelectorAll('[class^="item"]');
                        items.forEach(function (item) {
                            const icon = item.querySelector('i');

                            item.addEventListener('click', function () {
                                if (icon.classList.contains('fa-angle-up')) {
                                    icon.classList.remove('fa-angle-up');
                                    icon.classList.add('fa-angle-down');
                                } else {
                                    icon.classList.remove('fa-angle-down');
                                    icon.classList.add('fa-angle-up');
                                }
                            });
                        });
                    });

                </script>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

                <?php endif; ?>
            <?php endif; ?>
        </div>
    </div>
</section>

<?php if(@$sections->secs != null): ?>
    <?php $__currentLoopData = json_decode($sections->secs); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sec): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <?php echo $__env->make('sections.' . $sec, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('web.pages.includes.__auction_common_js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php echo $__env->make('web.component.__js_fvt_react', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php echo $__env->make('web.layouts.frontend', ['title' => $title], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\soudi-project\Amlek\resources\views/web/pages/auction_details_item.blade.php ENDPATH**/ ?>
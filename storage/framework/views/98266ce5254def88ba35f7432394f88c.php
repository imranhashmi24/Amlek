<?php
    $eventBannerContent = getContent('event_banner.content', true);
?>


<?php $__env->startSection('content'); ?>

<section class="py-5 pages-banner" style="background-image: url(<?php echo e(getImage('assets/images/frontend/event_banner/' . @$eventBannerContent->data_values->image, '1900x250')); ?>);
    height: 300px; background-size: cover;">
    <div class="container">
        <div class="row">
            <div class="py-5 col-12">
                <h1><?php echo e(@$eventBannerContent->lang('title')); ?></h1>
                <hr class="primary-color theme-hr">
                <p class="w-s-100"><?php echo @$eventBannerContent->lang('description'); ?></p>
                <!--<a href="" class="view-btn">-->
                <!--    <?php echo app('translator')->get('Get Started'); ?>-->
                <!--</a>-->
            </div>
        </div>
    </div>
</section>


<section class="py-5 property property-bg-color">
    <div class="container">
        <div class="row">
            <?php $__currentLoopData = $currents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $current_event): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="my-3 col-12 col-md-4 col-lg-4">
                <div class="event-card">
                    <div class="card-img">
                        <img src="<?php echo e(getImage(getFilePath('events') . '/' . $current_event->image, getFileSize('events'))); ?>"
                            alt="">
                    </div>
                    <div class="px-3 pt-4">
                        <div class="event-content">
                            <h3>
                                <a href="<?php echo e(route('event.details', $current_event->slug)); ?>">
                                    <?php echo e(app()->getLocale() == 'en' ? $current_event->title : $current_event->title_ar); ?>

                                </a>
                            </h3>
                            <p>
                                <?php echo e(app()->getLocale() == 'en' ? $current_event->city?->name :
                                $current_event->city?->name_ar); ?>,
                                <?php echo e(app()->getLocale() == 'en' ? $current_event->country?->name :
                                $current_event->country?->name_ar); ?>

                            </p>
                        </div>
                        <div class="event-footer d-flex justify-content-between">
                            <p> <?php echo e(showDateTime($current_event->end_time, 'F j, Y')); ?></p>
                            <p class="fvt" data-item="<?php echo e($current_event->id); ?>" data-type="event-news"><i class="fa fa-star <?php echo e(findMyFvt('event-news', $current_event->id) ? 'text-danger' : ''); ?>"></i></p>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</section>

<section class="py-3 property property-bg-color">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3><?php echo app('translator')->get('Find Your Desire'); ?></h3>
            </div>
        </div>

        <form id="filterForm">
            <div class="py-3 row">
                <div class="my-3 col-6 col-md-3 col-lg-3">
                    <div class="form-group">
                        <select name="category" id="category" class="custom-control">
                            <option value="0"><?php echo app('translator')->get('Category'); ?></option>
                            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($category->title); ?>"><?php echo e(app()->getLocale() == 'en' ? $category->title :
                                $category->title_ar); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                </div>
                <div class="my-3 col-6 col-md-3 col-lg-3">
                    <div class="form-group">
                        <select name="type" id="type" class="custom-control">
                            <option value="0"><?php echo app('translator')->get('Type'); ?></option>
                            <?php $__currentLoopData = $eventTypeElements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $eventTypeElement): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($eventTypeElement->data_values->title); ?>"><?php echo e(app()->getLocale() == 'en' ?
                                $eventTypeElement->data_values->title : $eventTypeElement->data_values->title_ar); ?>

                            </option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                </div>
                <div class="my-3 col-6 col-md-3 col-lg-3">
                    <div class="form-group">
                        <select name="audience_type" id="audience_type" class="custom-control">
                            <option value="0"><?php echo app('translator')->get('Audience Type'); ?></option>
                            <?php $__currentLoopData = $audienceTypeElements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $eventTypeElement): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($eventTypeElement->data_values->title); ?>"><?php echo e(app()->getLocale() == 'en' ?
                                $eventTypeElement->data_values->title : $eventTypeElement->data_values->title_ar); ?>

                            </option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                </div>
                <div class="my-3 col-6 col-md-3 col-lg-3">
                    <div class="form-group">
                        <select name="sector" id="sector" class="custom-control">
                            <option value="0"><?php echo app('translator')->get('Sector'); ?></option>
                            <?php $__currentLoopData = $eventSectorElements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $eventTypeElement): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($eventTypeElement->data_values->title); ?>"><?php echo e(app()->getLocale() == 'en' ?
                                $eventTypeElement->data_values->title : $eventTypeElement->data_values->title_ar); ?>

                            </option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>


<section class="py-5 property property-bg-color">
    <div class="container">
        <div class="row" id="showResult">
            <?php if($events): ?>
                <?php $__currentLoopData = $events->skip(3); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $event): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="my-2 col-12 col-md-6 col-lg-6">
                    <div class="p-4 event-card-2 d-flex justify-content-between">
                        <div class="img">
                            <img src="<?php echo e(getImage(getFilePath('events') . '/' . $event->image, getFileSize('events'))); ?>"
                                alt="">
                        </div>
                        <div class="px-4 event-card-2-content">
                            <h3> <a href="<?php echo e(route('event.details', $current_event->slug)); ?>">
                                <?php echo e(app()->getLocale() == 'en' ? $event->title : $event->title_ar); ?>

                            </a></h3>
                            <p><?php echo app('translator')->get('SD'); ?> <?php echo e(showDateTime($event->start_time, 'd-m-Y')); ?> - <?php echo app('translator')->get('ED'); ?> <?php echo e(showDateTime($event->end_time, 'd-m-Y')); ?></p>

                            <div class="event-time" id="countdown_<?php echo e($event->id); ?>">
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
                            </div>

                            <script>
                                var countDownDate_<?php echo e($event->id); ?> = new Date("<?php echo e($event->end_time); ?>").getTime();
                                var x_<?php echo e($event->id); ?> = setInterval(function() {
                                    var now = new Date().getTime();
                                    var distance = countDownDate_<?php echo e($event->id); ?> - now;
                                    var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                                    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                                    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                                    var seconds = Math.floor((distance % (1000 * 60)) / 1000);

                                    document.getElementById("countdown_<?php echo e($event->id); ?>").innerHTML =
                                        "<div class='overly-content'><p class='day'>" + days + "</p><p><?php echo app('translator')->get('Days'); ?></p></div>" +
                                        "<div class='overly-content'><p class='hour'>" + hours + "</p><p><?php echo app('translator')->get('Hours'); ?></p></div>" +
                                        "<div class='overly-content'><p class='minutes'>" + minutes + "</p><p><?php echo app('translator')->get('Minutes'); ?></p></div>";

                                    if (distance < 0) {
                                        clearInterval(x_<?php echo e($event->id); ?>);
                                        document.getElementById("countdown_<?php echo e($event->id); ?>").innerHTML = '<p class="expired"><?php echo e(__("EXPIRED")); ?></p>';
                                    }
                                }, 1000);
                            </script>

                        </div>
                    </div>
                </div>
             
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
        </div>
        <?php if($events->hasPages()): ?>
        <div class="row">
            <div class="my-3 col-md-12">
                <?php echo e($events->links()); ?>

            </div>
        </div>
        <?php endif; ?>
    </div>
</section>


<section class="py-3 property property-bg-color">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="d-flex justify-content-between">
                    <h3><?php echo app('translator')->get('Event News'); ?></h3>
                    <a href="<?php echo e(route('eventNews')); ?>"><?php echo app('translator')->get('See more'); ?></a>
                </div>
                <hr>
            </div>
        </div>
        
        <div class="py-3 row">
            <?php $__currentLoopData = $event_news; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $news): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="my-3 col-md-3">
                <div class="news-card">
                    <div class="news-img">
                        <img src="<?php echo e(getImage(getFilePath('event_news') . '/' . $news->image, getFileSize('event_news'))); ?>" alt="">
                    </div>
                    <div class="py-4 news-content">
                        <h3><?php echo e(app()->getLocale() == 'en' ? $news->title : $news->title_ar); ?></h3>
                        <p>
                            <?php if(app()->getLocale() == 'en'): ?>
                            <?php echo Str::limit($news->description, 100, '...'); ?>

                            <?php else: ?>
                            <?php echo Str::limit($news->description_ar, 100, '...'); ?>

                            <?php endif; ?>
                        </p>

                        <a href="<?php echo e(route('event.news.details', $news->slug)); ?>"><?php echo app('translator')->get('READ MORE'); ?></a>
                    </div>
                </div>
            </div>
             <?php if(app()->getLocale() == 'ar'): ?>
            </div>
            <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</section>


<?php if(@$sections->secs != null): ?>
<?php $__currentLoopData = json_decode($sections->secs); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sec): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<?php echo $__env->make('sections.' . $sec, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('style-lib'); ?>
<link rel="stylesheet" href="<?php echo e(asset('assets/global/css/magnific-popup.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('assets/web/css/slick.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('assets/web/css/slick-theme.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('assets/web/css/custom.css')); ?>">
<?php $__env->stopPush(); ?>

<?php $__env->startPush('style'); ?>
<style>
    .property-image img {
        height: 200px !important;
    }

    .body-content {
        margin-bottom: 7px !important;
        height: 150px !important;
        overflow: hidden;
    }
    
    .news-img img{
       border-radius: 10px; 
    }
</style>
<?php $__env->stopPush(); ?>


<?php $__env->startPush('script-lib'); ?>
<script src="<?php echo e(asset('assets/global/js/magnific-popup.js')); ?>"></script>
<script src="<?php echo e(asset('assets/web/js/slick.min.js')); ?>"></script>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('script'); ?>
<script>
    $('.flan-view').each(function() { // the containers for all your galleries
            $(this).magnificPopup({
                delegate: 'a', // the selector for gallery item
                type: 'image',
                gallery: {
                    enabled: true
                }
            });
        });

        $(".clickType").click(function(){
            var type = $(this).val();
            $("#typeValue").val(type);
        });


    $('select').on('change', function(e) {
        e.preventDefault();

        const queryParams = new URLSearchParams();
        $('select').each(function() {
            queryParams.set($(this).attr('name'), $(this).val());
        });

        const url = '<?php echo e(route("eventFilter")); ?>?' + queryParams.toString();

        $.ajax({
            type: 'GET',
            url: url,
            success: function(res){
                $("#showResult").html(res);
            }
        });
    });

</script>
<?php $__env->stopPush(); ?>


<?php $__env->startPush('script'); ?>
<script>
    $(document).ready(function(){
        $(".fvt").click(function(){
            var $this  = $(this);
            var likeId = $(this).attr('data-item');
            var type   =   $(this).attr('data-type');
            var url    = "<?php echo e(route('fvtStore')); ?>";
            var csrfToken = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                type: "POST",
                url: url,
                headers: {
                    'X-CSRF-TOKEN': csrfToken
                },
                data: {
                    type: type,
                    property_id: likeId
                },
                success: function(res) {
                    if (res.status === true) {
                        notify('success', res.message);
                        $this.find('i.fa').addClass('text-danger');
                    }
                    if (res.status === false) {
                        notify('success', res.message);
                        $this.find('i.fa').removeClass('text-danger');
                    }
                },
                error: function(xhr, textStatus, errorThrown) {
                    window.location.href = "<?php echo e(route('user.login')); ?>";
                }
            });
        })
    })
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('web.layouts.frontend', ['title' => 'Events'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/amlaek/public_html/resources/views/web/pages/events.blade.php ENDPATH**/ ?>
<div class="company-card">
    <img src="<?php echo e(asset('assets/web/demo-images/profile_card.png')); ?>" alt="profile-card">
    <div class="logo">
        <img src="<?php echo e(asset('assets/web/demo-images/logo.png')); ?>" alt="logo">
    </div>
    <div class="content">
        <div class="mb-5">
            <!--<h3><?php echo e(__(gs('site_name'))); ?></h3>-->
            <h3><?php echo app('translator')->get('Inspirational Real Estate Company'); ?></h3>
        </div>

        <div>
            <h3 class="text-muted"><?php echo app('translator')->get('Communication'); ?></h3>
            <hr>
        </div>

        <div>
            <h3>+9660550217734</h3>
        </div>

        <div class="mt-2">
            <a href="tel:+9660550217734" class="mt-3 btn btn-share w-100">
                <i class="fab fa-whatsapp"></i>
                <span><?php echo app('translator')->get('Massaging by Whatsapp'); ?></span>
            </a>
            <a href="<?php echo e(route('request.get.auction_request', $auction->id)); ?>" class="mt-3 btn w-100"
                style="background-color: #39004E !important; color: #FFF"><?php echo app('translator')->get('Request'); ?></a>
        </div>
    </div>
</div>
<?php /**PATH D:\soudi-project\Amlek\resources\views/web/pages/includes/__auction_profile_card.blade.php ENDPATH**/ ?>
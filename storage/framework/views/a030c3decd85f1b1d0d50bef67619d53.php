<div class="row">
    <div class="col-md-12">
        <div class="d-flex justify-content-between">
            <div class="d-flex justify-content-start">
                <button type="button" class="mr-2 btn btn-info clickType2 <?php echo e($type == 'about' ? 'active' : ''); ?>" value="about"><?php echo app('translator')->get('About Auction'); ?></button>
                <button type="button" class="mx-2 btn btn-primary clickType2 <?php echo e($type == 'item' ? 'active' : ''); ?>" value="item"><?php echo app('translator')->get('Auction Items'); ?></button>
            </div>
            <div>
                <?php if(request()->route()->getName() == 'auction.details'): ?>
                    <a href="<?php echo e(route('auctions.maps', $auction->id)); ?>" class="btn btn-map-view">
                        <i class="bi bi-map"></i>
                        <span><?php echo app('translator')->get('View Maps'); ?></span>
                    </a>
                <?php else: ?>
                    <a href="<?php echo e(route('auction.details', $auction->slug)); ?>" class="btn btn-map-view">
                        <i class="bi bi-list"></i>
                        <span><?php echo app('translator')->get('View List'); ?></span>
                    </a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<?php /**PATH /home/amlaek/public_html/resources/views/web/pages/includes/__auction_nav_detail.blade.php ENDPATH**/ ?>
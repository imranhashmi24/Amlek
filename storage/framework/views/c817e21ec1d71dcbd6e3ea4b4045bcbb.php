<div class="row">
    <div class="col-md-12">
        <div class="d-flex justify-content-between">
            <div>
                <h3 class="auction-title"><?php echo app('translator')->get('Auctions'); ?></h3>
            </div>
            <div>
                <?php if(request()->route()->getName() == 'auctions'): ?>
                    <a href="<?php echo e(route('auctions.maps')); ?>" class="btn btn-map-view">
                        <i class="bi bi-map"></i>
                        <span><?php echo app('translator')->get('View Maps'); ?></span>
                    </a>
                <?php else: ?>
                    <a href="<?php echo e(route('auctions')); ?>" class="btn btn-map-view">
                        <i class="bi bi-list"></i>
                        <span><?php echo app('translator')->get('View List'); ?></span>
                    </a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<form action="<?php echo e(route($routes['auctions'], 'all')); ?>" method="GET">
    <input type="hidden" name="type" id="typeValue" value="<?php echo e(@$type); ?>">
    <div class="py-3 row">
        <div class="col-md-12">
            <div class="auction-card d-flex justify-content-between">
                <div class="d-flex justify-content-start">
                    <div class="state-box">
                        <label for=""><?php echo app('translator')->get('City'); ?></label>
                        <div class="d-flex justify-content-start">
                            <div>
                                <i class="bi bi-geo-alt-fill"></i>
                            </div>
                            <select class="state-select" name="city_id">
                                <option value="0"><?php echo app('translator')->get('Select one'); ?></option>
                                <?php $__currentLoopData = $cities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $city): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if(app()->getLocale() == 'en'): ?>
                                        <option <?php echo e(@$city_id == $city->id ? 'selected' : ''); ?> value="<?php echo e($city->id); ?>"><?php echo e($city->name); ?></option>
                                    <?php else: ?>
                                        <option <?php echo e(@$city_id == $city->id ? 'selected' : ''); ?> value="<?php echo e($city->id); ?>"><?php echo e($city->name_ar); ?></option>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>
                    <div class="search-box">
                        <input type="text" class="auction-search-input" name="title" value="<?php echo e(old('title', @$title)); ?>" placeholder="<?php echo app('translator')->get('Find an auctions'); ?>">
                    </div>
                </div>
                <div class="search-btn">
                    <button type="submit" class="btn-auction-search">
                        <span><?php echo app('translator')->get('Search'); ?></span>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div class="py-3 row">
        <div class="col-md-12">
            <div class="d-flex justify-content-start">
                <button type="submit" class="mr-2 btn btn-info clickType <?php echo e($type == 'all' ? 'active' : ''); ?>" value="all"><?php echo app('translator')->get('All auctions'); ?> (<?php echo e(@$all); ?>)</button>
                <button type="submit" class="mx-2 btn btn-primary clickType <?php echo e($type == 'current' ? 'active' : ''); ?>" value="current"><?php echo app('translator')->get('Current'); ?> (<?php echo e(@$current); ?>)</button>
                <button type="submit" class="mx-2 btn btn-success clickType <?php echo e($type == 'upcoming' ? 'active' : ''); ?>" value="upcoming"><?php echo app('translator')->get('Coming'); ?> (<?php echo e(@$upcoming); ?>)</button>
                <button type="submit" class="mx-2 btn btn-danger clickType <?php echo e($type == 'finished' ? 'active' : ''); ?>" value="finished"><?php echo app('translator')->get('Finished'); ?> (<?php echo e(@$finished); ?>)</button>
            </div>
        </div>
    </div>
</form>
<?php /**PATH /home/asoug/amlaek.asoug.com/resources/views/web/pages/includes/__auction_nav.blade.php ENDPATH**/ ?>
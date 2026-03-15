<?php $__env->startSection('panel'); ?>
<form action="<?php echo e(route('admin.event_news.update', @$event->id)); ?>" method="POST" enctype="multipart/form-data">
    <?php echo csrf_field(); ?>

    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="mb-3 col-12 col-md-6 col-lg-12">
                    <div class="form-group">
                        <label class="form-label"><?php echo app('translator')->get('Title'); ?> <span class="text-danger fs-6">*</span></label>
                        <input type="text" name="title" value="<?php echo e(old('title', @$event->title)); ?>" class="form-control" required>
                    </div>
                </div>
                <div class="mb-3 col-12 col-md-6 col-lg-6">
                    <div class="form-group">
                        <label class="form-label"><?php echo app('translator')->get('Title'); ?> (<?php echo app('translator')->get('Arabic'); ?>) <span class="text-danger fs-6">*</span></label>
                        <input type="text" name="title_ar" value="<?php echo e(old('title_ar', @$event->title_ar)); ?>" class="form-control" required>
                    </div>
                </div>
                <div class="mb-3 col-12 col-md-6 col-lg-6">
                    <div class="form-group">
                        <label class="form-label"><?php echo app('translator')->get('Slug'); ?> <span class="text-danger fs-6">*</span></label>
                        <input type="text" name="slug" value="<?php echo e(old('slug', @$event->slug)); ?>" class="form-control" required>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="my-3 product-card">
        <div class="product-card-header">
            <h6 class="m-0 text-light"><?php echo app('translator')->get('Images'); ?></h6>
        </div>
        <div class="product-card-body">
            <div class="row">
                <div class="mb-3 col-12 col-md-4">
                    <div class="form-group">
                        <label class="form-label"><?php echo app('translator')->get('Image'); ?> <span class="text-danger fs-6">*</span></label>
                        <?php if (isset($component)) { $__componentOriginaldbcc027cdd3569f61821c56d10b77c01 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginaldbcc027cdd3569f61821c56d10b77c01 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.image-uploader','data' => ['class' => 'w-100','name' => 'image','type' => 'event_news','imagePath' => ''.e(getImage(getFilePath('event_news') . '/' . @$event->image, getFileSize('event_news'))).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('image-uploader'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'w-100','name' => 'image','type' => 'event_news','imagePath' => ''.e(getImage(getFilePath('event_news') . '/' . @$event->image, getFileSize('event_news'))).'']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginaldbcc027cdd3569f61821c56d10b77c01)): ?>
<?php $attributes = $__attributesOriginaldbcc027cdd3569f61821c56d10b77c01; ?>
<?php unset($__attributesOriginaldbcc027cdd3569f61821c56d10b77c01); ?>
<?php endif; ?>
<?php if (isset($__componentOriginaldbcc027cdd3569f61821c56d10b77c01)): ?>
<?php $component = $__componentOriginaldbcc027cdd3569f61821c56d10b77c01; ?>
<?php unset($__componentOriginaldbcc027cdd3569f61821c56d10b77c01); ?>
<?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="mb-3 col-12 col-md-12">
            <div class="form-group">
                <label class="form-label"><?php echo app('translator')->get('Description'); ?> <span class="text-danger fs-6">*</span></label>
                <textarea name="description" class="form-control nicEdit" rows="10"><?php echo e(old('description', @$event->description)); ?></textarea>
            </div>
        </div>
        <div class="mb-3 col-12 col-md-12">
            <div class="form-group">
                <label class="form-label"><?php echo app('translator')->get('Description'); ?> (<?php echo app('translator')->get('Arabic'); ?>) <span class="text-danger fs-6">*</span></label>
                <textarea name="description_ar" class="form-control nicEdit" rows="10"><?php echo e(old('description_ar', @$event->description_ar)); ?></textarea>
            </div>
        </div>

        <div class="col-12">
            <div class="mb-3 col-12 col-md-12">
                <button type="submit" class="btn btn-primary w-100"><?php echo app('translator')->get('Submit'); ?></button>
            </div>
        </div>
    </div>
</form>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script-lib'); ?>
<script src="<?php echo e(asset('assets/global/js/image-uploader.min.js')); ?>"></script>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('style-lib'); ?>
<link href="<?php echo e(asset('assets/global/css/image-uploader.min.css')); ?>" rel="stylesheet">
<?php $__env->stopPush(); ?>


<?php $__env->startPush('breadcrumb-plugins'); ?>
<a href="<?php echo e(route('admin.event_news.index')); ?>" class="btn btn-primary"><i class="bi bi-arrow-clockwise"></i>
    <?php echo app('translator')->get('Back'); ?></a>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('script'); ?>
<script>

    $("input[name=title]").on('	keypress', function() {
        var title = $(this).val();
        var generateSlug = title.toLowerCase().replace(/ /g, '-').replace(/[^\w-]+/g, '');
        $("input[name=slug]").val(generateSlug);
    })
</script>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('style'); ?>
<style>
    .product-card {
        border: 1px solid #1a2232;
        border-radius: 5px;
    }

    .product-card-body {
        padding: 15px;
    }

    .product-card-header {
        background: #1a2232;
        padding: 10px;
    }

    .image-uploader {
        min-height: 278px !important;
    }

</style>
<?php $__env->stopPush(); ?>


<?php echo $__env->make('admin.layouts.app', ['title' => 'Edit Event News'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/amlaek/public_html/resources/views/admin/event_news/edit.blade.php ENDPATH**/ ?>
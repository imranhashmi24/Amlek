<?php $__env->startSection('panel'); ?>
    <div class="card">
        <div class="card-body">
            <form action="<?php echo e(route('admin.blog.store', @$blog->id)); ?>" method="post" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <div class="row">
                    <div class="col-4">
                        <div class="form-group">
                            <label class="form-label">Image</label>
                            <?php if (isset($component)) { $__componentOriginaldbcc027cdd3569f61821c56d10b77c01 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginaldbcc027cdd3569f61821c56d10b77c01 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.image-uploader','data' => ['image' => ''.e(@$blog->image).'','name' => 'image','class' => 'w-100','type' => 'blog']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('image-uploader'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['image' => ''.e(@$blog->image).'','name' => 'image','class' => 'w-100','type' => 'blog']); ?>
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
                    <div class="col-8">
                        <div class="mb-3 form-group">
                            <label class="form-label"><?php echo app('translator')->get('Category'); ?></label>
                            <select name="blog_category_id" id="blog_category_id" class="form-control">
                                <option value=""><?php echo app('translator')->get('Select one'); ?></option>
                                <?php $__currentLoopData = App\Models\BlogCategory::get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option <?php echo e(@$blog->blog_category_id == $category->id ? 'selected' : ''); ?>

                                        value="<?php echo e($category->id); ?>"><?php echo e($category->title); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <div class="mb-3 form-group">
                            <label class="form-label"><?php echo app('translator')->get('Title'); ?></label>
                            <input type="text" name="title" class="form-control"
                                value="<?php echo e(old('title', @$blog->title)); ?>">
                        </div>
                        <div class="mb-3 form-group">
                            <label class="form-label"><?php echo app('translator')->get('Title'); ?> (<?php echo app('translator')->get('Arabic'); ?>)</label>
                            <input type="text" name="title_ar" class="form-control"
                                value="<?php echo e(old('title_ar', @$blog->title)); ?>">
                        </div>

                        <div class="mb-3 form-group">
                            <label class="form-label"><?php echo app('translator')->get('Slug'); ?></label>
                            <input type="text" name="slug" class="form-control"
                                value="<?php echo e(old('slug', @$blog->slug)); ?>">
                        </div>

                        <div class="mb-3 form-group">
                            <label class="form-label"><?php echo app('translator')->get('Description'); ?></label>
                            <textarea class="form-control nicEdit" name="description" rows="8"><?php echo @$blog->description ?></textarea>
                        </div>
                        <div class="mb-3 form-group">
                            <label class="form-label"><?php echo app('translator')->get('Description'); ?> (<?php echo app('translator')->get('Arabic'); ?>)</label>
                            <textarea class="form-control nicEdit" name="description_ar" rows="8"><?php echo @$blog->description_ar ?></textarea>
                        </div>

                        <div class="mb-3 form-group">
                            <button type="submit" class="btn btn-primary w-100"><?php echo app('translator')->get('Submit'); ?></button>
                        </div>
                    </div>

                </div>
            </form>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('breadcrumb-plugins'); ?>
    <a href="<?php echo e(route('admin.blog.index')); ?>" class="btn btn-primary"><i class="bi bi-arrow-clockwise"></i>
        <?php echo app('translator')->get('Back'); ?></a>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('script'); ?>
    <script>
        $("input[name=title]").on('keyup', function() {
            let name = $(this).val();
            var slug = slugify(name);
            $("input[name=slug]").val(slug)
        })

        function slugify(text) {
            return text.toString().toLowerCase()
                .replace(/\s+/g, '-')
                .replace(/[^\w\-]+/g, '')
                .replace(/\-\-+/g, '-')
                .replace(/^-+/, '')
                .replace(/-+$/, '');
        }
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.app', ['title' => @$title], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/amlaek/public_html/resources/views/admin/blog/create.blade.php ENDPATH**/ ?>
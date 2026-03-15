<?php $__env->startSection('panel'); ?>
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card">
                <div class="card-body">
                    <p class="text-primary"><?php echo app('translator')->get('While you are adding a new keyword, it will only add to this current language only. Please be careful on entering a keyword, please make sure there is no extra space. It needs to be exact and case-sensitive.'); ?></p>
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive--sm table-responsive">
                        <table class="table">
                            <thead class="table-light">
                                <tr>
                                    <th><?php echo app('translator')->get('Name'); ?></th>
                                    <th><?php echo app('translator')->get('Code'); ?></th>
                                    <th><?php echo app('translator')->get('Default'); ?></th>
                                    <th><?php echo app('translator')->get('Actions'); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__empty_1 = true; $__currentLoopData = $languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <tr>
                                        <td><?php echo e(__($item->name)); ?></td>
                                        <td><strong><?php echo e(__($item->code)); ?></strong></td>
                                        <td>
                                            <?php if($item->is_default == Status::YES): ?>
                                                <span class="badge bg-success"><?php echo app('translator')->get('Default'); ?></span>
                                            <?php else: ?>
                                                <span class="badge bg-warning"><?php echo app('translator')->get('Selectable'); ?></span>
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <div class="btn-group">
                                                <button data-bs-toggle="dropdown">
                                                    <i class="fa-solid fa-ellipsis-vertical"></i>
                                                </button>
                                                <ul class="dropdown-menu dropdown-menu-end">
                                                    <li>
                                                        <a href="<?php echo e(route('admin.language.key', $item->id)); ?>">
                                                            <i class="la la-language"></i> <?php echo app('translator')->get('Translate'); ?>
                                                        </a>
                                                    </li>

                                                    <li>
                                                        <button class="editBtn"
                                                            data-url="<?php echo e(route('admin.language.manage.update', $item->id)); ?>"
                                                            data-lang="<?php echo e(json_encode($item->only('name', 'text_align', 'is_default'))); ?>">
                                                            <i class="la la-pen"></i><?php echo app('translator')->get('Edit'); ?>
                                                        </button>
                                                    </li>
                                                    <?php if($item->id != 1): ?>
                                                        <li>
                                                            <button class="confirmationBtn"
                                                                data-question="<?php echo app('translator')->get('Are you sure to remove this language from this system?'); ?>"
                                                                data-action="<?php echo e(route('admin.language.manage.delete', $item->id)); ?>">
                                                                <i class="la la-trash"></i> <?php echo app('translator')->get('Remove'); ?>
                                                            </button>
                                                        </li>
                                                    <?php endif; ?>

                                                </ul>
                                            </div>




                                            
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <tr>
                                        <td class="text-center text-muted" colspan="100%"><?php echo e(__($emptyMessage)); ?></td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table><!-- table end -->
                    </div>
                </div>
            </div><!-- card end -->
        </div>
    </div>



    
    <div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="createModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createModalLabel"> <?php echo app('translator')->get('Add New Language'); ?></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form class="form-horizontal" method="post" action="<?php echo e(route('admin.language.manage.store')); ?>">
                    <?php echo csrf_field(); ?>
                    <div class="modal-body">
                        <div class="mb-3 row form-group">
                            <label class="form-label"><?php echo app('translator')->get('Language Name'); ?></label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" value="<?php echo e(old('name')); ?>" name="name"
                                    required>
                            </div>
                        </div>

                        <div class="mb-3 row form-group">
                            <label class="form-label"><?php echo app('translator')->get('Language Code'); ?></label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" value="<?php echo e(old('code')); ?>" name="code"
                                    required>
                            </div>
                        </div>

                        <div class="mb-3 row form-group">
                            <div class="col-md-12">
                                <label class="form-label" for="inputName"><?php echo app('translator')->get('Default Language'); ?></label>
                                <input type="checkbox" data-width="100%" data-height="40px" data-onstyle="success"
                                    data-offstyle="danger" data-bs-toggle="toggle" data-on="<?php echo app('translator')->get('SET'); ?>"
                                    data-off="<?php echo app('translator')->get('UNSET'); ?>" name="is_default">
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary w-100" id="btn-save"
                            value="add"><?php echo app('translator')->get('Submit'); ?></button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="editModalLabel"><?php echo app('translator')->get('Edit Language'); ?></h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="post">
                    <?php echo csrf_field(); ?>
                    <div class="modal-body">
                        <div class="mb-3 form-group">
                            <label class="form-label"><?php echo app('translator')->get('Language Name'); ?></label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" value="<?php echo e(old('name')); ?>" name="name"
                                    required>
                            </div>
                        </div>

                        <div class="mt-2 mb-3 form-group">
                            <label class="form-label" for="inputName"><?php echo app('translator')->get('Default Language'); ?></label>
                            <input type="checkbox" data-width="100%" data-height="40px" data-onstyle="success"
                                data-offstyle="danger" data-bs-toggle="toggle" data-on="<?php echo app('translator')->get('SET'); ?>"
                                data-off="<?php echo app('translator')->get('UNSET'); ?>" name="is_default">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary w-100 h-45" id="btn-save"
                            value="add"><?php echo app('translator')->get('Submit'); ?></button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="getLangModal" tabindex="-1" role="dialog" aria-labelledby="getLangModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="getLangModalLabel"><?php echo app('translator')->get('Language Keywords'); ?></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p class="mb-3"><?php echo app('translator')->get('All of the possible language keywords are available here. However, some keywords may be missing due to variations in the database. If you encounter any missing keywords, you can add them manually.'); ?></p>
                    <p class="mb-3 text--primary"><?php echo app('translator')->get('You can import these keywords from the translate page of any language as well.'); ?></p>
                    <div class="form-group copy-texts-wrapper position-relative">
                        <div class="copy-texts">
                            <span class="copy"><?php echo app('translator')->get('Copy'); ?></span>
                        </div>
                        <textarea name="" class="form-control langKeys key-added" id="langKeys" rows="25" readonly></textarea>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php if (isset($component)) { $__componentOriginal5b8b2d0f151a30be878e1a760ec3900c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal5b8b2d0f151a30be878e1a760ec3900c = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.confirmation-modal','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('confirmation-modal'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal5b8b2d0f151a30be878e1a760ec3900c)): ?>
<?php $attributes = $__attributesOriginal5b8b2d0f151a30be878e1a760ec3900c; ?>
<?php unset($__attributesOriginal5b8b2d0f151a30be878e1a760ec3900c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal5b8b2d0f151a30be878e1a760ec3900c)): ?>
<?php $component = $__componentOriginal5b8b2d0f151a30be878e1a760ec3900c; ?>
<?php unset($__componentOriginal5b8b2d0f151a30be878e1a760ec3900c); ?>
<?php endif; ?>
<?php $__env->stopSection(); ?>


<?php $__env->startPush('breadcrumb-plugins'); ?>
    <button type="button" class="btn btn-sm btn-outline-primary" data-bs-toggle="modal"
        data-bs-target="#createModal"><i class="las la-plus me-2"></i><?php echo app('translator')->get('Add New'); ?></button>
    <button type="button" class="btn btn-sm btn-outline-success keyBtn" data-bs-toggle="modal"
        data-bs-target="#getLangModal"><i class="las la-code me-2"></i><?php echo app('translator')->get('Language Keywords'); ?></button>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('style'); ?>
    <style>
        .copy-texts-wrapper:hover .copy-texts {
            visibility: visible;
            opacity: 1;
        }

        .copy-texts {
            position: absolute;
            left: 0;
            top: 0;
            z-index: 99;
            background: #0000004d;
            width: 99%;
            height: 100%;
            border-radius: 5px;
            display: flex;
            justify-content: center;
            align-items: center;
            visibility: hidden;
            opacity: 0;
            transition: .3s;
            cursor: pointer;
        }

        .copy-texts .copy {
            color: #fff;
            font-size: 40px;
            border-radius: 5px;
            background-color: transparent;
        }
    </style>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('script'); ?>
    <script>
        (function($) {
            "use strict";
            $('.editBtn').on('click', function() {
                var modal = $('#editModal');
                var url = $(this).data('url');
                var lang = $(this).data('lang');

                modal.find('form').attr('action', url);
                modal.find('input[name=name]').val(lang.name);
                modal.find('select[name=text_align]').val(lang.text_align);
                if (lang.is_default == 1) {
                    modal.find('input[name=is_default]').bootstrapToggle('on');
                } else {
                    modal.find('input[name=is_default]').bootstrapToggle('off');
                }
                modal.modal('show');
            });

            $('.keyBtn').click(function(e) {
                e.preventDefault();
                $.get("<?php echo e(route('admin.language.get.key')); ?>", {}, function(data) {
                    $('.langKeys').text(data);
                });
            });

            $('.copy-texts').click(function() {
                var copyText = document.getElementById("langKeys");
                copyText.select();
                document.execCommand("copy");
                $('.copy').text('Copied');
                setTimeout(() => {
                    $('.copy').text('Copy');
                }, 2000);

            });

        })(jQuery);
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.app', ['title' => 'Language Manager'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/amlaek/public_html/resources/views/admin/language/lang.blade.php ENDPATH**/ ?>
<?php $__env->startSection('panel'); ?>
    <div id="app">
        <div class="row">

            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">

                        <div class="mt-3 row justify-content-between">
                            <div class="col-md-7">
                                <h5><?php echo app('translator')->get('Language Keywords of'); ?> <?php echo e(__($lang->name)); ?></h5>
                            </div>
                            <div class="mt-3 col-md-5 mt-md-0">
                                <button type="button" data-bs-toggle="modal" data-bs-target="#addModal"
                                    class="btn btn-outline-primary float-end"><i class="fa fa-plus"></i>
                                    <?php echo app('translator')->get('Add New Key'); ?> </button>
                            </div>
                        </div>
                        <hr>
                        <div class="table-responsive--sm table-responsive">
                            <table class="table">
                                <thead class="table-light">
                                    <tr>
                                        <th>
                                            <?php echo app('translator')->get('Key'); ?>
                                        </th>
                                        <th>
                                            <?php echo e(__($lang->name)); ?>

                                        </th>

                                        <th class="w-85"><?php echo app('translator')->get('Action'); ?></th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php $__empty_1 = true; $__currentLoopData = $json; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                        <tr>
                                            <td class="white-space-wrap"><?php echo e(strLimit($k, 50)); ?></td>
                                            <td class="text-left white-space-wrap"><?php echo e(strLimit($language, 50)); ?></td>


                                            <td>

                                                <div class="btn-group">
                                                    <button data-bs-toggle="dropdown">
                                                        <i class="fa-solid fa-ellipsis-vertical"></i>
                                                    </button>
                                                    <ul class="dropdown-menu dropdown-menu-end">
                                                        <li>
                                                            <button data-bs-target="#editModal" data-bs-toggle="modal"
                                                                data-title="<?php echo e($k); ?>"
                                                                data-key="<?php echo e($k); ?>"
                                                                data-value="<?php echo e($language); ?>" class="editModal">
                                                                <i class="bi bi-pencil"></i><?php echo app('translator')->get('Edit'); ?>
                                                            </button>
                                                        </li>
                                                        <li>
                                                            <button data-key="<?php echo e($k); ?>"
                                                                data-value="<?php echo e($language); ?>" data-bs-toggle="modal"
                                                                data-bs-target="#DelModal" class="deleteKey">
                                                                <i class="bi bi-trash"></i><?php echo app('translator')->get('Remove'); ?>
                                                            </button>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                        <tr>
                                            <td colspan="100%" class="text-center"><?php echo e(__($emptyMessage)); ?></td>
                                        </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <?php if($json->hasPages()): ?>
                        <div class="card-footer pagination-card-footer">
                            <?php
                                echo paginateLinks($json);
                            ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>


        <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addModalLabel"> <?php echo app('translator')->get('Add New'); ?></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <form action="<?php echo e(route('admin.language.store.key', $lang->id)); ?>" method="post">
                        <?php echo csrf_field(); ?>
                        <div class="modal-body">
                            <div class="mb-3 form-group">
                                <label for="key" class="form-label"><?php echo app('translator')->get('Key'); ?></label>
                                <input type="text" class="form-control" id="key" name="key"
                                    value="<?php echo e(old('key')); ?>" required>

                            </div>
                            <div class="mb-3 form-group">
                                <label for="value" class="form-label"><?php echo app('translator')->get('Value'); ?></label>
                                <input type="text" class="form-control" id="value" name="value"
                                    value="<?php echo e(old('value')); ?>" required>

                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary w-100"> <?php echo app('translator')->get('Submit'); ?></button>
                        </div>
                    </form>

                </div>
            </div>
        </div>


        <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editModalLabel"><?php echo app('translator')->get('Edit'); ?></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <form action="<?php echo e(route('admin.language.update.key', $lang->id)); ?>" method="post">
                        <?php echo csrf_field(); ?>
                        <div class="modal-body">
                            <div class="mb-3 form-group">
                                <label for="inputName" class="form-title form-label"></label>
                                <input type="text" class="form-control" name="value" required>
                            </div>
                            <input type="hidden" name="key">
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary w-100 h-45"><?php echo app('translator')->get('Submit'); ?></button>
                        </div>
                    </form>

                </div>
            </div>
        </div>


        <!-- Modal for DELETE -->
        <div class="modal fade" id="DelModal" tabindex="-1" role="dialog" aria-labelledby="DelModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="DelModalLabel"> <?php echo app('translator')->get('Confirmation Alert!'); ?></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p><?php echo app('translator')->get('Are you sure to delete this key from this language?'); ?></p>
                    </div>
                    <form action="<?php echo e(route('admin.language.delete.key', $lang->id)); ?>" method="post">
                        <?php echo csrf_field(); ?>
                        <input type="hidden" name="key">
                        <input type="hidden" name="value">
                        <div class="modal-footer">
                            <button type="button" class="btn btn-dark"
                                data-bs-dismiss="modal"><?php echo app('translator')->get('No'); ?></button>
                            <button type="submit" class="btn btn-primary"><?php echo app('translator')->get('Yes'); ?></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    
    <div class="modal fade" id="importModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><?php echo app('translator')->get('Import Keywords'); ?></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label class="form-label"><?php echo app('translator')->get('Import From'); ?></label>
                        <select class="form-control select_lang" required>
                            <option value=""><?php echo app('translator')->get('Select One'); ?></option>
                            <option value="999"><?php echo app('translator')->get('System'); ?></option>
                            <?php $__currentLoopData = $list_lang; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($data->id); ?>"
                                    <?php if($data->id == $lang->id): ?> class="d-none" <?php endif; ?>><?php echo e(__($data->name)); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-dark" data-bs-dismiss="modal"><?php echo app('translator')->get('Close'); ?></button>
                    <button type="button" class="btn btn-primary import_lang"> <?php echo app('translator')->get('Import Now'); ?></button>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>


<?php $__env->startPush('breadcrumb-plugins'); ?>
    <div class="gap-3 d-flex">
        <div>

            <div class="flex-wrap gap-2 mb-2 d-flex">
                <?php if (isset($component)) { $__componentOriginale48b4598ffc2f41a085f001458a956d1 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale48b4598ffc2f41a085f001458a956d1 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.search-form','data' => ['placeholder' => 'Search keywords']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('search-form'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['placeholder' => 'Search keywords']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginale48b4598ffc2f41a085f001458a956d1)): ?>
<?php $attributes = $__attributesOriginale48b4598ffc2f41a085f001458a956d1; ?>
<?php unset($__attributesOriginale48b4598ffc2f41a085f001458a956d1); ?>
<?php endif; ?>
<?php if (isset($__componentOriginale48b4598ffc2f41a085f001458a956d1)): ?>
<?php $component = $__componentOriginale48b4598ffc2f41a085f001458a956d1; ?>
<?php unset($__componentOriginale48b4598ffc2f41a085f001458a956d1); ?>
<?php endif; ?>
                <button type="button" class="btn btn-primary importBtn"><i
                        class="la la-download"></i><?php echo app('translator')->get('Import Keywords'); ?></button>
                <a href="<?php echo e(route('admin.language.manage')); ?>" class="btn btn-primary"><i
                        class="bi bi-arrow-clockwise"></i><?php echo app('translator')->get('Back'); ?></a>
            </div>
        </div>
    </div>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('script'); ?>
    <script>
        (function($) {
            "use strict";
            $(document).on('click', '.deleteKey', function() {
                var modal = $('#DelModal');
                modal.find('input[name=key]').val($(this).data('key'));
                modal.find('input[name=value]').val($(this).data('value'));
            });

            $(document).on('click', '.editModal', function() {


                var modal = $('#editModal');

                modal.find('.form-title').text($(this).data('title'));
                modal.find('input[name=key]').val($(this).data('key'));
                modal.find('input[name=value]').val($(this).data('value'));
            });


            $(document).on('click', '.importBtn', function() {
                $('#importModal').modal('show');
            });
            $(document).on('click', '.import_lang', function(e) {
                var id = $('.select_lang').val();

                if (id == '') {
                    notify('error', 'Invalide selection');

                    return 0;
                } else {
                    $.ajax({
                        type: "post",
                        url: "<?php echo e(route('admin.language.import.lang')); ?>",
                        data: {
                            id: id,
                            toLangid: "<?php echo e($lang->id); ?>",
                            _token: "<?php echo e(csrf_token()); ?>"
                        },
                        success: function(data) {
                            if (data == 'success') {
                                notify('success', 'Import Data Successfully');
                                window.location.href = "<?php echo e(url()->current()); ?>"
                            }
                        }
                    });
                }

            });


        })(jQuery);
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.app', ['title' => @$title], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/amlaek/public_html/resources/views/admin/language/edit_lang.blade.php ENDPATH**/ ?>
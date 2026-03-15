<?php $__env->startSection('panel'); ?>
    <?php if(@$section->content): ?>
        <div class="row">
            <div class="col-lg-12 col-md-12 mb-30">
                <div class="card">
                    <div class="card-body">
                        <form action="<?php echo e(route('admin.frontend.sections.content', $key)); ?>" method="POST" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                            <input type="hidden" name="type" value="content">
                            <div class="row">
                                <?php
                                    $imgCount = 0;
                                ?>
                                <?php $__currentLoopData = $section->content; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($k == 'images'): ?>
                                        <?php
                                            $imgCount = collect($item)->count();
                                        ?>
                                        <?php $__currentLoopData = $item; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $imgKey => $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="col-md-4">
                                                <input type="hidden" name="has_image" value="1">
                                                <div class="mb-3 form-group">
                                                    <label class="required form-label"><?php echo e(__(keyToTitle(@$imgKey))); ?></label>
                                                    <?php if (isset($component)) { $__componentOriginaldbcc027cdd3569f61821c56d10b77c01 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginaldbcc027cdd3569f61821c56d10b77c01 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.image-uploader','data' => ['class' => 'w-100','name' => 'image_input['.e(@$imgKey).']','imagePath' => getImage('assets/images/frontend/' . $key . '/' . @$content->data_values->$imgKey, @$section->content->images->$imgKey->size),'id' => 'image-upload-input'.e($loop->index).'','size' => $section->content->images->$imgKey->size,'required' => false]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('image-uploader'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'w-100','name' => 'image_input['.e(@$imgKey).']','imagePath' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(getImage('assets/images/frontend/' . $key . '/' . @$content->data_values->$imgKey, @$section->content->images->$imgKey->size)),'id' => 'image-upload-input'.e($loop->index).'','size' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($section->content->images->$imgKey->size),'required' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(false)]); ?>
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
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <div class="<?php if($imgCount > 1): ?> col-md-12 <?php else: ?> col-md-8 <?php endif; ?>">
                                            <?php $__env->startPush('divend'); ?>
                                            </div>
                                        <?php $__env->stopPush(); ?>
                                    <?php else: ?>
                                        <?php if($k != 'images'): ?>
                                            <?php if($item == 'icon'): ?>
                                                <div class="col-md-12">
                                                    <div class="form-group ">
                                                        <label class="form-label"><?php echo e(__(keyToTitle($k))); ?></label>
                                                        <div class="input-group">
                                                            <input type="text" class="form-control iconPicker icon" autocomplete="off" name="<?php echo e($k); ?>" value="<?php echo e(@$content->data_values->$k); ?>" required>
                                                            <span class="input-group-text input-group-addon" data-icon="las la-home" role="iconpicker"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php elseif($item == 'textarea'): ?>
                                                <div class="col-md-12">
                                                    <div class="mb-3 form-group">
                                                        <label class="form-label"><?php echo e(__(keyToTitle($k))); ?></label>
                                                      
                                                        <textarea rows="10" class="form-control" name="<?php echo e($key); ?>"><?php echo e(@$content->data_values->$k); ?></textarea>
                                                    </div>
                                                </div>
                                            <?php elseif($item == 'textarea-nic'): ?>
                                                <div class="col-md-12">
                                                    <div class="mb-3 form-group">
                                                        <label class="form-label"><?php echo e(__(keyToTitle($k))); ?></label>
                                                        <textarea rows="10" class="form-control nicEdit" name="<?php echo e($k); ?>"><?php echo e(@$content->data_values->$k); ?></textarea>
                                                    </div>
                                                </div>
                                            <?php elseif($k == 'select'): ?>
                                                <?php
                                                    $selectName = $item->name;
                                                ?>
                                                <div class="col-md-12">
                                                    <div class="mb-3 form-group">
                                                        <label class="form-label"><?php echo e(__(keyToTitle(@$selectName))); ?></label>
                                                        <select class="form-control" name="<?php echo e(@$selectName); ?>">
                                                            <?php $__currentLoopData = $item->options; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $selectItemKey => $selectOption): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <option value="<?php echo e($selectItemKey); ?>" <?php if(@$content->data_values->$selectName == $selectItemKey): ?> selected <?php endif; ?>><?php echo e($selectOption); ?></option>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            <?php else: ?>
                                                <div class="col-md-12">
                                                    <div class="mb-3 form-group">
                                                        <label class="form-label"><?php echo e(__(keyToTitle($k))); ?></label>
                                                        <input type="text" class="form-control" name="<?php echo e($k); ?>" value="<?php echo e(@$content->data_values->$k); ?>" required />
                                                    </div>
                                                </div>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php echo $__env->yieldPushContent('divend'); ?>
                            </div>
                            <div class="mb-3 form-group">
                                <button type="submit" class="btn btn-primary w-100"><?php echo app('translator')->get('Submit'); ?></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <?php if(@$section->element): ?>
        <div class="flex-wrap mb-3 d-flex justify-content-end">
            <div class="d-inline">
                <div class="input-group justify-content-end">
                    <input type="text" name="search_table" class="bg-white form-control" placeholder="<?php echo app('translator')->get('Search'); ?>...">
                    <button class="btn btn-primary input-group-text"><i class="fa fa-search"></i></button>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive--sm table-responsive">
                            <table class="table">
                                <thead class="table-light">
                                    <tr>
                                        <th><?php echo app('translator')->get('SL'); ?></th>
                                        <?php if(@$section->element->images): ?>
                                            <th><?php echo app('translator')->get('Image'); ?></th>
                                        <?php endif; ?>
                                        <?php $__currentLoopData = $section->element; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($k != 'modal'): ?>
                                                <?php if($type == 'text' || $type == 'icon'): ?>
                                                    <th><?php echo e(__(keyToTitle($k))); ?></th>
                                                <?php elseif($k == 'select'): ?>
                                                    <th><?php echo e(keyToTitle(@$section->element->$k->name)); ?></th>
                                                <?php endif; ?>
                                            <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <th><?php echo app('translator')->get('Action'); ?></th>
                                    </tr>
                                </thead>
                                <tbody class="list">
                                    <?php $__empty_1 = true; $__currentLoopData = $elements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                        <tr>
                                            <td><?php echo e($loop->iteration); ?></td>
                                            <?php if(@$section->element->images): ?>
                                                <?php $firstKey = collect($section->element->images)->keys()[0]; ?>
                                                <td>
                                                    <div class="customer-details d-block">
                                                        <a href="javascript:void(0)" class="thumb">
                                                            <img src="<?php echo e(getImage('assets/images/frontend/' . $key . '/' . @$data->data_values->$firstKey, @$section->element->images->$firstKey->size)); ?>" alt="<?php echo app('translator')->get('image'); ?>">
                                                        </a>
                                                    </div>
                                                </td>
                                            <?php endif; ?>
                                            <?php $__currentLoopData = $section->element; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php if($k != 'modal'): ?>
                                                    <?php if($type == 'text' || $type == 'icon'): ?>
                                                        <?php if($type == 'icon'): ?>
                                                            <td><?php echo @$data->data_values->$k; ?></td>
                                                        <?php else: ?>
                                                            <td><?php echo e(__(@$data->data_values->$k)); ?></td>
                                                        <?php endif; ?>
                                                    <?php elseif($k == 'select'): ?>
                                                        <?php
                                                            $dataVal = @$section->element->$k->name;
                                                        ?>
                                                        <td><?php echo e(@$data->data_values->$dataVal); ?></td>
                                                    <?php endif; ?>
                                                <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <td>



                                                <div class="btn-group">
                                                <button data-bs-toggle="dropdown">
                                                    <i class="fa-solid fa-ellipsis-vertical"></i>
                                                </button>
                                                <ul class="dropdown-menu dropdown-menu-end">
                                                    <?php if($section->element->modal): ?>
                                                        <?php
                                                            $images = [];
                                                            if (@$section->element->images) {
                                                                foreach ($section->element->images as $imgKey => $imgs) {
                                                                    $images[] = getImage('assets/images/frontend/' . $key . '/' . @$data->data_values->$imgKey, @$section->element->images->$imgKey->size);
                                                                }
                                                            }
                                                        ?>
                                                       <li>
                                                        <button class="updateBtn" data-id="<?php echo e($data->id); ?>" data-all="<?php echo e(json_encode($data->data_values)); ?>" <?php if(@$section->element->images): ?> data-images="<?php echo e(json_encode($images)); ?>" <?php endif; ?>>
                                                            <i class="la la-pencil-alt"></i> <?php echo app('translator')->get('Edit'); ?>
                                                        </button>
                                                       </li>
                                                    <?php else: ?>
                                                    <li>
                                                        <a href="<?php echo e(route('admin.frontend.sections.element', [$key, $data->id])); ?>"><i class="la la-pencil-alt"></i> <?php echo app('translator')->get('Edit'); ?></a>

                                                    </li>
                                                    <?php endif; ?>
                                                    <li>
                                                        <button class="confirmationBtn" data-action="<?php echo e(route('admin.frontend.remove', $data->id)); ?>" data-question="<?php echo app('translator')->get('Are you sure to remove this item?'); ?>"><i class="la la-trash"></i> <?php echo app('translator')->get('Remove'); ?></button>
                                                    </li>
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
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        
        <div id="addModal" class="modal fade" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title"> <?php echo app('translator')->get('Add New'); ?> <?php echo e(__(keyToTitle($key))); ?> <?php echo app('translator')->get('Item'); ?></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="<?php echo e(route('admin.frontend.sections.content', $key)); ?>" method="POST" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <input type="hidden" name="type" value="element">
                        <div class="modal-body">
                            <?php $__currentLoopData = $section->element; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($k != 'modal'): ?>
                                    <?php if($type == 'icon'): ?>
                                        <div class="mb-3 form-group">
                                            <label class="form-label"><?php echo e(__(keyToTitle($k))); ?></label>
                                            <div class="input-group">
                                                <input type="text" class="form-control iconPicker icon" autocomplete="off" name="<?php echo e($k); ?>" required>
                                                <span class="input-group-text input-group-addon" data-icon="las la-home" role="iconpicker"></span>
                                            </div>
                                        </div>
                                    <?php elseif($k == 'select'): ?>
                                        <div class="mb-3 form-group">
                                            <label class="form-label"><?php echo e(keyToTitle(@$section->element->$k->name)); ?></label>
                                            <select class="form-control" name="<?php echo e(@$section->element->$k->name); ?>">
                                                <?php $__currentLoopData = $section->element->$k->options; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $selectKey => $options): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($selectKey); ?>"><?php echo e($options); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>
                                    <?php elseif($k == 'images'): ?>
                                        <?php $__currentLoopData = $type; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $imgKey => $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <input type="hidden" name="has_image" value="1">
                                            <div class="mb-3 form-group">
                                                <label class="form-label"><?php echo e(__(keyToTitle($k))); ?></label>

                                                <?php if (isset($component)) { $__componentOriginaldbcc027cdd3569f61821c56d10b77c01 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginaldbcc027cdd3569f61821c56d10b77c01 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.image-uploader','data' => ['class' => 'w-100','name' => 'image_input['.e(@$imgKey).']','imagePath' => getImage('assets/images/frontend/' . $key . '/' . @$content->data_values->$imgKey, @$section->element->images->$imgKey->size),'id' => 'addImage'.e($loop->index).'','size' => $section->element->images->$imgKey->size]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('image-uploader'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'w-100','name' => 'image_input['.e(@$imgKey).']','imagePath' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(getImage('assets/images/frontend/' . $key . '/' . @$content->data_values->$imgKey, @$section->element->images->$imgKey->size)),'id' => 'addImage'.e($loop->index).'','size' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($section->element->images->$imgKey->size)]); ?>
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
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php elseif($type == 'textarea'): ?>

                                        <div class="mb-3 form-group">
                                            <label class="form-label"><?php echo e(__(keyToTitle($k))); ?></label>
                                            <textarea rows="4" class="form-control" name="<?php echo e($k); ?>" <?php echo e($key == 'promotion' ? 'nullable' : 'required'); ?>></textarea>
                                        </div>
                                    <?php elseif($type == 'textarea-nic'): ?>
                                        <div class="mb-3 form-group">
                                            <label class="form-label"><?php echo e(__(keyToTitle($k))); ?></label>
                                            <textarea rows="4" class="form-control nicEdit" name="<?php echo e($k); ?>"></textarea>
                                        </div>
                                    <?php else: ?>
                                        <div class="mb-3 form-group">
                                            <label class="form-label"><?php echo e(__(keyToTitle($k))); ?></label>
                                            <input type="text" class="form-control" name="<?php echo e($k); ?>" required />
                                        </div>
                                    <?php endif; ?>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary w-100"><?php echo app('translator')->get('Submit'); ?></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        
        <div id="updateBtn" class="modal fade" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title"> <?php echo app('translator')->get('Update'); ?> <?php echo e(__(keyToTitle($key))); ?> <?php echo app('translator')->get('Item'); ?></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="<?php echo e(route('admin.frontend.sections.content', $key)); ?>" class="edit-route" method="POST" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <input type="hidden" name="type" value="element">
                        <input type="hidden" name="id">
                        <div class="modal-body">
                            <?php $__currentLoopData = $section->element; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($k != 'modal'): ?>
                                    <?php if($type == 'icon'): ?>
                                        <div class="mb-3 form-group">
                                            <label class="form-label"><?php echo e(keyToTitle($k)); ?></label>
                                            <div class="input-group">
                                                <input type="text" class="form-control iconPicker icon" autocomplete="off" name="<?php echo e($k); ?>" required>
                                                <span class="input-group-text input-group-addon" data-icon="las la-home" role="iconpicker"></span>
                                            </div>
                                        </div>
                                    <?php elseif($k == 'select'): ?>
                                        <div class="mb-3 form-group">
                                            <label class="form-label"><?php echo e(keyToTitle(@$section->element->$k->name)); ?></label>
                                            <select class="form-control" name="<?php echo e(@$section->element->$k->name); ?>">
                                                <?php $__currentLoopData = $section->element->$k->options; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $selectKey => $options): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($selectKey); ?>"><?php echo e($options); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>
                                    <?php elseif($k == 'images'): ?>
                                        <?php $__currentLoopData = $type; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $imgKey => $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <input type="hidden" name="has_image" value="1">
                                            <div class="mb-3 form-group">
                                                <label class="form-label"><?php echo e(__(keyToTitle($k))); ?></label>

                                                <?php if (isset($component)) { $__componentOriginaldbcc027cdd3569f61821c56d10b77c01 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginaldbcc027cdd3569f61821c56d10b77c01 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.image-uploader','data' => ['class' => 'w-100','imagePath' => getImage('', $section->element->images->$imgKey->size),'name' => 'image_input['.e(@$imgKey).']','id' => 'updateImage'.e($loop->index).'','size' => $section->element->images->$imgKey->size,'required' => false]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('image-uploader'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'w-100','imagePath' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(getImage('', $section->element->images->$imgKey->size)),'name' => 'image_input['.e(@$imgKey).']','id' => 'updateImage'.e($loop->index).'','size' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($section->element->images->$imgKey->size),'required' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(false)]); ?>
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
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php elseif($type == 'textarea'): ?>
                                        <div class="mb-3 form-group">
                                            <label class="form-label"><?php echo e(keyToTitle($k)); ?></label>
                                            <textarea rows="4" class="form-control" name="<?php echo e($k); ?>"  <?php echo e($key == 'promotion' ? '' : 'required'); ?>></textarea>
                                        </div>
                                    <?php elseif($type == 'textarea-nic'): ?>
                                        <div class="mb-3 form-group">
                                            <label class="form-label"><?php echo e(keyToTitle($k)); ?></label>
                                            <textarea rows="4" class="form-control nicEdit" name="<?php echo e($k); ?>"></textarea>
                                        </div>
                                    <?php else: ?>
                                        <div class="mb-3 form-group">
                                            <label class="form-label"><?php echo e(keyToTitle($k)); ?></label>
                                            <input type="text" class="form-control" name="<?php echo e($k); ?>" required />
                                        </div>
                                    <?php endif; ?>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>

                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary w-100"><?php echo app('translator')->get('Submit'); ?></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    <?php endif; ?>
    

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
    <div class="flex-wrap gap-2 d-flex justify-content-end align-items-center">
        <?php if(@$section->element): ?>
            <?php if($section->element->modal): ?>
                <a href="javascript:void(0)" class="btn btn-outline-primary me-1 addBtn"><i class="las la-plus"></i><?php echo app('translator')->get('Add New'); ?></a>
            <?php else: ?>
                <a href="<?php echo e(route('admin.frontend.sections.element', $key)); ?>" class="btn btn-sm btn-outline-primary"><i class="las la-plus"></i><?php echo app('translator')->get('Add New'); ?></a>
            <?php endif; ?>
        <?php endif; ?>
    </div>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('style-lib'); ?>
    <link href="<?php echo e(asset('assets/admin/css/fontawesome-iconpicker.min.css')); ?>" rel="stylesheet">
<?php $__env->stopPush(); ?>

<?php $__env->startPush('script-lib'); ?>
    <script src="<?php echo e(asset('assets/admin/js/fontawesome-iconpicker.js')); ?>"></script>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('script'); ?>
    <script>
        (function($) {
            "use strict";
            $('.addBtn').on('click', function() {
                var modal = $('#addModal');
                modal.modal('show');
            });

            $('.updateBtn').on('click', function() {
                var modal = $('#updateBtn');
                modal.find('input[name=id]').val($(this).data('id'));

                var obj = $(this).data('all');
                var images = $(this).data('images');

                var imagePreviews = modal.find('.image-upload-preview');


                if (images) {

                    for (var i = 0; i < images.length; i++) {

                        var imgloc = images[i];

                        $(imagePreviews[i]).css("background-image", "url(" + imgloc + ")");
                    }
                }
                $.each(obj, function(index, value) {
                    modal.find('[name=' + index + ']').val(value);
                });
                modal.modal('show');
            });

            $('#updateBtn').on('shown.bs.modal', function(e) {
                $(document).off('focusin.modal');
            });
            $('#addModal').on('shown.bs.modal', function(e) {
                $(document).off('focusin.modal');
            });
            $('.iconPicker').iconpicker().on('iconpickerSelected', function(e) {
                $(this).closest('.form-group').find('.iconpicker-input').val(`<i class="${e.iconpickerValue}"></i>`);
            });
        })(jQuery);
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.app',['title'=>$section->name], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/amlaek/public_html/resources/views/admin/frontend/index.blade.php ENDPATH**/ ?>
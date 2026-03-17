
<?php $__env->startSection('panel'); ?>
	<div class="row">
		<div class="col-lg-12">
			<div class="card">
				<div class="card-body">
					<div class="table-responsive--md table-responsive">
						<table class="table">
							<thead class="table-light">
								<tr>
									<th><?php echo app('translator')->get('Image'); ?></th>
									<th><?php echo app('translator')->get('Name'); ?></th>
									<th> <?php echo app('translator')->get('Name'); ?> (<?php echo app('translator')->get('Arabic'); ?>)</th>
									<th><?php echo app('translator')->get('Status'); ?></th>
									<th><?php echo app('translator')->get('Action'); ?></th>
								</tr>
							</thead>
							<tbody>
								<?php $__empty_1 = true; $__currentLoopData = $auctionCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
									<tr>
										<td>
											<img style="width: 50px; height: 50px;"
												src="<?php echo e(getImage(getFilePath('all_category') . '/' . $category->image, getFileSize('all_category'))); ?>"
												alt="Image" class="img-fluid">
										</td>
										<td> <?php echo e($category->name); ?> </td>
										<td> <?php echo e($category->name_ar); ?> </td>
										<td>
											<?php if($category->status === 1): ?>
												<span class="badge bg-success"><?php echo app('translator')->get('Active'); ?></span>
											<?php else: ?>
												<span class="badge bg-warning"><?php echo app('translator')->get('Inactive'); ?></span>
											<?php endif; ?>
										</td>
										<td>
											<div class="btn-group">
												<button data-bs-toggle="dropdown">
													<i class="fa-solid fa-ellipsis-vertical"></i>
												</button>
												<ul class="dropdown-menu dropdown-menu-end">
													<li>
														<a href="<?php echo e(route('admin.auction-category.edit', $category->id)); ?>">
															<i class="bi bi-pencil"></i><?php echo app('translator')->get('Edit'); ?>
														</a>
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
				<?php if($auctionCategories->hasPages()): ?>
					<div class="card-footer pagination-card-footer">
						<?php echo e(paginateLinks($auctionCategories)); ?>

					</div>
				<?php endif; ?>
			</div>
		</div>

	</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('breadcrumb-plugins'); ?>
	<div class="flex-wrap gap-3 d-flex">
		<?php if (isset($component)) { $__componentOriginale48b4598ffc2f41a085f001458a956d1 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale48b4598ffc2f41a085f001458a956d1 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.search-form','data' => ['placeholder' => 'Search']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('search-form'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['placeholder' => 'Search']); ?>
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
		<a href="<?php echo e(route('admin.auction-category.create')); ?>" class="btn btn-primary"> <i
				class="fa-solid fa-plus"></i><?php echo app('translator')->get('Add New'); ?></a>
	</div>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.app', ['title' => 'Categories'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\soudi-project\Amlek\resources\views/admin/auction_categories/index.blade.php ENDPATH**/ ?>
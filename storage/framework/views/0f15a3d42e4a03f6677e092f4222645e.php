<?php if (isset($component)) { $__componentOriginal23a33f287873b564aaf305a1526eada4 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal23a33f287873b564aaf305a1526eada4 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.layout','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
	 <?php $__env->slot('title', null, []); ?> Halaman Daftar Ruangan <?php $__env->endSlot(); ?>
	 <?php $__env->slot('page_heading', null, []); ?> Daftar Ruangan <?php $__env->endSlot(); ?>

	<div class="card">
		<div class="card-body">
			<?php echo $__env->make('utilities.alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
			<div class="d-flex justify-content-end mb-3">
				<div class="btn-group">
					<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('import ruangan')): ?>
					<button type="button" class="btn btn-primary mr-2" data-toggle="modal" data-target="#excel_menu">
						<i class="fas fa-fw fa-upload"></i>
						Import Excel
					</button>
					<?php endif; ?>

					<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('export ruangan')): ?>
					<button type="button" class="btn btn-success mr-2" data-toggle="modal" data-target="#export_menu">
						<i class="fas fa-fw fa-download"></i>
						Export
					</button>
					<?php endif; ?>

					<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('tambah ruangan')): ?>
					<button type="button" class="btn btn-primary" data-toggle="modal"
						data-target="#commodity_location_create_modal">
						<i class="fas fa-fw fa-plus"></i>
						Tambah Data
					</button>
					<?php endif; ?>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12">
					<?php if (isset($component)) { $__componentOriginal8aaf9779783cdf64609094123653a0b9 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8aaf9779783cdf64609094123653a0b9 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.datatable.index','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('datatable'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
						<thead>
							<tr>
								<th scope="col">#</th>
								<th scope="col">Nama</th>
								<th scope="col">Deskripsi</th>
								<th scope="col">Aksi</th>
							</tr>
						</thead>
						<tbody>
							<?php $__currentLoopData = $commodity_locations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $commodity_location): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<tr>
								<th scope="row"><?php echo e($loop->iteration); ?></th>
								<td><?php echo e($commodity_location->name); ?></td>
								<td><?php echo e(Str::limit($commodity_location->description, 55, '...')); ?></td>
								<td class="text-center">
									<div class="btn-group" role="group" aria-label="Basic example">
										<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('detail ruangan')): ?>
										<a data-id="<?php echo e($commodity_location->id); ?>" class="btn btn-sm btn-info text-white show-modal mr-2"
											data-toggle="modal" data-target="#show_commodity_location">
											<i class="fas fa-fw fa-search"></i>
										</a>
										<?php endif; ?>
										<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('ubah ruangan')): ?>
										<a data-id="<?php echo e($commodity_location->id); ?>" class="btn btn-sm btn-success text-white edit-modal mr-2"
											data-toggle="modal" data-target="#commodity_location_edit_modal" data-placement="top"
											title="Ubah data">
											<i class="fas fa-fw fa-edit"></i>
										</a>
										<?php endif; ?>
										<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('hapus ruangan')): ?>
										<form action="<?php echo e(route('ruangan.destroy', $commodity_location->id)); ?>" method="POST">
											<?php echo csrf_field(); ?>
											<?php echo method_field('DELETE'); ?>
											<button type="submit" class="btn btn-sm btn-danger text-white delete-button">
												<i class="fas fa-fw fa-trash-alt"></i>
											</button>
										</form>
										<?php endif; ?>
									</div>
								</td>
							</tr>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						</tbody>
					 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal8aaf9779783cdf64609094123653a0b9)): ?>
<?php $attributes = $__attributesOriginal8aaf9779783cdf64609094123653a0b9; ?>
<?php unset($__attributesOriginal8aaf9779783cdf64609094123653a0b9); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8aaf9779783cdf64609094123653a0b9)): ?>
<?php $component = $__componentOriginal8aaf9779783cdf64609094123653a0b9; ?>
<?php unset($__componentOriginal8aaf9779783cdf64609094123653a0b9); ?>
<?php endif; ?>
				</div>
			</div>
		</div>
	</div>

	<?php $__env->startPush('modal'); ?>
	<?php echo $__env->make('commodity-locations.modal.create', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	<?php echo $__env->make('commodity-locations.modal.show', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	<?php echo $__env->make('commodity-locations.modal.edit', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	<?php echo $__env->make('commodity-locations.modal.import', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	<?php echo $__env->make('commodity-locations.modal.export', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	<?php $__env->stopPush(); ?>

	<?php $__env->startPush('js'); ?>
	<?php echo $__env->make('commodity-locations._script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	<?php $__env->stopPush(); ?>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal23a33f287873b564aaf305a1526eada4)): ?>
<?php $attributes = $__attributesOriginal23a33f287873b564aaf305a1526eada4; ?>
<?php unset($__attributesOriginal23a33f287873b564aaf305a1526eada4); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal23a33f287873b564aaf305a1526eada4)): ?>
<?php $component = $__componentOriginal23a33f287873b564aaf305a1526eada4; ?>
<?php unset($__componentOriginal23a33f287873b564aaf305a1526eada4); ?>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\aplikasi_inventaris_smk\resources\views/commodity-locations/index.blade.php ENDPATH**/ ?>
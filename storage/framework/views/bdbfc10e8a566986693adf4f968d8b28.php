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
	 <?php $__env->slot('title', null, []); ?> Halaman Daftar Peran dan Hak Akses <?php $__env->endSlot(); ?>
	 <?php $__env->slot('page_heading', null, []); ?> Daftar Peran dan Hak Akses <?php $__env->endSlot(); ?>

	<div class="card">
		<div class="card-body">
			<?php echo $__env->make('utilities.alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
			<div class="d-flex justify-content-end mb-3">
				<div class="btn-group">
					<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('tambah peran dan hak akses')): ?>
					<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#role_create_modal">
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
								<th scope="col">Daftar Hak Akses</th>
								<th scope="col">Aksi</th>
							</tr>
						</thead>
						<tbody>
							<?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<tr>
								<th scope="row"><?php echo e($loop->iteration); ?></th>
								<td><?php echo e($role->name); ?></td>
								<td>
									<?php $__currentLoopData = $role->permissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $permission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<span class="badge badge-primary my-1"><?php echo e($permission->name); ?></span>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
								</td>
								<td class="text-center">
									<div class="btn-group" role="group" aria-label="Basic example">
										<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('ubah peran dan hak akses')): ?>
										<a data-id="<?php echo e($role->id); ?>" class="btn btn-sm btn-success text-white edit-modal mr-2"
											data-toggle="modal" data-target="#role_edit_modal" title="Ubah data">
											<i class="fas fa-fw fa-edit"></i>
										</a>
										<?php endif; ?>

										<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('hapus peran dan hak akses')): ?>
										<form action="<?php echo e(route('peran-dan-hak-akses.destroy', $role)); ?>" method="POST">
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
	<?php echo $__env->make('roles.modal.create', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	<?php echo $__env->make('roles.modal.edit', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	<?php $__env->stopPush(); ?>

	<?php $__env->startPush('js'); ?>
	<?php echo $__env->make('roles._script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
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
<?php /**PATH C:\xampp\htdocs\aplikasi_inventaris_smk\resources\views/roles/index.blade.php ENDPATH**/ ?>
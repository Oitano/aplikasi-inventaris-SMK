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
	 <?php $__env->slot('title', null, []); ?> Halaman Daftar Pengguna <?php $__env->endSlot(); ?>
	 <?php $__env->slot('page_heading', null, []); ?> Daftar Pengguna <?php $__env->endSlot(); ?>

	<div class="row justify-content-center">
		<?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		<div class="col-lg-3 col-md-6 col-sm-6 col-12">
			<div class="card card-statistic-1">
				<div class="card-icon bg-primary">
					<i class="fas fa-users"></i>
				</div>
				<div class="card-wrap">
					<div class="card-header">
						<h4>Total <?php echo e($role->name); ?></h4>
					</div>
					<div class="card-body">
						<?php echo e($role->users_count); ?>

					</div>
				</div>
			</div>
		</div>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	</div>
	<div class="card">
		<div class="card-body">
			<?php echo $__env->make('utilities.alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
			<div class="d-flex justify-content-end mb-3">
				<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('tambah pengguna')): ?>
				<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#user_create_modal">
					<i class="fas fa-fw fa-plus"></i>
					Tambah Data
				</button>
				<?php endif; ?>
			</div>

			<?php if (isset($component)) { $__componentOriginal2848fab3424fc8162748b5c6984d5047 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal2848fab3424fc8162748b5c6984d5047 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.filter.index','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('filter'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label for="role_id">Peran:</label>
							<select name="role_id" id="role_id" class="<?php echo \Illuminate\Support\Arr::toCssClasses(['form-control' , 'is-valid'=>
								request()->filled('role_id')]); ?>">
								<option value="">Pilih peran..</option>
								<?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<option value="<?php echo e($role->id); ?>" <?php if(request('role_id')==$role->id): echo 'selected'; endif; ?>>
									<?php echo e($role->name); ?>

								</option>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							</select>
						</div>
					</div>
				</div>

				 <?php $__env->slot('resetFilterURL', null, []); ?> <?php echo e(route('pengguna.index')); ?> <?php $__env->endSlot(); ?>
			 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal2848fab3424fc8162748b5c6984d5047)): ?>
<?php $attributes = $__attributesOriginal2848fab3424fc8162748b5c6984d5047; ?>
<?php unset($__attributesOriginal2848fab3424fc8162748b5c6984d5047); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal2848fab3424fc8162748b5c6984d5047)): ?>
<?php $component = $__componentOriginal2848fab3424fc8162748b5c6984d5047; ?>
<?php unset($__componentOriginal2848fab3424fc8162748b5c6984d5047); ?>
<?php endif; ?>

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
								<th scope="col">Nama Lengkap</th>
								<th scope="col">Alamat Email</th>
								<th scope="col">Peran</th>
								<th scope="col">Status</th>
								<th scope="col">Tanggal Ditambahkan</th>
								<th scope="col">Aksi</th>
							</tr>
						</thead>
						<tbody>
							<?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<tr>
								<th scope="row"><?php echo e($loop->iteration); ?></th>
								<td><?php echo e($user->name); ?></td>
								<td><?php echo e($user->email); ?></td>
								<td><?php echo e($user->getRoleNames()->first()); ?></td>
								<td><span class="badge badge-<?php echo e($user->status === 'Aktif' ? 'success' : 'secondary'); ?>"><?php echo e($user->status); ?></span></td>
								<td><?php echo e(date('m/d/Y H:i A', strtotime($user->created_at))); ?></td>
								<td class="text-center">
									<div class="btn-group">
										<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('detail pengguna')): ?>
										<a data-id="<?php echo e($user->id); ?>" class="btn btn-sm btn-info text-white show-modal mr-2"
											data-toggle="modal" data-target="#show_user">
											<i class="fas fa-fw fa-search"></i>
										</a>
										<?php endif; ?>
										<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('ubah pengguna')): ?>
										<a data-id="<?php echo e($user->id); ?>" class="btn btn-sm btn-success text-white edit-modal mr-2"
											data-toggle="modal" data-target="#user_edit_modal" title="Ubah data">
											<i class="fas fa-fw fa-edit"></i>
										</a>
										<?php endif; ?>
										<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('hapus pengguna')): ?>
										<form action="<?php echo e(route('pengguna.destroy', $user->id)); ?>" method="POST">
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
	<?php echo $__env->make('users.modal.create', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	<?php echo $__env->make('users.modal.show', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	<?php echo $__env->make('users.modal.edit', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	<?php $__env->stopPush(); ?>

	<?php $__env->startPush('js'); ?>
	<?php echo $__env->make('users._script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
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
<?php /**PATH C:\xampp\htdocs\aplikasi_inventaris_smk\resources\views/users/index.blade.php ENDPATH**/ ?>
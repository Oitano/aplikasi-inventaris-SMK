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
	 <?php $__env->slot('title', null, []); ?> Halaman Daftar Barang <?php $__env->endSlot(); ?>
	 <?php $__env->slot('page_heading', null, []); ?> Daftar Barang <?php $__env->endSlot(); ?>

	<div class="row">
		<div class="col-lg-3 col-md-6 col-sm-6 col-12">
			<div class="card card-statistic-1">
				<div class="card-icon bg-primary">
					<i class="fas fa-columns"></i>
				</div>
				<div class="card-wrap">
					<div class="card-header">
						<h4>Total Barang</h4>
					</div>
					<div class="card-body">
						<?php echo e($commodity_counts['commodity_in_total']); ?>

					</div>
				</div>
			</div>
		</div>
		<div class="col-lg-3 col-md-6 col-sm-6 col-12">
			<div class="card card-statistic-1">
				<div class="card-icon bg-success">
					<i class="fas fa-fw fa-check-circle"></i>
				</div>
				<div class="card-wrap">
					<div class="card-header">
						<h4>Kondisi Baik</h4>
					</div>
					<div class="card-body">
						<?php echo e($commodity_counts['commodity_in_good_condition']); ?>

					</div>
				</div>
			</div>
		</div>
		<div class="col-lg-3 col-md-6 col-sm-6 col-12">
			<div class="card card-statistic-1">
				<div class="card-icon bg-warning">
					<i class="fas fa-fw fa-exclamation-circle"></i>
				</div>
				<div class="card-wrap">
					<div class="card-header">
						<h4>Kondisi Rusak Ringan</h4>
					</div>
					<div class="card-body">
						<?php echo e($commodity_counts['commodity_in_not_good_condition']); ?>

					</div>
				</div>
			</div>
		</div>
		<div class="col-lg-3 col-md-6 col-sm-6 col-12">
			<div class="card card-statistic-1">
				<div class="card-icon bg-danger">
					<i class="fas fa-fw fa-times-circle"></i>
				</div>
				<div class="card-wrap">
					<div class="card-header">
						<h4>Kondisi Rusak Berat</h4>
					</div>
					<div class="card-body">
						<?php echo e($commodity_counts['commodity_in_heavily_damage_condition']); ?>

					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="card">
		<div class="card-body">
			<?php echo $__env->make('utilities.alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
			<div class="d-flex justify-content-end mb-3">
				<div class="btn-group">
					<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('import barang')): ?>
					<button type="button" class="btn btn-primary mr-2" data-toggle="modal" data-target="#excel_menu">
						<i class="fas fa-fw fa-upload"></i>
						Import Excel
					</button>
					<?php endif; ?>

					<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('export barang')): ?>
					<button type="button" class="btn btn-success mr-2" data-toggle="modal" data-target="#export_menu">
						<i class="fas fa-fw fa-download"></i>
						Export
					</button>
					<?php endif; ?>

					<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('tambah barang')): ?>
					<button type="button" class="btn btn-primary mr-2" data-toggle="modal" data-target="#commodity_create_modal">
						<i class="fas fa-fw fa-plus"></i>
						Tambah Data
					</button>
					<?php endif; ?>

					<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('print barang')): ?>
					<form action="<?php echo e(route('barang.print')); ?>" method="POST">
						<?php echo csrf_field(); ?>
						<button type="submit" class="btn btn-success">
							<i class="fas fa-fw fa-print"></i>
							Print
						</button>
					</form>
					<?php endif; ?>
				</div>
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
							<label for="commodity_location_id">Lokasi Barang:</label>
							<select name="commodity_location_id" id="commodity_location_id" class="<?php echo \Illuminate\Support\Arr::toCssClasses([ 'form-control' , 'is-valid'=>
								request()->filled('commodity_location_id')
								]); ?>"
								>
								<option value="">Pilih lokasi barang..</option>
								<?php $__currentLoopData = $commodity_locations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $commodity_location): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<option value="<?php echo e($commodity_location->id); ?>"
									<?php if(request('commodity_location_id')==$commodity_location->id): echo 'selected'; endif; ?>><?php echo e($commodity_location->name); ?></option>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label for="commodity_acquisition_id">Asal Perolehan:</label>
							<select name="commodity_acquisition_id" id="commodity_acquisition_id" class="<?php echo \Illuminate\Support\Arr::toCssClasses([ 'form-control'
								, 'is-valid'=> request()->filled('commodity_acquisition_id')
								]); ?>"
								>
								<option value="">Pilih asal perolehan..</option>
								<?php $__currentLoopData = $commodity_acquisitions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $commodity_acquisition): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<option value="<?php echo e($commodity_acquisition->id); ?>"
									<?php if(request('commodity_acquisition_id')==$commodity_acquisition->id): echo 'selected'; endif; ?>><?php echo e($commodity_acquisition->name); ?>

								</option>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							</select>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label for="condition">Kondisi:</label>
							<select name="condition" id="condition" class="<?php echo \Illuminate\Support\Arr::toCssClasses([ 'form-control' , 'is-valid'=>
								request()->filled('condition')
								]); ?>"
								>
								<option value="">Pilih kondisi..</option>
								<option value="1" <?php if(request('condition')==1): echo 'selected'; endif; ?>>Baik</option>
								<option value="2" <?php if(request('condition')==2): echo 'selected'; endif; ?>>Rusak Ringan</option>
								<option value="3" <?php if(request('condition')==3): echo 'selected'; endif; ?>>Rusak Berat</option>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label for="year_of_purchase">Tahun Pembelian:</label>
							<select name="year_of_purchase" id="year_of_purchase" class="<?php echo \Illuminate\Support\Arr::toCssClasses([ 'form-control' , 'is-valid'=>
								request()->filled('year_of_purchase')
								]); ?>"
								>
								<option value="">Pilih tahun pembelian..</option>
								<?php $__currentLoopData = $year_of_purchases; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $year_of_purchase): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<option value="<?php echo e($year_of_purchase); ?>" <?php if(request('year_of_purchase')==$year_of_purchase): echo 'selected'; endif; ?>><?php echo e($year_of_purchase); ?></option>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							</select>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label for="material">Bahan:</label>
							<select name="material" id="material" class="<?php echo \Illuminate\Support\Arr::toCssClasses([ 'form-control' , 'is-valid'=> request()->filled('material')
								]); ?>"
								>
								<option value="">Pilih bahan..</option>
								<?php $__currentLoopData = $commodity_materials; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $material): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<option value="<?php echo e($material); ?>" <?php if(request('material')==$material): echo 'selected'; endif; ?>><?php echo e($material); ?></option>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label for="brand">Merk:</label>
							<select name="brand" id="brand" class="<?php echo \Illuminate\Support\Arr::toCssClasses([ 'form-control' , 'is-valid'=> request()->filled('brand')
								]); ?>"
								>
								<option value="">Pilih merk..</option>
								<?php $__currentLoopData = $commodity_brands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<option value="<?php echo e($brand); ?>" <?php if(request('brand')==$brand): echo 'selected'; endif; ?>><?php echo e($brand); ?></option>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							</select>
						</div>
					</div>
				</div>


				<div class="row">
					<div class="col-md-4">
						<div class="form-group">
							<label for="category">Kategori:</label>
							<select name="category" id="category" class="<?php echo \Illuminate\Support\Arr::toCssClasses(['form-control', 'is-valid' => request()->filled('category')]); ?>">
								<option value="">Pilih kategori..</option>
								<?php $__currentLoopData = $commodity_categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<option value="<?php echo e($category); ?>" <?php if(request('category') === $category): echo 'selected'; endif; ?>><?php echo e($category); ?></option>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							</select>
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label for="status">Status:</label>
							<select name="status" id="status" class="<?php echo \Illuminate\Support\Arr::toCssClasses(['form-control', 'is-valid' => request()->filled('status')]); ?>">
								<option value="">Pilih status..</option>
								<?php $__currentLoopData = \App\Commodity::STATUSES; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $status): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<option value="<?php echo e($status); ?>" <?php if(request('status') === $status): echo 'selected'; endif; ?>><?php echo e($status); ?></option>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							</select>
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label for="unit">Satuan:</label>
							<select name="unit" id="unit" class="<?php echo \Illuminate\Support\Arr::toCssClasses(['form-control', 'is-valid' => request()->filled('unit')]); ?>">
								<option value="">Pilih satuan..</option>
								<?php $__currentLoopData = \App\Commodity::UNITS; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $unit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<option value="<?php echo e($unit); ?>" <?php if(request('unit') === $unit): echo 'selected'; endif; ?>><?php echo e($unit); ?></option>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							</select>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-md-4">
						<div class="form-group">
							<label for="input_date">Tanggal Input:</label>
							<input
								type="date"
								name="input_date"
								id="input_date"
								value="<?php echo e(request('input_date')); ?>"
								class="form-control"
							>
						</div>
					</div>

					<div class="col-md-4">
						<div class="form-group">
							<label for="store_name">Nama Toko:</label>
							<input
								type="text"
								name="store_name"
								id="store_name"
								value="<?php echo e(request('store_name')); ?>"
								placeholder="Cari nama toko.."
								class="form-control"
							>
						</div>
					</div>

					<div class="col-md-4">
						<div class="form-group">
							<label for="phone_number">Nomor HP:</label>
							<input
								type="text"
								name="phone_number"
								id="phone_number"
								value="<?php echo e(request('phone_number')); ?>"
								placeholder="Cari nomor HP.."
								class="form-control"
							>
						</div>
					</div>
				</div>

				 <?php $__env->slot('resetFilterURL', null, []); ?> <?php echo e(route('barang.index')); ?> <?php $__env->endSlot(); ?>
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
								<th scope="col">Kode Barang</th>
								<th scope="col">Nama Barang</th>
								<th scope="col">Kategori</th>
								<th scope="col">Lokasi</th>
								<th scope="col">Kuantitas</th>
								<th scope="col">Satuan</th>
								<th scope="col">Kondisi</th>
								<th scope="col">Status</th>
								<th scope="col">Aksi</th>
							</tr>
						</thead>
						<tbody>
							<?php $__currentLoopData = $commodities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $commodity): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<tr>
								<th scope="row"><?php echo e($loop->iteration); ?></th>
								<td class="text-center align-middle">
									<div class="d-flex flex-column align-items-center">
										<span class="badge badge-primary mb-2">
											<?php echo e($commodity->item_code); ?>

										</span>
										<span class="d-flex align-items-center">
											<span class="badge badge-pill badge-info px-3"
												title="<?php echo e($commodity->commodity_acquisition->name); ?>">
												<i class="fa fa-fw far fa-face-laugh mr-1"></i>
												<?php echo e($commodity->commodity_acquisition->name); ?>

											</span>
										</span>
									</div>
								</td>
								<td><?php echo e(Str::limit($commodity->name, 55, '...')); ?></td>
								<td><span class="badge badge-light"><?php echo e($commodity->category ?? 'Lainnya'); ?></span></td>
								<td><?php echo e(optional($commodity->commodity_location)->name ?? '-'); ?></td>
								<td class="text-center"><?php echo e($commodity->quantity ?? 0); ?></td>
								<td class="text-center"><?php echo e($commodity->unit ?? 'Unit'); ?></td>
								<?php if($commodity->condition === 1): ?>
								<td>
									<span class="badge badge-pill badge-success" title="Baik">
										<i class="fas fa-fw fa-check-circle"></i>
										Baik
									</span>
								</td>
								<?php elseif($commodity->condition === 2): ?>
								<td>
									<span class="badge badge-pill badge-warning" title="Rusak Ringan">
										<i class="fa fa-fw fa-exclamation-circle"></i>
										Rusak Ringan
									</span>
								</td>
								<?php else: ?>
								<td>
									<span class="badge badge-pill badge-danger" title="Rusak Berat">
										<i class="fa fa-fw fa-times-circle"></i>
										Rusak Berat</span>
								</td>
								<?php endif; ?>
								<td class="text-center">
									<span class="badge badge-pill badge-<?php echo e($commodity->getStatusBadgeClass()); ?>">
										<?php echo e($commodity->status ?? 'Tersedia'); ?>

									</span>
								</td>
								<td class="text-center">
									<div class="btn-group" role="group" aria-label="Basic example">
										<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('detail barang')): ?>
										<a data-id="<?php echo e($commodity->id); ?>" class="btn btn-sm btn-info text-white show-modal mr-2"
											data-toggle="modal" data-target="#show_commodity" title="Lihat Detail">
											<i class="fas fa-fw fa-search"></i>
										</a>
										<?php endif; ?>

										<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('ubah barang')): ?>
										<a data-id="<?php echo e($commodity->id); ?>" class="btn btn-sm btn-success text-white edit-modal mr-2"
											data-toggle="modal" data-target="#edit_commodity" title="Ubah data">
											<i class="fas fa-fw fa-edit"></i>
										</a>
										<?php endif; ?>

										<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('print individual barang')): ?>
										<form action="<?php echo e(route('barang.print-individual', $commodity->id)); ?>" method="POST">
											<?php echo csrf_field(); ?>
											<button type="submit" class="btn btn-sm btn-primary mr-2">
												<i class="fas fa-fw fa-print"></i>
											</button>
										</form>
										<?php endif; ?>

										<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('hapus barang')): ?>
										<form action="<?php echo e(route('barang.destroy', $commodity)); ?>" method="POST">
											<?php echo csrf_field(); ?>
											<?php echo method_field('DELETE'); ?>
											<button type="submit" class="btn btn-sm btn-danger delete-button"><i
													class="fas fa-fw fa-trash-alt"></i></button>
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
	<?php echo $__env->make('commodities.modal.show', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	<?php echo $__env->make('commodities.modal.create', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	<?php echo $__env->make('commodities.modal.edit', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	<?php echo $__env->make('commodities.modal.import', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	<?php echo $__env->make('commodities.modal.export', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	<?php $__env->stopPush(); ?>

	<?php $__env->startPush('js'); ?>
	<?php echo $__env->make('commodities._script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
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
<?php endif; ?><?php /**PATH C:\xampp\htdocs\aplikasi_inventaris_smk\resources\views/commodities/index.blade.php ENDPATH**/ ?>
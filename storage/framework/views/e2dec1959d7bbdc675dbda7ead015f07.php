<div class="modal fade" id="commodity_create_modal" data-backdrop="static" data-keyboard="false" tabindex="-1"
	role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="modalLabel">Tambah Data Barang</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>

			<div class="modal-body">
				<div class="d-flex align-items-center">
					<i class="text-warning fa-solid fa-circle-info mr-2"></i>
					<p class="font-italic mb-0">
						Kolom yang memiliki tanda merah <span class="font-weight-bold">wajib diisi.</span>
					</p>
				</div>
				<hr>
				<form action="<?php echo e(route('barang.store')); ?>" method="POST" enctype="multipart/form-data">
					<?php echo csrf_field(); ?>
					<div class="row">
						<div class="col-lg-4">
							<div class="form-group">
								<label for="item_code">Kode Barang<span class="font-weight-bold text-danger">*</span></label>
								<input type="text" class="form-control <?php $__errorArgs = ['item_code', 'store'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
									name="item_code" id="item_code" value="<?php echo e(old('item_code')); ?>" placeholder="Masukan kode barang..">
								<?php $__errorArgs = ['item_code', 'store'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
								<div class="d-block invalid-feedback">
									<?php echo e($message); ?>

								</div>
								<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
							</div>
						</div>
						<div class="col-lg-4">
							<div class="form-group">
								<label for="name">Nama Barang<span class="font-weight-bold text-danger">*</span></label>
								<input type="text" class="form-control <?php $__errorArgs = ['name', 'store'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="name"
									id="name" value="<?php echo e(old('name')); ?>" placeholder="Masukan nama barang..">
								<?php $__errorArgs = ['name', 'store'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
								<div class="d-block invalid-feedback">
									<?php echo e($message); ?>

								</div>
								<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
							</div>
						</div>
						<div class="col-lg-4">
							<div class="form-group">
								<label for="commodity_location_id">Lokasi Barang<span
										class="font-weight-bold text-danger">*</span></label>
								<select class="form-control <?php $__errorArgs = ['commodity_location_id', 'store'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
									name="commodity_location_id" id="commodity_location_id" style="width: 100%;">
									<option value="" selected>Pilih..</option>
									<?php $__currentLoopData = $commodity_locations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $commodity_location): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<option value="<?php echo e($commodity_location->id); ?>"
										<?php if(old('commodity_location_id')==$commodity_location->id): echo 'selected'; endif; ?>><?php echo e($commodity_location->name); ?>

									</option>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
								</select>
								<?php $__errorArgs = ['commodity_location_id', 'store'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
								<div class="d-block invalid-feedback">
									<?php echo e($message); ?>

								</div>
								<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
							</div>
						</div>
					</div>


					
					<div class="row">
						<div class="col-lg-3 col-md-6">
							<div class="form-group">
								<label for="inventory_number">Nomor Inventaris <span class="font-italic">(opsional)</span></label>
								<input type="text" class="form-control <?php $__errorArgs = ['inventory_number', 'store'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
									name="inventory_number" id="inventory_number" value="<?php echo e(old('inventory_number')); ?>"
									placeholder="Contoh: INV/SMK/2026/001">
								<?php $__errorArgs = ['inventory_number', 'store'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div class="d-block invalid-feedback"><?php echo e($message); ?></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
							</div>
						</div>
						<div class="col-lg-3 col-md-6">
							<div class="form-group">
								<label for="category">Kategori <span class="font-weight-bold text-danger">*</span></label>
								<select class="form-control <?php $__errorArgs = ['category', 'store'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="category" id="category">
									<option value="">Pilih kategori..</option>
									<?php $__currentLoopData = \App\Commodity::CATEGORIES; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
										<option value="<?php echo e($category); ?>" <?php if(old('category') === $category): echo 'selected'; endif; ?>><?php echo e($category); ?></option>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
								</select>
								<?php $__errorArgs = ['category', 'store'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div class="d-block invalid-feedback"><?php echo e($message); ?></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
							</div>
						</div>
						<div class="col-lg-3 col-md-6">
							<div class="form-group">
								<label for="status">Status <span class="font-weight-bold text-danger">*</span></label>
								<select class="form-control <?php $__errorArgs = ['status', 'store'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="status" id="status">
									<option value="">Pilih status..</option>
									<?php $__currentLoopData = \App\Commodity::STATUSES; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $status): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
										<option value="<?php echo e($status); ?>" <?php if(old('status', 'Tersedia') === $status): echo 'selected'; endif; ?>><?php echo e($status); ?></option>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
								</select>
								<?php $__errorArgs = ['status', 'store'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div class="d-block invalid-feedback"><?php echo e($message); ?></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
							</div>
						</div>
						<div class="col-lg-3 col-md-6">
							<div class="form-group">
								<label for="unit">Satuan <span class="font-weight-bold text-danger">*</span></label>
								<select class="form-control <?php $__errorArgs = ['unit', 'store'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="unit" id="unit">
									<option value="">Pilih satuan..</option>
									<?php $__currentLoopData = \App\Commodity::UNITS; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $unit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
										<option value="<?php echo e($unit); ?>" <?php if(old('unit', 'Unit') === $unit): echo 'selected'; endif; ?>><?php echo e($unit); ?></option>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
								</select>
								<?php $__errorArgs = ['unit', 'store'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div class="d-block invalid-feedback"><?php echo e($message); ?></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
							</div>
						</div>
					</div>

					
					<div class="row">
    					<div class="col-lg-4">
        				<div class="form-group">
						<label for="input_date">
							Tanggal Input
							<span class="font-weight-bold text-danger">*</span>
						</label>

								<input type="date"
									class="form-control <?php $__errorArgs = ['input_date', 'store'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
									name="input_date"
									id="input_date"
									value="<?php echo e(old('input_date', date('Y-m-d'))); ?>">

								<?php $__errorArgs = ['input_date', 'store'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
									<div class="d-block invalid-feedback">
										<?php echo e($message); ?>

									</div>
								<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
							</div>
						</div>

						
						<div class="col-lg-4">
							<div class="form-group">
								<label for="store_name">
									Nama Toko
									<span class="font-weight-bold text-danger">*</span>
								</label>

								<input type="text"
									class="form-control <?php $__errorArgs = ['store_name', 'store'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
									name="store_name"
									id="store_name"
									value="<?php echo e(old('store_name')); ?>"
									placeholder="Masukan nama toko..">

								<?php $__errorArgs = ['store_name', 'store'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
									<div class="d-block invalid-feedback">
										<?php echo e($message); ?>

									</div>
								<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
							</div>
						</div>

						
						<div class="col-lg-4">
							<div class="form-group">
								<label for="store_phone">
									Nomor HP
									<span class="font-italic">(opsional)</span>
								</label>

								<input type="text"
									class="form-control <?php $__errorArgs = ['store_phone', 'store'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
									name="store_phone"
									id="store_phone"
									value="<?php echo e(old('store_phone')); ?>"
									placeholder="Contoh: 081234567890">

								<?php $__errorArgs = ['store_phone', 'store'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
									<div class="d-block invalid-feedback">
										<?php echo e($message); ?>

									</div>
								<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
							</div>
						</div>
					</div>

					
					<div class="row">
						<div class="col-12">
							<div class="form-group">
								<label for="store_address">
									Alamat Toko
									<span class="font-weight-bold text-danger">*</span>
								</label>

								<textarea
									class="form-control <?php $__errorArgs = ['store_address', 'store'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
									name="store_address"
									id="store_address"
									rows="3"
									placeholder="Masukan alamat toko.."><?php echo e(old('store_address')); ?></textarea>

								<?php $__errorArgs = ['store_address', 'store'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
									<div class="d-block invalid-feedback">
										<?php echo e($message); ?>

									</div>
								<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
							</div>
						</div>
					</div>

					
					<div class="row">
						<div class="col-12">
							<div class="form-group">
								<label for="receipt">
									Bukti Nota
									<span class="font-italic">(opsional)</span>
								</label>

								<input type="file"
									class="form-control-file <?php $__errorArgs = ['receipt', 'store'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
									name="receipt"
									id="receipt"
									accept=".jpg,.jpeg,.png,.pdf">

								<small class="form-text text-muted">
									Format: JPG, JPEG, PNG atau PDF. Maksimal 2 MB.
								</small>

								<?php $__errorArgs = ['receipt', 'store'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
									<div class="d-block invalid-feedback">
										<?php echo e($message); ?>

									</div>
								<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
							</div>
						</div>
					</div>


					
					<div class="row">
						<div class="col-12">
							<div class="form-group">
								<label for="photo">Foto Barang <span class="font-italic">(opsional)</span></label>
								<input type="file" class="form-control-file <?php $__errorArgs = ['photo', 'store'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
									name="photo" id="photo" accept=".jpg,.jpeg,.png">
								<small class="form-text text-muted">Format JPG, JPEG atau PNG. Maksimal 2 MB.</small>
								<?php $__errorArgs = ['photo', 'store'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div class="d-block invalid-feedback"><?php echo e($message); ?></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
							</div>
						</div>
					</div>

					<hr>

					<div class="row">
						<div class="col-lg-6">
							<div class="form-group">
								<label for="material">Bahan<span class="font-weight-bold text-danger">*</span></label>
								<input type="text" class="form-control <?php $__errorArgs = ['material', 'store'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="material"
									id="material" value="<?php echo e(old('material')); ?>" placeholder="Masukan bahan barang..">
								<?php $__errorArgs = ['material', 'store'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
								<div class="d-block invalid-feedback">
									<?php echo e($message); ?>

								</div>
								<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
							</div>
						</div>
						<div class="col-lg-6">
							<div class="form-group">
								<label for="brand">Merek<span class="font-weight-bold text-danger">*</span></label>
								<input type="text" class="form-control <?php $__errorArgs = ['brand', 'store'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="brand"
									id="brand" value="<?php echo e(old('brand')); ?>" placeholder="Masukan merek barang..">
								<?php $__errorArgs = ['brand', 'store'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
								<div class="d-block invalid-feedback">
									<?php echo e($message); ?>

								</div>
								<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-lg-4 col-12">
							<div class="form-group">
								<label for="year_of_purchase">Tahun Pembelian<span class="font-weight-bold text-danger">*</span></label>
								<input type="number" class="form-control <?php $__errorArgs = ['year_of_purchase', 'store'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
									name="year_of_purchase" id="year_of_purchase" value="<?php echo e(old('year_of_purchase')); ?>"
									placeholder="Masukan tahun pembelian barang..">
								<?php $__errorArgs = ['year_of_purchase', 'store'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
								<div class="d-block invalid-feedback">
									<?php echo e($message); ?>

								</div>
								<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
							</div>
						</div>
						<div class="col-lg-4 col-12">
							<div class="form-group">
								<label for="commodity_acquisition_id">Asal Perolehan<span
										class="font-weight-bold text-danger">*</span></label>
								<select class="form-control <?php $__errorArgs = ['commodity_acquisition_id', 'store'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
									name="commodity_acquisition_id" id="commodity_acquisition_id" style="width: 100%;">
									<option value="" selected">Pilih..</option>
									<?php $__currentLoopData = $commodity_acquisitions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $commodity_acquisition): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<option value="<?php echo e($commodity_acquisition->id); ?>"
										<?php if(old('commodity_acquisition_id')==$commodity_acquisition->id): echo 'selected'; endif; ?>><?php echo e($commodity_acquisition->name); ?>

									</option>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
								</select>
								<?php $__errorArgs = ['commodity_acquisition_id', 'store'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
								<div class="d-block invalid-feedback">
									<?php echo e($message); ?>

								</div>
								<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
							</div>
						</div>
						<div class="col-lg-4 col-12">
							<div class="form-group">
								<label for="condition">Kondisi<span class="font-weight-bold text-danger">*</span></label>
								<select class="form-control <?php $__errorArgs = ['condition', 'store'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="condition"
									id="condition" style="width: 100%;">
									<option value="" selected>Pilih..</option>
									<option value="1" <?php if(old('condition')==1): echo 'selected'; endif; ?>>Baik</option>
									<option value="2" <?php if(old('condition')==2): echo 'selected'; endif; ?>>Rusak Ringan</option>
									<option value="3" <?php if(old('condition')==3): echo 'selected'; endif; ?>>Rusak Berat</option>
								</select>
								<?php $__errorArgs = ['condition', 'store'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
								<div class="d-block invalid-feedback">
									<?php echo e($message); ?>

								</div>
								<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
							</div>
						</div>
					</div>

					<hr>

					<div class="row">
						<div class="col-lg-4">
							<div class="form-group">
								<label for="quantity">Kuantitas<span class="font-weight-bold text-danger">*</span></label>
								<input type="number" class="form-control <?php $__errorArgs = ['quantity', 'store'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
									name="quantity" id="quantity" value="<?php echo e(old('quantity')); ?>" placeholder="Masukan kuantitas barang..">
								<?php $__errorArgs = ['quantity', 'store'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
								<div class="d-block invalid-feedback">
									<?php echo e($message); ?>

								</div>
								<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
							</div>
						</div>
						<div class="col-lg-4 col-6">
							<div class="form-group">
								<label for="price">Harga<span class="font-weight-bold text-danger">*</span></label>
								<div class="input-group">
									<div class="input-group-prepend">
										<span class="input-group-text" id="basic-addon1">Rp.</span>
									</div>
									<input type="number" class="form-control <?php $__errorArgs = ['price', 'store'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="price"
										id="price" value="<?php echo e(old('price')); ?>" placeholder="Masukan harga barang..">
									<?php $__errorArgs = ['price', 'store'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
									<div class="d-block invalid-feedback">
										<?php echo e($message); ?>

									</div>
									<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
								</div>
							</div>
						</div>
						<div class="col-lg-4 col-6">
							<div class="form-group">
								<label for="price_per_item">Harga Satuan<span class="font-weight-bold text-danger">*</span></label>
								<div class="input-group">
									<div class="input-group-prepend">
										<span class="input-group-text" id="basic-addon1">Rp.</span>
									</div>
									<input type="number" class="form-control <?php $__errorArgs = ['price_per_item', 'store'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
										name="price_per_item" id="price_per_item" value="<?php echo e(old('price_per_item')); ?>"
										placeholder="Masukan harga satuan barang..">
									<?php $__errorArgs = ['price_per_item', 'store'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
									<div class="d-block invalid-feedback">
										<?php echo e($message); ?>

									</div>
									<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
								</div>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-12">
							<div class="form-group">
								<label for="note">Keterangan <span class="font-italic">(opsional)</span></label>
								<textarea class="form-control <?php $__errorArgs = ['note', 'store'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="note" id="note"
									style="height: 100px;" placeholder="Masukan keterangan (opsional).."><?php echo e(old('note')); ?></textarea>
								<?php $__errorArgs = ['note', 'store'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
								<div class="d-block invalid-feedback">
									<?php echo e($message); ?>

								</div>
								<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
							</div>
						</div>
					</div>

					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
						<button type="submit" class="btn btn-success">Tambah</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<?php /**PATH C:\xampp\htdocs\aplikasi_inventaris_smk_FIXED\resources\views/commodities/modal/create.blade.php ENDPATH**/ ?>
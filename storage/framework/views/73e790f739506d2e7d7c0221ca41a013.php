<div class="modal fade" id="edit_commodity" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog"
	aria-labelledby="staticBackdropLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="modalLabel">Ubah Data Barang</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>

			<div class="modal-body">
				<form method="POST" enctype="multipart/form-data">
					<?php echo csrf_field(); ?>
					<?php echo method_field('PUT'); ?>
					<div class="row">
						<div class="col-lg-4">
							<div class="form-group">
								<label for="item_code">Kode Barang</label>
								<input type="text" class="form-control" name="item_code" id="item_code"
									placeholder="Masukan kode barang..">
							</div>
						</div>
						<div class="col-lg-4">
							<div class="form-group">
								<label for="name">Nama Barang</label>
								<input type="text" class="form-control" name="name" id="name" placeholder="Masukan nama barang..">
							</div>
						</div>
						<div class="col-lg-4">
							<div class="form-group">
								<label for="commodity_location_id">Lokasi Barang</label>
								<select class="form-control" name="commodity_location_id" id="commodity_location_id"
									style="width: 100%;">
									<option selected>Pilih..</option>
									<?php $__currentLoopData = $commodity_locations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $commodity_location): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<option value="<?php echo e($commodity_location->id); ?>"><?php echo e($commodity_location->name); ?></option>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
								</select>
							</div>
						</div>
					</div>


					
					<div class="row">
						<div class="col-lg-3 col-md-6">
							<div class="form-group">
								<label for="inventory_number">Nomor Inventaris <span class="font-italic">(opsional)</span></label>
								<input type="text" class="form-control <?php $__errorArgs = ['inventory_number', 'update'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
									name="inventory_number" id="inventory_number" value="<?php echo e(old('inventory_number')); ?>"
									placeholder="Contoh: INV/SMK/2026/001">
								<?php $__errorArgs = ['inventory_number', 'update'];
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
								<select class="form-control <?php $__errorArgs = ['category', 'update'];
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
								<?php $__errorArgs = ['category', 'update'];
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
								<select class="form-control <?php $__errorArgs = ['status', 'update'];
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
								<?php $__errorArgs = ['status', 'update'];
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
								<select class="form-control <?php $__errorArgs = ['unit', 'update'];
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
								<?php $__errorArgs = ['unit', 'update'];
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
						<div class="col-lg-4">
							<div class="form-group">
								<label for="input_date">Tanggal Input</label>
								<input type="date" class="form-control" name="input_date" id="input_date">
							</div>
						</div>
						<div class="col-lg-4">
							<div class="form-group">
								<label for="store_name">Nama Toko</label>
								<input type="text" class="form-control" name="store_name" id="store_name"
									placeholder="Masukan nama toko..">
							</div>
						</div>
						<div class="col-lg-4">
							<div class="form-group">
								<label for="store_phone">Nomor HP <span class="font-italic">(opsional)</span></label>
								<input type="text" class="form-control" name="store_phone" id="store_phone"
									placeholder="Contoh: 081234567890">
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-12">
							<div class="form-group">
								<label for="store_address">Alamat Toko</label>
								<textarea class="form-control" name="store_address" id="store_address" rows="3"
									placeholder="Masukan alamat toko.."></textarea>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-12">
							<div class="form-group">
								<label for="receipt">Bukti Nota <span class="font-italic">(opsional)</span></label>
								<input type="file" class="form-control-file" name="receipt" id="receipt"
									accept=".jpg,.jpeg,.png,.pdf">
								<small class="form-text text-muted">
									Upload nota baru jika ingin mengganti. JPG, JPEG, PNG atau PDF, maksimal 2 MB.
								</small>
								<div id="current_receipt" class="mt-2"></div>
							</div>
						</div>
					</div>


					<div class="row">
						<div class="col-12">
							<div class="form-group">
								<label for="photo">Foto Barang <span class="font-italic">(opsional)</span></label>
								<input type="file" class="form-control-file" name="photo" id="photo" accept=".jpg,.jpeg,.png">
								<small class="form-text text-muted">Upload foto baru jika ingin mengganti. JPG, JPEG atau PNG, maksimal 2 MB.</small>
								<div id="current_photo" class="mt-2"></div>
							</div>
						</div>
					</div>

					<hr>

					<div class="row">
						<div class="col-lg-6">
							<div class="form-group">
								<label for="material">Bahan</label>
								<input type="text" class="form-control" name="material" id="material"
									placeholder="Masukan bahan barang..">
							</div>
						</div>
						<div class="col-lg-6">
							<div class="form-group">
								<label for="brand">Merek</label>
								<input type="text" class="form-control" name="brand" id="brand" placeholder="Masukan merek barang..">
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-lg-4 col-12">
							<div class="form-group">
								<label for="year_of_purchase">Tahun Pembelian</label>
								<input type="number" class="form-control" name="year_of_purchase" id="year_of_purchase"
									placeholder="Masukan tahun pembelian barang..">
							</div>
						</div>
						<div class="col-lg-4 col-12">
							<div class="form-group">
								<label for="commodity_acquisition_id">Asal Perolehan</label>
								<select class="form-control" name="commodity_acquisition_id"
									id="commodity_acquisition_id" style="width: 100%;">
									<option selected>Pilih..</option>
									<?php $__currentLoopData = $commodity_acquisitions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $commodity_acquisition): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<option value="<?php echo e($commodity_acquisition->id); ?>"><?php echo e($commodity_acquisition->name); ?>

									</option>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
								</select>
							</div>
						</div>
						<div class="col-lg-4 col-12">
							<div class="form-group">
								<label for="condition">Kondisi</label>
								<select class="form-control" name="condition" id="condition" style="width: 100%;">
									<option selected>Pilih..</option>
									<option value="1">Baik</option>
									<option value="2">Rusak Ringan</option>
									<option value="3">Rusak Berat</option>
								</select>
							</div>
						</div>
					</div>

					<hr>

					<div class="row">
						<div class="col-lg-4">
							<div class="form-group">
								<label for="quantity">Kuantitas</label>
								<input type="number" class="form-control" name="quantity" id="quantity"
									placeholder="Masukan kuantitas barang..">
							</div>
						</div>
						<div class="col-lg-4 col-6">
							<div class="form-group">
								<label for="price">Harga</label>
								<div class="input-group">
									<div class="input-group-prepend">
										<span class="input-group-text" id="basic-addon1">Rp.</span>
									</div>
									<input type="number" class="form-control" name="price" id="price"
										placeholder="Masukan harga barang..">
								</div>
							</div>
						</div>
						<div class="col-lg-4 col-6">
							<div class="form-group">
								<label for="price_per_item">Harga Satuan</label>
								<div class="input-group">
									<div class="input-group-prepend">
										<span class="input-group-text" id="basic-addon1">Rp.</span>
									</div>
									<input type="number" class="form-control" name="price_per_item" id="price_per_item"
										placeholder="Masukan harga satuan barang..">
								</div>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-12">
							<div class="form-group">
								<label for="note">Keterangan</label>
								<textarea class="form-control" name="note" id="note" style="height: 100px;"
									placeholder="Masukan keterangan (opsional).."></textarea>
							</div>
						</div>
					</div>

					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
						<button type="submit" class="btn btn-success">Ubah</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<?php /**PATH C:\xampp\htdocs\aplikasi_inventaris_smk\resources\views/commodities/modal/edit.blade.php ENDPATH**/ ?>
<!-- Modal -->
<div class="modal fade" id="role_edit_modal" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog"
	aria-labelledby="staticBackdropLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="staticBackdropLabel">Ubah Data Peran dan Hak Akses</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form method="POST">
					<?php echo csrf_field(); ?>
					<?php echo method_field('PUT'); ?>
					<div class="row">
						<div class="col-lg-12">
							<div class="form-group">
								<label for="name">Nama Peran</label>
								<input type="text" name="name" id="name"
									class="form-control <?php $__errorArgs = ['name', 'store'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('name')); ?>"
									placeholder="Masukan nama peran..">
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

						<div class="col-lg-12">
							<div class="form-group">
								<label for="permissions">Daftar Hak Akses</label>
								<select multiple class="tom-select <?php $__errorArgs = ['permissions', 'store'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
									name="permissions[]" id="permissions" placeholder="Pilih hak akses..">
									<?php $__currentLoopData = $permissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $permission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<option value="<?php echo e($permission->id); ?>"><?php echo e($permission->name); ?></option>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
								</select>
								<?php $__errorArgs = ['permissions', 'store'];
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
						<button type="submit" class="btn btn-success">Ubah</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<?php /**PATH C:\xampp\htdocs\aplikasi_inventaris_smk\resources\views/roles/modal/edit.blade.php ENDPATH**/ ?>
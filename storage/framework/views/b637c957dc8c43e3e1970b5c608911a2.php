<!-- Modal -->
<div class="modal fade" id="user_create_modal" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog"
	aria-labelledby="staticBackdropLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="staticBackdropLabel">Tambah Data Pengguna</h5>
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
				<form action="<?php echo e(route('pengguna.store')); ?>" method="POST">
					<?php echo csrf_field(); ?>
					<div class="row">
						<div class="col-lg-12">
							<div class="form-group">
								<label for="name">Nama Lengkap<span class="font-weight-bold text-danger">*</span></label>
								<input type="text" name="name" class="form-control <?php $__errorArgs = ['name', 'store'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
									id="name" value="<?php echo e(old('name')); ?>" placeholder="Masukan nama lengkap..">
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
								<label for="email">Alamat Email<span class="font-weight-bold text-danger">*</span></label>
								<input type="email" name="email" class="form-control <?php $__errorArgs = ['email', 'store'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
									id="email" value="<?php echo e(old('email')); ?>" placeholder="Masukan alamat email..">
								<?php $__errorArgs = ['email', 'store'];
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
								<label for="role_id">Pilih Peran<span class="font-weight-bold text-danger">*</span></label>
								<select class="tom-select <?php $__errorArgs = ['role_id', 'store'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="role_id" id="role_id"
									placeholder="Pilih peran..">
									<?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<option value="<?php echo e($role->id); ?>"><?php echo e($role->name); ?></option>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
								</select>
								<?php $__errorArgs = ['role_id', 'store'];
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
								<label for="password">Kata Sandi<span class="font-weight-bold text-danger">*</span></label>
								<input type="password" name="password"
									class="form-control <?php $__errorArgs = ['password', 'store'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="password"
									value="<?php echo e(old('password')); ?>" placeholder="Masukan kata sandi..">
								<?php $__errorArgs = ['password', 'store'];
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
								<label for="password_confirmation">Konfirmasi Kata Sandi<span
										class="font-weight-bold text-danger">*</span></label>
								<input type="password" name="password_confirmation"
									class="form-control <?php $__errorArgs = ['password_confirmation', 'store'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
									id="password_confirmation" value="<?php echo e(old('password_confirmation')); ?>"
									placeholder="Konfirmasi kata sandi..">
								<?php $__errorArgs = ['password_confirmation', 'store'];
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
<?php /**PATH C:\xampp\htdocs\aplikasi_inventaris_smk\resources\views/users/modal/create.blade.php ENDPATH**/ ?>
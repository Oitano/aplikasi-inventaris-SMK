<?php if($errors->store->any()): ?>
<div class="alert alert-danger alert-has-icon alert-dismissible fade show" role="alert">
	<div class="d-flex align-items-start">
		<i class="fas fa-exclamation-circle alert-icon mr-3" style="font-size: 1.5rem;"></i>
		<div>
			<div class="alert-title font-weight-bold">Gagal</div>
			<?php $__currentLoopData = $errors->store->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<p><i class="fas fa-arrow-right mr-2"></i><?php echo e($message); ?></p>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		</div>
	</div>
	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span>
	</button>
</div>
<?php endif; ?>

<?php if($errors->update->any()): ?>
<div class="alert alert-danger alert-has-icon alert-dismissible fade show" role="alert">
	<div class="d-flex align-items-start">
		<i class="fas fa-exclamation-circle alert-icon mr-3" style="font-size: 1.5rem;"></i>
		<div>
			<div class="alert-title font-weight-bold">Gagal</div>
			<?php $__currentLoopData = $errors->update->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<p><i class="fas fa-arrow-right mr-2"></i><?php echo e($message); ?></p>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		</div>
	</div>
	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span>
	</button>
</div>
<?php endif; ?>

<?php $__sessionArgs = ['success'];
if (session()->has($__sessionArgs[0])) :
if (isset($value)) { $__sessionPrevious[] = $value; }
$value = session()->get($__sessionArgs[0]); ?>
<div class="alert alert-success alert-has-icon alert-dismissible fade show" role="alert">
	<div class="d-flex align-items-start">
		<i class="fas fa-check-circle alert-icon mr-3" style="font-size: 1.5rem;"></i>
		<div>
			<div class="alert-title font-weight-bold">Berhasil</div>
			<?php echo e(session('success')); ?>

		</div>
	</div>
	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span>
	</button>
</div>
<?php unset($value);
if (isset($__sessionPrevious) && !empty($__sessionPrevious)) { $value = array_pop($__sessionPrevious); }
if (isset($__sessionPrevious) && empty($__sessionPrevious)) { unset($__sessionPrevious); }
endif;
unset($__sessionArgs); ?>

<?php $__sessionArgs = ['error'];
if (session()->has($__sessionArgs[0])) :
if (isset($value)) { $__sessionPrevious[] = $value; }
$value = session()->get($__sessionArgs[0]); ?>
<div class="alert alert-danger alert-has-icon alert-dismissible fade show" role="alert">
	<div class="d-flex align-items-start">
		<i class="fas fa-exclamation-circle alert-icon mr-3" style="font-size: 1.5rem;"></i>
		<div>
			<div class="alert-title font-weight-bold">Gagal</div>
			<?php echo e(session('error')); ?>

		</div>
	</div>
	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span>
	</button>
</div>
<?php unset($value);
if (isset($__sessionPrevious) && !empty($__sessionPrevious)) { $value = array_pop($__sessionPrevious); }
if (isset($__sessionPrevious) && empty($__sessionPrevious)) { unset($__sessionPrevious); }
endif;
unset($__sessionArgs); ?><?php /**PATH C:\xampp\htdocs\aplikasi_inventaris_smk_FIXED\resources\views/utilities/alert.blade.php ENDPATH**/ ?>
<div id="accordion">
	<div class="accordion mb-3">
		<div class="accordion-header" role="button" data-toggle="collapse" data-target="#panel-body-1" aria-expanded="true">
			<h4>Menu filter (klik atau sentuh untuk membuka atau menutup menu filter)</h4>
		</div>
		<div class="accordion-body collapse show" id="panel-body-1" data-parent="#accordion">
			<form action="" method="GET">
				<?php echo e($slot); ?>

				<div class="d-flex">
					<button type="submit" class="btn btn-primary mr-1 flex-fill">Cari</button>
					<a href="<?php echo e($resetFilterURL); ?>" class="btn btn-warning" role="button">Reset Filter</a>
				</div>
			</form>
		</div>
	</div>
</div>
<?php /**PATH C:\xampp\htdocs\aplikasi_inventaris_smk\resources\views/components/filter/index.blade.php ENDPATH**/ ?>
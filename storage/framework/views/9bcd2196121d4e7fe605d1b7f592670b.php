<div class="modal fade" id="excel_menu" tabindex="-1" aria-labelledby="excel_menu_label" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="excel_menu_label">Import Excel Barang</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="<?php echo e(route('barang.import')); ?>" method="POST" enctype="multipart/form-data">
					<?php echo csrf_field(); ?>
					<div class="row">
						<div class="col-lg-12">
							<div class="alert alert-info" role="alert">
								Untuk melakukan impor excel barang. Anda harus unduh template excel dengan klik <a
									href="<?php echo e(asset('import-barang-template.xlsx')); ?>" class="alert-link"><i class="fas fa-download"></i>
									di
									sini</a>
							</div>

							<div class="custom-file">
								<label for="file">Pilih berkas<span class="font-weight-bold text-danger">*</span></label>
								<input type="file" class="form-control" name="file" id="file">
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						<button type="submit" class="btn btn-success">Import</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<?php /**PATH C:\xampp\htdocs\aplikasi_inventaris_smk\resources\views/commodities/modal/import.blade.php ENDPATH**/ ?>
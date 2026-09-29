<script>
	$(document).ready(function () {
		$(".show-modal").click(function () {
			const id = $(this).data("id");
			let url = "<?php echo e(route('api.barang.show', ':paramID')); ?>".replace(
				":paramID",
				id
			);

			$.ajax({
				url: url,
				header: {
					"Content-Type": "application/json",
				},
				success: (res) => {
					$("#show_commodity #item_code").val(res.data.item_code);
					$("#show_commodity #name").val(res.data.name);
					$("#show_commodity #inventory_number").val(res.data.inventory_number || '-');
					$("#show_commodity #category").val(res.data.category || '-');
					$("#show_commodity #status").val(res.data.status || '-');
					$("#show_commodity #unit").val(res.data.unit || '-');
					$("#show_commodity #commodity_location_id").val(
						res.data.commodity_location.name
					);
					$("#show_commodity #material").val(res.data.material);
					$("#show_commodity #brand").val(res.data.brand);
					$("#show_commodity #year_of_purchase").val(res.data.year_of_purchase);
					$("#show_commodity #condition").val(res.data.condition_name);
					$("#show_commodity #commodity_acquisition_id").val(
						res.data.commodity_acquisition.name
					);

					// DATA TOKO
					$("#show_commodity #input_date").val(res.data.input_date);
					$("#show_commodity #store_name").val(res.data.store_name);
					$("#show_commodity #store_phone").val(res.data.store_phone);
					$("#show_commodity #store_address").val(res.data.store_address);

					// BUKTI NOTA
					if (res.data.receipt) {
						$("#show_commodity #receipt").html(
							`<a href="/storage/${res.data.receipt}" target="_blank" class="btn btn-primary">
								<i class="fas fa-file-alt"></i> Lihat Bukti Nota
							</a>`
						);
					} else {
						$("#show_commodity #receipt").html("Tidak ada bukti nota.");
					}

					if (res.data.photo) {
						$("#show_commodity #photo").html(
							`<img src="/storage/${res.data.photo}" alt="Foto Barang" class="img-fluid rounded" style="max-height: 250px;">`
						);
					} else {
						$("#show_commodity #photo").html('<span class="text-muted">Tidak ada foto barang.</span>');
					}

					$("#show_commodity #note").val(res.data.note);
					$("#show_commodity #quantity").val(res.data.quantity);
					$("#show_commodity #price").val(res.data.price_formatted);
					$("#show_commodity #price_per_item").val(res.data.price_per_item_formatted);
				},				error: (err) => {
					alert("error occured, check console");
					console.log(err);
				},
			});
		});

		$(".edit-modal").on("click", function () {
			const id = $(this).data("id");
			let url = "<?php echo e(route('api.barang.show', ':paramID')); ?>".replace(
				":paramID",
				id
			);

			let updateURL = "<?php echo e(route('barang.update', ':paramID')); ?>".replace(
				":paramID",
				id
			);

			$.ajax({
				url: url,
				method: "GET",
				header: {
					"Content-Type": "application/json",
				},
				success: (res) => {
					$("#edit_commodity form #item_code").val(res.data.item_code);
					$("#edit_commodity form #name").val(res.data.name);
					$("#edit_commodity form #inventory_number").val(res.data.inventory_number || '');
					$("#edit_commodity form #category").val(res.data.category || 'Lainnya');
					$("#edit_commodity form #status").val(res.data.status || 'Tersedia');
					$("#edit_commodity form #unit").val(res.data.unit || 'Unit');
					$("#edit_commodity form #commodity_location_id").val(
						res.data.commodity_location.id
					);
					$("#edit_commodity form #material").val(res.data.material);
					$("#edit_commodity form #brand").val(res.data.brand);
					$("#edit_commodity form #year_of_purchase").val(
						res.data.year_of_purchase
					);
					$("#edit_commodity form #condition").val(res.data.condition);
					$("#edit_commodity form #commodity_acquisition_id").val(
						res.data.commodity_acquisition.id
					);

					// DATA TOKO
					$("#edit_commodity form #input_date").val(res.data.input_date);
					$("#edit_commodity form #store_name").val(res.data.store_name);
					$("#edit_commodity form #store_phone").val(res.data.store_phone);
					$("#edit_commodity form #store_address").val(res.data.store_address);

					// NOTA SAAT INI
					if (res.data.receipt) {
						$("#edit_commodity #current_receipt").html(
							`<a href="/storage/${res.data.receipt}" target="_blank" class="btn btn-sm btn-primary">
								<i class="fas fa-file-alt"></i> Lihat Nota Saat Ini
							</a>`
						);
					} else {
						$("#edit_commodity #current_receipt").html(
							"Belum ada bukti nota."
						);
					}

					if (res.data.photo) {
						$("#edit_commodity #current_photo").html(
							`<img src="/storage/${res.data.photo}" alt="Foto Barang" class="img-thumbnail" style="max-height: 120px;">`
						);
					} else {
						$("#edit_commodity #current_photo").html("Belum ada foto barang.");
					}

					$("#edit_commodity form #note").val(res.data.note);
					$("#edit_commodity form #quantity").val(res.data.quantity);
					$("#edit_commodity form #price").val(res.data.price);
					$("#edit_commodity form #price_per_item").val(
						res.data.price_per_item
					);

					$("#edit_commodity form").attr("action", updateURL);
				},				error: (err) => {
					alert("error occured, check console");
					console.log(err);
				},
			});
		});
	});
</script>
<?php /**PATH C:\xampp\htdocs\aplikasi_inventaris_smk_FIXED\resources\views/commodities/_script.blade.php ENDPATH**/ ?>
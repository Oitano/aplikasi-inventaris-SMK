<script>
	$(document).ready(function () {
		$(".show-modal").click(function () {
			const id = $(this).data("id");
			let url = "<?php echo e(route('api.perolehan.show', ':paramID')); ?>".replace(
				":paramID",
				id
			);
			$.ajax({
				url: url,
				header: {
					"Content-Type": "application/json",
				},
				success: (res) => {
					$("#show_commodity_acquisition #name").val(res.data.name);
					$("#show_commodity_acquisition #description").val(res.data.description);
				},
				error: (err) => {
					alert("error occured, check console");
					console.log(err);
				},
			});
		});

		$(".edit-modal").on("click", function () {
			const id = $(this).data("id");
			let url = "<?php echo e(route('api.perolehan.show', ':paramID')); ?>".replace(
				":paramID",
				id
			);

			let updateURL = "<?php echo e(route('perolehan.update', ':paramID')); ?>".replace(
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
					$("#commodity_acquisition_edit_modal form #name").val(res.data.name);
					$("#commodity_acquisition_edit_modal form #description").val(
						res.data.description
					);
					$("#commodity_acquisition_edit_modal form").attr("action", updateURL);
				},
				error: (err) => {
					alert("error occured, check console");
					console.log(err);
				},
			});
		});
	});
</script>
<?php /**PATH C:\xampp\htdocs\aplikasi_inventaris_smk\resources\views/commodity-acquisitions/_script.blade.php ENDPATH**/ ?>
<?php
    $tableId = 'datatable-' . \Illuminate\Support\Str::uuid();
?>

<div class="table-responsive">
    <table
        class="table table-bordered table-hover my-2"
        id="<?php echo e($tableId); ?>"
        style="width: 100%"
    >
        <?php echo e($slot); ?>

    </table>
</div>

<?php $__env->startPush('js'); ?>
<script>
    $(document).ready(function () {
        const table = document.getElementById(<?php echo json_encode($tableId, 15, 512) ?>);

        if (table && !DataTable.isDataTable(table)) {
            new DataTable(table, {
                lengthMenu: [
                    5,
                    10,
                    15,
                    { label: "All", value: -1 }
                ],
                language: {
                    url: "https://cdn.datatables.net/plug-ins/2.0.6/i18n/id.json"
                }
            });
        }
    });
</script>
<?php $__env->stopPush(); ?><?php /**PATH C:\xampp\htdocs\aplikasi_inventaris_smk_FIXED\resources\views/components/datatable/index.blade.php ENDPATH**/ ?>
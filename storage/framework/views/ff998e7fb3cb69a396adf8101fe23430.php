<?php if (isset($component)) { $__componentOriginal23a33f287873b564aaf305a1526eada4 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal23a33f287873b564aaf305a1526eada4 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.layout','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
     <?php $__env->slot('title', null, []); ?> Barang Keluar <?php $__env->endSlot(); ?>
     <?php $__env->slot('page_heading', null, []); ?> Barang Keluar <?php $__env->endSlot(); ?>

    <div class="row">
        <div class="col-lg-4 col-md-6 col-sm-6 col-12"><div class="card card-statistic-1"><div class="card-icon bg-danger"><i class="fas fa-arrow-up"></i></div><div class="card-wrap"><div class="card-header"><h4>Total Transaksi</h4></div><div class="card-body"><?php echo e($commodityOuts->count()); ?></div></div></div></div>
        <div class="col-lg-4 col-md-6 col-sm-6 col-12"><div class="card card-statistic-1"><div class="card-icon bg-warning"><i class="fas fa-box-open"></i></div><div class="card-wrap"><div class="card-header"><h4>Total Barang Keluar</h4></div><div class="card-body"><?php echo e(number_format($commodityOuts->sum('quantity'), 0, ',', '.')); ?></div></div></div></div>
    </div>

    <div class="card"><div class="card-body">
        <?php echo $__env->make('utilities.alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="d-flex justify-content-end mb-3"><?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('tambah barang keluar')): ?><button class="btn btn-danger" data-toggle="modal" data-target="#commodity_out_create_modal"><i class="fas fa-plus mr-1"></i> Tambah Barang Keluar</button><?php endif; ?></div>
        <?php if (isset($component)) { $__componentOriginal8aaf9779783cdf64609094123653a0b9 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8aaf9779783cdf64609094123653a0b9 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.datatable.index','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('datatable'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
            <thead><tr><th>#</th><th>Tanggal</th><th>Kode</th><th>Nama Barang</th><th>Jumlah</th><th>Tujuan</th><th>Penanggung Jawab</th><th>Ruangan</th><th>User</th><th>Keterangan</th><th>Aksi</th></tr></thead>
            <tbody><?php $__currentLoopData = $commodityOuts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><tr>
                <th><?php echo e($loop->iteration); ?></th><td><?php echo e($item->date?->format('d-m-Y')); ?></td><td><span class="badge badge-primary"><?php echo e($item->commodity->item_code); ?></span></td><td><?php echo e($item->commodity->name); ?></td><td><span class="badge badge-danger">-<?php echo e(number_format($item->quantity, 0, ',', '.')); ?></span></td><td><?php echo e($item->destination ?: '-'); ?></td><td><?php echo e($item->responsible_person ?: '-'); ?></td><td><?php echo e($item->location?->name ?: '-'); ?></td><td><?php echo e($item->user?->name??'-'); ?></td><td><?php echo e($item->note ?: '-'); ?></td>
                <td class="text-center"><?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('hapus barang keluar')): ?><form action="<?php echo e(route('barang-keluar.destroy', $item)); ?>" method="POST"><?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?><button class="btn btn-sm btn-danger delete-button"><i class="fas fa-trash"></i></button></form><?php endif; ?></td>
            </tr><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></tbody>
         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal8aaf9779783cdf64609094123653a0b9)): ?>
<?php $attributes = $__attributesOriginal8aaf9779783cdf64609094123653a0b9; ?>
<?php unset($__attributesOriginal8aaf9779783cdf64609094123653a0b9); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8aaf9779783cdf64609094123653a0b9)): ?>
<?php $component = $__componentOriginal8aaf9779783cdf64609094123653a0b9; ?>
<?php unset($__componentOriginal8aaf9779783cdf64609094123653a0b9); ?>
<?php endif; ?>
    </div></div>

    <?php $__env->startPush('modal'); ?>
    <div class="modal fade" id="commodity_out_create_modal" data-backdrop="static" data-keyboard="false" tabindex="-1"><div class="modal-dialog modal-lg"><div class="modal-content">
        <div class="modal-header"><h5 class="modal-title">Tambah Barang Keluar</h5><button type="button" class="close" data-dismiss="modal"><span>&times;</span></button></div>
        <form action="<?php echo e(route('barang-keluar.store')); ?>" method="POST"><?php echo csrf_field(); ?>
            <div class="modal-body"><div class="alert alert-warning"><i class="fas fa-exclamation-circle mr-2"></i>Stok akan otomatis berkurang. Jumlah tidak boleh melebihi stok tersedia.</div>
                <div class="row">
                    <div class="col-md-8"><div class="form-group"><label>Barang <span class="text-danger">*</span></label><select name="commodity_id" class="form-control <?php $__errorArgs = ['commodity_id', 'store'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" required><option value="">Pilih barang...</option><?php $__currentLoopData = $commodities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $commodity): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><option value="<?php echo e($commodity->id); ?>" <?php if(old('commodity_id') == $commodity->id): echo 'selected'; endif; ?>><?php echo e($commodity->item_code); ?> - <?php echo e($commodity->name); ?> (Stok: <?php echo e($commodity->quantity); ?>)</option><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></select><?php $__errorArgs = ['commodity_id', 'store'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div class="invalid-feedback"><?php echo e($message); ?></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></div></div>
                    <div class="col-md-4"><div class="form-group"><label>Tanggal Keluar <span class="text-danger">*</span></label><input type="date" name="date" value="<?php echo e(old('date', now()->toDateString())); ?>" class="form-control <?php $__errorArgs = ['date', 'store'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" required><?php $__errorArgs = ['date', 'store'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div class="invalid-feedback"><?php echo e($message); ?></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></div></div>
                    <div class="col-md-4"><div class="form-group"><label>Jumlah <span class="text-danger">*</span></label><input type="number" min="1" name="quantity" value="<?php echo e(old('quantity', 1)); ?>" class="form-control <?php $__errorArgs = ['quantity', 'store'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" required><?php $__errorArgs = ['quantity', 'store'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div class="invalid-feedback"><?php echo e($message); ?></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></div></div>
                    <div class="col-md-8"><div class="form-group"><label>Tujuan / Penerima</label><input type="text" name="destination" value="<?php echo e(old('destination')); ?>" class="form-control" placeholder="Contoh: Ruang OSIS / Ahmad"></div></div><div class="col-md-6"><div class="form-group"><label>Penanggung Jawab</label><input type="text" name="responsible_person" value="<?php echo e(old('responsible_person')); ?>" class="form-control"></div></div><div class="col-md-6"><div class="form-group"><label>Ruangan</label><select name="commodity_location_id" class="form-control"><option value="">Pilih ruangan</option><?php $__currentLoopData = $commodityLocations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $loc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><option value="<?php echo e($loc->id); ?>"><?php echo e($loc->name); ?></option><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></select></div></div>
                    <div class="col-12"><div class="form-group"><label>Keterangan</label><textarea name="note" rows="3" class="form-control" placeholder="Keterangan tambahan..."><?php echo e(old('note')); ?></textarea></div></div>
                </div>
            </div><div class="modal-footer"><button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button><button class="btn btn-danger" type="submit"><i class="fas fa-save mr-1"></i>Simpan</button></div>
        </form>
    </div></div></div>
    <?php $__env->stopPush(); ?>
    <?php $__env->startPush('js'); ?><script>$(function(){ <?php if($errors->store->any()): ?> $('#commodity_out_create_modal').modal('show'); <?php endif; ?> });</script><?php $__env->stopPush(); ?>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal23a33f287873b564aaf305a1526eada4)): ?>
<?php $attributes = $__attributesOriginal23a33f287873b564aaf305a1526eada4; ?>
<?php unset($__attributesOriginal23a33f287873b564aaf305a1526eada4); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal23a33f287873b564aaf305a1526eada4)): ?>
<?php $component = $__componentOriginal23a33f287873b564aaf305a1526eada4; ?>
<?php unset($__componentOriginal23a33f287873b564aaf305a1526eada4); ?>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\aplikasi_inventaris_smk\resources\views/commodity-outs/index.blade.php ENDPATH**/ ?>
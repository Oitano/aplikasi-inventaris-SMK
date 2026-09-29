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
     <?php $__env->slot('title', null, []); ?> Barang Masuk <?php $__env->endSlot(); ?>
     <?php $__env->slot('page_heading', null, []); ?> Barang Masuk <?php $__env->endSlot(); ?>

    <div class="row">
        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-primary"><i class="fas fa-arrow-down"></i></div>
                <div class="card-wrap">
                    <div class="card-header"><h4>Total Transaksi</h4></div>
                    <div class="card-body"><?php echo e($commodityIns->count()); ?></div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-success"><i class="fas fa-boxes-stacked"></i></div>
                <div class="card-wrap">
                    <div class="card-header"><h4>Total Barang Masuk</h4></div>
                    <div class="card-body"><?php echo e(number_format($commodityIns->sum('quantity'), 0, ',', '.')); ?></div>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <?php echo $__env->make('utilities.alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <div class="d-flex justify-content-end mb-3">
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('tambah barang masuk')): ?>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#commodity_in_create_modal">
                    <i class="fas fa-plus mr-1"></i> Tambah Barang Masuk
                </button>
                <?php endif; ?>
            </div>

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
                <thead>
                    <tr>
                        <th>#</th><th>Tanggal</th><th>Kode</th><th>Nama Barang</th><th>Jumlah</th><th>Sumber/Toko</th><th>Bukti Nota</th><th>User</th><th>Keterangan</th><th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $commodityIns; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <th><?php echo e($loop->iteration); ?></th>
                        <td><?php echo e($item->date?->format('d-m-Y')); ?></td>
                        <td><span class="badge badge-primary"><?php echo e($item->commodity->item_code); ?></span></td>
                        <td><?php echo e($item->commodity->name); ?></td>
                        <td><span class="badge badge-success">+<?php echo e(number_format($item->quantity, 0, ',', '.')); ?></span></td>
                        <td><?php echo e($item->source ?: '-'); ?></td>
                        <td><?php echo e($item->note ?: '-'); ?></td>
                        <td class="text-center">
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('hapus barang masuk')): ?>
                            <form action="<?php echo e(route('barang-masuk.destroy', $item)); ?>" method="POST">
                                <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
                                <button class="btn btn-sm btn-danger delete-button" type="submit"><i class="fas fa-trash"></i></button>
                            </form>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
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
        </div>
    </div>

    <?php $__env->startPush('modal'); ?>
    <div class="modal fade" id="commodity_in_create_modal" data-backdrop="static" data-keyboard="false" tabindex="-1">
        <div class="modal-dialog modal-lg"><div class="modal-content">
            <div class="modal-header"><h5 class="modal-title">Tambah Barang Masuk</h5><button type="button" class="close" data-dismiss="modal"><span>&times;</span></button></div>
            <form action="<?php echo e(route('barang-masuk.store')); ?>" method="POST" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <div class="modal-body">
                    <div class="alert alert-info"><i class="fas fa-info-circle mr-2"></i>Stok pada Data Barang akan otomatis bertambah sesuai jumlah yang dimasukkan.</div>
                    <div class="row">
                        <div class="col-md-8"><div class="form-group"><label>Barang <span class="text-danger">*</span></label>
                            <select name="commodity_id" class="form-control <?php $__errorArgs = ['commodity_id', 'store'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" required>
                                <option value="">Pilih barang...</option>
                                <?php $__currentLoopData = $commodities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $commodity): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><option value="<?php echo e($commodity->id); ?>" <?php if(old('commodity_id') == $commodity->id): echo 'selected'; endif; ?>><?php echo e($commodity->item_code); ?> - <?php echo e($commodity->name); ?> (Stok: <?php echo e($commodity->quantity); ?>)</option><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select><?php $__errorArgs = ['commodity_id', 'store'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div class="invalid-feedback"><?php echo e($message); ?></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div></div>
                        <div class="col-md-4"><div class="form-group"><label>Tanggal Masuk <span class="text-danger">*</span></label><input type="date" name="date" class="form-control <?php $__errorArgs = ['date', 'store'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('date', now()->toDateString())); ?>" required><?php $__errorArgs = ['date', 'store'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div class="invalid-feedback"><?php echo e($message); ?></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></div></div>
                        <div class="col-md-4"><div class="form-group"><label>Jumlah <span class="text-danger">*</span></label><input type="number" min="1" name="quantity" class="form-control <?php $__errorArgs = ['quantity', 'store'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('quantity', 1)); ?>" required><?php $__errorArgs = ['quantity', 'store'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div class="invalid-feedback"><?php echo e($message); ?></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></div></div>
                        <div class="col-md-8"><div class="form-group"><label>Sumber / Toko</label><input type="text" name="source" class="form-control" value="<?php echo e(old('source')); ?>" placeholder="Contoh: Toko ABC / Hibah"></div></div><div class="col-md-6"><div class="form-group"><label>Nama Toko</label><input type="text" name="store_name" class="form-control" value="<?php echo e(old('store_name')); ?>"></div></div><div class="col-md-6"><div class="form-group"><label>Nomor HP Toko</label><input type="text" name="store_phone" class="form-control" value="<?php echo e(old('store_phone')); ?>"></div></div><div class="col-md-6"><div class="form-group"><label>Harga</label><input type="number" min="0" name="price" class="form-control" value="<?php echo e(old('price')); ?>"></div></div><div class="col-md-6"><div class="form-group"><label>Bukti Nota</label><input type="file" name="receipt" class="form-control-file" accept=".jpg,.jpeg,.png,.pdf"></div></div>
                        <div class="col-12"><div class="form-group"><label>Keterangan</label><textarea name="note" class="form-control" rows="3" placeholder="Keterangan tambahan..."><?php echo e(old('note')); ?></textarea></div></div>
                    </div>
                </div>
                <div class="modal-footer"><button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button><button class="btn btn-primary" type="submit"><i class="fas fa-save mr-1"></i>Simpan</button></div>
            </form>
        </div></div>
    </div>
    <?php $__env->stopPush(); ?>

    <?php $__env->startPush('js'); ?>
    <script>$(function(){ <?php if($errors->store->any()): ?> $('#commodity_in_create_modal').modal('show'); <?php endif; ?> });</script>
    <?php $__env->stopPush(); ?>
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
<?php /**PATH C:\xampp\htdocs\aplikasi_inventaris_smk\resources\views/commodity-ins/index.blade.php ENDPATH**/ ?>
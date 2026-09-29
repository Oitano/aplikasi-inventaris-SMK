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
 <?php $__env->slot('title', null, []); ?> Peminjaman Saya <?php $__env->endSlot(); ?> <?php $__env->slot('page_heading', null, []); ?> Peminjaman Saya <?php $__env->endSlot(); ?>
<div class="card"><div class="card-body"><?php echo $__env->make('utilities.alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('tambah peminjaman')): ?><div class="text-right mb-3"><button class="btn btn-primary" data-toggle="modal" data-target="#loanModal"><i class="fas fa-plus mr-1"></i>Ajukan Peminjaman</button></div><?php endif; ?>
<?php if (isset($component)) { $__componentOriginal8aaf9779783cdf64609094123653a0b9 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8aaf9779783cdf64609094123653a0b9 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.datatable.index','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('datatable'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?><thead><tr><th>#</th><th>Barang</th><th>Jumlah</th><th>Tgl Pinjam</th><th>Harus Kembali</th><th>Status</th><th>Keterangan</th></tr></thead>
<tbody>
    <?php $__currentLoopData = $commodityLoans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $loan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td><?php echo e($loop->iteration); ?></td>

            <td>
                <?php echo e($loan->commodity?->item_code); ?><br>
                <?php echo e($loan->commodity?->name); ?>

            </td>

            <td><?php echo e($loan->quantity); ?></td>

            <td>
                <?php echo e($loan->loan_date?->format('d-m-Y')); ?>

            </td>

            <td>
                <?php echo e($loan->due_date?->format('d-m-Y') ?? '-'); ?>

            </td>

            <td>
                <span class="badge badge-<?php echo e(in_array($loan->effective_status, ['Ditolak', 'Bermasalah', 'Terlambat'])
                        ? 'danger'
                        : ($loan->effective_status === 'Dikembalikan'
                            ? 'success'
                            : 'warning')); ?>">
                    <?php echo e($loan->effective_status); ?>

                </span>
            </td>

            <td>
                <?php echo e($loan->purpose ?? $loan->note ?? '-'); ?>

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
</div></div>
<div class="card"><div class="card-header"><h4>Sanksi Saya</h4></div><div class="card-body"><?php if (isset($component)) { $__componentOriginal8aaf9779783cdf64609094123653a0b9 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8aaf9779783cdf64609094123653a0b9 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.datatable.index','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('datatable'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?><thead><tr><th>Tanggal</th><th>Pelanggaran</th><th>Barang</th><th>Status</th></tr></thead><tbody>
<?php $__empty_1 = true; $__currentLoopData = $sanctions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?><tr><td><?php echo e($s->date->format('d-m-Y')); ?></td><td><?php echo e($s->violation_type); ?><br><?php echo e($s->description); ?></td><td><?php echo e($s->commodity?->name??'-'); ?></td><td><?php echo e($s->status); ?></td></tr><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?><tr><td colspan="4" class="text-center">Tidak ada sanksi.</td></tr><?php endif; ?></tbody> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal8aaf9779783cdf64609094123653a0b9)): ?>
<?php $attributes = $__attributesOriginal8aaf9779783cdf64609094123653a0b9; ?>
<?php unset($__attributesOriginal8aaf9779783cdf64609094123653a0b9); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8aaf9779783cdf64609094123653a0b9)): ?>
<?php $component = $__componentOriginal8aaf9779783cdf64609094123653a0b9; ?>
<?php unset($__componentOriginal8aaf9779783cdf64609094123653a0b9); ?>
<?php endif; ?></div></div>
<?php $__env->startPush('modal'); ?><div class="modal fade" id="loanModal"><div class="modal-dialog modal-lg"><div class="modal-content"><form method="POST" action="<?php echo e(route('peminjaman.store')); ?>"><?php echo csrf_field(); ?>
<div class="modal-header"><h5>Ajukan Peminjaman</h5><button class="close" data-dismiss="modal">&times;</button></div><div class="modal-body">
<div class="alert alert-info">Pengajuan akan berstatus <b>Menunggu</b> sampai diproses petugas.</div>
<div class="form-group"><label>Barang</label><select name="commodity_id" class="form-control" required><option value="">Pilih barang</option><?php $__currentLoopData = $commodities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><option value="<?php echo e($c->id); ?>"><?php echo e($c->item_code); ?> - <?php echo e($c->name); ?> (stok <?php echo e($c->quantity); ?>)</option><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></select></div>
<div class="row"><div class="col-md-6"><label>Jumlah</label><input class="form-control" type="number" name="quantity" min="1" value="1" required></div><div class="col-md-3"><label>Tanggal Pinjam</label><input class="form-control" type="date" name="loan_date" value="<?php echo e(today()->toDateString()); ?>" required></div><div class="col-md-3"><label>Rencana Kembali</label><input class="form-control" type="date" name="due_date" required></div></div>
<div class="form-group mt-3"><label>Keperluan</label><textarea name="purpose" class="form-control" required></textarea></div><div class="form-group"><label>Keterangan</label><textarea name="note" class="form-control"></textarea></div>
</div><div class="modal-footer"><button class="btn btn-primary">Kirim Pengajuan</button></div></form></div></div></div><?php $__env->stopPush(); ?>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal23a33f287873b564aaf305a1526eada4)): ?>
<?php $attributes = $__attributesOriginal23a33f287873b564aaf305a1526eada4; ?>
<?php unset($__attributesOriginal23a33f287873b564aaf305a1526eada4); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal23a33f287873b564aaf305a1526eada4)): ?>
<?php $component = $__componentOriginal23a33f287873b564aaf305a1526eada4; ?>
<?php unset($__componentOriginal23a33f287873b564aaf305a1526eada4); ?>
<?php endif; ?><?php /**PATH C:\xampp\htdocs\aplikasi_inventaris_smk\resources\views/student-loans/index.blade.php ENDPATH**/ ?>
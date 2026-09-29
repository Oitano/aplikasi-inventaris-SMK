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
 <?php $__env->slot('title', null, []); ?> Peminjaman <?php $__env->endSlot(); ?> <?php $__env->slot('page_heading', null, []); ?> Manajemen Peminjaman <?php $__env->endSlot(); ?>
<div class="row">
<?php $__currentLoopData = [['Total Peminjaman',$commodityLoans->count(),'primary'],['Menunggu',$commodityLoans->where('status','Menunggu')->count(),'info'],['Aktif',$commodityLoans->whereIn('status',['Dipinjam','Terlambat'])->count(),'warning'],['Terlambat',$commodityLoans->filter(fn($l)=>$l->effective_status==='Terlambat')->count(),'danger']]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as [$label,$v,$c]): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<div class="col-md-3 col-sm-6"><div class="card card-statistic-1"><div class="card-icon bg-<?php echo e($c); ?>"><i class="fas fa-hand-holding"></i></div><div class="card-wrap"><div class="card-header"><h4><?php echo e($label); ?></h4></div><div class="card-body"><?php echo e($v); ?></div></div></div></div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></div>
<div class="card"><div class="card-body"><?php echo $__env->make('utilities.alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<div class="d-flex justify-content-end mb-3"><?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('tambah peminjaman')): ?><button class="btn btn-primary" data-toggle="modal" data-target="#createLoan"><i class="fas fa-plus"></i> Peminjaman Baru</button><?php endif; ?></div>
<?php if (isset($component)) { $__componentOriginal8aaf9779783cdf64609094123653a0b9 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8aaf9779783cdf64609094123653a0b9 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.datatable.index','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('datatable'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?><thead><tr><th>#</th><th>Peminjam</th><th>Barang</th><th>Jumlah</th><th>Pinjam</th><th>Harus Kembali</th><th>Status</th><th>Aksi</th></tr></thead>
<tbody><?php $__currentLoopData = $commodityLoans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $loan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><tr><td><?php echo e($loop->iteration); ?></td><td><?php echo e($loan->user?->name??$loan->borrower); ?></td><td><?php echo e($loan->commodity?->item_code); ?><br><?php echo e($loan->commodity?->name); ?></td><td><?php echo e($loan->quantity); ?></td><td><?php echo e($loan->loan_date?->format('d-m-Y')); ?></td><td><?php echo e($loan->due_date?->format('d-m-Y')??'-'); ?></td><td><span class="badge badge-<?php echo e(in_array($loan->effective_status,['Ditolak','Bermasalah','Terlambat'])?'danger':($loan->effective_status==='Dikembalikan'?'success':'warning')); ?>"><?php echo e($loan->effective_status); ?></span></td>
<td><div class="btn-group">
<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('setujui peminjaman')): ?> <?php if($loan->status==='Menunggu'): ?><form method="POST" action="<?php echo e(route('peminjaman.approve',$loan)); ?>"><?php echo csrf_field(); ?><button class="btn btn-sm btn-success" title="Setujui"><i class="fas fa-check"></i></button></form>
<form method="POST" action="<?php echo e(route('peminjaman.reject',$loan)); ?>" class="ml-1"><?php echo csrf_field(); ?><button class="btn btn-sm btn-danger" title="Tolak"><i class="fas fa-xmark"></i></button></form><?php endif; ?> <?php endif; ?>
<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('proses pengembalian')): ?> <?php if(in_array($loan->effective_status,['Dipinjam','Terlambat'])): ?><form method="POST" action="<?php echo e(route('peminjaman.return',$loan)); ?>" class="ml-1"><?php echo csrf_field(); ?><button class="btn btn-sm btn-info" title="Kembalikan"><i class="fas fa-rotate-left"></i></button></form><?php endif; ?> <?php endif; ?>
<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('hapus peminjaman')): ?> <?php if(!in_array($loan->status,['Dipinjam','Terlambat'])): ?><form method="POST" action="<?php echo e(route('peminjaman.destroy',$loan)); ?>" class="ml-1"><?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?><button class="btn btn-sm btn-danger delete-button"><i class="fas fa-trash"></i></button></form><?php endif; ?> <?php endif; ?>
</div></td></tr><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></tbody> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal8aaf9779783cdf64609094123653a0b9)): ?>
<?php $attributes = $__attributesOriginal8aaf9779783cdf64609094123653a0b9; ?>
<?php unset($__attributesOriginal8aaf9779783cdf64609094123653a0b9); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8aaf9779783cdf64609094123653a0b9)): ?>
<?php $component = $__componentOriginal8aaf9779783cdf64609094123653a0b9; ?>
<?php unset($__componentOriginal8aaf9779783cdf64609094123653a0b9); ?>
<?php endif; ?></div></div>
<?php $__env->startPush('modal'); ?><div class="modal fade" id="createLoan"><div class="modal-dialog modal-lg"><div class="modal-content"><form method="POST" action="<?php echo e(route('peminjaman.store')); ?>"><?php echo csrf_field(); ?>
<div class="modal-header"><h5>Peminjaman Baru</h5><button class="close" data-dismiss="modal">&times;</button></div><div class="modal-body">
<div class="row"><div class="col-md-8 form-group"><label>Barang</label><select name="commodity_id" class="form-control" required><option value="">Pilih</option><?php $__currentLoopData = $commodities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><option value="<?php echo e($c->id); ?>"><?php echo e($c->item_code); ?> - <?php echo e($c->name); ?> (stok <?php echo e($c->quantity); ?>)</option><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></select></div><div class="col-md-4 form-group"><label>Jumlah</label><input type="number" name="quantity" min="1" value="1" class="form-control" required></div></div>
<div class="row"><div class="col-md-4 form-group"><label>Tanggal Pinjam</label><input type="date" name="loan_date" value="<?php echo e(today()->toDateString()); ?>" class="form-control" required></div><div class="col-md-4 form-group"><label>Harus Kembali</label><input type="date" name="due_date" class="form-control" required></div><div class="col-md-4 form-group"><label>Peminjam</label><input type="text" name="borrower" class="form-control" required></div></div>
<div class="form-group"><label>Keperluan</label><textarea name="purpose" class="form-control" required></textarea></div><div class="form-group"><label>Kondisi Saat Dipinjam</label><input name="borrowed_condition" class="form-control" value="Baik"></div><div class="form-group"><label>Keterangan</label><textarea name="note" class="form-control"></textarea></div>
</div><div class="modal-footer"><button class="btn btn-primary">Simpan</button></div></form></div></div></div><?php $__env->stopPush(); ?>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal23a33f287873b564aaf305a1526eada4)): ?>
<?php $attributes = $__attributesOriginal23a33f287873b564aaf305a1526eada4; ?>
<?php unset($__attributesOriginal23a33f287873b564aaf305a1526eada4); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal23a33f287873b564aaf305a1526eada4)): ?>
<?php $component = $__componentOriginal23a33f287873b564aaf305a1526eada4; ?>
<?php unset($__componentOriginal23a33f287873b564aaf305a1526eada4); ?>
<?php endif; ?><?php /**PATH C:\xampp\htdocs\aplikasi_inventaris_smk\resources\views/commodity-loans/index.blade.php ENDPATH**/ ?>
<?php if (isset($component)) { $__componentOriginal23a33f287873b564aaf305a1526eada4 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal23a33f287873b564aaf305a1526eada4 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.layout','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?> <?php $__env->slot('title', null, []); ?> Laporan <?php $__env->endSlot(); ?> <?php $__env->slot('page_heading', null, []); ?> Laporan Inventaris <?php $__env->endSlot(); ?>
<div class="row"><?php $__currentLoopData = [['barang','Jumlah Barang','fa-boxes-stacked'],['masuk','Barang Masuk','fa-arrow-down'],['keluar','Barang Keluar','fa-arrow-up'],['peminjaman','Total Peminjaman','fa-hand-holding'],['aktif','Peminjaman Aktif','fa-clock'],['sanksi','Total Sanksi','fa-triangle-exclamation'],['siswa','Total Siswa','fa-user-graduate']]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as [$k,$l,$i]): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><div class="col-md-3 col-sm-6"><div class="card card-statistic-1"><div class="card-icon bg-primary"><i class="fas <?php echo e($i); ?>"></i></div><div class="card-wrap"><div class="card-header"><h4><?php echo e($l); ?></h4></div><div class="card-body"><?php echo e($summary[$k]); ?></div></div></div></div><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></div>
<div class="card"><div class="card-body"><p class="text-muted">Gunakan menu Data Barang untuk export Excel/CSV dan PDF yang sudah tersedia. Laporan operasional dirangkum dari transaksi database secara dinamis.</p><a href="<?php echo e(route('barang.index')); ?>" class="btn btn-primary">Buka Data Barang</a></div></div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal23a33f287873b564aaf305a1526eada4)): ?>
<?php $attributes = $__attributesOriginal23a33f287873b564aaf305a1526eada4; ?>
<?php unset($__attributesOriginal23a33f287873b564aaf305a1526eada4); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal23a33f287873b564aaf305a1526eada4)): ?>
<?php $component = $__componentOriginal23a33f287873b564aaf305a1526eada4; ?>
<?php unset($__componentOriginal23a33f287873b564aaf305a1526eada4); ?>
<?php endif; ?><?php /**PATH C:\xampp\htdocs\aplikasi_inventaris_smk\resources\views/reports/index.blade.php ENDPATH**/ ?>
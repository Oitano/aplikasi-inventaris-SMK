<?php if (isset($component)) { $__componentOriginal23a33f287873b564aaf305a1526eada4 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal23a33f287873b564aaf305a1526eada4 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.layout','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?> <?php $__env->slot('title', null, []); ?> Data Barang <?php $__env->endSlot(); ?> <?php $__env->slot('page_heading', null, []); ?> Data Barang <?php $__env->endSlot(); ?>
<div class="row"><?php $__empty_1 = true; $__currentLoopData = $commodities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?><div class="col-xl-3 col-lg-4 col-md-6 col-sm-6"><div class="card h-100">
<?php if($c->photo): ?><img src="<?php echo e(asset('storage/'.$c->photo)); ?>" class="card-img-top" style="height:170px;object-fit:cover"><?php else: ?><div class="text-center p-4 bg-light"><i class="fas fa-box fa-4x text-muted"></i></div><?php endif; ?>
<div class="card-body"><h5><?php echo e($c->name); ?></h5><p class="mb-1"><b>Kode:</b> <?php echo e($c->item_code); ?></p><p class="mb-1"><b>Kategori:</b> <?php echo e($c->category??'-'); ?></p><p class="mb-1"><b>Kondisi:</b> <?php echo e($c->getConditionName()); ?></p><p class="mb-1"><b>Status:</b> <span class="badge badge-<?php echo e($c->getStatusBadgeClass()); ?>"><?php echo e($c->status); ?></span></p><p class="mb-0"><b>Lokasi:</b> <?php echo e($c->commodity_location?->name??'-'); ?></p></div>
</div></div><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?><div class="col-12"><div class="alert alert-info">Belum ada barang yang dapat ditampilkan.</div></div><?php endif; ?></div> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal23a33f287873b564aaf305a1526eada4)): ?>
<?php $attributes = $__attributesOriginal23a33f287873b564aaf305a1526eada4; ?>
<?php unset($__attributesOriginal23a33f287873b564aaf305a1526eada4); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal23a33f287873b564aaf305a1526eada4)): ?>
<?php $component = $__componentOriginal23a33f287873b564aaf305a1526eada4; ?>
<?php unset($__componentOriginal23a33f287873b564aaf305a1526eada4); ?>
<?php endif; ?><?php /**PATH C:\xampp\htdocs\aplikasi_inventaris_smk\resources\views/student-commodities/index.blade.php ENDPATH**/ ?>
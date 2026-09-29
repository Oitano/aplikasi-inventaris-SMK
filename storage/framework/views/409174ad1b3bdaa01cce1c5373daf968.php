
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
     <?php $__env->slot('title', null, []); ?> Dashboard Siswa <?php $__env->endSlot(); ?>
     <?php $__env->slot('page_heading', null, []); ?> Dashboard Siswa <?php $__env->endSlot(); ?>

    
    <div class="row">
        <?php $__currentLoopData = [
            [
                'Peminjaman Aktif',
                $loans->whereIn('status', ['Disetujui', 'Dipinjam', 'Terlambat'])->count(),
                'fa-hand-holding',
                'warning'
            ],
            [
                'Terlambat',
                $loans->filter(fn($l) => $l->effective_status === 'Terlambat')->count(),
                'fa-clock',
                'danger'
            ],
            [
                'Riwayat Peminjaman',
                $loans->count(),
                'fa-history',
                'primary'
            ],
            [
                'Sanksi',
                $sanctions->count(),
                'fa-triangle-exclamation',
                'info'
            ]
        ]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as [$label, $value, $icon, $color]): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

            <div class="col-md-3 col-sm-6">
                <div class="card card-statistic-1">

                    <div class="card-icon bg-<?php echo e($color); ?>">
                        <i class="fas <?php echo e($icon); ?>"></i>
                    </div>

                    <div class="card-wrap">
                        <div class="card-header">
                            <h4><?php echo e($label); ?></h4>
                        </div>

                        <div class="card-body">
                            <?php echo e($value); ?>

                        </div>
                    </div>

                </div>
            </div>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>


    
    <div class="card">

        <div class="card-header">
            <h4>Peminjaman Saya</h4>
        </div>

        <div class="card-body">

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
                        <th>Barang</th>
                        <th>Jumlah</th>
                        <th>Pinjam</th>
                        <th>Rencana Kembali</th>
                        <th>Status</th>
                    </tr>
                </thead>

                <tbody>
                    <?php $__currentLoopData = $loans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $loan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                        <tr>
                            
                            <td>
                                <?php echo e($loan->commodity?->name ?? '-'); ?>

                            </td>

                            
                            <td>
                                <?php echo e($loan->quantity); ?>

                            </td>

                            
                            <td>
                                <?php echo e($loan->loan_date?->format('d-m-Y')); ?>

                            </td>

                            
                            <td>
                                <?php echo e($loan->due_date?->format('d-m-Y') ?? '-'); ?>

                            </td>

                            
                            <td>
                                <span class="badge badge-<?php echo e(in_array(
                                        $loan->effective_status,
                                        ['Ditolak', 'Bermasalah', 'Terlambat']
                                    )
                                    ? 'danger'
                                    : (
                                        $loan->effective_status === 'Dikembalikan'
                                        ? 'success'
                                        : 'warning'
                                    )); ?>">
                                    <?php echo e($loan->effective_status); ?>

                                </span>
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

 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal23a33f287873b564aaf305a1526eada4)): ?>
<?php $attributes = $__attributesOriginal23a33f287873b564aaf305a1526eada4; ?>
<?php unset($__attributesOriginal23a33f287873b564aaf305a1526eada4); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal23a33f287873b564aaf305a1526eada4)): ?>
<?php $component = $__componentOriginal23a33f287873b564aaf305a1526eada4; ?>
<?php unset($__componentOriginal23a33f287873b564aaf305a1526eada4); ?>
<?php endif; ?><?php /**PATH C:\xampp\htdocs\aplikasi_inventaris_smk_FIXED\resources\views/dashboards/student.blade.php ENDPATH**/ ?>
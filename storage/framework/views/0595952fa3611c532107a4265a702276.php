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

     <?php $__env->slot('title', null, []); ?> 
        Dashboard
     <?php $__env->endSlot(); ?>

     <?php $__env->slot('page_heading', null, []); ?> 
        Dashboard <?php echo e(auth()->user()->getRoleNames()->first()); ?>

     <?php $__env->endSlot(); ?>


    
    
    

    <div class="row">

        <?php $__currentLoopData = [
            ['total_barang', 'Total Barang', 'fa-boxes-stacked', 'primary'],
            ['barang_tersedia', 'Barang Tersedia', 'fa-box-open', 'success'],
            ['barang_dipinjam', 'Barang Dipinjam', 'fa-hand-holding', 'warning'],
            ['barang_rusak', 'Barang Rusak', 'fa-triangle-exclamation', 'danger'],
            ['barang_hilang', 'Barang Hilang', 'fa-circle-xmark', 'dark'],
            ['barang_masuk', 'Total Barang Masuk', 'fa-arrow-down', 'info'],
            ['barang_keluar', 'Total Barang Keluar', 'fa-arrow-up', 'danger'],
            ['total_peminjaman', 'Total Peminjaman', 'fa-list-check', 'primary'],
            ['peminjaman_aktif', 'Peminjaman Aktif', 'fa-clock', 'warning'],
            ['peminjaman_terlambat', 'Peminjaman Terlambat', 'fa-bell', 'danger'],
            ['total_siswa', 'Total Siswa', 'fa-user-graduate', 'info'],
            ['total_staff', 'Total Staff TU', 'fa-user-tie', 'success'],
            ['total_admin', 'Total Administrator', 'fa-user-shield', 'dark']
        ]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as [$key, $label, $icon, $color]): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

            <div class="col-lg-3 col-md-4 col-sm-6 col-12">

                <div class="card card-statistic-1">

                    <div class="card-icon bg-<?php echo e($color); ?>">
                        <i class="fas <?php echo e($icon); ?>"></i>
                    </div>

                    <div class="card-wrap">

                        <div class="card-header">
                            <h4><?php echo e($label); ?></h4>
                        </div>

                        <div class="card-body">
                            <?php echo e(number_format($stats[$key] ?? 0, 0, ',', '.')); ?>

                        </div>

                    </div>

                </div>

            </div>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    </div>


    
    
    

    <?php if(auth()->user()->isAdministrator()): ?>

        <div class="card">

            <div class="card-header">

                <h4>
                    <i class="fas fa-clock-rotate-left mr-2"></i>
                    Aktivitas Terbaru
                </h4>

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
                            <th>User</th>
                            <th>Aktivitas</th>
                            <th>Modul</th>
                            <th>Data</th>
                            <th>Tanggal</th>
                            <th>IP</th>
                        </tr>
                    </thead>


                    <tbody>

                        <?php $__currentLoopData = $activities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $log): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                            <tr>

                                
                                <td>
                                    <?php echo e($log->user?->name ?? 'System'); ?>


                                    <br>

                                    <small>
                                        <?php echo e($log->role ?? '-'); ?>

                                    </small>
                                </td>


                                
                                <td>
                                    <?php echo e($log->action); ?>

                                </td>


                                
                                <td>
                                    <?php echo e($log->module); ?>

                                </td>


                                
                                <td>
                                    <?php echo e($log->description); ?>

                                </td>


                                
                                <td>
                                    <?php echo e($log->created_at
                                        ? $log->created_at->format('d-m-Y H:i')
                                        : '-'); ?>

                                </td>


                                
                                <td>
                                    <?php echo e($log->ip ?? '-'); ?>

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

    <?php endif; ?>

 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal23a33f287873b564aaf305a1526eada4)): ?>
<?php $attributes = $__attributesOriginal23a33f287873b564aaf305a1526eada4; ?>
<?php unset($__attributesOriginal23a33f287873b564aaf305a1526eada4); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal23a33f287873b564aaf305a1526eada4)): ?>
<?php $component = $__componentOriginal23a33f287873b564aaf305a1526eada4; ?>
<?php unset($__componentOriginal23a33f287873b564aaf305a1526eada4); ?>
<?php endif; ?><?php /**PATH C:\xampp\htdocs\aplikasi_inventaris_smk_FIXED\resources\views/home.blade.php ENDPATH**/ ?>
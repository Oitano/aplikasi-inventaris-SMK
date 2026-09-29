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
        Sanksi
     <?php $__env->endSlot(); ?>

     <?php $__env->slot('page_heading', null, []); ?> 
        <?php echo e(auth()->user()->isStudent() ? 'Sanksi Saya' : 'Manajemen Sanksi'); ?>

     <?php $__env->endSlot(); ?>


    
    
    

    <div class="card">
        <div class="card-body">

            <?php echo $__env->make('utilities.alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


            
            
            

            <?php if(!auth()->user()->isStudent()): ?>

                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('tambah sanksi')): ?>

                    <div class="text-right mb-3">
                        <button
                            type="button"
                            class="btn btn-primary"
                            data-toggle="modal"
                            data-target="#sanctionModal">

                            <i class="fas fa-plus"></i>
                            Tambah Sanksi

                        </button>
                    </div>

                <?php endif; ?>

            <?php endif; ?>


            
            
            

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

                        <th>Tanggal</th>

                        <th>Siswa</th>

                        <th>Pelanggaran</th>

                        <th>Barang</th>

                        <th>Status</th>

                        <?php if(!auth()->user()->isStudent()): ?>
                            <th>Aksi</th>
                        <?php endif; ?>

                    </tr>
                </thead>


                <tbody>

                    <?php $__currentLoopData = $sanctions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                        <tr>

                            
                            <td>
                                <?php echo e($s->date ? $s->date->format('d-m-Y') : '-'); ?>

                            </td>


                            
                            <td>
                                <?php echo e($s->user?->name ?? '-'); ?>

                            </td>


                            
                            <td>

                                <strong>
                                    <?php echo e($s->violation_type); ?>

                                </strong>

                                <br>

                                <?php echo e($s->description); ?>


                            </td>


                            
                            <td>
                                <?php echo e($s->commodity?->name ?? '-'); ?>

                            </td>


                            
                            <td>

                                <?php if($s->status === 'Selesai'): ?>

                                    <span class="badge badge-success">
                                        Selesai
                                    </span>

                                <?php elseif($s->status === 'Dalam proses'): ?>

                                    <span class="badge badge-warning">
                                        Dalam proses
                                    </span>

                                <?php else: ?>

                                    <span class="badge badge-danger">
                                        Belum diselesaikan
                                    </span>

                                <?php endif; ?>

                            </td>


                            
                            <?php if(!auth()->user()->isStudent()): ?>

                                <td>

                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('hapus sanksi')): ?>

                                        <form
                                            method="POST"
                                            action="<?php echo e(route('sanksi.destroy', $s)); ?>"
                                            class="d-inline">

                                            <?php echo csrf_field(); ?>

                                            <?php echo method_field('DELETE'); ?>

                                            <button
                                                type="submit"
                                                class="btn btn-sm btn-danger delete-button"
                                                title="Hapus">

                                                <i class="fas fa-trash"></i>

                                            </button>

                                        </form>

                                    <?php endif; ?>

                                </td>

                            <?php endif; ?>

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



    
    
    

    <?php if(!auth()->user()->isStudent()): ?>

        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('tambah sanksi')): ?>

            <?php $__env->startPush('modal'); ?>

                <div
                    class="modal fade"
                    id="sanctionModal"
                    tabindex="-1"
                    role="dialog"
                    aria-labelledby="sanctionModalLabel"
                    aria-hidden="true">

                    <div
                        class="modal-dialog modal-lg"
                        role="document">

                        <div class="modal-content">

                            <form
                                method="POST"
                                action="<?php echo e(route('sanksi.store')); ?>">

                                <?php echo csrf_field(); ?>


                                

                                <div class="modal-header">

                                    <h5
                                        class="modal-title"
                                        id="sanctionModalLabel">

                                        <i class="fas fa-triangle-exclamation"></i>
                                        Tambah Sanksi

                                    </h5>

                                    <button
                                        type="button"
                                        class="close"
                                        data-dismiss="modal"
                                        aria-label="Close">

                                        <span aria-hidden="true">
                                            &times;
                                        </span>

                                    </button>

                                </div>


                                

                                <div class="modal-body">


                                    

                                    <div class="form-group">

                                        <label>
                                            Siswa
                                        </label>

                                        <select
                                            name="user_id"
                                            class="form-control"
                                            required>

                                            <option value="">
                                                Pilih siswa
                                            </option>

                                            <?php $__currentLoopData = $students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $u): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                                <option value="<?php echo e($u->id); ?>">

                                                    <?php echo e($u->name); ?>

                                                    -
                                                    <?php echo e($u->email); ?>


                                                </option>

                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                        </select>

                                    </div>



                                    

                                    <div class="row">

                                        <div class="col-md-6">

                                            <div class="form-group">

                                                <label>
                                                    Jenis Pelanggaran
                                                </label>

                                                <select
                                                    name="violation_type"
                                                    class="form-control"
                                                    required>

                                                    <option value="">
                                                        Pilih jenis pelanggaran
                                                    </option>

                                                    <option value="Barang hilang">
                                                        Barang hilang
                                                    </option>

                                                    <option value="Barang rusak">
                                                        Barang rusak
                                                    </option>

                                                    <option value="Terlambat mengembalikan">
                                                        Terlambat mengembalikan
                                                    </option>

                                                    <option value="Tidak mengembalikan barang">
                                                        Tidak mengembalikan barang
                                                    </option>

                                                </select>

                                            </div>

                                        </div>


                                        <div class="col-md-6">

                                            <div class="form-group">

                                                <label>
                                                    Tanggal
                                                </label>

                                                <input
                                                    type="date"
                                                    name="date"
                                                    class="form-control"
                                                    value="<?php echo e(today()->toDateString()); ?>"
                                                    required>

                                            </div>

                                        </div>

                                    </div>



                                    

                                    <div class="form-group">

                                        <label>
                                            Peminjaman
                                        </label>

                                        <select
                                            name="commodity_loan_id"
                                            class="form-control">

                                            <option value="">
                                                Tidak terkait peminjaman
                                            </option>

                                            <?php $__currentLoopData = $loans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $l): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                                <option value="<?php echo e($l->id); ?>">

                                                    <?php echo e($l->user?->name ?? $l->borrower); ?>


                                                    -

                                                    <?php echo e($l->commodity?->name ?? '-'); ?>


                                                </option>

                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                        </select>

                                    </div>



                                    

                                    <div class="form-group">

                                        <label>
                                            Barang
                                        </label>

                                        <select
                                            name="commodity_id"
                                            class="form-control">

                                            <option value="">
                                                Tidak terkait barang
                                            </option>

                                            <?php $__currentLoopData = \App\Commodity::orderBy('name')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                                <option value="<?php echo e($c->id); ?>">

                                                    <?php echo e($c->name); ?>


                                                </option>

                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                        </select>

                                    </div>



                                    

                                    <div class="form-group">

                                        <label>
                                            Keterangan
                                        </label>

                                        <textarea
                                            name="description"
                                            class="form-control"
                                            rows="3"
                                            required></textarea>

                                    </div>



                                    

                                    <div class="form-group">

                                        <label>
                                            Status
                                        </label>

                                        <select
                                            name="status"
                                            class="form-control">

                                            <option value="Belum diselesaikan">
                                                Belum diselesaikan
                                            </option>

                                            <option value="Dalam proses">
                                                Dalam proses
                                            </option>

                                            <option value="Selesai">
                                                Selesai
                                            </option>

                                        </select>

                                    </div>



                                    

                                    <div class="form-group">

                                        <label>
                                            Catatan Administrator
                                        </label>

                                        <textarea
                                            name="admin_note"
                                            class="form-control"
                                            rows="3"></textarea>

                                    </div>

                                </div>


                                

                                <div class="modal-footer">

                                    <button
                                        type="button"
                                        class="btn btn-secondary"
                                        data-dismiss="modal">

                                        Batal

                                    </button>

                                    <button
                                        type="submit"
                                        class="btn btn-primary">

                                        <i class="fas fa-save"></i>
                                        Simpan

                                    </button>

                                </div>

                            </form>

                        </div>

                    </div>

                </div>

            <?php $__env->stopPush(); ?>

        <?php endif; ?>

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
<?php endif; ?><?php /**PATH C:\xampp\htdocs\aplikasi_inventaris_smk_FIXED\resources\views/sanctions/index.blade.php ENDPATH**/ ?>
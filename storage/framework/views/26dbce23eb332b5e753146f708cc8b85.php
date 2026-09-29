<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8" />
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport" />
	<title><?php echo e($title); ?></title>

	<!-- General CSS Files -->
	<link rel="stylesheet" href="<?php echo e(url('assets/bootstrap/css/bootstrap.min.css')); ?>" />
	<link rel="stylesheet" href="<?php echo e(url('assets/fontawesome/css/all.css')); ?>" />

	<!-- CSS Libraries -->
	<link rel="stylesheet" href="https://cdn.datatables.net/2.0.6/css/dataTables.bootstrap4.css" />

	<!-- Template CSS -->
	<link rel="stylesheet" href="<?php echo e(url('assets/css/style.css')); ?>" />
	<link rel="stylesheet" href="<?php echo e(url('assets/css/components.css')); ?>" />

	<link href="https://cdn.jsdelivr.net/npm/tom-select@2.4.1/dist/css/tom-select.min.css" rel="stylesheet" />
	<link rel="stylesheet"
		href="https://cdn.jsdelivr.net/npm/tom-select@2.4.1/dist/css/tom-select.bootstrap4.min.css" />
</head>

<body>
	<div id="app">
		<div class="main-wrapper">
			<div class="navbar-bg"></div>
			<nav class="navbar navbar-expand-lg main-navbar">
				<form class="form-inline mr-auto">
					<ul class="navbar-nav mr-3">
						<li>
							<a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a>
						</li>
					</ul>
				</form>
				<ul class="navbar-nav navbar-right">
                    <li class="dropdown">
                        <a href="#" data-toggle="dropdown" class="nav-link nav-link-lg">
                            <i class="far fa-bell"></i>
                            <?php if(auth()->user()->unreadNotifications->count()): ?><span class="badge badge-danger badge-sm"><?php echo e(auth()->user()->unreadNotifications->count()); ?></span><?php endif; ?>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" style="min-width:320px">
                            <div class="dropdown-title">Notifikasi</div>
                            <?php $__empty_1 = true; $__currentLoopData = auth()->user()->notifications()->latest()->limit(5)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notification): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <div class="dropdown-item <?php echo e(is_null($notification->read_at)?'font-weight-bold':''); ?>">
                                <div><?php echo e($notification->data['title']??'Notifikasi'); ?></div><small><?php echo e($notification->data['message']??''); ?></small>
                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <div class="dropdown-item-text text-muted px-3 py-2">Belum ada notifikasi.</div>
                            <?php endif; ?>
                            <?php if(auth()->user()->unreadNotifications->count()): ?>
                            <form method="POST" action="<?php echo e(route('notifications.read-all')); ?>" class="px-3 py-2"><?php echo csrf_field(); ?><button class="btn btn-sm btn-link p-0">Tandai semua dibaca</button></form>
                            <?php endif; ?>
                        </div>
                    </li>
					<li class="dropdown">
						<a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
							<img alt="image" src="../assets/img/avatar/avatar-1.png" class="rounded-circle mr-1" />
							<div class="d-sm-none d-lg-inline-block">Halo, <?php echo e(auth()->user()->name); ?></div>
						</a>
						<div class="dropdown-menu dropdown-menu-right">
							<div class="dropdown-title">Akun sejak: <?php echo e(auth()->user()->diffForHumanDate(auth()->user()->created_at)); ?>

							</div>
							<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('mengatur profile')): ?>
							<a href="<?php echo e(route('profile.index')); ?>" class="dropdown-item has-icon"> <i class="fas fa-cog"></i>
								Pengaturan Profil </a>
							<?php endif; ?>
							<div class="dropdown-divider"></div>
							
							<form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST">
								<?php echo csrf_field(); ?>

								<button type="submit" class="dropdown-item has-icon btn-link text-danger logout">
									Logout
								</button>
							</form>
						</div>
					</li>
				</ul>
			</nav>

			<div class="main-sidebar">
				<aside id="sidebar-wrapper">
					<div class="sidebar-brand">
						<a href="<?php echo e(route('home')); ?>"> InvenSchool</a>
					</div>
					<div class="sidebar-brand sidebar-brand-sm">
						<a href="<?php echo e(route('home')); ?>">InvenSchool</a>
					</div>
					<ul class="sidebar-menu">
						<li class="menu-header">Dashboard</li>
						<li class="nav-item <?php echo e(request()->routeIs('home') ? 'active' : ''); ?>"><a href="<?php echo e(route('home')); ?>" class="nav-link"><i class="fas fa-fire"></i><span>Dashboard</span></a></li>

						<li class="menu-header">Inventaris</li>
						<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('lihat barang')): ?>
						<li class="nav-item <?php echo e(request()->routeIs('barang.*') ? 'active' : ''); ?>"><a href="<?php echo e(route('barang.index')); ?>" class="nav-link"><i class="fas fa-boxes-stacked"></i><span>Data Barang</span></a></li>
						<?php endif; ?>
						<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('lihat barang masuk')): ?>
						<li class="nav-item <?php echo e(request()->routeIs('barang-masuk.*') ? 'active' : ''); ?>"><a href="<?php echo e(route('barang-masuk.index')); ?>" class="nav-link"><i class="fas fa-arrow-down"></i><span>Barang Masuk</span></a></li>
						<?php endif; ?>
						<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('lihat barang keluar')): ?>
						<li class="nav-item <?php echo e(request()->routeIs('barang-keluar.*') ? 'active' : ''); ?>"><a href="<?php echo e(route('barang-keluar.index')); ?>" class="nav-link"><i class="fas fa-arrow-up"></i><span>Barang Keluar</span></a></li>
						<?php endif; ?>
						<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('lihat peminjaman')): ?>
						<li class="nav-item <?php echo e(request()->routeIs('peminjaman.*') ? 'active' : ''); ?>"><a href="<?php echo e(route('peminjaman.index')); ?>" class="nav-link"><i class="fas fa-hand-holding"></i><span><?php echo e(auth()->user()->isStudent()?'Peminjaman Saya':'Peminjaman'); ?></span></a></li>
						<?php endif; ?>
						<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('lihat sanksi')): ?>
						<li class="nav-item <?php echo e(request()->routeIs('sanksi.*') ? 'active' : ''); ?>"><a href="<?php echo e(route('sanksi.index')); ?>" class="nav-link"><i class="fas fa-triangle-exclamation"></i><span><?php echo e(auth()->user()->isStudent()?'Sanksi Saya':'Sanksi'); ?></span></a></li>
						<?php endif; ?>
						<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('lihat perolehan')): ?>
						<li class="nav-item <?php echo e(request()->routeIs('perolehan.*') ? 'active' : ''); ?>"><a href="<?php echo e(route('perolehan.index')); ?>" class="nav-link"><i class="fas fa-hand-holding-dollar"></i><span>Data Perolehan</span></a></li>
						<?php endif; ?>
						<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('lihat ruangan')): ?>
						<li class="nav-item <?php echo e(request()->routeIs('ruangan.*') ? 'active' : ''); ?>"><a href="<?php echo e(route('ruangan.index')); ?>" class="nav-link"><i class="fas fa-map-location-dot"></i><span>Data Ruangan</span></a></li>
						<?php endif; ?>
						<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('lihat laporan')): ?>
						<li class="nav-item <?php echo e(request()->routeIs('laporan.*') ? 'active' : ''); ?>"><a href="<?php echo e(route('laporan.index')); ?>" class="nav-link"><i class="fas fa-chart-column"></i><span>Laporan</span></a></li>
						<?php endif; ?>

						<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('kelola pengguna')): ?>
						<li class="menu-header">Administrasi</li>
						<li class="nav-item <?php echo e(request()->routeIs('pengguna.*') ? 'active' : ''); ?>"><a href="<?php echo e(route('pengguna.index')); ?>" class="nav-link"><i class="fas fa-users"></i><span>Pengguna</span></a></li>
						<?php endif; ?>
						<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('lihat aktivitas')): ?>
						<li class="nav-item <?php echo e(request()->routeIs('audit.*') ? 'active' : ''); ?>"><a href="<?php echo e(route('audit.index')); ?>" class="nav-link"><i class="fas fa-clock-rotate-left"></i><span>Riwayat Aktivitas</span></a></li>
						<?php endif; ?>
						<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('lihat peran dan hak akses')): ?>
						<li class="nav-item <?php echo e(request()->routeIs('peran-dan-hak-akses.*') ? 'active' : ''); ?>"><a href="<?php echo e(route('peran-dan-hak-akses.index')); ?>" class="nav-link"><i class="fas fa-user-shield"></i><span>Peran & Hak Akses</span></a></li>
						<?php endif; ?>

						<li class="menu-header">Akun</li>
						<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('mengatur profile')): ?>
						<li class="nav-item <?php echo e(request()->routeIs('profile.*') ? 'active' : ''); ?>"><a href="<?php echo e(route('profile.index')); ?>" class="nav-link"><i class="fas fa-cog"></i><span>Pengaturan Profil</span></a></li>
						<?php endif; ?>
					</ul>
					<div class="mt-4 mb-4 p-3 hide-sidebar-mini">
						<form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST">
							<button type="submit" class="btn btn-danger btn-lg btn-block btn-icon-split logout">
								<i class="fas fa-fw fa-sign-out-alt"></i>
								Logout
							</button>
							<?php echo csrf_field(); ?>
						</form>
						<center><br><p>Created by <a href='https://www.instagram.com/delvbyelham_?igsh=dGRzZGdqaGgyaG15&utm_source=qr' title='Delvbyelham' target='_blank'>Delvbyelham</a></p></center>
					</div>
				</aside>
			</div>

			<!-- Main Content -->
			<div class="main-content">
				<section class="section">
					<div class="section-header">
						<h1><?php echo e($page_heading); ?></h1>
					</div>

					<?php echo e($slot); ?>

				</section>
			</div>
		</div>
	</div>

	<!-- General JS Scripts -->
	<script src="<?php echo e(url('assets/js/jquery-3.5.1.min.js')); ?>"></script>
	<script src="<?php echo e(url('assets/js/popper.min.js')); ?>"></script>
	<script src="<?php echo e(url('assets/bootstrap/js/bootstrap.min.js')); ?>"></script>
	<script src="<?php echo e(url('assets/js/jquery.nicescroll.min.js')); ?>"></script>
	<script src="<?php echo e(url('assets/js/moment.min.js')); ?>"></script>
	<script src="<?php echo e(url('assets/js/stisla.js')); ?>"></script>

	<!-- JS Libraies -->
	<script src="https://cdn.datatables.net/2.0.6/js/dataTables.js"></script>
	<script src="https://cdn.datatables.net/2.0.6/js/dataTables.bootstrap4.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

	<!-- Template JS File -->
	<script src="<?php echo e(url('assets/js/scripts.js')); ?>"></script>
	<script src="<?php echo e(url('assets/js/custom.js')); ?>"></script>

	<!-- Page Specific JS File -->
	<script src="<?php echo e(url('assets/js/page/index-0.js')); ?>"></script>

	<script src="https://cdn.jsdelivr.net/npm/tom-select@2.4.1/dist/js/tom-select.complete.min.js"></script>

	<script src="<?php echo e(asset('js/scripts.js')); ?>"></script>

	<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

	<script>
		$(document).ready(function () {
        $(".delete-button").click(function (e) {
          e.preventDefault();
          Swal.fire({
            title: "Hapus?",
            text: "Data tidak akan bisa dikembalikan!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Ya",
            cancelButtonText: "Batal",
            reverseButtons: true,
          }).then((result) => {
            if (result.value) {
              $(this).parent().submit();
            }
          });
        });

        $(".logout").click(function (e) {
          e.preventDefault();
          Swal.fire({
            title: "Keluar?",
            text: "Anda akan keluar dari aplikasi!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Ya",
            cancelButtonText: "Batal",
            reverseButtons: true,
          }).then((result) => {
            if (result.value) {
              $(this).parent().submit();
            }
          });
        });
      });
	</script>
	<?php echo $__env->yieldPushContent('modal'); ?>
	<?php echo $__env->yieldPushContent('js'); ?>
</body>

</html>
<?php /**PATH C:\xampp\htdocs\aplikasi_inventaris_smk_FIXED\resources\views/components/layout.blade.php ENDPATH**/ ?>
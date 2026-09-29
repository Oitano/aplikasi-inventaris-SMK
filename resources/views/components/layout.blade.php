<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8" />
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport" />
	<title>{{ $title }}</title>

	<!-- General CSS Files -->
	<link rel="stylesheet" href="{{ url('assets/bootstrap/css/bootstrap.min.css') }}" />
	<link rel="stylesheet" href="{{ url('assets/fontawesome/css/all.css') }}" />

	<!-- CSS Libraries -->
	<link rel="stylesheet" href="https://cdn.datatables.net/2.0.6/css/dataTables.bootstrap4.css" />

	<!-- Template CSS -->
	<link rel="stylesheet" href="{{ url('assets/css/style.css') }}" />
	<link rel="stylesheet" href="{{ url('assets/css/components.css') }}" />

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
                            @if(auth()->user()->unreadNotifications->count())<span class="badge badge-danger badge-sm">{{auth()->user()->unreadNotifications->count()}}</span>@endif
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" style="min-width:320px">
                            <div class="dropdown-title">Notifikasi</div>
                            @forelse(auth()->user()->notifications()->latest()->limit(5)->get() as $notification)
                            <div class="dropdown-item {{is_null($notification->read_at)?'font-weight-bold':''}}">
                                <div>{{$notification->data['title']??'Notifikasi'}}</div><small>{{$notification->data['message']??''}}</small>
                            </div>
                            @empty
                            <div class="dropdown-item-text text-muted px-3 py-2">Belum ada notifikasi.</div>
                            @endforelse
                            @if(auth()->user()->unreadNotifications->count())
                            <form method="POST" action="{{route('notifications.read-all')}}" class="px-3 py-2">@csrf<button class="btn btn-sm btn-link p-0">Tandai semua dibaca</button></form>
                            @endif
                        </div>
                    </li>
					<li class="dropdown">
						<a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
							<img alt="image" src="../assets/img/avatar/avatar-1.png" class="rounded-circle mr-1" />
							<div class="d-sm-none d-lg-inline-block">Halo, {{ auth()->user()->name }}</div>
						</a>
						<div class="dropdown-menu dropdown-menu-right">
							<div class="dropdown-title">Akun sejak: {{ auth()->user()->diffForHumanDate(auth()->user()->created_at) }}
							</div>
							@can('mengatur profile')
							<a href="{{ route('profile.index') }}" class="dropdown-item has-icon"> <i class="fas fa-cog"></i>
								Pengaturan Profil </a>
							@endcan
							<div class="dropdown-divider"></div>
							{{--
							<a class="dropdown-item has-icon text-danger" href="{{ route('logout') }}">
								<i class="fas fa-sign-out-alt"></i>
								{{ __('Logout') }}
							</a>
							--}}
							<form id="logout-form" action="{{ route('logout') }}" method="POST">
								@csrf

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
						<a href="{{ route('home') }}"> InvenSchool</a>
					</div>
					<div class="sidebar-brand sidebar-brand-sm">
						<a href="{{ route('home') }}">InvenSchool</a>
					</div>
					<ul class="sidebar-menu">
						<li class="menu-header">Dashboard</li>
						<li class="nav-item {{ request()->routeIs('home') ? 'active' : '' }}"><a href="{{ route('home') }}" class="nav-link"><i class="fas fa-fire"></i><span>Dashboard</span></a></li>

						<li class="menu-header">Inventaris</li>
						@can('lihat barang')
						<li class="nav-item {{ request()->routeIs('barang.*') ? 'active' : '' }}"><a href="{{ route('barang.index') }}" class="nav-link"><i class="fas fa-boxes-stacked"></i><span>Data Barang</span></a></li>
						@endcan
						@can('lihat barang masuk')
						<li class="nav-item {{ request()->routeIs('barang-masuk.*') ? 'active' : '' }}"><a href="{{ route('barang-masuk.index') }}" class="nav-link"><i class="fas fa-arrow-down"></i><span>Barang Masuk</span></a></li>
						@endcan
						@can('lihat barang keluar')
						<li class="nav-item {{ request()->routeIs('barang-keluar.*') ? 'active' : '' }}"><a href="{{ route('barang-keluar.index') }}" class="nav-link"><i class="fas fa-arrow-up"></i><span>Barang Keluar</span></a></li>
						@endcan
						@can('lihat peminjaman')
						<li class="nav-item {{ request()->routeIs('peminjaman.*') ? 'active' : '' }}"><a href="{{ route('peminjaman.index') }}" class="nav-link"><i class="fas fa-hand-holding"></i><span>{{auth()->user()->isStudent()?'Peminjaman Saya':'Peminjaman'}}</span></a></li>
						@endcan
						@can('lihat sanksi')
						<li class="nav-item {{ request()->routeIs('sanksi.*') ? 'active' : '' }}"><a href="{{ route('sanksi.index') }}" class="nav-link"><i class="fas fa-triangle-exclamation"></i><span>{{auth()->user()->isStudent()?'Sanksi Saya':'Sanksi'}}</span></a></li>
						@endcan
						@can('lihat perolehan')
						<li class="nav-item {{ request()->routeIs('perolehan.*') ? 'active' : '' }}"><a href="{{ route('perolehan.index') }}" class="nav-link"><i class="fas fa-hand-holding-dollar"></i><span>Data Perolehan</span></a></li>
						@endcan
						@can('lihat ruangan')
						<li class="nav-item {{ request()->routeIs('ruangan.*') ? 'active' : '' }}"><a href="{{ route('ruangan.index') }}" class="nav-link"><i class="fas fa-map-location-dot"></i><span>Data Ruangan</span></a></li>
						@endcan
						@can('lihat laporan')
						<li class="nav-item {{ request()->routeIs('laporan.*') ? 'active' : '' }}"><a href="{{ route('laporan.index') }}" class="nav-link"><i class="fas fa-chart-column"></i><span>Laporan</span></a></li>
						@endcan

						@can('kelola pengguna')
						<li class="menu-header">Administrasi</li>
						<li class="nav-item {{ request()->routeIs('pengguna.*') ? 'active' : '' }}"><a href="{{ route('pengguna.index') }}" class="nav-link"><i class="fas fa-users"></i><span>Pengguna</span></a></li>
						@endcan
						@can('lihat aktivitas')
						<li class="nav-item {{ request()->routeIs('audit.*') ? 'active' : '' }}"><a href="{{ route('audit.index') }}" class="nav-link"><i class="fas fa-clock-rotate-left"></i><span>Riwayat Aktivitas</span></a></li>
						@endcan
						@can('lihat peran dan hak akses')
						<li class="nav-item {{ request()->routeIs('peran-dan-hak-akses.*') ? 'active' : '' }}"><a href="{{ route('peran-dan-hak-akses.index') }}" class="nav-link"><i class="fas fa-user-shield"></i><span>Peran & Hak Akses</span></a></li>
						@endcan

						<li class="menu-header">Akun</li>
						@can('mengatur profile')
						<li class="nav-item {{ request()->routeIs('profile.*') ? 'active' : '' }}"><a href="{{ route('profile.index') }}" class="nav-link"><i class="fas fa-cog"></i><span>Pengaturan Profil</span></a></li>
						@endcan
					</ul>
					<div class="mt-4 mb-4 p-3 hide-sidebar-mini">
						<form id="logout-form" action="{{ route('logout') }}" method="POST">
							<button type="submit" class="btn btn-danger btn-lg btn-block btn-icon-split logout">
								<i class="fas fa-fw fa-sign-out-alt"></i>
								Logout
							</button>
							@csrf
						</form>
						<center><br><p>Created by <a href='https://www.instagram.com/delvbyelham_?igsh=dGRzZGdqaGgyaG15&utm_source=qr' title='Delvbyelham' target='_blank'>Delvbyelham</a></p></center>
					</div>
				</aside>
			</div>

			<!-- Main Content -->
			<div class="main-content">
				<section class="section">
					<div class="section-header">
						<h1>{{ $page_heading }}</h1>
					</div>

					{{ $slot }}
				</section>
			</div>
		</div>
	</div>

	<!-- General JS Scripts -->
	<script src="{{ url('assets/js/jquery-3.5.1.min.js') }}"></script>
	<script src="{{ url('assets/js/popper.min.js') }}"></script>
	<script src="{{ url('assets/bootstrap/js/bootstrap.min.js') }}"></script>
	<script src="{{ url('assets/js/jquery.nicescroll.min.js') }}"></script>
	<script src="{{ url('assets/js/moment.min.js') }}"></script>
	<script src="{{ url('assets/js/stisla.js') }}"></script>

	<!-- JS Libraies -->
	<script src="https://cdn.datatables.net/2.0.6/js/dataTables.js"></script>
	<script src="https://cdn.datatables.net/2.0.6/js/dataTables.bootstrap4.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

	<!-- Template JS File -->
	<script src="{{ url('assets/js/scripts.js') }}"></script>
	<script src="{{ url('assets/js/custom.js') }}"></script>

	<!-- Page Specific JS File -->
	<script src="{{ url('assets/js/page/index-0.js') }}"></script>

	<script src="https://cdn.jsdelivr.net/npm/tom-select@2.4.1/dist/js/tom-select.complete.min.js"></script>

	<script src="{{ asset('js/scripts.js') }}"></script>

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
	@stack('modal')
	@stack('js')
</body>

</html>

<x-layout>

    <x-slot name="title">
        Dashboard
    </x-slot>

    <x-slot name="page_heading">
        Dashboard {{ auth()->user()->getRoleNames()->first() }}
    </x-slot>


    {{-- ============================= --}}
    {{-- STATISTIK --}}
    {{-- ============================= --}}

    <div class="row">

        @foreach([
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
        ] as [$key, $label, $icon, $color])

            <div class="col-lg-3 col-md-4 col-sm-6 col-12">

                <div class="card card-statistic-1">

                    <div class="card-icon bg-{{ $color }}">
                        <i class="fas {{ $icon }}"></i>
                    </div>

                    <div class="card-wrap">

                        <div class="card-header">
                            <h4>{{ $label }}</h4>
                        </div>

                        <div class="card-body">
                            {{ number_format($stats[$key] ?? 0, 0, ',', '.') }}
                        </div>

                    </div>

                </div>

            </div>

        @endforeach

    </div>


    {{-- ============================= --}}
    {{-- AKTIVITAS TERBARU --}}
    {{-- ============================= --}}

    @if(auth()->user()->isAdministrator())

        <div class="card">

            <div class="card-header">

                <h4>
                    <i class="fas fa-clock-rotate-left mr-2"></i>
                    Aktivitas Terbaru
                </h4>

            </div>


            <div class="card-body">

                <x-datatable>

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

                        @foreach($activities as $log)

                            <tr>

                                {{-- USER --}}
                                <td>
                                    {{ $log->user?->name ?? 'System' }}

                                    <br>

                                    <small>
                                        {{ $log->role ?? '-' }}
                                    </small>
                                </td>


                                {{-- AKTIVITAS --}}
                                <td>
                                    {{ $log->action }}
                                </td>


                                {{-- MODUL --}}
                                <td>
                                    {{ $log->module }}
                                </td>


                                {{-- DATA --}}
                                <td>
                                    {{ $log->description }}
                                </td>


                                {{-- TANGGAL --}}
                                <td>
                                    {{ $log->created_at
                                        ? $log->created_at->format('d-m-Y H:i')
                                        : '-' }}
                                </td>


                                {{-- IP --}}
                                <td>
                                    {{ $log->ip ?? '-' }}
                                </td>

                            </tr>

                        @endforeach

                    </tbody>

                </x-datatable>

            </div>

        </div>

    @endif

</x-layout>

<x-layout>
    <x-slot name="title">Dashboard Siswa</x-slot>
    <x-slot name="page_heading">Dashboard Siswa</x-slot>

    {{-- Statistik Dashboard Siswa --}}
    <div class="row">
        @foreach([
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
        ] as [$label, $value, $icon, $color])

            <div class="col-md-3 col-sm-6">
                <div class="card card-statistic-1">

                    <div class="card-icon bg-{{ $color }}">
                        <i class="fas {{ $icon }}"></i>
                    </div>

                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>{{ $label }}</h4>
                        </div>

                        <div class="card-body">
                            {{ $value }}
                        </div>
                    </div>

                </div>
            </div>

        @endforeach
    </div>


    {{-- Tabel Peminjaman Saya --}}
    <div class="card">

        <div class="card-header">
            <h4>Peminjaman Saya</h4>
        </div>

        <div class="card-body">

            <x-datatable>

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
                    @foreach($loans as $loan)

                        <tr>
                            {{-- Nama Barang --}}
                            <td>
                                {{ $loan->commodity?->name ?? '-' }}
                            </td>

                            {{-- Jumlah Barang --}}
                            <td>
                                {{ $loan->quantity }}
                            </td>

                            {{-- Tanggal Peminjaman --}}
                            <td>
                                {{ $loan->loan_date?->format('d-m-Y') }}
                            </td>

                            {{-- Tanggal Rencana Kembali --}}
                            <td>
                                {{ $loan->due_date?->format('d-m-Y') ?? '-' }}
                            </td>

                            {{-- Status Peminjaman --}}
                            <td>
                                <span class="badge badge-{{
                                    in_array(
                                        $loan->effective_status,
                                        ['Ditolak', 'Bermasalah', 'Terlambat']
                                    )
                                    ? 'danger'
                                    : (
                                        $loan->effective_status === 'Dikembalikan'
                                        ? 'success'
                                        : 'warning'
                                    )
                                }}">
                                    {{ $loan->effective_status }}
                                </span>
                            </td>
                        </tr>

                    @endforeach
                </tbody>

            </x-datatable>

        </div>
    </div>

</x-layout>
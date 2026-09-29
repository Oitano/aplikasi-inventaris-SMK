```blade
<x-layout>
    <x-slot name="title">Riwayat Aktivitas</x-slot>
    <x-slot name="page_heading">Riwayat Aktivitas Sistem</x-slot>

    <div class="card">
        <div class="card-body">

            <x-datatable>
                <thead>
                    <tr>
                        <th>User</th>
                        <th>Role</th>
                        <th>Aktivitas</th>
                        <th>Modul</th>
                        <th>Data</th>
                        <th>Tanggal</th>
                        <th>IP</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($logs as $log)
                        <tr>
                            <td>{{ $log->user?->name ?? 'System' }}</td>
                            <td>{{ $log->role ?? '-' }}</td>
                            <td>{{ $log->action ?? '-' }}</td>
                            <td>{{ $log->module ?? '-' }}</td>
                            <td>{{ $log->description ?? '-' }}</td>
                            <td>
                                {{ $log->created_at ? $log->created_at->format('d-m-Y H:i:s') : '-' }}
                            </td>
                            <td>{{ $log->ip ?? '-' }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td>System</td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <td>Belum ada aktivitas.</td>
                            <td>-</td>
                            <td>-</td>
                        </tr>
                    @endforelse
                </tbody>
            </x-datatable>

            <div class="mt-3">
                {{ $logs->links() }}
            </div>

        </div>
    </div>
</x-layout>
```

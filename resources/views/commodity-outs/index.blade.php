<x-layout>
    <x-slot name="title">Barang Keluar</x-slot>
    <x-slot name="page_heading">Barang Keluar</x-slot>

    <div class="row">
        <div class="col-lg-4 col-md-6 col-sm-6 col-12"><div class="card card-statistic-1"><div class="card-icon bg-danger"><i class="fas fa-arrow-up"></i></div><div class="card-wrap"><div class="card-header"><h4>Total Transaksi</h4></div><div class="card-body">{{ $commodityOuts->count() }}</div></div></div></div>
        <div class="col-lg-4 col-md-6 col-sm-6 col-12"><div class="card card-statistic-1"><div class="card-icon bg-warning"><i class="fas fa-box-open"></i></div><div class="card-wrap"><div class="card-header"><h4>Total Barang Keluar</h4></div><div class="card-body">{{ number_format($commodityOuts->sum('quantity'), 0, ',', '.') }}</div></div></div></div>
    </div>

    <div class="card"><div class="card-body">
        @include('utilities.alert')
        <div class="d-flex justify-content-end mb-3">@can('tambah barang keluar')<button class="btn btn-danger" data-toggle="modal" data-target="#commodity_out_create_modal"><i class="fas fa-plus mr-1"></i> Tambah Barang Keluar</button>@endcan</div>
        <x-datatable>
            <thead><tr><th>#</th><th>Tanggal</th><th>Kode</th><th>Nama Barang</th><th>Jumlah</th><th>Tujuan</th><th>Penanggung Jawab</th><th>Ruangan</th><th>User</th><th>Keterangan</th><th>Aksi</th></tr></thead>
            <tbody>@foreach($commodityOuts as $item)<tr>
                <th>{{ $loop->iteration }}</th><td>{{ $item->date?->format('d-m-Y') }}</td><td><span class="badge badge-primary">{{ $item->commodity->item_code }}</span></td><td>{{ $item->commodity->name }}</td><td><span class="badge badge-danger">-{{ number_format($item->quantity, 0, ',', '.') }}</span></td><td>{{ $item->destination ?: '-' }}</td><td>{{ $item->responsible_person ?: '-' }}</td><td>{{ $item->location?->name ?: '-' }}</td><td>{{$item->user?->name??'-'}}</td><td>{{ $item->note ?: '-' }}</td>
                <td class="text-center">@can('hapus barang keluar')<form action="{{ route('barang-keluar.destroy', $item) }}" method="POST">@csrf @method('DELETE')<button class="btn btn-sm btn-danger delete-button"><i class="fas fa-trash"></i></button></form>@endcan</td>
            </tr>@endforeach</tbody>
        </x-datatable>
    </div></div>

    @push('modal')
    <div class="modal fade" id="commodity_out_create_modal" data-backdrop="static" data-keyboard="false" tabindex="-1"><div class="modal-dialog modal-lg"><div class="modal-content">
        <div class="modal-header"><h5 class="modal-title">Tambah Barang Keluar</h5><button type="button" class="close" data-dismiss="modal"><span>&times;</span></button></div>
        <form action="{{ route('barang-keluar.store') }}" method="POST">@csrf
            <div class="modal-body"><div class="alert alert-warning"><i class="fas fa-exclamation-circle mr-2"></i>Stok akan otomatis berkurang. Jumlah tidak boleh melebihi stok tersedia.</div>
                <div class="row">
                    <div class="col-md-8"><div class="form-group"><label>Barang <span class="text-danger">*</span></label><select name="commodity_id" class="form-control @error('commodity_id', 'store') is-invalid @enderror" required><option value="">Pilih barang...</option>@foreach($commodities as $commodity)<option value="{{ $commodity->id }}" @selected(old('commodity_id') == $commodity->id)>{{ $commodity->item_code }} - {{ $commodity->name }} (Stok: {{ $commodity->quantity }})</option>@endforeach</select>@error('commodity_id', 'store')<div class="invalid-feedback">{{ $message }}</div>@enderror</div></div>
                    <div class="col-md-4"><div class="form-group"><label>Tanggal Keluar <span class="text-danger">*</span></label><input type="date" name="date" value="{{ old('date', now()->toDateString()) }}" class="form-control @error('date', 'store') is-invalid @enderror" required>@error('date', 'store')<div class="invalid-feedback">{{ $message }}</div>@enderror</div></div>
                    <div class="col-md-4"><div class="form-group"><label>Jumlah <span class="text-danger">*</span></label><input type="number" min="1" name="quantity" value="{{ old('quantity', 1) }}" class="form-control @error('quantity', 'store') is-invalid @enderror" required>@error('quantity', 'store')<div class="invalid-feedback">{{ $message }}</div>@enderror</div></div>
                    <div class="col-md-8"><div class="form-group"><label>Tujuan / Penerima</label><input type="text" name="destination" value="{{ old('destination') }}" class="form-control" placeholder="Contoh: Ruang OSIS / Ahmad"></div></div><div class="col-md-6"><div class="form-group"><label>Penanggung Jawab</label><input type="text" name="responsible_person" value="{{ old('responsible_person') }}" class="form-control"></div></div><div class="col-md-6"><div class="form-group"><label>Ruangan</label><select name="commodity_location_id" class="form-control"><option value="">Pilih ruangan</option>@foreach($commodityLocations as $loc)<option value="{{$loc->id}}">{{$loc->name}}</option>@endforeach</select></div></div>
                    <div class="col-12"><div class="form-group"><label>Keterangan</label><textarea name="note" rows="3" class="form-control" placeholder="Keterangan tambahan...">{{ old('note') }}</textarea></div></div>
                </div>
            </div><div class="modal-footer"><button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button><button class="btn btn-danger" type="submit"><i class="fas fa-save mr-1"></i>Simpan</button></div>
        </form>
    </div></div></div>
    @endpush
    @push('js')<script>$(function(){ @if($errors->store->any()) $('#commodity_out_create_modal').modal('show'); @endif });</script>@endpush
</x-layout>

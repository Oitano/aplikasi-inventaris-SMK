<x-layout>
    <x-slot name="title">Barang Masuk</x-slot>
    <x-slot name="page_heading">Barang Masuk</x-slot>

    <div class="row">
        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-primary"><i class="fas fa-arrow-down"></i></div>
                <div class="card-wrap">
                    <div class="card-header"><h4>Total Transaksi</h4></div>
                    <div class="card-body">{{ $commodityIns->count() }}</div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-success"><i class="fas fa-boxes-stacked"></i></div>
                <div class="card-wrap">
                    <div class="card-header"><h4>Total Barang Masuk</h4></div>
                    <div class="card-body">{{ number_format($commodityIns->sum('quantity'), 0, ',', '.') }}</div>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            @include('utilities.alert')
            <div class="d-flex justify-content-end mb-3">
                @can('tambah barang masuk')
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#commodity_in_create_modal">
                    <i class="fas fa-plus mr-1"></i> Tambah Barang Masuk
                </button>
                @endcan
            </div>

            <x-datatable>
                <thead>
                    <tr>
                        <th>#</th><th>Tanggal</th><th>Kode</th><th>Nama Barang</th><th>Jumlah</th><th>Sumber/Toko</th><th>Bukti Nota</th><th>User</th><th>Keterangan</th><th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($commodityIns as $item)
                    <tr>
                        <th>{{ $loop->iteration }}</th>
                        <td>{{ $item->date?->format('d-m-Y') }}</td>
                        <td><span class="badge badge-primary">{{ $item->commodity->item_code }}</span></td>
                        <td>{{ $item->commodity->name }}</td>
                        <td><span class="badge badge-success">+{{ number_format($item->quantity, 0, ',', '.') }}</span></td>
                        <td>{{ $item->source ?: '-' }}</td>
                        <td>{{ $item->note ?: '-' }}</td>
                        <td class="text-center">
                            @can('hapus barang masuk')
                            <form action="{{ route('barang-masuk.destroy', $item) }}" method="POST">
                                @csrf @method('DELETE')
                                <button class="btn btn-sm btn-danger delete-button" type="submit"><i class="fas fa-trash"></i></button>
                            </form>
                            @endcan
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </x-datatable>
        </div>
    </div>

    @push('modal')
    <div class="modal fade" id="commodity_in_create_modal" data-backdrop="static" data-keyboard="false" tabindex="-1">
        <div class="modal-dialog modal-lg"><div class="modal-content">
            <div class="modal-header"><h5 class="modal-title">Tambah Barang Masuk</h5><button type="button" class="close" data-dismiss="modal"><span>&times;</span></button></div>
            <form action="{{ route('barang-masuk.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="alert alert-info"><i class="fas fa-info-circle mr-2"></i>Stok pada Data Barang akan otomatis bertambah sesuai jumlah yang dimasukkan.</div>
                    <div class="row">
                        <div class="col-md-8"><div class="form-group"><label>Barang <span class="text-danger">*</span></label>
                            <select name="commodity_id" class="form-control @error('commodity_id', 'store') is-invalid @enderror" required>
                                <option value="">Pilih barang...</option>
                                @foreach($commodities as $commodity)<option value="{{ $commodity->id }}" @selected(old('commodity_id') == $commodity->id)>{{ $commodity->item_code }} - {{ $commodity->name }} (Stok: {{ $commodity->quantity }})</option>@endforeach
                            </select>@error('commodity_id', 'store')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div></div>
                        <div class="col-md-4"><div class="form-group"><label>Tanggal Masuk <span class="text-danger">*</span></label><input type="date" name="date" class="form-control @error('date', 'store') is-invalid @enderror" value="{{ old('date', now()->toDateString()) }}" required>@error('date', 'store')<div class="invalid-feedback">{{ $message }}</div>@enderror</div></div>
                        <div class="col-md-4"><div class="form-group"><label>Jumlah <span class="text-danger">*</span></label><input type="number" min="1" name="quantity" class="form-control @error('quantity', 'store') is-invalid @enderror" value="{{ old('quantity', 1) }}" required>@error('quantity', 'store')<div class="invalid-feedback">{{ $message }}</div>@enderror</div></div>
                        <div class="col-md-8"><div class="form-group"><label>Sumber / Toko</label><input type="text" name="source" class="form-control" value="{{ old('source') }}" placeholder="Contoh: Toko ABC / Hibah"></div></div><div class="col-md-6"><div class="form-group"><label>Nama Toko</label><input type="text" name="store_name" class="form-control" value="{{ old('store_name') }}"></div></div><div class="col-md-6"><div class="form-group"><label>Nomor HP Toko</label><input type="text" name="store_phone" class="form-control" value="{{ old('store_phone') }}"></div></div><div class="col-md-6"><div class="form-group"><label>Harga</label><input type="number" min="0" name="price" class="form-control" value="{{ old('price') }}"></div></div><div class="col-md-6"><div class="form-group"><label>Bukti Nota</label><input type="file" name="receipt" class="form-control-file" accept=".jpg,.jpeg,.png,.pdf"></div></div>
                        <div class="col-12"><div class="form-group"><label>Keterangan</label><textarea name="note" class="form-control" rows="3" placeholder="Keterangan tambahan...">{{ old('note') }}</textarea></div></div>
                    </div>
                </div>
                <div class="modal-footer"><button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button><button class="btn btn-primary" type="submit"><i class="fas fa-save mr-1"></i>Simpan</button></div>
            </form>
        </div></div>
    </div>
    @endpush

    @push('js')
    <script>$(function(){ @if($errors->store->any()) $('#commodity_in_create_modal').modal('show'); @endif });</script>
    @endpush
</x-layout>

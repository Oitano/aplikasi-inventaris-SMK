<x-layout>
<x-slot name="title">Peminjaman Saya</x-slot><x-slot name="page_heading">Peminjaman Saya</x-slot>
<div class="card"><div class="card-body">@include('utilities.alert')
@can('tambah peminjaman')<div class="text-right mb-3"><button class="btn btn-primary" data-toggle="modal" data-target="#loanModal"><i class="fas fa-plus mr-1"></i>Ajukan Peminjaman</button></div>@endcan
<x-datatable><thead><tr><th>#</th><th>Barang</th><th>Jumlah</th><th>Tgl Pinjam</th><th>Harus Kembali</th><th>Status</th><th>Keterangan</th></tr></thead>
<tbody>
    @foreach($commodityLoans as $loan)
        <tr>
            <td>{{ $loop->iteration }}</td>

            <td>
                {{ $loan->commodity?->item_code }}<br>
                {{ $loan->commodity?->name }}
            </td>

            <td>{{ $loan->quantity }}</td>

            <td>
                {{ $loan->loan_date?->format('d-m-Y') }}
            </td>

            <td>
                {{ $loan->due_date?->format('d-m-Y') ?? '-' }}
            </td>

            <td>
                <span class="badge badge-{{
                    in_array($loan->effective_status, ['Ditolak', 'Bermasalah', 'Terlambat'])
                        ? 'danger'
                        : ($loan->effective_status === 'Dikembalikan'
                            ? 'success'
                            : 'warning')
                }}">
                    {{ $loan->effective_status }}
                </span>
            </td>

            <td>
                {{ $loan->purpose ?? $loan->note ?? '-' }}
            </td>
        </tr>

    @endforeach
</tbody>
</x-datatable>
</div></div>
<div class="card"><div class="card-header"><h4>Sanksi Saya</h4></div><div class="card-body"><x-datatable><thead><tr><th>Tanggal</th><th>Pelanggaran</th><th>Barang</th><th>Status</th></tr></thead><tbody>
@foreach($sanctions as $s)<tr><td>{{$s->date?->format('d-m-Y')}}</td><td>{{$s->violation_type}}<br>{{$s->description}}</td><td>{{$s->commodity?->name??'-'}}</td><td>{{$s->status}}</td></tr>@endforeach</tbody></x-datatable></div></div>
@push('modal')<div class="modal fade" id="loanModal"><div class="modal-dialog modal-lg"><div class="modal-content"><form method="POST" action="{{route('peminjaman.store')}}">@csrf
<div class="modal-header"><h5>Ajukan Peminjaman</h5><button class="close" data-dismiss="modal">&times;</button></div><div class="modal-body">
<div class="alert alert-info">Pengajuan akan berstatus <b>Menunggu</b> sampai diproses petugas.</div>
<div class="form-group"><label>Barang</label><select name="commodity_id" class="form-control" required><option value="">Pilih barang</option>@foreach($commodities as $c)<option value="{{$c->id}}">{{$c->item_code}} - {{$c->name}} (stok {{$c->quantity}})</option>@endforeach</select></div>
<div class="row"><div class="col-md-6"><label>Jumlah</label><input class="form-control" type="number" name="quantity" min="1" value="1" required></div><div class="col-md-3"><label>Tanggal Pinjam</label><input class="form-control" type="date" name="loan_date" value="{{today()->toDateString()}}" required></div><div class="col-md-3"><label>Rencana Kembali</label><input class="form-control" type="date" name="due_date" required></div></div>
<div class="form-group mt-3"><label>Keperluan</label><textarea name="purpose" class="form-control" required></textarea></div><div class="form-group"><label>Keterangan</label><textarea name="note" class="form-control"></textarea></div>
</div><div class="modal-footer"><button class="btn btn-primary">Kirim Pengajuan</button></div></form></div></div></div>@endpush
</x-layout>
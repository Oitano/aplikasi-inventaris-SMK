<x-layout>

    <x-slot name="title">
        Sanksi
    </x-slot>

    <x-slot name="page_heading">
        {{ auth()->user()->isStudent() ? 'Sanksi Saya' : 'Manajemen Sanksi' }}
    </x-slot>


    {{-- ============================= --}}
    {{-- CARD UTAMA --}}
    {{-- ============================= --}}

    <div class="card">
        <div class="card-body">

            @include('utilities.alert')


            {{-- ============================= --}}
            {{-- TOMBOL TAMBAH SANKSI --}}
            {{-- ============================= --}}

            @if(!auth()->user()->isStudent())

                @can('tambah sanksi')

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

                @endcan

            @endif


            {{-- ============================= --}}
            {{-- TABEL SANKSI --}}
            {{-- ============================= --}}

            <x-datatable>

                <thead>
                    <tr>

                        <th>Tanggal</th>

                        <th>Siswa</th>

                        <th>Pelanggaran</th>

                        <th>Barang</th>

                        <th>Status</th>

                        @if(!auth()->user()->isStudent())
                            <th>Aksi</th>
                        @endif

                    </tr>
                </thead>


                <tbody>

                    @foreach($sanctions as $s)

                        <tr>

                            {{-- Tanggal --}}
                            <td>
                                {{ $s->date ? $s->date->format('d-m-Y') : '-' }}
                            </td>


                            {{-- Siswa --}}
                            <td>
                                {{ $s->user?->name ?? '-' }}
                            </td>


                            {{-- Pelanggaran --}}
                            <td>

                                <strong>
                                    {{ $s->violation_type }}
                                </strong>

                                <br>

                                {{ $s->description }}

                            </td>


                            {{-- Barang --}}
                            <td>
                                {{ $s->commodity?->name ?? '-' }}
                            </td>


                            {{-- Status --}}
                            <td>

                                @if($s->status === 'Selesai')

                                    <span class="badge badge-success">
                                        Selesai
                                    </span>

                                @elseif($s->status === 'Dalam proses')

                                    <span class="badge badge-warning">
                                        Dalam proses
                                    </span>

                                @else

                                    <span class="badge badge-danger">
                                        Belum diselesaikan
                                    </span>

                                @endif

                            </td>


                            {{-- Aksi --}}
                            @if(!auth()->user()->isStudent())

                                <td>

                                    @can('hapus sanksi')

                                        <form
                                            method="POST"
                                            action="{{ route('sanksi.destroy', $s) }}"
                                            class="d-inline">

                                            @csrf

                                            @method('DELETE')

                                            <button
                                                type="submit"
                                                class="btn btn-sm btn-danger delete-button"
                                                title="Hapus">

                                                <i class="fas fa-trash"></i>

                                            </button>

                                        </form>

                                    @endcan

                                </td>

                            @endif

                        </tr>

                    @endforeach

                </tbody>

            </x-datatable>

        </div>
    </div>



    {{-- ============================= --}}
    {{-- MODAL TAMBAH SANKSI --}}
    {{-- ============================= --}}

    @if(!auth()->user()->isStudent())

        @can('tambah sanksi')

            @push('modal')

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
                                action="{{ route('sanksi.store') }}">

                                @csrf


                                {{-- HEADER MODAL --}}

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


                                {{-- BODY MODAL --}}

                                <div class="modal-body">


                                    {{-- SISWA --}}

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

                                            @foreach($students as $u)

                                                <option value="{{ $u->id }}">

                                                    {{ $u->name }}
                                                    -
                                                    {{ $u->email }}

                                                </option>

                                            @endforeach

                                        </select>

                                    </div>



                                    {{-- JENIS + TANGGAL --}}

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
                                                    value="{{ today()->toDateString() }}"
                                                    required>

                                            </div>

                                        </div>

                                    </div>



                                    {{-- PEMINJAMAN --}}

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

                                            @foreach($loans as $l)

                                                <option value="{{ $l->id }}">

                                                    {{ $l->user?->name ?? $l->borrower }}

                                                    -

                                                    {{ $l->commodity?->name ?? '-' }}

                                                </option>

                                            @endforeach

                                        </select>

                                    </div>



                                    {{-- BARANG --}}

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

                                            @foreach(\App\Commodity::orderBy('name')->get() as $c)

                                                <option value="{{ $c->id }}">

                                                    {{ $c->name }}

                                                </option>

                                            @endforeach

                                        </select>

                                    </div>



                                    {{-- KETERANGAN --}}

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



                                    {{-- STATUS --}}

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



                                    {{-- CATATAN ADMIN --}}

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


                                {{-- FOOTER MODAL --}}

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

            @endpush

        @endcan

    @endif

</x-layout>
<div class="modal fade" id="commodity_create_modal" data-backdrop="static" data-keyboard="false" tabindex="-1"
	role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="modalLabel">Tambah Data Barang</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>

			<div class="modal-body">
				<div class="d-flex align-items-center">
					<i class="text-warning fa-solid fa-circle-info mr-2"></i>
					<p class="font-italic mb-0">
						Kolom yang memiliki tanda merah <span class="font-weight-bold">wajib diisi.</span>
					</p>
				</div>
				<hr>
				<form action="{{ route('barang.store') }}" method="POST" enctype="multipart/form-data">
					@csrf
					<div class="row">
						<div class="col-lg-4">
							<div class="form-group">
								<label for="item_code">Kode Barang<span class="font-weight-bold text-danger">*</span></label>
								<input type="text" class="form-control @error('item_code', 'store') is-invalid @enderror"
									name="item_code" id="item_code" value="{{ old('item_code') }}" placeholder="Masukan kode barang..">
								@error('item_code', 'store')
								<div class="d-block invalid-feedback">
									{{ $message }}
								</div>
								@enderror
							</div>
						</div>
						<div class="col-lg-4">
							<div class="form-group">
								<label for="name">Nama Barang<span class="font-weight-bold text-danger">*</span></label>
								<input type="text" class="form-control @error('name', 'store') is-invalid @enderror" name="name"
									id="name" value="{{ old('name') }}" placeholder="Masukan nama barang..">
								@error('name', 'store')
								<div class="d-block invalid-feedback">
									{{ $message }}
								</div>
								@enderror
							</div>
						</div>
						<div class="col-lg-4">
							<div class="form-group">
								<label for="commodity_location_id">Lokasi Barang<span
										class="font-weight-bold text-danger">*</span></label>
								<select class="form-control @error('commodity_location_id', 'store') is-invalid @enderror"
									name="commodity_location_id" id="commodity_location_id" style="width: 100%;">
									<option value="" selected>Pilih..</option>
									@foreach ($commodity_locations as $commodity_location)
									<option value="{{ $commodity_location->id }}"
										@selected(old('commodity_location_id')==$commodity_location->id)>{{ $commodity_location->name }}
									</option>
									@endforeach
								</select>
								@error('commodity_location_id', 'store')
								<div class="d-block invalid-feedback">
									{{ $message }}
								</div>
								@enderror
							</div>
						</div>
					</div>


					{{-- Informasi Inventaris --}}
					<div class="row">
						<div class="col-lg-3 col-md-6">
							<div class="form-group">
								<label for="inventory_number">Nomor Inventaris <span class="font-italic">(opsional)</span></label>
								<input type="text" class="form-control @error('inventory_number', 'store') is-invalid @enderror"
									name="inventory_number" id="inventory_number" value="{{ old('inventory_number') }}"
									placeholder="Contoh: INV/SMK/2026/001">
								@error('inventory_number', 'store')<div class="d-block invalid-feedback">{{ $message }}</div>@enderror
							</div>
						</div>
						<div class="col-lg-3 col-md-6">
							<div class="form-group">
								<label for="category">Kategori <span class="font-weight-bold text-danger">*</span></label>
								<select class="form-control @error('category', 'store') is-invalid @enderror" name="category" id="category">
									<option value="">Pilih kategori..</option>
									@foreach(\App\Commodity::CATEGORIES as $category)
										<option value="{{ $category }}" @selected(old('category') === $category)>{{ $category }}</option>
									@endforeach
								</select>
								@error('category', 'store')<div class="d-block invalid-feedback">{{ $message }}</div>@enderror
							</div>
						</div>
						<div class="col-lg-3 col-md-6">
							<div class="form-group">
								<label for="status">Status <span class="font-weight-bold text-danger">*</span></label>
								<select class="form-control @error('status', 'store') is-invalid @enderror" name="status" id="status">
									<option value="">Pilih status..</option>
									@foreach(\App\Commodity::STATUSES as $status)
										<option value="{{ $status }}" @selected(old('status', 'Tersedia') === $status)>{{ $status }}</option>
									@endforeach
								</select>
								@error('status', 'store')<div class="d-block invalid-feedback">{{ $message }}</div>@enderror
							</div>
						</div>
						<div class="col-lg-3 col-md-6">
							<div class="form-group">
								<label for="unit">Satuan <span class="font-weight-bold text-danger">*</span></label>
								<select class="form-control @error('unit', 'store') is-invalid @enderror" name="unit" id="unit">
									<option value="">Pilih satuan..</option>
									@foreach(\App\Commodity::UNITS as $unit)
										<option value="{{ $unit }}" @selected(old('unit', 'Unit') === $unit)>{{ $unit }}</option>
									@endforeach
								</select>
								@error('unit', 'store')<div class="d-block invalid-feedback">{{ $message }}</div>@enderror
							</div>
						</div>
					</div>

					{{-- Tanggal Input --}}
					<div class="row">
    					<div class="col-lg-4">
        				<div class="form-group">
						<label for="input_date">
							Tanggal Input
							<span class="font-weight-bold text-danger">*</span>
						</label>

								<input type="date"
									class="form-control @error('input_date', 'store') is-invalid @enderror"
									name="input_date"
									id="input_date"
									value="{{ old('input_date', date('Y-m-d')) }}">

								@error('input_date', 'store')
									<div class="d-block invalid-feedback">
										{{ $message }}
									</div>
								@enderror
							</div>
						</div>

						{{-- Nama Toko --}}
						<div class="col-lg-4">
							<div class="form-group">
								<label for="store_name">
									Nama Toko
									<span class="font-weight-bold text-danger">*</span>
								</label>

								<input type="text"
									class="form-control @error('store_name', 'store') is-invalid @enderror"
									name="store_name"
									id="store_name"
									value="{{ old('store_name') }}"
									placeholder="Masukan nama toko..">

								@error('store_name', 'store')
									<div class="d-block invalid-feedback">
										{{ $message }}
									</div>
								@enderror
							</div>
						</div>

						{{-- Nomor HP --}}
						<div class="col-lg-4">
							<div class="form-group">
								<label for="store_phone">
									Nomor HP
									<span class="font-italic">(opsional)</span>
								</label>

								<input type="text"
									class="form-control @error('store_phone', 'store') is-invalid @enderror"
									name="store_phone"
									id="store_phone"
									value="{{ old('store_phone') }}"
									placeholder="Contoh: 081234567890">

								@error('store_phone', 'store')
									<div class="d-block invalid-feedback">
										{{ $message }}
									</div>
								@enderror
							</div>
						</div>
					</div>

					{{-- Alamat Toko --}}
					<div class="row">
						<div class="col-12">
							<div class="form-group">
								<label for="store_address">
									Alamat Toko
									<span class="font-weight-bold text-danger">*</span>
								</label>

								<textarea
									class="form-control @error('store_address', 'store') is-invalid @enderror"
									name="store_address"
									id="store_address"
									rows="3"
									placeholder="Masukan alamat toko..">{{ old('store_address') }}</textarea>

								@error('store_address', 'store')
									<div class="d-block invalid-feedback">
										{{ $message }}
									</div>
								@enderror
							</div>
						</div>
					</div>

					{{-- Bukti Nota --}}
					<div class="row">
						<div class="col-12">
							<div class="form-group">
								<label for="receipt">
									Bukti Nota
									<span class="font-italic">(opsional)</span>
								</label>

								<input type="file"
									class="form-control-file @error('receipt', 'store') is-invalid @enderror"
									name="receipt"
									id="receipt"
									accept=".jpg,.jpeg,.png,.pdf">

								<small class="form-text text-muted">
									Format: JPG, JPEG, PNG atau PDF. Maksimal 2 MB.
								</small>

								@error('receipt', 'store')
									<div class="d-block invalid-feedback">
										{{ $message }}
									</div>
								@enderror
							</div>
						</div>
					</div>


					{{-- Foto Barang --}}
					<div class="row">
						<div class="col-12">
							<div class="form-group">
								<label for="photo">Foto Barang <span class="font-italic">(opsional)</span></label>
								<input type="file" class="form-control-file @error('photo', 'store') is-invalid @enderror"
									name="photo" id="photo" accept=".jpg,.jpeg,.png">
								<small class="form-text text-muted">Format JPG, JPEG atau PNG. Maksimal 2 MB.</small>
								@error('photo', 'store')<div class="d-block invalid-feedback">{{ $message }}</div>@enderror
							</div>
						</div>
					</div>

					<hr>

					<div class="row">
						<div class="col-lg-6">
							<div class="form-group">
								<label for="material">Bahan<span class="font-weight-bold text-danger">*</span></label>
								<input type="text" class="form-control @error('material', 'store') is-invalid @enderror" name="material"
									id="material" value="{{ old('material') }}" placeholder="Masukan bahan barang..">
								@error('material', 'store')
								<div class="d-block invalid-feedback">
									{{ $message }}
								</div>
								@enderror
							</div>
						</div>
						<div class="col-lg-6">
							<div class="form-group">
								<label for="brand">Merek<span class="font-weight-bold text-danger">*</span></label>
								<input type="text" class="form-control @error('brand', 'store') is-invalid @enderror" name="brand"
									id="brand" value="{{ old('brand') }}" placeholder="Masukan merek barang..">
								@error('brand', 'store')
								<div class="d-block invalid-feedback">
									{{ $message }}
								</div>
								@enderror
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-lg-4 col-12">
							<div class="form-group">
								<label for="year_of_purchase">Tahun Pembelian<span class="font-weight-bold text-danger">*</span></label>
								<input type="number" class="form-control @error('year_of_purchase', 'store') is-invalid @enderror"
									name="year_of_purchase" id="year_of_purchase" value="{{ old('year_of_purchase') }}"
									placeholder="Masukan tahun pembelian barang..">
								@error('year_of_purchase', 'store')
								<div class="d-block invalid-feedback">
									{{ $message }}
								</div>
								@enderror
							</div>
						</div>
						<div class="col-lg-4 col-12">
							<div class="form-group">
								<label for="commodity_acquisition_id">Asal Perolehan<span
										class="font-weight-bold text-danger">*</span></label>
								<select class="form-control @error('commodity_acquisition_id', 'store') is-invalid @enderror"
									name="commodity_acquisition_id" id="commodity_acquisition_id" style="width: 100%;">
									<option value="" selected">Pilih..</option>
									@foreach ($commodity_acquisitions as $commodity_acquisition)
									<option value="{{ $commodity_acquisition->id }}"
										@selected(old('commodity_acquisition_id')==$commodity_acquisition->id)>{{
										$commodity_acquisition->name }}
									</option>
									@endforeach
								</select>
								@error('commodity_acquisition_id', 'store')
								<div class="d-block invalid-feedback">
									{{ $message }}
								</div>
								@enderror
							</div>
						</div>
						<div class="col-lg-4 col-12">
							<div class="form-group">
								<label for="condition">Kondisi<span class="font-weight-bold text-danger">*</span></label>
								<select class="form-control @error('condition', 'store') is-invalid @enderror" name="condition"
									id="condition" style="width: 100%;">
									<option value="" selected>Pilih..</option>
									<option value="1" @selected(old('condition')==1)>Baik</option>
									<option value="2" @selected(old('condition')==2)>Rusak Ringan</option>
									<option value="3" @selected(old('condition')==3)>Rusak Berat</option>
								</select>
								@error('condition', 'store')
								<div class="d-block invalid-feedback">
									{{ $message }}
								</div>
								@enderror
							</div>
						</div>
					</div>

					<hr>

					<div class="row">
						<div class="col-lg-4">
							<div class="form-group">
								<label for="quantity">Kuantitas<span class="font-weight-bold text-danger">*</span></label>
								<input type="number" class="form-control @error('quantity', 'store') is-invalid @enderror"
									name="quantity" id="quantity" value="{{ old('quantity') }}" placeholder="Masukan kuantitas barang..">
								@error('quantity', 'store')
								<div class="d-block invalid-feedback">
									{{ $message }}
								</div>
								@enderror
							</div>
						</div>
						<div class="col-lg-4 col-6">
							<div class="form-group">
								<label for="price">Harga<span class="font-weight-bold text-danger">*</span></label>
								<div class="input-group">
									<div class="input-group-prepend">
										<span class="input-group-text" id="basic-addon1">Rp.</span>
									</div>
									<input type="number" class="form-control @error('price', 'store') is-invalid @enderror" name="price"
										id="price" value="{{ old('price') }}" placeholder="Masukan harga barang..">
									@error('price', 'store')
									<div class="d-block invalid-feedback">
										{{ $message }}
									</div>
									@enderror
								</div>
							</div>
						</div>
						<div class="col-lg-4 col-6">
							<div class="form-group">
								<label for="price_per_item">Harga Satuan<span class="font-weight-bold text-danger">*</span></label>
								<div class="input-group">
									<div class="input-group-prepend">
										<span class="input-group-text" id="basic-addon1">Rp.</span>
									</div>
									<input type="number" class="form-control @error('price_per_item', 'store') is-invalid @enderror"
										name="price_per_item" id="price_per_item" value="{{ old('price_per_item') }}"
										placeholder="Masukan harga satuan barang..">
									@error('price_per_item', 'store')
									<div class="d-block invalid-feedback">
										{{ $message }}
									</div>
									@enderror
								</div>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-12">
							<div class="form-group">
								<label for="note">Keterangan <span class="font-italic">(opsional)</span></label>
								<textarea class="form-control @error('note', 'store') is-invalid @enderror" name="note" id="note"
									style="height: 100px;" placeholder="Masukan keterangan (opsional)..">{{ old('note') }}</textarea>
								@error('note', 'store')
								<div class="d-block invalid-feedback">
									{{ $message }}
								</div>
								@enderror
							</div>
						</div>
					</div>

					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
						<button type="submit" class="btn btn-success">Tambah</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

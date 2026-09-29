<?php

namespace App\Imports;

use App\Commodity;
use App\CommodityAcquisition;
use App\CommodityLocation;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithUpserts;

class CommoditiesImport implements ToModel, WithHeadingRow, WithUpserts
{
    /**
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        $commodity_location = CommodityLocation::where('name', $row['lokasi'])->first();
        $commodity_acquisition = CommodityAcquisition::where('name', $row['asal_perolehan'])->first();

        return new Commodity([
            'item_code' => $row['kode_barang'],
            'inventory_number' => $row['nomor_inventaris'] ?? null,
            'name' => $row['nama_barang'],
            'category' => $row['kategori'] ?? 'Lainnya',
            'brand' => $row['merek'],
            'material' => $row['bahan'],
            'commodity_acquisition_id' => $commodity_acquisition->id,
            'commodity_location_id' => $commodity_location->id,
            'year_of_purchase' => $row['tahun_pembelian'],
            'condition' => $this->translateConditionNameToNumber($row['kondisi']),
            'status' => $row['status'] ?? 'Tersedia',
            'quantity' => $row['kuantitas'],
            'unit' => $row['satuan'] ?? 'Unit',
            'price' => $row['harga'],
            'price_per_item' => $row['harga_satuan'],
            'input_date' => $row['tanggal_input'] ?? null,
            'store_name' => $row['nama_toko'] ?? null,
            'store_phone' => $row['nomor_hp'] ?? null,
            'note' => $row['keterangan'],
        ]);
    }

    /**
     * Translate condition name to the corresponding number.
     */
    public function translateConditionNameToNumber($conditionName)
    {
        return match ($conditionName) {
            'Baik' => 1,
            'Rusak Ringan' => 2,
            'Rusak Berat' => 3,
        };
    }

    /**
     * Specify the unique column used for upsert operations.
     */
    public function uniqueBy()
    {
        return 'item_code';
    }
}

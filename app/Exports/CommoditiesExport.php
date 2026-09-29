<?php

namespace App\Exports;

use App\Commodity;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Fill;

class CommoditiesExport implements
    FromCollection,
    ShouldAutoSize,
    WithHeadings,
    WithMapping,
    WithStyles,
    WithColumnWidths,
    WithEvents
{
    public function collection()
    {
        return Commodity::with([
            'commodity_acquisition',
            'commodity_location'
        ])->get();
    }

    public function headings(): array
    {
        return [
            'No',
            'Kode Barang',
            'Nomor Inventaris',
            'Nama Barang',
            'Kategori',
            'Merek',
            'Bahan',
            'Asal Perolehan',
            'Lokasi Barang',
            'Tahun Pembelian',
            'Kondisi',
            'Status',
            'Kuantitas',
            'Satuan',
            'Harga',
            'Harga Satuan',
            'Tanggal Input',
            'Nama Toko',
            'Nomor HP',
            'Keterangan',
        ];
    }

    public function map($row): array
    {
        static $i = 0;

        $i++;

        return [
            $i,
            $row->item_code,
            $row->inventory_number,
            $row->name,
            $row->category,
            $row->brand,
            $row->material,
            optional($row->commodity_acquisition)->name ?? '-',
            optional($row->commodity_location)->name ?? '-',
            $row->year_of_purchase,
            $row->getConditionName(),
            $row->status,
            $row->quantity,
            $row->unit,
            $row->price,
            $row->price_per_item,
            $row->input_date,
            $row->store_name,
            $row->store_phone,
            $row->note,
        ];
    }

    public function styles(Worksheet $sheet)
    {
        return [
            1 => [
                'font' => [
                    'bold' => true,
                    'color' => [
                        'rgb' => 'FFFFFF',
                    ],
                    'size' => 11,
                ],
                'alignment' => [
                    'horizontal' => Alignment::HORIZONTAL_CENTER,
                    'vertical' => Alignment::VERTICAL_CENTER,
                    'wrapText' => true,
                ],
                'fill' => [
                    'fillType' => Fill::FILL_SOLID,
                    'color' => [
                        'rgb' => '1F4E78',
                    ],
                ],
            ],
        ];
    }

    public function columnWidths(): array
    {
        return [
            'A' => 6, 'B' => 17, 'C' => 20, 'D' => 28, 'E' => 18,
            'F' => 18, 'G' => 22, 'H' => 22, 'I' => 17, 'J' => 17,
            'K' => 16, 'L' => 12, 'M' => 12, 'N' => 20, 'O' => 20,
            'P' => 15, 'Q' => 24, 'R' => 18, 'S' => 30,
        ];
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {

                $sheet = $event->sheet->getDelegate();

                $highestRow = $sheet->getHighestRow();
                $highestColumn = $sheet->getHighestColumn();

                // Tinggi header
                $sheet->getRowDimension(1)->setRowHeight(30);

                // Border tabel
                $sheet->getStyle(
                    "A1:{$highestColumn}{$highestRow}"
                )->applyFromArray([
                    'borders' => [
                        'allBorders' => [
                            'borderStyle' => Border::BORDER_THIN,
                            'color' => [
                                'rgb' => 'B7B7B7',
                            ],
                        ],
                    ],
                ]);

                // Vertical alignment
                $sheet->getStyle(
                    "A2:{$highestColumn}{$highestRow}"
                )->getAlignment()->setVertical(
                    Alignment::VERTICAL_CENTER
                );

                // Center nomor
                $sheet->getStyle(
                    "A2:A{$highestRow}"
                )->getAlignment()->setHorizontal(
                    Alignment::HORIZONTAL_CENTER
                );

                // Center tahun, kondisi, quantity
                $sheet->getStyle(
                    "I2:M{$highestRow}"
                )->getAlignment()->setHorizontal(
                    Alignment::HORIZONTAL_CENTER
                );

                // Wrap text
                $sheet->getStyle(
                    "C2:H{$highestRow}"
                )->getAlignment()->setWrapText(true);

                $sheet->getStyle(
                    "S2:S{$highestRow}"
                )->getAlignment()->setWrapText(true);

                // Format Rupiah
                $sheet->getStyle(
                    "N2:O{$highestRow}"
                )->getNumberFormat()
                    ->setFormatCode('"Rp" #,##0');

                // Freeze header
                $sheet->freezePane('A2');

                // Filter
                $sheet->setAutoFilter(
                    "A1:{$highestColumn}{$highestRow}"
                );

                // A4 Landscape
                $sheet->getPageSetup()
                    ->setOrientation(
                        \PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::ORIENTATION_LANDSCAPE
                    )
                    ->setPaperSize(
                        \PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::PAPERSIZE_A4
                    )
                    ->setFitToWidth(1)
                    ->setFitToHeight(0);

                // Margin
                $sheet->getPageMargins()
                    ->setTop(0.5)
                    ->setRight(0.3)
                    ->setLeft(0.3)
                    ->setBottom(0.5);

                // Header tabel diulang saat print
                $sheet->getPageSetup()
                    ->setRowsToRepeatAtTopByStartAndEnd(1, 1);

                // Hilangkan garis grid
                $sheet->setShowGridlines(false);

                // Tinggi baris
                for ($row = 2; $row <= $highestRow; $row++) {
                    $sheet->getRowDimension($row)->setRowHeight(24);
                }
            },
        ];
    }
}
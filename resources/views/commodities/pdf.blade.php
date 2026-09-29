<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">

    <style>
        @page {
            size: A4 landscape;
            margin: 25px;
        }

        body {
            font-family: DejaVu Sans, Arial, sans-serif;
            font-size: 8px;
            color: #222;
        }

        /* =========================
        KOP SURAT RESMI
        ========================= */

        .header {
            width: 100%;
            margin-bottom: 12px;
        }

        .kop {
            width: 100%;
            border-collapse: collapse;
        }

        .kop td {
            border: none;
            padding: 0;
            vertical-align: middle;
        }

        /* LOGO DI KIRI */
        .kop-logo {
            width: 85px;
            text-align: center;
        }

        .kop-logo img {
            width: 70px;
            height: 70px;
            object-fit: contain;
        }

        /* TULISAN DI SEBELAH KANAN LOGO */
        .kop-text {
            text-align: center;
            font-family: "Times New Roman", Times, serif;
        }

        /* Nama Yayasan */
        .kop-yayasan {
            font-size: 13px;
            font-weight: bold;
            text-transform: uppercase;
            line-height: 1.2;
        }

        /* Nama Sekolah */
        .kop-sekolah {
            font-size: 18px;
            font-weight: bold;
            text-transform: uppercase;
            line-height: 1.2;
            margin-top: 2px;
        }

        /* Alamat */
        .kop-alamat {
            font-size: 9px;
            line-height: 1.4;
            margin-top: 3px;
        }

        /* GARIS KOP */
        .kop-line {
            border-top: 3px solid #000;
            border-bottom: 1px solid #000;
            height: 4px;
            margin-top: 8px;
        }

        .info {
            width: 100%;
            margin-bottom: 10px;
        }

        .info td {
            padding: 2px;
        }

        .label {
            font-weight: bold;
            width: 80px;
        }

        table.data {
            width: 100%;
            border-collapse: collapse;
            table-layout: fixed;
        }

        table.data th {
            background-color: #1F4E78;
            color: white;
            text-align: center;
            font-weight: bold;
            padding: 5px 3px;
            border: 1px solid #777;
        }

        table.data td {
            padding: 4px 3px;
            border: 1px solid #999;
            vertical-align: middle;
            word-wrap: break-word;
        }

        table.data tr:nth-child(even) td {
            background-color: #F4F7FA;
        }

        .center {
            text-align: center;
        }

        .right {
            text-align: right;
        }

        /* =========================
        TANDA TANGAN
        ========================= */

        .signature {
            width: 100%;
            margin-top: 35px;
            border-collapse: collapse;
            font-family: "Times New Roman", Times, serif;
        }

        .signature td {
            width: 50%;
            text-align: center;
            vertical-align: top;
            border: none;
        }

        .signature-title {
            font-size: 10px;
            font-weight: bold;
            margin-bottom: 45px;
        }

        .signature-name {
            font-size: 10px;
            font-weight: bold;
            text-decoration: underline;
        }

        .signature-position {
            font-size: 9px;
            margin-top: 2px;
        }

        .footer {
            position: fixed;
            bottom: -15px;
            left: 0;
            right: 0;
            text-align: center;
            font-size: 7px;
            color: #777;
        }

        .page-number:after {
            content: counter(page);
        }
    </style>
</head>

<body>

    <!-- =========================
     KOP SURAT RESMI
     ========================= -->
    <div class="header">

        <table class="kop">
            <tr>

                <!-- LOGO KIRI -->
                <td class="kop-logo">
                    <img src="{{ public_path('assets/img/logo-kop.jpg') }}"
                        alt="Logo Sekolah">
                </td>

                <!-- TULISAN KANAN -->
                <td class="kop-text">

                    <div class="kop-yayasan">
                        YAYASAN AL AQSHO
                    </div>

                    <div class="kop-sekolah">
                        SMK LUQMAN AL HAKIM KUDUS
                    </div>

                    <div class="kop-alamat">
                        Jl. Raya Kudus - Jepara KM 5, Kedungdowo,
                        Kaliwungu, Kudus 59361
                    </div>

                    <div class="kop-alamat">
                        Email: smkluqmanalhakim@gmail.com
                    </div>

                </td>

            </tr>
        </table>

        <!-- GARIS KOP -->
        <div class="kop-line"></div>

    </div>


    <!-- INFORMASI -->
    <table class="info">

        <tr>
            <td class="label">
                Sekolah
            </td>

            <td>
                : {{ $sekolah }}
            </td>

            <td class="label">
                Tanggal Cetak
            </td>

            <td>
                : {{ date('d-m-Y') }}
            </td>
        </tr>

        <tr>
            <td class="label">
                Jumlah Barang
            </td>

            <td>
                : {{ $commodities->count() }} Barang
            </td>

            <td class="label">
                Waktu Cetak
            </td>

            <td>
                : {{ date('H:i') }}
            </td>
        </tr>

    </table>


    <!-- TABEL BARANG -->
    <table class="data">

        <thead>

            <tr>
                <th style="width: 3%;">No</th>
                <th style="width: 7%;">Kode</th>
                <th style="width: 9%;">No. Inventaris</th>
                <th style="width: 12%;">Nama Barang</th>
                <th style="width: 9%;">Kategori</th>
                <th style="width: 8%;">Lokasi</th>
                <th style="width: 5%;">Qty</th>
                <th style="width: 6%;">Satuan</th>
                <th style="width: 7%;">Kondisi</th>
                <th style="width: 7%;">Status</th>
                <th style="width: 9%;">Harga Satuan</th>
                <th style="width: 8%;">Tgl. Input</th>
                <th style="width: 10%;">Nama Toko</th>
                <th style="width: 10%;">Nomor HP</th>
            </tr>

        </thead>


        <tbody>

            @forelse($commodities as $key => $commodity)

                <tr>
                    <td class="center">{{ $key + 1 }}</td>
                    <td>{{ $commodity->item_code }}</td>
                    <td>{{ $commodity->inventory_number ?? '-' }}</td>
                    <td>{{ $commodity->name }}</td>
                    <td>{{ $commodity->category ?? 'Lainnya' }}</td>
                    <td>{{ optional($commodity->commodity_location)->name ?? '-' }}</td>
                    <td class="center">{{ $commodity->quantity }}</td>
                    <td class="center">{{ $commodity->unit ?? 'Unit' }}</td>
                    <td class="center">{{ $commodity->getConditionName() }}</td>
                    <td class="center">{{ $commodity->status ?? 'Tersedia' }}</td>
                    <td class="right">Rp {{ number_format($commodity->price_per_item, 0, ',', '.') }}</td>
                    <td class="center">{{ $commodity->input_date ? date('d-m-Y', strtotime($commodity->input_date)) : '-' }}</td>
                    <td>{{ $commodity->store_name ?? '-' }}</td>
                    <td>{{ $commodity->store_phone ?? '-' }}</td>
                </tr>

            @empty

                <tr>

                    <td colspan="14" class="center">
                        Tidak ada data barang.
                    </td>

                </tr>

            @endforelse

        </tbody>

    </table>

    <!-- =========================
     TANDA TANGAN
     ========================= -->

    <table class="signature">
        <tr>

            <!-- ADMIN -->
            <td>
                <div class="signature-title">
                    Mengetahui,<br>
                    Admin Inventaris
                </div>

                <div class="signature-name">
                    __________________________
                </div>

                <div class="signature-position">
                    Admin
                </div>
            </td>

            <!-- KEPALA SEKOLAH -->
            <td>
                <div class="signature-title">
                    Mengetahui,<br>
                    Kepala Sekolah
                </div>

                <div class="signature-name">
                    __________________________
                </div>

                <div class="signature-position">
                    Sugito, S.E., M.E.Sy.
                </div>
            </td>

        </tr>
    </table>


    <!-- FOOTER -->
    <div class="footer">

        {{ $sekolah }}
        &nbsp; | &nbsp;
        Laporan Daftar Barang
        &nbsp; | &nbsp;
        Halaman <span class="page-number"></span>

    </div>

</body>

</html>
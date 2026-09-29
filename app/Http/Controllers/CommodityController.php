<?php

namespace App\Http\Controllers;

use App\Commodity;
use App\CommodityAcquisition;
use App\CommodityLocation;
use App\Exports\CommoditiesExport;
use App\Http\Requests\CommodityExportRequest;
use App\Http\Requests\CommodityImportRequest;
use App\Http\Requests\StoreCommodityRequest;
use App\Http\Requests\UpdateCommodityRequest;
use App\Imports\CommoditiesImport;
use App\Repositories\CommodityRepository;
use Barryvdh\DomPDF\Facade\Pdf;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Storage;
use App\Support\AuditLogger;

class CommodityController extends Controller
{
    public function __construct(
        private CommodityRepository $commodityRepository,
    ) {
        $this->authorizeResource(Commodity::class, 'commodity');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $query = Commodity::query()->with('commodity_location', 'commodity_acquisition');
        if (auth()->user()->isStudent()) {
            $commodities = $query->where('status','!=','Dihapus')->orderBy('name')->get();
            return view('student-commodities.index', compact('commodities'));
        }
        $query->when(request()->filled('condition'), function ($q) {
            return $q->where('condition', request('condition'));
        });

        $query->when(request()->filled('commodity_location_id'), function ($q) {
            return $q->where('commodity_location_id', request('commodity_location_id'));
        });

        $query->when(request()->filled('commodity_acquisition_id'), function ($q) {
            return $q->where('commodity_acquisition_id', request('commodity_acquisition_id'));
        });

        $query->when(request()->filled('year_of_purchase'), function ($q) {
            return $q->where('year_of_purchase', request('year_of_purchase'));
        });

        $query->when(request()->filled('material'), function ($q) {
            return $q->where('material', request('material'));
        });

        $query->when(request()->filled('brand'), function ($q) {
            return $q->where('brand', request('brand'));
        });

        $query->when(request()->filled('category'), function ($q) {
            return $q->where('category', request('category'));
        });

        $query->when(request()->filled('unit'), function ($q) {
            return $q->where('unit', request('unit'));
        });

        $query->when(request()->filled('status'), function ($q) {
            return $q->where('status', request('status'));
        });

        $query->when(request()->filled('input_date'), function ($q) {
            $q->whereDate('input_date', request('input_date'));
        });

        $query->when(request()->filled('store_name'), function ($q) {
            $q->where('store_name', 'like', '%' . request('store_name') . '%');
        });

        $query->when(request()->filled('phone_number'), function ($q) {
            $q->where('store_phone', 'like', '%' . request('phone_number') . '%');
        });

        $commodities = $query->latest()->get();
        $year_of_purchases = Commodity::pluck('year_of_purchase')->unique()->sort();
        $commodity_brands = Commodity::pluck('brand')->unique()->sort();
        $commodity_materials = Commodity::pluck('material')->filter()->unique()->sort();
        $commodity_categories = Commodity::pluck('category')->filter()->unique()->sort();
        $commodity_units = Commodity::pluck('unit')->filter()->unique()->sort();
        $commodity_statuses = Commodity::pluck('status')->filter()->unique()->sort();
        $commodity_acquisitions = CommodityAcquisition::orderBy('name', 'ASC')->get();
        $commodity_locations = CommodityLocation::orderBy('name', 'ASC')->get();

        $commodity_condition_count = $this->commodityRepository->countCommodityCondition()->map(function ($commodity) {
            return collect([
                'condition_name' => $commodity->getConditionName(),
                'count' => $commodity->count,
            ]);
        });

        $commodity_counts = [
            'commodity_in_total' => $commodity_condition_count->sum('count') ?? 0,
            'commodity_in_good_condition' => $commodity_condition_count->firstWhere('condition_name', 'Baik')['count'] ?? 0,
            'commodity_in_not_good_condition' => $commodity_condition_count->firstWhere('condition_name', 'Rusak Ringan')['count'] ?? 0,
            'commodity_in_heavily_damage_condition' => $commodity_condition_count->firstWhere('condition_name', 'Rusak Berat')['count'] ?? 0,
        ];

        return view(
            'commodities.index',
            compact(
                'commodities',
                'commodity_acquisitions',
                'commodity_locations',
                'year_of_purchases',
                'commodity_brands',
                'commodity_materials',
                'commodity_categories',
                'commodity_units',
                'commodity_statuses',
                'commodity_counts'
            )
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCommodityRequest $request)
    {
        $data = $request->validated();

        if ($request->hasFile('receipt')) {
            $data['receipt'] = $request->file('receipt')->store('receipts', 'public');
        }

        if ($request->hasFile('photo')) {
            $data['photo'] = $request->file('photo')->store('commodities', 'public');
        }

        $commodity=Commodity::create($data);
        AuditLogger::log('Tambah','Data Barang','Menambahkan barang '.$commodity->name,$commodity);

        return to_route('barang.index')->with('success', 'Data berhasil ditambahkan!');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCommodityRequest $request, Commodity $commodity)
    {
        $data = $request->validated();

        if ($request->hasFile('receipt')) {
            if ($commodity->receipt) {
                Storage::disk('public')->delete($commodity->receipt);
            }
            $data['receipt'] = $request->file('receipt')->store('receipts', 'public');
        } else {
            unset($data['receipt']);
        }

        if ($request->hasFile('photo')) {
            if ($commodity->photo) {
                Storage::disk('public')->delete($commodity->photo);
            }
            $data['photo'] = $request->file('photo')->store('commodities', 'public');
        } else {
            unset($data['photo']);
        }

        $old=$commodity->toArray();
        $commodity->update($data);
        AuditLogger::log('Edit','Data Barang','Mengubah barang '.$commodity->name,$commodity,$old,$commodity->toArray());

        return to_route('barang.index')->with('success', 'Data berhasil diubah!');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Commodity $commodity)
    {
        // File fisik tetap dipertahankan agar soft-delete tidak merusak histori.
        $commodity->delete();
        AuditLogger::log('Hapus','Data Barang','Soft delete barang '.$commodity->name,$commodity);

        return to_route('barang.index')->with('success', 'Data berhasil dihapus!');
    }

    public function restore($id)
    {
        $commodity = Commodity::withTrashed()->findOrFail($id);
        $this->authorize('restore', $commodity);
        $commodity->restore();
        $commodity->update(['status'=>'Tersedia']);
        \App\Support\AuditLogger::log('Restore','Data Barang','Memulihkan barang '.$commodity->name,$commodity);
        return to_route('barang.index')->with('success','Barang berhasil dipulihkan.');
    }

    /**
     * Generate PDF for all commodities.
     */
    public function generatePDF()
    {
        $this->authorize('print barang');

        $commodities = Commodity::all();
        $sekolah = env('NAMA_SEKOLAH', 'Barang Milik Sekolah');
        $pdf = Pdf::loadView('commodities.pdf', compact(['commodities', 'sekolah']))->setPaper('a4');

        return $pdf->download('print.pdf');
    }

    /**
     * Generate PDF for a specific commodity.
     */
    public function generatePDFIndividually($id)
    {
        $this->authorize('print individual barang');

        $commodity = Commodity::find($id);
        $sekolah = env('NAMA_SEKOLAH', 'Barang Milik Sekolah');
        $pdf = Pdf::loadView('commodities.pdfone', compact(['commodity', 'sekolah']))->setPaper('a4');

        return $pdf->download('print.pdf');
    }

    /**
     * Export commodities data to Excel.
     */
    public function export(CommodityExportRequest $request)
    {
        $this->authorize('export barang');

        $filename = 'daftar-barang-'.date('d-m-Y');

        return match ($request->extension) {
            'xlsx' => Excel::download(new CommoditiesExport, $filename.'.xlsx', \Maatwebsite\Excel\Excel::XLSX),
            'xls' => Excel::download(new CommoditiesExport, $filename.'.xls', \Maatwebsite\Excel\Excel::XLS),
            'csv' => Excel::download(new CommoditiesExport, $filename.'.csv', \Maatwebsite\Excel\Excel::CSV),
            'html' => Excel::download(new CommoditiesExport, $filename.'.html', \Maatwebsite\Excel\Excel::HTML),
        };
    }

    /**
     * Import commodities data from Excel.
     */
    public function import(CommodityImportRequest $request)
    {
        $this->authorize('import barang');

        Excel::import(new CommoditiesImport, $request->file('file'));

        return to_route('barang.index')->with('success', 'Data barang berhasil diimpor!');
    }
}

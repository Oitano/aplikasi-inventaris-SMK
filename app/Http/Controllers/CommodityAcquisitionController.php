<?php

namespace App\Http\Controllers;

use App\CommodityAcquisition;
use App\Http\Requests\StoreCommodityAcquisitionRequest;
use App\Http\Requests\UpdateCommodityAcquisitionRequest;
use App\Support\AuditLogger;

class CommodityAcquisitionController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(CommodityAcquisition::class, 'commodity_acquisition');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $commodityAcquisitions = CommodityAcquisition::orderBy('name', 'ASC')->get();

        return view('commodity-acquisitions.index', compact('commodityAcquisitions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCommodityAcquisitionRequest $request)
    {
        $m=CommodityAcquisition::create($request->validated());
        AuditLogger::log('Tambah','Perolehan','Menambahkan perolehan '.$m->name,$m);

        return to_route('perolehan.index')->with('success', 'Data berhasil ditambahkan!');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCommodityAcquisitionRequest $request, CommodityAcquisition $commodityAcquisition)
    {
        $old=$commodityAcquisition->toArray(); $commodityAcquisition->update($request->validated());
        AuditLogger::log('Edit','Perolehan','Mengubah perolehan '.$commodityAcquisition->name,$commodityAcquisition,$old,$commodityAcquisition->toArray());

        return to_route('perolehan.index')->with('success', 'Data berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CommodityAcquisition $commodityAcquisition)
    {
        if ($commodityAcquisition->commodities->isNotEmpty()) {
            return to_route('perolehan.index')
                ->with('error', 'Perolehan tidak dapat dihapus karena masih terkait dengan data komoditas!');
        }

        $commodityAcquisition->delete();
        AuditLogger::log('Hapus','Perolehan','Menghapus perolehan '.$commodityAcquisition->name,$commodityAcquisition);

        return to_route('perolehan.index')->with('success', 'Data berhasil dihapus!');
    }
}

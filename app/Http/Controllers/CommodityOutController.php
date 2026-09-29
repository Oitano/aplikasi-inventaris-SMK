<?php

namespace App\Http\Controllers;

use App\Commodity;
use App\CommodityOut;
use App\Http\Requests\StoreCommodityOutRequest;
use App\Http\Requests\UpdateCommodityOutRequest;
use App\Support\AuditLogger;
use App\CommodityLocation;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class CommodityOutController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(CommodityOut::class, 'commodity_out');
    }

    public function index()
    {
        $commodityOuts = CommodityOut::with('commodity')->latest('date')->latest()->get();
        $commodities = Commodity::orderBy('name')->get();
        $commodityLocations = CommodityLocation::orderBy('name')->get();

        return view('commodity-outs.index', compact('commodityOuts', 'commodities','commodityLocations'));
    }

    public function store(StoreCommodityOutRequest $request)
    {
        $this->authorize('create', CommodityOut::class);

        DB::transaction(function () use ($request) {
            $data = $request->validated();
            $commodity = Commodity::whereKey($data['commodity_id'])->lockForUpdate()->firstOrFail();

            if ($commodity->quantity < $data['quantity']) {
                throw ValidationException::withMessages(['quantity' => 'Stok barang tidak mencukupi. Stok tersedia: '.$commodity->quantity.'.']);
            }

            $commodity->decrement('quantity', $data['quantity']);
            $data['user_id']=auth()->id();
            $out=CommodityOut::create($data);
            AuditLogger::log('Tambah','Barang Keluar','Mencatat '.$data['quantity'].' unit barang keluar',$out);
        });

        return to_route('barang-keluar.index')->with('success', 'Barang keluar berhasil dicatat dan stok berkurang!');
    }

    public function update(UpdateCommodityOutRequest $request, CommodityOut $commodityOut)
    {
        $this->authorize('update',$commodityOut);
        DB::transaction(function()use($request,$commodityOut){
            $data=$request->validated();
            $commodity=Commodity::whereKey($commodityOut->commodity_id)->lockForUpdate()->firstOrFail();
            $delta=$data['quantity']-$commodityOut->quantity;
            if($delta>0){
                if($commodity->quantity<$delta) throw ValidationException::withMessages(['quantity'=>'Stok tidak mencukupi.']);
                $commodity->decrement('quantity',$delta);
            } elseif($delta<0) $commodity->increment('quantity',abs($delta));
            $old=$commodityOut->toArray(); $commodityOut->update($data);
            AuditLogger::log('Edit','Barang Keluar','Mengubah transaksi barang keluar #'.$commodityOut->id,$commodityOut,$old,$commodityOut->toArray());
        });
        return back()->with('success','Barang keluar berhasil diperbarui.');
    }

    public function destroy(CommodityOut $commodityOut)
    {
        $this->authorize('delete', $commodityOut);

        DB::transaction(function () use ($commodityOut) {
            $commodity = Commodity::whereKey($commodityOut->commodity_id)->lockForUpdate()->firstOrFail();
            $commodity->increment('quantity', $commodityOut->quantity);
            $commodityOut->delete();
            AuditLogger::log('Hapus','Barang Keluar','Menghapus transaksi barang keluar #'.$commodityOut->id,$commodityOut);
        });

        return to_route('barang-keluar.index')->with('success', 'Riwayat barang keluar berhasil dihapus dan stok dikembalikan.');
    }
}

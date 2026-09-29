<?php

namespace App\Http\Controllers;

use App\Commodity;
use App\CommodityIn;
use App\Http\Requests\StoreCommodityInRequest;
use App\Http\Requests\UpdateCommodityInRequest;
use App\Support\AuditLogger;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Storage;

class CommodityInController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(CommodityIn::class, 'commodity_in');
    }

    public function index()
    {
        $commodityIns = CommodityIn::with('commodity')->latest('date')->latest()->get();
        $commodities = Commodity::orderBy('name')->get();

        return view('commodity-ins.index', compact('commodityIns', 'commodities'));
    }

    public function store(StoreCommodityInRequest $request)
    {
        $this->authorize('create', CommodityIn::class);

        DB::transaction(function () use ($request) {
            $data = $request->validated();
            if($request->hasFile('receipt')) $data['receipt']=$request->file('receipt')->store('receipts','public');
            $commodity = Commodity::whereKey($data['commodity_id'])->lockForUpdate()->firstOrFail();

            $commodity->increment('quantity', $data['quantity']);
            $data['user_id']=auth()->id();
            $in=CommodityIn::create($data);
            AuditLogger::log('Tambah','Barang Masuk','Menambahkan '.$data['quantity'].' unit barang masuk',$in);
        });

        return to_route('barang-masuk.index')->with('success', 'Barang masuk berhasil dicatat dan stok bertambah!');
    }

    public function update(UpdateCommodityInRequest $request, CommodityIn $commodityIn)
    {
        $this->authorize('update',$commodityIn);
        DB::transaction(function()use($request,$commodityIn){
            $data=$request->validated();
            $commodity=Commodity::whereKey($commodityIn->commodity_id)->lockForUpdate()->firstOrFail();
            $delta=$data['quantity']-$commodityIn->quantity;
            if($delta>0) $commodity->increment('quantity',$delta);
            elseif($delta<0) {
                if($commodity->quantity < abs($delta)) throw ValidationException::withMessages(['quantity'=>'Stok tidak cukup untuk mengurangi transaksi.']);
                $commodity->decrement('quantity',abs($delta));
            }
            $old=$commodityIn->toArray(); $commodityIn->update($data);
            AuditLogger::log('Edit','Barang Masuk','Mengubah transaksi barang masuk #'.$commodityIn->id,$commodityIn,$old,$commodityIn->toArray());
        });
        return back()->with('success','Barang masuk berhasil diperbarui.');
    }

    public function destroy(CommodityIn $commodityIn)
    {
        $this->authorize('delete', $commodityIn);

        DB::transaction(function () use ($commodityIn) {
            $commodity = Commodity::whereKey($commodityIn->commodity_id)->lockForUpdate()->firstOrFail();

            if ($commodity->quantity < $commodityIn->quantity) {
                throw ValidationException::withMessages(['quantity' => 'Riwayat barang masuk tidak dapat dihapus karena stok saat ini lebih kecil dari jumlah yang akan dikurangi.']);
            }

            $commodity->decrement('quantity', $commodityIn->quantity);
            $commodityIn->delete();
            AuditLogger::log('Hapus','Barang Masuk','Menghapus transaksi barang masuk #'.$commodityIn->id,$commodityIn);
        });

        return to_route('barang-masuk.index')->with('success', 'Riwayat barang masuk berhasil dihapus dan stok disesuaikan.');
    }
}

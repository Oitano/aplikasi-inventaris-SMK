<?php
namespace App\Http\Controllers;
use App\Commodity;
use App\CommodityLoan;
use App\Http\Requests\StoreCommodityLoanRequest;
use App\Http\Requests\UpdateCommodityLoanRequest;
use App\Support\AuditLogger;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class CommodityLoanController extends Controller {
    public function __construct(){ $this->authorizeResource(CommodityLoan::class,'commodity_loan'); }

    public function index(){
        $user=auth()->user();
        if($user->isStudent()){
            $commodityLoans=$user->loans()->with('commodity')->latest('loan_date')->get();
            $commodities=Commodity::where('quantity','>',0)->where('status','Tersedia')->orderBy('name')->get();
            $sanctions=$user->sanctions()->latest('date')->get();
            return view('student-loans.index',compact('commodityLoans','commodities','sanctions'));
        }
        $commodityLoans=CommodityLoan::with(['commodity','user','approver'])->latest('loan_date')->get();
        $commodities=Commodity::where('quantity','>',0)->orderBy('name')->get();
        return view('commodity-loans.index',compact('commodityLoans','commodities'));
    }

    public function store(StoreCommodityLoanRequest $request){
        $data=$request->validated();
        $user=auth()->user();
        $commodity=Commodity::findOrFail($data['commodity_id']);
        if($user->isStudent()){
            if($commodity->quantity < $data['quantity']) throw ValidationException::withMessages(['quantity'=>'Stok barang tidak mencukupi.']);
            $data['user_id']=$user->id;
            $data['borrower']=$user->name;
            $data['status']='Menunggu';
            CommodityLoan::create($data);
            AuditLogger::log('Peminjaman','Peminjaman','Siswa mengajukan peminjaman '.$commodity->name);
            return to_route('peminjaman.index')->with('success','Pengajuan peminjaman berhasil dikirim dan menunggu persetujuan.');
        }
        DB::transaction(function()use($data,$commodity){
            $commodity=Commodity::whereKey($commodity->id)->lockForUpdate()->firstOrFail();
            if($commodity->quantity<$data['quantity']) throw ValidationException::withMessages(['quantity'=>'Stok barang tidak mencukupi. Stok tersedia: '.$commodity->quantity.'.']);
            $data['status']='Dipinjam'; $data['approved_by']=auth()->id(); $data['approved_at']=now();
            $commodity->decrement('quantity',$data['quantity']);
            $commodity->update(['status'=>$commodity->quantity>0?'Tersedia':'Dipinjam']);
            $loan=CommodityLoan::create($data);
            AuditLogger::log('Tambah','Peminjaman','Mencatat peminjaman '.$commodity->name,$loan);
        });
        return to_route('peminjaman.index')->with('success','Peminjaman berhasil dicatat.');
    }

    public function update(UpdateCommodityLoanRequest $request, CommodityLoan $commodityLoan)
    {
        $this->authorize('update',$commodityLoan);
        $old=$commodityLoan->toArray();
        $commodityLoan->update($request->validated());
        AuditLogger::log('Edit','Peminjaman','Mengubah detail peminjaman #'.$commodityLoan->id,$commodityLoan,$old,$commodityLoan->toArray());
        return back()->with('success','Detail peminjaman diperbarui.');
    }

    public function approve(CommodityLoan $commodityLoan){
        $this->authorize('approve',$commodityLoan);
        if($commodityLoan->status!=='Menunggu') return back()->withErrors(['status'=>'Peminjaman ini tidak sedang menunggu persetujuan.']);
        DB::transaction(function()use($commodityLoan){
            $loan=CommodityLoan::whereKey($commodityLoan->id)->lockForUpdate()->firstOrFail();
            $commodity=Commodity::whereKey($loan->commodity_id)->lockForUpdate()->firstOrFail();
            if($commodity->quantity<$loan->quantity) throw ValidationException::withMessages(['quantity'=>'Stok barang tidak mencukupi.']);
            $commodity->decrement('quantity',$loan->quantity);
            $commodity->update(['status'=>$commodity->quantity>0?'Tersedia':'Dipinjam']);
            $loan->update(['status'=>'Dipinjam','approved_by'=>auth()->id(),'approved_at'=>now()]);
            AuditLogger::log('Persetujuan','Peminjaman','Menyetujui peminjaman '.$commodity->name,$loan);
            $loan->user?->notify(new \App\Notifications\InventoryNotification('Peminjaman disetujui','Peminjaman '.$commodity->name.' telah disetujui.'));
        });
        return back()->with('success','Peminjaman disetujui.');
    }

    public function reject(CommodityLoan $commodityLoan){
        $this->authorize('reject',$commodityLoan);
        $commodityLoan->update(['status'=>'Ditolak','approved_by'=>auth()->id(),'approved_at'=>now(),'rejection_reason'=>request('rejection_reason')]);
        AuditLogger::log('Penolakan','Peminjaman','Menolak peminjaman '.$commodityLoan->commodity?->name,$commodityLoan);
        $commodityLoan->user?->notify(new \App\Notifications\InventoryNotification('Peminjaman ditolak','Pengajuan peminjaman Anda ditolak.'));
        return back()->with('success','Peminjaman ditolak.');
    }

    public function returnLoan(CommodityLoan $commodityLoan){
        $this->authorize('returnLoan',$commodityLoan);
        if($commodityLoan->status==='Dikembalikan') return back()->with('success','Barang sudah dikembalikan.');
        DB::transaction(function()use($commodityLoan){
            $loan=CommodityLoan::whereKey($commodityLoan->id)->lockForUpdate()->firstOrFail();
            $commodity=Commodity::whereKey($loan->commodity_id)->lockForUpdate()->firstOrFail();
            $commodity->increment('quantity',$loan->quantity);
            $commodity->update(['status'=>'Tersedia']);
            $loan->update(['status'=>'Dikembalikan','return_date'=>now()->toDateString(),'returned_condition'=>request('returned_condition')]);
            AuditLogger::log('Pengembalian','Peminjaman','Memproses pengembalian '.$commodity->name,$loan);
            $loan->user?->notify(new \App\Notifications\InventoryNotification('Pengembalian dicatat','Pengembalian '.$commodity->name.' telah dicatat.'));
        });
        return back()->with('success','Pengembalian berhasil diproses.');
    }

    public function destroy(CommodityLoan $commodityLoan){
        $this->authorize('delete',$commodityLoan);
        if(in_array($commodityLoan->status,['Dipinjam','Disetujui','Terlambat'])){
            return back()->withErrors(['status'=>'Peminjaman aktif tidak boleh dihapus. Proses pengembalian terlebih dahulu.']);
        }
        $commodityLoan->delete();
        AuditLogger::log('Hapus','Peminjaman','Menghapus riwayat peminjaman #'.$commodityLoan->id,$commodityLoan);
        return back()->with('success','Riwayat peminjaman berhasil dihapus.');
    }
}
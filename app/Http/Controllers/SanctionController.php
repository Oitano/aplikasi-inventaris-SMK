<?php
namespace App\Http\Controllers;
use App\Sanction;
use App\User;
use App\Commodity;
use App\CommodityLoan;
use App\Support\AuditLogger;
use Illuminate\Http\Request;
class SanctionController extends Controller {
    public function __construct(){ $this->authorizeResource(Sanction::class,'sanction'); }
    public function index(){
        $user=auth()->user();
        $sanctions=$user->isStudent()? $user->sanctions()->with('commodity')->latest('date')->get() : Sanction::with(['user','commodity','creator'])->latest('date')->get();
        $students=User::whereHas('roles',fn($q)=>$q->where('name','Siswa'))->where('status','Aktif')->orderBy('name')->get();
        $loans=CommodityLoan::with('commodity')->latest()->get();
        return view('sanctions.index',compact('sanctions','students','loans'));
    }
    public function store(Request $request){
        $this->authorize('create',Sanction::class);
        $data=$request->validate([
            'user_id'=>'required|exists:users,id','commodity_loan_id'=>'nullable|exists:commodity_loans,id','commodity_id'=>'nullable|exists:commodities,id',
            'violation_type'=>'required|string|max:255','description'=>'required|string|max:2000','date'=>'required|date',
            'status'=>'required|in:Belum diselesaikan,Dalam proses,Selesai','admin_note'=>'nullable|string|max:2000'
        ]);
        $data['created_by']=auth()->id();
        $s=Sanction::create($data);
        AuditLogger::log('Tambah','Sanksi','Menambahkan sanksi untuk '.($s->user?->name??'Siswa'),$s);
        $s->user?->notify(new \App\Notifications\InventoryNotification('Sanksi baru','Anda mendapatkan catatan sanksi dalam sistem inventaris.'));
        return back()->with('success','Sanksi berhasil dicatat.');
    }
    public function update(Request $request,Sanction $sanction){
        $this->authorize('update',$sanction);
        $data=$request->validate(['status'=>'required|in:Belum diselesaikan,Dalam proses,Selesai','admin_note'=>'nullable|string|max:2000']);
        $old=$sanction->toArray(); $sanction->update($data);
        AuditLogger::log('Edit','Sanksi','Memperbarui sanksi #'.$sanction->id,$sanction,$old,$sanction->toArray());
        return back()->with('success','Sanksi diperbarui.');
    }
    public function destroy(Sanction $sanction){
        $this->authorize('delete',$sanction); $sanction->delete();
        AuditLogger::log('Hapus','Sanksi','Menghapus sanksi #'.$sanction->id,$sanction);
        return back()->with('success','Sanksi dihapus.');
    }
}
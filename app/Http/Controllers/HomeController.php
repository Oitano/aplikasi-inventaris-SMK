<?php
namespace App\Http\Controllers;
use App\Commodity;
use App\CommodityIn;
use App\CommodityOut;
use App\CommodityLoan;
use App\CommodityLocation;
use App\Sanction;
use App\User;
use App\AuditLog;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller {
    public function __construct(){ $this->middleware('auth'); }

    public function index(){
        $user=auth()->user();
        if($user->isStudent()) {
            $loans=$user->loans()->with('commodity')->latest()->get();
            $sanctions=$user->sanctions()->latest('date')->get();
            return view('dashboards.student',compact('loans','sanctions'));
        }

        $stats=[
            'total_barang'=>Commodity::sum('quantity'),
            'barang_tersedia'=>Commodity::where('status','Tersedia')->sum('quantity'),
            'barang_dipinjam'=>CommodityLoan::whereIn('status',['Disetujui','Dipinjam'])->sum('quantity'),
            'barang_rusak'=>Commodity::whereIn('condition',[2,3])->sum('quantity'),
            'barang_hilang'=>Commodity::where('status','Hilang')->sum('quantity'),
            'barang_masuk'=>CommodityIn::sum('quantity'),
            'barang_keluar'=>CommodityOut::sum('quantity'),
            'total_peminjaman'=>CommodityLoan::count(),
            'peminjaman_aktif'=>CommodityLoan::whereIn('status',['Disetujui','Dipinjam','Terlambat'])->count(),
            'peminjaman_terlambat'=>CommodityLoan::whereIn('status',['Disetujui','Dipinjam'])->whereNotNull('due_date')->whereDate('due_date','<',today())->count(),
            'total_siswa'=>User::whereHas('roles',fn($q)=>$q->where('name','Siswa'))->count(),
            'total_staff'=>User::whereHas('roles',fn($q)=>$q->where('name','Staff TU (Tata Usaha)'))->count(),
            'total_admin'=>User::whereHas('roles',fn($q)=>$q->where('name','Administrator'))->count(),
        ];
        $activities=$user->isAdministrator() ? AuditLog::with('user')->latest()->limit(15)->get() : collect();
        return view('home',compact('stats','activities'));
    }
}
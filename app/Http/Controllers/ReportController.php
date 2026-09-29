<?php
namespace App\Http\Controllers;
use App\Commodity; use App\CommodityIn; use App\CommodityOut; use App\CommodityLoan; use App\User; use App\Sanction;
class ReportController extends Controller {
 public function index(){
  abort_unless(auth()->user()->can('lihat laporan'),403);
  $summary=[
   'barang'=>Commodity::sum('quantity'),'masuk'=>CommodityIn::sum('quantity'),'keluar'=>CommodityOut::sum('quantity'),
   'peminjaman'=>CommodityLoan::count(),'aktif'=>CommodityLoan::whereIn('status',['Dipinjam','Terlambat'])->count(),
   'sanksi'=>Sanction::count(),'siswa'=>User::whereHas('roles',fn($q)=>$q->where('name','Siswa'))->count()
  ];
  return view('reports.index',compact('summary'));
 }
}
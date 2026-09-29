<?php
namespace App\Policies;
use App\CommodityLoan;
use App\User;
class CommodityLoanPolicy {
    public function viewAny(User $u):bool{return $u->can('lihat peminjaman');}
    public function view(User $u, CommodityLoan $m):bool{return $u->isStudent() ? $m->user_id === $u->id : $u->can('lihat peminjaman');}
    public function create(User $u):bool{return $u->can('tambah peminjaman');}
    public function update(User $u, CommodityLoan $m):bool{return $u->can('ubah peminjaman') && !$u->isStudent();}
    public function delete(User $u, CommodityLoan $m):bool{return $u->can('hapus peminjaman') && !$u->isStudent();}
    public function approve(User $u, CommodityLoan $m):bool{return $u->can('setujui peminjaman') && !$u->isStudent();}
    public function reject(User $u, CommodityLoan $m):bool{return $u->can('tolak peminjaman') && !$u->isStudent();}
    public function returnLoan(User $u, CommodityLoan $m):bool{return $u->can('proses pengembalian') && !$u->isStudent();}
}
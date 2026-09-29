<?php
namespace App\Policies;
use App\CommodityOut;
use App\User;
class CommodityOutPolicy {
    public function viewAny(User $u):bool{return $u->can('lihat barang keluar');}
    public function view(User $u, CommodityOut $m):bool{return $u->can('lihat barang keluar');}
    public function create(User $u):bool{return $u->can('tambah barang keluar');}
    public function update(User $u, CommodityOut $m):bool{return $u->can('ubah barang keluar');}
    public function delete(User $u, CommodityOut $m):bool{return $u->can('hapus barang keluar');}
}
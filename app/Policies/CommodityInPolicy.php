<?php
namespace App\Policies;
use App\CommodityIn;
use App\User;
class CommodityInPolicy {
    public function viewAny(User $u):bool{return $u->can('lihat barang masuk');}
    public function view(User $u, CommodityIn $m):bool{return $u->can('lihat barang masuk');}
    public function create(User $u):bool{return $u->can('tambah barang masuk');}
    public function update(User $u, CommodityIn $m):bool{return $u->can('ubah barang masuk');}
    public function delete(User $u, CommodityIn $m):bool{return $u->can('hapus barang masuk');}
}
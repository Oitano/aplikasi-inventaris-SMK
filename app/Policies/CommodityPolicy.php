<?php
namespace App\Policies;
use App\Commodity;
use App\User;
class CommodityPolicy {
    public function viewAny(User $user): bool { return $user->can('lihat barang'); }
    public function view(User $user, Commodity $commodity): bool { return $user->can('lihat barang'); }
    public function create(User $user): bool { return $user->can('tambah barang'); }
    public function update(User $user): bool { return $user->can('ubah barang'); }
    public function delete(User $user): bool { return $user->can('hapus barang'); }
    public function restore(User $user, Commodity $commodity): bool { return $user->can('restore barang'); }
    public function forceDelete(User $user, Commodity $commodity): bool { return false; }
}
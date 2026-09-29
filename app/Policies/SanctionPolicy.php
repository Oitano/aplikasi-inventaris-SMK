<?php
namespace App\Policies;
use App\Sanction;
use App\User;
class SanctionPolicy {
    public function viewAny(User $user): bool { return $user->can('lihat sanksi'); }
    public function view(User $user, Sanction $sanction): bool { return $user->isStudent() ? $sanction->user_id === $user->id : $user->can('lihat sanksi'); }
    public function create(User $user): bool { return $user->can('tambah sanksi'); }
    public function update(User $user): bool { return $user->can('ubah sanksi'); }
    public function delete(User $user): bool { return $user->can('hapus sanksi'); }
}
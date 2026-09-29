<?php
namespace App\Policies;
use App\User;
class UserPolicy {
    public function viewAny(User $u):bool{return $u->can('kelola pengguna');}
    public function view(User $u, User $model):bool{return $u->can('kelola pengguna');}
    public function create(User $u):bool{return $u->can('kelola pengguna');}
    public function update(User $u, User $model):bool{return $u->can('kelola pengguna') && $model->id !== $u->id;}
    public function delete(User $u, User $model):bool{return $u->can('kelola pengguna') && $model->id !== $u->id && !$model->hasRole('Administrator');}
}
<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\User;
use Spatie\Permission\Models\Role;
use App\Support\AuditLogger;

class UserController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(User::class, 'user');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $query = User::query();

        $query->when(request()->filled('role_id'), function ($q) {
            return $q->whereRelation('roles', 'id', '=', request('role_id'));
        });

        $users = $query->get()->except(auth()->id());
        $roles = Role::withCount('users')->get();

        return view('users.index', compact('users', 'roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        $validated = $request->validated();
        $validated['status'] = $validated['status'] ?? 'Aktif';
        $role = Role::findById($validated['role_id']);

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => bcrypt($validated['password']),
            'status' => 'Aktif',
        ]);
        $user->assignRole($role);
        AuditLogger::log('Tambah','Pengguna','Membuat akun '.$user->name,$user);

        return to_route('pengguna.index')->with('success', 'Data berhasil ditambahkan!');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        $validated = $request->validated();
        $role = Role::findById($validated['role_id']);

        $credentials = collect($validated)->except('password', 'password_confirmation')->toArray();
        if (!empty($validated['password'])) {
            $credentials['password'] = bcrypt($validated['password']);
        }

        $old=$user->only(['name','email','status']);
        $old['role']=$user->getRoleNames()->first();
        if (isset($validated['status'])) $credentials['status']=$validated['status'];
        $user->update($credentials);
        $user->syncRoles($role);
                $new=$user->only(['name','email','status']); $new['role']=$user->getRoleNames()->first();
        AuditLogger::log('Edit','Pengguna','Mengubah akun '.$user->name,$user,$old,$new);

        return redirect()->route('pengguna.index')->with('success', 'Data berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->update(['status'=>'Nonaktif']);
        AuditLogger::log('Nonaktif','Pengguna','Menonaktifkan akun '.$user->name,$user);

        return to_route('pengguna.index')->with('success', 'Data berhasil dihapus!');
    }
}

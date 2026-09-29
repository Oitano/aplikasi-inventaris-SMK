<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
class RolePermissionSeeder extends Seeder {
    public function run(): void {
        $all=Permission::pluck('name')->all();
        $admin=Role::findByName('Administrator');
        $staff=Role::findByName('Staff TU (Tata Usaha)');
        $studentRole=Role::findByName('Siswa');

        $studentPermissions=[
            'lihat barang','detail barang','tambah peminjaman','lihat peminjaman',
            'lihat sanksi','mengatur profile',
        ];
        $staffBlocked=[
            'kelola pengguna','kelola role','kelola permission',
            'lihat pengguna','tambah pengguna','ubah pengguna','hapus pengguna',
            'lihat peran dan hak akses','tambah peran dan hak akses','ubah peran dan hak akses','hapus peran dan hak akses',
            'hapus barang','hapus barang masuk','hapus barang keluar','hapus peminjaman','hapus sanksi'
        ];
        $staffPerm=array_values(array_diff($all,$staffBlocked));
        $admin->syncPermissions($all);
        $staff->syncPermissions($staffPerm);
        $studentRole->syncPermissions($studentPermissions);
    }
}
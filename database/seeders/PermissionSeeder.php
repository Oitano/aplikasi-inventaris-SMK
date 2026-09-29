<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder {
    public function run(): void {
        $permissions=[
            'lihat barang','tambah barang','ubah barang','hapus barang','detail barang','restore barang',
            'import barang','export barang','print barang','print individual barang',
            'lihat barang masuk','tambah barang masuk','ubah barang masuk','hapus barang masuk','detail barang masuk',
            'lihat barang keluar','tambah barang keluar','ubah barang keluar','hapus barang keluar','detail barang keluar',
            'lihat peminjaman','tambah peminjaman','ubah peminjaman','hapus peminjaman','detail peminjaman',
            'setujui peminjaman','tolak peminjaman','proses pengembalian',
            'lihat sanksi','tambah sanksi','ubah sanksi','hapus sanksi',
            'lihat perolehan','tambah perolehan','ubah perolehan','hapus perolehan',
            'lihat ruangan','tambah ruangan','ubah ruangan','hapus ruangan','import ruangan','export ruangan',
            'kelola pengguna',
            'lihat pengguna',
            'tambah pengguna',
            'ubah pengguna',
            'hapus pengguna',
            'detail pengguna',
            
            'kelola role',
            'kelola permission',
            'lihat laporan','export laporan','lihat aktivitas','lihat audit',
            'mengatur profile','lihat peran dan hak akses','tambah peran dan hak akses','ubah peran dan hak akses','hapus peran dan hak akses',
        ];
        foreach(array_unique($permissions) as $name){
            Permission::firstOrCreate(['name'=>$name,'guard_name'=>'web']);
        }
    }
}

# Upgrade Sistem Informasi Inventaris Barang SMK Luqman Al Hakim Kudus

Project ini adalah upgrade dari project Laravel yang diberikan, bukan project baru dari nol.

## Yang dipertahankan
- Data Barang
- Barang Masuk
- Barang Keluar
- Peminjaman
- Perolehan
- Ruangan
- Pengguna
- Import/Export
- Upload foto barang
- Upload bukti nota
- UI/Stisla/Bootstrap yang sudah ada

## Upgrade utama
- Role Administrator, Staff TU (Tata Usaha), dan Siswa.
- Permission granular dengan Spatie Laravel Permission.
- Ownership peminjaman siswa menggunakan `user_id`.
- Pengajuan siswa berstatus Menunggu.
- Persetujuan/penolakan peminjaman.
- Pengembalian dan pemeriksaan stok dalam transaksi database.
- Status peminjaman: Menunggu, Disetujui, Dipinjam, Dikembalikan, Terlambat, Ditolak, Bermasalah.
- Sanksi siswa.
- Audit log aktivitas.
- Riwayat perubahan akun tanpa menyimpan password asli.
- Status akun Aktif/Nonaktif.
- Last login.
- Soft delete barang + restore.
- Dashboard statistik dinamis berdasarkan database.
- Dashboard khusus siswa.
- Data barang khusus siswa.
- Notifikasi database untuk approval, rejection, return, dan sanksi.
- Laporan ringkas.
- Route middleware Spatie + Policy + Blade authorization.
- Validasi stok agar tidak negatif.
- Migration kompatibilitas untuk kolom inventory lama termasuk `register` agar database lama tidak gagal saat insert.

## Command setelah project dipindahkan
```bash
composer install
php artisan config:clear
php artisan cache:clear
php artisan route:clear
php artisan view:clear
php artisan storage:link
php artisan migrate
php artisan db:seed
php artisan optimize:clear
```

Jika database produksi sudah berisi data, JANGAN menjalankan `migrate:fresh` atau `migrate:refresh`.

## Akun seed
- Administrator: admin@mail.com / secret
- Staff TU: stafftu@mail.com / secret
- Siswa Demo: siswa@mail.com / secret

Ganti password akun seed setelah login.

## Pengujian yang disarankan
### Administrator
1. Login.
2. Periksa dashboard statistik.
3. CRUD barang dan upload foto.
4. Soft delete lalu restore barang.
5. Barang masuk + nota.
6. Barang keluar + tujuan, penanggung jawab, ruangan.
7. Buat/lihat/setujui/tolak/kembalikan peminjaman.
8. Tambah dan ubah sanksi.
9. Kelola pengguna, role, permission.
10. Buka Riwayat Aktivitas dan cek perubahan akun.

### Staff TU
1. Login.
2. Pastikan dashboard operasional tampil.
3. Uji barang, barang masuk, barang keluar, peminjaman, pengembalian, ruangan, perolehan, laporan.
4. Pastikan menu Pengguna dan Peran & Hak Akses tidak tampil.
5. Coba akses URL administrasi secara langsung dan pastikan ditolak.

### Siswa
1. Login dengan akun siswa.
2. Pastikan hanya melihat dashboard, data barang, peminjaman saya, sanksi saya, profil.
3. Ajukan peminjaman.
4. Pastikan status Menunggu.
5. Login petugas, setujui/ tolak.
6. Login siswa lagi dan pastikan status berubah.
7. Pastikan siswa hanya melihat riwayat miliknya.
8. Coba mengganti ID pada URL untuk data siswa lain dan pastikan akses ditolak.

## Catatan pengujian lingkungan
Pemeriksaan statis dan route berhasil dilakukan. Migrasi/query database harus dijalankan pada mesin pengembang/hosting yang memiliki driver MySQL aktif.

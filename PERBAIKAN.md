# Perbaikan project aplikasi inventaris SMK

Perbaikan yang dilakukan:
1. Memperbaiki tabel DataTables pada halaman Peminjaman Siswa agar tidak membuat baris `colspan` ketika data sanksi kosong. Ini mencegah error "Requested unknown parameter ...".
2. Menambahkan Dockerfile PHP 8.2 untuk deployment yang konsisten. Dockerfile memasang ekstensi yang dibutuhkan Laravel/dependency, termasuk DOM/XML, GD, intl, zip, mbstring, PDO MySQL, bcmath, exif, dan pcntl.
3. Menambahkan `.dockerignore` agar `.env`, vendor, cache, dan log lokal tidak ikut masuk image.
4. Tidak mengubah composer.lock karena harus tetap sinkron dengan composer.json.
5. Pemeriksaan syntax PHP pada source utama tidak menemukan syntax error.

Catatan:
- File `.env` sengaja tidak disertakan dalam paket hasil perbaikan. Gunakan `.env.example` sebagai template dan isi kredensial database sendiri.
- Folder `vendor` juga tidak disertakan; jalankan `composer install` setelah mengekstrak project jika menjalankan secara lokal.
- Untuk Railway/Docker, Dockerfile akan menggunakan port dari environment `PORT`.

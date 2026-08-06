# Tak Banyak Alasan

Website kempen UMNO Putrajaya **Tak Banyak Alasan**. Aplikasi ini menyediakan laman maklumat awam, paparan kegiatan, pimpinan dan artikel, borang aspirasi warga, serta panel admin yang dilindungi login.

Data kandungan awam dibaca daripada MySQL. Visual laman awam menggunakan Blade yang sudah dipecah kepada layout, partial, dan section agar lebih mudah dikemas kini.

## Fungsi utama

- Laman utama responsif: hero, mengenai kempen, kegiatan, aspirasi, pimpinan, artikel dan borang aspirasi.
- Artikel awam memaparkan maksimum tiga tajuk terkini.
- Borang aspirasi, daftar ahli, dan pendaftaran kegiatan disimpan oleh Laravel ke MySQL.
- Panel admin tersedia di `/admin` dan memerlukan login.
- Gambar dan aset dilayani dari `public/assets`; aplikasi tidak bergantung pada folder prototipe `UI-Final` ketika dijalankan.

## Stack dan versi semasa

| Komponen | Versi yang digunakan |
| --- | --- |
| PHP | 8.3.30 (minimum projek: `^8.3`) |
| Laravel | 13.17.0 (constraint: `^13.8`) |
| Composer | 2.9.5 |
| Database | MySQL / MariaDB melalui `pdo_mysql` |
| Node.js | Gunakan versi LTS yang serasi dengan Vite 8 |
| Vite | 8.1.0 |
| Tailwind CSS | 4.3.1 |
| Laravel Vite Plugin | 3.1.0 |
| PHPUnit | 12.5.x |

Versi tepat dependency dikunci dalam `composer.lock` dan `package-lock.json`. Gunakan `composer install` dan `npm ci`; jangan memakai `composer update` atau `npm update` saat deployment rutin.

## Menjalankan secara lokal (Laragon)

1. Aktifkan Apache/Nginx dan MySQL dari Laragon.
2. Salin konfigurasi dan isi koneksi database:

   ```powershell
   Copy-Item .env.example .env
   php artisan key:generate
   ```

3. Pastikan `.env` memakai MySQL lokal:

   ```dotenv
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=tak_banyak_alasan
   DB_USERNAME=root
   DB_PASSWORD=
   ```

4. Install dependency, buat tabel, dan build aset:

   ```powershell
   composer install
   npm ci
   php artisan migrate
   php artisan storage:link
   npm run build
   ```

5. Akses dari virtual host Laragon yang document root-nya menunjuk ke folder `public`, atau jalankan:

   ```powershell
   php artisan serve
   ```

   Laman awam: `/` | Admin: `/admin`

### Akaun admin default (lokal)

Gunakan akun berikut untuk memeriksa panel admin pada environment lokal:

```text
E-mail: admin@gmail.org.my
Kata laluan: admin123
```

Kredensial ini berasal dari `DatabaseSeeder`. Ganti kata laluan dan jangan gunakan akun default ini di production.

## Struktur penting

```text
app/
  Http/Controllers/     Route controller dan submit borang
  Services/             Penyedia data homepage
resources/views/
  layouts/              Layout utama Blade
  public/partials/      Navbar dan footer
  public/sections/      Section homepage per file
resources/css/public/   CSS base, layout, dan section per file
resources/js/public/    Modul interaksi frontend per file
public/
  assets/               Gambar yang dipakai aplikasi
  build/                Hasil build Vite (jangan diedit manual)
database/migrations/    Struktur tabel MySQL
```

## Deployment ringkas

1. Set environment produksi: `APP_ENV=production`, `APP_DEBUG=false`, `APP_URL` ke domain final, serta kredensial MySQL produksi.
2. Isi SMTP produksi (`MAIL_*`) dan Cloudflare Turnstile (`TURNSTILE_*`), lalu set `TURNSTILE_BYPASS_LOCAL=false`.
3. Install dan optimalkan aplikasi:

   ```bash
   composer install --no-dev --optimize-autoloader
   npm ci
   npm run build
   php artisan migrate --force
   php artisan storage:link
   php artisan optimize
   ```

4. Pastikan web server mengarah ke `public/`, bukan root project.
5. Beri izin tulis untuk `storage/` dan `bootstrap/cache/`. Jalankan queue worker jika queue database digunakan:

   ```bash
   php artisan queue:work --tries=3
   ```

Sebelum deploy, backup database dan `.env`; jangan pernah commit `.env` ke repository.

## Status saat ini

- Migrasi MySQL tersedia dan seluruh 4 migrasi lokal sudah berjalan.
- Homepage sudah menggunakan struktur Blade terpisah per section.
- Route publik, login admin, form aspirasi, daftar ahli, dan pendaftaran kegiatan tersedia.
- Aset UI terbaru telah ditempatkan ke `public/` dan tidak dilayani langsung dari `UI-Final`.
- Pemeriksaan terakhir: PHP lint, route, migrasi, render homepage, serta test bawaan Laravel lulus.

## Yang masih perlu sebelum produksi

- Ganti placeholder Turnstile dengan site key dan secret key resmi.
- Konfigurasikan SMTP produksi dan uji pengiriman e-mail pendaftaran/QR.
- Tambahkan test feature untuk login admin, seluruh borang publik, dan sinkronisasi konten; coverage saat ini masih dasar.
- Tinjau konten, tautan sosial, alamat, nomor telepon, dan akun admin sebelum go-live.
- Jalankan `npm ci` pada environment bersih; instalasi lokal saat ini terdeteksi memiliki beberapa paket `node_modules` ekstraneous, yang tidak akan terbawa bila memakai lockfile.

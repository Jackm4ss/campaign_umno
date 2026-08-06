a jadi enak # Scope v2

---

## 1. Navigasi & Header `locked`

**Logo:** background photo collage

**Menu bar:**
- Mengenai kami
- Kegiatan kami → Events page
- Pimpinan
- Artikel
- **Join our movement → form**

> Kegiatan kami = Events page (sama konten, beda label bahasa Melayu)

---

## 2. Halaman Utama — Urutan Sections `locked`

| # | Section |
|---|---------|
| ① | Slideshow — logo / event banner |
| ② | Who we are → join the movement |
| ③ | Aspirasi & masukan |
| ④ | Gallery & feed |
| ⑤ | Events — ongoing & upcoming |
| ⑥ | Past events |

> Footer: disclaimer PDPA Malaysia · GDPR cookies · privacy policy

---

## 3. Gallery & Feed `locked`

- TikTok feed
- Instagram / Facebook feed
- Manual upload — foto / link YT

> Foto dikompres otomatis ke WebP · crop online saat upload · auto-resize

---

## 4. Events Page — Kegiatan Kami `updated`

### Section listing (3 section terpisah)
- 🟡 Ongoing events
- 🟢 Upcoming events
- Past events

### Label / kategori event (dropdown pilihan admin)
- Ceramah
- Gotong royong
- Kesihatan
- Sukan
- Kemasyarakatan
- + kategori lain (boleh tambah)

### Field event (diisi admin)
Semua field berikut **wajib diisi**:
- Judul event
- Tarikh & masa
- Lokasi / nama tempat
- Alamat lokasi
- Deskripsi
- Banner image
- Kategori (dropdown)
- Status event

### Interaksi per event card

| Aksi | Hasil |
|------|-------|
| Klik banner/gambar | Buka popup preview ringkas |
| Klik judul / butang lain | Ke page detail event |

> Popup: judul, tarikh, lokasi, kategori label, butang "Lihat selengkapnya" → page detail

### Registrasi event (unique per event)
Field wajib:
- No Kad Pengenalan
- E-mel valid

| | |
|---|---|
| QR dikirim via | E-mel + layar konfirmasi |
| Kegunaan QR | Klaim hadiah / check-in |

---

## 5. Form Pendaftaran Ahli `locked`

### Data peribadi — semua wajib
- Nama penuh
- No Kad Pengenalan
- Jenis KP — MyKad / MyTentera / MyPolis
- Tarikh lahir
- No telefon
- E-mel (isi 2× untuk sahkan)
- Alamat
- Presint
- Negeri — WP Putrajaya

### Permohonan bantuan (pilih jika perlu)
- Katil hospital — nama pesakit, KP, telefon, alamat
- Bantuan makanan asas
- Wang tunai RM 300

### Lampiran & pengesahan
- Screenshot bukti daftar pemilih WP Putrajaya

| | |
|---|---|
| CAPTCHA | Cloudflare Turnstile (gratis) |
| Sebelum submit | Konfirmasi semak data dulu |

> Setelah submit → halaman konfirmasi "data sudah diterima"

---

## 6. Form Aspirasi & Masukan `locked`

Semua field **wajib**:
- Nama
- No Kad Pengenalan
- E-mel
- No telefon
- Pesan (maks 1500 karakter)

---

## 7. Page Pimpinan `new`

### Field per pimpinan
Wajib:
- Foto pimpinan
- Nama penuh
- Jawatan / gelaran
- Latar belakang / sejarah (rich text)

Opsional:
- Maklumat tambahan

> Diuruskan dari admin dashboard · boleh tambah / edit / susun urutan pimpinan

---

## 8. Page Artikel `new`

### Field artikel
Wajib:
- Judul artikel
- Penulis
- Isi artikel (rich text editor)
- Gambar utama (thumbnail)

Opsional:
- Tag / kategori
- Tarikh terbit — auto / boleh set manual

### Rich text editor — fitur
- Bold / italic / underline
- Bullet & numbered list
- Insert gambar dalam isi
- Heading (H1 / H2 / H3)
- Link embed

### Status artikel & workflow

| Status | Keterangan |
|--------|-----------|
| 🟡 Draft | Tersimpan, belum tayang |
| 🟢 Published | Tayang di website |

| | |
|---|---|
| Sebelum publish | Preview hasil artikel dulu |
| Simpan tanpa publish | Simpan sebagai Draft |

> Halaman artikel publik: listing semua artikel yang published · klik → buka page detail artikel

---

## 9. Dashboard Admin `updated`

**Login:** Email + password

### Data ahli
Filter tersedia:
- Filter by presint
- Filter by kumpulan umur
- Filter by jenis bantuan
- Tarikh permohonan bantuan

### Status bantuan
| Status | Keterangan |
|--------|-----------|
| 🟢 Selesai | Boleh attach foto bukti |
| 🟡 Sedang dirancang | — |
| Diterima | — |
| 🔴 Belum ada tindakan | — |

### Pengurusan konten
- Manage gallery & feed (FB, TikTok, dll)
- Manage pimpinan — tambah / edit / urutan

### Pengurusan event
- Tambah / edit / padam event
- Set status — Ongoing / Upcoming / Past
- Pilih kategori event (dropdown)
- Upload banner image
- Tambah peta lokasi

### Pengurusan artikel
- Tulis / edit artikel (rich text editor)
- Simpan sebagai Draft
- Preview sebelum publish
- Publish ke website
- Padam artikel

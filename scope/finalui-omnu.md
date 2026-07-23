# ☀️ OMNU — UI/UX Design Documentation (Final)
> Scope Reference: scope-omnu.md v2  
> Tema: Light Civic — Merah · Biru · Putih  
> Konteks: Website gerakan komuniti WP Putrajaya

---

## 1. Brand Identity & Design Language

### Tagline
> *"Bersama kita bergerak, bersama kita membina."*

### Persona Visual
Terang, bersih, bold — aura gerakan rakyat yang credible dan accessible. Estetik antara **civic movement brand** dengan **institutional trust** — jauh dari dark luxury, dekat dengan semangat komuniti yang terbuka dan inklusif.

### Aset Logo

| Aset | Keterangan | Fail |
|---|---|---|
| **Logo Utama OMNU** | Lambang khat Jawi UMNO — simbol putih (keris + mahkota) di atas background merah bold, versi bendera berkibar | `1781634573115_image.png` |


**Panduan penggunaan logo:**
- **Navbar** → Lambang khat dipotong/crop, diletakkan di atas background putih atau merah, tinggi ~40px
- **Hero section** → Logo boleh dijadikan elemen dekoratif kanan atau overlay ringan
- **Footer** → Versi lambang putih di atas footer merah gelap (`#9E1212`)
- **Watermark section** → Lambang khat, opacity 5–8%, putih, di belakang content
- **Favicon** → Crop lambang khat sahaja, saiz 32×32px atau 64×64px

---

### Design Philosophy
- **Light-first**: Background putih bersih dengan teks gelap — mudah dibaca, terasa resmi tapi mesra
- **Bold accents**: Merah sebagai warna tenaga dan semangat; biru sebagai kepercayaan dan kestabilan
- **Clean structure**: Layout rapi dan teratur — tipografi besar, grid konsisten
- **Color zoning**: Setiap section bergantian tone (putih, merah ringan, biru ringan) untuk rhythm visual yang jelas

---

## 2. Color Palette

> Warna utama diambil terus dari logo rasmi Ulang Tahun UMNO Ke-80 (1946–2026).

| Token | Hex | Penggunaan |
|---|---|---|
| **Background Primary** | `#FFFFFF` | Seluruh body background utama |
| **Background Secondary** | `#F5F7FA` | Section alternate, card background |
| **Background Red Tint** | `#FDF2F2` | Section hero tint, highlight merah ringan |
| **Background Blue Tint** | `#F0F3FC` | Section alternate biru ringan |
| **Text Primary** | `#1A1A2E` | Headline, body text |
| **Text Secondary** | `#555566` | Subtext, label kecil, caption |
| **Text Muted** | `#9999AA` | Placeholder, teks disabled |
| **Primary Red** | `#CC1A1A` | CTA utama, headline accent, border aktif — *dari logo* |
| **Primary Red Light** | `#E03030` | Hover state, badge, icon |
| **Primary Red Dark** | `#9E1212` | Pressed state, footer background |
| **Primary Blue** | `#1A3C9E` | Link, icon, badge, secondary CTA — *dari logo* |
| **Primary Blue Light** | `#2A52C4` | Hover state, label section |
| **Primary Blue Dark** | `#102880` | Active state, footer accent |
| **White** | `#FFFFFF` | Teks di atas merah/biru, background card |
| **Border Light** | `#E0E4EF` | Border card, separator ringan |
| **Border Medium** | `#C5CADB` | Border form input, divider |
| **CTA Primary** | `#CC1A1A` (merah) | Button "JOIN OUR MOVEMENT", "DAFTAR" |
| **CTA Secondary** | `#1A3C9E` (biru) | Button "KEGIATAN KAMI", "LIHAT LANJUT" |
| **Status Green** | `#2E7D32` | Ongoing event badge |
| **Status Yellow** | `#F57F17` | Upcoming event badge |
| **Status Grey** | `#757575` | Past event badge |

---

## 3. Typography

### Font Stack
- **Display / Headline**: **Bebas Neue** atau **Anton** — uppercase, weight extra-bold, warna gelap atau merah
- **Body / UI**: **Inter** atau **DM Sans** — weight regular hingga semibold
- **Label / Tag**: Letter-spacing lebar, ukuran kecil, uppercase, warna merah atau biru

### Skala Tipografi

| Level | Ukuran (approx.) | Contoh Penggunaan |
|---|---|---|
| Hero Display | ~100–140px | "OMNU" / nama gerakan |
| Section Headline | ~60–80px | "KEGIATAN KAMI", "SIAPA KAMI" |
| Sub-headline | ~36–52px | "CERAMAH", "GOTONG ROYONG" |
| Body Large | ~16–18px | Paragraf deskripsi |
| Body Regular | ~13–15px | Bullet list dalam card |
| Label / Tag | ~10–12px, letter-spacing: 3–4px | "MENGENAI KAMI", "PIMPINAN", "ARTIKEL" |
| Number Stats | ~72–88px | Angka pencapaian gerakan |

### Pola Teks Warna-warni
Setiap section headline ada satu kata dalam warna aksen:
- "BERSAMA KITA **BERGERAK**" → **BERGERAK** = merah solid
- "KEGIATAN & **ACARA**" → **ACARA** = biru solid
- "PIMPINAN **KAMI**" → **KAMI** = merah solid
- "ASPIRASI & **MASUKAN**" → **MASUKAN** = biru solid
- "ARTIKEL & **BERITA**" → **BERITA** = merah solid
- "GALERI & **AKTIVITI**" → **AKTIVITI** = biru solid

---

## 4. Layout & Grid System

### Grid
- **Max-width container**: ~1280–1440px, centered
- **Padding horizontal**: 80–120px di desktop, 20–24px di mobile
- **Column system**: 12-column grid, fleksibel per section

### Layout per Section

| Section | Background | Layout Pattern |
|---|---|---|
| Header / Nav | Putih solid, shadow tipis | Fixed top |
| Hero (Slideshow) | Overlay merah/biru di atas foto | Full-viewport |
| Who We Are | `#F5F7FA` | 2-column: teks kiri, foto kanan |
| Aspirasi & Masukan | `#F0F6FF` (biru tint) | Centered form card |
| Gallery & Feed | `#FFFFFF` | Grid masonry 3 kolom |
| Events | `#FFF5F5` (merah tint) + `#FFFFFF` | Card grid 2–3 kolom |
| Past Events | `#F5F7FA` | Grid compact 3 kolom |
| Pimpinan | `#FFFFFF` | Grid card 3–4 kolom |
| Artikel | `#F5F7FA` | Grid 3 kolom + featured kiri |
| Footer | `#9E1212` (merah gelap) | 5-column, teks putih |

### Spacing System
- **Section gap**: 80–120px vertical
- **Card padding internal**: 24–32px
- **Grid gap antar card**: 16–24px
- **Label ke headline**: 12–16px
- **Headline ke body**: 24–32px

---

## 5. Komponen UI Detail

### 5.1 Navigation Bar

```
[LOGO OMNU]   Mengenai Kami   Kegiatan Kami   Pimpinan   Artikel   [JOIN OUR MOVEMENT →]
```

- **Background**: Putih solid dengan shadow `0 2px 8px rgba(0,0,0,0.08)`
- **Position**: Fixed/sticky di top
- **Logo**: Wordmark OMNU bold, warna merah atau kolaj foto kecil
- **Nav links**: Sentence case atau uppercase, 13px, warna `#1A1A2E`
- **Hover state**: Warna berubah ke merah (`#CC1A1A`), underline merah tipis
- **Active page**: Teks merah + underline merah
- **Button JOIN OUR MOVEMENT**: Background merah (`#CC1A1A`), teks putih, border-radius 6px

---

### 5.2 Hero Section — Slideshow

**Struktur:**
- **Background**: Slideshow full-viewport — foto/banner event dengan overlay gradient merah-gelap atau biru-gelap di sisi kiri/bawah
- **Konten kiri bawah**:
  - Label kecil uppercase biru: `——  GERAKAN KOMUNITI WP PUTRAJAYA`
  - Headline display besar, teks putih
  - Deskripsi singkat, teks putih/cream
- **Konten kanan bawah**:
  - Button `JOIN OUR MOVEMENT →` (solid merah, teks putih)
  - Button `KEGIATAN KAMI →` (outlined putih)
- **Indikator slide**: Dots merah di bawah, atau garis horizontal tipis
- **Auto-play**: 4–6 detik per slide, fade transition

---

### 5.3 "Siapa Kami" Section — Who We Are

**Background**: `#F5F7FA`

**Label**: `——  MENGENAI KAMI` (garis merah + teks uppercase kecil, warna merah)

**Badge**: `EST. [TAHUN] — WP PUTRAJAYA` dalam border kotak merah tipis, teks merah

**Struktur konten (2 kolom):**

Kiri (40%):
- Headline besar: "BERSAMA KITA **BERGERAK**, BERSAMA KITA MEMBINA" — **BERGERAK** = merah
- Body paragraf × 2 (misi & visi gerakan), teks `#1A1A2E`
- Button `JOIN OUR MOVEMENT →` solid merah
- Stats row di bawah — teks gelap, angka merah besar: `AHLI` | `KEGIATAN` | `PRESINT DILIPUTI`

Kanan (60%) — Image Grid:
- Foto besar aktiviti komuniti
- 2–3 overlay card kecil (background putih semi-transparan, teks gelap):
  - **GOTONG ROYONG** / KOMUNITI
  - **CERAMAH** / ILMU & INSPIRASI
  - **KESIHATAN** / PEDULI BERSAMA

---

### 5.4 "Aspirasi & Masukan" Section

**Background**: `#F0F6FF`

**Label**: `——  SUARA ANDA` (warna biru)

**Headline**: "ASPIRASI & **MASUKAN**" — "MASUKAN" = biru solid

**Form card** (background putih, border `#E0E4EF`, shadow ringan, border-radius 12px):
```
[Nama]
[No Kad Pengenalan]
[E-mel]
[No Telefon]
[Pesan — textarea maks 1500 karakter, ada counter]

[HANTAR ASPIRASI →]  ← CTA biru solid
```

- Label field: warna `#1A1A2E`, ukuran 13px
- Border input: `#C5CADB`, focus ring biru
- Counter karakter realtime di textarea
- Selepas submit: alert hijau inline "Aspirasi anda telah diterima!"

---

### 5.5 Gallery & Feed Section

**Background**: `#FFFFFF`

**Label**: `——  GALERI & AKTIVITI` (warna biru)

**Headline**: "GALERI & **AKTIVITI**" — "AKTIVITI" = biru solid

**Tab switcher** (pill tabs, active = merah):
```
[SEMUA]  [FOTO]  [TIKTOK]  [INSTAGRAM/FB]  [VIDEO]
```

**Grid masonry / 3 kolom**:
- Foto manual upload → lightbox saat diklik
- TikTok embed → buka di popup/lightbox
- Instagram/FB embed → preview + link
- Video YT → thumbnail + play button overlay merah

- Foto dikompres ke WebP otomatis
- Crop online saat upload (rasio 1:1 atau 4:3)

---

### 5.6 Events Section — "Kegiatan Kami"

**Background**: `#FFF5F5` (merah tint ringan)

**Label**: `——  ACARA KAMI` (warna merah)

**Headline**: "KEGIATAN & **ACARA**" — "ACARA" = biru solid

**Navigasi tab** (pill tabs, teks gelap, active = background merah / teks putih):
```
[🔴 SEDANG BERLANGSUNG]   [🟡 AKAN DATANG]   [LEPAS]
```

**Event Card** (background putih, shadow ringan, border-radius 10px, border-left 4px merah):
```
[Banner image, border-radius atas]
← badge kategori: "CERAMAH" background biru pojok kiri atas (teks putih)
← badge status: "BERLANGSUNG" background merah pojok kanan atas (teks putih)

[NAMA EVENT — bold besar, teks #1A1A2E]
[Deskripsi singkat, teks #555566]
[📅 Tarikh & Masa — teks biru]
[📍 Nama Tempat, Alamat — teks #555566]

[DAFTAR SEKARANG →]   [LIHAT SELENGKAPNYA →]
```

- Button DAFTAR: solid merah, teks putih
- Button LIHAT: outlined biru, teks biru
- **Klik banner/gambar** → popup preview ringkas
- **Klik judul / butang lain** → page detail event

**Warna badge kategori**:
- Ceramah → biru (`#1A3C9E`)
- Gotong royong → hijau (`#2E7D32`)
- Kesihatan → merah muda (`#C2185B`)
- Sukan → oranye (`#E65100`)
- Kemasyarakatan → ungu (`#6A1B9A`)

**Popup preview ringkas** (modal putih, shadow, border-radius 12px):
```
[Banner image kecil]
[Badge Kategori]  [Badge Status]
[NAMA EVENT — bold]
[📅 Tarikh & Masa]
[📍 Lokasi]
[Butang: LIHAT SELENGKAPNYA →]  ← biru
```

---

### 5.7 Past Events Section

**Background**: `#F5F7FA`

**Label**: `——  AKTIVITI LEPAS` (warna `#555566`)

**Layout**: Grid compact 3 kolom
- Card lebih kecil, tanpa CTA "Daftar"
- Badge status abu-abu: "SELESAI"
- Border-left 4px abu-abu
- Klik → page detail event (read-only)

---

### 5.8 Page Detail Event

**Background**: `#FFFFFF`

```
[Banner image full-width, tinggi ~400px]

[Badge Kategori — biru]  [Badge Status — merah/abu]

[NAMA EVENT — Display besar, teks #1A1A2E]
[📅 Tarikh & Masa — teks biru]
[📍 Nama Tempat — teks #555566]
[📍 Alamat penuh — teks #555566]

[Deskripsi lengkap — rich text]

--- BORANG PENDAFTARAN ---
[Card putih, border, shadow]
[No Kad Pengenalan]
[E-mel]
[E-mel sahkan]
[Cloudflare Turnstile CAPTCHA]
[Saya mengesahkan data ini benar — checkbox]
[DAFTAR SEKARANG →]  ← CTA merah solid
```

Selepas submit:
- Halaman konfirmasi hijau: "Pendaftaran berjaya! QR dikirim ke e-mel anda."
- QR code dikirim via e-mel
- Link "Hantar semula QR" jika tidak diterima

---

### 5.9 Form Pendaftaran Ahli — "Join Our Movement"

**Background**: `#FFF5F5` → form card putih

**Label**: `——  SERTAI GERAKAN` (warna merah)

**Headline**: "SERTAI **GERAKAN** KAMI" — **GERAKAN** = merah

**Card form** (background putih, border `#E0E4EF`, shadow, border-radius 12px):

**Data Peribadi** *(semua wajib)*:
```
[Nama Penuh]
[No Kad Pengenalan]
[Jenis KP — dropdown: MyKad / MyTentera / MyPolis]
[Tarikh Lahir]
[No Telefon]
[E-mel]
[E-mel (sahkan)]
[Alamat]
[Presint — dropdown]
[Negeri — WP Putrajaya (tetap, disabled)]
```

**Permohonan Bantuan** *(tick jika perlu)*:
- [ ] Katil hospital → expand field: nama pesakit, KP, telefon, alamat
- [ ] Bantuan makanan asas
- [ ] Wang tunai RM 300

**Lampiran**:
```
[Upload screenshot bukti daftar pemilih WP Putrajaya]
[Nota: "Fail JPG/PNG/PDF, maks 5MB"]
```

**Pengesahan**:
```
[Cloudflare Turnstile CAPTCHA]
[Saya mengesahkan data yang diisi adalah benar — checkbox]
[HANTAR PERMOHONAN →]  ← CTA merah solid, full-width
```

Nota bawah: `🔒 Data anda dilindungi selaras Akta PDPA 2010`

Selepas submit → halaman konfirmasi: "Data anda telah diterima. Terima kasih kerana menyertai gerakan kami!"

---

### 5.10 Page Pimpinan

**Background**: `#FFFFFF`

**Label**: `——  KEPIMPINAN KAMI` (warna merah)

**Headline**: "PIMPINAN **KAMI**" — "KAMI" = merah

**Grid**: 3–4 kolom, card per pemimpin (background putih, border, shadow ringan, border-radius 10px):
```
[Foto pimpinan — border-radius atas]
[NAMA PENUH — bold, teks #1A1A2E]
[Jawatan / Gelaran — uppercase kecil, warna merah]
[Ringkasan latar belakang — 2-3 baris, teks #555566]
[Butang: BACA LANJUT →]  ← biru outlined
```

- Klik "Baca Lanjut" → modal popup (background putih, backdrop blur)
- Isi modal: foto besar, nama, jawatan, latar belakang penuh (rich text), maklumat tambahan
- Diuruskan dari admin dashboard

---

### 5.11 Page Artikel

**Background**: `#F5F7FA`

**Label**: `——  ARTIKEL & BERITA` (warna merah)

**Headline**: "ARTIKEL & **BERITA**" — "BERITA" = merah

**CTA kanan**: `SEMUA ARTIKEL →` dalam border box merah, teks merah

**Layout listing**:
- Featured article kiri besar (1 artikel, image besar, judul display)
- Grid 3 kolom untuk artikel lain di kanan

**Article card** (background putih, border, shadow ringan):
```
[Gambar thumbnail — border-radius atas]
[Tag / Kategori — pill kecil, background biru ringan, teks biru]
[JUDUL ARTIKEL — bold, teks #1A1A2E]
[Nama penulis · Tarikh terbit — teks #9999AA kecil]
[Preview isi — 2 baris, teks #555566]
[BACA SELENGKAPNYA →]  ← teks merah
```

**Page detail artikel** (background putih):
- Full-width banner / gambar utama
- Judul besar (display), teks `#1A1A2E`
- Penulis + tarikh, teks abu
- Divider merah tipis
- Rich text content (H1/H2/H3, bold, italic, bullet, gambar inline, link biru)

---

### 5.12 Footer

**Background**: `#9E1212` (merah gelap), teks putih

**Layout 5 kolom:**

**Kolom 1 — Brand:**
- Logo OMNU (versi putih)
- Tagline: "Gerakan komuniti WP Putrajaya — bersama kita bergerak, bersama kita membina."
- Kontak: alamat, e-mel, telefon — teks putih/cream
- Social icons: Instagram, TikTok, Facebook, YouTube — ikon putih

**Kolom 2 — ORGANISASI:**
- Mengenai Kami, Sejarah, Pimpinan, Sertai Gerakan

**Kolom 3 — KEGIATAN:**
- Acara Akan Datang, Sedang Berlangsung, Aktiviti Lepas

**Kolom 4 — ARTIKEL:**
- Semua Artikel, Kategori, Penulis

**Kolom 5 — MAKLUMAT:**
- Aspirasi & Masukan, Hubungi Kami

**Watermark background**: Teks "OMNU" besar, putih sangat transparan (~5–8% opacity)

**Bottom bar** (background `#6B0000`, teks putih/cream):
- Kiri: `© 2026 OMNU — SEMUA HAK TERPELIHARA`
- Tengah: status "WP PUTRAJAYA" — dot hijau
- Kanan: `Dasar Privasi` | `Syarat Penggunaan` | `Notis PDPA` | `Kuki GDPR`

---

## 6. Interaction & Motion

| Elemen | Behavior |
|---|---|
| Hero slideshow | Auto-play 4–6s, fade transition, dot indicator merah |
| Section entrance | Fade-in + slide-up saat scroll ke viewport |
| Event tab | Switch instant, pill active merah |
| Event card hover | Shadow lebih tebal, border-left merah lebih terang |
| Event card klik gambar | Modal popup scale-in, backdrop blur |
| Form fields | Error state: border merah + teks error merah kecil di bawah field |
| CTA buttons | Hover: sedikit gelap (darken 10%), subtle scale |
| Nav hover | Teks berubah merah, underline merah slide-in |
| Gallery | Lightbox putih, close button merah |
| Stat numbers | Count-up animation saat masuk viewport |
| Pimpinan card | Hover: shadow naik; klik → modal fade-in |

---

## 7. Empty States / Placeholder

| Section | Pesan |
|---|---|
| Gallery | `TIADA MEDIA DIJUMPAI — Tambah gambar atau embed feed baharu` |
| Events (ongoing) | `TIADA ACARA SEDANG BERLANGSUNG BUAT MASA INI` |
| Events (upcoming) | `TIADA ACARA AKAN DATANG BUAT MASA INI` |
| Past Events | `TIADA REKOD AKTIVITI LEPAS` |
| Artikel | `TIADA ARTIKEL DITERBITKAN LAGI` |
| Pimpinan | `TIADA MAKLUMAT PIMPINAN DIJUMPAI` |

Styling: uppercase, tracking lebar, warna `#9999AA`, centered, border dashed `#E0E4EF`

---

## 8. UX Concerns

1. **PDPA & GDPR** — Banner kuki wajib saat pertama masuk; footer wajib ada Dasar Privasi dan Notis PDPA
2. **No Kad Pengenalan** — Field sensitif; nota "🔒 Data anda dilindungi" di bawah field; mask dalam listing admin (XXXXXXXX-XX-XXXX)
3. **Kontras teks** — Background putih + teks `#1A1A2E` memenuhi WCAG AA; semak juga teks putih di atas merah (pastikan merah cukup gelap ≥ 4.5:1)
4. **Mobile responsiveness** — Nav collapse jadi hamburger merah; card grid jadi 1 kolom di mobile; form stack vertical
5. **QR delivery** — E-mel QR mungkin masuk spam; sertakan fallback "Hantar semula QR" di halaman konfirmasi
6. **Foto upload** — Kompres otomatis ke WebP, batas 5MB per foto
7. **Rich text editor** — Preview wajib sebelum publish artikel dan bio pimpinan
8. **Contrast footer** — Teks putih di atas merah gelap `#9E1212` — semak contrast ratio (target ≥ 4.5:1)

---

## 9. Sitemap / Navigasi

```
Home (/)
├── Mengenai Kami → #who-we-are (section)
├── Kegiatan Kami (/kegiatan)
│   ├── Sedang Berlangsung
│   ├── Akan Datang
│   ├── Lepas
│   └── /kegiatan/[slug] — Detail Event + Form Daftar
├── Pimpinan (/pimpinan)
├── Artikel (/artikel)
│   └── /artikel/[slug] — Detail Artikel
└── Join Our Movement → /daftar (Form Ahli)

Inline sections (halaman utama):
├── Slideshow Hero
├── Siapa Kami + Statistik
├── Aspirasi & Masukan (Form)
├── Gallery & Feed
├── Events (ongoing + upcoming + past)
└── Footer
```

---

## 10. Admin Dashboard — Ringkasan Fungsi

**Login**: Email + password (background putih, logo OMNU merah)

### Data Ahli
- Listing semua ahli (tabel putih, baris alternating `#F5F7FA`)
- Filter: presint, kumpulan umur, jenis bantuan, tarikh permohonan
- Status bantuan per ahli (badge warna: hijau selesai / kuning dirancang / merah belum tindakan)
- Attach foto bukti untuk status "Selesai"
- Mask No KP dalam tampilan listing

### Pengurusan Konten
- **Gallery**: tambah foto, embed TikTok/Instagram/FB/YT, susun urutan, padam
- **Pimpinan**: tambah / edit / susun urutan / padam
- **Artikel**: tulis rich text, simpan draft, preview, publish, padam

### Pengurusan Event
- Tambah / edit / padam event
- Set status: Ongoing / Upcoming / Past
- Pilih kategori (dropdown + tambah kategori baru)
- Upload banner image
- Tambah peta lokasi

### Pengurusan Artikel
- Tulis / edit (rich text: H1/H2/H3, bold, italic, bullet, gambar, link)
- Status: Draft / Published
- Preview sebelum publish
- Set tarikh terbit manual atau auto

---

## 11. Aset & Teknologi (Cadangan)

| Aspek | Detail |
|---|---|
| Framework | **Next.js** (App Router) |
| CMS / Admin | **Payload CMS** atau **Strapi** (headless, self-hosted) |
| Animasi | **Framer Motion** (section reveal, count-up, modal) |
| Font | Bebas Neue / Anton (display) + Inter / DM Sans (body) via Google Fonts |
| Hosting | **Vercel** (frontend) + **Railway** atau **Render** (backend/CMS) |
| Image | WebP otomatis via **Sharp** (Next.js built-in) |
| Gallery embed | TikTok / Instagram oEmbed API |
| Captcha | **Cloudflare Turnstile** (gratis, GDPR-compliant) |
| E-mel QR | **Resend** atau **Nodemailer** + template HTML |
| PDF/QR gen | **qrcode** npm package |

---

*Dokumen ini adalah hasil merge design-blacksky.md + scope-omnu.md — direvisi ke tema Light Civic (Merah · Biru · Putih) untuk platform komuniti OMNU, WP Putrajaya — Jun 2026.*

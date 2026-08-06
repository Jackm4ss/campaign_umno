# Repository Guidelines

Laravel 13 campaign site for UMNO Putrajaya (**Tak Banyak Alasan**). PHP ^8.3, Laravel 13.x, Vite 8 + TypeScript + React 19 (Inertia v3), Filament 3 admin panel. UI copy and route slugs use Bahasa Melayu (`APP_LOCALE=ms`). Admin users are non-technical — keep admin forms minimal, labels/helper text in Malay.

Local runtime: `.env` uses a SQLite file DB (`database/database.sqlite`); `APP_URL=http://127.0.0.1:8765` must match the local server origin (media/upload URLs derive from `APP_URL` — a mismatch breaks Filament upload previews). Tests force SQLite `:memory:` (`phpunit.xml`). Tailwind CSS 4 sits in devDependencies but is not wired into `vite.config.ts`; styling is modular vanilla CSS with BEM-like classes.

**Windows PHP gotcha**: system PATH resolves PHP 8.2, but deps need `^8.3`. Prepend `C:\laragon\bin\php\php-8.3.30-nts-Win32-vs16-x64` to PATH before running `artisan test` / Pint (otherwise you get parse errors from typed class constants).

## Architecture

One Laravel app, one DB, two faces:

1. **Public site** — Inertia/React pages. All public controllers return `Inertia::render(...)`. Root view `resources/views/app.blade.php`; `HandleInertiaRequests` shares `auth`, `flash`, `ziggy`. Pages under `resources/js/Pages/**`, shared chrome in `resources/js/Layouts/PublicLayout.tsx`, shared types in `resources/js/types.ts` (tsconfig alias `@/*` → `resources/js/*`).
2. **Admin panel** — Filament 3 at `/admin` (`app/Providers/Filament/AdminPanelProvider.php`): resources Aspiration, CampaignEventContent, GalleryItem, Member, Program; `SetAdminLocale` middleware (panel runs in `en`). No database-notification bell.
   - **Dashboard = charts only**: `app/Filament/Widgets/` — `MembersTrendChartWidget`, `AspirationsTrendChartWidget` (line, weekly, 12 weeks) + `MembersSourcePieChartWidget`, `AspirationsSourcePieChartWidget` (pie, by `source`).
   - **Per-resource summary stats**: `app/Filament/Resources/*/Widgets/*StatsWidget`, wired via `getHeaderWidgets()` on each List page.
   - Member table columns: Nama (initials avatar via `resources/views/filament/tables/columns/initials-avatar.blade.php` ViewColumn), No. Telefon, Jenis Bantuan, Presint, Status Bantuan, Platform (source badge); View (full `infolist()`: gambar, jenis bantuan, pengesahan/voter proof, aid status) / Edit / Delete + bulk delete. Form includes `source` Select, `aidRequests` Repeater (patient fields only for `katil_hospital_kerusi_roda`), read-only photo/voter-proof previews from `public` disk.
   - Aspirations: same initials-avatar name column + Platform badge + source filter; `infolist()` for view.

Only `routes/web.php` (plus `console.php` and health `/up`). No `routes/api.php`. Guest/user redirects in `bootstrap/app.php` → `filament.admin.auth.login` / `filament.admin.pages.dashboard`.

### Request flow

- **Homepage**: `PublicHomeController` → `PublicHomeViewData::toArray()` → `Inertia::render('Home/Index')` with gallery (max 24, fully dynamic — no hardcoded fallback), programs, campaignEvents. "Jom Sertai" photo marquee (`Activities.tsx`) and `/galeri` both render from `gallery` props; marquee photos link to `/galeri`.
- **Detail pages**: `PublicProgramController` (`/program/{slug}`) and `PublicEventController` (`/acara/{slug}`) read `programs` / `campaign_event_contents` tables; slug regex `[a-z0-9\-]+`; detail images render full (no `object-fit` crop). Siblings ("Program lain"/"Acara lain") are news-style cards carrying `slug`, `title`, `image_url` (`thumb` conversion → legacy `image_path` → default asset). `lead` is RichEditor HTML and rendered via `dangerouslySetInnerHTML`.
- **Bantuan**: `PublicBantuanController` — `/bantuan`, `/bantuan/qr` pages, `/bantuan/qr-image` SVG QR (`simplesoftwareio/simple-qrcode`).
- **Gallery**: `PublicGalleryController` at `/galeri`.
- **Forms**: `PublicSubmissionController` — `POST /aspirasi`, `POST /daftar` (member + optional aid requests). Cloudflare Turnstile via `TurnstileValidator` (local bypass `TURNSTILE_BYPASS_LOCAL=true`). Validation is inline in the controller; `app/Http/Requests/Store*Request` exist but are unwired.
  - **Duplicate block**: existing `identity_number` + `identity_type` → 422 (message depends on `aid_status`: `diterima`/`selesai` → "sudah menerima bantuan"). Frontend shows server errors via SweetAlert (`sweetalert2` npm dep); success stays the inline success panel.
  - **Aid flow**: new members default `aid_status = belum_ada_tindakan` (manual admin approval).
  - **Source tracking**: hidden `source` input populated by `resources/js/lib/source.ts` (`utm_source` → `source` → `fbclid`/`gclid`/`ttclid`/`igshid`/`ytclid` → `direct`). `normalizeSource()` lowercases, allowlist `KNOWN_SOURCES`, unknown → `lain-lain`. Labels/colors for the pie charts live in `app/Support/SubmissionSources`.
  - Bantuan form collects email once (no confirmation field).
- **Legacy aliases**: `/login.html`, `/admin/login.html` → Filament login; `/panel-admin.html` → `/admin`. Hash fallback `/{page}` redirects `kegiatan|aspirasi|daftar|acara|program` to `/#section`, `bantuan` to `/bantuan`.

### Admin forms (built for non-technical admins)

Programs / Campaign Events / Gallery create+edit forms are deliberately minimal — do not re-add fields without asking:

- Only required core fields visible. The sections repeater + CTA fields ("Kandungan Tambahan") are **not exposed in forms at all** — Create pages store `sections => []` / `cta => []` (columns NOT NULL, store `[]` not `null`), edit pages strip them from saved data so stored values are untouched.
- Campaign Events: **Tarikh Acara** is a Filament `DatePicker` writing `starts_at` (date column); public `date_label` is auto-generated Malay format `j F Y` (e.g. "16 Ogos 2026") in Create/Edit pages — never typed by hand.
- **Slug never editable** — auto-generated from the title in `CreateProgram` / `CreateCampaignEventContent::mutateFormDataBeforeCreate` (unique suffix); edit pages strip `slug` before save.
- **`sort_order` never in forms** — ordering is drag-and-drop in the table (`reorderable('sort_order')`).
- **Uploads**: `SpatieMediaLibraryFileUpload` with `imageResizeTargetWidth('2560')` + `inside` + no upscale — any-resolution upload is auto-compressed on save; `imagePreviewHeight('160')`, `maxSize(10240)` KB. List tables show thumbnails with a legacy `image_path` asset fallback. Edit forms show a "Gambar Semasa" Placeholder when the record has `image_path` but no Spatie media yet (seeded records).

### Data layer

Models (thin Eloquent, `app/Models/`): Member + MemberAidRequest, Aspiration, Program, CampaignEventContent, GalleryItem, SiteSetting (legacy), User. `members`/`aspirations` carry `source`; `members.aid_status` defaults to `belum_ada_tindakan` (MySQL default via migration; SQLite relies on explicit set in controller/form). `campaign_event_contents` has `starts_at` (date, nullable) alongside display string `date_label`.

Program, CampaignEventContent, GalleryItem use Spatie packages:
- **MediaLibrary**: single-file collections `cover` / `banner` / `image`; conversions `webp` (nonQueued), `thumb`, `social`/`full`. Public read pattern: `getFirstMediaUrl($collection, 'webp')`, else legacy `image_path` asset, else curated default under `public/assets/` (see `PublicHomeViewData::mediaOrPath()`).
- **ActivityLog**: `logFillable()` + `logOnlyDirty()`.

Enums in `app/Enums/` (AidType, AidStatus, GalleryType, IdentityType). Member aid types: `keperluan_asas_dapur`, `wang_tunai`, `katil_hospital_kerusi_roda` (requires patient fields), `van_jenazah_percuma`, `kad_kesihatan_kunan`. Photo/voter-proof uploads → `public` disk (`member-photos`, `voter-proofs`).

Seeders: `DatabaseSeeder` calls `ProgramSeeder` + `CampaignEventContentSeeder` (source of homepage/detail content), creates default admin `admin@gmail.org.my` / `admin123` (local only, never production) and 4 gallery items.

Domain migrations: `2026_06_25_..._create_tak_banyak_alasan_tables` + `2026_07_28_..._update_member_aid_request_types` (SQLite best-effort remap) + `2026_08_06_*` (activity_log, media, notifications, programs, campaign_event_contents, indexes, `source` columns, aid_status default).

### Frontend assets (Vite)

`vite.config.ts` builds one entry: `resources/css/app.css` + `resources/js/app.tsx` (Inertia bootstrap). `app.css` imports `public/site.css`, which pulls modular CSS (base/layout/sections). React components reuse those BEM classes; do not add Tailwind utilities or new bundler entries without asking. `flatpickr` (date inputs) and `sweetalert2` (form error popups) are dependencies.

Runtime images live in `public/assets/`. Never hand-edit `public/build/`.

### Dead/legacy code (do not wire back in)

- Old Blade public/admin face: `resources/views/public/**`, `resources/views/admin/**`, `resources/views/layouts/**`, vanilla JS `resources/js/public/*.js`, `resources/js/admin/panel.js`, `resources/css/admin/panel.css`. No controller renders them.
- `app/Support/CampaignPrograms` / `CampaignEvents` static catalogs — replaced by the `programs` / `campaign_event_contents` tables; only referenced from dead Blade sections.
- `app/Data/*` (spatie/laravel-data) — currently unused.

`UI-Final/` and `scope/` are prototype/spec reference only.

## Project map

```
app/Http/Controllers/     Public* only (Filament handles admin)
app/Http/Middleware/      HandleInertiaRequests, SetAdminLocale
app/Filament/             Resources (+ Pages, per-resource Widgets), dashboard chart Widgets
app/Services/             PublicHomeViewData, TurnstileValidator
app/Support/              SubmissionSources (legacy: Campaign* catalogs)
app/Enums/                Backed enums for aid/gallery/identity
app/Models/               Thin Eloquent + MediaLibrary/ActivityLog traits
resources/js/Pages/       Inertia pages (Home, Gallery, Bantuan, Program, Event, Error)
resources/js/Layouts|Components/  Shared React chrome
resources/js/lib/         source.ts (traffic source detection)
resources/css/public/     Modular BEM CSS (variables in base.css)
resources/views/app.blade.php     Inertia root view
resources/views/filament/ Custom Filament Blade (member initials avatar)
database/migrations/      Laravel defaults + domain + package tables
database/seeders/         ProgramSeeder, CampaignEventContentSeeder
tests/Feature/            PHPUnit feature tests
routes/web.php            All HTTP routes
```

## Commands

```bash
composer run setup      # First-time: install, copy .env, key:generate, migrate, npm install --ignore-scripts, npm run build
composer run dev        # serve + queue:listen + pail + vite (concurrently)
npm run dev             # Vite only
npm run build           # Production assets
composer test           # config:clear + artisan test
php artisan test --filter=BantuanFormTest
php artisan test --filter=test_bantuan_page_renders
vendor/bin/pint         # Fix PHP style (PSR-12)
vendor/bin/pint --test  # Style check only
php artisan migrate
php artisan db:seed
php artisan storage:link
```

Use `composer install` / `npm ci` for routine installs — never `update` — to respect lockfiles. `.npmrc` sets `ignore-scripts=true`. On Windows, run artisan/Pint with the Laragon PHP 8.3 in PATH (see gotcha above).

Local: web root → `public/` (Laragon or similar) or `php artisan serve` on port 8765 to match `APP_URL`. Public `/` | Admin `/admin`.

### Env knobs that matter

| Variable | Role |
| --- | --- |
| `DB_*` | SQLite file locally; tests force SQLite `:memory:` |
| `APP_URL` | Must match the local server origin (media URLs, Filament uploads) |
| `TURNSTILE_SITE_KEY` / `TURNSTILE_SECRET_KEY` | Cloudflare Turnstile (config in `config/services.php`) |
| `TURNSTILE_BYPASS_LOCAL` | Skip Turnstile when local (`true` in `.env.example`) |
| `MAIL_*` | Registration/QR mail; set real SMTP for production |
| `QUEUE_CONNECTION` | `database` locally; run `queue:work` if jobs used |
| `OCTANE_*` | FrankenPHP Octane, production only; local uses `php artisan serve` |

### Production deploy sketch

```bash
composer install --no-dev --optimize-autoloader
npm ci
npm run build
php artisan migrate --force
php artisan storage:link
php artisan optimize
```

Set `APP_ENV=production`, `APP_DEBUG=false`, real Turnstile keys, `TURNSTILE_BYPASS_LOCAL=false`, SMTP, web root → `public/`. Writable: `storage/`, `bootstrap/cache/`. If queue is used: `php artisan queue:work --tries=3`.

## Coding conventions

- **PHP**: PSR-12 via Pint; new code uses `declare(strict_types=1)` + `final` classes. Controllers: `Public*` only; admin CRUD belongs in Filament resources.
- **Frontend**: React 19 function components, TypeScript strict; Inertia pages under `resources/js/Pages/**` resolved by name from controllers; style with existing BEM CSS.
- **Admin UX**: forms minimal for non-technical admins; Malay labels/helper text; no slug/sort_order inputs; sections/CTA not exposed in forms at all.
- **Routes**: Malay slugs (`/aspirasi`, `/daftar`, `/bantuan`, `/acara/...`, `/galeri`).
- **Tests**: PHPUnit 12 (not Pest), `test_snake_case` names, `RefreshDatabase`; seed specific seeders where content is needed. For Turnstile-protected endpoints, bind a fake `TurnstileValidator` in `setUp()` — see `tests/Feature/BantuanFormTest.php`.
- **Commits**: imperative, concise; mention route/section when relevant (e.g. "Fix /bantuan form validation").
- Do not commit `.env` or hand-edit lockfiles / `public/build/`. No Cursor/Copilot/CLAUDE rule files in this repo; source of truth: this file + `README.md`.

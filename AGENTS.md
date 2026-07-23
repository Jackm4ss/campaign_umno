# Tak Banyak Alasan — Agent Guide

Laravel 13 campaign website for UMNO Putrajaya. PHP 8.3.30, Laravel 13.17, Vite 8.1, Tailwind CSS 4.3, PHPUnit 12.5, MySQL/MariaDB. Full version matrix in `README.md`.

Public-facing copy is in Bahasa Melayu (`APP_LOCALE=ms`; route slugs: `/aspirasi`, `/daftar`, `/kegiatan/...`, `/bantuan`). Do not translate UI strings unless explicitly asked.

## Commands

```powershell
# First-time setup (copies .env, key:generate, migrate, npm install, npm run build)
composer run setup

# Install (respect lockfiles — never composer update / npm update in routine work)
composer install
npm ci

# Dev (all-in-one: serves PHP, queue, logs, Vite via concurrently)
composer run dev

# Vite only (if PHP already served elsewhere, e.g. Laragon)
npm run dev

# Build frontend
npm run build

# Run tests (via composer script — clears config first, recommended)
composer test

# Or directly
php artisan test

# Single test file / filter
php artisan test tests/Feature/BantuanFormTest.php
php artisan test --filter=test_bantuan_page_renders

# PHP lint (Pint)
vendor/bin/pint --test   # check only
vendor/bin/pint          # fix

# Migrations / seed / storage
php artisan migrate
php artisan migrate:fresh --seed
php artisan storage:link

# Serve only
php artisan serve
```

Tests use PHPUnit 12 (not Pest, though the Pest plugin is allowed in `composer.json`). Test files live in `tests/Feature` and `tests/Unit`. Tests run against SQLite in-memory (`DB_CONNECTION=sqlite`, `DB_DATABASE=:memory:`) — no MySQL needed. Turnstile is mocked in feature tests that hit forms (see `BantuanFormTest`).

In local env, Cloudflare Turnstile is bypassed when `TURNSTILE_BYPASS_LOCAL=true` in `.env`.

## Architecture

### Data flow

Admin panel is a client-driven CMS: JS reads/writes JSON blobs into `site_settings` via `AdminSyncController`.

- `GET /admin/sync` / `POST /admin/sync` — authenticated admin payload
- `GET /front-sync` — public subset (no auth)
- Allowed keys: `tbaCmsFrontpageData`, `tbaSettings`, `tbaAccountProfile`, `tbaAdminMembers`, `tbaAdminEvents`, `tbaAdminArticles`, `tbaAdminGallery`, `tbaAdminLeaders`
- Public keys omit `tbaAccountProfile`

`PublicHomeViewData` calls `AdminSyncController::publicPayload()`, trims lists (3 articles, 3 events, 4 leaders), and supplies image fallbacks. If no blob exists yet, `AdminSyncController` falls back to Eloquent queries on the matching models. `SiteSetting` casts `value` to `array` (JSON automatic).

### Controllers

- `PublicHomeController` — single-action homepage via `PublicHomeViewData`
- `PublicSubmissionController` — public form POSTs: aspirations, member registration (optional aid types → `MemberAidRequest`), event registration (QR token + email). All forms validated with Cloudflare Turnstile via `TurnstileValidator`
- `PublicBantuanController` — standalone aid-request page (`/bantuan`), QR landing page, on-demand QR image (uses `simplesoftwareio/simple-qrcode`)
- `AdminAuthController` — admin login/logout
- `AdminSyncController` — admin/public JSON sync + model fallbacks

### Views

```
resources/views/
  layouts/
    public.blade.php   # public site (Vite: site.css, site.js)
    admin.blade.php    # admin panel (Vite: panel.css, panel.js)
  public/
    home.blade.php     # @includes sections only
    bantuan.blade.php  # standalone aid form
    bantuan-qr.blade.php
    partials/          # navbar, footer, preloader
    sections/          # hero, about, activities, aspirations, leaders, articles, join
  admin/
    login.blade.php
    panel.blade.php
    views/             # overview, events, articles, members, content, settings, account
    partials/, modals/
```

### Frontend assets (Vite)

Six entry points in `vite.config.js`:
- `resources/css/app.css` + `resources/js/app.js` — base
- `resources/css/public/site.css` + `resources/js/public/site.js` — public site
- `resources/css/admin/panel.css` + `resources/js/admin/panel.js` — admin panel

Public CSS is modular: `site.css` imports `base.css`, `layout/*`, `sections/*`, `home.css`. Public JS: `site.js` bootstraps preloader, navigation, aspirations timeline, aspiration form, bantuan form, cookie consent. Font: Bunny Fonts "Instrument Sans". JS dependency of note: `flatpickr` (admin date/time).

### Models

`Article`, `Event`, `EventCategory`, `EventRegistration`, `Leader`, `GalleryItem`, `Member`, `MemberAidRequest`, `Aspiration`, `SiteSetting`, `User`.

Domain tables: one migration `2026_06_25_000000_create_tak_banyak_alasan_tables.php` (plus Laravel default users/cache/jobs migrations).

### Routes

| Method | Path | Purpose |
|--------|------|---------|
| GET | `/` | Homepage |
| GET | `/front-sync` | Public JSON payload |
| GET | `/bantuan` | Standalone aid form |
| GET | `/bantuan/qr`, `/bantuan/qr-image` | QR landing + SVG |
| GET/POST | `/admin/login` | Admin auth (guest) |
| GET | `/admin` | Admin panel (auth) |
| GET/POST | `/admin/sync` | CMS sync (auth) |
| POST | `/admin/logout` | Logout (auth) |
| POST | `/aspirasi`, `/daftar` | Aspiration + member signup |
| POST | `/kegiatan/daftar`, `/kegiatan/{slug}/daftar` | Event registration |
| GET | `/{page}` | Hash redirects for known slugs; `/bantuan` → route |

Legacy `.html` admin paths still exist for static-prototype compatibility.

### Key env vars

| Key | Purpose |
|-----|---------|
| `TURNSTILE_SITE_KEY` / `TURNSTILE_SECRET_KEY` | Cloudflare Turnstile |
| `TURNSTILE_BYPASS_LOCAL` | `true` skips bot check locally |
| `MAIL_*` | SMTP for event-registration QR email |
| `DB_*` | MySQL locally; tests override to SQLite in-memory |

### Notes

- `public/assets/` holds runtime images. `UI-Final/` is the design prototype; not served at runtime.
- `public/build/` is Vite output — never edit manually.
- Queue default in `.env.example` is `database`; `composer run dev` runs `queue:listen`.
- Event registration needs working `MAIL_*` and QR package for end-to-end success.
- Use `composer install` / `npm ci` (not `update`) to respect lockfiles.
- Default local admin (from `DatabaseSeeder`): `admin@gmail.org.my` / `admin123` — local only, not production.

# Repository Guidelines

Laravel 13 campaign website for UMNO Putrajaya (**Tak Banyak Alasan**). PHP 8.3, Vite 8, Tailwind CSS 4 (scaffold only), vanilla CSS/JS for public and admin frontends. UI copy and route slugs use Bahasa Melayu (`APP_LOCALE=ms`).

Local runtime expects MySQL. Tests use SQLite `:memory:` (`phpunit.xml`).

## Architecture

Two faces share one Laravel app and MySQL:

1. **Public site** — multi-section homepage, standalone pages (`/galeri`, `/bantuan`, `/bantuan/qr`), form POSTs. Blade layouts + section partials; modular CSS/JS via Vite.
2. **Admin panel** — authenticated SPA shell at `/admin` (`resources/js/admin/panel.js` + `resources/views/admin/`). Content sync via `AdminSyncController` JSON API over `site_settings` keys.

### Request flow

- **Homepage**: `PublicHomeController` → `PublicHomeViewData` → `AdminSyncController::publicPayload()` (settings + CMS-like keys) → `public.home` with section includes.
- **Forms**: `PublicSubmissionController` handles `POST /aspirasi`, `POST /daftar` (member + optional aid), and event registration (`POST /kegiatan/daftar`, `POST /kegiatan/{event:slug}/daftar`). Cloudflare Turnstile via `TurnstileValidator` (local bypass: `TURNSTILE_BYPASS_LOCAL=true`).
- **Bantuan**: `PublicBantuanController` serves `/bantuan`, `/bantuan/qr` (page), `/bantuan/qr-image` (SVG QR via `simplesoftwareio/simple-qrcode`). Member/aid form still posts to `/daftar`.
- **Gallery**: `PublicGalleryController` at `/galeri` (also absorbs legacy `/{page}` for `galeri` / `pimpinan`).
- **Admin content**: Panel reads/writes `/admin/sync`; public mirror at `/front-sync`. Keys allowlisted in `AdminSyncController`.
- **Legacy path aliases**: `/login.html`, `/panel-admin.html` still map to login/panel for prototype parity.
- **Hash routes**: `/{page}` for section names (`kegiatan`, `aspirasi`, …) redirects to `/#section` (or standalone routes where they exist).

### Admin sync keys

`AdminSyncController` allowlists:

| Key | Admin | Public mirror |
| --- | --- | --- |
| `tbaCmsFrontpageData` | yes | yes |
| `tbaSettings` | yes | yes |
| `tbaAccountProfile` | yes | no |
| `tbaAdminMembers` | yes | yes |
| `tbaAdminEvents` | yes | yes |
| `tbaAdminArticles` | yes | yes |
| `tbaAdminGallery` | yes | yes |
| `tbaAdminLeaders` | yes | yes |

When a key is missing in `site_settings`, payload falls back to Eloquent tables (`events`, `articles`, `members`, `gallery_items`, `leaders`). Homepage limits (via `PublicHomeViewData`): 3 articles, 3 events, 4 leaders; gallery up to 24 (or curated defaults under `public/assets/`).

### Domain data

Domain migrations:

- `database/migrations/2026_06_25_000000_create_tak_banyak_alasan_tables.php` — events, event categories/registrations, members, aid requests, aspirations, gallery, leaders, articles, `site_settings`
- `database/migrations/2026_07_28_000001_update_member_aid_request_types.php` — remaps aid type enum (MySQL `ALTER`; SQLite best-effort remaps)

Models are thin Eloquent mappers under `app/Models/`.

Member aid types (current): `keperluan_asas_dapur`, `wang_tunai`, `katil_hospital_kerusi_roda` (requires patient fields), `van_jenazah_percuma`, `kad_kesihatan_kunan`. Uploads for photo/voter proof go to `public` disk (`member-photos`, `voter-proofs`).

Seeder default admin (local only): `admin@gmail.org.my` / `admin123` from `DatabaseSeeder`. Never use in production.

### Frontend asset split (Vite)

`vite.config.js` inputs:

| Entry | Role |
| --- | --- |
| `resources/css/public/site.css` + `js/public/site.js` | Public site (`site.css` imports base/layout/sections; `site.js` boots preloader, nav, gallery, aspiration/bantuan forms, cookie consent) |
| `resources/css/admin/panel.css` + `js/admin/panel.js` | Admin client SPA |
| `resources/css/app.css` + `js/app.js` | Laravel defaults (minimal) |

Runtime images live in `public/assets/`. Do not serve from `UI-Final/` or edit `public/build/` by hand. Prototype/spec notes under `scope/` and `UI-Final/` are reference only.

## Project map

```
app/Http/Controllers/   Public* + Admin* (no separate API layer)
app/Services/           PublicHomeViewData, TurnstileValidator
app/Models/             Thin Eloquent mappers
resources/views/        layouts/, public/{sections,partials}, admin/
resources/css/public/   Modular CSS; variables in base.css
resources/js/public/    Modules bootstrapped by site.js
database/migrations/    Laravel defaults + domain migrations
tests/Feature/          PHPUnit feature tests (Turnstile faked in setUp)
```

## Commands

```bash
composer run setup      # First-time: install, key:generate, migrate, npm build
composer run dev        # serve + queue:listen + pail + vite (concurrently)
npm run dev             # Vite only
npm run build           # Production assets
composer test           # config:clear + artisan test
php artisan test
php artisan test --filter=test_bantuan_page_renders
php artisan test --filter=BantuanFormTest
vendor/bin/pint         # Fix PHP style (PSR-12)
vendor/bin/pint --test  # Style check only
php artisan migrate
php artisan db:seed
php artisan storage:link
```

Use `composer install` / `npm ci` — never `update` — to respect lockfiles.

Local with Laragon (or similar): MySQL from `.env.example`, document root → `public/`, or `php artisan serve`. Public: `/` | Admin: `/admin`.

### Env knobs that matter

| Variable | Role |
| --- | --- |
| `DB_*` | MySQL for local/prod; tests force SQLite `:memory:` |
| `TURNSTILE_SITE_KEY` / `TURNSTILE_SECRET_KEY` | Cloudflare Turnstile |
| `TURNSTILE_BYPASS_LOCAL` | Skip Turnstile when local (`true` in `.env.example`) |
| `MAIL_*` | Registration/QR mail; set real SMTP for production |
| `QUEUE_CONNECTION` | `database` locally; run `queue:work` if jobs used |

### Production deploy sketch

```bash
composer install --no-dev --optimize-autoloader
npm ci
npm run build
php artisan migrate --force
php artisan storage:link
php artisan optimize
```

Set `APP_ENV=production`, `APP_DEBUG=false`, real Turnstile keys, `TURNSTILE_BYPASS_LOCAL=false`, SMTP, and web root → `public/`. Writable: `storage/`, `bootstrap/cache/`.

## Coding conventions

- **PHP**: PSR-12 via Pint. Controllers: `Public*` (public), `Admin*` (auth).
- **Views**: `public/sections/*.blade.php` for homepage blocks; `public/partials/*` for shared chrome.
- **CSS**: Vanilla with BEM-like classes (`galeri-card--video`). No ESLint/Prettier/CSS linter — do not add without asking.
- **Routes**: Malay slugs (`/aspirasi`, `/daftar`, `/bantuan`, `/kegiatan/...`, `/galeri`).
- **Tests**: PHPUnit 12 (not Pest). Method names `test_snake_case`. For Turnstile-protected endpoints, bind a fake `TurnstileValidator` in `setUp()` — see `tests/Feature/BantuanFormTest.php`.
- **Commits**: imperative, concise; mention route/section when relevant (e.g. "Fix /bantuan form validation").
- Do not commit `.env` or hand-edit lockfiles / `public/build/`.

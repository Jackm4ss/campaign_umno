# Repository Guidelines

Laravel 13 campaign site for UMNO Putrajaya (**Tak Banyak Alasan**). PHP ^8.3, Vite 8, Tailwind CSS 4 (scaffold only via `@tailwindcss/vite`; public/admin UI is vanilla CSS/JS). UI copy and route slugs use Bahasa Melayu (`APP_LOCALE=ms`).

Local runtime expects MySQL (`tak_banyak_alasan` in `.env.example`). Tests force SQLite `:memory:` (`phpunit.xml`).

No Cursor/Copilot/CLAUDE rule files in this repo. Source of truth: this file + `README.md`.

## Architecture

One Laravel app, one MySQL DB, two faces:

1. **Public site** — multi-section homepage, standalone pages (`/galeri`, `/bantuan`, `/bantuan/qr`), form POSTs. Blade layouts + section partials; modular CSS/JS via Vite.
2. **Admin panel** — session-auth SPA shell at `/admin` (`resources/js/admin/panel.js` + `resources/views/admin/`). Content sync is a JSON key/value API over `site_settings` (`AdminSyncController`).

Only `routes/web.php` (plus `console.php` and health `/up`). No `routes/api.php`. Guest/auth redirects set in `bootstrap/app.php` → `admin.login` / `admin.dashboard`.

### Request flow

- **Homepage**: `PublicHomeController` → `PublicHomeViewData` → `AdminSyncController::publicPayload()` → `public.home` with section includes.
- **Forms**: `PublicSubmissionController` — `POST /aspirasi`, `POST /daftar` (member + optional aid), `POST /kegiatan/daftar`, `POST /kegiatan/{event:slug}/daftar`. Cloudflare Turnstile via `TurnstileValidator` (local bypass: `TURNSTILE_BYPASS_LOCAL=true`).
- **Bantuan**: `PublicBantuanController` — `/bantuan`, `/bantuan/qr` (page), `/bantuan/qr-image` (SVG QR via `simplesoftwareio/simple-qrcode`). Member/aid form still posts to `/daftar`.
- **Gallery**: `PublicGalleryController` at `/galeri` (also absorbs legacy `/{page}` for `galeri` / `pimpinan`).
- **Programs**: `PublicProgramController` — `/program/{slug}` detail pages. Slugs constrained to `CampaignPrograms::slugs()`.
- **Events (detail)**: `PublicEventController` — `/acara/{slug}` detail pages. Slugs constrained to `CampaignEvents::slugs()`.
- **Admin content**: auth reads/writes `/admin/sync`; public mirror at `/front-sync`. Keys allowlisted in `AdminSyncController`.
- **Legacy path aliases**: `/login.html`, `/panel-admin.html` map to login/panel for prototype parity.
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

Missing `site_settings` keys fall back to Eloquent (`events`, `articles`, `members`, `gallery_items`, `leaders`). Homepage limits (`PublicHomeViewData`): 3 articles, 3 events, 4 leaders; gallery up to 24 (else curated defaults under `public/assets/`).

### Domain data

Domain migrations:

- `database/migrations/2026_06_25_000000_create_tak_banyak_alasan_tables.php` — events, event categories/registrations, members, aid requests, aspirations, gallery, leaders, articles, `site_settings`
- `database/migrations/2026_07_28_000001_update_member_aid_request_types.php` — remaps aid type enum (MySQL `ALTER`; SQLite best-effort remaps)

Models are thin Eloquent mappers under `app/Models/`.

### Static content catalogs

`app/Support/CampaignPrograms` and `app/Support/CampaignEvents` hold hardcoded arrays of program/event data (slug, title, description, image, sections, CTAs). These power the homepage marquee/cards and `/program/{slug}` + `/acara/{slug}` detail pages. Route constraints use their `::slugs()` methods.

Member aid types: `keperluan_asas_dapur`, `wang_tunai`, `katil_hospital_kerusi_roda` (requires patient fields), `van_jenazah_percuma`, `kad_kesihatan_kunan`. Photo/voter-proof uploads → `public` disk (`member-photos`, `voter-proofs`).

Seeder default admin (local only): `admin@gmail.org.my` / `admin123` from `DatabaseSeeder`. Never use in production.

### Frontend asset split (Vite)

`vite.config.js` inputs:

| Entry | Role |
| --- | --- |
| `resources/css/public/site.css` + `js/public/site.js` | Public site (`site.css` imports base/layout/sections; `site.js` boots preloader, nav, gallery, aspiration/bantuan forms, cookie consent) |
| `resources/css/admin/panel.css` + `js/admin/panel.js` | Admin client SPA |
| `resources/css/app.css` + `js/app.js` | Laravel defaults (minimal) |

Runtime images live in `public/assets/`. Do not serve from `UI-Final/` or edit `public/build/` by hand. Prototype/spec notes under `scope/` and `UI-Final/` are reference only. Public forms use `flatpickr` (npm dependency).

## Project map

```
app/Http/Controllers/     Public* + Admin* (no separate API layer)
app/Services/             PublicHomeViewData, TurnstileValidator
app/Support/              CampaignEvents, CampaignPrograms (static content catalogs)
app/Models/               Thin Eloquent mappers
resources/views/layouts/  public.blade.php, admin.blade.php
resources/views/public/   pages + sections/ + partials/
resources/views/admin/    panel shell, login, views/* (SPA sections), partials/, modals/
resources/css/public/     Modular CSS; variables in base.css
resources/js/public/      Modules bootstrapped by site.js
resources/js/admin/       panel.js (single SPA entry)
database/migrations/      Laravel defaults + domain migrations
tests/Feature/            PHPUnit feature tests (Turnstile faked in setUp)
routes/web.php            All HTTP routes
```

## Commands

```bash
composer run setup      # First-time: install, key:generate, migrate, npm install --ignore-scripts, npm run build
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

Use `composer install` / `npm ci` for routine installs — never `update` — to respect lockfiles. (`composer run setup` uses `npm install --ignore-scripts` once; prefer `npm ci` afterward.)

Local with Laragon (or similar): MySQL from `.env.example`, document root → `public/`, or `php artisan serve`. Public: `/` | Admin: `/admin`.

### Env knobs that matter

| Variable | Role |
| --- | --- |
| `DB_*` | MySQL for local/prod; tests force SQLite `:memory:` |
| `TURNSTILE_SITE_KEY` / `TURNSTILE_SECRET_KEY` | Cloudflare Turnstile |
| `TURNSTILE_BYPASS_LOCAL` | Skip Turnstile when local (`true` in `.env.example`) |
| `MAIL_*` | Registration/QR mail; set real SMTP for production |
| `QUEUE_CONNECTION` | `database` locally; run `queue:work` if jobs used |

Config for Turnstile lives under `config/services.php`.

### Production deploy sketch

```bash
composer install --no-dev --optimize-autoloader
npm ci
npm run build
php artisan migrate --force
php artisan storage:link
php artisan optimize
```

Set `APP_ENV=production`, `APP_DEBUG=false`, real Turnstile keys, `TURNSTILE_BYPASS_LOCAL=false`, SMTP, and web root → `public/`. Writable: `storage/`, `bootstrap/cache/`. If queue is used: `php artisan queue:work --tries=3`.

## Coding conventions

- **PHP**: PSR-12 via Pint. Controllers: `Public*` (public), `Admin*` (auth).
- **Views**: `public/sections/*.blade.php` for homepage blocks; `public/partials/*` for shared chrome; admin SPA sections under `admin/views/`.
- **CSS**: Vanilla with BEM-like classes (`galeri-card--video`). No ESLint/Prettier/CSS linter — do not add without asking.
- **Routes**: Malay slugs (`/aspirasi`, `/daftar`, `/bantuan`, `/kegiatan/...`, `/galeri`).
- **Tests**: PHPUnit 12 (not Pest). Method names `test_snake_case`. For Turnstile-protected endpoints, bind a fake `TurnstileValidator` in `setUp()` — see `tests/Feature/BantuanFormTest.php`.
- **Commits**: imperative, concise; mention route/section when relevant (e.g. "Fix /bantuan form validation").
- Do not commit `.env` or hand-edit lockfiles / `public/build/`.

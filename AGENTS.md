# Tak Banyak Alasan — Agent Guide

Laravel 13 campaign website for UMNO Putrajaya. PHP 8.3.30, Laravel 13.17, Vite 8.1, Tailwind CSS 4.3, PHPUnit 12.5, MySQL/MariaDB. Full version matrix in `README.md`.

This file is the shared agent guide (CodeBuddy Code, Claude Code, etc.). Do not create a separate CODEBUDDY.md.

Public-facing copy is in Bahasa Melayu (`APP_LOCALE=ms`; route slugs: `/aspirasi`, `/daftar`, `/kegiatan/...`, `/bantuan`). Do not translate UI strings unless explicitly asked.

## Commands

Commands below are shell-agnostic; on Windows use Git Bash (default shell).

### Setup
```bash
# First-time setup (composer.json scripts.setup, in order):
#   composer install
#   copy .env.example → .env (if missing)
#   php artisan key:generate
#   php artisan migrate --force        # note: --force runs even in non-local envs
#   npm install --ignore-scripts       # note: skips postinstall scripts
#   npm run build
composer run setup

# Respect lockfiles — never composer update / npm update in routine work
composer install
npm ci
```

### Dev
```bash
# All-in-one via concurrently: artisan serve + queue:listen + pail (logs) + npm run dev
composer run dev

# Vite only (if PHP is served elsewhere, e.g. Laragon)
npm run dev

# Serve PHP only
php artisan serve
```

### Test
```bash
# composer script: runs `artisan config:clear` then `artisan test`.
# @no_additional_args on config:clear means any extra args flow into artisan test:
composer test -- --filter=test_bantuan_page_renders

# Or directly
php artisan test
php artisan test tests/Feature/BantuanFormTest.php
php artisan test --filter=test_bantuan_page_renders
```

### Lint / format
```bash
# PHP (Pint)
vendor/bin/pint --test   # check only
vendor/bin/pint          # fix
```
No JS/CSS linter or formatter is configured (no ESLint, Prettier, Biome, or Stylelint config in the repo). Do not add one without asking.

### Build / DB
```bash
npm run build

php artisan migrate
php artisan migrate:fresh --seed
php artisan storage:link
```

Tests use PHPUnit 12 (`phpunit/phpunit ^12.5.12`). The `pestphp/pest-plugin: true` entry in `composer.json` `allow-plugins` is a Composer plugin allowance only — Pest is not installed. Test files live in `tests/Feature` and `tests/Unit`. Tests run against SQLite in-memory (`DB_CONNECTION=sqlite`, `DB_DATABASE=:memory:`) — no MySQL needed. Feature tests that hit forms bind a fake `TurnstileValidator` in `setUp()` so POSTs bypass the real Cloudflare check — see `tests/Feature/BantuanFormTest.php:14-24` for the canonical pattern; copy it when adding a new form test.

In local env, Cloudflare Turnstile is bypassed when `TURNSTILE_BYPASS_LOCAL=true` in `.env`.

## Architecture

### Data flow

Admin panel is a client-driven CMS: JS reads/writes JSON blobs into `site_settings` via `AdminSyncController`.

- `GET /admin/sync` / `POST /admin/sync` — authenticated admin payload
- `GET /front-sync` — public subset (no auth)
- Allowed keys: `tbaCmsFrontpageData`, `tbaSettings`, `tbaAccountProfile`, `tbaAdminMembers`, `tbaAdminEvents`, `tbaAdminArticles`, `tbaAdminGallery`, `tbaAdminLeaders`
- Public keys omit `tbaAccountProfile`

`PublicHomeViewData` calls `AdminSyncController::publicPayload()`, trims lists (3 articles, 3 events, 4 leaders, 24 gallery items), and supplies image fallbacks. Gallery items come from `tbaAdminGallery` (mapped into `media`/`kegiatan`/`komuniti`/`kepimpinan` categories with title/caption/label), or a curated 24-item default list when no blob exists. If no blob exists yet, `AdminSyncController` falls back to Eloquent queries on the matching models. `SiteSetting` casts `value` to `array` (JSON automatic).

### Controllers

- `PublicHomeController` — single-action homepage via `PublicHomeViewData`
- `PublicSubmissionController` — public form POSTs: aspirations, member registration (optional aid types → `MemberAidRequest`), event registration (QR token + email). All forms validated with Cloudflare Turnstile via `TurnstileValidator`
- `PublicBantuanController` — standalone aid-request page (`/bantuan`), QR landing page, on-demand QR image (uses `simplesoftwareio/simple-qrcode ^4.2`)
- `PublicGalleryController` — single-action standalone gallery page (`/galeri`) via `PublicHomeViewData`
- `AdminAuthController` — admin login/logout
- `AdminSyncController` — admin/public JSON sync + model fallbacks

### Views

```
resources/views/
  layouts/
    public.blade.php   # public site (Vite: site.css, site.js)
    admin.blade.php    # admin panel (Vite: panel.css, panel.js)
  public/
    home.blade.php     # @includes sections only (hero, about, activities, aspirations, articles, join)
    gallery.blade.php  # standalone /galeri page (@includes public.sections.gallery)
    bantuan.blade.php  # standalone aid form
    bantuan-qr.blade.php
    partials/          # navbar, footer, preloader
    sections/          # hero, about, activities, aspirations, leaders, articles, gallery, join
  admin/
    login.blade.php
    panel.blade.php
    views/             # overview, events, articles, members, content, settings, account
    partials/, modals/
```

Note: `public/sections/leaders.blade.php` exists but is **not** `@include`d by `home.blade.php`; leaders data still flows via `PublicHomeViewData` for reuse on the gallery page and elsewhere.

### Frontend assets (Vite)

Six entry points in `vite.config.js`:
- `resources/css/app.css` + `resources/js/app.js` — base
- `resources/css/public/site.css` + `resources/js/public/site.js` — public site
- `resources/css/admin/panel.css` + `resources/js/admin/panel.js` — admin panel

Public CSS is modular: `site.css` imports `base.css`, `layout/*`, `sections/*`, `home.css`. Public JS: `site.js` bootstraps preloader, navigation, aspirations timeline, aspiration form, bantuan form, cookie consent. Font: Bunny Fonts "Instrument Sans" (weights 400/500/600) via `laravel-vite-plugin/fonts`. `vite.config.js` also ignores `storage/framework/views/**` in the dev watcher. JS dependency of note: `flatpickr ^4.6.13` (admin date/time).

### Models

`Article`, `Event`, `EventCategory`, `EventRegistration`, `Leader`, `GalleryItem`, `Member`, `MemberAidRequest`, `Aspiration`, `SiteSetting`, `User`.

Domain tables: one migration `2026_06_25_000000_create_tak_banyak_alasan_tables.php` (plus Laravel default users/cache/jobs migrations).

### Routes

| Method | Path | Purpose |
|--------|------|---------|
| GET | `/` | Homepage |
| GET | `/front-sync` | Public JSON payload |
| GET | `/galeri` | Standalone gallery page (`gallery.index`) |
| GET | `/bantuan` | Standalone aid form |
| GET | `/bantuan/qr`, `/bantuan/qr-image` | QR landing + SVG |
| GET/POST | `/admin/login` | Admin auth (guest) |
| GET | `/admin/umno-logo.jpg`, `/admin/assets/{path}` | Static asset passthrough for legacy `.html` admin prototype (`routes/web.php:27-33`) |
| GET | `/admin` | Admin panel (auth) |
| GET/POST | `/admin/sync` | CMS sync (auth) |
| POST | `/admin/logout` | Logout (auth) |
| POST | `/aspirasi`, `/daftar` | Aspiration + member signup |
| POST | `/kegiatan/daftar`, `/kegiatan/{event:slug}/daftar` | Event registration (standalone + by slug) |
| GET | `/{page}` | Catch-all (`routes/web.php:50-62`): whitelist `kegiatan\|pimpinan\|galeri\|artikel\|aspirasi\|daftar\|bantuan`. `bantuan` → `bantuan.index`; `galeri` or `pimpinan` → `gallery.index`; others → `redirect('/#'.$page)`. Anything else → 404. Regex constraint `[A-Za-z0-9\-]+`. |

Legacy `.html` admin paths (`/login.html`, `/admin/login.html`, `/panel-admin.html`, `/admin/panel-admin.html`) still exist for static-prototype compatibility — see `routes/web.php:21-22,37-38`. Do not add new routes whose top-level segment collides with the catch-all whitelist without updating both.

### Key env vars

| Key | Purpose |
|-----|---------|
| `TURNSTILE_SITE_KEY` / `TURNSTILE_SECRET_KEY` | Cloudflare Turnstile |
| `TURNSTILE_BYPASS_LOCAL` | `true` skips bot check locally |
| `MAIL_*` | SMTP for event-registration QR email |
| `DB_*` | MySQL locally; tests override to SQLite in-memory |

### Notes

- `public/assets/` holds runtime images. `UI-Final/` is the design prototype; not served at runtime. `scope/` at project root holds design scope notes (`scope_omnu.md`, `finalui-omnu.md`); not runtime code.
- `public/build/` is Vite output — never edit manually.
- Queue default in `.env.example` is `database`; `composer run dev` runs `queue:listen`.
- Event registration needs working `MAIL_*` and QR package for end-to-end success.
- Use `composer install` / `npm ci` (not `update`) to respect lockfiles.
- Default local admin (from `DatabaseSeeder`): `admin@gmail.org.my` / `admin123` — local only, not production.

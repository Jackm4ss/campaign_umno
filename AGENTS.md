# Repository Guidelines

Laravel 13 campaign website for UMNO Putrajaya (**Tak Banyak Alasan**). PHP 8.3, Vite 8, Tailwind CSS 4 (scaffold only), vanilla CSS/JS for public and admin frontends. UI copy and route slugs use Bahasa Melayu (`APP_LOCALE=ms`).

Local runtime expects MySQL. Tests use SQLite `:memory:` (see `phpunit.xml`).

## Architecture

Two faces share one Laravel app and MySQL:

1. **Public site** — multi-section homepage, standalone pages (`/galeri`, `/bantuan`), form POSTs. Blade layouts + section partials; modular CSS/JS built by Vite.
2. **Admin panel** — authenticated SPA shell at `/admin` (`resources/js/admin/panel.js` + `resources/views/admin/`). Content sync via `AdminSyncController` JSON API over `site_settings` keys (`tbaAdminEvents`, `tbaAdminArticles`, etc.).

### Request flow

- **Homepage**: `PublicHomeController` → `PublicHomeViewData` → reads `AdminSyncController::publicPayload()` (settings + CMS-like keys) → `public.home` with section includes.
- **Forms**: `PublicSubmissionController` handles `POST /aspirasi`, `POST /daftar` (member + optional aid), and event registration. Cloudflare Turnstile via `TurnstileValidator` (local bypass: `TURNSTILE_BYPASS_LOCAL=true`).
- **Admin content**: Panel reads/writes `/admin/sync`; public mirror at `/front-sync`. Keys allowlisted in `AdminSyncController`.
- **Legacy path aliases**: `/login.html`, `/panel-admin.html` still map to login/panel for prototype parity.
- **Hash routes**: `/{page}` for section names (`kegiatan`, `aspirasi`, …) redirects to `/#section` (or standalone routes where they exist).

### Domain data

Single domain migration: `database/migrations/2026_06_25_000000_create_tak_banyak_alasan_tables.php` — events, registrations, members, aid requests, aspirations, gallery, leaders, articles, `site_settings`. Models are thin Eloquent mappers under `app/Models/`.

Seeder default admin (local only): `admin@gmail.org.my` / `admin123` from `DatabaseSeeder`.

### Frontend asset split (Vite)

`vite.config.js` inputs:

| Entry | Role |
| --- | --- |
| `resources/css/public/site.css` + `js/public/site.js` | Public site (site.css imports base/layout/sections) |
| `resources/css/admin/panel.css` + `js/admin/panel.js` | Admin client SPA |
| `resources/css/app.css` + `js/app.js` | Laravel defaults (minimal) |

Runtime images live in `public/assets/`. Do not serve from `UI-Final/` or edit `public/build/` by hand.

## Project map

```
app/Http/Controllers/   Public* + Admin* (no separate API layer)
app/Services/           PublicHomeViewData, TurnstileValidator
resources/views/        layouts/, public/{sections,partials}, admin/
resources/css/public/   Modular CSS; variables in base.css
resources/js/public/    Modules bootstrapped by site.js
database/migrations/    Laravel defaults + one domain migration
tests/Feature/          PHPUnit feature tests
```

## Commands

```bash
composer run setup      # First-time: install, key:generate, migrate, npm build
composer run dev        # serve + queue:listen + pail + vite (concurrently)
npm run dev             # Vite only
npm run build           # Production assets
composer test           # config:clear + artisan test
php artisan test --filter=test_bantuan_page_renders
vendor/bin/pint         # Fix PHP style (PSR-12)
vendor/bin/pint --test  # Style check only
php artisan migrate
php artisan db:seed
php artisan storage:link
```

Use `composer install` / `npm ci` — never `update` — to respect lockfiles.

Local with Laragon (or similar): MySQL from `.env.example`, document root → `public/`, or `php artisan serve`. Deploy sketch and env notes live in `README.md`.

## Coding conventions

- **PHP**: PSR-12 via Pint. Controllers: `Public*` (public), `Admin*` (auth).
- **Views**: `public/sections/*.blade.php` for homepage blocks; `public/partials/*` for shared chrome.
- **CSS**: Vanilla with BEM-like classes (`galeri-card--video`). No ESLint/Prettier/CSS linter — do not add without asking.
- **Routes**: Malay slugs (`/aspirasi`, `/daftar`, `/bantuan`, `/kegiatan/...`).
- **Tests**: PHPUnit 12 (not Pest). Method names `test_snake_case`. For Turnstile-protected endpoints, bind a fake `TurnstileValidator` in `setUp()` — see `tests/Feature/BantuanFormTest.php`.
- **Commits**: imperative, concise; mention route/section when relevant (e.g. "Fix /bantuan form validation").
- Do not commit `.env` or hand-edit lockfiles / `public/build/`.

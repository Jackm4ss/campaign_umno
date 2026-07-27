# Repository Guidelines

Laravel 13 campaign website for UMNO Putrajaya. PHP 8.3, Vite 8, Tailwind CSS 4 (scaffold only), vanilla CSS/JS for public and admin frontends.

## Project Structure

```
app/Http/Controllers/   # 7 controllers (Public*, Admin*)
app/Models/             # 11 Eloquent models
app/Services/           # PublicHomeViewData, TurnstileValidator
resources/views/        # Blade: layouts/, public/, admin/
resources/css/public/   # Modular CSS (site.css imports base, sections, layout)
resources/js/public/    # 8 JS modules bootstrapped by site.js
resources/css/admin/    # panel.css (single file)
resources/js/admin/     # panel.js (single file, client-side SPA)
database/migrations/    # 1 domain migration + 3 Laravel defaults
tests/Feature/          # PHPUnit feature tests
public/assets/          # Runtime images
```

## Build, Test & Development Commands

```bash
composer run setup      # First-time: install, key:generate, migrate, npm build
composer run dev        # Serve + queue + logs + vite (concurrently)
npm run dev             # Vite dev server only
composer test           # Clear config + run artisan test
php artisan test --filter=test_bantuan_page_renders  # Single test
vendor/bin/pint         # Fix PHP code style
vendor/bin/pint --test  # Check only
```

Use `composer install` / `npm ci` — never `update` — to respect lockfiles.

## Coding Style & Naming

- **PHP**: PSR-12 via Laravel Pint. No JS/CSS linter configured.
- **Controllers**: `Public*Controller` (public-facing), `Admin*Controller` (authenticated).
- **Views**: `public/sections/*.blade.php` for homepage sections, `public/partials/*` for reusable fragments.
- **CSS**: Vanilla CSS with BEM-like classes (`galeri-card--video`, `about-media-photo`). Variables in `base.css`.
- **Routes**: Bahasa Melayu slugs (`/aspirasi`, `/daftar`, `/bantuan`, `/kegiatan`).
- **Locale**: `APP_LOCALE=ms`. UI copy in Bahasa Melayu.

## Testing Guidelines

- **Framework**: PHPUnit 12.5 (Pest is not installed).
- **DB**: SQLite `:memory:` (set in `phpunit.xml`).
- **Turnstile bypass**: Bind a fake `TurnstileValidator` in `setUp()` — see `BantuanFormTest.php:14-24` for the canonical pattern.
- **Naming**: `test_snake_case_description` method names.

## Commit & Pull Request Guidelines

- Commit messages: imperative mood, concise subject line.
- Reference related route or section (e.g., "Fix /bantuan form validation").
- Do not add ESLint, Prettier, or any JS/CSS linter without asking.
- Do not edit `public/build/` (Vite output) or lockfiles manually.

# Repository Guidelines

## Project Overview

Laravel 13 campaign website for **UMNO Bahagian Putrajaya**, branded *"Tak Banyak Alasan"* (takbanyakalasan.com). One app, one database, two faces: a public Inertia/React site and a Filament 3 admin panel.

`APP_LOCALE=ms` — route slugs, enum values, UI copy, and validation messages are **Bahasa Melayu**. Admin users are non-technical: keep admin forms minimal with Malay labels and helper text.

Live modules: Ahli/Members (+ aid requests), Aspirasi, Program, Acara (campaign events), Galeri, Bantuan (+ QR). `Pimpinan` and `Artikel` are spec-only — orphan `leaders`/`articles` tables exist with no model or controller.

**Glossary** (appears verbatim in identifiers): `bantuan`=aid, `ahli`=member, `aspirasi`=citizen feedback, `acara`/`kegiatan`=event, `galeri`=gallery, `daftar`=register, `pimpinan`=leadership, `presint`=precinct, `No. KP`/`identity_number`=national ID. Aid types: `keperluan_asas_dapur` (kitchen basics), `wang_tunai` (cash), `katil_hospital_kerusi_roda` (hospital bed/wheelchair — the **only** type with patient fields), `van_jenazah_percuma` (hearse), `kad_kesihatan_kunan`. Aid statuses: `belum_ada_tindakan` (default) → `sedang_dirancang` → `diterima` → `selesai`.

## Architecture & Data Flow

### Surface 1 — Public site (Inertia + React 19)

```
routes/web.php → thin Public*Controller → (ViewData builder) → assoc array
  → Inertia::render('Dir/Page') → resources/js/Pages/Dir/Page.tsx
```

- Root Blade shell: `resources/views/app.blade.php` (the only live Blade view).
- `HandleInertiaRequests` shares `auth`, `flash`, `baseUrl`, `ziggy`; appended to the `web` group in `bootstrap/app.php` (so it does **not** apply to Filament).
- Homepage: `PublicHomeController` → `PublicHomeViewData::toArray()` → `Home/Index` with `gallery` (max 24), `programs`, `campaignEvents`.
- Detail pages: `/program/{slug}` and `/acara/{slug}`, slug regex `[a-z0-9\-]+`. `lead` is RichEditor HTML rendered via `dangerouslySetInnerHTML`.
- **Two subdomain route groups** (`routes/web.php:13-26`): `aspirasi.takbanyakalasan.com` and `bantuan.takbanyakalasan.com`, each with `/`, `/qr`, `/qr-image`, plus a POST endpoint duplicating the main-domain one.
- A greedy catch-all `/{page}` is registered **last** (`routes/web.php:62`). Any new top-level route added after it is shadowed.

### Surface 2 — Filament admin

`/admin`, configured entirely in `app/Providers/Filament/AdminPanelProvider.php` (no config file). Resources auto-discovered: Aspiration, CampaignEventContent, GalleryItem, Member, Program. Each owns `Pages/` (List/Create/Edit) + a `*StatsWidget` wired via `getHeaderWidgets()`; `app/Filament/Widgets/` holds the four dashboard charts (charts only, no CRUD widgets). Panel runs in `en` via `SetAdminLocale`; brand `#CC1A1A`.

### Form submissions — the important deviation

`POST /aspirasi` and `POST /daftar` (`PublicSubmissionController`) are **not** Inertia visits. The React pages submit with raw `fetch()` + `FormData` + an `X-CSRF-TOKEN` meta header and consume a JSON response (`resources/js/Pages/Bantuan/Index.tsx:170`). 422 errors surface through **SweetAlert2**; success flips an inline success panel. Do not "fix" this into `useForm` — the skill docs describe `useForm` aspirationally, the code does not use it.

**Core business rules — preserve in any refactor:**
- **Duplicate block**: existing `identity_number` + `identity_type` → 422. The message differs when `aid_status` is `diterima`/`selesai` ("sudah menerima bantuan").
- **Aid flow**: new members default to `aid_status = belum_ada_tindakan` (manual admin approval).
- **Source tracking**: hidden `source` input fed by `resources/js/lib/source.ts` (`utm_source` → `source` → `fbclid`/`gclid`/`ttclid`/`igshid`/`ytclid` → `direct`); `normalizeSource()` lowercases against an allowlist, unknown → `lain-lain`.

### Media fallback chain

Canonical in `PublicHomeViewData::mediaOrPath()` — **reuse it, never reimplement**:
`getFirstMediaUrl($collection, 'webp')` → legacy `ltrim($model->image_path, '/')` → curated default in `public/assets/`.

Single-file collections: `cover` (Program), `banner` (CampaignEventContent), `image` (GalleryItem); `photo`/`voter_proof` on Member. Conversions: `webp` (nonQueued), `thumb`, `social`/`full`.

## Key Directories

```
app/Http/Controllers/   Public* only — admin CRUD lives in Filament
app/Http/Middleware/    HandleInertiaRequests, SetAdminLocale
app/Filament/           Resources (+Pages, per-resource Widgets), dashboard chart Widgets
app/Services/           PublicHomeViewData, TurnstileValidator
app/Support/            SubmissionSources, RichArticleContent, ProgramContent
app/Enums/              AidType, AidStatus, GalleryType, IdentityType (backed enums)
app/Models/             Thin Eloquent + MediaLibrary/ActivityLog traits
app/Data/               spatie/laravel-data DTOs — DEAD CODE, zero call sites
resources/js/Pages/     Inertia pages, resolved by name from controllers
resources/js/Layouts/   PublicLayout.tsx (the only layout)
resources/js/lib/       source.ts (traffic source), url.ts
resources/css/public/   Modular BEM CSS; design tokens in base.css
database/migrations/    Laravel defaults + domain + package tables
tests/Feature|Unit/     PHPUnit 12
```

### Dead code — do not wire back in

- Old Blade face: `resources/views/{public,admin,layouts}/**`, `resources/js/public/*.js`, `resources/js/admin/panel.js`, `resources/css/admin/panel.css`. No controller renders these; three of those layouts reference `@vite` entries absent from the manifest and would throw.
- `app/Support/CampaignPrograms` / `CampaignEvents` static catalogs — replaced by the `programs` / `campaign_event_contents` tables.
- `app/Data/*` — the real frontend contract is `resources/js/types.ts`, hand-synced against controller array shapes.
- `app/Http/Requests/Store*Request` — exist but **unwired**; validation is inline in `PublicSubmissionController`. Wiring them is the documented direction of travel for new work.
- `UI-Final/` and `scope/` are prototype/spec reference only. Root `assets/` is an orphan staging dir — only `public/assets/` is served.

## Development Commands

```bash
composer run setup      # First-time: install, .env, key:generate, migrate, npm install, build
composer run dev        # serve + queue:listen + pail + vite (concurrently)
npm run dev             # Vite only
npm run build           # Production assets → public/build (gitignored)

composer test           # config:clear + artisan test  ← canonical entry point
php artisan test --testsuite=Unit
php artisan test tests/Feature/BantuanFormTest.php
php artisan test --filter=test_hospital_aid_stores_patient_fields

vendor/bin/pint         # Fix PHP style
vendor/bin/pint --test  # Check only
vendor/bin/pint --dirty # Changed files only

php artisan migrate && php artisan db:seed
php artisan db:seed --class=CampaignEventContentSeeder   # NOT in the DatabaseSeeder chain
php artisan storage:link                                  # mandatory — media uses the public disk
```

`composer test` clears config first for a reason: a cached `bootstrap/cache/config.php` freezes `.env` values and defeats every `<env>` override in `phpunit.xml`.

Manual smoke harnesses (run against the **live dev DB**, not PHPUnit): `php .local/smoke-routes.php`, `php .local/smoke-events.php`.

## Code Conventions & Common Patterns

**PHP** — Pint on its default `laravel` preset (there is no `pint.json`). New code uses `declare(strict_types=1)` + `final class`. Constructor property promotion; explicit return types. Existing files are split-brained; follow the strict form for anything new.

**Layering** — Controllers stay thin and return only `Inertia::render`. Domain rules belong in services/support classes, **not** in controllers and **not** in models. Models are thin Eloquent: explicit `$fillable`, casts, scopes, Spatie trait config only. No repositories, jobs, policies, or model events in this codebase.

**Naming** — Controllers `Public*Controller`; view-data builders `*ViewData` with a `toArray()`; Filament stats `*StatsWidget`. Route slugs in Malay. Scopes read `published()->ordered()`.

**Enums** — backed enums in `app/Enums/` + model casts. Note `members.identity_type` is a DB enum cast to `IdentityType`, but `aspirations.identity_type` is a plain string column with no cast — an intentional asymmetry.

**JSON columns are NOT NULL** — store `[]`, never `null` (`programs.sections`/`cta`, `campaign_event_contents.sections`/`cta`). Seeders use raw `DB::table()->insert()`, so they must `json_encode()` manually and set `created_at`/`updated_at` by hand.

**Admin forms** — slug auto-generated in `mutateFormDataBeforeCreate`, never editable; `sort_order` via `reorderable('sort_order')`, never a form field; CTA/sections hidden. `date_label` is auto-formatted Malay `j F Y` from a `DatePicker` writing `starts_at`. Uploads: `SpatieMediaLibraryFileUpload` with `imageResizeTargetWidth('2560')` + `inside` + no upscale, `maxSize(10240)`.

**Frontend** — React 19 function components, TS `strict`. Import via the `@/*` alias (→ `resources/js/*`), never relative jumps. Styling is modular vanilla **BEM CSS**; Tailwind 4 is in devDependencies but is **not registered in `vite.config.ts`** and imported nowhere — do not add Tailwind utilities or new bundler entries without asking. No `any` in new code. Ziggy is shared server-side but there is no `ziggy-js` client package and no `route()` call in `resources/js` — hrefs are hardcoded strings.

**Contract discipline** — when a PHP `toArray()` shape changes, update `resources/js/types.ts` in the same change-set or the contract drifts silently.

**Error handling** — server validates and decides; the client only presents. Client-side checks are UX garnish, never security. `bootstrap/app.php` sets `shouldRenderJsonWhen` for `expectsJson`/`api/*`/ajax.

**Commits** — imperative and concise, mentioning the route or section (e.g. "Fix /bantuan form validation"). Do **not** add `Co-authored-by:` trailers (enforced by convention; `.local/amend-coauthor.py` strips them). Production branch is `deploy`.

## Important Files

| Path | Role |
| --- | --- |
| `routes/web.php` | Every HTTP route (no `routes/api.php` — do not add one) |
| `bootstrap/app.php` | Middleware, Inertia wiring, Filament guest/user redirects; no scheduler |
| `app/Providers/Filament/AdminPanelProvider.php` | All admin panel config |
| `app/Services/PublicHomeViewData.php` | View-data pattern + `mediaOrPath()` fallback chain |
| `app/Http/Controllers/PublicSubmissionController.php` | Both public writes; inline validation, duplicate guard |
| `resources/js/app.tsx` | Inertia entry, page glob, progress `#CC1A1A` |
| `resources/js/types.ts` | De-facto PHP↔TS contract |
| `resources/views/app.blade.php` | Only live Blade view; the single `@vite` call |
| `config/services.php` | The only genuinely custom config (Cloudflare Turnstile) |
| `phpunit.xml` | Forces SQLite `:memory:`; source of truth over `.env` |

## Runtime/Tooling Preferences

- **PHP `^8.3`** (production runs 8.4 under Plesk). **Composer + npm** — this is definitive. There is **no Bun**, no `bun.lockb`, no Bun reference anywhere.
- Use `composer install` / `npm ci` — **never `update`**; respect the lockfiles. `.npmrc` sets `ignore-scripts=true`, hence the `--ignore-scripts` flags in the setup script.
- Local DB is a **SQLite file** (`database/database.sqlite`, gitignored); `.env.example` declares MySQL and `config/database.php` defaults to sqlite — a three-way divergence. The checked-in `.env` uses a non-portable absolute Windows path; fix it on a fresh clone.
- `APP_URL=http://127.0.0.1:8765` must match the local server origin — media/upload URLs derive from it, and a mismatch breaks Filament upload previews.
- **Windows gotcha**: system PATH resolves PHP 8.2 but deps need `^8.3`. Prepend `C:\laragon\bin\php\php-8.3.30-nts-Win32-vs16-x64` before `artisan test` / Pint, or you get parse errors from typed class constants.
- **No ESLint, no Prettier, no typecheck script, no CI, no git hooks.** `.editorconfig` (UTF-8, LF, 4-space, final newline) is the only cross-cutting formatting contract. TS `strict` is configured but never executed.
- Octane is installed and configured but **dormant** — production is classic Apache + PHP-FPM. Do not assume a persistent worker; equally, avoid introducing stateful singletons.
- Never commit `.env`; never hand-edit lockfiles or `public/build/`. `public/js/` and `public/css/` are published Filament vendor assets — regenerate, don't edit.

## Testing & QA

**PHPUnit 12, not Pest.** Two suites: `Unit` and `Feature`. `tests/TestCase.php` calls `withoutVite()` in `setUp()` — load-bearing, since no build manifest is committed. `phpunit.xml` forces `DB_CONNECTION=sqlite`, `DB_DATABASE=:memory:`, and array drivers for cache/session/mail; there is no `.env.testing`.

Conventions to imitate:
- `test_snake_case` method names with explicit `: void`. Zero `#[Test]` attributes.
- `RefreshDatabase` opted into per-class, never on the base class.
- `assertSame` over `assertEquals` — the suite uses strict comparison exclusively.
- Inertia: `use Inertia\Testing\AssertableInertia as Assert;` then `->assertInertia(fn (Assert $page) => $page->component(...)->has(...)->where(...))`.
- Filament: set the panel before `Livewire::test()`, or resource pages fail to resolve:
  ```php
  Filament::setCurrentPanel(Filament::getPanel('admin'));
  $this->actingAs(User::factory()->create());
  ```
- Turnstile is neutralised by binding an anonymous subclass in `setUp()` (see `tests/Feature/BantuanFormTest.php:20`) — not Mockery, which is installed but unused.
- Only `UserFactory` exists. All other domain models are built with `Model::query()->create([...])` and literal arrays; shared attributes go in a private `...Attributes(array $overrides = [])` helper.
- Fixture data is written in Bahasa Malaysia with realistic 12-digit MyKad numbers (state code `14` = WP Putrajaya).

**Coverage**: `<source>` whitelists `app/`, but there is **no `<coverage>` element and no driver configured** — `artisan test --coverage` fails without ambient Xdebug/pcov. No parallel testing (`paratest` is not installed).

**Known blind spots** — be careful here, the suite will not catch regressions:
- All 9 Filament widgets (aggregation SQL entirely unverified).
- `TurnstileValidator`'s real HTTP path — always stubbed; renaming `passes()` silently breaks the stub while tests still pass.
- Filament auth: `User::canAccessPanel()` returns unconditional `true`; no login, credential-failure, or throttle test exists.
- Delete/bulk-delete flows, and there are **no soft deletes anywhere** — deletions are permanent and `member_aid_requests` cascades.
- File uploads and media conversions: `Storage::fake()` never appears.
- Both subdomain route groups and the `/{page}` catch-all.
- MySQL-vs-SQLite divergence: three migrations branch on driver, and the MySQL `ALTER ... MODIFY COLUMN ENUM` paths never execute under test. Verify enum changes against MySQL manually.
- Seeder coupling: `AdminSmokeTest`, `ProgramPageTest`, and `EventPageTest` read seeded rows, and sibling tests `markTestSkipped` when fewer than two published rows exist — a seeder edit can turn real coverage into a green skip.

`composer test` + `vendor/bin/pint --test` is the entire automated gate. Per the architecture skill: **no test = not done.**

# Deploy & Update Guide — Tak Banyak Alasan

> Production server: **Blacksky VPS** (`84.247.144.89`)
> SSH alias: `ssh blacksky`

## Server Info

| Item | Value |
|---|---|
| OS | AlmaLinux 8.10, Plesk |
| Web server | Apache + PHP-FPM 8.4 dedicated pool |
| PHP CLI | `/opt/plesk/php/8.4/bin/php` |
| Node | `/opt/plesk/node/22/bin/node` (npm: `/opt/plesk/node/22/bin/npm`) |
| Composer | `php /usr/local/psa/var/modules/composer/composer.phar` |
| Project dir | `/var/www/vhosts/takbanyakalasan.com/httpdocs` |
| Document root | `httpdocs/` with `.htaccess` rewrite to `public/` |
| Database | MariaDB 10.3 — `tak_banyak_alasan` / user `tba_prod` |
| Cache/Session/Queue | Redis (`predis`, `127.0.0.1:6379`) |
| Cron | root crontab — `schedule:run` every minute |
| System user | `takbanyakalasan.com_0hy3v8fisjd:psacln` |
| Domain | `takbanyakalasan.com` |
| Subdomain | `bantuan.takbanyakalasan.com` → `/bantuan` (same app) |
| SSL | Let's Encrypt (main domain) |
| WordPress backup | `/var/www/vhosts/takbanyakalasan.com/httpdocs-wp-backup-20260807` |

## Zero-Downtime Update Procedure

Jalankan dari laptop (SSH ke VPS):

```bash
ssh blacksky
```

```bash
# Set PATH
export PATH="/opt/plesk/php/8.4/bin:/opt/plesk/node/22/bin:/usr/bin:/bin:/usr/sbin:/sbin:$PATH"
cd /var/www/vhosts/takbanyakalasan.com/httpdocs

# 1. Pull latest code
git pull origin deploy

# 2. Install dependencies (jika composer.lock / package-lock.json berubah)
php /usr/local/psa/var/modules/composer/composer.phar install --no-dev --optimize-autoloader --no-interaction
npm ci --ignore-scripts
npm run build

# 3. Run migrations (jika ada migration baru)
php artisan migrate --force

# 4. Clear & rebuild cache
php artisan optimize

# 5. Fix permissions (jika ada file baru)
chown -R takbanyakalasan.com_0hy3v8fisjd:psacln /var/www/vhosts/takbanyakalasan.com/httpdocs
```

### Kenapa zero-downtime?

- **Tidak perlu restart Apache** — PHP-FPM pool otomatis reload
- **`php artisan optimize`** — atomic swap cached config/routes
- **`git pull`** — file-level atomic write, request yang sedang proses tetap pakai kode lama di memori FPM
- **Database migrations** — Laravel migration `--force` run transactionally

### Kalau ada masalah (rollback):

```bash
cd /var/www/vhosts/takbanyakalasan.com/httpdocs
git log --oneline -5                     # cari commit sebelumnya
git checkout <commit-hash> .             # rollback kode
php artisan optimize                     # rebuild cache
```

Untuk rollback migration: `php artisan migrate:rollback --step=1`

## Quick Update (tanpa dependency changes)

```bash
ssh blacksky "export PATH='/opt/plesk/php/8.4/bin:/usr/bin:/bin:$PATH'; cd /var/www/vhosts/takbanyakalasan.com/httpdocs && git pull origin deploy && php artisan optimize"
```

## Environment File

Lokasi: `/var/www/vhosts/takbanyakalasan.com/httpdocs/.env`

Key settings yang perlu diubah saat Turnstile diaktifkan:

```env
TURNSTILE_SITE_KEY=<real-key>
TURNSTILE_SECRET_KEY=<real-secret>
TURNSTILE_BYPASS_LOCAL=false
```

Setelah edit `.env`: `php artisan optimize` untuk rebuild config cache.

## Cron Job

Root crontab:
```
* * * * * /opt/plesk/php/8.4/bin/php /var/www/vhosts/takbanyakalasan.com/httpdocs/artisan schedule:run >> /dev/null 2>&1
```

## Admin Access

- URL: `https://takbanyakalasan.com/admin`
- Default: `admin@gmail.org.my` / `admin123`
- **⚠️ Ganti password admin setelah launch!**

## Checklist Launch

- [x] APP_ENV=production, APP_DEBUG=false
- [x] APP_KEY generated
- [x] Database MariaDB (bukan SQLite)
- [x] Redis untuk cache/session/queue
- [x] PHP-FPM 8.4 dedicated pool
- [x] Storage link created
- [x] Cron scheduler active
- [x] SSL active (main domain)
- [ ] Ganti password admin default
- [ ] Aktifkan Turnstile (saat siap)
- [ ] Setup SMTP email (saat siap)
- [ ] SSL untuk bantuan.takbanyakalasan.com (perlu fix Plesk license)

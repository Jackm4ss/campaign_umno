<?php

use App\Http\Controllers\PublicAspirasiController;
use App\Http\Controllers\PublicBantuanController;
use App\Http\Controllers\PublicEventController;
use App\Http\Controllers\PublicGalleryController;
use App\Http\Controllers\PublicHomeController;
use App\Http\Controllers\PublicProgramController;
use App\Http\Controllers\PublicSubmissionController;
use Illuminate\Support\Facades\Route;

// ── Subdomain: aspirasi (form aspirasi sahaja) ──────────────
Route::domain('aspirasi.takbanyakalasan.com')->group(function () {
    Route::get('/', [PublicAspirasiController::class, 'index'])->name('standalone.aspirasi');
    Route::get('/qr', [PublicAspirasiController::class, 'qrPage']);
    Route::get('/qr-image', [PublicAspirasiController::class, 'qr']);
    Route::post('/aspirasi', [PublicSubmissionController::class, 'aspiration']);
});

// ── Subdomain: bantuan (borang bantuan sahaja) ──────────────
Route::domain('bantuan.takbanyakalasan.com')->group(function () {
    Route::get('/', [PublicBantuanController::class, 'index'])->name('standalone.bantuan');
    Route::get('/qr', [PublicBantuanController::class, 'qrPage']);
    Route::get('/qr-image', [PublicBantuanController::class, 'qr']);
    Route::post('/daftar', [PublicSubmissionController::class, 'member']);
});

// ── Main domain ─────────────────────────────────────────────
Route::get('/', PublicHomeController::class)->name('home');

// Standalone public pages
Route::get('/galeri', PublicGalleryController::class)->name('gallery.index');
Route::get('/aspirasi', [PublicAspirasiController::class, 'index'])->name('aspirasi.index');
Route::get('/aspirasi/qr', [PublicAspirasiController::class, 'qrPage'])->name('aspirasi.qr-page');
Route::get('/aspirasi/qr-image', [PublicAspirasiController::class, 'qr'])->name('aspirasi.qr');
Route::get('/bantuan', [PublicBantuanController::class, 'index'])->name('bantuan.index');
Route::get('/bantuan/qr', [PublicBantuanController::class, 'qrPage'])->name('bantuan.qr-page');
Route::get('/bantuan/qr-image', [PublicBantuanController::class, 'qr'])->name('bantuan.qr');

Route::get('/program/{slug}', [PublicProgramController::class, 'show'])
    ->name('programs.show')
    ->where('slug', '[a-z0-9\-]+');

Route::get('/acara/{slug}', [PublicEventController::class, 'show'])
    ->name('events.show')
    ->where('slug', '[a-z0-9\-]+');

// Legacy admin aliases → Filament
Route::middleware('guest')->group(function () {
    Route::get('/login.html', fn () => redirect()->route('filament.admin.auth.login'));
    Route::get('/admin/login.html', fn () => redirect()->route('filament.admin.auth.login'));
});

Route::get('/panel-admin.html', fn () => redirect('/admin'));
Route::get('/admin/panel-admin.html', fn () => redirect('/admin'));

// Form submissions
Route::post('/aspirasi', [PublicSubmissionController::class, 'aspiration'])->name('aspirations.store');
Route::post('/daftar', [PublicSubmissionController::class, 'member'])->name('members.store');

// Hash route fallback
Route::get('/{page}', function (string $page) {
    if (in_array($page, ['kegiatan', 'aspirasi', 'daftar', 'bantuan', 'acara', 'program'], true)) {
        if ($page === 'bantuan') {
            return redirect()->route('bantuan.index');
        }

        return redirect('/#'.$page);
    }

    abort(404);
})->where('page', '[A-Za-z0-9\-]+');

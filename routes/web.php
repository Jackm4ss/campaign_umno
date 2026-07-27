<?php

use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\AdminSyncController;
use App\Http\Controllers\PublicBantuanController;
use App\Http\Controllers\PublicGalleryController;
use App\Http\Controllers\PublicHomeController;
use App\Http\Controllers\PublicSubmissionController;
use Illuminate\Support\Facades\Route;

Route::get('/', PublicHomeController::class)->name('home');
Route::get('/front-sync', [AdminSyncController::class, 'publicIndex'])->name('front-sync.index');

// Standalone public pages
Route::get('/galeri', PublicGalleryController::class)->name('gallery.index');
Route::get('/bantuan', [PublicBantuanController::class, 'index'])->name('bantuan.index');
Route::get('/bantuan/qr', [PublicBantuanController::class, 'qrPage'])->name('bantuan.qr-page');
Route::get('/bantuan/qr-image', [PublicBantuanController::class, 'qr'])->name('bantuan.qr');

Route::middleware('guest')->group(function () {
    Route::get('/login.html', [AdminAuthController::class, 'showLogin']);
    Route::get('/admin/login.html', [AdminAuthController::class, 'showLogin']);
    Route::get('/admin/login', [AdminAuthController::class, 'showLogin'])->name('admin.login');
    Route::post('/admin/login', [AdminAuthController::class, 'login'])->name('admin.login.submit');
});

Route::get('/admin/umno-logo.jpg', fn () => response()->file(public_path('umno-logo.jpg')));
Route::get('/admin/assets/{path}', function (string $path) {
    $file = public_path("assets/{$path}");

    abort_unless(is_file($file), 404);

    return response()->file($file);
})->where('path', '.*');

Route::middleware('auth')->group(function () {
    Route::get('/panel-admin.html', fn () => view('admin.panel'));
    Route::get('/admin/panel-admin.html', fn () => view('admin.panel'));
    Route::get('/admin', fn () => view('admin.panel'))->name('admin.dashboard');
    Route::post('/admin/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');
    Route::get('/admin/sync', [AdminSyncController::class, 'index'])->name('admin.sync.index');
    Route::post('/admin/sync', [AdminSyncController::class, 'store'])->name('admin.sync.store');
});

Route::post('/aspirasi', [PublicSubmissionController::class, 'aspiration'])->name('aspirations.store');
Route::post('/daftar', [PublicSubmissionController::class, 'member'])->name('members.store');
Route::post('/kegiatan/daftar', [PublicSubmissionController::class, 'eventRegistrationStandalone'])->name('events.register.standalone');
Route::post('/kegiatan/{event:slug}/daftar', [PublicSubmissionController::class, 'eventRegistration'])->name('events.register');

Route::get('/{page}', function (string $page) {
    if (in_array($page, ['kegiatan', 'pimpinan', 'galeri', 'artikel', 'aspirasi', 'daftar', 'bantuan'], true)) {
        if ($page === 'bantuan') {
            return redirect()->route('bantuan.index');
        }
        if ($page === 'galeri' || $page === 'pimpinan') {
            return redirect()->route('gallery.index');
        }
        return redirect('/#'.$page);
    }

    abort(404);
})->where('page', '[A-Za-z0-9\-]+');

<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SppdController;
use App\Http\Controllers\SuratKeluarController;
use App\Http\Controllers\SuratKeputusanController;
use App\Http\Controllers\SuratMasukController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware(['auth', 'admin'])->group(function () {

    Route::get('/surat_keluar/create', [SuratKeluarController::class, 'create'])->name('surat_keluar.create');
    Route::post('/surat_keluar', [SuratKeluarController::class, 'store'])->name('surat_keluar.store');
    Route::get('/surat_keluar/{suratKeluar}', [SuratKeluarController::class, 'show'])->name('surat_keluar.show');
    Route::get('/surat_keluar/{suratKeluar}/edit', [SuratKeluarController::class, 'edit'])->name('surat_keluar.edit');
    Route::put('/surat_keluar/{suratKeluar}', [SuratKeluarController::class, 'update'])->name('surat_keluar.update');
    Route::delete('/surat_keluar/{suratKeluar}', [SuratKeluarController::class, 'destroy'])->name('surat_keluar.destroy');

    Route::get('/surat_masuk', [SuratMasukController::class, 'index'])->name('surat_masuk.index');
    Route::get('/surat_masuk/create', [SuratMasukController::class, 'create'])->name('surat_masuk.create');
    Route::post('/surat_masuk', [SuratMasukController::class, 'store'])->name('surat_masuk.store');
    Route::get('/surat_masuk/{suratMasuk}', [SuratMasukController::class, 'show'])->name('surat_masuk.show');
    Route::get('/surat_masuk/{suratMasuk}/edit', [SuratMasukController::class, 'edit'])->name('surat_masuk.edit');
    Route::put('/surat_masuk/{suratMasuk}', [SuratMasukController::class, 'update'])->name('surat_masuk.update');
    Route::delete('/surat_masuk/{suratMasuk}', [SuratMasukController::class, 'destroy'])->name('surat_masuk.destroy');

    Route::get('/sppd', [SppdController::class, 'index'])->name('sppd.index');
    Route::get('/sppd/create', [SppdController::class, 'create'])->name('sppd.create');
    Route::post('/sppd', [SppdController::class, 'store'])->name('sppd.store');
    Route::get('/sppd/{sppd}', [SppdController::class, 'show'])->name('sppd.show');
    Route::get('/sppd/{sppd}/edit', [SppdController::class, 'edit'])->name('sppd.edit');
    Route::put('/sppd/{sppd}', [SppdController::class, 'update'])->name('sppd.update');
    Route::delete('/sppd/{sppd}', [SppdController::class, 'destroy'])->name('sppd.destroy');

    Route::get('/surat_keputusan', [SuratKeputusanController::class, 'index'])->name('surat_keputusan.index');
    Route::get('/surat_keputusan/create', [SuratKeputusanController::class, 'create'])->name('surat_keputusan.create');
    Route::post('/surat_keputusan', [SuratKeputusanController::class, 'store'])->name('surat_keputusan.store');
    Route::get('/surat_keputusan/{surat_keputusan}', [SuratKeputusanController::class, 'show'])->name('surat_keputusan.show');
    Route::get('/surat_keputusan/{surat_keputusan}/edit', [SuratKeputusanController::class, 'edit'])->name('surat_keputusan.edit');
    Route::put('/surat_keputusan/{surat_keputusan}', [SuratKeputusanController::class, 'update'])->name('surat_keputusan.update');
    Route::delete('/surat_keputusan/{surat_keputusan}', [SuratKeputusanController::class, 'destroy'])->name('surat_keputusan.destroy');
    Route::get('/surat_keputusan/{surat_keputusan}/download', [SuratKeputusanController::class, 'download'])->name('surat_keputusan.download');


    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('register', [RegisteredUserController::class, 'create'])
        ->name('register');

    Route::post('register', [RegisteredUserController::class, 'store']);

    Route::get('login', [AuthenticatedSessionController::class, 'create'])
        ->name('login');

    Route::post('login', [AuthenticatedSessionController::class, 'store']);

    Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])
        ->name('password.request');

    Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
        ->name('password.email');

    Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])
        ->name('password.reset');

    Route::post('reset-password', [NewPasswordController::class, 'store'])
        ->name('password.store');
});

Route::middleware(['auth', 'user'])->group(function () {
    Route::get('/surat_keluar', [SuratKeluarController::class, 'index'])->name('surat_keluar.index');
    Route::get('/surat_keluar/create', [SuratKeluarController::class, 'create'])->name('surat_keluar.create');
    Route::post('/surat_keluar', [SuratKeluarController::class, 'store'])->name('surat_keluar.store');
    Route::get('/surat_keluar/{suratKeluar}', [SuratKeluarController::class, 'show'])->name('surat_keluar.show');

    Route::get('/surat_masuk', [SuratMasukController::class, 'index'])->name('surat_masuk.index');
    Route::get('/surat_masuk/create', [SuratMasukController::class, 'create'])->name('surat_masuk.create');
    Route::post('/surat_masuk', [SuratMasukController::class, 'store'])->name('surat_masuk.store');
    Route::get('/surat_masuk/{suratMasuk}', [SuratMasukController::class, 'show'])->name('surat_masuk.show');

    Route::get('/sppd', [SppdController::class, 'index'])->name('sppd.index');
    Route::get('/sppd/create', [SppdController::class, 'create'])->name('sppd.create');
    Route::post('/sppd', [SppdController::class, 'store'])->name('sppd.store');
    Route::get('/sppd/{sppd}', [SppdController::class, 'show'])->name('sppd.show');

    Route::get('/sppd', [SppdController::class, 'index'])->name('sppd.index');
    Route::get('/sppd/create', [SppdController::class, 'create'])->name('sppd.create');
    Route::post('/sppd', [SppdController::class, 'store'])->name('sppd.store');
    Route::get('/sppd/{sppd}', [SppdController::class, 'show'])->name('sppd.show');
});


Route::middleware('auth')->group(function () {
    // Route::get('/surat_keluar', [SuratKeluarController::class, 'index'])->name('surat_keluar.index');
    // Route::get('/surat_keluar/create', [SuratKeluarController::class, 'create'])->name('surat_keluar.create');
    // Route::post('/surat_keluar', [SuratKeluarController::class, 'store'])->name('surat_keluar.store');
    // Route::get('/surat_keluar/{suratKeluar}', [SuratKeluarController::class, 'show'])->name('surat_keluar.show');
    // Route::get('/surat_keluar/{suratKeluar}/edit', [SuratKeluarController::class, 'edit'])->name('surat_keluar.edit');
    // Route::put('/surat_keluar/{suratKeluar}', [SuratKeluarController::class, 'update'])->name('surat_keluar.update');
    // Route::delete('/surat_keluar/{suratKeluar}', [SuratKeluarController::class, 'destroy'])->name('surat_keluar.destroy');

    // Route::get('/surat_masuk', [SuratMasukController::class, 'index'])->name('surat_masuk.index');
    // Route::get('/surat_masuk/create', [SuratMasukController::class, 'create'])->name('surat_masuk.create');
    // Route::post('/surat_masuk', [SuratMasukController::class, 'store'])->name('surat_masuk.store');
    // Route::get('/surat_masuk/{suratMasuk}', [SuratMasukController::class, 'show'])->name('surat_masuk.show');
    // Route::get('/surat_masuk/{suratMasuk}/edit', [SuratMasukController::class, 'edit'])->name('surat_masuk.edit');
    // Route::put('/surat_masuk/{suratMasuk}', [SuratMasukController::class, 'update'])->name('surat_masuk.update');
    // Route::delete('/surat_masuk/{suratMasuk}', [SuratMasukController::class, 'destroy'])->name('surat_masuk.destroy');

    // Route::get('/sppd', [SppdController::class, 'index'])->name('sppd.index');
    // Route::get('/sppd/create', [SppdController::class, 'create'])->name('sppd.create');
    // Route::post('/sppd', [SppdController::class, 'store'])->name('sppd.store');
    // Route::get('/sppd/{sppd}', [SppdController::class, 'show'])->name('sppd.show');
    // Route::get('/sppd/{sppd}/edit', [SppdController::class, 'edit'])->name('sppd.edit');
    // Route::put('/sppd/{sppd}', [SppdController::class, 'update'])->name('sppd.update');
    // Route::delete('/sppd/{sppd}', [SppdController::class, 'destroy'])->name('sppd.destroy');

    // Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    // Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    // Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::middleware(['user'])->group(function () {});
});



require __DIR__ . '/auth.php';

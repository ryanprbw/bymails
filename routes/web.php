<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SppdController;
use App\Http\Controllers\SuratKeluarController;
use App\Http\Controllers\SuratMasukController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
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

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
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

    Route::middleware(['user'])->group(function () {
        
    });

});



require __DIR__.'/auth.php';

<?php
namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\SuratKeluar;
use App\Models\SuratMasuk;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Menggunakan view composer untuk mengirimkan jumlahSuratKeluars ke navigation.blade.php
        View::composer('layouts.navigation', function ($view) {
            $jumlahSuratKeluars = SuratKeluar::count();
            $view->with('jumlahSuratKeluars', $jumlahSuratKeluars);
        });
        View::composer('layouts.navigation', function ($view) {
            $jumlahSuratMasuks = SuratMasuk::count();
            $view->with('jumlahSuratMasuks', $jumlahSuratMasuks);
        });
    }
}

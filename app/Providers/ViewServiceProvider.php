<?php
namespace App\Providers;

use App\Models\Sop;
use App\Models\Sppd;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\SuratKeluar;
use App\Models\SuratMasuk;
use App\Models\SuratKeputusan;


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
        View::composer('layouts.navigation', function ($view) {
            $jumlahSop = Sop::count();
            $view->with('jumlahSop', $jumlahSop);
        });
        View::composer('layouts.navigation', function ($view) {
            $jumlahSk = SuratKeputusan::count();
            $view->with('jumlahSk', $jumlahSk);
        });
        View::composer('layouts.navigation', function ($view) {
            $jumlahSppd = Sppd::count();
            $view->with('jumlahSppd', $jumlahSppd);
        });
    }
}

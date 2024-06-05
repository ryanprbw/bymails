<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // Periksa apakah pengguna terotentikasi
        if (!auth()->check()) {
            // Jika tidak terotentikasi, alihkan ke halaman login
            return redirect()->route('login');
        }

        // Periksa apakah pengguna memiliki peran admin
        if (auth()->user()->role !== 'admin') {
            // Jika tidak memiliki peran admin, alihkan ke halaman tertentu atau tampilkan pesan akses ditolak
            abort(403, 'Unauthorized access.');
        }

        // Jika pengguna adalah admin, lanjutkan dengan permintaan
        return $next($request);
    }
}

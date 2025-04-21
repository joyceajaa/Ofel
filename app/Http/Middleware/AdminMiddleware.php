<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // Import Auth
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // 1. Cek apakah user sudah login
        if (!Auth::check()) {
            // Jika belum login, redirect ke halaman login
            return redirect()->route('login');
        }

        // 2. Cek apakah user yang login adalah admin
        if (!Auth::user()->is_admin) {
            // Jika bukan admin, tampilkan halaman error 403 (Forbidden)
            // atau redirect ke dashboard pelanggan dengan pesan error
             abort(403, 'ANDA TIDAK MEMILIKI AKSES KE HALAMAN INI.');
            // atau: return redirect()->route('dashboard')->with('error', 'Anda tidak punya akses admin.');
        }

        // 3. Jika user adalah admin, lanjutkan request
        return $next($request);
    }
}

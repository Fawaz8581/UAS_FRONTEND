<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AuthenticateUser
{
    public function handle(Request $request, Closure $next)
    {
        // Periksa apakah user ada di session
        if (!$request->session()->has('user')) {
            return redirect('/login'); // Arahkan ke halaman login jika tidak ada sesi
        }

        return $next($request);
    }
}

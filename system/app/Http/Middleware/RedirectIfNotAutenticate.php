<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfNotAutenticate
{
    public function handle(Request $request, Closure $next): Response
    {
        if (!auth()->guard('master-admin')->check() && !auth()->guard('admin')->check() && !auth()->guard('guru')->check() && !auth()->guard('siswa')->check() && !auth()->guard('orang-tua')->check()) {
            return redirect('/login')->with('error', 'You must be logged in to access this page.');
        }

        return $next($request);
    }
}

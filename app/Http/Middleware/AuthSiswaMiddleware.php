<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Session;

class AuthSiswaMiddleware
{
    public function handle($request, Closure $next)
    {
        if (!Session::has('nisn')) {
            return redirect('/login_siswa'); // arahkan ke login siswa
        }

        return $next($request);
    }
}
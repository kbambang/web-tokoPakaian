<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class UserAkses
{

    public function handle(Request $request, Closure $next, $roles)
    {
       if (Auth::check() && in_array(Auth::user()->role, $roles)) {
        return $next($request);
       }

       return redirect()->route('dashboard')->with('error', 'Anda tidak memmiliki akses ke halaman ini.');
    }
}

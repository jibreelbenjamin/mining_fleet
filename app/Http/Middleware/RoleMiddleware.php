<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, ...$roles)
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with(['warningToast' => 'Silahkan login terlebih dahulu']);
        }

        if (!in_array(Auth::user()->role, $roles)) {
            return redirect()->route('dashboard')->with(['warningToast' => 'Tidak memiliki akses']);
        }

        return $next($request);
    }
}

<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        if (auth()->user()->role === "admin" && auth()->user()->is_enabled === 1) {
            return $next($request);
        } elseif (auth()->user()->is_enabled === 0) {
            return abort(403, 'Your account is disabled.');
        } else {
            auth()->logout();
            return abort(401);
        }
    }
}

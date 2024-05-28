<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

// mengharuskan user belum login
class WithoutAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $isLoggedIn = auth()->check();
        if (!$isLoggedIn) {
            // meneruskan ke controller
            return $next($request);
        }
        // redirect ke dashboard
        return response()->json(["User sudah login, harus logout terlebih dahulu"]);
    }
}

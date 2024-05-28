<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

// mengharuskan user sudah login
class WithAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // check login
        // check role / hak akses
        $isLoggedIn = auth()->check();
        if ($isLoggedIn) {
            // meneruskan ke controller
            return $next($request);
        }
        // redirect ke halaman login
        return response()->json(["Harus login terlebih dahulu"]);
    }
}

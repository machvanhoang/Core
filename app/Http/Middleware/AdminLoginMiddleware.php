<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminLoginMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $auth = auth(ADMIN);
        $user = $auth->user();
        if ($auth->check() && $user && $user->email && $user->status === PUBLISHED) {
            return redirect()->route(ADMIN_INDEX);
        }
        return $next($request);
    }
}

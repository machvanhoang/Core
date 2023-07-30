<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminLoggedMiddleware
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
        if (!$auth->check() || !($user && $user->email) || $user->status !== PUBLISHED) {
            auth(ADMIN)->logout();
            return redirect()->route(ADMIN_LOGIN_GET);
        }
        return $next($request);
    }
}

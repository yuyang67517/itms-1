<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle($request, Closure $next)
    {
        // Check if the user is authenticated and has an "admin" role or permission
        if (Auth::check() && Auth::user()->isAdmin()) {
            return $next($request);
        }

        // If not an admin, you can redirect them or return a 403 Forbidden response
        return abort(403, 'Unauthorized');
    }
}

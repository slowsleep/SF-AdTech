<?php

namespace App\Http\Middleware;

use Barryvdh\Debugbar\Facades\Debugbar;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Exception;

class IsAdvertiser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        try {
            $user = $request->user();

            if (($user) && ($user->role->name === 'admin' || $user->role->name === 'advertiser')) {
                return $next($request);
            }

            abort(403, 'Access denied');
        } catch (Exception $e) {
            Debugbar::error($e);
            abort(500, 'Internal server error');
        }
    }
}

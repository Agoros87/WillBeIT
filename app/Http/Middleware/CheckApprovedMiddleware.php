<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckApprovedMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check() && Auth::user()->status !== 'approved') {
            Auth::logout();
            return redirect()->route('login')->withErrors([
                'email' => 'Tu cuenta está pendiente de verificación por el profesor.',
            ]);
        }

        return $next($request);
    }
}

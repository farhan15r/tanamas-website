<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Auth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!auth()->check()) {
          session()->flash('alertType', 'error');
          session()->flash('alertMessage', 'You must be logged in to access that page.');

            return redirect()->route('login.index', ['redirect' => $request->fullUrl()]);
        }
        return $next($request);
    }
}

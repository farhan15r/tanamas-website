<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Role
{
  /**
   * Handle an incoming request.
   *
   * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
   */
  public function handle(Request $request, Closure $next, $role): Response
  {
    if (
      !auth()->check() ||
      !auth()->user()->hasRole($role)
    ) {
      session()->flash('alertType', 'error');
      session()->flash('alertMessage', 'You do not have permission to access that page.');

      return redirect()->route('index');
    }

    return $next($request);
  }
}

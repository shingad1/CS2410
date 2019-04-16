<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Admin
{
    /**
     * Handle an incoming request, based on whether the user is an admin or not.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     */
    public function handle($request, Closure $next)
    {
      if (Auth::check() && Auth::user()->isAdmin()) {
        return $next($request);
      }

      return redirect('/login');
    }
}

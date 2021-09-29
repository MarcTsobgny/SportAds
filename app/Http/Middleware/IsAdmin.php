<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        dd('admin middelware');
        if (Auth::check()) {
            # code...
            if (Auth::user()->is_admin == 0) {
                # code...
                // dd('Vous n\'etes pas admin');
            }
        }
        return $next($request);
    }
}

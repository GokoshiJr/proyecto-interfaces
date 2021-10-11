<?php

namespace App\Http\Middleware;

use Closure;
use ErrorException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccessMiddleware
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
        if (Auth::user()->access == 1) {
            return $next($request);
        } else {
            Auth::logout();
            return redirect('/home');
        }
    }
}

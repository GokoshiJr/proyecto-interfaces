<?php

namespace App\Http\Middleware;

use Closure;
use ErrorException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
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
        try {
            if (Auth::user()->is_admin == 1) {
                return $next($request);
            } else {
                return redirect('/empleado');
            }
        } catch (ErrorException $e) {
            return redirect('/empleado');
        }
    }
}

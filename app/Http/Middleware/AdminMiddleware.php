<?php

namespace App\Http\Middleware;

use Closure;
use ErrorException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Stmt\TryCatch;

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
        /* if (auth()->check() && auth()->user()->is_admin)
        {
            return $next($request);
        } 
        
        return redirect('/'); */
        /* if ($request -> is_admin == null) 
        {
            return redirect('/');
        } */
        try {
            if (Auth::user()->is_admin == 1) {
                return $next($request);
            } else {
                return redirect('/');
            }
        } catch (ErrorException) {
            return redirect('/');
        }
    }
}

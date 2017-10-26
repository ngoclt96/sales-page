<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfUserAuthenticated
{


    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        //If request comes from logged in user, he will
        //be redirected to seller's home page user.
        if (Auth::guard('')->check()) {
            return redirect('/');
        }
        return $next($request);
    }
}

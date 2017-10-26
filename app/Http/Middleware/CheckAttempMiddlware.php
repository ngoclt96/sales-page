<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;

class CheckAttempMiddlware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $model)
    {
        $model = "App\\Models\\" . $model;
        $user = $model::where('email', $request['email'])->first();
        if ($user) {
            $model::$check_attemp = true;
        }

        return $next($request);

    }
    
}

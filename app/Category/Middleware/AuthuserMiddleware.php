<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class AuthuserMiddleware
{

    public function handle($request, Closure $next)
    {
        if (Auth::user()->id != 1) {
            return redirect('/');
        }
        return $next($request);
    }
}

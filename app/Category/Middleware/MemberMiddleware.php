<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class MemberMiddleware
{

    public function handle($request, Closure $next)
    {
        if (Auth::user() && Auth::user()->member) {
            return $next($request);
        }
        return redirect('/price');
    }
}

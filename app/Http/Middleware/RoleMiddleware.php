<?php

 namespace App\Http\Middleware;

 use Closure;
 use Auth;
 use Illuminate\Http\RedirectResponse;

 class RoleMiddleware
 {
     /**
      * Handle an incoming request.
      *
      * @param  \Illuminate\Http\Request  $request
      * @param  \Closure  $next
      * @return mixed
      */
     public function handle($request, Closure $next)
     {
         if (Auth::user()->role < 5) {
             return redirect('/');
         }
         return $next($request);
     }
 }

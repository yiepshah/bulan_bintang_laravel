<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

// class CheckUserRole
// {
//     /**
//      * Handle an incoming request.
//      *
//      * @param  \Illuminate\Http\Request  $request
//      * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
//      * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
//      */


//      public function handle($request, Closure $next, $role)
//      {
//          if ($role == 'admin' && auth()->user()->is_admin) {
//              return $next($request);
//          } elseif ($role == 'user' && !auth()->user()->is_admin) {
//              return $next($request);
//          }
 
//          return redirect()->route('index')->with('error', 'Unauthorized.');
//      }
// }

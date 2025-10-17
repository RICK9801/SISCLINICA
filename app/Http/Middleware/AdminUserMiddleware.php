<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Auth;

class AdminUserMiddleware
{
   
    public function handle(Request $request, Closure $next): Response
    {
        if(!empty(Auth::check()))
        {
            return $next($request);
        }
        else
        {
            Auth::logout();
            return redirect(url(''));
        }
    }
}

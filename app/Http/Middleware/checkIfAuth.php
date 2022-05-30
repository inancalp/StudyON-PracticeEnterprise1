<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class checkIfAuth
{
    public function handle(Request $request, Closure $next)
    {
        if(!auth()->user()){
            return redirect()->route("login");
        }

        return $next($request);
    }
}

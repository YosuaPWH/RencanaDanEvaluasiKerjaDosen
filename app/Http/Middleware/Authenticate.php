<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Support\Facades\Auth;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param \Closure $next
     * @return mixed
     */
    public function redirectTo($request)
    {   
        if(!Auth::check()) {
            return route('login');
        } 
    }
}

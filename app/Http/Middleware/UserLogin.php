<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class UserLogin
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
        if (Auth::check() && Auth::user()->active != '1'){
            Auth::logout();
            return redirect('login')->with('warning', 'Your Account is not activated yet.');;
        } else {
            return $next($request);
        }
    }
}

<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;

use Closure;

class Check_Admin_Login
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
        //dd($request->route()->getName());
//        echo $request->path();
//        exit();
        if (Auth::check())
        {
            return $next($request);
        }else {
            return redirect()->route('default_login_admin');
        }

    }
}

<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Is_Login
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (Auth::user() == false) {
            return $next($request);
        }else{
            return redirect('/dashboard');
        }
        if(Auth::user()->status == 0){
            return redirect('login')->with('error',"this account is not active. Please contact admin!");
        }else{
            return redirect('/dashboard');
        }
    }
}

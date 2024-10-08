<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class Admin
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
         if(!Auth::check()){
            return redirect()->route('login');
        }
        $userRole = Auth::user()->role;
        if($userRole == 2){
            return $next($request);
        }elseif($userRole == 1){
             return redirect()->route('super-admin.dashboard');
        }elseif($userRole == 3){
             return redirect()->route('dashboard');
        }
    }
}

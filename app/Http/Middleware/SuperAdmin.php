<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SuperAdmin
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
        //if user is not logdin
        if(!Auth::check()){
            return redirect()->route('login');
        }
        $userRole = Auth::user()->role;
        if($userRole == 1){
            return $next($request);
        }elseif($userRole == 2){
             return redirect()->route('admin.dashboard');
        }elseif($userRole == 3){
             return redirect()->route('dashboard');
        }
        
    }
}

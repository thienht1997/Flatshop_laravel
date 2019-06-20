<?php

namespace App\Http\Middleware;


use Closure;
use Illuminate\Support\Facades\Auth;

class CheckRole
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
        if(Auth::check()){
            if(Auth::user()->level == 1){
            return redirect()->route('products.list');
            }
            if(Auth::user()->level == 2){
            return redirect()->route('products.list');
            }
            if(Auth::user()->level == 3){
            return redirect()->route('shop.index','all');
            }
        }
        return $next($request);
    }
}

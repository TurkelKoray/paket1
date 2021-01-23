<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Demo
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
        if(Auth::check() && \auth()->user()->yetki==100){
            session()->flash("durum",100);
            session()->flash("position","toast-top-full-width");

            return redirect()->back();
        }
        return $next($request);
    }
}

<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class DemoToastr
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

            $data = ["title" => "DİKKAT", "content" => "Demo Sürümünde Değişiklik Yapamazsınız","type" => "warning"];

            return json_encode($data);
        }
        return $next($request);
    }
}

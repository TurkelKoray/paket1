<?php

namespace App\Http\Middleware;

use App\Http\Controllers\Controller;
use Closure;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;

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
        if($request->ajax()){
            if(Auth::check() && \auth()->user()->yetki==100){
              return Response::json(["title" => "Demo", "content" => "Demo Sürümünde Değişiklik Yapamazsınız","type" => "warning"]);
            }
        }

        return $next($request);
    }
}

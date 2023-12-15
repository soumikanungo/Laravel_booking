<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
class AdminAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request,Closure $next)
    {
        if($request->path()=="login" && $request->session()->has('admin'))
        {
            return redirect('/');
        }
        return $next($request);
    }
}

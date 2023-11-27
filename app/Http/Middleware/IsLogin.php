<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class IsLogin
{
    public function handle(Request $request, Closure $next): Response
    {
        if(Auth::check()){
            return $next($request);
        }
        return redirect('login')->with('info', 'Silahkan Login Terlebih Dahulu');
    }
}
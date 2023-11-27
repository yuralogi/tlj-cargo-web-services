<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class IsLoginCustomer
{
    public function handle(Request $request, Closure $next): Response
    {
        if(Auth::guard('customer')->check()){
            return $next($request);
        }

        return redirect('login-customer');
        // return redirect('login-customer')->with('info', 'Silahkan Login Terlebih Dahulu');
    }
}

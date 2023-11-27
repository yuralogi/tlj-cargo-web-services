<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class IsNotLoginCustomer
{
    public function handle(Request $request, Closure $next): Response
    {
        if(Auth::guard('customer')->check()){
            return redirect('/dashboard-customer');
        }
        return $next($request);
    }
}
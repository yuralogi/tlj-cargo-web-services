<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

class IsEmailExists
{

    public function handle(Request $request, Closure $next): Response
    {
        $data = DB::table('customers')->where('email', $request->input('email'))->count();
        if($data == 1){
            return redirect('/register-customer')->with('error', 'Email Tidak Dapat Digunakan!');
        }

        return $next($request);
    }

}
<?php

namespace App\Http\Middleware\Api;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

class ApiIsEmailExist
{
    public function handle(Request $request, Closure $next): Response
    {
        $dataEmail = DB::table('customers')->where('email', $request->input('email'))->count();
        if($dataEmail == 1){
            return response()->json(['response' => false,'message' => 'Gagal Membuat Akun, Email Tidak Dapat Digunakan'], 200);
        }
        return $next($request);
    }
}
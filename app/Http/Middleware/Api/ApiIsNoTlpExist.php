<?php

namespace App\Http\Middleware\Api;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

class ApiIsNoTlpExist
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        $dataEmail = DB::table('customers')->where('no_tlp', $request->input('no_tlp'))->count();
        if($dataEmail == 1){
            return response()->json(['response' => false,'message' => 'Gagal Membuat Akun, No Tlp Tidak Dapat Digunakan'], 200);
        }
        return $next($request);
    }
}

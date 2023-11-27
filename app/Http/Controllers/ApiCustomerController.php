<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ApiCustomerController extends Controller
{
    public function authenticate(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' =>'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'The given data was invalid.',
                'errors' => $validator->errors(),
            ], 422);
        }

        $customer = Customer::where('email', $request->email)->first();

        if(! $customer ||! Hash::check($request->password, $customer->password)){

            return response()->json(['response' => false, "payload" => null], 200);
        }


        $token = $customer->createToken('auth_token')->plainTextToken;
        $customer['access_token'] = $token;

        return response()->json(['payload' => $customer,'message' => 'Login success.', 'response' => true], 200);

    }

    public function getDataBarang()
    {

        $idUser = auth()->user()->id;
        $barang = DB::table('tbl_barang')->where('id_user', $idUser)->where('status_barang', '!=', 'TELAH SAMPAI')->get();
        return $barang;

    }

    public function getBarangSampai()
    {
        $idUser = auth()->user()->id;
        $barang = DB::table('tbl_barang')->where('id_user', $idUser)->where('status_barang', 'TELAH SAMPAI')->get();
        return $barang;
    }

    public function getDataByResi(Request $request)
    {
        $dataResi = DB::table('tbl_barang')->where('no_resi', $request->no_resi)->get();

        if($dataResi->isEmpty()){
            return response()->json(['message' => 'Data not found'], 404); // 404 adalah kode status "Not Found"
        } else{
            return $dataResi;
        }

    }

    public function storeDataRegister(Request $request)
    {
        $queryState = DB::table('customers')->insert([
			'name' => $request->input('name'),
            'email' => $request->input('email'),
            'no_tlp' => $request->input('no_tlp'),
            'profile_picture' => 'a/n',
            'password' => Hash::make($request->input('password')),
            'created_at' => date('Y-m-d H:i:s')
		]);

        if($queryState){
            return response()->json(['response' => true, 'message' => 'Berhasil Membuat Akun'], 200);
        } else{
            return response()->json(['message' => 'Gagal Membuat Akun'], 500);
        }
    }

    public function changePassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'old_password' => 'required',
            'new_password' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'The given data was invalid.',
                'errors' => $validator->errors(),
            ], 422);
        }

        $customer = Customer::where('email', $request->email)->first();

        if(! $customer ||! Hash::check($request->old_password, $customer->password)){
            return response()->json(['response' => false, "payload" => null, "message" => "Password Lama Tidak Sesuai"], 200);
        } else {
            $queryState = DB::table('customers')->where('email', $request->email)->update([
                'password' => Hash::make($request->input('new_password')),
            ]);

            if($queryState){
                return response()->json(['response' => true, 'message' => 'Password Berhasil di Ubah'], 200);
            } else{
                return response()->json(['message' => 'Kesalahan Mengubah Password'], 500);
            }
        }
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
        return response()->json(['message' => 'You have successfully logged out and the token was successfully deleted',
                                'response' => true], 200);
    }
}
<?php

namespace App\Http\Controllers;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

use function PHPUnit\Framework\returnSelf;

class CustomerController extends Controller
{
    public function index()
    {
        return view('customer.halaman-utama',['page_title' => 'TLJ Cargo']);
    }

    public function login()
    {
        return view('customer.halaman-login');
    }

    public function dashboard()
    {
        //mengambil id user
        $idUser = Auth::guard('customer')->user()->id;

    	// mengambil data dari table barang
        $barangJakarta = count(DB::table('tbl_barang')->where('id_user', $idUser)->where('status_barang', 'DITERIMA DI JAKARTA')->get());
        $barangKirim = count(DB::table('tbl_barang')->where('id_user', $idUser)->where('status_barang', 'SEDANG DIKIRIM')->get());
        $barangLampung = count(DB::table('tbl_barang')->where('id_user', $idUser)->where('status_barang', 'DITERIMA DI LAMPUNG')->get());
        $barangSampai = count(DB::table('tbl_barang')->where('id_user', $idUser)->where('status_barang', 'TELAH SAMPAI')->get());


    	// mengirim data ke view data-barang
		return view('customer.halaman-dashboard',['barangJakarta' => $barangJakarta,'barangKirim' => $barangKirim, 'barangLampung' => $barangLampung, 'barangSampai' => $barangSampai, 'page_name' => 'MyTLJ', 'page_title' => '']);

        // return view('customer.halaman-dashboard',['page_name' => 'MyTLJ']);
    }

    public function profile()
    {
        return view('customer.halaman-profile-customer' ,['page_name' => 'MyTLJ', 'page_title' => 'Profile']);
    }

    public function updateProfile(Request $request)
    {
        $validator = Validator::make($request->email, [
            'email' => 'required|email'
        ]);

        if ($validator->fails()) {
            return redirect('/profile')->with("error", "Gagal Mengubah Profile");
        }

        $customer = Customer::where('email', $request->email)->first();


        $queryState = DB::table('customers')->where('email', $request->email)->update(['email' => $request->email]);

        if($queryState){
            return redirect('/profile')->with('success', 'profile berhasil diubah');
        } else{
            return redirect('/profile')->with('error', 'profile gagal diubah');
        }
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::guard('customer')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/dashboard-customer');
        }
        return back()->with('error', 'Email atau Password yang Anda Masukan Salah!');
    }

    public function register()
    {
        return view('customer.halaman-registrasi');
    }

    public function storeRegister(Request $request)
    {

         $queryState = DB::table('customers')->insert([
			'name' => $request->input('name'),
            'email' => $request->input('email'),
            'no_tlp' => $request->input('notlp'),
            'profile_picture' => 'a/n',
            'password' => Hash::make($request->input('password')),
            'created_at' => date('Y-m-d H:i:s')
		]);

        if($queryState){
            return redirect('/login-customer')->with("success", "Berhasil Membuat Akun, Silahkan Login!");
        } else{
            return redirect('/login-customer')->with("error", "Gagal Membuat Akun");
        }


    }

    public function getDataByResi(Request $request)
    {
        $dataResi = DB::table('tbl_barang')->where('no_resi', $request->input('cek-resi'))->get();
        if(!isset($dataResi[0])){
            return redirect('/')->with('error', 'Resi yang anda masukan tidak terdaftar');
        }
        return view('customer.halaman-cek-resi', ['page_title' => 'TLJ Cargo', 'dataResi' => $dataResi]);
    }

    public function getDataJakarta()
    {
        //mengambil id user
        $idUser = Auth::guard('customer')->user()->id;

    	// mengambil data dari table barang
        $barang = DB::table('tbl_barang')->where('id_user', $idUser)->where('status_barang', 'DITERIMA DI JAKARTA')->get();

    	// mengirim data ke view data-barang
		return view('customer.halaman-data-barang',['barang' => $barang, 'page_name' => 'TLJ | Barang Jakarta', 'page_title' => 'Data Barang Jakarta', 'bg_color' => 'bg-primary']);
    }

    public function getDataJalan()
    {
        //mengambil id user
        $idUser = Auth::guard('customer')->user()->id;

    	// mengambil data dari table barang
        $barang = DB::table('tbl_barang')->where('id_user', $idUser)->where('status_barang', 'SEDANG DIKIRIM')->get();

    	// mengirim data ke view data-barang
		return view('customer.halaman-data-barang',['barang' => $barang, 'page_name' => 'TLJ | Barang Jalan', 'page_title' => 'Data Barang Diperjalanan', 'bg_color' => 'bg-warning']);
    }

    public function getDataLampung()
    {
        //mengambil id user
        $idUser = Auth::guard('customer')->user()->id;

    	// mengambil data dari table barang
        $barang = DB::table('tbl_barang')->where('id_user', $idUser)->where('status_barang', 'DITERIMA DI LAMPUNG')->get();

    	// mengirim data ke view data-barang
		return view('customer.halaman-data-barang',['barang' => $barang, 'page_name' => 'TLJ | Barang di Lampung', 'page_title' => 'Data Barang Di Lampung', 'bg_color' => 'bg-info']);
    }

    public function getDataSampai()
    {
        //mengambil id user
        $idUser = Auth::guard('customer')->user()->id;

    	// mengambil data dari table barang
        $barang = DB::table('tbl_barang')->where('id_user', $idUser)->where('status_barang', 'TELAH SAMPAI')->get();

    	// mengirim data ke view data-barang
		return view('customer.halaman-data-barang',['barang' => $barang, 'page_name' => 'TLJ | Barang Sampai', 'page_title' => 'Barang Sampai', 'bg_color' => 'bg-success']);
    }

    public function updatePassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'old_password' => 'required',
            'new_password' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'The given data was invalid.',
                'errors' => $validator->errors(),
            ], 422);
        }

        $customer = auth('customer')->user();

        if(! $customer ||! Hash::check($request->old_password, $customer->password)){
            return redirect('/profile')->with('error', 'Password Lama Salah');
        } else {

            $dataCustomer = Customer::find($customer->id);
            $dataCustomer->password =  Hash::make($request->input('new_password'));
            $dataCustomer->save();

            return redirect('/profile')->with('success', 'Password Berhasil di Ubah');
        }

    }

    public function getDetailBarang($resi)
    {
        //mengambil id user
        $idUser = Auth::guard('customer')->user()->id;

        $detail =  DB::table('tbl_barang')->where('id_user', $idUser)->where('no_resi', $resi)->get();
        if(count($detail) != 0){
            return view('customer.halaman-detail-barang', ['detail' => $detail, 'page_name' => 'TLJ | Detail Barang']);
        } else {
            return redirect('/dashboard-customer');
        }
    }

    public function logout(Request $request)
    {

        Auth::guard('customer')->logout();
        // $request->session()->invalidate();
        // $request->session()->regenerateToken();
        return redirect('/login-customer')->with("success", "Berhasil Logout");

    }

}
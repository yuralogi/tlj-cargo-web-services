<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class AdminController extends Controller
{

	public function dashboard()
	{
		$barangJakarta = DB::table('tbl_barang')->where('status_barang', 'DITERIMA DI JAKARTA')->count();
		$barangJalan = DB::table('tbl_barang')->where('status_barang', 'SEDANG DIKIRIM')->count();
		$barangLampung = DB::table('tbl_barang')->where('status_barang', 'DITERIMA DI LAMPUNG')->count();
		$barangSampai = DB::table('tbl_barang')->where('status_barang', 'TELAH SAMPAI')->count();


		return view('admin.dashboard',['page_name' => 'TLJ | Dashboard',
									   'barangJakarta' => $barangJakarta,
									   'barangJalan' => $barangJalan,
									   'barangLampung' => $barangLampung,
									   'barangSampai' => $barangSampai,
                                       'page_title' => 'Dashboard'
									]);
	}

    public function profile()
    {
        return view('admin.profile', ['page_name' => 'Profile Admin', 'page_title' => 'Profile Admin']);
    }

    public function barangJakarta()
    {
        //Validasi Checkbox
        switch (Auth::user()->role) {
            case 'admin_jakarta':
                $hidden = '';
                break;

            case 'admin_lampung' :
                $hidden = 'pilihCheckbox';
                break;
        }

    	// mengambil data dari table barang
    	$barang = DB::table('tbl_barang')->where('status_barang', 'DITERIMA DI JAKARTA')->get();

    	// mengirim data ke view barang-jakarta
		return view('admin.barang-data',['barang' => $barang, 'page_name' =>
                                            'TLJ | Barang Jakarta',
                                            'page_title' => 'Data Barang Jakarta',
                                            'hidden' => $hidden]);
    }

	public function barangPerjalanan()
    {
        //Validasi Checkbox
        switch (Auth::user()->role) {
            case 'admin_jakarta':
                $hidden = 'pilihCheckbox';
                break;

            case 'admin_lampung' :
                $hidden = '';
                break;
        }

    	// mengambil data dari table barang
    	$barang = DB::table('tbl_barang')->where('status_barang', 'SEDANG DIKIRIM')->get();

    	// mengirim data ke view barang-jakarta
		return view('admin.barang-data',['barang' => $barang, 'page_name' => 'TLJ | Barang Di Perjalanan', 'page_title' => 'Data Barang Di Perjalanan','hidden' => $hidden]);
    }

    public function barangLampung()
    {
        //Validasi Checkbox
        switch (Auth::user()->role) {
            case 'admin_jakarta':
                $hidden = 'pilihCheckbox';
                break;

            case 'admin_lampung' :
                $hidden = '';
                break;
        }

        // mengambil data dari table barang
    	$barang = DB::table('tbl_barang')->where('status_barang', 'DITERIMA DI LAMPUNG')->get();

    	// mengirim data ke view barang-jakarta
		return view('admin.barang-data',['barang' => $barang, 'page_name' => 'TLJ | Barang Lampung', 'page_title' => 'Data Barang Lampung', 'hidden' => $hidden]);
    }

    public function barangSampai()
    {
    	// mengambil data dari table barang
    	$barang = DB::table('tbl_barang')->where('status_barang', 'TELAH SAMPAI')->get();

    	// mengirim data ke view barang-jakarta
    	return view('admin.barang-data',['barang' => $barang, 'page_name' => 'TLJ | Barang Sampai', 'page_title' => 'Data Barang Sampai', 'hidden' => 'pilihCheckbox']);
    }

    public function getSettingOngkir()
    {
        $dataOngkir = DB::table('tbl_ongkir')->select('jenis_ongkir', 'tarif_ongkir')->get();

        return view('admin.setting-ongkir', ['page_name' => 'Setting Ongkir',
                                            'page_title' => 'Setting Ongkir',
                                            'data_ongkir' => $dataOngkir]);
    }

    public function getNameByTlp(Request $request)
    {

        $user = DB::table('customers')->where('no_tlp', $request->input('data_telepon'))->get();

        if($user){
            return response()->json(['user' => $user]);
        }else{
            return response()->json(['user' => [] ]);
        }

    }

    public function getDataCustomer()
    {

    	$barang = DB::table('customers')->select('name', 'email', 'no_tlp', 'created_at')->get();

        return view('admin.customer-data', ['page_name' => 'Data Customer', 'page_title' => 'Data Customer', 'data' => $barang]);
    }

	public function store(Request $request)
	{
        if (!$request->isMethod('post')) {
            return redirect('\login-customer');
        }

		$hargaOngkirCollection = DB::table('tbl_ongkir')->where('jenis_ongkir',$request->jenisUkuran)->get();

		foreach($hargaOngkirCollection as $value){
			$hargaOngkir = $value->tarif_ongkir;
		}

		// insert data ke table barang
		DB::table('tbl_barang')->insert([
            'id_user' => $request->idHidden,
			'nama_barang' => $request->namaBarang,
			'nama_pengirim' => $request->namaPengirim,
			'tlp_pengirim' => $request->tlpPengirim,
			'nama_penerima' => $request->namaPenerima,
			'alamat_penerima' => $request->alamatPenerima,
			'tlp_penerima' => $request->tlpPenerima,
			'jumlah_barang' => $request->jumlahBarang,
			'ukuran_barang' => $request->ukuranBarang,
			'jenis_ukuran' => $request->jenisUkuran,
			'cara_packing' => $request->caraPacking,
			'metode_bayar' => $request->metodeBayar,
			'waktu_terima' => date('d F Y H:i:s'),
			'waktu_kirim' => 'empty',
			'waktu_sampai' => 'empty',
			'waktu_diterima' => 'empty',
			'biaya_ongkir' => $hargaOngkir * $request->ukuranBarang * $request->jumlahBarang,
			'no_resi' => 'empty',
			'status_barang' => 'DITERIMA DI JAKARTA'
		]);

		$row = DB::getPdo()->lastInsertId();
		DB::table('tbl_barang')->where('no_resi','empty')->update([
			'no_resi' => date('YmdHis') . $row
		]);

		// alihkan halaman ke halaman barang-jakarta
		return redirect('/barang-jakarta')->with('success', 'Barang Telah di Input');
	}

	public function updateDataBarang(Request $request)
	{
		if($request->input('checkbox_value') == null){
			return Redirect::back()->with('error', 'Pilih Salah Satu Barang');
		}

		switch ($request->input('submit-btn')) {
			case 'updateForm':
				// update data barang
				DB::table('tbl_barang')->whereIn('id_barang', $request->checkbox_value)->update([
					'status_barang' => 'SEDANG DIKIRIM',
					'waktu_kirim' => date('d F Y H:i:s')
				]);
				return redirect('/barang-jakarta')->with('success', 'Barang Telah Di Kirim');
				break;

			case 'deleteForm':

                 //Validasi Role
                switch (Auth::user()->role) {
                    case 'admin_jakarta':
                        // Hapus Data Barang
                        DB::table('tbl_barang')->where('id_barang', $request->checkbox_value)->delete();
                        return redirect('/barang-jakarta')->with('success', 'Barang Telah Di Hapus');
                        break;

                    case 'admin_lampung' :
                        return redirect('/barang-lampung')->with('error', 'Illegal Method');
                }

			case 'updateFormKonfirmasiDiterima':
				// Update Data Barang Sampai Di Lampung
				DB::table('tbl_barang')->whereIn('id_barang',$request->checkbox_value)->update([
					'status_barang' => 'DITERIMA DI LAMPUNG',
					'waktu_sampai' => date('d F Y H:i:s')
				]);
				return redirect('/barang-diperjalanan')->with('success', 'Barang Telah Di Konfirmasi Sampai Lampung');
				break;

			case 'updateFormKonfirmasiSampai':
				// Update Data Barang Sampai Di Lampung
				DB::table('tbl_barang')->whereIn('id_barang', $request->checkbox_value)->update([
					'status_barang' => 'TELAH SAMPAI',
					'waktu_diterima' => date('d F Y H:i:s')
				]);
				return redirect('/barang-lampung')->with('success', 'Barang Telah Di Konfirmasi Sampai Pelanggan');
				break;
		}
	}

    public function updateOngkir(Request $request)
    {
        DB::table('tbl_ongkir')->where('jenis_ongkir', 'Berat')->update([
            'tarif_ongkir' => $request->ongkirBerat,
        ]);

        DB::table('tbl_ongkir')->where('jenis_ongkir', 'Kubikasi')->update([
            'tarif_ongkir' => $request->ongkirKubikasi,
        ]);

        return redirect('/setting-ongkir')->with('success', 'Ongkir Telah di Update');
    }


}

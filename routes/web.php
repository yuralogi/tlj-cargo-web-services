<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//Admin Route
Route::group(['middleware' => ['isLogin']], function () {
    Route::get('/dashboard',[\App\Http\Controllers\AdminController::class, 'dashboard']);
    Route::get('/barang-jakarta',[\App\Http\Controllers\AdminController::class, 'barangJakarta']);
    Route::get('/barang-diperjalanan',[\App\Http\Controllers\AdminController::class, 'barangPerjalanan']);
    Route::get('/barang-lampung',[\App\Http\Controllers\AdminController::class, 'barangLampung']);
    Route::get('/barang-sampai',[\App\Http\Controllers\AdminController::class, 'barangSampai']);
    Route::get('/setting-ongkir', [\App\Http\Controllers\AdminController::class, 'getSettingOngkir']);
    Route::get('/profile-admin', [\App\Http\Controllers\AdminController::class, 'profile']);
    Route::get('/data-customer', [\App\Http\Controllers\AdminController::class, 'getDataCustomer']);
    Route::get('/detail/{resi}', function(string $resi){

        $detail =  DB::table('tbl_barang')->where('no_resi', $resi)->get();
        if(count($detail) != 0){
            return view('admin.barang-detail', ['detail' => $detail, 'page_name' => 'TLJ | Detail Barang']);
        } else {
            return redirect('/dashboard');
        }
    });

    Route::post('update-ongkir', [\App\Http\Controllers\AdminController::class, 'updateOngkir']);
    Route::post('/barang-jakarta/store',[\App\Http\Controllers\AdminController::class, 'store']);
    Route::post('/update-kirim',[\App\Http\Controllers\AdminController::class, 'updateDataBarang']);
    Route::post('/update-sampai',[\App\Http\Controllers\AdminController::class, 'updateDataBarang']);
});

Route::get('/login',[\App\Http\Controllers\LoginController::class, 'index'])->middleware('isNotLogin');
Route::post('/get-name-by-tlp', [\App\Http\Controllers\AdminController::class, 'getNameByTlp']);
Route::post('/authenticate',[\App\Http\Controllers\LoginController::class, 'authenticate']);
Route::post('/logout',[\App\Http\Controllers\LoginController::class, 'logout']);


//Customer Route
Route::get('/',[\App\Http\Controllers\CustomerController::class, 'index']);
Route::get('/login-customer',[\App\Http\Controllers\CustomerController::class, 'login'])->middleware('isNotLoginCustomer');
Route::get('/register-customer', [\App\Http\Controllers\CustomerController::class, 'register']);


Route::group(['middleware' => ['isLoginCustomer']], function () {
    Route::get('/dashboard-customer', [\App\Http\Controllers\CustomerController::class, 'dashboard']);
    Route::get('/data-barang-jakarta', [\App\Http\Controllers\CustomerController::class, 'getDataJakarta']);
    Route::get('/data-barang-jalan', [\App\Http\Controllers\CustomerController::class, 'getDataJalan']);
    Route::get('/data-barang-lampung', [\App\Http\Controllers\CustomerController::class, 'getDataLampung']);
    Route::get('/data-barang-sampai', [\App\Http\Controllers\CustomerController::class, 'getDataSampai']);
    Route::get('/detail-barang/{resi}', [\App\Http\Controllers\CustomerController::class, 'getDetailBarang']);
    Route::get('/profile', [\App\Http\Controllers\CustomerController::class, 'profile']);
    Route::post('/update-password', [\App\Http\Controllers\CustomerController::class, 'updatePassword']);
    Route::post('/update-profile', [\App\Http\Controllers\CustomerController::class], 'updateProfile');
});


Route::post('/cek-resi', [\App\Http\Controllers\CustomerController::class, 'getDataByResi']);
Route::post('/registrasi-store', [\App\Http\Controllers\CustomerController::class, 'storeRegister'])->middleware('isEmailExists');
Route::post('/authenticate-customer',[\App\Http\Controllers\CustomerController::class, 'authenticate']);
Route::post('/logout-customer', [\App\Http\Controllers\CustomerController::class, 'logout']);

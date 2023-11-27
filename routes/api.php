<?php
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post('/authenticate-customer',[\App\Http\Controllers\ApiCustomerController::class, 'authenticate']);

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::post('/change-password', [\App\Http\Controllers\ApiCustomerController::class, 'changePassword']);
    Route::post('/get-data-by-resi', [\App\Http\Controllers\ApiCustomerController::class, 'getDataByResi']);
    Route::post('/get-barang-sampai', [\App\Http\Controllers\ApiCustomerController::class, 'getBarangSampai']);
    Route::post('/get-data-barang', [\App\Http\Controllers\ApiCustomerController::class, 'getDataBarang']);
    Route::post('/logout-customer', [\App\Http\Controllers\ApiCustomerController::class, 'logout']);
});

Route::post('/store-data-register', [\App\Http\Controllers\ApiCustomerController::class, 'storeDataRegister'])
            ->middleware(['apiIsEmailExists', 'apiIsNoTlpExists']);
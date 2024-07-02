<?php

use App\Http\Controllers\BarangController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\JenisBarangController;
use App\Http\Controllers\MerkController;
use App\Http\Controllers\QrcodeController;
use App\Http\Controllers\SatuanController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::resource('dashboard', DashboardController::class);
Route::resource('qrcode', QrcodeController::class);
Route::resource('jenisbarang', JenisBarangController::class);
Route::resource('merk', MerkController::class);
Route::resource('satuan', SatuanController::class);
Route::resource('barang', BarangController::class);
Route::get('test', fn () => phpinfo());

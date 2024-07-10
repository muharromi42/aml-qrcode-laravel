<?php

use App\Http\Controllers\BarangController;
use App\Http\Controllers\CetakController;
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
Route::resource('cetak', CetakController::class);

Route::get('cetak-pdf', [CetakController::class, 'exportPdf'])->name('barang-pdf');
// Route::get('qrcode-pdf', [QrcodeController::class, 'exportPdf'])->name('qrcode-pdf');

Route::get('qrcode-pdf/{id}', [QrcodeController::class, 'exportPdf'])->name('qrcode-pdf');

// Route::get('qrcode/export-pdf/{id}', 'QrcodeController@exportPdf')->name('qrcode.exportPdf');

Route::get('test', fn () => phpinfo());

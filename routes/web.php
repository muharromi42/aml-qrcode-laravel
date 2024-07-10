<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\CetakController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\JenisBarangController;
use App\Http\Controllers\MerkController;
use App\Http\Controllers\QrcodeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SatuanController;
use App\Http\Controllers\UserController;
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



Route::get('/', [AuthController::class, 'index'])->name('login');

Route::get('login', [AuthController::class, 'index'])->name('login');
Route::post('post-login', [AuthController::class, 'postLogin'])->name('login.post');
Route::get('registration', [AuthController::class, 'registration'])->name('register');
Route::get('dashboard', [AuthController::class, 'dashboard'])->name('dashboard');
Route::post('post-registration', [AuthController::class, 'postRegistration'])->name('register.post');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');

Route::resource('users', UserController::class);
Route::resource('roles', RoleController::class);


// Route::resource('dashboard', DashboardController::class);
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

<?php

use App\Http\Controllers\Api\ApiBarangController;
use App\Http\Controllers\BarangController;
use Illuminate\Http\Request;
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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Route::post('/barang/add-quantity', [BarangController::class, 'addQuantity'])->name('barang.addQuantity');
// Route::apiResource('/barang', ApiBarangController::class);

Route::prefix('v1')->group(function () {
    Route::get('/barang', [ApiBarangController::class, 'index']);
    // Route::post('/barang', [ApiBarangController::class, 'store']);
    // Route::get('/barang/{id}', [ApiBarangController::class, 'show']);
    // Route::put('/barang/{id}', [ApiBarangController::class, 'update']);
    // Route::delete('/barang/{id}', [ApiBarangController::class, 'destroy']);

    Route::post('/barang/increase/{kode_barang}', [ApiBarangController::class, 'increaseQuantity']);
});

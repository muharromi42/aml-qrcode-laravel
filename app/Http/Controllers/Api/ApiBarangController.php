<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\barangModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ApiBarangController extends Controller
{
    public function index()
    {
        $barang = barangModel::all();

        return response()->json([
            'status' => 'success',
            'data' => $barang,
        ], 200);
    }

    public function increaseQuantity(Request $request, $kode_barang)
    {
        $validator = Validator::make($request->all(), [
            'jumlah_tambahan' => 'required|integer|min:1', // Menambahkan validasi jumlah_tambahan harus berupa integer positif
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        $barang = barangModel::where('kode_barang', $kode_barang)->first();

        if (!$barang) {
            return response()->json(['error' => 'Barang not found'], 404);
        }

        // Tambahkan jumlah barang
        $barang->jumlah += $request->input('jumlah_tambahan');
        $barang->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Quantity of barang increased successfully',
            'data' => $barang,
        ], 200);
    }
}

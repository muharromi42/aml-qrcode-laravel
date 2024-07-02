<?php

namespace App\Http\Controllers;

use App\Models\barangModel;
use App\Models\qrCodeModel;
use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode as QrCodeGenerator;

class QrcodeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $barangs = barangModel::all();
        return view('qrcodes.index', compact('barangs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_barang' => 'required|exists:tbl_barang,id_barang',
        ]);

        $barang = barangModel::find($request->id_barang);

        // dd($barang);

        $qrCodeData = json_encode([
            'kode_barang' => $barang->kode_barang,
        ]);
        // dd($qrCodeData);
        $qrCodeImage = QrCodeGenerator::format('png')->size(100)->generate($qrCodeData);
        $qrcodebase64 = base64_encode($qrCodeImage);

        qrCodeModel::create([
            'id_barang' => $barang->id_barang,
            'kode_barang' => $barang->kode_barang,
            'qr_code_data' => $qrcodebase64,
        ]);

        // dd($qrCodeImage);

        return redirect()->back()->with('success', 'QR Code berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

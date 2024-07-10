<?php

namespace App\Http\Controllers;

use App\Models\barangModel;
use App\Models\jenisBarangModel;
use App\Models\merkModel;
use App\Models\satuanModel;
use Dompdf\Dompdf;
use Dompdf\Options;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use PDF;

class CetakController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $query_data = new barangModel();
            // $data = barangModel::with(['merk', 'jenisBarang', 'satuan'])->get();
            $data = $query_data::all();
            return DataTables::of($data)
                ->addIndexColumn()
                // fungsi mengubah id jadi nama item
                ->editColumn('id_merk', function ($row) {
                    return $row->merk ? $row->merk->merk : 'N/A';
                })
                ->editColumn('id_jenisbarang', function ($row) {
                    return $row->jenis_barang ? $row->jenis_barang->kategori : 'N/A';
                })
                ->editColumn('id_satuan', function ($row) {
                    return $row->satuan ? $row->satuan->satuan : 'N/A';
                });
        }
        $jenis_barangs = jenisBarangModel::all();
        $merks = merkModel::all();
        $satuans = satuanModel::all();
        return view('cetaks.index', compact('jenis_barangs', 'merks', 'satuans'));
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
        //
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

    public function exportPdf()
    {
        $barangs = barangModel::all();
        $pdf = PDF::loadview('cetaks.cetak', compact('barangs'));
        $pdf->setPaper('A4', 'landscape');
        return $pdf->stream('LaporanBarang.pdf');

        // // Ambil data barang dari model atau sumber data yang sesuai
        // $barangs = barangModel::all();

        // // Buat objek DOMPDF
        // $options = new Options();
        // $options->set('isHtml5ParserEnabled', true); // Aktifkan parser HTML5
        // $dompdf = new Dompdf($options);

        // // Load view ke dalam HTML string
        // $html = view('cetaks.cetak', compact('barangs'))->render();


        // // Load HTML ke DOMPDF
        // $dompdf->loadHtml($html);

        // // Atur ukuran dan orientasi halaman
        // $dompdf->setPaper('A4', 'potrait');

        // // Render PDF (secara default, DOMPDF akan mencoba mengirimkan output ke browser)
        // $dompdf->render();

        // // Beri nama file untuk unduhan
        // $filename = 'data_barang.pdf';

        // // Unduh file PDF langsung ke browser
        // return $dompdf->output($filename);
    }
}

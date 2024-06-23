<?php

namespace App\Http\Controllers;

use App\Models\barangModel;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $query_data = new barangModel();
            $data = $query_data::all();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $editButton = '  <a class="btn btn-primary" href="' . route('barang.edit', $row->id_barang) . '">Edit</a> ';
                    $deleteButton = '
                <form action="' . route('barang.destroy', $row->id_barang) . '"
                method="POST" style="display:inline;"  class="delete-form">
                ' . csrf_field() . method_field('DELETE') . '
                <button type="submit" class="btn btn-danger delete-button">Delete</button>
                </form>
            ';
                    return $editButton . ' ' . $deleteButton;
                })
                ->rawColumns(['action'])->make(true);
        }
        return view('barangs.index');
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
            'nama_barang' => 'required|string|max:255',
            'kode_barang' => 'nullable|string|max:255',
            'kategori' => 'nullable|string|max:255',
            'merk' => 'nullable|string|max:255',
            'satuan' => 'nullable|string|max:255',
            'jumlah' => 'nullable|string|max:255',
        ]);

        // memanggil fungsi generate kode barang
        $kode_barang = $this->generateKodeBarang();

        barangModel::create([
            'nama_barang' => $request->nama_barang,
            'kode_barang' => $kode_barang,
            'id_jenisbarang' => $request->kategori,
            'id_merk' => $request->merk,
            'id_satuan' => $request->satuan,
            'jumlah' => $request->jumlah,
        ]);

        return redirect()->back()->with('success', 'Merk Barang berhasil ditambahkan.');
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
        $barang = barangModel::findOrFail($id);
        return view('barangs.edit', compact('barang'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id_barang)
    {
        // Validasi input
        $request->validate([
            'nama_barang' => 'required|string|max:255',
            'kategori' => 'nullable|string|max:255',
            'merk' => 'nullable|string|max:255',
            'satuan' => 'nullable|string|max:255',
            'jumlah' => 'nullable|string|max:255',
        ]);

        // Temukan item berdasarkan ID
        $barang = barangModel::findOrFail($id_barang);

        // Update item dengan data yang baru
        $barang->nama_barang = $request->input('nama_barang');
        $barang->id_jenisbarang = $request->input('kategori');
        $barang->id_merk = $request->input('merk');
        $barang->id_satuan = $request->input('satuan');
        $barang->jumlah = $request->input('jumlah');
        $barang->save();


        return redirect()->route('barang.index')->with('success', 'Barang updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id_barang)
    {
        $barang = barangModel::find($id_barang);
        $barang->delete();

        return redirect()->route('barang.index')->with('success', 'data barang berhasil di hapus');
    }

    // fungsi generate kode barang BRG-001 dan seterusnya
    public function generateKodeBarang()
    {
        // Ambil kode barang terakhir yang ada di database
        $lastBarang = barangModel::orderBy('id_barang', 'desc')->first();

        // Jika belum ada data, mulai dari BRG-001
        if (!$lastBarang) {
            return 'BRG-001';
        }

        // Ambil kode barang terakhir dan increment
        $lastKode = $lastBarang->kode_barang;
        $lastNumber = (int) substr($lastKode, 4);
        $newNumber = str_pad($lastNumber + 1, 3, '0', STR_PAD_LEFT);

        return 'BRG-' . $newNumber;
    }
}

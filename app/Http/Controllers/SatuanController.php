<?php

namespace App\Http\Controllers;

use App\Models\satuanModel;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class SatuanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $query_data = new satuanModel();
            $data = $query_data::all();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $editButton = '  <a class="btn btn-primary" href="' . route('satuan.edit', $row->id) . '">Edit</a> ';
                    $deleteButton = '
                <form action="' . route('satuan.destroy', $row->id) . '"
                method="POST" style="display:inline;">
                ' . csrf_field() . method_field('DELETE') . '
                <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            ';
                    return $editButton . ' ' . $deleteButton;
                })
                ->rawColumns(['action'])->make(true);
        }
        return view('satuans.index');
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
            'satuan' => 'required|string|max:255',
            'catatan' => 'nullable|string|max:255',
        ]);

        satuanModel::create([
            'satuan' => $request->satuan,
            'catatan' => $request->catatan,
        ]);

        return redirect()->back()->with('success', 'Satuan Barang berhasil ditambahkan.');
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
        $satuan = satuanModel::findOrFail($id);
        return view('satuans.edit', compact('satuan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validasi input
        $request->validate([
            'satuan' => 'required|string|max:255',
            'catatan' => 'nullable|string|max:255',
        ]);

        // Temukan item berdasarkan ID
        $satuan = satuanModel::findOrFail($id);

        // Update item dengan data yang baru
        $satuan->satuan = $request->input('satuan');
        $satuan->catatan = $request->input('catatan');
        $satuan->save();

        return redirect()->route('satuan.index')->with('success', 'satuan Barang updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $satuan = satuanModel::find($id);
        $satuan->delete();

        return redirect()->route('satuan.index')->with('success', 'data satuan barang berhasil di hapus');
    }
}

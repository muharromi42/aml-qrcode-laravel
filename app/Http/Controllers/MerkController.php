<?php

namespace App\Http\Controllers;

use App\Models\merkModel;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class MerkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $query_data = new merkModel();
            $data = $query_data::all();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $editButton = '  <a class="btn btn-primary" href="' . route('merk.edit', $row->id) . '">Edit</a> ';
                    $deleteButton = '
                <form action="' . route('merk.destroy', $row->id) . '"
                method="POST" style="display:inline;">
                ' . csrf_field() . method_field('DELETE') . '
                <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            ';
                    return $editButton . ' ' . $deleteButton;
                })
                ->rawColumns(['action'])->make(true);
        }
        return view('merks.index');
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
            'merk' => 'required|string|max:255',
            'catatan' => 'nullable|string|max:255',
        ]);

        merkModel::create([
            'merk' => $request->merk,
            'catatan' => $request->catatan,
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
        $merk = merkModel::findOrFail($id);
        return view('merks.edit', compact('merk'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validasi input
        $request->validate([
            'merk' => 'required|string|max:255',
            'catatan' => 'nullable|string|max:255',
        ]);

        // Temukan item berdasarkan ID
        $merk = merkModel::findOrFail($id);

        // Update item dengan data yang baru
        $merk->merk = $request->input('merk');
        $merk->catatan = $request->input('catatan');
        $merk->save();

        return redirect()->route('merk.index')->with('success', 'Merk Barang updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $merk = merkModel::find($id);
        $merk->delete();

        return redirect()->route('merk.index')->with('success', 'data merk barang berhasil di hapus');
    }
}

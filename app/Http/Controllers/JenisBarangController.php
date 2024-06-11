<?php

namespace App\Http\Controllers;

use App\Models\jenisBarangModel;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class JenisBarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $query_data = new jenisBarangModel();
            $data = $query_data::all();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    //         $btn = '
                    //  <form action="' . route('jenisbarang.destroy', $row->id) . '"
                    //  method="POST">
                    // <a class="btn btn-primary" href="' . route('jenisbarang.edit', $row->id) . '">Edit</a>
                    // ' . csrf_field() . method_field('DELETE') . '
                    // <button type="submit" class="btn btn-danger">Delete</button>
                    // </form>
                    // ';
                    $btn = '<a href="javascript:void(0)" class="edit btn btn-primary btn-sm">Edit</a>';
                    $btn .= '<a href="javascript:void(0)" class="delete btn btn-danger btn-sm">Delete</a>';
                    return $btn;
                })
                ->rawColumns(['action'])->make(true);
        }
        return view('JenisBarangs.index');
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
            'kategori' => 'required|string|max:255',
            'catatan' => 'nullable|string|max:255',
        ]);

        jenisBarangModel::create([
            'kategori' => $request->kategori,
            'catatan' => $request->catatan,
        ]);

        return redirect()->back()->with('success', 'Jenis Barang berhasil ditambahkan.');
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

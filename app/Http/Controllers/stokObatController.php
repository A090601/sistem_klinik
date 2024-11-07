<?php

namespace App\Http\Controllers;

use App\Models\stokObat;
use App\Models\Supplier;
use Illuminate\Http\Request;

class stokObatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $stokObats = stokObat::with('Supplier')->get();
        $suppliers = Supplier::all();
        return view('pages.stok_obat.index', compact('stokObats', 'suppliers'));
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
            'supplier_id' => 'required|exists:suppliers,id',
            'nama_obat' => 'required|string',
            'jenis_obat' => 'required|string',
            'harga_beli' => 'required|string',
            'jumlah' => 'required|integer',
            'satuan' => 'required|string',
            'total' => 'required|string',
        ]);

        $data = $request->all();

        StokObat::create($data);

        if ($data) {
            toast('Data Berhasil Ditambah', 'success');
        } else {
            toast('Data Gagal Ditambahkan', 'error');
        }
        return redirect()->route('stok.index');
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
        $request->validate([
            'supplier_id' => 'required|exists:suppliers,id',
            'nama_obat' => 'required|string',
            'jenis_obat' => 'required|string',
            'harga_beli' => 'required|string',
            'jumlah' => 'required|integer',
            'satuan' => 'required|string',
            'total' => 'required|string',
        ]);

        $stokObat = stokObat::findOrFail($id);
        $data = $request->all();

        $stokObat->update($data);

        if ($data) {
            toast('Data Berhasil Diupdate', 'success');
        } else {
            toast('Data Gagal Diupdate', 'error');
        }
        return redirect()->route('stok.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $stokObat = stokObat::findOrFail($id);
        $stokObat->delete();



        if ($stokObat) {
            toast('Data Berhasil Dihapus', 'success');
        } else {
            toast('Data Gagal Dihapus', 'error');
        }
        return redirect()->route('stok.index');
    }
}

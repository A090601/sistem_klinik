<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;

class supplierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $suppliers = Supplier::all();
        return view('pages.supplier.index', compact('suppliers'));
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
            'nama' => 'string|required',
            'email' => 'string|required|email:dns|lowercase|unique:suppliers',
            'alamat' => 'string|required',
            'no_telp' => 'string|required'
        ]);


        $data = $request->all();

        Supplier::create($data);

        if ($data) {
            toast('Data Berhasil Ditambah', 'success');
        } else {
            toast('Data Gagal Ditambahkan', 'error');
        }
        return redirect()->route('supplier.index');
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
            'nama' => 'string|required',
            'email' => 'string|required|email:dns|lowercase|unique:suppliers,email,'.$id,
            'alamat' => 'string|required',
            'no_telp' => 'string|required'
        ]);

        $supplier = Supplier::findOrFail($id);
        $data = $request->all();

        $supplier->update($data);

        if ($data) {
            toast('Data Berhasil Diupdate', 'success');
        } else {
            toast('Data Gagal Diupdate', 'error');
        }
        return redirect()->route('supplier.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $supplier = Supplier::findOrFail($id);
        $supplier->delete();

        if ($supplier) {
            toast('Data Berhasil Dihapus', 'success');
        } else {
            toast('Data Gagal Dihapus', 'error');
        }
        return redirect()->route('supplier.index');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Dokter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class dokterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dokters = Dokter::all();
        return view('pages.dokter.index', compact('dokters'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.dokter.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'no_izin' => 'required|string|unique:dokters,no_izin,',
            'nama' => 'required|string',
            'jenis_kelamin' => 'required|string',
            'npwp' => 'required|string|unique:dokters,npwp,',
            'tempat_lahir' => 'required|string',
            'tanggal_lahir' => 'required|date',
            'spesialisasi' => 'required|string',
            'email' => 'required|string|unique:dokters,email,',
            'no_hp' => 'required|string',
            'alamat'=>'required|string',
            'tanggal_masuk' => 'required|date',
            'status'=> 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        $data = $request->all();

        if ($request->image) {

            $data['image'] = $request->file('image')->store('asset/dokter', 'public');
        }

        Dokter::create($data);

        if ($data) {
            toast('Data Berhasil Ditambah', 'success');
        } else {
            toast('Data Gagal Ditambahkan', 'error');
        }
        return redirect()->route('dokter.index');
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
            'no_izin' => 'required|string|unique:dokters,no_izin,'. $id,
            'nama' => 'required|string',
            'jenis_kelamin' => 'required|string',
            'npwp' => 'required|string|unique:dokters,npwp,'. $id,
            'tempat_lahir' => 'required|string',
            'tanggal_lahir' => 'required|date',
            'spesialisasi' => 'required|string',
            'email' => 'required|string|unique:dokters,email,'. $id,
            'no_hp' => 'required|string',
            'alamat'=>'required|string',
            'tanggal_masuk' => 'required|date',
            'status'=> 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        $dokter = Dokter::findOrFail($id);
        $data = $request->all();

        if ($request->image) {
            Storage::delete('public/' . $dokter->image);
            $data['image'] = $request->file('image')->store('asset/dokter', 'public');
        }

        $dokter->update($data);

        if ($data) {
            toast('Data Berhasil Diupdate', 'success');
        } else {
            toast('Data Gagal Diupdate', 'error');
        }
        return redirect()->route('dokter.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $dokter = Dokter::findOrFail($id);
        Storage::delete('public/' . $dokter->image);
        $dokter->delete();
        if ($dokter) {
            toast('Data Berhasil Dihapus', 'success');
        } else {
            toast('Data Gagal Dihapus', 'error');
        }
        return redirect()->route('dokter.index');

    }
}

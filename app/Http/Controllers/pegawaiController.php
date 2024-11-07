<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class pegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pegawais = Pegawai::all();
        return view('pages.pegawai.index', compact('pegawais'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.pegawai.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nip' => 'required|string|unique:pegawais,nip,',
            'nama' => 'required|string',
            'jenis_kelamin' => 'required|string',
            'npwp' => 'required|string|unique:pegawais,npwp,',
            'tempat_lahir' => 'required|string',
            'tanggal_lahir' => 'required|date',
            'jabatan' => 'required|string',
            'email' => 'required|string|unique:pegawais,email,',
            'no_hp' => 'required|string',
            'alamat'=>'required|string',
            'tanggal_masuk' => 'required|date',
            'status'=> 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        $data = $request->all();

        if ($request->image) {
            $data['image'] = $request->file('image')->store('asset/pegawai', 'public');
        }
        Pegawai::create($data);

        if ($data) {
            toast('Data Berhasil Ditambah', 'success');
        } else {
            toast('Data Gagal Ditambahkan', 'error');
        }
        return redirect()->route('pegawai.index');
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
            'nip' => 'required|string|unique:pegawais,nip,'. $id,
            'nama' => 'required|string',
            'jenis_kelamin' => 'required|string',
            'npwp' => 'required|string|unique:pegawais,npwp,'. $id,
            'tempat_lahir' => 'required|string',
            'tanggal_lahir' => 'required|date',
            'jabatan' => 'required|string',
            'email' => 'required|string|unique:pegawais,email,'. $id,
            'no_hp' => 'required|string',
            'alamat'=>'required|string',
            'tanggal_masuk' => 'required|date',
            'status'=> 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        $pegawai = Pegawai::findOrFail($id);
        $data = $request->all();

        if ($request->image) {
            Storage::delete('public/' . $pegawai->image);
            $data['image'] = $request->file('image')->store('asset/pegawai', 'public');
        }

        $pegawai->update($data);

        if ($data) {
            toast('Data Berhasil Diupdate', 'success');
        } else {
            toast('Data Gagal Diupdate', 'error');
        }
        return redirect()->route('pegawai.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pegawai = Pegawai::findOrFail($id);
        Storage::delete('public/' . $pegawai->image);
        $pegawai->delete();
        if ($pegawai) {
            toast('Data Berhasil Dihapus', 'success');
        } else {
            toast('Data Gagal Dihapus', 'error');
        }
        return redirect()->route('pegawai.index');

    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Obat;
use App\Models\stokObat;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;


class obatController extends Controller
{

    public function index()
    {
        $obats = Obat::all();
        return view('pages.obat.index', compact('obats'));
    }

    public function store(Request $request)
    {
        // Validasi request
        $request->validate([
            'pendaftaran_id' => 'required|exists:pendaftarans,id',
            'nama_obat_id' => 'required|exists:stok_obats,id',
            'dosis_obat' => 'required|string',
            'jumlah_obat' => 'required|integer|min:1',
        ]);


        $stokObat = StokObat::findOrFail($request->nama_obat_id);


        if ($request->jumlah_obat > $stokObat->jumlah) {
            Alert::error('Error', 'Stock Obat Tidak Mencukupi');
            return back();
        }


        $obat = Obat::create([
            'pendaftaran_id' => $request->pendaftaran_id,
            'nama_obat_id' => $request->nama_obat_id,
            'dosis_obat' => $request->dosis_obat,
            'jumlah_obat' => $request->jumlah_obat,
        ]);


        $stokObat->jumlah -= $request->jumlah_obat;
        $stokObat->save();


        if ($obat) {
            toast('Data Berhasil Ditambah', 'success');
        } else {
            toast('Data Gagal Ditambahkan', 'error');
        }

        return back();
    }
}

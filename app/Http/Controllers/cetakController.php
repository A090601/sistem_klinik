<?php

namespace App\Http\Controllers;

use App\Models\Obat;
use App\Models\Dokter;
use App\Models\Pendaftaran;
use Illuminate\Http\Request;
use App\Models\tindakanMedis;

class cetakController extends Controller
{
    public function antrian($id)
    {
        $antrian = Pendaftaran::findOrFail($id);
        return view('pages.cetak.antrian', compact('antrian'));
    }

    public function kartuBerobat($id)
    {
        $antrian = Pendaftaran::findOrFail($id);
        return view('pages.cetak.kartu-berobat', compact('antrian'));
    }

    public function kartuTindakan($id)
    {
        $pendaftaran = Pendaftaran::with('tindakanMedis')->findOrFail($id);
        $tindakan = tindakanMedis::with('Pendaftaran')->where('pendaftaran_id', $id)->get();
        $dokter = Dokter::all();
        return view('pages.cetak.tindakan', compact('pendaftaran', 'tindakan', 'dokter'));
    }

    public function kartuObat($id)
    {
        $pendaftaran = Pendaftaran::with('Obat')->findOrFail($id);
        $obats = Obat::with('stokObat')->where('pendaftaran_id', $id)->get();
        return view('pages.cetak.obat', compact('pendaftaran', 'obats'));
    }
}

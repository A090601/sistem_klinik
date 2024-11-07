<?php

namespace App\Http\Controllers;

use App\Models\Dokter;
use App\Models\Pegawai;
use App\Models\Supplier;
use App\Models\Pendaftaran;
use Illuminate\Http\Request;

class dashboardController extends Controller
{
    public function index()
    {
        $dokter = Dokter::all()->count();
        $pegawai = Pegawai::all()->count();
        $pasien = Pendaftaran::all()->count();
        $supplier = Supplier::all()->count();
        return view('pages.dashboard', compact('dokter','supplier','pasien','pegawai'));
    }
}

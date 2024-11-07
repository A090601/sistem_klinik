<?php

namespace App\Http\Controllers;

use App\Models\Dokter;
use App\Models\Antrian;
use App\Models\Pendaftaran;
use Illuminate\Http\Request;

class PendaftaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dokters = Dokter::all();
        $pendaftarans = Pendaftaran::all();
        return view('pages.pendaftaran.index', compact('pendaftarans', 'dokters'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $dokters = Dokter::all();
        return view('pages.dokter.create', compact('dokters'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'no_rekmed' => 'required|string',
            'nama' => 'required|string',
            'status_pasien' => 'required|string',
            'status_panggilan' => 'nullable|string',
            'dokter_id' => 'required|integer',
        ]);

        // Mendapatkan tanggal saat ini
        $tanggalHariIni = now()->toDateString();

        // Cek apakah ada antrian untuk hari ini
        $antrianHariIni = Antrian::where('tanggal', $tanggalHariIni)->first();

        if (!$antrianHariIni) {
            // Jika tidak ada antrian untuk hari ini, buat baru dengan nomor 1
            $no_antrian = 1;
            Antrian::create([
                'no_antrian' => $no_antrian,
                'tanggal' => $tanggalHariIni
            ]);
        } else {
            // Jika sudah ada, increment nomor antrian
            $no_antrian = $antrianHariIni->no_antrian + 1;
            $antrianHariIni->update(['no_antrian' => $no_antrian]);
        }

        // Menambahkan nomor antrian ke dalam data request
        $data = $request->all();
        $data['no_antrian'] = $no_antrian;

        Pendaftaran::create($data);

        if ($data) {
            toast('Data Berhasil Ditambah', 'success');
        } else {
            toast('Data Gagal Ditambahkan', 'error');
        }
        return redirect()->route('pendaftaran.index');
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
    public function update(Request $request, $id)
    {
        $request->validate([
            'no_rekmed' => 'required|string',
            'nama' => 'required|string',
            'status_pasien' => 'required|string',
            'status_panggilan' => 'nullable|string',
            'dokter_id' => 'required|integer',
        ]);

        $pendaftaran = Pendaftaran::findOrFail($id);

        $data = $request->all();
        $pendaftaran->update($data);

        if ($pendaftaran) {
            toast('Data Berhasil Diupdate', 'success');
        } else {
            toast('Data Gagal Diupdate', 'error');
        }

        return redirect()->route('pendaftaran.index');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $pendaftaran = Pendaftaran::findOrFail($id);

        if ($pendaftaran->delete()) {
            toast('Data Berhasil Dihapus', 'success');
        } else {
            toast('Data Gagal Dihapus', 'error');
        }

        return redirect()->route('pendaftaran.index');
    }


    public function approve(Request $request, $id)
    {

        $data       = array();
        $data['status_panggilan']   = $request->status_panggilan;

        Pendaftaran::where('id', $id)->update($data);

        if ($data) {
            toast('Berhasil di panggil', 'success');
        } else {
            toast('Gagal di panggil', 'error');
        }

        return redirect()->route('pendaftaran.index');
    }

    public function dataPasien()
    {
        $pendaftarans = Pendaftaran::all();
        $dokters = Dokter::all();
        return view('pages.pendaftaran.data-pasien', compact('pendaftarans', 'dokters'));
    }
}

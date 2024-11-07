@extends('layouts.template_default')

@section('title', 'Biodata Pasien')
@section('tindakanMedis', 'active')
@section('content')

    @include('sweetalert::alert')

    <div class="card">
        <div class="card-header text-center">
            <h3>BIODATA PASIEN</h3>
        </div>
        @include('pages.tindakan-medis.create')
        @include('pages.obat.create')
        <div class="card-body">
            <table class="table table-bordered">
                <tr>
                    <th>Tanggal Daftar</th>
                    <td>{{ $pendaftaran->created_at->format('d-M-Y') }}</td>
                </tr>
                <tr>
                    <th>No Rekmed</th>
                    <td>{{ $pendaftaran->no_rekmed }}</td>
                </tr>
                <tr>
                    <th>Nama Pasien</th>
                    <td>{{ $pendaftaran->nama }}</td>
                </tr>
                <tr>
                    <th>Nama Dokter</th>
                    <td>{{ $pendaftaran->dokter->nama ?? 'N/A' }}</td>
                </tr>
            </table>

        </div>

    </div>
    <div class="d-flex justify-content-around mt-4">
        @if (auth()->user()->level_id == 1 || auth()->user()->level_id == 3)
            <a class="btn btn-primary" href="#" data-toggle="modal" data-target="#modal-create">Input Tindakan
                Medis</a>
            <a class="btn btn-secondary" href="#" data-toggle="modal" data-target="#modal-create-obat">Input Resep
                Obat</a>
            <a href="{{ route('cetak.kartu.tindakan', $pendaftaran->id) }}" class="btn btn-success">Cetak Laporan Hasil
                Tindakan
                Medis</a>
            <a href="{{ route('cetak.kartu.obat', $pendaftaran->id) }}" class="btn btn-warning">Cetak E-TIKET
                Obat</a>
        @endif
        @if (auth()->user()->level_id == 2)
            <a href="{{ route('cetak.kartu.tindakan', $pendaftaran->id) }}" class="btn btn-success">Cetak Laporan Hasil
                Tindakan
                Medis</a>
            <a href="{{ route('cetak.kartu.obat', $pendaftaran->id) }}" class="btn btn-warning">Cetak E-tiket
                Obat</a>
        @endif
    </div>

    <div class="card mt-4">
        <div class="card-header text-center">
            <h3>RIWAYAT TINDAKAN</h3>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead class="thead-light">
                    <tr>
                        <th>Poli</th>
                        <th>Penyakit</th>
                        <th>Tindakan</th>
                        <th>Hasil Periksa</th>
                        <th>Nama Obat</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tindakan as $record)
                        @if ($record)
                            <tr>
                                <td>{{ $record->Pendaftaran->Dokter->spesialisasi }}</td>
                                <td>{{ $record->nama_penyakit ?? 'N/A' }}</td>
                                <td>{{ $record->nama_tindakan ?? 'N/A' }}</td>
                                <td>{{ $record->hasil_periksa ?? 'N/A' }}</td>
                                <td>{{ $record->nama_obat ?? 'N/A' }}</td>
                            </tr>
                        @else
                            <tr>
                                <td colspan="5">Data tidak ditemukan</td>
                            </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="card mt-4">
        <div class="card-header text-center">
            <h3>RESEP OBAT</h3>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead class="thead-light">
                    <tr>
                        <th>Nama Obat</th>
                        <th>Jenis Obat</th>
                        <th>Dosis Obat</th>
                        <th>Jumlah</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($obats as $obat)
                        <tr>
                            <td>{{ $obat->stokObat->nama_obat }}</td>
                            <td>{{ $obat->stokObat->jenis_obat }}</td>
                            <td>{{ $obat->dosis_obat }}</td>
                            <td>{{ $obat->jumlah_obat }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection

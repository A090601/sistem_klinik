@extends('layouts.template_default')
@section('title', 'Halaman Tindakan Medis')
@section('tindakanMedis', 'active')
@section('content')

    @include('sweetalert::alert')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Halaman Pengeluaran Obat</h1>
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Pasien</th>
                                <th>Nama Obat</th>
                                <th>Jenis Obat</th>
                                <th>Dosis Obat</th>
                                <th>Jumlah</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($obats as $obat)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $obat->Pendaftaran->nama }}</td>
                                    <td>{{ $obat->stokObat->nama_obat }}</td>
                                    <td>{{ $obat->stokObat->jenis_obat }}</td>
                                    <td>{{ $obat->dosis_obat }}</td>
                                    <td>{{ $obat->jumlah_obat }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="10" class="text-center p-5">Data Kosong</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->
@endsection

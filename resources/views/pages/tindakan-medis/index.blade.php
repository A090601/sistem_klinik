@extends('layouts.template_default')
@section('title', 'Halaman Tindakan Medis')
@section('tindakanMedis','active')
@section('content')

@include('sweetalert::alert')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Halaman Tindakan Medis</h1>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Tanggal</th>
                            <th>No Antrian</th>
                            <th>No Rekam Medis</th>
                            <th>Nama</th>
                            <th>Status Pasien</th>
                            <th>Status Panggilan</th>
                            <th>Dokter</th>
                            <th>Poli</th>
                            <th>Tindakan</th>
                            {{-- <th>Kartu Berobat</th> --}}
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($pendaftarans as $pendaftaran)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $pendaftaran->created_at->format('d-M-Y') }}</td>
                            <td>0{{ $pendaftaran->no_antrian }}</td>
                            <td>{{ $pendaftaran->no_rekmed }}</td>
                            <td>{{ $pendaftaran->nama }}</td>
                            <td>{{ $pendaftaran->status_pasien }}</td>
                            <td>
                               @if ($pendaftaran->status_panggilan == 'sudah')
                               <span class="btn btn-xs btn-success"> {{ $pendaftaran->status_panggilan }}</span>
                                @else
                                <span class="btn btn-xs btn-danger"> {{ $pendaftaran->status_panggilan }}</span>
                               @endif
                            </td>
                            <td>{{ $pendaftaran->dokter->nama ?? 'N/A' }}</td>
                            <td>{{ $pendaftaran->dokter->spesialisasi ?? 'N/A' }}</td>
                            <td>
                                <div class="text-center d-flex">
                                    <a href="{{route('tindakan.show', $pendaftaran->id)}}"
                                        class="btn btn-primary btn-sm mx-2">
                                        <i class="fa fa-medkit"></i>
                                    </a>
                                </div>
                            </td>
                            {{-- <td>
                                <div class="text-center d-flex">
                                    <a href="{{route('cetak.kartu.berobat', $pendaftaran->id)}}"
                                        class="btn btn-primary btn-sm mx-2">
                                        <i class="fa fa-print"></i>
                                    </a>
                                </div>
                            </td> --}}
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

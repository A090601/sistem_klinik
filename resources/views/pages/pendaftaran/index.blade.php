@extends('layouts.template_default')
@section('title', 'Halaman Pendaftaran')
@section('pendaftaran','active')
@section('content')

@include('sweetalert::alert')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Halaman Pendaftaran</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a class="btn btn-primary" href="#" data-toggle="modal" data-target="#modal-create"><i class="fa fa-plus"></i> Tambah Pendaftaran</a>
        </div>
        @include('pages.pendaftaran.create')
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
                            <th>Panggilan</th>
                            <th>Action</th>
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
                                <form
                                    action="{{ route('pendaftaran.panggil', $pendaftaran->id) }}"
                                    method="post">
                                    @csrf

                                    <input name="status_panggilan" id="status_panggilan"
                                        type="hidden" value="sudah">
                                    <button class="btn btn-xs btn-primary"
                                        type="submit">Panggil</button>
                                </form>
                            </td>
                            <td>
                                <div class="text-center d-flex">
                                    <a href="#"
                                        class="btn btn-warning btn-sm mx-2"data-toggle="modal" data-target="#modal-edit{{ $pendaftaran->id }}">
                                        <i class="fa fa-pen"></i>
                                    </a>

                                    <form action="{{ route('pendaftaran.destroy', $pendaftaran->id) }}" method="post" class="d-inline">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-danger btn-sm delete_confirm" type="submit">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @include('pages.pendaftaran.edit', ['pendaftaran' => $pendaftaran])
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

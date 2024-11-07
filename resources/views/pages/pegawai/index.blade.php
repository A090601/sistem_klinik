@extends('layouts.template_default')
@section('title', 'Halaman Pegawai')
@section('pegawai','active')
@section('content')

@include('sweetalert::alert')
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Halaman Pegawai</h1>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                                <a class="btn btn-primary" href="#" data-toggle="modal" data-target="#modal-create"><i class="fa fa-plus"></i> Tambah Pegawai</a>
                        </div>
                        @include('pages.pegawai.create')
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nip</th>
                                            <th>Nama</th>
                                            <th>Email</th>
                                            <th>No_hp</th>
                                            <th>Alamat</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Npwp</th>
                                            <th>Tempat_lahir</th>
                                            <th>Tanggal_lahir</th>
                                            <th>Jabatan</th>
                                            <th>Tanggal Masuk</th>
                                            <th>Status</th>
                                            <th>Image</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    {{-- <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <th>Nip</th>
                                            <th>Nama</th>
                                            <th>Email</th>
                                            <th>No_hp</th>
                                            <th>Alamat</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Npwp</th>
                                            <th>Tempat_lahir</th>
                                            <th>Tanggal_lahir</th>
                                            <th>Jabatan</th>
                                            <th>Tanggal Masuk</th>
                                            <th>Status</th>
                                            <th>Image</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot> --}}
                                    <tbody>
                                        @forelse ($pegawais as $pegawai )

                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$pegawai->nip}}</td>
                                            <td>
                                                <a href="#" class="text-decoration-none text-gray-600" data-toggle="modal" data-target="#modal-show{{ $pegawai->id }}">
                                                    {{ $pegawai->nama }}
                                                </a>
                                            </td>
                                            <td>{{$pegawai->email}}</td>
                                            <td>{{$pegawai->no_hp}}</td>
                                            <td>{{$pegawai->alamat}}</td>
                                            <td>{{$pegawai->jenis_kelamin}}</td>
                                            <td>{{$pegawai->npwp}}</td>
                                            <td>{{$pegawai->tempat_lahir}}</td>
                                            <td>{{ \Carbon\Carbon::parse($pegawai->tanggal_lahir)->isoFormat('DD-MM-YYYY') }}</td>
                                            <td>{{$pegawai->jabatan}}</td>
                                            <td>{{ \Carbon\Carbon::parse($pegawai->tanggal_masuk)->isoFormat('DD-MM-YYYY') }}</td>
                                            <td>
                                                @if ($pegawai->status == 'active')
                                                    <span class="badge bg-success text-white">{{$pegawai->status}}</span>
                                                @else
                                                <span class="badge bg-danger text-white">{{$pegawai->status}}</span>
                                                @endif
                                            </td>
                                            <td>
                                                <div class="text-center">
                                                    @if ($pegawai->image)
                                                           <img src="{{ Storage::url($pegawai->image) }}" alt="gambar"
                                                           width="120px"  class="img-fluid">
                                                   @else
                                                       <img alt="image" class="img-fluid tumbnail"
                                                           src="{{ asset('assets/img/user_default.png') }}" width="120px"
                                                           class="tumbnail img-fluid">
                                                   @endif
                                                   </div>
                                            </td>


                                            <td>
                                                <div class="text-center d-flex">
                                                    <a href="#"
                                                        class="btn btn-warning btn-sm mx-2"data-toggle="modal" data-target="#modal-edit{{$pegawai->id}}">
                                                        <i class="fa fa-pen"></i>
                                                    </a>

                                                    <form action="{{ route('pegawai.destroy', $pegawai->id) }}" method="post"
                                                        class="d-inline">
                                                        @csrf
                                                        @method('delete')
                                                        <button class="btn btn-danger btn-sm delete_confirm" type="submit">
                                                            <i class="fa fa-trash"></i>
                                                        </button>
                                                    </form>
                                                 </div>
                                            </td>
                                        </tr>
                                        @include('pages.pegawai.edit')
                                        @include('pages.pegawai.show')
                                        @empty
                                        <tr>
                                            <td colspan="15" class="text-center p-5">Data Kosong</td>
                                         </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->
                @include('pages.pegawai.edit')
@endsection

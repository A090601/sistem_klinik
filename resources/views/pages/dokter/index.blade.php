@extends('layouts.template_default')
@section('title', 'Halaman Dokter')
@section('dokter','active')
@section('content')

@include('sweetalert::alert')
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Halaman Dokter</h1>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                                <a class="btn btn-primary" href="#" data-toggle="modal" data-target="#modal-create"><i class="fa fa-plus"></i> Tambah Dokter</a>
                        </div>
                        @include('pages.dokter.create')
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>No Izin</th>
                                            <th>Nama</th>
                                            <th>Email</th>
                                            <th>No_hp</th>
                                            <th>Alamat</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Npwp</th>
                                            <th>Tempat_lahir</th>
                                            <th>Tanggal_lahir</th>
                                            <th>Spesialisasi</th>
                                            <th>Tanggal Masuk</th>
                                            <th>Status</th>
                                            <th>Image</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    {{-- <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <th>no_izin</th>
                                            <th>Nama</th>
                                            <th>Email</th>
                                            <th>No_hp</th>
                                            <th>Alamat</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Npwp</th>
                                            <th>Tempat_lahir</th>
                                            <th>Tanggal_lahir</th>
                                            <th>no_izin</th>
                                            <th>Tanggal Masuk</th>
                                            <th>Status</th>
                                            <th>Image</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot> --}}
                                    <tbody>
                                        @forelse ($dokters as $dokter )

                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$dokter->no_izin}}</td>
                                            <td>
                                                <a href="#" class="text-decoration-none text-gray-600" data-toggle="modal" data-target="#modal-show{{ $dokter->id }}">
                                                    {{ $dokter->nama }}
                                                </a>
                                            </td>
                                            <td>{{$dokter->email}}</td>
                                            <td>{{$dokter->no_hp}}</td>
                                            <td>{{$dokter->alamat}}</td>
                                            <td>{{$dokter->jenis_kelamin}}</td>
                                            <td>{{$dokter->npwp}}</td>
                                            <td>{{$dokter->tempat_lahir}}</td>
                                            <td>{{ \Carbon\Carbon::parse($dokter->tanggal_lahir)->isoFormat('DD-MM-YYYY') }}</td>
                                            <td>{{$dokter->spesialisasi}}</td>
                                            <td>{{ \Carbon\Carbon::parse($dokter->tanggal_masuk)->isoFormat('DD-MM-YYYY') }}</td>
                                            <td>
                                                @if ($dokter->status == 'active')
                                                    <span class="badge bg-success text-white">{{$dokter->status}}</span>
                                                @else
                                                <span class="badge bg-danger text-white">{{$dokter->status}}</span>
                                                @endif
                                            </td>
                                            <td>
                                                <div class="text-center">
                                                    @if ($dokter->image)
                                                           <img src="{{ Storage::url($dokter->image) }}" alt="gambar"
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
                                                        class="btn btn-warning btn-sm mx-2"data-toggle="modal" data-target="#modal-edit{{$dokter->id}}">
                                                        <i class="fa fa-pen"></i>
                                                    </a>

                                                    <form action="{{ route('dokter.destroy', $dokter->id) }}" method="post"
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
                                        @include('pages.dokter.edit')
                                        @include('pages.dokter.show')
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
                @include('pages.dokter.edit')
@endsection

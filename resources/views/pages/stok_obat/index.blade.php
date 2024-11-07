@extends('layouts.template_default')
@section('title', 'Halaman Stok Obat')
@section('stokObat','active')
@section('content')

@include('sweetalert::alert')
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Halaman Stok Obat</h1>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                                <a class="btn btn-primary" href="#" data-toggle="modal" data-target="#modal-create"><i class="fa fa-plus"></i> Tambah Stok Obat</a>
                        </div>
                        @include('pages.stok_obat.create')
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Supplier</th>
                                            <th>Nama Obat</th>
                                            <th>Jenis Obat</th>
                                            <th>Harga Beli</th>
                                            <th>Jumlah</th>
                                            <th>Satuan</th>
                                            <th>Total</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($stokObats as $stokObat)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{ $stokObat->supplier->nama }}</td>
                                            <td>{{ $stokObat->nama_obat }}</td>
                                            <td>{{ $stokObat->jenis_obat }}</td>
                                            <td>{{ $stokObat->harga_beli }}</td>
                                            <td>{{ $stokObat->jumlah }}</td>
                                            <td>{{ $stokObat->satuan }}</td>
                                            <td>{{ $stokObat->total }}</td>

                                            <td>
                                                <div class="text-center d-flex">
                                                    <a href="#"
                                                        class="btn btn-warning btn-sm mx-2"data-toggle="modal" data-target="#modal-edit{{$stokObat->id}}">
                                                        <i class="fa fa-pen"></i>
                                                    </a>

                                                    <form action="{{ route('stok.destroy', $stokObat->id) }}" method="post"
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
                                        @include('pages.stok_obat.edit')
                                        @empty
                                        <tr>
                                            <td colspan="9" class="text-center p-5">Data Kosong</td>
                                         </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->
                @include('pages.stok_obat.edit')
@endsection

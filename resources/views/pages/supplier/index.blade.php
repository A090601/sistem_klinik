@extends('layouts.template_default')
@section('title', 'Halaman Supplier')
@section('supplier','active')
@section('content')

@include('sweetalert::alert')
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Halaman Supplier</h1>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                                <a class="btn btn-primary" href="#" data-toggle="modal" data-target="#modal-create"><i class="fa fa-plus"></i> Tambah Supplier</a>
                        </div>
                        @include('pages.supplier.create')
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Email</th>
                                            <th>No_hp</th>
                                            <th>Alamat</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($suppliers as $supplier )

                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{ $supplier->nama }}</td>
                                            <td>{{$supplier->email}}</td>
                                            <td>{{$supplier->no_telp}}</td>
                                            <td>{{$supplier->alamat}}</td>
                                            <td>
                                                <div class="text-center d-flex">
                                                    <a href="#"
                                                        class="btn btn-warning btn-sm mx-2"data-toggle="modal" data-target="#modal-edit{{$supplier->id}}">
                                                        <i class="fa fa-pen"></i>
                                                    </a>

                                                    <form action="{{ route('supplier.destroy', $supplier->id) }}" method="post"
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
                                        @include('pages.supplier.edit')
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
                @include('pages.supplier.edit')
@endsection

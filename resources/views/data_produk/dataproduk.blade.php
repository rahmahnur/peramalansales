@extends('layout.app')
@section('content')
    <div class="content-wrapper" style="min-height: 690.2px;">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Data Produk</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Data Produk </li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="pull-left">
                                    <!-- <strong class="card-title">DATA PRODUK</strong> -->
                                    <!-- <div class="pull-right" style="margin-top: 10px; display: flex; justify-content: space-between; align-items: center;"> -->

                                    <a href="/data_produk/tambah" class="btn btn-success btn-sm" style="margin-right: 5px;">
                                        <i class="fa fa-plus"></i> Add
                                    </a>

                                    <!-- Button trigger modal -->
                                    <button type="button" onclick="$('#exampleModal').modal('show')"
                                        class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#exampleModal">
                                        Import Data</button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Import Data</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="">
                                                        <div class="form-group mb-3">
                                                            <!-- <label for="">Pilih file</label> -->
                                                            <input type="file" class= "from-control" name="file">
                                                        </div>
                                                        <!-- <button class="btn btn-succes" type="submit">Import</button> -->
                                                    </form>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">Close</button>
                                                    <button type="button" class="btn btn-primary">Save changes</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <form action="{{ route('data_produk.search') }}" method="get">
                                        <div class="pull-right" style="margin-top: 10px;">
                                            <div class="input-group" style="width: 7cm;">
                                                <input type="search" class="form-control" placeholder="Search Kode Produk"
                                                    style="height: 30px; font-size: 14px;">
                                                <div class=" input-group-append">
                                                    <button type="submit" class="btn btn-default" style="height: 30px;">
                                                        <i class="fa fa-search"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    <div class="card-body table-responsive">
                                        <div class="card-body">
                                            <table class="table table-striped">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">Kode Produk</th>
                                                        <th scope="col">Nama Produk</th>
                                                        <th scope="col">Harga_Produk</th>
                                                        <th scope="col" class="text-center">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($produk as $motor)
                                                        <tr>
                                                            <td>{{ $motor->kode_produk }}</td>
                                                            <td>{{ $motor->nama_produk }}</td>
                                                            <td>{{ $motor->harga_produk }}</td>

                                                            <td class="text-center">
                                                                <a href="/data_produk/edit/{{ $motor->id_produk }}"
                                                                    class="btn btn-primary btn-sm">
                                                                    <i class="fa fa-edit"></i>
                                                                </a>
                                                                <a href="/data_produk/delete/{{ $motor->id_produk }}"
                                                                    class="btn btn-danger btn-sm">
                                                                    <i class="fa fa-trash"></i>
                                                                </a>
                                                            </td>
                                                    @endforeach
                                                    </tr>
                                                </tbody>
                                            </table>
                                            {!! $produk->withQueryString()->links('pagination::bootstrap-5') !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endsection

@extends('layout.app')
@section('content')
<div class="content-wrapper" style="min-height: 690.2px;">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Data Sales</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Data Sales </li>
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
                            <!-- <strong class="card-title">DATA SALES</strong> -->
                        </div>
                        <div class="pull-right">
                            <a href="/data_sales/tambah" class="btn btn-success btn-sm">
                                <i class="fa fa-plus"></i> Add
                            </a>
                            <a href="/data_sales/cetak" class="btn btn-secondary btn-sm">
                                <i class="fa fa-print"></i> Print
                            </a>
                            <!-- <a href="/data_sales/trash" class="btn btn-danger btn-sm">
                                <i class="fa fa-clipboard"></i> Trash
                            </a> -->
                        </div>
                    </div>
                    <div class="card-body table-responsive">
                        <div class="card-body">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">Kode Sales</th>
                                        <th scope="col">Nama Sales</th>
                                        <th scope="col">Umur</th>
                                        <th scope="col">Alamat</th>
                                        <th scope="col" class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($sales as $karyawan)
                                    <tr>
                                        <td>{{ $karyawan->kode_sales }}</td>
                                        <td>{{ $karyawan->nama_sales }}</td>
                                        <td>{{ $karyawan->umur }}</td>
                                        <td>{{ $karyawan->alamat }}</td>
                                        <td class="text-center">
                                            <a href="/data_sales/edit/{{ $karyawan->id_sales }}" class="btn btn-primary btn-sm">
                                            <i class="fa fa-edit"></i>
                                             </a>
                                             <a href="/data_sales/delete/{{ $karyawan->id_sales }}" class="btn btn-danger btn-sm">
                                            <i class="fa fa-trash"></i>
                                             </a>
                                        </td>
                                     @endforeach
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>


@endsection
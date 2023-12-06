@extends('layout.app')
@section('content')
<div class="content-wrapper" style="min-height: 690.2px;">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Data Transaksi</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Data Transaksi </li>
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
                            <a href="/data_transaksi/tambah" class="btn btn-success btn-sm">
                                <i class="fa fa-plus"></i> Add
                            </a>
                            <!-- <a href="/data_transaksi/cetak" class="btn btn-secondary btn-sm">
                                <i class="fa fa-print"></i> Print
                            </a> -->
                            <!-- <a href="/data_transaksi/trash" class="btn btn-danger btn-sm">
                                <i class="fa fa-clipboard"></i> Trash
                            </a> -->
<!-- Button trigger modal -->
<button type="button" onclick="$('#exampleModal').modal('show')" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal">
    Import Data</button>
  
   <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Import Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
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
        <button type="button" class="btn  btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
                        </div>
                    </div>
                    <div class="card-body table-responsive">
                        <div class="card-body">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">Kode Transaksi</th>
                                        <th scope="col">Nama Produk</th>
                                        <th scope="col">Metode Pembayaran</th>
                                        <th scope="col">Tanggal Pengajuan</th>
                                        <th scope="col" class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($transaksi as $penjualan)
                                    <tr>
                                        <td>{{ $penjualan->kode_transaksi }}</td>
                                        <td>{{ $penjualan->dataproduk->nama_produk }}</td>
                                        <td>{{ $penjualan->metode_pembayaran }}</td>
                                        <td>{{ $penjualan->tanggal_pengajuan }}</td>
                                        <td class="text-center">
                                            <a href="/data_transaksi/edit/{{ $penjualan->id_transaksi }}" class="btn btn-primary btn-sm">
                                            <i class="fa fa-edit"></i>
                                             </a>
                                             <a href="/data_transaksi/delete/{{ $penjualan->id_transaksi}}" class="btn btn-danger btn-sm">
                                            <i class="fa fa-trash"></i>
                                             </a>
                                        </td>
                                     @endforeach
                                    </tr>
                                </tbody>
                            </table>
                            {!! $transaksi->withQueryString()->links('pagination::bootstrap-5')!!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>


@endsection
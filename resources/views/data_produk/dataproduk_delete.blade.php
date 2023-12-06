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
              <!-- <li class="breadcrumb-item active">Dashboard Peramalan Tingkat Kinerja Sales Honda Kartika Sari Putra Dinoyo</li> -->
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <div class="content mt-3">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="pull-left">
                                <!-- <strong class="card-title">Inventory</strong> -->
                            </div>
                        </div>
                        <div class="card-body table-responsive">
                            <div class="card-body">
                       
                                <div class="form-login">
                                    <h4>Ingin Menghapus Data ?</h4>
                                    <form action="{{ url('/data_produk/destroy/' . $produk->id_produk) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                    <button type="submit" class="btn btn-simpan" name="hapus"
                                        style="width: 40%; margin: 20px auto;">
                                        <a href={{ url('/data_produk/destroy/' . $produk->id_produk) }}>
                                            Yes
                                        </a>
                                    </button>
                                    <button type="submit" class="btn btn-simpan" name="tidak"
                                        style="width: 40%; margin: 20px auto;">
                                        <a href="/data_produk">
                                            No
                                        </a>
                                    </button>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
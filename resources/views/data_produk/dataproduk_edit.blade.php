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
                                <strong class="card-title">Edit Produk</strong>
                            </div>
                            <div class="pull-right">
                                <a href=" {{ url('/data_produk') }}" style="margin-left: 10px;" class="btn btn-secondary btn-sm">
                                    <i class="fa fa-undo"></i>Back
                                </a>
                            </div>
                        </div>
                        <div class="card-body table-responsive">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4 offset-md-4">
                                        <form action="{{ url('/data_produk/update/' . $produk->id_produk) }}"
                                            method="post">
                                            @csrf
                                            @method('put')
                                            <input type="hidden" name="id" value="">
                                            <div class="form-group">
                                                <label for="kode_produk">Kode Produk</label>
                                                <div class="input-group margin-bottom-sm">
                                                    <span class="input-group-addon"><i class="fa fa-id-badge fa-fw"
                                                            aria-hidden="true"></i></span>
                                                    <input type="text" name="kode_produk"
                                                        class="form-control @error('kode_produk') is-invalid @enderror"
                                                        autofocus placeholder="Kode_produk"
                                                        value="{{ old('kode_produk', $produk->kode_produk) }}" />
                                                </div>
                                                <text>ex : MTC001</text><br><br>
                                            </div>
                                            <div class="form-group">
                                                <label for="nama_produk">Nama Produk</label>
                                                <div class="input-group margin-bottom-sm">
                                                    <span class="input-group-addon"><i class="fa fa-id-badge fa-fw"
                                                            aria-hidden="true"></i></span>
                                                    <input type="text" name="nama_produk"
                                                        class="form-control @error('nama_produk') is-invalid @enderror"
                                                        autofocus placeholder="nama_produk"
                                                        value="{{ old('nama_produk', $produk->nama_produk) }}" />
                                                </div>
                                                <text>ex : Beat</text><br><br>
                                            </div>
                                            <div class="form-group">
                                                <label for="usia">Harga Produk</label>
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="fa fa-id-badge fa-fw"
                                                            aria-hidden="true"></i></span>
                                                    <input type="number" name="harga_produk"
                                                        class="form-control @error('harga_produk') is-invalid @enderror"
                                                        autofocus placeholder="Usia"
                                                        value="{{ old('harga_produk', $produk->harga_produk) }}" />
                                                </div>
                                                <text>ex : 22.000.000</text><br><br>
                                            </div>
                                             <button type="submit" class="btn btn-success" name="edit"><i
                                                    class="fa fa-edit"></i> Edit
                                            </button>
                                        </form>
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
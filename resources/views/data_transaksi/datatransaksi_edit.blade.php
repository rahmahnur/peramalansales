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
                                <strong class="card-title">Edit Transaksi</strong>
                            </div>
                            <div class="pull-right">
                                <a href=" {{ url('/data_transaksi') }}" style="margin-left: 10px;" class="btn btn-secondary btn-sm">
                                    <i class="fa fa-undo"></i>Back
                                </a>
                            </div>
                        </div>
                        <div class="card-body table-responsive">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4 offset-md-4">
                                        <form action="{{ url('/data_transaksi/update/' . $transaksi->id_transaksi) }}"
                                            method="post">
                                            @csrf
                                            @method('put')
                                            <input type="hidden" name="id" value="">
                                            <div class="form-group">
                                                <label for="kode_transaksi">Kode Transaksi</label>
                                                <div class="input-group margin-bottom-sm">
                                                    <!-- <span class="input-group-addon"><i class="fa fa-id-badge fa-fw"
                                                            aria-hidden="true"></i></span> -->
                                                    <input type="text" name="kode_transaksi"
                                                        class="form-control @error('kode_transaksi') is-invalid @enderror"
                                                        autofocus placeholder="Kode_transaksi"
                                                        value="{{ old('kode_transaksi', $transaksi->kode_transaksi) }}" />
                                                </div>
                                                <text>ex : TR001</text><br><br>
                                            </div>
                                            <div class="form-group">
                                                <label for="id_produk">Nama Produk</label>
                                                <select class="form-control" name="id_produk">
                                                    @foreach ($produk as $produk)
                                                        <option class="form-control @error('id_produk') is-invalid @enderror" value="{{ old('id_produk') . $produk->id_produk }}">{{ $produk->nama_produk }}
                                                            @error('id_produk')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                        </option>
                                                    @endforeach
                                                </select><br>
                                            </div>
                                            <div class="form-group">
                                                <label for="metode_pembayaran">Metode Pembayaran</label>
                                                <div class="input-group">
                                                    <!-- <span class="input-group-addon"><i class="fa fa-phone fa-fw"
                                                            aria-hidden="true"></i></span> -->
                                                    <input type="text" name="metode_pembayaran"
                                                        class="form-control @error('metode_pembayaran') is-invalid @enderror"
                                                        autofocus placeholder="Metode Pembayaran"
                                                        value="{{ old('metode_pembayaran', $transaksi->metode_pembayaran) }}" />
                                                </div>
                                                <text>ex : Cash/Kredit/text><br><br>
                                            </div>
                                            <div class="form-group">
                                                <label for="tanggal_pengajuan">Tanggal Pengajuan</label>
                                                <div class="input-group">
                                                    <!-- <span class="input-group-addon"><i class="fa fa-phone fa-fw"
                                                            aria-hidden="true"></i></span> -->
                                                    <input type="date" name="tanggal_pengajuan"
                                                        class="form-control @error('tanggal_pengajuan') is-invalid @enderror"
                                                        autofocus placeholder="Tanggal Pengajuan"
                                                        value="{{ old('tanggal_pengajuan', $transaksi->tanggal_pengajuan) }}" />
                                                </div>
                                                <text>ex : Cash/Kredit
                                                    <text><br><br>
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
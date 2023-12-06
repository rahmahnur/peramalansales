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
                                <strong class="card-title">Tambah Sales</strong>
                            </div>
                            <div class="pull-right">
                                <a href=" {{ url('/data_sales') }}" class="btn btn-secondary btn-sm">
                                    <i class="fa fa-undo"></i>Back
                                </a>
                            </div>
                        </div>
                        <div class="card-body table-responsive">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4 offset-md-4">
                                        <form action="{{ url('/data_sales/store') }}" method="post">
                                            @csrf
                                            <div class="form-group">
                                                <label for="kode_sales">Kode Sales</label>
                                                <div class="input-group margin-bottom-sm">
                                                    <span class="input-group-addon"><i class="fa fa-user fa-fw"
                                                            aria-hidden="true"></i></span>
                                                    <input type="text" name="kode_sales"
                                                        class="form-control @error('kode_sales') is-invalid @enderror"
                                                        value="{{ old('kode_sales') }}" autofocus
                                                        placeholder="kode_sales">
                                                    @error('kode_sales')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <text>ex : SL001</text><br><br>
                                            </div>
                                            <div class="form-group">
                                                <label for="nama_sales">Nama Sales</label>
                                                <div class="input-group margin-bottom-sm">
                                                    <span class="input-group-addon"><i class="fa fa-user fa-fw"
                                                            aria-hidden="true"></i></span>
                                                    <input type="text" name="nama_sales"
                                                        class="form-control @error('nama_sales') is-invalid @enderror"
                                                        value="{{ old('nama_sales') }}" autofocus
                                                        placeholder="nama_sales">
                                                    @error('nama_sales')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <text>ex : Ana Anindita</text><br><br>
                                            </div>
                                            <div class="form-group">
                                                <label for="umur">Umur</label>
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="fa fa-home fa-fw"
                                                            aria-hidden="true"></i></span>
                                                    <input type="number" name="umur"
                                                        class="form-control @error('umur') is-invalid @enderror"
                                                        value="{{ old('umur') }}" autofocus placeholder="umur">
                                                    @error('umur')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <text>ex : 23</text><br><br>
                                                </div>
                                            <div class="form-group">
                                                <label for="alamat">Alamat</label>
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="fa fa-home fa-fw"
                                                            aria-hidden="true"></i></span>
                                                    <input type="text" name="alamat"
                                                        class="form-control @error('alamat') is-invalid @enderror"
                                                        value="{{ old('alamat') }}" autofocus placeholder="alamat">
                                                    @error('alamat')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <text>ex : Malang</text><br><br>
                                                <button type="submit" class="btn btn-success" name="simpan"><i
                                                    class="fa fa-save"></i> Save
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
</div>
@endsection

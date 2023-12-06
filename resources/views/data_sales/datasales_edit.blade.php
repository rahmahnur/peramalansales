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
                                <strong class="card-title">Sales</strong>
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
                                        <form action="{{ url('/data_sales/update/' . $sales->id_sales) }}"
                                            method="post">
                                            @csrf
                                            @method('put')
                                            <input type="hidden" name="id" value="">
                                            <div class="form-group">
                                                <label for="kode_sales">Kode Sales</label>
                                                <div class="input-group margin-bottom-sm">
                                                    <span class="input-group-addon"><i class="fa fa-id-badge fa-fw"
                                                            aria-hidden="true"></i></span>
                                                    <input type="text" name="kode_sales"
                                                        class="form-control @error('kodesales_') is-invalid @enderror"
                                                        autofocus placeholder="kode_sales"
                                                        value="{{ old('kode_sales', $sales->kode_sales) }}" />
                                                </div>
                                                <text>ex : H1B02N42S1AU</text><br><br>
                                            </div>
                                            <div class="form-group">
                                                <label for="nama_sales">Nama Sales</label>
                                                <div class="input-group margin-bottom-sm">
                                                    <span class="input-group-addon"><i class="fa fa-user fa-fw"
                                                            aria-hidden="true"></i></span>
                                                    <input type="text" name="nama_sales"
                                                        class="form-control @error('nama_sales') is-invalid @enderror"
                                                        autofocus placeholder="nama_sales"
                                                        value="{{ old('nama_sales', $sales->nama_sales) }}" />
                                                </div>
                                                <text>ex : Beat</text><br><br>
                                            </div>
                                            <div class="form-group">
                                                <label for="umur">Umur</label>
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="fa fa-phone fa-fw"
                                                            aria-hidden="true"></i></span>
                                                    <input type="number" name="umur"
                                                        class="form-control @error('umur') is-invalid @enderror"
                                                        autofocus placeholder="Usia"
                                                        value="{{ old('umur', $sales->umur) }}" />
                                                </div>
                                                <text>ex : 22</text><br><br>
                                                <div class="form-group">
                                                <label for="alamat">Alamat</label>
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="fa fa-phone fa-fw"
                                                            aria-hidden="true"></i></span>
                                                    <input type="text" name="alamat"
                                                        class="form-control @error('alamat') is-invalid @enderror"
                                                        autofocus placeholder="Usia"
                                                        value="{{ old('alamat', $sales->alamat) }}" />
                                                </div>
                                                <text>ex : Malang</text><br><br>
                                            <!-- <div class="form-group">
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
                                                <text>ex : 23</text><br><br> -->
                                                <!-- </div>
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
                                                <text>ex : Malang</text><br><br> -->
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
@extends('layout.app')
@section('content')
    <div class="content-wrapper" style="min-height: 690.2px;">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Peramalan</h1>
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
                                    <form method="get" action="/data/peramalan/view/data2">
                                        @csrf
                                        <legend>View Data</legend>
                                        <div class="mb-3">
                                            <label class="form-label">Alpa</label>
                                            <select name="alpa" class="form-select">
                                                <option value="0.1">0.1</option>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Nama Produk</label>
                                            <select name="alpa" class="form-select">
                                                <option value="0.1">0.1</option>
                                            </select>
                                        </div>

                                        <button type="input" class="btn btn-success">Add</button>
                                    </form>
                                </div>
                            </div>
                            <div class="card-body table-responsive">
                                <div class="card-body">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th scope="col">Tahun</th>
                                                <th scope="col">Bulan</th>
                                                <th scope="col">Nama Produk</th>
                                                <th scope="col">Jumlah</th>
                                                <th scope="col">A'</th>
                                                <th scope="col">A''</th>
                                                <th scope="col">at</th>
                                                <th scope="col">bt</th>
                                                <th scope="col">Forecast</th>
                                                <th scope="col">PE</th>
                                            </tr>
                                        </thead>
                                        <tbody>

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

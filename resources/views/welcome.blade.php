@extends('layout.admin')
@section('content')
<div class="content-wrapper" style="min-height: 690.2px;">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
             <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
              <form action="/logout" method="POST" class="logout-form">
                        @csrf
                        <button type="submit" style="margin-left: 20px;" class="btn btn-danger btn-sm">
                            <i class="fas fa-sign-out-alt"></i> Logout
                        </button>
                    </form>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Info boxes -->
        <div class="row">
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-info elevation-1"> <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-book-half" viewBox="0 0 16 16">
  <path d="M8.5 2.687c.654-.689 1.782-.886 3.112-.752 1.234.124 2.503.523 3.388.893v9.923c-.918-.35-2.107-.692-3.287-.81-1.094-.111-2.278-.039-3.213.492V2.687zM8 1.783C7.015.936 5.587.81 4.287.94c-1.514.153-3.042.672-3.994 1.105A.5.5 0 0 0 0 2.5v11a.5.5 0 0 0 .707.455c.882-.4 2.303-.881 3.68-1.02 1.409-.142 2.59.087 3.223.877a.5.5 0 0 0 .78 0c.633-.79 1.814-1.019 3.222-.877 1.378.139 2.8.62 3.681 1.02A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.293-.455c-.952-.433-2.48-.952-3.994-1.105C10.413.809 8.985.936 8 1.783z"/>
</svg></span>

              <div class="info-box-content">
              <a href="/data_produk" class="nav-link">
              <span class="info-box-text">Produk</span>
                <span class="info-box-number">CUB,MATIC,SPORT</span>
                <!-- <span class="info-box-number">ADV,Supra,Revo,CRF,CB</span> -->
              </div>
              </a>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->


          <!-- <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
            <span class="info-box-icon bg-success elevation-1"><i class="fas fa-users"></i></span>
<div class="info-box-content">
                <span class="info-box-text">Sales</span>
                <span class="info-box-number">7</span>
              </div> -->
              <!-- /.info-box-content -->
            <!-- </div> -->
            <!-- /.info-box -->
          <!-- </div> -->
          <!-- /.col -->
          
          
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">

            <span class="info-box-icon bg-danger elevation-1"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-calendar2-day" viewBox="0 0 16 16">
  <path d="M4.684 12.523v-2.3h2.261v-.61H4.684V7.801h2.464v-.61H4v5.332h.684zm3.296 0h.676V9.98c0-.554.227-1.007.953-1.007.125 0 .258.004.329.015v-.613a1.806 1.806 0 0 0-.254-.02c-.582 0-.891.32-1.012.567h-.02v-.504H7.98v4.105zm2.805-5.093c0 .238.192.425.43.425a.428.428 0 1 0 0-.855.426.426 0 0 0-.43.43zm.094 5.093h.672V8.418h-.672v4.105z"/>
  <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM2 2a1 1 0 0 0-1 1v11a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1H2z"/>
  <path d="M2.5 4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5H3a.5.5 0 0 1-.5-.5V4z"/>
</svg></span>
              <div class="info-box-content">
              <a href="/data_transaksi" class="nav-link">
                <span class="info-box-text">Transaksi</span>
                <span class="info-box-number">Penjualan  </span>
              </div>
            </a>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

          <!-- fix for small devices only -->
          <div class="clearfix hidden-md-up"></div>
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
            <span class="info-box-icon bg-warning elevation-1"> <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-graph-up" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M0 0h1v15h15v1H0V0Zm14.817 3.113a.5.5 0 0 1 .07.704l-4.5 5.5a.5.5 0 0 1-.74.037L7.06 6.767l-3.656 5.027a.5.5 0 0 1-.808-.588l4-5.5a.5.5 0 0 1 .758-.06l2.609 2.61 4.15-5.073a.5.5 0 0 1 .704-.07Z"/>
</svg></span>
              <div class="info-box-content">
              <a href="/peramalan" class="nav-link">
                <span class="info-box-text">Peramalan</span>
                <span class="info-box-number">Metode DES</span>
              </div>
              </a>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
        </div>
        <!-- <div class="cards-categories">
					<h3>PRODUK SEPEDA MOTOR HONDA</h3>
					<div class="card-categories">
						<div class="card">
							<img src="assets/CUB.png" alt="" />
							<h5>KATEGORI CUB</h5>
							<p>
              Honda Cub adalah kategori sepeda motor yang sangat terkenal dan ikonik yang pertama kali diperkenalkan oleh Honda dengan model Super Cub pada tahun 1958. Secara umum, sepeda motor jenis Cub memiliki beberapa ciri khas yang membuatnya sangat populer dan sukses di seluruh dunia.
							</p>
						</div>

            <div class="card-categories">
						<div class="card">
							<img src="assets/CUB.png" alt="" />
							<h5>KATEGORI MATIC</h5>
							<p>
             Honda Matic adalah jenis sepeda motor yang memiliki transmisi otomatis. Transmisi otomatis pada sepeda motor matic memungkinkan pengendara untuk berkendara tanpa perlu mengoperasikan kopling manual atau mengubah gigi secara manual. Ini membuat sepeda motor matic menjadi pilihan yang lebih mudah dikendarai, terutama dalam situasi lalu lintas perkotaan atau perjalanan jarak pendek	
            </p>
				    </div>

            <div class="card-categories">
						<div class="card">
							<img src="assets/CUB.png" alt="" />
							<h5>KATEGORI SPORT</h5>
							<p>
              Sepeda motor sport Honda mencakup berbagai model yang dirancang untuk memberikan pengalaman berkendara sporty dan dinamis. Sepeda motor sport Honda memiliki desain yang menonjol dan sporty. Garis-garis tajam, bodi aerodinamis, dan detail estetika yang menarik seringkali menjadi ciri khasnya.
Desain ini tidak hanya memberikan tampilan yang menarik tetapi juga meningkatkan performa aerodinamis dan stabilitas pada kecepatan tinggi.	</p>
						</div>
         -->
        <!-- /.row -->
    <!-- /.content -->
  </div>


  @endsection
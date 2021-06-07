<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>Yubis Sayur</title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="<?php echo base_url('assets');?>/plugins/fontawesome-free/css/all.min.css">
  <!-- IonIcons -->
  <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url('assets');?>/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

   <!-- DataTables -->
   <link rel="stylesheet" href="<?php echo base_url('assets');?>/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?php echo base_url('assets');?>/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="<?php echo base_url('assets');?>/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  
</head>

<style>
.zoom {
  padding: 50px;
  transition: transform .2s; /* Animation */
  width: 200px;
  height: 50px;
  margin: 0 auto;
}

.zoom:hover {
  transform: scale(4.0); /* (150% zoom - Note: if the zoom is too large, it will go outside of the viewport) */
}
ul
{
list-style-type: none;
}
</style>

<!--
BODY TAG OPTIONS:
=================
Apply one or more of the following classes to to the body tag
to get the desired effect
|---------------------------------------------------------|
|LAYOUT OPTIONS | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
-->
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Home</a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <img src="https://yubissayur.com/wp-content/uploads/2020/07/cropped-icon-1-180x180.png" alt="Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Yubis Sayur</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <?php $seg = $this->uri->segment(1); $seg2 = $this->uri->segment(2); ?>
          <li class="nav-item">
            <a href="<?php echo site_url("dashboard") ?>" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Beranda
              </p>
            </a>
          </li>
          <?php 
            $status = $this->session->userdata('userId');
            if($status == '1'){
          ?>
          <li class="nav-item">
            <a href="<?php echo site_url("operator") ?>" class="nav-link <?php echo $seg == 'operator' ? 'active' : "" ?>">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Operator
              </p>
            </a>
          </li>
            <?php } ?>
          <li class="nav-item <?php if($seg == 'product' || $seg == 'product-category'){ echo 'menu-open'; } ?>" >
            <a href="#" class="nav-link " >
              <i class="nav-icon fas fa-lemon"></i>
              <p>
                Produk
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo site_url("product") ?>" class="nav-link <?php echo $seg == 'product' ? 'active' : "" ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Produk</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="<?php echo site_url("product-category") ?>" class="nav-link <?php echo $seg == 'product-category' ? 'active' : "" ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Kategori</p>
                </a>
              </li>
              
            </ul>
          </li>
          <li class="nav-item" >
            <a href="<?php echo site_url("pelanggan") ?>" class="nav-link <?php echo $seg == 'pelanggan' ? 'active' : "" ?>" >
              <i class="nav-icon fas fa-user-tag"></i>
              <p>
                Pelanggan
              </p>
            </a>
          </li>
          
          

          <li class="nav-item <?php echo $seg == 'pesanan' ? 'menu-open' : "" ?>">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-shopping-cart "></i>
              <p>
                Pesanan
                <i class="fas fa-angle-left right"></i>
                <?php 
                   $baru = count($this->pesanan_model->get_pesanan_baru());
                   $proses = count($this->pesanan_model->get_pesanan_proses());
                  //  $selesai = count($this->pesanan_model->get_pesanan_baru());
                  //  $batal = count($this->pesanan_model->get_pesanan_baru());
                  if(!empty($baru)){
                    $baru = $baru;
                  }else{
                    $baru = 0;
                  }
                  if(!empty($proses)){
                    $proses = $proses;
                  }else{
                    $proses = 0;
                  }
                  $pesanan = $baru + $proses;
                ?>
                <span class="badge badge-danger right"><?php echo $pesanan == 0 ? "" : $pesanan; ?></span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item ">
                <a href="<?php echo site_url("pesanan/baru") ?>" class="nav-link <?php echo $seg2 == 'baru' ? 'active' : "" ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Baru
                  <span class="badge badge-danger right"><?php echo $baru == 0 ? "" : $baru; ?></span>
                  </p>
                </a>
              </li>
              <li class="nav-item ">
                <a href="<?php echo site_url("pesanan/proses") ?>" class="nav-link <?php echo $seg2 == 'proses' ? 'active' : "" ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Proses</p>
                  <span class="badge badge-danger right"><?php  echo $proses == 0 ? "" : $proses; ?></span>
                </a>
              </li>

              <li class="nav-item ">
                <a href="<?php echo site_url("pesanan/selesai") ?>" class="nav-link <?php echo $seg2 == 'selesai' ? 'active' : "" ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Selesai</p>
                </a>
              </li>

              <li class="nav-item ">
                <a href="<?php echo site_url("pesanan/batal") ?>" class="nav-link <?php echo $seg2 == 'batal' ? 'active' : "" ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Batal</p>
                </a>
              </li>
              
            </ul>
          </li>

          <li class="nav-item">
            <a href="<?php echo site_url("kecamatan") ?>" class="nav-link <?php echo $seg == 'kecamatan' ? 'active' : "" ?>">
              <i class="nav-icon fas fa-map-marked-alt"> </i>
              <p>
                Kecamatan
              </p>
            </a>
          </li>

          <li class="nav-item" >
            <a href="<?php echo site_url("tanggal-libur") ?>" class="nav-link <?php echo $seg == 'tanggal-libur' ? 'active' : "" ?>" >
              <i class="nav-icon fas fa-calendar"></i>
              <p>
                Tanggal Libur
              </p>
            </a>
          </li>

          <li class="nav-item" >
            <a href="<?php echo site_url("rekap-belanja") ?>" class="nav-link <?php echo $seg == 'rekap-belanja' ? 'active' : "" ?>" >
              <i class="nav-icon fas fa-flag"></i>
              <p>
                Rekap Belanja
              </p>
            </a>
          </li>

          <li class="nav-header"></li>
          <li class="nav-item">
            <a href="<?php echo site_url("login/logout") ?>" class="nav-link">
              <i class="nav-icon fas fa-sign-out-alt"></i>
              <p class="text">Keluar</p>
            </a>
          </li>
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

 

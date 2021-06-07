  
     <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            
          </div><!-- /.col -->
          <div class="col-sm-12">
            
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Info boxes -->
        <div class="row">
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-spinner"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Jumlah Pesanan</span>
                <?php 
                    $pesan = $this->pesanan_model->jml_pesanan();
                ?>
                <span class="info-box-number">
                  <?php echo count($pesan); ?>
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>

          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-cog"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Rata-rata Pesanan<br>per Hari</span>
                <?php 
                    $avg = $this->pesanan_model->get_avg_pesanan()->avg;
                ?>
                <span class="info-box-number">
                  <?php echo abs($avg); ?>
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-dark elevation-1"><i class="fas fa-lemon"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Total Produk</span>
                <?php 
                  $produk = count($this->product_model->get_produk_all2());
                ?>
                <span class="info-box-number"><?php echo $produk; ?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

          <!-- fix for small devices only -->
          <div class="clearfix hidden-md-up"></div>

          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-primary elevation-1"><i class="fas fa-users"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Total Pelanggan</span>
                <?php 
                    $pelanggan = count($this->product_model->get_pelanggan_all());
                ?>
                <span class="info-box-number"><?php echo $pelanggan ?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-success elevation-1"><i class="fas fa-shopping-cart"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Total Penjualan</span>
                <?php 
                    $transaksi = $this->pesanan_model->jml_pesanan_selesai()->jumlah;
                ?>
                <span class="info-box-number"><?php echo "Rp".number_format($transaksi) ?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-light elevation-1"><i class="fas fa-thumbs-up"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Rata - Rata Penjualan<br> Per Hari</span>
                <?php 
                    $avg_penjualan = $this->pesanan_model->avg_pesanan_selesai()->avg;
                ?>
                <span class="info-box-number"><?php echo "Rp".number_format(abs($avg_penjualan)); ?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          
        </div>
        <!-- /.row -->
      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
  </div>
    <!-- /.content -->
  <!-- /.content-wrapper -->
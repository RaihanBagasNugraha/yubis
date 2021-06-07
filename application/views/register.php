<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Registrasi</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url('assets');?>/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?php echo base_url('assets');?>/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url('assets');?>/dist/css/adminlte.min.css">
</head>
<body class="hold-transition register-page">
<div class="register-box">
  <div class="register-logo">
  <a href="<?php echo site_url('register') ?>"><img src="https://yubissayur.com/wp-content/uploads/2020/07/cropped-icon-1-180x180.png" alt="Logo" class="brand-image img-circle elevation-3" style="opacity: .8"></a>
  </div>

  <div class="card">
    <div class="card-body register-card-body">
      <p class="login-box-msg">Daftar Akun Baru</p>
                <?php if ($this->session->flashdata('error')) : ?>
                <div class="alert alert-danger" role="alert">
                  <!-- <h4 class="alert-heading"></h4> -->
                  <p class="mb-0"><?php echo $this->session->flashdata('error'); ?></p>
                </div>
                <?php endif; ?>

                <?php if ($this->session->flashdata('success')) : ?>
                <div class="alert alert-success" role="alert">
                  <!-- <h4 class="alert-heading"></h4> -->
                  <p class="mb-0"><?php echo $this->session->flashdata('success'); ?></p>
                </div>
                <?php endif; ?>
      <form action="<?php echo site_url('login/periksa_daftar') ?>" method="post">
        <div class="input-group mb-3">
          <input type="text" class="form-control" name='nama' required placeholder="Nama">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="email" class="form-control" name='email' required placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" name='password' required placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <select name="status" required class='form-control' id="">
                <option value="1" selected >1</option>
                <option value="2">2</option>
          </select>
        </div>
        
        <div class="row">
          <div class="col-8">
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Register</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <a href="<?php echo site_url("login") ?>" class="text-center">Login</a>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<!-- /.register-box -->

<!-- jQuery -->
<script src="<?php echo base_url('assets');?>/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url('assets');?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url('assets');?>/dist/js/adminlte.min.js"></script>
</body>
</html>


     <!-- Content Wrapper. Contains page content -->
     <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Rekap Belanja</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Main row -->
        <div class="row">
          <!-- <div class="col-md-8">
          
          </div> -->
          <div class="col-md-3">
          </div>
          <div class="col-md-6">
              <!-- general form elements -->
            <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">Pilih Tanggal</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form target="_blank" action="<?php echo site_url('pesanan/rekap_belanja_lihat') ?>" method="post" enctype="multipart/form-data">
                <div class="card-body">
                <div class="form-group">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Tanggal</label>
                    <input type='text' required name='tgl' placeholder= "cth: 2020-12-21" id='tgl' class='form-control tgl' value="" />
                  </div>
                  
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button style="float: right;" type="submit" class="btn btn-info">Lihat</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
        <?php
        
        ?>
      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<script src="<?php echo site_url("assets/scripts/jquery_3.4.1_jquery.min.js") ?>"></script>
<script src="<?php echo site_url("assets/scripts/select2.full.js") ?>"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2"></script>

<script>
$(".passingID").click(function () {
    var id = $(this).attr('data-id');
    $("#ID_tgl").val( id );
});

$( function() {
    $('.tgl').datepicker({
        dateFormat : 'yy-mm-dd',
        changeMonth: true,
        changeYear: true
    });
  } );
</script>
  

 

 

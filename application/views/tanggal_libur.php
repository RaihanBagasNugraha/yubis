
     <!-- Content Wrapper. Contains page content -->
     <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Tanggal Libur</h1>
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
          <div class="col-md-8">
            <div class="card card-outline card-primary">
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th style="width: 20%;">NO</th>
                    <th style="width: 50%;">TANGGAL</th>
                    <th style="width: 30%;">AKSI</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php 
                        $tgl = $this->product_model->get_tgl_libur();
                        $no = 0;
                        foreach($tgl as $row){
                    ?>
                        <tr>
                            <td style="text-align:center"><?php echo ++$no ?></td>
                            <td><?php echo $row->tgl ?></td>
                            <td style="text-align:center">
                            <?php
                              $today = date("Y-m-d"); 
                              if($today > $row->tgl){
                                  
                              }else{
                            ?>
                            <a href="<?php echo site_url('tanggal-libur?aksi=ubah&id='.$row->ID) ?>" class="btn btn-sm btn-warning">Ubah</a> 
                            <?php } ?>
                            <a href='' class="btn btn-danger btn-sm passingID" data-id='<?php echo $row->ID ?>' data-toggle="modal" data-target="#delete-tgl">Hapus</a></td>
                        </tr>
                    <?php } ?>
                  </tbody>
                  <tfoot>
                  <tr>
                  <th style="width: 20%;">NO</th>
                    <th style="width: 50%;">TANGGAL</th>
                    <th style="width: 30%;">AKSI</th>
                    
                  </tr>
                  
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        <?php 
            $aksi = $this->input->get('aksi');
            if($aksi == 'ubah'){
                $id = $this->input->get('id');
                $tgl_data = $this->product_model->get_tgl_libur_id($id);
            }
        ?>
          <div class="col-md-4">
              <!-- general form elements -->
            <div class="card <?php echo $aksi == 'ubah' ? 'card-danger' : 'card-success' ?>">
              <div class="card-header">
                <h3 class="card-title">Form Tanggal Libur</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="<?php echo site_url('product/add_tanggal') ?>" method="post" enctype="multipart/form-data">
                <div class="card-body">
                <div class="form-group">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Tanggal Libur</label>
                    <input type='text' required name='tgl' placeholder= "cth: 2020-12-21" id='tgl' class='form-control tgl' value="<?php echo $aksi == 'ubah' ? $tgl_data->tgl : "" ?>" />
                    <?php 
                        if($aksi == 'ubah'){
                    ?>
                    <input type="hidden" value="<?php echo $tgl_data->ID ?>" name='id'>
                    <?php } ?>
                  </div>
                  
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" name='submit' value='<?php echo $aksi == 'ubah' ? "ubah" : "simpan"?>' class="btn btn-info">Simpan</button>
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
  

 

 

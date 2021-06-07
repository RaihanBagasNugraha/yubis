
     <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Pelanggan</h1>
            
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
        <div class="card">
          <div class="col-md-12">
            <div class="card card-outline card-primary">
              <div class="card-body">
                <table id="example" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th style="width: 5%;">NO</th>
                    <th style="width: 20%;">NAMA</th>
                    <th style="width: 15%;">EMAIL</th>
                    <th style="width: 15%;">HP/WA</th>
                    <th style="width: 15%;">KECAMATAN</th>
                    <th style="width: 20%;">ALAMAT</th>
                    <th style="width: 10%;">PESANAN</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php 
                        $n = 0;
                        foreach($pengguna as $row){
                          $jml = $this->pesanan_model->pesanan_pelanggan($row->ID);
                          if(!empty($jml)){
                            $jml = count($jml);
                          }else{
                            $jml = 0;
                          }
                    ?>
                        <tr>
                            <td style="text-align:center"><?php echo ++$n ?></td>
                            <td><?php echo $row->nama ?></td>
                            <td><?php echo $row->email ?></td>
                            <td><?php echo $row->hp ?></td>
                            <td><?php echo $row->kecamatan == NULL ? "" : $this->product_model->get_kecamatan_by_id($row->kecamatan)->nama; ?></td>
                            <td><?php echo $row->alamat ?></td>
                            <td style="text-align:center"><?php echo $jml ?></td>
                        </tr>
                    <?php } ?>
                  </tbody>
                  <tfoot>
                  <tr>
                  <th style="width: 5%;">NO</th>
                    <th style="width: 20%;">NAMA</th>
                    <th style="width: 15%;">EMAIL</th>
                    <th style="width: 15%;">HP/WA</th>
                    <th style="width: 15%;">KECAMATAN</th>
                    <th style="width: 20%;">ALAMAT</th>
                    <th style="width: 10%;">PESANAN</th>
                    
                  </tr>
                  
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
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

<script>
$(document).ready(function() {
    $('#example').DataTable();
} );
</script>
 

 

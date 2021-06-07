
     <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <h1 class="m-0">Kecamatan</h1>
            <a href="#" class="btn-shadow btn btn-success" style='float:right'  data-toggle="modal" data-target="#kecamatan">
                <span class="btn-icon-wrapper pr-2 opacity-7">
                  <i class="fas fa-plus fa-w-20"></i>
                </span>
                TAMBAH
            </a>
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
        <!-- Main row -->
        
        <div class="row">
          <div class="col-md-12">
            
            <div class="card card-outline card-primary">
            
              <div class="card-body">
                <table id="example" width='100%' class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th style="width: 5%;">NO</th>
                    <th style="width: 40%;">KECAMATAN</th>
                    <th style="width: 20%;">ONGKIR</th>
                    <th style="width: 15%;">PELANGGAN</th>
                    <th style="width: 20%;">AKSI</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php 
                        $kecamatan = $this->product_model->get_kecamatan_all();
                        $n = 0;
                        foreach($kecamatan as $row){
                    ?>
                        <tr>
                            <td style="text-align:center" ><?php echo ++$n; ?></td>
                            <td><?php echo $row->nama ?></td>
                            
                            <td style="text-align:center" ><?php echo "Rp".number_format($row->ongkir); $ongkir = str_replace(",","",$row->ongkir); ?></td>
                            <td style="text-align:center">
                            <?php 
                                $jml = count($this->product_model->get_jml_pelanggan_kecamatan($row->ID)); 
                            ?>
                            <a href="<?php echo site_url("pelanggan?kecamatan=".$row->ID) ?>" class="btn-shadow btn btn-success"><?php echo $jml; ?></a>
                            </td>
                            <td style="text-align:center"><a href='' class="btn btn-warning btn-sm passingID" data-id='<?php echo $row->ID ?>' data-ongkir='<?php echo $ongkir ?>' data-nama='<?php echo $row->nama ?>' data-toggle="modal" data-target="#upd-kecamatan">Ubah</a> <a href='' class="btn btn-danger btn-sm passingID2" data-id='<?php echo $row->ID ?>' data-toggle="modal" data-target="#del-kecamatan">Hapus</a></td>
                        </tr>
                    <?php } ?>
                  </tbody>
                  <tfoot>
                  <tr>
                    <th style="width: 5%;">NO</th>
                    <th style="width: 40%;">KECAMATAN</th>
                    <th style="width: 20%;">ONGKIR</th>
                    <th style="width: 15%;">PELANGGAN</th>
                    <th style="width: 20%;">AKSI</th>
                    
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
<script src="https://cdn.jsdelivr.net/npm/sweetalert2"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="https://raw.githubusercontent.com/RobinHerbots/Inputmask/5.x/dist/jquery.inputmask.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>


<script>
$(".passingID").click(function () {
    var id = $(this).attr('data-id');
    var ongkir = $(this).attr('data-ongkir');
    var nama = $(this).attr('data-nama');
    $("#ID_kecamatan_edit").val( id );
    $("#ongkir_kecamatan").val( ongkir );
    $("#nama_kecamatan").val( nama );
});

$(".passingID2").click(function () {
    var id = $(this).attr('data-id');
    $("#ID_kecamatan").val( id );
});

$(document).ready(function() {
    $('#example').DataTable();
} );
</script>
  

 

 

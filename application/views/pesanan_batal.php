
     <!-- Content Wrapper. Contains page content -->
     <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <h1 class="m-0">Pesanan Batal</h1>
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
                <table id="example" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                  <th style="width: 20%;">NOTA</th>
                    <th style="width: 15%;">PELANGGAN</th>
                    <th style="width: 10%;">TGL KIRIM</th>
                    <th style="width: 5%;">JUMLAH ITEM</th>
                    <th style="width: 15%;">TOTAL BAYAR</th>
                    <th style="width: 10%;">STATUS</th>
                    <th style="width: 15%;">AKSI</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php 
                        $pesan = $this->pesanan_model->get_pesanan_batal();
                        $n = 0;
                        foreach($pesan as $row){
                            $detail = $this->pesanan_model->get_pesanan_detail($row->id);
                            $bayar = 0;
                            if(!empty($detail)){
                                foreach($detail as $dt){
                                    $bayar += $dt->harga * $dt->jumlah;
                                }
                            }
                           
                            $user = $this->user_model->get_user_id($row->pelanggan);

                    ?>
                        <tr>
                            <td><?php echo $row->nota; ?></td>
                            <td><?php echo $user->nama; ?></td>
                            
                            <td style="text-align:center"><?php echo $row->tgl_kirim; ?></td>
                            <td style="text-align:center"><?php echo count($detail); ?></td>
                            <td style="text-align:center"><?php echo number_format($bayar); ?></td>
                            <?php 
                                switch($row->status){
                                    case "0":
                                        $status = 'Baru';
                                        break;
                                    case "1":
                                        $status = 'Proses';
                                        break;
                                    case "2":
                                        $status = 'Sudah Bayar';
                                        break;
                                    case "3":
                                        $status = 'Dikirim';
                                        break;
                                    case '-1':
                                        $status = 'Batal';
                                        break;
                                    case '4':
                                        $status = 'Selesai';
                                        break;
                                }
                            ?>
                            <td style="text-align:center"><?php echo $status; ?></td>
                            <td>
                            <!-- <a href='' class="btn btn-primary btn-sm passingID1" data-id='<?php echo $row->id ?>' data-toggle="modal" data-target="#pesanan-selesai"><i class="fa fa-thumbs-up" aria-hidden="true"></i></a>  -->
                            -
                            </td>
                        </tr>
                    <?php } ?>
                  </tbody>
                  <tfoot>
                  <tr>
                    <th >NOTA</th>
                    <th >PELANGGAN</th>
                    <th >TGL KIRIM</th>
                    <th >JUMLAH ITEM</th>
                    <th >TOTAL BAYAR</th>
                    <th >STATUS</th>
                    <th >AKSI</th>
                    
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
$(".passingID1").click(function () {
    var id = $(this).attr('data-id');
    $("#ID_pesanan_selesai").val( id );
});

$(".passingID2").click(function () {
    var id = $(this).attr('data-id');
    $("#ID_kecamatan").val( id );
});

$(document).ready(function() {
    $('#example').DataTable();
} );
</script>
  

 

 

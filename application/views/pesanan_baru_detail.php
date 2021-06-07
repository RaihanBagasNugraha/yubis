
     <!-- Content Wrapper. Contains page content -->
     <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <h1 class="m-0">Detail Pesanan</h1>
          </div><!-- /.col -->
          
          <div class="col-sm-6">
            <br>
            <div class="card card-outline card-warning">
            <div class="card-body">
             <?php 
                $id = $this->input->get('id');
                $nota = $pesanan->nota;
                switch($pesanan->status){
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
                $pelanggan = $this->user_model->get_user_id($pesanan->pelanggan);
             ?>
             <p class="m-0"><b>Nota :</b> <?php echo $nota ?></p>
             <p class="m-0"><b>Pelanggan :</b> <?php echo $pelanggan->nama; ?></p>
             <p class="m-0"><b>Tgl Kirim :</b> <?php echo $pesanan->tgl_kirim ?></p>
             <p class="m-0"><b>Status :</b> <?php echo $status ?></p>
             </div>
             </div>
          </div><!-- /.col -->

          <div class="col-sm-6">
            <br>
            <div class="card card-outline card-success">
            <div class="card-body">
             <?php 
                switch($pesanan->pembayaran){
                    case "1":
                        $pembayaran = 'Transfer';
                        break;
                    case "2":
                        $pembayaran = 'Tunai';
                        break;
                }

                switch($pesanan->pengantaran){
                    case "1":
                        $pengantaran = 'Kurir';
                        break;
                    case "2":
                        $pengantaran = 'Ojek Online';
                        break;
                }
             ?>
             <p class="m-0"><b>Metode Bayar :</b> <?php echo $pembayaran ?></p>
             <p class="m-0"><b>Metode Antar :</b> <?php echo $pengantaran; ?></p>
             <p class="m-0"><b>Penerima :</b> <?php echo $pelanggan->nama."(".$pelanggan->hp.")"; echo "<br>"; echo $pelanggan->alamat; echo "<br>"; echo $pelanggan->kecamatan == NULL ? "" : $this->product_model->get_kecamatan_by_id($pelanggan->kecamatan)->nama ?></p>
             </div>
             </div>
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
                    <th style="width: 10%;">BARANG</th>
                    <th style="width: 20%;">SATUAN</th>
                    <th style="width: 10%;">HARGA</th>
                    <th style="width: 5%;">JUMLAH</th>
                    <th style="width: 15%;">TOTAL</th>
                    <th style="width: 15%;">TERSEDIA</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php 
                        $total = $this->pesanan_model->get_detail_jumlah_1($pesanan->id);
                        foreach($detail as $row){
                            $produk = $this->product_model->get_produk_id($row->id_produk);
                            // $total += ($row->harga*$row->jumlah);
                    ?>
                        <tr>
                            <td><?php echo $produk->nama ?></td>
                            <td><?php echo $produk->satuan ?></td>
                            <td><input type="text" style="text-align:center" readonly class='form-control' id='harga' value = '<?php echo "Rp".number_format($produk->harga) ?>' name="" id=""></td>
                            <td style="text-align:center"><?php echo $row->jumlah ?></td>
                            <?php 
                                $jml = $produk->harga * $row->jumlah;
                            ?>
                            <td><input style="text-align:center" type="text" class='form-control' id='jumlah' readonly value ='<?php echo "Rp".number_format($jml) ?>'></td>
                            <td style="text-align:center"><input type="checkbox" class='check' name='kosong' data-id='<?php echo $row->id ?>' data-pesanan='<?php echo $row->id_pesanan ?>' <?php echo $row->status == 1 ? 'checked' : "" ?>></td>
                        </tr>
                    <?php } ?>
                  </tbody>
                  <tfoot>
                  <input type="hidden" id='total_grand_awal' value='<?php echo $total ?>'>
                  <tr>
                    <th colspan ='4'>GRAND TOTAL</th>
                    <th><input type="text" style="text-align:center" class='form-control' readonly value='' id='total_grand' ></th>
                    <th ></th>
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
        <div class="row">
        <div class="col-sm-6">
            <br>
            <div class="card card-outline card-dark">
            <div class="card-header">
                <label for="">Catatan :</label>
            </div>
            <div class="card-body">
              <label for=""><?php echo $pesanan->catatan ?></label>
               <!-- <textarea name="catatan" data-id='<?php echo $id ?>' class='form-control' id="catatan_detail" placeholder='Catatan' cols="30" rows="3"><?php echo $pesanan->catatan ?></textarea>            -->
             </div>
             </div>
          </div><!-- /.col -->

          <div class="col-sm-6">
            <br>
            <div class="card card-outline card-warning">
            
            <br>
                    <a href='' style= 'margin-left: 150px' class="btn col-md-6 btn-primary btn-sm passingID1" data-id='<?php echo $id ?>' data-toggle="modal" data-target="#proses-detail">Proses</a> 
                    <br>
                    <a href='' style=' margin-left: 150px' class="btn col-md-6 btn-danger btn-sm passingID2" data-id='<?php echo $id ?>' data-toggle="modal" data-target="#batal-detail">Batal</a>          
                    <br>
             </div>
          </div><!-- /.col -->

        
        </div>
        <br><br>
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
    $("#ID_detail1").val( id );
});

$(".passingID2").click(function () {
    var id = $(this).attr('data-id');
    $("#ID_detail2").val( id );
});

$(document).ready(function() {
    $('#example').DataTable();
} );
</script>
  

 

 


     <!-- Content Wrapper. Contains page content -->
     <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <h1 class="m-0">Produk</h1>
            <a href="#" class="btn-shadow btn btn-success" style='float:right'  data-toggle="modal" data-target="#add-produk">
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
                <table id="example" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th style="width: 3%;">NO</th>
                    <th style="width: 5%;">FOTO</th>
                    <th style="width: 10%;">NAMA</th>
                    <th style="width: 12%;">SATUAN</th>
                    <th style="width: 12%;">BERAT</th>
                    <th style="width: 15%;">HARGA</th>
                    <th style="width: 11%;">PROMO</th>
                    <th style="width: 5%;">STATUS</th>
                    <th style="width: 5%;">KATEGORI</th>
                    <th style="width: 15%;">AKSI</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php 
                        $n = 0;
                        foreach($produk as $row){
                          $child =  $this->product_model->get_produk_child($row->id);
                    ?>
                        <tr>
                            <td style="text-align:center"><?php echo ++$n; ?></td>
                            <td><img src="<?php echo $row->foto ?>"  alt="img" style="width:50px;height:50px;"></td>
                            
                            <td>
                            <?php echo $row->nama ?>
                            </td>

                            <td>
                            <ul class='add_satuan_<?php echo $n ?>' style="list-style-type:none; padding:0;">
                                <li style="list-style-type:none; margin-bottom: 2px;"><input type="text" placeholder='-' readonly class='form-control append_satuan_<?php echo $n ?> data_satuan input_<?php echo $n ?>' data-id='<?php echo $row->id ?>' value ='<?php echo $row->satuan ?>' > </li>
                              <?php foreach($child as $ch){ ?>
                                <li style="list-style-type:none; margin-bottom: 2px;"><input type='text' placeholder='-' readonly class='form-control append_satuan_<?php echo $n ?> data_satuan input_<?php echo $n ?>' data-id='<?php echo $ch->id ?>' value ='<?php echo $ch->satuan ?>' ></li>
                              <?php } ?>
                            </ul>
                            </td>

                            <td>
                            <ul class='add_berat_<?php echo $n ?>' style="list-style-type:none; padding:0;">
                                  <li style="list-style-type:none; margin-bottom: 2px;"><input type="text" readonly placeholder='-' class='form-control append_berat_<?php echo $n ?> data_berat input_<?php echo $n ?>' data-id='<?php echo $row->id ?>' value ='<?php echo $row->berat ?>' ></li>
                              <?php foreach($child as $ch){ ?>
                                  <li style="list-style-type:none; margin-bottom: 2px;"><input type='text' placeholder='-' readonly class='form-control append_berat_<?php echo $n ?> data_berat input_<?php echo $n ?>' data-id='<?php echo $ch->id ?>' value ='<?php echo $ch->berat ?>' ></li>
                              <?php } ?>  
                            </ul>
                            </td>

                            <td>
                            <ul class='add_harga_<?php echo $n ?>' style="list-style-type:none; padding:0;">
                                <li style="list-style-type:none; margin-bottom: 2px;"><input type="text" readonly placeholder='-' class='form-control append_harga_<?php echo $n ?> data_harga input_<?php echo $n ?>' data-id='<?php echo $row->id ?>' value ='<?php echo number_format($row->harga) ?>' ></li>
                              <?php foreach($child as $ch){ ?>
                                <li style="list-style-type:none; margin-bottom: 2px;"><input type='text' placeholder='-' readonly class='form-control append_harga_<?php echo $n ?> data_harga input_<?php echo $n ?>' data-id='<?php echo $ch->id ?>' value ='<?php echo number_format($ch->harga) ?>' ></li>
                              <?php } ?>
                            </ul>
                            </td>

                            <td>
                            <ul class='add_promo_<?php echo $n ?>' style="list-style-type:none; padding:0;">
                                <li style="list-style-type:none; margin-bottom: 2px;"><input type="text" readonly placeholder='-' class='form-control append_promo_<?php echo $n ?> data_promo input_<?php echo $n ?>' data-id='<?php echo $row->id ?>' value ='<?php echo number_format($row->hargaPromo) ?>' ></li>
                              <?php foreach($child as $ch){ ?>
                                <li style="list-style-type:none; margin-bottom: 2px;"><input type='text' placeholder='-' readonly class='form-control append_promo_<?php echo $n ?> data_promo input_<?php echo $n ?>' data-id='<?php echo $ch->id ?>' value ='<?php echo number_format($ch->hargaPromo) ?>' ></li>
                              <?php } ?>
                            </ul>
                            </td>

                            <td>
                            <ul class='add_status_<?php echo $n ?>' style="list-style-type:none; padding:0;">
                            <?php 
                                if($row->status == 'Tersedia'){
                                  $cek = "checked";
                                  $sts = 'on';
                                }elseif($row->status == 'Kosong'){
                                  $cek = '';
                                  $sts = 'off';
                                }
                            ?>
                              <div style='margin-bottom: 15px;margin-left: 15px;' class="custom-control custom-switch append_status_<?php echo $n ?>">
                                  <input type="checkbox" class="custom-control-input switch" id="customSwitch_<?php echo $row->id ?>" data-n = '<?php echo $n ?>' data-sts = '<?php echo $sts ?>' data-id = '<?php echo $row->id ?>' <?php echo $cek ?>>
                                  <label class="custom-control-label" for="customSwitch_<?php echo $row->id ?>"></label>
                                </div>

                              <?php 
                              foreach($child as $ch){ 
                                     if($ch->status == 'Tersedia'){
                                        $cek = "checked";
                                        $sts = 'on';
                                    }elseif($ch->status == 'Kosong'){
                                        $cek = '';
                                        $sts = 'off';
                                    }
                                
                                ?>
                                <div style='margin-bottom: 15px;margin-left: 15px;' class="custom-control custom-switch append_status_<?php echo $n ?>">
                                  <input type="checkbox" class="custom-control-input switch" id="customSwitch_<?php echo $ch->id ?>" data-n = '<?php echo $n ?>' data-sts = '<?php echo $sts ?>' data-id = '<?php echo $ch->id ?>' <?php echo $cek ?>>
                                  <label class="custom-control-label" for="customSwitch_<?php echo $ch->id ?>"></label>
                                </div>
                              <?php } ?>
                            </ul>
                            </td>

                            <td>
                              <?php 
                                //kategori
                                $kat = explode("#",$row->kategori);
                                if($row->kategori != NULL){
                                  for($k=0;$k < count($kat)-1; $k++){
                                    echo $this->product_model->get_kategori_id($kat[$k])->nama.",";
                                    echo "<br>";
                                  }
                                }
                              ?>
                            </td>
                            <td>
                            
                            <a style = 'margin-bottom: 10px;' href='' class="btn btn-info btn-sm passingID1" data-id='<?php echo $row->id ?>' data-nama='<?php echo $row->nama ?>' data-toggle="modal" data-target="#edit-produk"><span class="btn-icon-wrapper opacity-7"><i class="fas fa-wrench"></i></span></a>
                            <a style = 'margin-bottom: 10px;' href='' class="btn btn-danger btn-sm passingID2" data-id='<?php echo $row->id ?>' data-toggle="modal" data-target="#del-produk"><span class="btn-icon-wrapper opacity-7"><i class="fas fa-trash"></i></span></a>
                            <span style = 'margin-bottom: 10px;' type='button' class="btn btn-warning btn-sm edit_btn" data-id='<?php echo $n ?>' data-id2='<?php echo $row->id ?>' data-kat='<?php echo $row->kategori ?>' data-sts='<?php echo $row->status ?>' ><span class="btn-icon-wrapper opacity-7"><i class="fas fa-edit"></i></span></span> 
                            <span style = 'margin-bottom: 10px;' type='button' class="btn btn-success btn-sm add_btn add_btn2" data-id='<?php echo $n ?>' data-id2='<?php echo $row->id ?>' data-kat='<?php echo $row->kategori ?>' data-sts='<?php echo $row->status ?>'><span class="btn-icon-wrapper opacity-7"><i class="fas fa-plus"></i></span></span> 
                            <span style = 'margin-bottom: 10px;' type='button' class="btn btn-danger btn-sm min_btn" data-id='<?php echo $n ?>' data-id2='<?php echo $row->id ?>' data-kat='<?php echo $row->kategori ?>' data-sts='<?php echo $row->status ?>'><span class="btn-icon-wrapper opacity-7"><i class="fas fa-minus"></i></span></span> 
                            
                            
                            </td>
                        </tr>
                    <?php } ?>
                    <input type="hidden" class="jml" value='<?php echo count($produk) ?>' >
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>NO</th>
                    <th >FOTO</th>
                    <th >NAMA</th>
                    <th >SATUAN</th>
                    <th >BERAT</th>
                    <th >HARGA</th>
                    <th >PROMO</th>
                    <th >STATUS</th>
                    <th >KATEGORI</th>
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
    var nama = $(this).attr('data-nama');
    $("#ID_produk_edit").val( id );
    $("#nama_produk_edit").val( nama );
});

$(".passingID2").click(function () {
    var id = $(this).attr('data-id');
    $("#ID_produk").val( id );
});

$(document).ready(function() {
  $('#example').DataTable();
  
} );
</script>
  

 

 

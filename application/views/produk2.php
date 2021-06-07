
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
                    <th style="width: 5%;">NO</th>
                    <th style="width: 5%;">FOTO</th>
                    <th style="width: 10%;">NAMA</th>
                    <th style="width: 12%;">SATUAN</th>
                    <th style="width: 15%;">BERAT</th>
                    <th style="width: 15%;">HARGA</th>
                    <th style="width: 15%;">PROMO</th>
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
                            <td><?php echo ++$n; ?></td>
                            <td><img src="<?php echo $row->foto ?>"  alt="img" style="width:50px;height:50px;"></td>
                            <td>
                            <?php echo $row->nama ?>
                            <td><input type="text" placeholder='-' readonly class='form-control data_satuan input_<?php echo $n ?>' data-id='<?php echo $row->id ?>' value ='<?php echo $row->satuan ?>' > 
                            <?php foreach($child as $ch){ ?>
                                <input type='text' placeholder='-' readonly class='form-control data_satuan input_<?php echo $n ?>' data-id='<?php echo $ch->id ?>' value ='<?php echo $ch->satuan ?>' >
                            <?php } ?>
                            <div class='add_satuan_<?php echo $n ?>'></div>
                            </td>
                            <td><input type="text" readonly placeholder='-' class='form-control data_berat input_<?php echo $n ?>' data-id='<?php echo $row->id ?>' value ='<?php echo $row->berat ?>' >
                            <?php foreach($child as $ch){ ?>
                                <input type='text' placeholder='-' readonly class='form-control data_berat input_<?php echo $n ?>' data-id='<?php echo $ch->id ?>' value ='<?php echo $ch->berat ?>' >
                            <?php } ?>
                            <div class='add_berat_<?php echo $n ?>'></div>
                            </td>
                            <td><input type="text" readonly placeholder='-' class='form-control data_harga input_<?php echo $n ?>' data-id='<?php echo $row->id ?>' value ='<?php echo $row->harga ?>' >
                            <?php foreach($child as $ch){ ?>
                               <input type='text' placeholder='-' readonly class='form-control data_harga input_<?php echo $n ?>' data-id='<?php echo $ch->id ?>' value ='<?php echo $ch->harga ?>' >
                            <?php } ?>
                            <div class='add_harga_<?php echo $n ?>'></div>
                            </td>
                            <td><input type="text" readonly placeholder='-' class='form-control data_promo input_<?php echo $n ?>' data-id='<?php echo $row->id ?>' value ='<?php echo $row->hargaPromo ?>' >
                            <?php foreach($child as $ch){ ?>
                               <input type='text' placeholder='-' readonly class='form-control data_promo input_<?php echo $n ?>' data-id='<?php echo $ch->id ?>' value ='<?php echo $ch->hargaPromo ?>' >
                            <?php } ?>
                            <div class='add_promo_<?php echo $n ?>'></div>
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
                            
                            <span style = 'margin-bottom: 10px;' type='button' class="btn btn-warning btn-sm edit_btn" data-id='<?php echo $n ?>' data-id2='<?php echo $row->id ?>' data-kat='<?php echo $row->kategori ?>' data-sts='<?php echo $row->status ?>' ><span class="btn-icon-wrapper opacity-7"><i class="fas fa-edit"></i></span></span> 
                            <a style = 'margin-bottom: 10px;' href='' class="btn btn-danger btn-sm passingID2" data-id='<?php echo $row->id ?>' data-toggle="modal" data-target="#del-produk"><span class="btn-icon-wrapper opacity-7"><i class="fas fa-trash"></i></span></a>
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
    $("#ID_produk").val( id );
});

$(document).ready(function() {
  $('#example').DataTable();
  
} );
</script>
  

 

 

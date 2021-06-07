  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
  
 <!-- Main Footer -->
 <footer class="main-footer">
    <!-- Modal Kategori -->
    <div id="kategori" class="modal fade" role="dialog">
      <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
          <h4 class="modal-title">Konfirmasi</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
            <b><p>Hapus Kategori ?</p></b>
            <form id="delete-kategori" method="post" action="<?php echo site_url("product/delete_kategori") ?>">
                <input type="hidden" id='ID' name = 'id' value =''>   
            </form>
            
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
            <button type="submit" form="delete-kategori" class="btn btn-danger" >Hapus</button>
          </div>
        </div>

      </div>
    </div>

    <!-- Tambah Kecamatan -->
    <div id="kecamatan" class="modal fade" role="dialog">
      <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
          <h4 class="modal-title">Tambah Kecamatan</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
            <form id="add-kecamatan" method="post" action="<?php echo site_url("product/add_kecamatan") ?>">
                <b><p>Nama Kecamatan</p></b>
                <input type="text" class='form-control' name = 'nama' required placeholder ='Nama Kecamatan' value =''>   
                <br>
                <b><p>Ongkos Kirim</p></b>
                <input type="text" class='form-control input-mask' required name = 'ongkir' placeholder ='0' value ='' data-inputmask='"mask": ""' data-mask>   
            </form>
            
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
            <button type="submit" form="add-kecamatan" class="btn btn-primary" >Simpan</button>
          </div>
        </div>

      </div>
    </div>

    <!-- Hapus Kecamatan -->
    <div id="del-kecamatan" class="modal fade" role="dialog">
      <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
          <h4 class="modal-title">Konfirmasi</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
            <b><p>Hapus Kecamatan ?</p></b>
            <form id="delete-kecamatan" method="post" action="<?php echo site_url("product/delete_kecamatan") ?>">
                <input type="hidden" id='ID_kecamatan' name = 'id' value =''>   
            </form>
            
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
            <button type="submit" form="delete-kecamatan" class="btn btn-danger" >Hapus</button>
          </div>
        </div>

      </div>
    </div>

    <!-- Update Kecamatan -->
    <div id="upd-kecamatan" class="modal fade" role="dialog">
      <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
          <h4 class="modal-title">Ubah Data Kecamatan</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
            <form id="edit-kecamatan" method="post" action="<?php echo site_url("product/edit_kecamatan") ?>">
                <b><p>Nama Kecamatan</p></b>
                <input type="text" class='form-control' id='nama_kecamatan' name = 'nama' required placeholder ='Nama Kecamatan' value =''>   
                <br>
                <b><p>Ongkos Kirim</p></b>
                <input type="text" class='form-control input-mask' id='ongkir_kecamatan' required name = 'ongkir' placeholder ='0' value ='' data-inputmask='"mask": ""' data-mask>   
                <input type="hidden" name ='id'  id='ID_kecamatan_edit'>
            </form>
            
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
            <button type="submit" form="edit-kecamatan" class="btn btn-primary" >Simpan</button>
          </div>
        </div>

      </div>
    </div>

     <!-- Hapus tanggal -->
     <div id="delete-tgl" class="modal fade" role="dialog">
      <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
          <h4 class="modal-title">Konfirmasi</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
            <b><p>Hapus Tanggal Libur ?</p></b>
            <form id="del-tgl" method="post" action="<?php echo site_url("product/delete_tanggal") ?>">
                <input type="hidden" id='ID_tgl' name = 'id' value =''>   
            </form>
            
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
            <button type="submit" form="del-tgl" class="btn btn-danger" >Hapus</button>
          </div>
        </div>

      </div>
    </div>

    <!-- Tambah Produk -->
    <div id="add-produk" class="modal fade" role="dialog">
      <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
          <h4 class="modal-title">Tambah Produk</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
            <form id="adds-produk" method="post" enctype="multipart/form-data" action="<?php echo site_url("product/add_produk") ?>">
                <b><p>Foto</p></b>
                <div class="custom-file">
                  <input type="file" required name = 'file' accept="image/*" class="custom-file-input" id="exampleInputFile">
                  <label class="custom-file-label" for="exampleInputFile">Pilih gambar</label>
                </div>
                <br><br>
                <b><p>Nama</p></b>
                <input type="text" class='form-control' required name = 'nama' placeholder ='Nama Produk' value =''>   
                <br>
                <b><p>Kategori</p></b>
                <?php 
                  $kategori = $this->product_model->get_kategori_all();
                  foreach($kategori as $kats){
                ?>
                  <div class="col-md-4">
                    <div class="form-check">
                      <input class="form-check-input" value='<?php echo $kats->id ?>' name = 'kategori[]' id="kategori_<?php echo $kats->id ?>" type="checkbox">
                      <label for = 'kategori_<?php echo $kats->id ?>' class="form-check-label "><?php echo $kats->nama ?></label>
                    </div>
                  </div>
                <?php } ?>
               
            </form>
            
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
            <button type="submit" form="adds-produk" class="btn btn-primary" >Simpan</button>
          </div>
        </div>

      </div>
    </div>

      <!-- Hapus produk -->
    <div id="del-produk" class="modal fade" role="dialog">
      <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
          <h4 class="modal-title">Konfirmasi</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
            <b><p>Hapus Produk ?</p></b>
            <form id="delete-produk" method="post" action="<?php echo site_url("product/delete_produk") ?>">
                <input type="hidden" id='ID_produk' name = 'id' value =''>   
            </form>
            
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
            <button type="submit" form="delete-produk" class="btn btn-danger" >Hapus</button>
          </div>
        </div>

      </div>
    </div>

    <!-- EDIT Produk -->
    <div id="edit-produk" class="modal fade" role="dialog">
      <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
          <h4 class="modal-title">Ubah Data Produk</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
            <form id="edt-produk" method="post" enctype="multipart/form-data" action="<?php echo site_url("product/edit_produk") ?>">
                <b><p>Foto</p></b>
                <div class="custom-file">
                  <input type="file" name = 'file' required accept="image/*" class="custom-file-input" id="exampleInputFile">
                  <label class="custom-file-label" for="exampleInputFile">Pilih gambar</label>
                </div>
                <br><br>
                <b><p>Nama</p></b>
                <input type="text" class='form-control' required id='nama_produk_edit' name = 'nama' placeholder ='Nama Produk' value =''>   
                <input type="hidden" id='ID_produk_edit' name='id'>
                <br>
                <b><p>Kategori</p></b>
                <?php 
                  $kategori = $this->product_model->get_kategori_all();
                  foreach($kategori as $kats){
                ?>
                  <div class="col-md-4">
                    <div class="form-check">
                      <input class="form-check-input" value='<?php echo $kats->id ?>' name = 'kategori[]' id="kategorid_<?php echo $kats->id ?>" type="checkbox">
                      <label for = 'kategorid_<?php echo $kats->id ?>' class="form-check-label "><?php echo $kats->nama ?></label>
                    </div>
                  </div>
                <?php } ?>
               
            </form>
            
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
            <button type="submit" form="edt-produk" class="btn btn-primary" >Simpan</button>
          </div>
        </div>

      </div>
    </div>

    <!-- Tambah OP -->
    <div id="add_op" class="modal fade" role="dialog">
      <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
          <h4 class="modal-title">Tambah User</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
            <form id="adds-op" method="post" enctype="multipart/form-data" action="<?php echo site_url("login/periksa_daftar") ?>">
                <b><p>Nama</p></b>
                <div class="custom-file">
                <input type="text" class='form-control' required name = 'nama' placeholder ='Nama' value =''>   
                </div>
                <br><br>
                <b><p>Email</p></b>
                <input type="email" class='form-control' required name = 'email' placeholder ='Email' value =''>   
                <br>
                <b><p>Pasword</p></b>
                <input type="password" class='form-control' required name = 'password' placeholder ='Password' value =''>   
                <br>
                <b><p>Role</p></b>
                <select class='form-control' name="status" required id="">
                    <option value="1">Admin</option>
                    <option value="2">Operator</option>
                </select>
                <br>
            </form>
            
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
            <button type="submit" form="adds-op" class="btn btn-primary" >Simpan</button>
          </div>
        </div>

      </div>
    </div>
    
    <!-- Hapus OP -->
    <div id="del-op" class="modal fade" role="dialog">
      <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
          <h4 class="modal-title">Konfirmasi</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
            <b><p>Hapus User ?</p></b>
            <form id="delete-op" method="post" action="<?php echo site_url("login/delete_op") ?>">
                <input type="hidden" id='ID_op_del' name = 'id' value =''>   
            </form>
            
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
            <button type="submit" form="delete-op" class="btn btn-danger" >Hapus</button>
          </div>
        </div>

      </div>
    </div>

    <!-- Tambah OP -->
    <div id="upd-op" class="modal fade" role="dialog">
      <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
          <h4 class="modal-title">Edit User</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
            <form id="edt-op" method="post" action="<?php echo site_url("login/edit_user") ?>">
                <input type="hidden" name='id' id='ID_op_edit'>
                <b><p>Nama</p></b>
                <div class="custom-file">
                <input type="text" class='form-control' id='nama_op_edit' required name = 'nama' placeholder ='Nama' value =''>   
                </div>
                <br><br>
                <b><p>Email</p></b>
                <input type="email" class='form-control' id='email_op_edit' required name = 'email' placeholder ='Email' value =''>   
                <br>
                <b><p>Pasword</p></b>
                <input type="password" class='form-control' name = 'password' placeholder ='Password' value =''>   
                <br>
                <b><p>Role</p></b>
                <select class='form-control' name="status" required id="role_op_edit">
                    <option value="1">Admin</option>
                    <option value="2">Operator</option>
                </select>
                <br>
            </form>
            
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
            <button type="submit" form="edt-op" class="btn btn-primary" >Simpan</button>
          </div>
        </div>

      </div>
    </div>

    <!-- Proses detail -->
    <div id="proses-detail" class="modal fade" role="dialog">
      <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
          <h4 class="modal-title">Konfirmasi</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
            <b><p>Proses Pesanan ?</p></b>
            <form id="proses_detail" method="post" action="<?php echo site_url("pesanan/pesanan_proses") ?>">
                <input type="hidden" id='ID_detail1' name = 'id' value =''>   
                <input type="hidden" id='' name = 'aksi' value ='1'>   
            </form>
            
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
            <button type="submit" form="proses_detail" class="btn btn-primary" >Simpan</button>
          </div>
        </div>

      </div>
    </div>

     <!-- batal detail -->
     <div id="batal-detail" class="modal fade" role="dialog">
      <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
          <h4 class="modal-title">Konfirmasi</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
            <b><p>Batalkan Pesanan ?</p></b>
            <form id="batal_detail" method="post" action="<?php echo site_url("pesanan/pesanan_proses") ?>">
                <input type="hidden" id='ID_detail2' name = 'id' value =''>   
                <input type="hidden" id='' name = 'aksi' value ='-1'>   
            </form>
            
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
            <button type="submit" form="batal_detail" class="btn btn-danger" >Batal</button>
          </div>
        </div>

      </div>
    </div>

      <!-- pesanan selesai -->
      <div id="pesanan-selesai" class="modal fade" role="dialog">
      <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
          <h4 class="modal-title">Konfirmasi</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
            <b><p>Selesaikan Pesanan ?</p></b>
            <form id="pesanan_selesai" method="post" action="<?php echo site_url("pesanan/pesanan_proses") ?>">
                <input type="hidden" id='ID_pesanan_selesai' name = 'id' value =''>   
                <input type="hidden" id='' name = 'aksi' value ='4'>   
            </form>
            
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
            <button type="submit" form="pesanan_selesai" class="btn btn-primary" >Simpan</button>
          </div>
        </div>

      </div>
    </div>

    <strong>Copyright &copy; 2014-2019 <a href="http://adminlte.io">AdminLTE.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.0.5
    </div>
   

  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="<?php echo base_url('assets');?>/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="<?php echo base_url('assets');?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE -->
<script src="<?php echo base_url('assets');?>/dist/js/adminlte.js"></script>

<!-- OPTIONAL SCRIPTS -->
<script src="<?php echo base_url('assets');?>/plugins/chart.js/Chart.min.js"></script>
<script src="<?php echo base_url('assets');?>/dist/js/demo.js"></script>
<script src="<?php echo base_url('assets');?>/dist/js/pages/dashboard3.js"></script>

<!-- Bootstrap Switch -->
<script src="<?php echo base_url('assets');?>/plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>

<!-- DataTables  & Plugins -->
<script src="<?php echo base_url('assets');?>/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url('assets');?>/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo base_url('assets');?>/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?php echo base_url('assets');?>/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?php echo base_url('assets');?>/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?php echo base_url('assets');?>/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>

<!-- InputMask -->
<script src="<?php echo base_url('assets');?>/plugins/moment/moment.min.js"></script>
<script src="<?php echo base_url('assets');?>/plugins/inputmask/min/jquery.inputmask.bundle.min.js"></script>



<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

</body>
</html>
<script>
    $('[data-mask]').inputmask();

    $('.input-mask').keyup(function(event) {

    // skip for arrow keys
    if(event.which >= 37 && event.which <= 40) return;

    // format number
    $(this).val(function(index, value) {
      return value
      .replace(/\D/g, "")
      .replace(/\B(?=(\d{3})+(?!\d))/g, ",")
      ;
    });
    });

    $.ajaxSetup({
        type:"POST",
        cache: false,
        error: function (a, b, c) {
            //default error handling
            console.log(a, b, c);       
        }
    });

      //produk
      $('.edit_btn').click(function(){
          var id =  $(this).attr('data-id');
          $(".input_"+id).attr("readonly", false); 
      });

      $('.add_btn').click(function(){
          var id =  $(this).attr('data-id');
          var parent = $(this).attr('data-id2');
          var sts = $(this).attr('data-sts');
          var kat = $(this).attr('data-kat');
          // var id2;
          $.ajax("<?php echo site_url('product/insert_produk_row') ?>", {
                data:{parent:parent,status:sts,kategori:kat},
                success: function(success){
                    get_id(success);
                }
          });
          
          function get_id(data){
            $( ".add_satuan_"+id ).append( "<li style='list-style-type:none;margin-bottom: 2px;'><input type='text' placeholder='-' class='append_satuan_"+id+" data_satuan form-control input_"+id+"' data-id='"+data+"' value ='' ></li>" );
            $( ".add_berat_"+id ).append( "<li style='list-style-type:none;margin-bottom: 2px;'><input type='text' placeholder='-' class='append_berat_"+id+" data_berat form-control input_"+id+"' data-id='"+data+"' value ='' ></li>" );
            $( ".add_harga_"+id ).append( "<li style='list-style-type:none;margin-bottom: 2px;'><input type='text' placeholder='-' class='append_harga_"+id+" data_harga form-control input_"+id+"' data-id='"+data+"' value ='' ></li>" );
            $( ".add_promo_"+id ).append( "<li style='list-style-type:none;margin-bottom: 2px;'><input type='text' placeholder='-' class='append_promo_"+id+" data_promo form-control input_"+id+"' data-id='"+data+"' value ='' ></li>" );
            $( ".add_status_"+id ).append( "<div style='margin-bottom: 15px;margin-left: 15px;' class='custom-control custom-switch append_status_"+id+"'> <input type='checkbox' class='custom-control-input switch' id='customSwitch_"+data+"' data-n = '"+id+"' data-sts = 'on' data-id = '"+data+"' checked ><label class='custom-control-label' for='customSwitch_"+data+"'></label></div>" );
          }
      });

      $('.min_btn').click(function(){
          var id =  $(this).attr('data-id');
          
          var parent = $( ".append_satuan_"+id ).last().attr('data-id');
          
          if(parent == null){
            parent = $( ".input_"+id ).last().attr('data-id');
          }
          // alert(parent);
          $( ".append_satuan_"+id ).last().remove();
          $( ".append_berat_"+id ).last().remove();
          $( ".append_harga_"+id ).last().remove();
          $( ".append_promo_"+id ).last().remove();
          $( ".append_status_"+id ).last().remove();
        

          $.ajax("<?php echo site_url('product/delete_produk_row') ?>", {
                data:{parent:parent},
                success: function(respond){
                }
          });
      });

      $(document).on('blur', '.data_satuan', function () {
          var value = $(this).val();
          var dataId = $(this).attr('data-id');
          var modul = 'satuan';
          // alert(value);
        if(value != ''){
            $.ajax("<?php echo site_url('product/insert_data_produk') ?>", {
                data:{ID:dataId,nilai:value,modul:modul},
                success: function(respond){ }
            })
        }
      });

      $(document).on('blur', '.data_berat', function () {
          var value = $(this).val();
          var dataId = $(this).attr('data-id');
          var modul = 'berat';
          // alert(value);
        if(value != ''){
            $.ajax("<?php echo site_url('product/insert_data_produk') ?>", {
                data:{ID:dataId,nilai:value,modul:modul},
                success: function(respond){ }
            })
        }
      });

      $(document).on('blur', '.data_harga', function () { 
          var value = $(this).val();
          var dataId = $(this).attr('data-id');
          var modul = 'harga';
          // alert(value);
        if(value != ''){
            $.ajax("<?php echo site_url('product/insert_data_produk') ?>", {
                data:{ID:dataId,nilai:value,modul:modul},
                success: function(respond){ }
            })
        }
      });

      $(document).on('blur', '.data_promo', function () {
          var value = $(this).val();
          var dataId = $(this).attr('data-id');
          var modul = 'promo';
          // alert(value);
        if(value != ''){
            $.ajax("<?php echo site_url('product/insert_data_produk') ?>", {
                data:{ID:dataId,nilai:value,modul:modul},
                success: function(respond){ }
            })
        }
      });

     //switch
     $(document).on('change', '.switch', function () {
          var id =  $(this).attr('data-id');
          var n =  $(this).attr('data-n');

          if ($(this).is(':checked')) {
            var sts = 'tersedia';
          }
          else{
            var sts = 'kosong';
          }

          if(id != ''){
            $.ajax("<?php echo site_url('product/status_data_produk') ?>", {
                data:{ID:id,status:sts},
                success: function(respond){ }
            })
          }
          
    });

    function numberWithCommas(x) {
        return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    }

    //pesanan detail
    var total_awal =  $('#total_grand_awal').val();
    $('#total_grand').val("Rp"+numberWithCommas(total_awal));

    $(document).on('change', '.check', function () {
        var id =  $(this).attr('data-id');
        var psn =  $(this).attr('data-pesanan');

        if ($(this).is(':checked')) {
            var sts = 'tersedia';
          }
          else{
            var sts = 'kosong';
          }

        // alert(id);
        if(id != ''){
            $.ajax("<?php echo site_url('pesanan/status_detail') ?>", {
                data:{ID:id,status:sts,pesan:psn},
                success: function(respond){ 
                  get_value(respond);
                }
            })
        }

        function get_value(val){
          
          $('#total_grand').val("Rp"+numberWithCommas(val));
        }
    });

    $(document).on('blur', '#catatan_detail', function () {
          var value = $(this).val();
          var dataId = $(this).attr('data-id');
          // alert(value);
        // if(value != ''){
            $.ajax("<?php echo site_url('pesanan/pesanan_catatan') ?>", {
                data:{ID:dataId,nilai:value},
                success: function(respond){ }
            })
        // }
      });
    
</script>

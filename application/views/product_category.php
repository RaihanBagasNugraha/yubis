
     <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Kategori Produk</h1>
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
                <table id="example" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th style="width: 5%;">NO</th>
                    <th style="width: 20%;">IKON</th>
                    <th style="width: 35%;">KATEGORI</th>
                    <th style="width: 15%;">JUMLAH PRODUK</th>
                    <th style="width: 20%;">AKSI</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php 
                        $kategori = $this->product_model->get_kategori_all();
                        $no = 0;
                        foreach($kategori as $row){
                    ?>
                        <tr>
                            <td style="text-align:center"><?php echo ++$no; ?></td>
                            <td style="text-align:center"><img src="<?php echo $row->icon ?>" alt="img" style="width:50px;height:50px;"></td>
                            <td><?php echo $row->nama ?></td>
                            <td style="text-align:center"><a href="<?php echo site_url('product?produk='.$row->id) ?>" class="btn btn-sm btn-info"><?php echo count($this->product_model->get_kategori_produk($row->id)) ?></td></a>
                            <td style="text-align:center"><a href="<?php echo site_url('product-category?aksi=ubah&id='.$row->id) ?>" class="btn btn-sm btn-warning">Ubah</a> <a href='' class="btn btn-danger btn-sm passingID" data-id='<?php echo $row->id ?>' data-toggle="modal" data-target="#kategori">Hapus</a></td>
                        
                        </tr>
                    <?php } ?>
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>IKON</th>
                    <th>KATEGORI</th>
                    <th>AKSI</th>
                    
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
                $kategori = $this->product_model->get_kategori_id($id);
            }
        ?>
          <div class="col-md-4">
              <!-- general form elements -->
            <div class="card <?php echo $aksi == 'ubah' ? 'card-danger' : 'card-success' ?>">
              <div class="card-header">
                <h3 class="card-title">Form Kategori Produk</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="<?php echo site_url('product/add_kategori') ?>" method="post" enctype="multipart/form-data">
                <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputFile">Ikon Kategori</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" required name = 'file' accept="image/*" class="custom-file-input" id="exampleInputFile">
                        <label class="custom-file-label" for="exampleInputFile">Pilih gambar</label>
                      </div>
                      
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Nama Kategori</label>
                    <input type="text" name = 'nama' value='<?php echo $aksi == 'ubah' ? $kategori->nama : ""?>' required class="form-control" id="exampleInputEmail1" placeholder="Masukan kategori produk">
                    <?php 
                        if($aksi == 'ubah'){
                    ?>
                    <input type="hidden" value="<?php echo $kategori->id ?>" name='id'>
                    <?php } ?>
                  </div>
                  
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" name='submit' value='<?php echo $aksi == 'ubah' ? "ubah" : "simpan"?>' class="btn btn-info">Simpan Kategori</button>
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
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script>
$(".passingID").click(function () {
    var id = $(this).attr('data-id');
    console.log('test');
    $("#ID").val( id );
});

// $(document).ready(function() {
//     $('#example').DataTable();
// } );
</script>
  

 

 

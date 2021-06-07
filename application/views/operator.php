
     <!-- Content Wrapper. Contains page content -->
     <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <h1 class="m-0">OPERATOR</h1>
            <a href="#" class="btn-shadow btn btn-success" style='float:right'  data-toggle="modal" data-target="#add_op">
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
          <?php if ($this->session->flashdata('error')) : ?>
                <div class="alert alert-danger" role="alert">
                  <!-- <h4 class="alert-heading"></h4> -->
                  <p class="mb-0"><?php echo $this->session->flashdata('error'); ?></p>
                </div>
                <?php endif; ?>
                <?php if ($this->session->flashdata('success')) : ?>
                <div class="alert alert-success" role="alert">
                  <!-- <h4 class="alert-heading"></h4> -->
                  <p class="mb-0"><?php echo $this->session->flashdata('success'); ?></p>
                </div>
                <?php endif; ?>
            <div class="card card-outline card-primary">
            
              <div class="card-body">
                <table id="example" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th style="width: 5%;">NO</th>
                    <th style="width: 20%;">USERNAME</th>
                    <th style="width: 25%;">NAMA</th>
                    <th style="width: 15%;">ROLE</th>
                    <th style="width: 15%;">AKSI</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php 
                        $user = $this->user_model->get_admin();
                        $n = 0;
                        foreach($user as $row){
                    ?>
                        <tr>
                            <td style="text-align:center"><?php echo ++$n; ?></td>
                            <td><?php echo $row->email ?></td>
                            <td><?php echo $row->nama ?></td>
                            <td>
                                <?php 
                                    if($row->status == '1'){
                                        echo "Admin";
                                    }elseif($row->status == '2'){
                                        echo "Operator";
                                    }
                                ?>
                            </td>
                            <td style="text-align:center"><a href='' class="btn btn-warning btn-sm passingID" data-email='<?php echo $row->email ?>'  data-role='<?php echo $row->status ?>' data-nama='<?php echo $row->nama ?>' data-id='<?php echo $row->ID ?>' data-toggle="modal" data-target="#upd-op">Ubah</a> <a href='' class="btn btn-danger btn-sm passingID2" data-id='<?php echo $row->ID ?>' data-toggle="modal" data-target="#del-op">Hapus</a></td>
                        </tr>
                    <?php } ?>
                  </tbody>
                  <tfoot>
                  <tr>
                    <th style="width: 5%;">NO</th>
                    <th style="width: 20%;">USERNAME</th>
                    <th style="width: 25%;">NAMA</th>
                    <th style="width: 15%;">ROLE</th>
                    <th style="width: 15%;">AKSI</th>
                    
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
    var role = $(this).attr('data-role');
    var nama = $(this).attr('data-nama');
    var email = $(this).attr('data-email');
    $("#ID_op_edit").val( id );
    $("#role_op_edit").val( role );
    $("#nama_op_edit").val( nama );
    $("#email_op_edit").val( email );
});

$(".passingID2").click(function () {
    var id = $(this).attr('data-id');
    $("#ID_op_del").val( id );
});

$(document).ready(function() {
    $('#example').DataTable();
} );
</script>
  

 

 

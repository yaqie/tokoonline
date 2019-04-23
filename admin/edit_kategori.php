<?php
include 'header.php';
$id_kategori = $_GET['id'];
$tampil_kategori = mysqli_query($conn,"SELECT * FROM kategori WHERE id_kategori = '$id_kategori'");
$data_kategori = mysqli_fetch_object($tampil_kategori);
?>
  

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Kategori
      </h1>
      <ol class="breadcrumb">
        <li><a href="dashboard.php"><i class="fa fa-user"></i> Admin</a></li>
        <li class="active">Kategori</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Tambahkan Kategori Baru</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="../query/q_admin.php?aksi=kategori" method="post">
              <div class="box-body">
                
                <div class="form-group">
                  <label for="nama">Nama Kategori</label>
                  <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama kategori produk">
                </div>
                
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Tambah</button>
              </div>
            </form>
          </div>
          <!-- /.box -->


        </div>
        <!--/.col (left) -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <?php include 'footer.php'; ?>
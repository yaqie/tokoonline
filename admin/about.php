<?php
include 'header.php';
?>
  

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        About
      </h1>
      <ol class="breadcrumb">
        <li><a href="dashboard.php"><i class="fa fa-user"></i> Admin</a></li>
        <li class="active">About</li>
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
              <h3 class="box-title">Edit About</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="../query/q_admin.php?aksi=edit_about" method="post" enctype="multipart/form-data">
              <div class="box-body">
              <?php include 'alert.php'; ?>

              <?php
              $tampil_about = mysqli_query($conn , "SELECT * FROM web WHERE bagian = 'about' ");
              $data_about = mysqli_fetch_object($tampil_about);
              ?>

                <div class="form-group">
                  <label for="deskripsi">Deskripsi</label>
                  <textarea id="editor1" name="deskripsi" rows="10" cols="80"><?= $data_about->keterangan1 ?></textarea>
                </div>

              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
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
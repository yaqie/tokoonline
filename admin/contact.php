<?php
include 'header.php';
?>
  

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Contact
      </h1>
      <ol class="breadcrumb">
        <li><a href="dashboard.php"><i class="fa fa-user"></i> Admin</a></li>
        <li class="active">Contact</li>
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
              <h3 class="box-title">Edit Contact</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="../query/q_admin.php?aksi=contact" method="post" enctype="multipart/form-data">
              <div class="box-body">
              <?php include 'alert.php'; ?>

              <?php
              $tampil_contact = mysqli_query($conn , "SELECT * FROM web WHERE bagian = 'contact' ");
              $data_contact = mysqli_fetch_object($tampil_contact);
              ?>
                
                <div class="form-group">
                  <label for="nama">Nomor Handphone</label>
                  <input type="text" class="form-control" id="nama" name="no_hp" placeholder="Masukkan nomor handphone" value="<?= $data_contact->keterangan1 ?>">
                </div>
                <div class="form-group">
                  <label for="email">E-mail</label>
                  <input type="email" class="form-control" id="email" name="email" placeholder="Masukkan email"  value="<?= $data_contact->keterangan3 ?>">
                </div>
                <div class="form-group">
                  <label for="deskripsi">Alamat</label>
                  <textarea id="editor1" name="alamat" rows="10" cols="80"><?= $data_contact->keterangan2 ?></textarea>
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
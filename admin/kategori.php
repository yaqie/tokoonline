<?php
include 'header.php';
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


          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Data Kategori</h3>
            </div>
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>ID Kategori</th>
                  <th>Nama Kategori</th>
                  <th>#</th>
                </tr>
                </thead>
                <tbody>

                <?php
                $tampil_kategori = mysqli_query($conn,"SELECT * FROM kategori");
                while($data_kategori = mysqli_fetch_object($tampil_kategori)){
                ?>
                <tr>
                  <td><?= $data_kategori->id_kategori ?></td>
                  <td><?= $data_kategori->nama_kategori ?></td>
                  <td><a href="../query/q_admin.php?aksi=hapus_kategori&id=<?= $data_kategori->id_kategori ?>" class="btn btn-danger" onclick="return confirm('Apakah anda yakin ingin menghapus data ?')">Hapus</a></td>
                </tr>
                <?php } ?>

                </tbody>
                <tfoot>
                <tr>
                  <th>ID Kategori</th>
                  <th>Nama Kategori</th>
                  <th>#</th>
                </tr>
                </tfoot>
              </table>
            </div>

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
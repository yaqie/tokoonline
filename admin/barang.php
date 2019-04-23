<?php
include 'header.php';
?>
  

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Barang
      </h1>
      <ol class="breadcrumb">
        <li><a href="dashboard.php"><i class="fa fa-user"></i> Admin</a></li>
        <li class="active">Data Barang</li>
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
              <h3 class="box-title">Data Barang</h3>
            </div>
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>ID Barang</th>
                  <th>Nama Barang</th>
                  <th>Kategori</th>
                  <th>Harga</th>
                  <th>Stok</th>
                  <th>#</th>
                </tr>
                </thead>
                <tbody>

                <?php
                $tampil_barang = mysqli_query($conn,"SELECT * FROM barang ORDER BY id_barang DESC");
                while($data_barang = mysqli_fetch_object($tampil_barang)){
                ?>
                <tr>
                  <td><?= $data_barang->id_barang ?></td>
                  <td><?= $data_barang->nama_barang ?></td>
                  <td>
                    <?php
                    $tampil_kategori = mysqli_query($conn,"SELECT * FROM kategori WHERE id_kategori = '$data_barang->kategori'");
                    $data_kategori = mysqli_fetch_object($tampil_kategori);
                    echo $data_kategori->nama_kategori;
                    ?>
                  </td>
                  <td><?= $data_barang->harga ?>/<?= $data_barang->satuan ?></td>
                  <td><?= $data_barang->stok ?></td>
                  <td>
                    <a href="../query/q_admin.php?aksi=hapus_barang&id=<?= $data_barang->id_barang ?>" class="btn btn-danger" onclick="return confirm('Apakah anda yakin ingin menghapus data ?')">Hapus</a>
                    <a href="edit_barang.php?id=<?= $data_barang->id_barang ?>" class="btn btn-success">Edit</a>
                  </td>
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
<?php
include 'header.php';
$id_barang = $_GET['id'];
$tampil_barang = mysqli_query($conn,"SELECT * FROM barang WHERE id_barang = '$id_barang'");
$data_barang = mysqli_fetch_object($tampil_barang);
?>
  

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Tambah Barang
      </h1>
      <ol class="breadcrumb">
        <li><a href="dashboard.php"><i class="fa fa-user"></i> Admin</a></li>
        <li class="active">Tambah Barang</li>
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
              <h3 class="box-title">Tambahkan Barang Baru</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="../query/q_admin.php?aksi=edit_barang" method="post" enctype="multipart/form-data">
              <div class="box-body">
              <?php include 'alert.php'; ?>
                <input type="hidden" name="id" value="<?= $data_barang->id_barang ?>">
                <div class="form-group">
                  <label for="nama">Nama Barang</label>
                  <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan nama barang" value="<?= $data_barang->nama_barang ?>" required>
                </div>
                <div class="form-group">
                  <label for="kategori">Kategori</label>
                  <select name="kategori" id="kategori" class="form-control" required>
                    <?php
                    $tampil_kategori = mysqli_query($conn,"SELECT * FROM kategori");
                    while($data_kategori = mysqli_fetch_object($tampil_kategori)){
                    if ($data_barang->kategori == $data_kategori->id_kategori) {
                      $selected = "selected";
                    } else {
                      $selected = "";
                    }
                      
                    ?>
                    <option value="<?= $data_kategori->id_kategori ?>" <?= $selected; ?>><?= $data_kategori->nama_kategori ?></option>
                    <?php } ?>
                    }
                  </select>
                </div>
                <div class="form-group">
                  <label for="harga">Harga</label>
                  <input type="text" class="form-control" id="harga" name="harga" placeholder="Masukkan harga barang" value="<?= $data_barang->harga ?>" required>
                </div>
                <div class="form-group">
                  <label for="satuan">Satuan</label>
                  <input type="text" class="form-control" id="satuan" name="satuan" placeholder="Satuan (ex: /pcs /3bungkus)" value="<?= $data_barang->satuan ?>" required>
                </div>
                <div class="form-group">
                  <label for="stok">Stok</label>
                  <input type="number" class="form-control" id="stok" name="stok" placeholder="Stok barang" value="<?= $data_barang->stok ?>" required>
                </div>
                <div class="form-group">
                  <label for="deskripsi">Deskripsi</label>
                  <textarea id="editor1" name="deskripsi" rows="10" cols="80"><?= $data_barang->deskripsi; ?></textarea>
                  <!-- <textarea class="form-control" name="deskripsi" id="deskripsi" cols="30" rows="10" placeholder="Masukkan deskripsi produk"></textarea> -->
                </div>

                <?php
                if ($data_barang->gambar != "") {
                ?>
                <div class="form-group">
                  <img src="../foto_produk/<?= $data_barang->gambar; ?>" style="max-width: 100px" class="img-responsive" alt="gambar produk"/>
                </div>
                <?php
                }
                ?>

                <div class="form-group">
                  <label for="file">Upload file foto</label>
                  <input type="file" id="file" name="file">

                  <p class="help-block">Foto maximal 2Mb. Format file yang di ijinkan .jpg .png. jpeg</p>
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
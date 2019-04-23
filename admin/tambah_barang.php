<?php
include 'header.php';
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
            <form role="form" action="../query/q_admin.php?aksi=tambah_barang" method="post" enctype="multipart/form-data">
              <div class="box-body">
              <?php include 'alert.php'; ?>
                
                <div class="form-group">
                  <label for="nama">Nama Barang</label>
                  <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan nama barang" required>
                </div>
                <div class="form-group">
                  <label for="kategori">Kategori</label>
                  <select name="kategori" id="kategori" class="form-control" required>
                    <option value="">== Pilih Kategori ==</option>
                    <?php
                    $tampil_kategori = mysqli_query($conn,"SELECT * FROM kategori");
                    while($data_kategori = mysqli_fetch_object($tampil_kategori)){
                    ?>
                    <option value="<?= $data_kategori->id_kategori ?>"><?= $data_kategori->nama_kategori ?></option>
                    <?php } ?>
                  </select>
                </div>
                <div class="form-group">
                  <label for="harga">Harga</label>
                  <input type="text" class="form-control" id="harga" name="harga" placeholder="Masukkan harga barang" required>
                </div>
                <div class="form-group">
                  <label for="satuan">Satuan</label>
                  <input type="text" class="form-control" id="satuan" name="satuan" placeholder="Satuan (ex: /pcs /3bungkus)" required>
                </div>
                <div class="form-group">
                  <label for="stok">Stok</label>
                  <input type="number" class="form-control" id="stok" name="stok" placeholder="Stok barang" required>
                </div>
                <div class="form-group">
                  <label for="deskripsi">Deskripsi</label>
                  <textarea id="editor1" name="deskripsi" rows="10" cols="80"></textarea>
                  <!-- <textarea class="form-control" name="deskripsi" id="deskripsi" cols="30" rows="10" placeholder="Masukkan deskripsi produk"></textarea> -->
                </div>

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
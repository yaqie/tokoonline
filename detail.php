<?php
include 'header.php';
?>
<?php
$id_barang = $_GET['id'];
$tampil_barang = mysqli_query($conn,"SELECT * FROM barang WHERE id_barang = '$id_barang' ORDER BY id_barang DESC");
$data_barang = mysqli_fetch_object($tampil_barang);
?>
	
	
	<section>
		<div class="container">
			<div class="row">
				
				<?php include 'sidebar.php'; ?>

				<div class="col-sm-9 padding-right">
					<div class="product-details"><!--product-details-->
						<div class="col-sm-5">
							<div class="view-product">
								<?php
								if($data_barang->gambar != ''){
								?>
									<a href="foto_produk/<?= $data_barang->gambar ?>" target="_blank"><img src="foto_produk/<?= $data_barang->gambar ?>" alt="" class="img-responsive" style="object-fit: cover;" /></a>
								<?php
								} else {
								?>
									<img src="images/noimage.jpg" alt="" class="img-responsive" style="height:200px;object-fit: cover;" />
								<?php
								}
								?>
							</div>
						</div>
						<div class="col-sm-7">
							<div class="product-information"><!--/product-information-->
								<?php include 'alert.php'; ?>
								<h2><?= $data_barang->nama_barang ?></h2>
								<?php
								// cek apakan user sudah login apa belum
								// kalo udah dia bisa tambah keranjang belanja
								if (isset($_SESSION['id_user'])) {
								?>
								<form action="query/q_user.php?aksi=cart" method="post">
									<span>
										<span>Rp <?= $data_barang->harga ?></span>
										<label>Kuantiti:</label>
											<input type="hidden" name="id_barang" value="<?= $id_barang ?>">
											<input type="hidden" name="id_user" value="<?= $_SESSION['id_user'] ?>">
											<input type="text" value="0" name="qt" />
											<button type="submit" class="btn btn-fefault cart">
												<i class="fa fa-shopping-cart"></i>
												Keranjang
											</button>
									</span>
								</form>
								<?php
								// kalo belum dia login dlu
								} else {
								?>
									<span>
										<span>Rp <?= $data_barang->harga ?></span>
										<label>Kuantiti:</label>
											<input type="text" value="0" name="qt" />
											<a href="login.php" class="btn btn-fefault cart">
												<i class="fa fa-shopping-cart"></i>
												Keranjang
											</a>
									</span>
								<?php
								}
								?>
								<p><b>Kategori :</b> <?= $data_barang->kategori ?></p>
								<p><b>Satuan :</b> Rp <?= $data_barang->harga ?><?= $data_barang->satuan ?></p>
								<p><b>Stok :</b>  <?= $data_barang->stok ?></p>
								<div style="padding-bottom:100px;">
								<p><?= $data_barang->deskripsi ?></p>
								</div>
							</div><!--/product-information-->
						</div>
					</div><!--/product-details-->

				</div>
			</div>
		</div>
	</section>
	
<?php
include 'footer.php';
?>
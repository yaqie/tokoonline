<?php
include 'header.php';
?>
	
	
	<section>
		<div class="container">
			<div class="row">
				
				<?php include 'sidebar.php'; ?>
				
				<div class="col-sm-9 padding-right">
					<div class="features_items"><!--features_items-->
						<h2 class="title text-center">Produk Kami</h2>
						<?php
						$tampil_barang = mysqli_query($conn,"SELECT * FROM barang ORDER BY id_barang DESC");
						while($data_barang = mysqli_fetch_object($tampil_barang)){
						?>
						<div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
										<div class="productinfo text-center">
											<a href="detail.php?id=<?= $data_barang->id_barang ?>">
											<?php
											if($data_barang->gambar != ''){
											?>
												<img src="foto_produk/<?= $data_barang->gambar ?>" alt="" class="img-responsive" style="height:200px;object-fit: cover;" />
											<?php
											} else {
											?>
												<img src="images/noimage.jpg" alt="" class="img-responsive" style="height:200px;object-fit: cover;" />
											<?php
											}
											?>
											</a>
											<h2><?= $data_barang->harga ?><?= $data_barang->satuan ?></h2>
											<p><?= $data_barang->nama_barang ?></p>
											<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
										</div>
								</div>
							</div>
						</div>
						<?php } ?>
					</div><!--features_items-->
					
					
				</div>
			</div>
		</div>
	</section>
	
<?php
include 'footer.php';
?>
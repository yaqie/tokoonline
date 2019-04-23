<?php
include 'header.php';
?>

	
	
	<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="#">Home</a></li>
				  <li class="active">Shopping Cart</li>
				</ol>
			</div>
			<div class="table-responsive cart_info">
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">Produk</td>
							<td class="description"></td>
							<td class="price">Harga</td>
							<td class="quantity">Kuantiti</td>
							<td class="total">Total</td>
							<td></td>
						</tr>
					</thead>
					<tbody>

						<?php
						$id_user = $_SESSION['id_user'];
						$tampil_barang = mysqli_query($conn , "SELECT * FROM transaksi WHERE kode_user = '$id_user' AND status = '0' ");
						while ($data_barang = mysqli_fetch_object($tampil_barang)) {
							$detail_barang = mysqli_query($conn , "SELECT * FROM barang WHERE id_barang = $data_barang->kode_barang ");
							$r_detail_barang = mysqli_fetch_object($detail_barang);
						?>
						
						<tr>
							<td class="cart_product">
								<!-- <a href=""><img src="images/cart/one.png" alt=""></a> -->
								<a href="">
								<?php
								if($r_detail_barang->gambar != ''){
								?>
									<img src="foto_produk/<?= $r_detail_barang->gambar ?>" alt="" style="height:100px;width:100px;object-fit: cover;" />
								<?php
								} else {
								?>
									<img src="images/noimage.jpg" alt="" style="height:100px;width:100px;object-fit: cover;" />
								<?php
								}
								?>
								</a>
							</td>
							<td class="cart_description">
								<h4><a href=""><?= $r_detail_barang->nama_barang ?></a></h4>
								<p>Kode Invoice: <?= $data_barang->kode_transaksi ?></p>
							</td>
							<td class="cart_price">
								<p>Rp <?= $r_detail_barang->harga ?></p>
							</td>
							<td class="cart_quantity">
								<p><?= $data_barang->kuantiti ?></p>
							</td>
							<td class="cart_total">
								<p class="cart_total_price">$59</p>
							</td>
							<td class="cart_delete">
								<a class="cart_quantity_delete" href=""><i class="fa fa-times"></i></a>
							</td>
						</tr>

						<?php } ?>

					</tbody>
				</table>
			</div>
		</div>
	</section> <!--/#cart_items-->

	<section id="do_action">
		<div class="container">
			<div class="heading">
				<h3>What would you like to do next?</h3>
				<p>Choose if you have a discount code or reward points you want to use or would like to estimate your delivery cost.</p>
			</div>
			<div class="row">
				<div class="col-sm-6">
					<div class="chose_area">
						<ul class="user_option">
							<li>
								<input type="checkbox">
								<label>Use Coupon Code</label>
							</li>
							<li>
								<input type="checkbox">
								<label>Use Gift Voucher</label>
							</li>
							<li>
								<input type="checkbox">
								<label>Estimate Shipping & Taxes</label>
							</li>
						</ul>
						<ul class="user_info">
							<li class="single_field">
								<label>Country:</label>
								<select>
									<option>United States</option>
									<option>Bangladesh</option>
									<option>UK</option>
									<option>India</option>
									<option>Pakistan</option>
									<option>Ucrane</option>
									<option>Canada</option>
									<option>Dubai</option>
								</select>
								
							</li>
							<li class="single_field">
								<label>Region / State:</label>
								<select>
									<option>Select</option>
									<option>Dhaka</option>
									<option>London</option>
									<option>Dillih</option>
									<option>Lahore</option>
									<option>Alaska</option>
									<option>Canada</option>
									<option>Dubai</option>
								</select>
							
							</li>
							<li class="single_field zip-field">
								<label>Zip Code:</label>
								<input type="text">
							</li>
						</ul>
						<a class="btn btn-default update" href="">Get Quotes</a>
						<a class="btn btn-default check_out" href="">Continue</a>
					</div>
				</div>
				<div class="col-sm-6">
					<div class="total_area">
						<ul>
							<li>Cart Sub Total <span>$59</span></li>
							<li>Eco Tax <span>$2</span></li>
							<li>Shipping Cost <span>Free</span></li>
							<li>Total <span>$61</span></li>
						</ul>
							<a class="btn btn-default update" href="">Update</a>
							<a class="btn btn-default check_out" href="">Check Out</a>
					</div>
				</div>
			</div>
		</div>
	</section><!--/#do_action-->
	
<?php
include 'footer.php';
?>
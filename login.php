<?php
include 'header.php';
if(isset($_SESSION['id_user'])){
header('location:index.php');
}
?>
	
	
	<section id="form"><!--form-->
		<div class="container">
			<div class="row">
				<div class="col-sm-12 col-sm-offset-1">
					<?php include 'alert.php'; ?>
				</div>
				<div class="col-sm-4 col-sm-offset-1">
					<div class="login-form"><!--login form-->
						<h2>Login to your account</h2>
						<form action="query/q_user.php?aksi=login" method="post">
							<input type="email" placeholder="Email" name="email" require />
							<input type="password" placeholder="Password" name="password" require />
							<button type="submit" class="btn btn-default">Login</button>
						</form>
					</div><!--/login form-->
				</div>
				<div class="col-sm-1">
					<h2 class="or">OR</h2>
				</div>
				<div class="col-sm-4">
					<div class="signup-form"><!--sign up form-->
						<h2>New User Signup!</h2>
						<form action="query/q_user.php?aksi=daftar" method="post">
							<input type="text" name="username" placeholder="Username"/>	
							<input type="text" name="nama_lengkap" placeholder="Nama Lengkap"/>
							<input type="text" name="no_hp" placeholder="Nomor Hanphone" maxlength="13"/>
							<input type="email" name="email" placeholder="Alamat Email"/>
							<input type="password" name="password" placeholder="Password"/>
							<button type="submit" class="btn btn-default">Signup</button>
						</form>
					</div><!--/sign up form-->
				</div>
			</div>
		</div>
	</section><!--/form-->
	
<?php
include 'footer.php';
?>
<?php
session_start();
include '../koneksi.php';

date_default_timezone_set("Asia/Jakarta");
$date = date("Y-m-d H:i:s");

$aksi = $_GET['aksi'];

// cek login
if ($aksi == 'login') {

	//ambil data yang di inputkan dari website
	$email = $_POST['email'];
    $password = sha1($_POST['password']);
    
    echo $password;

	//cek data apakah data yang di inputkan ada di database atau tidak
	$query 		= mysqli_query($conn,"SELECT * FROM user WHERE email = '$email' AND password = '$password'");
	$data_akun 	= mysqli_fetch_object($query);
	$cek_akun 	= mysqli_num_rows($query);

	//jika data ditemukan maka buat session dan masuk ke halaman dashboard admin
	session_start();
	if ($cek_akun >= 1) {
		$_SESSION['id_user'] 		= $data_akun->id_user;
		$_SESSION['username_user'] 	= $data_akun->username;
		header('location:../index.php');
	} else {
		$_SESSION['gagal'] 		= "Username atau Password salah";
		header('location:../login.php');
	}
	
}






// aksi daftar
if ($aksi == 'daftar') {

	//ambil data yang di inputkan dari website
    $nama_lengkap   = $_POST['nama_lengkap'];
    $username       = $_POST['username'];
    $email          = $_POST['email'];
    $no_hp          = $_POST['no_hp'];
	$password       = sha1($_POST['password']);

	// cek apakah username sudah digunakan atau belum
	$query 		    = mysqli_query($conn,"SELECT * FROM user WHERE username = '$username' ");
    $cek_username 	= mysqli_num_rows($query);

    // cek apakah email sudah digunakan atau belum
	$query2 		= mysqli_query($conn,"SELECT * FROM user WHERE email = '$email' ");
    $cek_email 	    = mysqli_num_rows($query2);
    

	//jika data ditemukan maka buat session dan masuk ke halaman dashboard admin
    session_start();
    

	if ($cek_username >= 1) {
		$_SESSION['gagal'] 		= "Username sudah digunakan!";
		header('location:../login.php');
	} else {
        if ($cek_email >= 1) {
            $_SESSION['gagal'] 		= "Email sudah digunakan!";
            header('location:../login.php');
        } else {
            mysqli_query($conn,"INSERT INTO `user` (`id_user`, `username`, `nama_lengkap`, `password`, `email`, `no_hp`) VALUES (NULL, '$username', '$nama_lengkap', '$password', '$email', '$no_hp');");
            $_SESSION['sukses'] 		= "Pendaftaran berhasil";
            header('location:../login.php');
        }
	}
	
}




// keranjang belanja
if ($aksi == 'cart') {

	//ambil data yang di inputkan dari website
    $id_barang   	= $_POST['id_barang'];
    $id_user   		= $_POST['id_user'];
    $qt   			= $_POST['qt'];

	if ($qt <= 0) {
		$_SESSION['gagal'] 		= "Kuantiti barang tidak valid";
		header('location:../detail.php?id='.$id_barang);
	} else {
        $cek_stok_barang = mysqli_query($conn, "SELECT * FROM barang WHERE id_barang = '$id_barang'");
        $row_barang = mysqli_fetch_object($cek_stok_barang);
        if ($qt > $row_barang->stok) {
        	$_SESSION['gagal'] 		= "Stok barang tidak memenuhi";
			header('location:../detail.php?id='.$id_barang);
        } else {
        	$kode_transaksi = "TR-".$id_barang.rand(1000,9999);
        	mysqli_query($conn , "INSERT INTO `transaksi` (`id_transaksi`, `kode_transaksi`, `kode_barang`, `status`, `kuantiti`, `kode_user`, `tanggaljam`) VALUES (NULL, '$kode_transaksi', '$id_barang', '0', '$qt', '$id_user', '$date');");
        	$_SESSION['sukses'] 		= "Barang di masukkan ke keranjang belanja <i class='fa fa-thumbs-o-up'></i><br>Klik <a href='cart.php'>disini</a> untuk melihat keranjang belanja anda";
			header('location:../detail.php?id='.$id_barang);
        }
	}
	
}









// logout
if ($aksi == 'logout') {
	session_start();
	session_destroy();
	header('location:../index.php');
}

?>
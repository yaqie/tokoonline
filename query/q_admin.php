<?php
session_start();
include '../koneksi.php';

date_default_timezone_set("Asia/Jakarta");
$date = date("Y-m-d H:i:s");

$aksi = $_GET['aksi'];

// cek login
if ($aksi == 'login') {

	//ambil data yang di inputkan dari website
	$username = $_POST['username'];
	$password = sha1($_POST['password']);

	//cek data apakah data yang di inputkan ada di database atau tidak
	$query 		= mysqli_query($conn,"SELECT * FROM admin WHERE username = '$username' AND password = '$password'");
	$data_akun 	= mysqli_fetch_object($query);
	$cek_akun 	= mysqli_num_rows($query);

	//jika data ditemukan maka buat session dan masuk ke halaman dashboard admin
	session_start();
	if ($cek_akun >= 1) {
		$_SESSION['id'] 		= $data_akun->id_admin;
		$_SESSION['username'] 	= $data_akun->username;
		header('location:../admin/dashboard.php');
	} else {
		$_SESSION['gagal'] 		= "Username atau Password salah";
		header('location:../admin/login.php');
	}
	
}






// tambah barang baru
if ($aksi == 'tambah_barang') {

	// ambil data dari inputan user
	$nama		= $_POST['nama'];
	$kategori 	= $_POST['kategori'];
	$harga 		= $_POST['harga'];
	$satuan 	= $_POST['satuan'];
	$stok 		= $_POST['stok'];
	$deskripsi 	= $_POST['deskripsi'];

	



	$ekstensi = array('jpg','png','jpeg');
	$file = $_FILES['file']['name'];
	$x = explode('.', $file);
	$eks = strtolower(end($x));
	$ukuran = $_FILES['file']['size'];
	$target_dir = "../foto_produk/";

	if($file != ""){

		$path = $_FILES['file']['name'];
    $ext = pathinfo($path, PATHINFO_EXTENSION);

    $nfile = md5($file).".".$ext;
    //validasi file
    if(in_array($eks, $ekstensi) == true){

      if($ukuran < 2500000){
        move_uploaded_file($_FILES['file']['tmp_name'], $target_dir.$nfile);
        mysqli_query($conn, "INSERT INTO `barang` (`id_barang`, `nama_barang`, `kategori`, `harga`, `satuan`, `stok`, `deskripsi`, `gambar`, `created_at`) VALUES (NULL, '$nama', '$kategori', '$harga', '$satuan', '$stok', '$deskripsi','$nfile','$date');");

        $_SESSION['sukses'] = 'Tambah Data Berhasil, silahkan klik <a href="../admin/barang.php">disini</a> untuk melihat data barang';
				header('location:../admin/tambah_barang.php');

      } else {
        $_SESSION['gagal'] = 'Ukuran file yang diupload terlalu besar!';
				header('location:../admin/tambah_barang.php');
      }
    } else {
      $_SESSION['gagal'] = 'Format file yang diperbolehkan hanya *.JPG, *.PNG, *.DOC, *.DOCX atau *.PDF!';
			header('location:../admin/tambah_barang.php');
    }

  } else {
    
    //jika user tidak mengupload gambar
    mysqli_query($conn, "INSERT INTO `barang` (`id_barang`, `nama_barang`, `kategori`, `harga`, `satuan`, `stok`, `deskripsi`, `gambar`, `created_at`) VALUES (NULL, '$nama', '$kategori', '$harga', '$satuan', '$stok', '$deskripsi','','$date');");

		$_SESSION['sukses'] = 'Tambah Data Berhasil, silahkan klik <a href="../admin/barang.php">disini</a> untuk melihat data barang';
		header('location:../admin/tambah_barang.php');
  }

	
}



// edit barang
if ($aksi == 'edit_barang') {

	// ambil data dari inputan user
	$id					= $_POST['id'];
	$nama				= $_POST['nama'];
	$kategori 	= $_POST['kategori'];
	$harga 			= $_POST['harga'];
	$satuan 		= $_POST['satuan'];
	$stok 			= $_POST['stok'];
	$deskripsi	= $_POST['deskripsi'];

	



	$ekstensi = array('jpg','png','jpeg');
	$file = $_FILES['file']['name'];
	$x = explode('.', $file);
	$eks = strtolower(end($x));
	$ukuran = $_FILES['file']['size'];
	$target_dir = "../foto_produk/";

	if($file != ""){

		$path = $_FILES['file']['name'];
    $ext = pathinfo($path, PATHINFO_EXTENSION);

    $nfile = md5($file).".".$ext;
    //validasi file
    if(in_array($eks, $ekstensi) == true){

      if($ukuran < 2500000){
        move_uploaded_file($_FILES['file']['tmp_name'], $target_dir.$nfile);
        mysqli_query($conn, "UPDATE `barang` SET `nama_barang` = '$nama', `kategori` = '$kategori', `harga` = '$harga', `satuan` = '$satuan', `stok` = '$stok', `deskripsi` = '$deskripsi', `gambar` = '$nfile' WHERE `barang`.`id_barang` = $id;");

        $_SESSION['sukses'] = 'Edit Data Berhasil, silahkan klik <a href="../admin/barang.php">disini</a> untuk melihat data barang';
				header('location:../admin/edit_barang.php?id='.$id);

      } else {
        $_SESSION['gagal'] = 'Ukuran file yang diupload terlalu besar!';
				header('location:../admin/edit_barang.php?id='.$id);
      }
    } else {
      $_SESSION['gagal'] = 'Format file yang diperbolehkan hanya *.JPG, *.PNG, *.DOC, *.DOCX atau *.PDF!';
      header('location:../admin/edit_barang.php?id='.$id);
    }

  } else {
    
    //jika user tidak mengupload gambar
    mysqli_query($conn, "UPDATE `barang` SET `nama_barang` = '$nama', `kategori` = '$kategori', `harga` = '$harga', `satuan` = '$satuan', `stok` = '$stok', `deskripsi` = '$deskripsi' WHERE `barang`.`id_barang` = $id;");

		$_SESSION['sukses'] = 'Edit Data Berhasil, silahkan klik <a href="../admin/barang.php">disini</a> untuk melihat data barang';
		header('location:../admin/edit_barang.php?id='.$id);
  }

	
}

// hapus produk
if ($aksi == 'hapus_barang') {

	// ambil data dari inputan user
	$id = $_GET['id'];

	mysqli_query($conn, "DELETE FROM `barang` WHERE `barang`.`id_barang` = $id");

	header('location:../admin/barang.php');
	
}





// tambah kategori baru
if ($aksi == 'kategori') {

	// ambil data dari inputan user
	$nama = $_POST['nama'];

	mysqli_query($conn, "INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES (NULL, '$nama');");

	header('location:../admin/kategori.php');
	
}


// hapus kategori
if ($aksi == 'hapus_kategori') {

	// ambil data dari inputan user
	$id = $_GET['id'];

	mysqli_query($conn, "DELETE FROM `kategori` WHERE `kategori`.`id_kategori` = $id");

	header('location:../admin/kategori.php');
	
}

// edit kategori
if ($aksi == 'edit_kategori') {

	// ambil data dari inputan user
	$id = $_POST['id'];
	$nama = $_POST['nama'];

	mysqli_query($conn, "UPDATE `kategori` SET `nama_kategori` = '$nama' WHERE `id_kategori` = $id;");

	header('location:../admin/kategori.php');
	
}



// edit about
if ($aksi == 'edit_about') {

	// ambil data dari inputan user
	$deskripsi = $_POST['deskripsi'];

	mysqli_query($conn, "UPDATE `web` SET `keterangan1` = '$deskripsi' WHERE `bagian` = 'about';");

	header('location:../admin/about.php');
	
}



// edit contact
if ($aksi == 'contact') {

	// ambil data dari inputan user
	$no_hp = $_POST['no_hp'];
	$alamat = $_POST['alamat'];
	$email = $_POST['email'];

	mysqli_query($conn, "UPDATE `web` SET `keterangan1` = '$no_hp',`keterangan2` = '$alamat',`keterangan3` = '$email' WHERE `bagian` = 'contact';");

	header('location:../admin/contact.php');
	
}











// logout
if ($aksi == 'logout') {
	session_start();
	session_destroy();
	header('location:../admin/login.php');
}

?>
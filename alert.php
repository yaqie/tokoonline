<?php
if (isset($_SESSION['sukses'])) {
?>
    <p style="color:green;"><?= $_SESSION['sukses']; ?></p>
<?php
unset($_SESSION['sukses']);
}


if (isset($_SESSION['gagal'])) {
?>
	<p style="color:red;"><?= $_SESSION['gagal']; ?></p>
<?php
unset($_SESSION['gagal']);
}

?>
<?php
if (isset($_SESSION['sukses'])) {
?>
	<div class="callout callout-success">
		<p><?= $_SESSION['sukses']; ?></p>
	</div>
<?php
unset($_SESSION['sukses']);
}


if (isset($_SESSION['gagal'])) {
?>
	<div class="callout callout-danger">
		<p><?= $_SESSION['gagal']; ?></p>
	</div>
<?php
unset($_SESSION['gagal']);
}

?>
<?php
if ( isset($_POST['nama']) && isset($_POST['satuan']) && isset($_POST['stok']) && isset($_POST['ket']) ) {
	$nama=$_POST['nama'];
	$satuan=$_POST['satuan'];
	$stok=$_POST['stok'];
	$ket=$_POST['ket'];


	echo "".$nama;
}
?>
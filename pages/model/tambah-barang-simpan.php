<?php
require_once('../inc.php');
$conn=new mysqli(HOST,USER,PASS,DB);
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

if ( isset($_POST['nama']) && isset($_POST['satuan']) && isset($_POST['stok']) && isset($_POST['ket']) ) {
	$nama=trim($_POST['nama']);
	$satuan=trim($_POST['satuan']);
	$stok=trim($_POST['stok']);
	$ket=trim($_POST['ket']);

	if (strlen($nama)>0 && strlen($satuan)>0 && strlen($stok)>0) {
		$sql="INSERT IGNORE INTO barang(nama, satuan, stok, ket)VALUES(?,?,?,?);";
		$stmt=$conn->prepare($sql);
		$stmt->bind_param('ssis',$nama,$satuan,$stok,$ket);
		if ($stmt->execute()) {
			echo "Berhasil menambahkan data !";
			echo "<script type=\"text/javascript\">document.getElementById('form').reset();</script>";
		}else{
			echo "Gagal menambahkan data !";
		}
		$stmt->close();
	}else echo "Data belum lengkap !";
}
$conn->close();
?>
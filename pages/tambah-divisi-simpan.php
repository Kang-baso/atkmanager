<?php
require_once('inc.php');
$conn=new mysqli(HOST,USER,PASS,DB);
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

if ( isset($_POST['nama']) && isset($_POST['ket']) ) {
	$nama=trim($_POST['nama']);
	$ket=trim($_POST['ket']);

	if (strlen($nama)>0) {
		$sql="INSERT IGNORE INTO divisi(nama, ket)VALUES(?,?);";
		$stmt=$conn->prepare($sql);
		$stmt->bind_param('ss',$nama,$ket);
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
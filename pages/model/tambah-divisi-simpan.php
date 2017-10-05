<?php
require_once('../inc.php');
$conn=new mysqli(HOST,USER,PASS,DB);
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

if ( isset($_POST['nama']) && isset($_POST['ket']) && isset($_POST['manager']) ) {
	$nama=trim($_POST['nama']);
	$ket=trim($_POST['ket']);
	$mgr=trim($_POST['manager']);

	if (strlen($nama)>0) {
		$sql="INSERT IGNORE INTO divisi(nama, ket, nik_manager)VALUES(?,?,?);";
		$stmt=$conn->prepare($sql);
		$stmt->bind_param('sss',$nama,$ket,$mgr);
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
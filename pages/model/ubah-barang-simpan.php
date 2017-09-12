<?php
require_once('../inc.php');
$conn=new mysqli(HOST,USER,PASS,DB);
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

if ( isset($_POST['nama']) && isset($_POST['satuan']) && isset($_POST['stok']) && isset($_POST['ket']) && isset($_POST['id']) ) {
	$id=trim($_POST['id']);
	$nama=trim($_POST['nama']);
	$satuan=trim($_POST['satuan']);
	$stok=trim($_POST['stok']);
	$ket=trim($_POST['ket']);

	if (strlen($nama)>0 && strlen($satuan)>0 && strlen($stok)>0 && strlen($id)>0) {
		$sql="UPDATE barang SET nama=?, satuan=?, stok=?, ket=? WHERE id=?;";
		$stmt=$conn->prepare($sql);
		$stmt->bind_param('ssisi',$nama,$satuan,$stok,$ket,$id);
		if ($stmt->execute()) {
			echo "Berhasil mengubah data !";
			#echo "<script type=\"text/javascript\">document.getElementById('form').reset();</script>";			
		}else{
			echo "Gagal mengubah data !";
		}
		$stmt->close();
	}else echo "Data belum lengkap !";
}
$conn->close();
?>
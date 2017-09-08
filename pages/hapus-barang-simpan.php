<?php
require_once('inc.php');
$conn=new mysqli(HOST,USER,PASS,DB);
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

if ( isset($_POST['id']) ) {
	$id=trim($_POST['id']);

	if (strlen($id)>0) {
		$sql="DELETE FROM barang WHERE id=?;";
		$stmt=$conn->prepare($sql);
		$stmt->bind_param('i',$id);
		if ($stmt->execute()) {
			echo "Berhasil hapus data !";
			#echo "<script type=\"text/javascript\">document.getElementById('form').reset();</script>";			
		}else{
			echo "Gagal hapus data !";
		}
		$stmt->close();
	}#else echo "Data belum lengkap !";
}
$conn->close();
?>
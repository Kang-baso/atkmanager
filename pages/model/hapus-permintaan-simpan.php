<?php
require_once('../inc.php');
$conn=new mysqli(HOST,USER,PASS,DB);
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

if ( isset($_POST['id']) ) {
	$id=trim($_POST['id']);

	if (strlen($id)>0) {
		$sql="DELETE FROM permintaan_d WHERE nomor_permintaan=?;";
		$stmt=$conn->prepare($sql);
		$stmt->bind_param('s',$id);
		if ($stmt->execute()) {
			$sql="DELETE FROM permintaan WHERE nomor=?;";
			$stmt1=$conn->prepare($sql);
			$stmt1->bind_param('s',$id);
			if ($stmt1->execute()) {
				echo "Berhasil hapus data !";
				#echo "<script type=\"text/javascript\">document.getElementById('form').reset();</script>";			
			}
			$stmt1->close();
		}else{
			echo "Gagal hapus data !";
		}
		$stmt->close();
	}#else echo "Data belum lengkap !";
}
$conn->close();
?>
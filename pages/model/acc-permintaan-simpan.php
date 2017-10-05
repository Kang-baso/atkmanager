<?php
require_once('../inc.php');
$conn=new mysqli(HOST,USER,PASS,DB);
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

if ( isset($_POST['id']) ) {
	$id=trim($_POST['id']);

	if (strlen($id)>0) {
		$sql="UPDATE permintaan SET status=1 WHERE nomor=?;";
		$stmt=$conn->prepare($sql);
		$stmt->bind_param('s',$id);
		if ($stmt->execute()) {
			echo "Berhasil menyetujui permintaan !";
			#echo "<script type=\"text/javascript\">document.getElementById('form').reset();</script>";
		}else{
			echo "Gagal menyetujui permintaan !";
		}
		$stmt->close();
	}#else echo "Data belum lengkap !";
}
$conn->close();
?>
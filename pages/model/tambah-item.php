<?php
session_start();
require_once('../inc.php');
$conn=new mysqli(HOST,USER,PASS,DB);
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

if ( isset($_POST['hidden_id']) &&  isset($_POST['text_jml']) ) {
	$id=trim($_POST['hidden_id']);
	$jml=trim($_POST['text_jml']);

	echo $id."<br/>".$jml;
	/*if (strlen($id)>0) {
		$sql="DELETE FROM divisi WHERE id=?;";
		$stmt=$conn->prepare($sql);
		$stmt->bind_param('i',$id);
		if ($stmt->execute()) {
			echo "Berhasil hapus data !";
			#echo "<script type=\"text/javascript\">document.getElementById('form').reset();</script>";			
		}else{
			echo "Gagal hapus data !";
		}
		$stmt->close();
	}*/#else echo "Data belum lengkap !";
}
$conn->close();
?>
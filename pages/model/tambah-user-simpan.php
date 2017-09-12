<?php
require_once('../inc.php');
$conn=new mysqli(HOST,USER,PASS,DB);
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

if ( isset($_POST['nik']) && isset($_POST['nama']) && isset($_POST['pass']) && isset($_POST['telp']) && isset($_POST['email']) && isset($_POST['posisi']) && isset($_POST['divisi']) && isset($_POST['atasan']) ) {
	$nik=trim($_POST['nik']);
	$nama=trim($_POST['nama']);
	$pass=trim($_POST['pass']);
	$telp=trim($_POST['telp']);
	$email=trim($_POST['email']);
	$divisi=trim($_POST['divisi']);
	$atasan=trim($_POST['atasan']);

	if (strlen($nama)>0 && strlen($nik)>0 && strlen($pass)>0 && strlen($divisi)>0) {
		$sql="INSERT IGNORE INTO user(nik, nama, password, telp, email, id_divisi,nik_atasan)VALUES(?, ?, ?, ?, ?, ?,?);";
		$stmt=$conn->prepare($sql);
		$stmt->bind_param('sssssis',$nik,$nama,$pass,$telp,$email,$divisi,$atasan);
		if ($stmt->execute()) {
			echo "Berhasil menambah data !";
			#echo "<script type=\"text/javascript\">document.getElementById('form').reset();</script>";			
		}else{
			echo "Gagal menambah data !";
		}
		$stmt->close();
	}else echo "Data belum lengkap !";
}
$conn->close();
?>
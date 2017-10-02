<?php
require_once('../inc.php');
$conn=new mysqli(HOST,USER,PASS,DB);
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

if ( isset($_POST['tgl1']) && isset($_POST['tgl2']) ) {
	$tgl1=$_POST['tgl1'];$tgl1=trim($tgl1);
	$tgl2=$_POST['tgl2'];$gsl2=trim($tgl2);
	if(strlen($tgl1)>0 && strlen($tgl2)>0){
		$i=0;
		$sql="SELECT nomor,alasan,status,tgl,nik FROM permintaan ORDER BY tgl ASC";
		$stmt=$conn->prepare($sql);
		#$stmt->execute();
		if($stmt->execute()){
			$result=$stmt->get_result();
			while($row=$result->fetch_row()){
				echo $row[0]."<br/>";
			}
		}
	}
}
?>

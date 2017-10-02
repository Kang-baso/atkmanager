<?php
require_once('../inc.php');
$conn=new mysqli(HOST,USER,PASS,DB);
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

if ( isset($_POST['tgl1']) && isset($_POST['tgl2']) ) {
	$tgl1=$_POST['tgl1'];$tgl1=trim($tgl1);
	$tgl2=$_POST['tgl2'];$gsl2=trim($tgl2);
	if(strlen($tgl1)>0 && strlen($tgl2)>0){
		$i=0;
		$sql="SELECT nomor,alasan,status,tgl,nik FROM permintaan WHERE (date(tgl) BETWEEN ? AND ?) ORDER BY tgl ASC";
		$stmt=$conn->prepare($sql);
		$stmt->bind_param('ss',$tgl1,$tgl2);
		if($stmt->execute()){
			echo "
			<div class=\"table-responsive\">
			<table class=\"table table-hover table-bordered\">
			<thead>
				<tr>
					<th>#</th>
					<th>Nomor</th>
					<th>Keterangan</th>
					<th>Tgl. Posting</th>
					<th>Status</th>
					<th>Kontrol</th>
				</tr>
			</thead>
			<tbody>
			";
			$result=$stmt->get_result();
			while($row=$result->fetch_row()){
				$i++;
				echo "
				<tr>
					<td>$i</td>
					<td>$row[0]</td>
					<td>$row[1]</td>
					<td>$row[3]</td>
					<td>".get_status($row[2])."</td>
					<td>&nbsp;</td>
				</tr>
				";
			}
			echo "
			</tbody>
			</table>
			</div>";
		}
	}
}
?>

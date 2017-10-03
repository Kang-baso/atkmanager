<?php
require_once('../inc.php');
$conn=new mysqli(HOST,USER,PASS,DB);
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

if ( isset($_POST['tgl1']) && isset($_POST['tgl2']) ) {
	$tgl1=$_POST['tgl1'];$tgl1=trim($tgl1);
	$tgl2=$_POST['tgl2'];$gsl2=trim($tgl2);
	if(strlen($tgl1)>0 && strlen($tgl2)>0){
		$i=0;
		$sql="SELECT nomor,ket,tgl,nik FROM dpb_kolektif WHERE (date(tgl) BETWEEN ? AND ?) ORDER BY tgl ASC;";

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
					<td align=\"center\">$i</td>
					<td align=\"center\"><strong>$row[0]</strong></td>
					<td>$row[1]</td>
					<td align=\"center\">$row[2]</td>
					<td align=\"center\" title=\"Cetak\">";
?>
                                                 <form method="post" target="_blank" action="<?php echo base_url()."pages/reports/cetak-dpb-kolektif.php";?>" >
                                                         <input type="hidden" name="nomor" value="<?php echo $row[0];?>" />
                                                         <input type="hidden" name="ket" value="<?php echo $row[1];?>" />
                                                         <input type="hidden" name="tgl" value="<?php echo $row[2];?>" />
                                                         <input type="hidden" name="nik" value="<?php echo $row[3];?>" />
                                                         <button type="submit" class="btn btn-info btn-sm"><span class="glyphicon glyphicon-print"></span></button>
                                                 </form>

<?php
				echo "</td>
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

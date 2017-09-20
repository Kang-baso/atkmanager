<?php
ob_start();
session_start();
require_once('../inc.php');
$conn=new mysqli(HOST,USER,PASS,DB);
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

?>
<html>
<head>
	<title>ATK & Inventory Manager - Build Version 1.0</title>

	<meta charset="utf-8">
	<meta http-equiv="content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

	<link rel="stylesheet" href="../../libs/style2.css" />

  <script type="text/javascript" src="../../libs/export/tableExport.js"></script>
  <script type="text/javascript" src="../../libs/export/jquery.base64.js"></script>
  <script type="text/javascript" src="../../libs/export/jspdf/libs/sprintf.js"></script>
  <script type="text/javascript" src="../../libs/export/jspdf/jspdf.js"></script>
  <script type="text/javascript" src="../../libs/export/jspdf/libs/base64.js"></script>

</head>
<body>
<!--a href="#" target="_blank" class="btn btn-sm btn-info" onClick ="$('#tableID').tableExport({type:'pdf',pdfFontSize:'7',escape:'false'});"><span class="glyphicon glyphicon-download-alt"></span> Export to PDF</a-->

<div id="konten">
<?php
/*if (isset($_GET['id']) 
	&& isset($_GET['tgl']) 
	&& isset($_GET['ket'])) {

	$id=trim($_GET['id']);
	$tgl=trim($_GET['tgl']);
	$ket=trim($_GET['ket']);*/
if (isset($_POST['id']) && isset($_POST['ket']) && isset($_POST['tgl']) && isset($_POST['div'])  ) {
	$id=$_POST['id'];
	$ket=$_POST['ket'];
	$tgl=$_POST['tgl'];
	$div=$_POST['div'];

?>
<div class="judul-halaman">
	Daftar Permintaan Barang
</div>
	<div class="table-responsive">
		<table class="tabel-kop ">
			<tbody>
				<tr>
					<td width="150px">Nomor</td>
					<td width="10px;">:</td>
					<td><?php echo strtoupper($id);?></td>
				</tr>
				<tr>
					<td width="150px">Keterangan</td>
					<td width="10px;">:</td>
					<td><?php echo $ket;?></td>
				</tr>
				<tr>
					<td width="150px">Tanggal Posting</td>
					<td width="10px;">:</td>
					<td><?php echo $tgl;?></td>
				</tr>
				<tr>
					<td width="150px">Divisi</td>
					<td width="1px;">:</td>
					<td><?php echo $div;?></td>
				</tr>
			</tbody>
		</table>
	  	<table class="table table-bordered" id="tableID">
	  		<thead>
	  			<tr>
	  				<th>#</th>
	  				<th>Nama</th>
	  				<th colspan="2">Jumlah</th>
	  			</tr>
	  		</thead>
	  		<tbody>

	  		<?php
	  			$i=0;
	  			$sql="SELECT DISTINCT b.id,b.nama,d.jml_minta,b.satuan FROM permintaan_d AS d LEFT OUTER JOIN barang AS b ON b.id=d.id_barang WHERE d.nomor_permintaan=?";
	  			$stmt=$conn->prepare($sql);
	  			$stmt->bind_param('s',$id);
	  			if ($stmt->execute()) {
	  				$result = $stmt->get_result();
	  				while ($row = $result->fetch_row()){
	  					$i++;
	  					?>
	  			<tr>
	  				<td align="center"><?php echo $i;?></td>
	  				<td><?php echo $row[1];?></td>
	  				<td align="right"><?php echo $row[2];?></td>
	  				<td><?php echo strtoupper($row[3]);?></td>
	  			</tr>
	  					<?php
	  				}
	  			}
	  			$stmt->close();

	  		?>
	  		</tbody>
	  	</table>
	  	<table class="tabel-ttd table">
	  		<tfoot>
	  			<tr>
	  				<td colspan="2" align="right">
	  					Jayapura, <?php echo date("d M Y");?>
	  					&nbsp;
	  					&nbsp;
	  					&nbsp;
	  					&nbsp;
	  				</td>
	  			</tr>
	  			<tr>
	  				<td width="50%" align="center">
	  					Petugas
	  				</td>
	  				<td width="50%" align="center">
	  					Manajer
	  				</td>
	  			</tr>
	  		</tfoot>
	  	</table>
	</div>
<?php
}#if isset get vars
?>
</div>
</body>
</html>


<?php
$conn->close();
?>
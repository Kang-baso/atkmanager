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
<!--a href="#" target="_blank" class="btn btn-sm btn-info" onClick ="$('#tableID').tableExport({type:'pdf',escape:'false'});"><span class="glyphicon glyphicon-download-alt"></span> Export to PDF</a-->
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

	<div class="table-responsive">
	  	<table class="table table-hover table-bordered" id="tableID">
	  		<thead>

	  			<tr>
	  				<td colspan="5">

    <div class="input-group">
      <span class="input-group-addon">Nomor</span>
      <input type="text" readonly name="id" class="form-control" value="<?php echo strtoupper($id);?>" />
    </div>
		<div class="input-group">
		  <span class="input-group-addon">Keterangan</span>
		  <input type="text" readonly name="ket" class="form-control" value="<?php echo $ket;?>" />
		</div>
    <div class="input-group">
      <span class="input-group-addon">Tanggal Posting</span>
      <input type="text" readonly name="" id="" class="form-control" value="<?php echo $tgl;?>" />
    </div>  
    <div class="input-group">
      <span class="input-group-addon">Divisi</span>
      <input type="text" readonly name="" id="" class="form-control" value="<?php echo $div;?>" />
    </div> 

	  				</td>
	  			</tr>

	  			<tr>
	  				<th>#</th>
	  				<th>Nomor</th>
	  				<th>Keterangan</th>
	  				<th>Tanggal</th>
	  				<th>Divisi</th>
	  			</tr>
	  		</thead>
	  		<tbody>

	  		<?php
for ($i=0; $i < 100; $i++) { 
	echo "<tr><td>$i</td><td>$id</td><td>$ket</td><td>$tgl</td><td>$div</td></tr>";
}
	  		?>
	  		</tbody>
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
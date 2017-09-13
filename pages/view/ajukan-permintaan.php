<?php
$is_submit="";

if (isset($_SESSION['added_item'])) {	
	if (isset($_GET['del'])) {
		$id=$_GET['del'];
		foreach ($_SESSION['added_item'] as $key => $value) {
			if ($_SESSION['added_item'][$key]['id'] == $id) {
				unset($_SESSION['added_item'][$key]);
			}
		}
	}
	
	if (isset($_POST['submit_atk'])) {
		$nomor=$_POST['text_nomor'];$ket=trim($nomor);
		$ket=$_POST['text_ket'];$ket=trim($ket);
		$nik="0123456789";
		if (strlen($ket)>0 && strlen($nomor)>0) {
			$sql="INSERT INTO permintaan(nomor,alasan,nik)VALUES(?,?,?);";
			$stmt=$conn->prepare($sql);
			$stmt->bind_param('sss',$nomor,$ket,$nik);
			if ($stmt->execute()) {
				$is_submit="Data berhasil di-posting ke List Permintaan ATK !";
				unset($_SESSION['added_item']);
			}
		}

	}
}
?>


<div class="panel panel-default">
  <div class="panel-body">
    <ul class="nav nav-tabs">
	  <li role="presentation"><a href="?ref=pilih-item">Pilih Peralatan</a></li>
	  <li role="presentation" class="active"><a href="#">Draft Permintaan <span class="badge" id="jml_pil">0</span></a></li>
	</ul>
	<br/>

<form method="post" action="" autocomplete="off" id="form">
	<div class="input-group">        		
    	<span class="input-group-addon" id="basic-addon1">Nomor</span>
    	<input type="text" class="form-control" name="text_nomor" placeholder="Masukkan Nomor Surat Permintaan Barang" required />
    </div>
	<div class="input-group">        		
    	<span class="input-group-addon" id="basic-addon1">Keterangan</span>
    	<input type="text" class="form-control" name="text_ket" placeholder="Masukkan alasan / tujuan permintaan barang" required />
    </div>
    <center><button name="submit_atk" class="btn btn-primary"><span class="glyphicon glyphicon-envelope"></span> Posting ke List Permintaan ATK</button></center>
</form>

<center>
    <span class="hasil-submit" id="hasil_submit"><?php echo $is_submit;?></span>
</center>


<?php
if (isset($_SESSION['added_item'])) {
	echo "
	<div class=\"table-responsive\">
	<table class=\"table table-hover table-bordered\">
			<thead>
				<tr>
					<th>#</th>
					<th>Nama</th>
					<th>Jumlah</th>
					<th>Harga</th>
					<th>Sub Total</th>
					<th>Kontrol</th>
				</tr>
			</thead>
	";
	$i=1;
	foreach ($_SESSION['added_item'] as $key => $value) {
		$vid=$_SESSION['added_item'][$key]['id'];
		$vnm=$_SESSION['added_item'][$key]['nama'];
		$vjm=$_SESSION['added_item'][$key]['jml'];
		$vst=$_SESSION['added_item'][$key]['satuan'];
		?>
		<tbody>
			<tr>
				<td><?php echo $i;?></td>
				<td><?php echo $vnm;?></td>
				<td align="center"><?php echo $vjm." ".$vst;?></td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td align="center">
					<a href="?ref=ajukan-permintaan&del=<?php echo $vid;?>" class="btn btn-danger"><span class="glyphicon glyphicon-trash"> Hapus</span></a>
				</td>
			</tr>
		</tbody>
		<?php
		$i++;
	}
	echo "
	</table>
	</div>";
}
?>


  </div>
</div>



<?php
if (isset($_SESSION['added_item'])) {
	$jmls=count($_SESSION['added_item']);
	echo "<script type=\"text/javascript\">document.getElementById('jml_pil').textContent=\"$jmls\";</script>";
}else{
	//
}
?>
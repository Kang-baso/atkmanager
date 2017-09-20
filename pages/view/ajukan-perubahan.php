<?php
$is_submit="";
$id_ubah="";
$tgl_ubah="";
$ket_ubah="";

if (isset($_GET['id'])) {
	$id_ubah=$_GET['id'];
	$sql="SELECT nomor,alasan,status,tgl,nik FROM permintaan WHERE nomor=?";
	$stmt=$conn->prepare($sql);
	$stmt->bind_param('i',$id_ubah);
	if ($stmt->execute()) {
		$result = $stmt->get_result();
		if ($row = $result->fetch_row()){
			$tgl_ubah=$row[3];
			$ket_ubah=$row[1];
		}
	}
	$stmt->close();
}

if (isset($_GET['act'])) {
	if($_GET['act']=='reset'){
		unset($_SESSION['added_item_ubah']);
		header('Location: ?ref=ajukan-perubahan&id='.$id_ubah);
	}
}

if (isset($_SESSION['added_item_ubah'])) {	
	if (isset($_GET['del'])) {
		$id=$_GET['del'];
		foreach ($_SESSION['added_item_ubah'] as $key => $value) {
			if ($_SESSION['added_item_ubah'][$key]['id'] == $id) {
				unset($_SESSION['added_item_ubah'][$key]);
			}
		}
	}
	
	if (isset($_POST['submit_atk'])) {
		$nomor=$_POST['text_nomor'];$ket=trim($nomor);
		$ket=$_POST['text_ket'];$ket=trim($ket);$ket=ucfirst($ket);
		$nik=$_SESSION['nik'];

		$is_fix=0;
		$vsql="INSERT INTO permintaan_d(nomor_permintaan,id_barang,jml_minta,jml_setuju,ket_tolak)VALUES";

		if (strlen($ket)>0 && strlen($nomor)>0) {
			$sql="DELETE FROM permintaan_d WHERE nomor_permintaan=?;";
			$stmt=$conn->prepare($sql);
			$stmt->bind_param('s',$nomor);
			if ($stmt->execute()) {
				#$is_submit="Data berhasil di-posting ke List Permintaan ATK !";
				#unset($_SESSION['added_item_ubah']);
				$is_fix++;
			}
			$stmt->close();

			foreach ($_SESSION['added_item_ubah'] as $key => $value) {
				$vid=$_SESSION['added_item_ubah'][$key]['id'];
				$vnm=$_SESSION['added_item_ubah'][$key]['nama'];
				$vjm=$_SESSION['added_item_ubah'][$key]['jml'];
				$vst=$_SESSION['added_item_ubah'][$key]['satuan'];
				$vsql.="('$nomor',$vid,$vjm,0,'-'),";
			}
			if(substr($vsql, -1,1)==',')$vsql=substr($vsql, 0,-1);
			$vsql.=" ON DUPLICATE KEY UPDATE jml_minta=VALUES(jml_minta),jml_setuju=VALUES(jml_setuju),ket_tolak=VALUES(ket_tolak);";

			#echo $vsql;

			$stmt=$conn->prepare($vsql);
			if ($is_fix>0) {
				if ($stmt->execute()) {
					$is_fix++;
				}
			}

			if ($is_fix>=2) {
				$is_submit="Data berhasil di-posting ke List Permintaan ATK !";
				unset($_SESSION['added_item_ubah']);
			}else{
				$is_submit="Data Gagal di-posting ke List Permintaan ATK, silahkan melakukan entry kembali !";
				unset($_SESSION['added_item_ubah']);
			}

			$stmt->close();
		}

	}
}
?>


<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Ubah Permintaan</h3>
  </div>
  <div class="panel-body">
    <ul class="nav nav-tabs">
	  <li role="presentation"><a href="?ref=ubah-permintaan&id=<?php echo $id_ubah;?>">Pilih Peralatan</a></li>
	  <li role="presentation" class="active"><a href="#">Draft Perubahan <span class="badge" id="jml_pil">0</span></a></li>
	  <li role="presentation"><a href="?ref=histori-permintaan&id=<?php echo $id_ubah;?>">Histori Permintaan</a></li>
	</ul>
	<br/>

<form method="post" action="" autocomplete="off" id="form">
	<div class="input-group">        		
    	<span class="input-group-addon" id="basic-addon1">Nomor</span>
    	<input type="text" class="form-control" name="text_nomor" value="<?php echo $id_ubah;?>" required readonly />
    </div>
    <div class="input-group">        		
    	<span class="input-group-addon" id="basic-addon1">Tanggal Pengajuan</span>
    	<input type="text" class="form-control" name="text_tgl"  value="<?php echo $tgl_ubah;?>" required readonly />
    </div>
	<div class="input-group">        		
    	<span class="input-group-addon" id="basic-addon1">Keterangan</span>
    	<input type="text" class="form-control" name="text_ket"  value="<?php echo $ket_ubah;?>" required readonly />
    </div>
    <center><button name="submit_atk" class="btn btn-primary"><span class="glyphicon glyphicon-list-alt"></span> Posting Perubahan</button></center>
</form>

<center>
    <span class="hasil-submit" id="hasil_submit"><?php echo $is_submit;?></span>
</center>


<?php
if (isset($_SESSION['added_item_ubah'])) {
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
	#$vsql="INSERT INTO permintaan_d(nomor_permintaan,id_barang,jml_minta,jml_setuju,ket_tolak)VALUES";
	echo "<tbody>";
	foreach ($_SESSION['added_item_ubah'] as $key => $value) {
		$vid=$_SESSION['added_item_ubah'][$key]['id'];
		$vnm=$_SESSION['added_item_ubah'][$key]['nama'];
		$vjm=$_SESSION['added_item_ubah'][$key]['jml'];
		$vst=$_SESSION['added_item_ubah'][$key]['satuan'];
		#$vsql.="('123654',$vid,$vjm,0,'---'),";
		?>
		<!--tbody-->
			<tr>
				<td><?php echo $i;?></td>
				<td><?php echo $vnm;?></td>
				<td align="center"><?php echo $vjm." ".$vst;?></td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td align="center">
					<a href="?ref=ajukan-permintaan&del=<?php echo $vid;?>" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Hapus</a>
				</td>
			</tr>
		<!--/tbody-->
		<?php
		$i++;
	}
	echo "<tr><td colspan=\"6\" align=\"center\"><a href=\"?ref=ajukan-perubahan&id=$id_ubah&act=reset\" class=\"btn btn-warning\"><span class=\"glyphicon glyphicon-refresh\"></span> Reset</a></td></tr>";
	echo "</tbody>";
	#if(substr($vsql, -1,1)==',')$vsql=substr($vsql, 0,-1);
	#$vsql.=" ON DUPLICATE KEY UPDATE jml_minta=VALUE(jml_minta),jml_setuju=VALUE(jml_setuju),ket_tolak=VALUE(ket_tolak);";
	#echo "<tr><td colspan=\"6\">".$vsql."</td></tr>";

	echo "
	</table>
	</div>";
}
?>


  </div>
</div>



<?php
if (isset($_SESSION['added_item_ubah'])) {
	$jmls=count($_SESSION['added_item_ubah']);
	echo "<script type=\"text/javascript\">document.getElementById('jml_pil').textContent=\"$jmls\";</script>";
}else{
	//
}
?>
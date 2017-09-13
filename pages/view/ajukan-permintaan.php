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

		$is_fix=0;
		$vsql="INSERT INTO permintaan_d(nomor_permintaan,id_barang,jml_minta,jml_setuju,ket_tolak)VALUES";

		if (strlen($ket)>0 && strlen($nomor)>0) {
			$sql="INSERT INTO permintaan(nomor,alasan,nik)VALUES(?,?,?);";
			$stmt=$conn->prepare($sql);
			$stmt->bind_param('sss',$nomor,$ket,$nik);
			if ($stmt->execute()) {
				#$is_submit="Data berhasil di-posting ke List Permintaan ATK !";
				#unset($_SESSION['added_item']);
				$is_fix++;
			}
			$stmt->close();

			foreach ($_SESSION['added_item'] as $key => $value) {
				$vid=$_SESSION['added_item'][$key]['id'];
				$vnm=$_SESSION['added_item'][$key]['nama'];
				$vjm=$_SESSION['added_item'][$key]['jml'];
				$vst=$_SESSION['added_item'][$key]['satuan'];
				$vsql.="('$nomor',$vid,$vjm,0,'-'),";
			}
			if(substr($vsql, -1,1)==',')$vsql=substr($vsql, 0,-1);
			$vsql.=" ON DUPLICATE KEY UPDATE jml_minta=VALUES(jml_minta),jml_setuju=VALUES(jml_setuju),ket_tolak=VALUES(ket_tolak);";

			#echo $vsql;

			$stmt=$conn->prepare($vsql);
			if ($stmt->execute()) {
				$is_fix++;
			}

			if ($is_fix>=2) {
				$is_submit="Data berhasil di-posting ke List Permintaan ATK !";
				unset($_SESSION['added_item']);
			}

			$stmt->close();
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
	#$vsql="INSERT INTO permintaan_d(nomor_permintaan,id_barang,jml_minta,jml_setuju,ket_tolak)VALUES";

	foreach ($_SESSION['added_item'] as $key => $value) {
		$vid=$_SESSION['added_item'][$key]['id'];
		$vnm=$_SESSION['added_item'][$key]['nama'];
		$vjm=$_SESSION['added_item'][$key]['jml'];
		$vst=$_SESSION['added_item'][$key]['satuan'];
		#$vsql.="('123654',$vid,$vjm,0,'---'),";
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
if (isset($_SESSION['added_item'])) {
	$jmls=count($_SESSION['added_item']);
	echo "<script type=\"text/javascript\">document.getElementById('jml_pil').textContent=\"$jmls\";</script>";
}else{
	//
}
?>
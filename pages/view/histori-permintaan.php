<?php

if (isset($_GET['id'])) {
	$id_ubah=$_GET['id'];
}

?>

<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Ubah Permintaan</h3>
  </div>
  <div class="panel-body">
  <ul class="nav nav-tabs">
  	<li role="presentation" class="active"><a href="?ref=ubah-permintaan&id=<?php echo $id_ubah;?>">Pilih Peralatan</a></li>
	 <li role="presentation"><a href="?ref=ajukan-perubahan&id=<?php echo $id_ubah;?>">Draft Perubahan <span class="badge" id="jml_pil1">0</span></a></li>
	 <li role="presentation"><a href="#">Histori Permintaan</a></li>
	</ul>
<strong>Data yang aktif saat ini untuk permintaan dengan nomor : <?php echo strtoupper($id_ubah);?></strong>

	<div class="table-responsive">
	  	<table class="table table-hover table-bordered">
	  		<thead>
	  			<tr>
	  				<th>#</th>
	  				<th>Nama</th>
	  				<th>Jumlah</th>
	  			</tr>
	  		</thead>
	  		<tbody>
	  		<?php
	  			$i=1;
	  			$id_divisi=$_SESSION['id_divisi'];
	  			#echo "".$id_divisi;
	  			#$sql="SELECT DISTINCT p.nomor,p.alasan,p.status,p.tgl,d.nama FROM permintaan AS p LEFT OUTER JOIN user AS u ON u.nik=p.nik LEFT OUTER JOIN divisi AS d ON d.id=u.id_divisi ORDER BY p.tgl ASC;";
	  			$sql="SELECT DISTINCT b.id,b.nama,d.jml_minta,b.satuan FROM permintaan_d AS d LEFT OUTER JOIN barang AS b ON b.id=d.id_barang WHERE d.nomor_permintaan=?";
	  			$stmt=$conn->prepare($sql);
	  			$stmt->bind_param('s',$id_ubah);
	  			if ($stmt->execute()) {
	  				$result = $stmt->get_result();
	  				while ($row = $result->fetch_row()){
	  					?>
	  			<tr>
	  				<td align="center"><?php echo $i;?></td>
	  				<td><?php echo $row[1];?></td>
	  				<td><?php echo $row[2]." ".strtoupper($row[3]);?></td>
	  			</tr>
	  					<?php
	  					$i++;
	  				}
	  			}
	  			$stmt->close();
	  		?>
	  		</tbody>
	  	</table>
  	</div>

  </div>
</div>


<?php
if (isset($_SESSION['added_item_ubah'])) {
	$jmls=count($_SESSION['added_item_ubah']);
	echo "<script type=\"text/javascript\">document.getElementById('jml_pil1').textContent=\"$jmls\";</script>";
}else{
	//
}
?>
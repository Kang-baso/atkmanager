<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">List Permintaan Divisi</h3>
  </div>
  <div class="panel-body">
  	<p>Modul ini berfungsi untuk <strong>Membatalkan</strong> permintaan Alat Tulis Kantor dari Divisi/ Bidang anda yang masih dalam status : proses <strong>Review</strong>, oleh bagian terkait.</p>
  	<hr/>
	<div class="table-responsive">
	  	<table class="table table-hover table-bordered">
	  		<thead>
	  			<tr>
	  				<th>#</th>
	  				<th>Nomor</th>
	  				<th>Keterangan</th>
	  				<th>Tanggal</th>
	  				<th>Divisi</th>
	  				<th colspan="3">Aksi</th>
	  			</tr>
	  		</thead>
	  		<tbody>
	  		<?php
	  			$i=1;
	  			$id_divisi=$_SESSION['id_divisi'];
	  			#echo "".$id_divisi;
	  			#$sql="SELECT DISTINCT p.nomor,p.alasan,p.status,p.tgl,d.nama FROM permintaan AS p LEFT OUTER JOIN user AS u ON u.nik=p.nik LEFT OUTER JOIN divisi AS d ON d.id=u.id_divisi ORDER BY p.tgl ASC;";
	  			$sql="SELECT DISTINCT p.nomor,p.alasan,p.status,DATE_FORMAT(p.tgl, '%d %M %Y'),d.nama FROM permintaan AS p LEFT OUTER JOIN user AS u ON u.nik=p.nik LEFT OUTER JOIN divisi AS d ON d.id=u.id_divisi WHERE p.status=0 AND d.id=? ORDER BY p.tgl ASC;";
	  			$stmt=$conn->prepare($sql);
	  			$stmt->bind_param('i',$id_divisi);
	  			if ($stmt->execute()) {
	  				$result = $stmt->get_result();
	  				while ($row = $result->fetch_row()){
	  					?>
	  			<tr>
	  				<td align="center"><?php echo $i;?></td>
	  				<td><a href="?ref=detail-permintaan&id=<?php echo $row[0];?>" title="Lihat detail..."><strong><?php echo $row[0];?></strong></a></td>
	  				<td><?php echo $row[1];?></td>
	  				<td align="center"><?php echo $row[3];?></td>
	  				<td align="center"><?php echo $row[4];?></td>
	  				<td align="center" title="hapus"><a href="<?php echo "?ref=hapus-permintaan&id=$row[0]&ket=$row[1]&tgl=$row[3]&div=$row[4]";?>" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash"></span></a></td>
	  				<td align="center" title="ubah"><a href="?ref=ubah-permintaan&id=<?php echo $row[0];?>" class="btn btn-warning btn-sm"><span class="glyphicon glyphicon-pencil"></span></a></td>
	  				<td align="center" title="cetak">
	  					<form method="post" target="_blank" action="<?php echo base_url()."pages/reports/cetak-permintaan.php";?>">
	  						<input type="hidden" name="nomor" value="<?php echo $row[0];?>" />
	  						<input type="hidden" name="ket" value="<?php echo $row[1];?>" />
	  						<input type="hidden" name="tgl" value="<?php echo $row[3];?>" />
	  						<input type="hidden" name="div" value="<?php echo $row[4];?>" />
	  						<button type="submit" class="btn btn-info btn-sm"><span class="glyphicon glyphicon-print"></span></button>
	  					</form>

	  					<!--a href="pages/reports/cetak-permintaan.php?&nomor=<?php #echo $row[0];?>&ket=<?php #echo $row[1];?>&tgl=<?php #echo $row[3];?>&div=<?php #echo $row[4];?>" target="_blank" class="btn btn-info btn-sm"><span class="glyphicon glyphicon-print"></span></a-->

	  				</td>
	  			</tr>
	  					<?php
	  					$i++;
	  				}
	  			}
	  		?>
	  		</tbody>
	  	</table>
  	</div>
  </div>
</div>
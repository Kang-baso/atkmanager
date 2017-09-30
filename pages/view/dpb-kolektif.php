<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Daftar Permintaan Barang Kolektif</h3>
  </div>
  <div class="panel-body">
  	<p>Modul ini berfungsi untuk menampilkan daftar / list permintaan Alat Tulis Kantor yang baru saja di-posting dan masih dalam status : proses <strong>Review</strong>, oleh bagian terkait.</p>
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
	  				<th>Pilih <input type="checkbox" name="select-all" id="select-all" /></th>
	  			</tr>
	  		</thead>
	  		<tbody>
	  		<?php
	  			$i=1;
	  			#$sql="SELECT DISTINCT p.nomor,p.alasan,p.status,p.tgl,d.nama FROM permintaan AS p LEFT OUTER JOIN user AS u ON u.nik=p.nik LEFT OUTER JOIN divisi AS d ON d.id=u.id_divisi ORDER BY p.tgl ASC;";
	  			$sql="SELECT DISTINCT p.nomor,p.alasan,p.status,DATE_FORMAT(p.tgl, '%d %M %Y'),d.nama FROM permintaan AS p LEFT OUTER JOIN user AS u ON u.nik=p.nik LEFT OUTER JOIN divisi AS d ON d.id=u.id_divisi WHERE p.status=1 ORDER BY p.tgl ASC;";
	  			$stmt=$conn->prepare($sql);
	  			if ($stmt->execute()) {
	  				$result = $stmt->get_result();
	  				while ($row = $result->fetch_row()){
	  					?>
	  			<tr>
	  				<td align="center"><?php echo $i;?></td>
	  				<td><a href="?ref=detail-permintaan&id=<?php echo $row[0];?>&back=dpb-kolektif" title="Lihat detail..."><strong><?php echo $row[0];?></strong></a></td>
	  				<td><?php echo $row[1];?></td>
	  				<td align="center"><?php echo $row[3];?></td>
	  				<td align="center"><?php echo $row[4];?></td>
	  				<td align="center">
	  					<input type="checkbox" name="chk<?php echo $row[0];?>" class="form-controller" />
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

<script type="text/javascript">
$(document).ready(function(){
	$('#select-all').click(function(event) {   
	    if(this.checked) {
	        // Iterate each checkbox
	        $(':checkbox').each(function() {
	            this.checked = true;                        
	        });
	    }else{
	        $(':checkbox').each(function() {
	            this.checked = false;                        
	        });
	    }
	});
});
</script>
<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Master Divisi / Bidang</h3>
  </div>
  <div class="panel-body">
  	<a href="?ref=tambah-divisi" class="btn btn-sm btn-primary"><span class="glyphicon glyphicon-plus"></span> Tambah Data Divisi</a>
  	<div class="table-responsive">
  	<table class="table table-hover table-bordered">
  		<thead>
  			<tr>
  				<th>#</th>
  				<th>Nama Divisi</th>
  				<th>Keterangan</th>				
  				<th colspan="2">Kontrol</th>
  			</tr>
  		</thead>
  		<tbody>
  			<?php
  			$i=1;
  			$sql="SELECT id, nama, ket, nik_manager FROM divisi ORDER BY id ASC;";

  			$stmt=$conn->prepare($sql);
			if ($stmt->execute()) {
				$result = $stmt->get_result();
				while ($row = $result->fetch_row()){
					echo "
					<tr>
		  				<td align=\"center\">$i</td>
		  				<td>$row[1]</td>
		  				<td>$row[2]</td>
		  				<td align=\"center\"><a href=\"?ref=hapus-divisi&id=$row[0]&nama=$row[1]&ket=$row[2]\" class=\"btn btn-sm btn-danger\"><span class=\"glyphicon glyphicon-trash\"></span></a></td>
		  				<td align=\"center\"><a href=\"?ref=ubah-divisi&id=$row[0]&nama=$row[1]&ket=$row[2]&mgr=$row[3]\" class=\"btn btn-sm btn-warning\"><span class=\"glyphicon glyphicon-pencil\"></span></a></td>
		  			</tr>
					";
					$i++;
				}
			}

  			?>
  		</tbody>
  	</table>
  	</div>
  </div>
</div>
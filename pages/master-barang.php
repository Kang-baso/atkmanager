<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Master Barang</h3>
  </div>
  <div class="panel-body">

  	<a href="?ref=tambah-barang" class="btn btn-sm btn-primary"><span class="glyphicon glyphicon-plus"></span> Tambah Barang</a>
  	<table class="table">
  		<thead>
  			<tr>
  				<th>#</th>
  				<th>Nama</th>
  				<th>Satuan</th>
  				<th>Stok</th>
  				<th>Keterangan</th>
  				<th colspan="2">Kontrol</th>
  			</tr>
  		</thead>
  		<tbody>
  			<?php
  			$i=1;
  			$sql="SELECT id, nama, satuan, stok, ket FROM barang;";

  			$stmt=$conn->prepare($sql);
			if ($stmt->execute()) {
				$result = $stmt->get_result();
				while ($row = $result->fetch_row()){
					echo "
					<tr>
		  				<td>$i</td>
		  				<td>$row[1]</td>
		  				<td>$row[2]</td>
		  				<td>$row[3]</td>
		  				<td>$row[4]</td>
		  				<td><a href=\"#\" class=\"btn btn-sm btn-danger\"><span class=\"glyphicon glyphicon-trash\"></span></a></td>
		  				<td><a href=\"?ref=tambah-barang&edit=$row[0]\" class=\"btn btn-sm btn-warning\"><span class=\"glyphicon glyphicon-pencil\"></span></a></td>
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
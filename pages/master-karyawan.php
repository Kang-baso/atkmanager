<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Master Karyawan / Pengguna Aplikasi</h3>
  </div>
  <div class="panel-body">
  	<a href="?ref=tambah-user" class="btn btn-sm btn-primary"><span class="glyphicon glyphicon-plus"></span> Tambah Pengguna</a>
  	<div class="table-responsive">
  	<table class="table table-hover table-bordered">
  		<thead>
  			<tr>
  				<th>#</th>
  				<th>NIK</th>
  				<th>Nama</th>
  				<th>Telepon</th>
  				<th>Email</th>
  				<th>Posisi</th>
  				<th>Divisi</th>
  				<th>Atasan</th>  				
  				<th colspan="2">Kontrol</th>
  			</tr>
  		</thead>
  		<tbody>
        <?php
        $i=1;
        $sql="SELECT nik, nama, password, telp, email, posisi, id_divisi, nik_atasan FROM user;";

        $stmt=$conn->prepare($sql);
      if ($stmt->execute()) {
        $result = $stmt->get_result();
        while ($row = $result->fetch_row()){
          echo "
          <tr>
              <td>$i</td>
              <td>$row[0]</td>
              <td>$row[1]</td>
              <td>$row[3]</td>
              <td>$row[4]</td>
              <td>$row[5]</td>
              <td>$row[6]</td>
              <td>$row[7]</td>
              <td><a href=\"?ref=hapus-user&id=$row[0]&nama=$row[1]&ket=$row[3]\" class=\"btn btn-sm btn-danger\"><span class=\"glyphicon glyphicon-trash\"></span></a></td>
              <td><a href=\"?ref=ubah-user&id=$row[0]&nama=$row[1]&ket=$row[3]\" class=\"btn btn-sm btn-warning\"><span class=\"glyphicon glyphicon-pencil\"></span></a></td>
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
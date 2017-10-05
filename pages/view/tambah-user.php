<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Tambah Pengguna</h3>
  </div>
  <div class="panel-body">
  	<form method="post" action="" id="form">
    <div class="input-group">
      <span class="input-group-addon">NIK</span>
      <input type="text" name="nik" class="form-control" placeholder="Input Nomor Induk Karyawan" />
    </div>
  	<div class="input-group">
		  <span class="input-group-addon">Nama</span>
		  <input type="text" name="nama" class="form-control" placeholder="Input nama Karyawan" />
		</div>	
		<div class="input-group">
		  <span class="input-group-addon">Password</span>
		  <input type="password" name="pass" class="form-control" placeholder="Masukkan password unik" />
		</div>
    <div class="input-group">
      <span class="input-group-addon">Telepon</span>
      <input type="text" name="telp" class="form-control" placeholder="Input No. Ponsel" />
    </div>
    <div class="input-group">
      <span class="input-group-addon">Email</span>
      <input type="text" name="email" class="form-control" placeholder="Input alamat e-mail" />
    </div>
    <div class="input-group">
      <span class="input-group-addon">Posisi</span>
      <input type="text" name="posisi" class="form-control" placeholder="Input posisi/jabatan" />
    </div>
    <div class="input-group">
      <span class="input-group-addon">Divisi / Bidang</span>
      <select name="divisi" class="form-control">
        <option value="">-- Pilih --</option>
        <?php
        $sql="SELECT id,nama,ket FROM divisi ORDER BY id ASC;";
        $stmt=$conn->prepare($sql);
        if ($stmt->execute()) {
          $result = $stmt->get_result();
          while ($row = $result->fetch_row()){
            echo "
              <option value=\"$row[0]\">$row[0] - $row[1]</option>
            ";
          }
        }
        $stmt->close();
        ?>
      </select>
    </div>
    <div class="input-group">
      <span class="input-group-addon">Atasan</span>
      <select name="atasan" class="form-control">
        <!--option value="">-- Pilih Atasan Langsung --</option-->        
        <?php
        $sql="SELECT DISTINCT nik,nama FROM user ORDER BY nik ASC;";
        $stmt=$conn->prepare($sql);
        if ($stmt->execute()) {
          $result = $stmt->get_result();
          while ($row = $result->fetch_row()){
            echo "
              <option value=\"$row[0]\">$row[0] - $row[1]</option>
            ";
          }
        }
        $stmt->close();
        ?>
        <option value="">Tanpa Atasan</option>
      </select>
    </div>
<center>
    <p class="hasil-submit" style="font-weight: bold;color: #00f;padding: 10px;"></p>
</center>
		<center>
		<div class="btn-group" role="group" aria-label="...">
		  <a href="?ref=karyawan" class="btn btn-warning btn-lg">Kembali</a>
		  <button type="button" id="submit" class="btn btn-primary btn-lg">Simpan</button>
		</div>
		</center>
  	</form>
  </div>
</div>

<script type="text/javascript">
$(document).ready(function(){
  $('#submit').click(function(){
      $.ajax({
        type: 'post',
        url: 'pages/model/tambah-user-simpan.php',
        data: $('#form').serialize(),
        success: function (response) {
            /*$('#myModal').modal('show');*/
            $(".hasil-submit").html(response);
        }
      });
    });  
});
</script>
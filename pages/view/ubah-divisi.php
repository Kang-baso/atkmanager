<?php
if (isset($_GET['id']) 
	&& isset($_GET['nama']) 
  && isset($_GET['ket'])
) {

	$id=trim($_GET['id']);
	$nama=trim($_GET['nama']);
  $ket=trim($_GET['ket']);
	$mgr=trim($_GET['mgr']);


?>
<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Ubah Divisi / Bidang</h3>
  </div>
  <div class="panel-body">
  	<form method="post" action="" id="form-ubah-divisi">
  		<input type="hidden" name="id" value="<?php echo $id;?>" />
  		<div class="input-group">
		  <span class="input-group-addon">Nama Divisi</span>
		  <input type="text" name="nama" id="kode_pum2" class="form-control" placeholder="Input nama barang" value="<?php echo $nama;?>" />
		</div>
		<div class="input-group">
		  <span class="input-group-addon">Keterangan</span>
		  <input type="text" name="ket" class="form-control" placeholder="Input keterangan tambahan" value="<?php echo $ket;?>" />
		</div>
    <div class="input-group">
      <span class="input-group-addon">Manager</span>
      <select name="manager" id="manager" class="form-control">
        <option value="">Kosongkan</option>
        <?php
        $sql="SELECT nik,nama FROM user ORDER by nama ASC";
        $stmt=$conn->prepare($sql);
        if ($stmt->execute()) {
          $result = $stmt->get_result();
          while ($row = $result->fetch_row()){
            echo "
            <option value=\"$row[0]\">$row[0] - $row[1]</option>
            ";
          }
        }
        ?>
      </select>
    </div>

<center>
    <p class="hasil-submit" style=""></p>
</center>
		<center>
		<div class="btn-group" role="group" aria-label="...">
		  <a href="?ref=divisi" class="btn btn-warning btn-lg">Kembali</a>
		  <button type="button" id="submit" class="btn btn-primary btn-lg">Ubah</button>
		</div>
		</center>
  	</form>
  </div>
</div>

<script type="text/javascript">
document.getElementById('manager').value=<?php echo $mgr;?>;
</script>

<?php
}
?>

<script type="text/javascript">
$(document).ready(function(){
  $('#submit').click(function(){
      $.ajax({
        type: 'post',
        url: 'pages/model/ubah-divisi-simpan.php',
        data: $('#form-ubah-divisi').serialize(),
        success: function (response) {
            /*$('#myModal').modal('show');*/
            $(".hasil-submit").html(response);
        }
      });
    });  
});
</script>
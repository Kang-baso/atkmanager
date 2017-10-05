<?php
if (isset($_GET['id']) 
	&& isset($_GET['nama']) 
	&& isset($_GET['ket'])) {

	$id=trim($_GET['id']);
	$nama=trim($_GET['nama']);
	$ket=trim($_GET['ket']);


?>
<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Hapus Divisi / Bidang</h3>
  </div>
  <div class="panel-body">
  <h3>Yakin untuk hapus divisi/bidang ini ?</h3>
  	<form method="post" action="" id="form-hapus-divisi">
  		<input type="hidden" name="id" value="<?php echo $id;?>" />
  		<div class="input-group">
		  <span class="input-group-addon">Nama divisi</span>
		  <input type="text" readonly name="nama" id="kode_pum2" class="form-control" placeholder="Input nama divisi" value="<?php echo $nama;?>" />
		</div>	
		<div class="input-group">
		  <span class="input-group-addon">Keterangan</span>
		  <input type="text" readonly name="ket" class="form-control" placeholder="Input keterangan tambahan" value="<?php echo $ket;?>" />
		</div>

<center>
    <p class="hasil-submit" style=""></p>
</center>
		<center>
		<div class="btn-group" role="group" aria-label="...">
		  <a href="?ref=divisi" class="btn btn-warning btn-lg">Kembali</a>
		  <button type="button" id="submit" class="btn btn-primary btn-lg">Hapus</button>
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
        url: 'pages/model/hapus-divisi-simpan.php',
        data: $('#form-hapus-divisi').serialize(),
        success: function (response) {
            /*$('#myModal').modal('show');*/
            $(".hasil-submit").html(response);
        }
      });
    });  
});
</script>

<?php
}
?>
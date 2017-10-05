<?php
if (isset($_GET['id']) 
	&& isset($_GET['tgl']) 
	&& isset($_GET['ket'])) {

	$id=trim($_GET['id']);
	$tgl=trim($_GET['tgl']);
	$ket=trim($_GET['ket']);


?>
<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Hapus Permintaan</h3>
  </div>
  <div class="panel-body">
  <h3>Yakin untuk hapus Permintaan ini ?</h3>
  	<form method="post" action="" id="form-hapus-permintaan">
  		<input type="hidden" name="id" value="<?php echo $id;?>" />  	
    <div class="input-group">
      <span class="input-group-addon">Nomor</span>
      <input type="text" readonly name="id" class="form-control" value="<?php echo strtoupper($id);?>" />
    </div>
		<div class="input-group">
		  <span class="input-group-addon">Keterangan</span>
		  <input type="text" readonly name="ket" class="form-control" value="<?php echo $ket;?>" />
		</div>
    <div class="input-group">
      <span class="input-group-addon">Tanggal Posting</span>
      <input type="text" readonly name="nama" id="kode_pum2" class="form-control" value="<?php echo $tgl;?>" />
    </div>  

<center>
    <p class="hasil-submit" style=""></p>
</center>
		<center>
		<div class="btn-group" role="group" aria-label="...">
		  <a href="?ref=edit-permintaan" class="btn btn-warning btn-lg">Kembali</a>
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
        url: 'pages/model/hapus-permintaan-simpan.php',
        data: $('#form-hapus-permintaan').serialize(),
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
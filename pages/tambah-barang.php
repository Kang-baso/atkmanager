<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Tambah Barang</h3>
  </div>
  <div class="panel-body">
  	<form method="post" action="" id="form">
  		<div class="input-group">
		  <span class="input-group-addon">Nama Barang</span>
		  <input type="text" name="nama" id="kode_pum2" class="form-control" placeholder="Input nama barang" />
		</div>
		<div class="input-group">
		  <span class="input-group-addon">Stok</span>
		  <input type="text" readonly name="stok" class="form-control" placeholder="Input jumlah stok" value="0" />
		</div>
		<div class="input-group">
		  <span class="input-group-addon">Satuan</span>
		  <input type="text" name="satuan" class="form-control" placeholder="Input satuan" />
		</div>		
		<div class="input-group">
		  <span class="input-group-addon">Keterangan</span>
		  <input type="text" name="ket" class="form-control" placeholder="Input keterangan tambahan" />
		</div>

<center>
    <p class="hasil-submit" style="font-weight: bold;color: #00f;padding: 10px;"></p>
</center>
		<center>
		<div class="btn-group" role="group" aria-label="...">
		  <a href="?ref=barang" class="btn btn-warning btn-lg">Kembali</a>
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
        url: 'pages/tambah-barang-simpan.php',
        data: $('#form').serialize(),
        success: function (response) {
            /*$('#myModal').modal('show');*/
            $(".hasil-submit").html(response);
        }
      });
    });  
});
</script>
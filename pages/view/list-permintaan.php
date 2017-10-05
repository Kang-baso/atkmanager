<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">List Permintaan</h3>
  </div>
  <div class="panel-body">
  	<p>Modul ini berfungsi untuk menampilkan daftar / list permintaan Alat Tulis Kantor yang baru saja di-posting dan masih dalam status : proses <strong>Review</strong>, oleh bagian terkait.</p>

<form id="form">
		Tanggal: <input type="text" name="tgl1" class="datepicker" required /> s/d <input type="text" name="tgl2" class="datepicker" required/>
		<button class="btn btn-sm btn-info" type="button" id="submit"><span class="glyphicon glyphicon-eye-open"></span> Tampilkan</button>
	</form>
  	<hr/>
  	<div id="hasil"></div>
  </div>
</div>


<script type="text/javascript">
$(document).ready(function(){
  $('#submit').click(function(){
      $.ajax({
        type: 'post',
        url: 'pages/model/list-permintaan-show.php',
        data: $('#form').serialize(),
        success: function (response) {
            /*$('#myModal').modal('show');*/
            $("#hasil").html(response);
        }
      });
    });  
});
</script>
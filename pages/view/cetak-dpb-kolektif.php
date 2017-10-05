<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Cetak DPB Kolektif</h3>
  </div>
  <div class="panel-body">
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
        url: 'pages/model/cetak-dpb-kolektif-show.php',
        data: $('#form').serialize(),
        success: function (response) {
            /*$('#myModal').modal('show');*/
            $("#hasil").html(response);
        }
      });
    });  
});
</script>
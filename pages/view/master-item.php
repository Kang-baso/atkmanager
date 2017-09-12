<?php
$sql="";
$jml_pilih=0;

if (isset($_POST['submit'])) {
	$id=$_POST['hidden_id'];
	$jml=$_POST['text_jml'];$jml=trim($jml);
	if (strlen($jml)>0 && strval($jml)>0) {
		$jml=strval($jml);
		#echo $jml;
	}
}

if (isset($_POST['button_cari'])) {
	$text_cari=$_POST['text_cari'];
	$text_cari=trim($text_cari);
	if (strlen($text_cari)>0) {
		$sql="SELECT id, nama, satuan, stok, ket, jenis, max, min, harga, img FROM barang WHERE nama like '%".$text_cari."%' ORDER BY nama ASC;";
	}
}

?>
<div class="panel panel-default">
  <div class="panel-body">
    <ul class="nav nav-tabs">
	  <li role="presentation" class="active"><a href="#">Pilih Peralatan</a></li>
	  <li role="presentation"><a href="?ref=ajukan-permintaan">Ajukan Permintaan <span class="badge" id="jml_pil">0</span></a></li>
	</ul>
	<!--br/-->

<center>
    <span class="hasil-submit"></span>
</center>

<form method="post" action="" autocomplete="off">
<div class="row">
	<div class="col-lg-12">
    <div class="input-group">
      <input type="text" name="text_cari" class="form-control" placeholder="Pencarian berdasarkan nama barang / item...">
      <span class="input-group-btn">
        <button class="btn btn-warning" type="submit" name="button_cari"><span class="glyphicon glyphicon-search"></span>&nbsp;</button>
      </span>
    </div><!-- /input-group -->
  </div><!-- /.col-lg-6 -->
</div>
</form>

	<div class="tab-content">
	<div class="row">
	<?php

	$i=1;
	if($sql=='')$sql="SELECT id, nama, satuan, stok, ket, jenis, max, min, harga, img FROM barang ORDER BY nama ASC;";

	$stmt=$conn->prepare($sql);
	if ($stmt->execute()) {
		$result = $stmt->get_result();
        while ($row = $result->fetch_row()){
	?>

  <div class="col-xs-6 col-md-3">
    <div class="thumbnail">
      <img src="assets/img/item/<?php echo $row[9];?>" alt="<?php echo $row[1];?>" class="img-item" />
      <div class="caption">
        <span class="label-judul"><?php echo ucwords($row[1]);?></span>
        <form method="post" autocomplete="off" action="" id="form<?php echo $row[0];?>">
        	<input type="hidden" name="hidden_id" value="<?php echo $row[0];?>" />
        	<div class="input-group">        		
        		<span class="input-group-addon" id="basic-addon1">Jumlah</span>
        		<input type="text" class="form-control" name="text_jml" value="1" size="5px" />
        	</div>
        	<button type="button" name="submit<?php echo $row[0];?>" id="<?php echo $row[0];?>" class="btn btn-warning tambahkan"><span class="glyphicon glyphicon-shopping-cart"></span> Tambahkan</button>
        </form>
      </div>
    </div>
  </div>

	<?php
		}
	}
	?>

	</div>
	</div>
  </div>
</div>

<script type="text/javascript">
$(document).ready(function(){
  $('.tambahkan').click(function(){
  	var id=$(this).attr('id');
  	/*alert(form_id);*/
  	$.ajax({
        type: 'post',
        url: 'pages/model/tambah-item.php',
        data: $('#form'+id).serialize(),
        success: function (response) {
            /*$('#myModal').modal('show');*/
            $(".hasil-submit").html(response);
        }
      });
  });
});
</script>

<?php
if (isset($_SESSION['added_item'])) {
	$jmls=count($_SESSION['added_item']);
	echo "<script type=\"text/javascript\">document.getElementById('jml_pil').textContent=\"$jmls\";</script>";
}else{
	//
}
?>
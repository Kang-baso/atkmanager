<?php
$sql="";
$jml_pilih=0;

if (isset($_GET['id'])) {
	$id_ubah=$_GET['id'];
}

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
  <div class="panel-heading">
    <h3 class="panel-title">Ubah Permintaan</h3>
  </div>
  <div class="panel-body"><ul class="nav nav-tabs">
	  <li role="presentation" class="active"><a href="#">Pilih Peralatan</a></li>
	  <li role="presentation"><a href="?ref=ajukan-perubahan&id=<?php echo $id_ubah;?>">Draft Perubahan <span class="badge" id="jml_pil1">0</span></a></li>
	  <li role="presentation"><a href="?ref=histori-permintaan&id=<?php echo $id_ubah;?>">Histori Permintaan</a></li>
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

  <div class="produk-grid">
    <div class="gambar-produk-grid">
      <img src="assets/img/item/<?php echo $row[9];?>" alt="<?php echo $row[1];?>" class="img-item" />
    </div>
    <div class="judul-produk-grid">
      <span class="label-judul-produk"><?php echo ucwords($row[1]);?></span>
    </div>
    <div class="kontrol-produk-grid">
        <form method="post" autocomplete="off" action="" id="form<?php echo $row[0];?>">
          <input type="hidden" name="hidden_id" value="<?php echo $row[0];?>" />
          <input type="hidden" name="hidden_nama" value="<?php echo ucwords($row[1]);?>" />
          <input type="hidden" name="hidden_satuan" value="<?php echo strtoupper($row[2]);?>" />
          <div class="input-groupx">           
            <span class="input-group-addonx" id="basic-addon1x">Jumlah (<?php echo strtoupper($row[2]);?>)</span>
            <input type="text" class="form-controlx" name="text_jml" value="1" size="3px" style="width: 50px;text-align: center;" />
          </div>
          <button type="button" name="submit<?php echo $row[0];?>" id="<?php echo $row[0];?>" class="btn btn-warning tambahkan"><span class="glyphicon glyphicon-shopping-cart"></span> Tambahkan</button>
        </form>
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
        url: 'pages/model/tambah-item-ubah.php',
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
if (isset($_SESSION['added_item_ubah'])) {
	$jmls=count($_SESSION['added_item_ubah']);
	echo "<script type=\"text/javascript\">document.getElementById('jml_pil1').textContent=\"$jmls\";</script>";
}else{
	//
}
?>
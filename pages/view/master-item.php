<div class="panel panel-default">
  <div class="panel-body">
    <ul class="nav nav-tabs">
	  <li role="presentation" class="active"><a href="#">Pilih Item (ATK)</a></li>
	  <li role="presentation"><a href="?ref=ajukan-permintaan">Ajukan Permintaan</a></li>
	</ul>
	<br/>
	<div class="row">
	<?php

	$i=1;
	$sql="SELECT id, nama, satuan, stok, ket, jenis, max, min, harga, img FROM barang ORDER BY nama ASC;";

	$stmt=$conn->prepare($sql);
	if ($stmt->execute()) {
		$result = $stmt->get_result();
        while ($row = $result->fetch_row()){
	?>

  <div class="col-xs-6 col-md-3">
    <div class="thumbnail">
      <img src="assets/img/item/<?php echo $row[9];?>" alt="<?php echo $row[1];?>" width="150px" />
      <div class="caption">
        <h4><?php echo ucwords($row[1]);?></h4>
        <p>...</p>
        <p><a href="#" class="btn btn-primary" role="button">Button</a> <a href="#" class="btn btn-default" role="button">Button</a></p>
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
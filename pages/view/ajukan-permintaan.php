<?php
if (isset($_SESSION['added_item'])) {	
	if (isset($_GET['del'])) {
		$id=$_GET['del'];
		foreach ($_SESSION['added_item'] as $key => $value) {
			if ($_SESSION['added_item'][$key]['id'] == $id) {
				unset($_SESSION['added_item'][$key]);
			}
		}
	}
}
?>


<div class="panel panel-default">
  <div class="panel-body">
    <ul class="nav nav-tabs">
	  <li role="presentation"><a href="?ref=pilih-item">Pilih Peralatan</a></li>
	  <li role="presentation" class="active"><a href="#">Ajukan Permintaan <span class="badge" id="jml_pil">0</span></a></li>
	</ul>
	<br/>
  </div>
</div>

<?php
if (isset($_SESSION['added_item'])) {
	echo "
	<div class=\"table-responsive\">
	<table class=\"table table-hover table-bordered\">
			<thead>
				<tr>
					<th>#</th>
					<th>Nama</th>
					<th>Jumlah</th>
					<th>Harga</th>
					<th>Sub Total</th>
					<th>Kontrol</th>
				</tr>
			</thead>
	";
	$i=1;
	foreach ($_SESSION['added_item'] as $key => $value) {
		echo"
		<tbody>
			<tr>
				<td>$i</td>
				<td>".$_SESSION['added_item'][$key]['nama']."</td>
				<td>".$_SESSION['added_item'][$key]['jml']."</td>
				<td></td>
				<td></td>
				<td><a href=\"?ref=ajukan-permintaan&del=".$_SESSION['added_item'][$key]['id']."\" class=\"btn btn-danger\"><span class=\"glyphicon glyphicon-trash\"> Hapus</span></a></td>
			</tr>
		</tbody>
		";
		$i++;
	}
	echo "
	</table>
	</div>";
}
?>





<?php
if (isset($_SESSION['added_item'])) {
	$jmls=count($_SESSION['added_item']);
	echo "<script type=\"text/javascript\">document.getElementById('jml_pil').textContent=\"$jmls\";</script>";
}else{
	//
}
?>
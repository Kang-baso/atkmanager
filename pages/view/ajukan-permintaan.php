
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
	echo "<table class=\"table\">
			<thead>
				<th>
					<td>#</td>
					<td></td>
				</th>
			</thead>
	";
	foreach ($_SESSION['added_item'] as $key => $value) {
		echo"

		";
	}
	echo "</table>";
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
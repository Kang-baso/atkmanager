<?php
session_start();
require_once('../inc.php');
$conn=new mysqli(HOST,USER,PASS,DB);
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

if ( isset($_POST['hidden_id']) &&  isset($_POST['text_jml']) && isset($_POST['hidden_nama'])) {
	$id=trim($_POST['hidden_id']);
	$nama=trim($_POST['hidden_nama']);
	$jml=trim($_POST['text_jml']);

	if (strlen($jml)>0 && strval($jml)>0) {
		#echo $id."<br/>".$jml."<br/>".$_SESSION['username'];

		if (isset($_SESSION['added_item'])) {
			$ada=0;
			foreach ($_SESSION['added_item'] as $key => $value) {
				if ($_SESSION['added_item'][$key]['id'] == $id) {
					$ada++;
					$_SESSION['added_item'][$key]['jml']+=$jml;
				}
			}
			if ($ada<1) {
				$item_array = array('id' => $id,'nama' => $nama,'jml' => $jml );
				$_SESSION['added_item'][]=$item_array;
			}
		}else{
			$item_array = array('id' => $id,'nama' => $nama,'jml' => $jml );
			$_SESSION['added_item'][]=$item_array;
		}
		$jmls=count($_SESSION['added_item']);
		echo "<script type=\"text/javascript\">document.getElementById('jml_pil').textContent=\"$jmls\";</script>";
	}	
}
$conn->close();
?>
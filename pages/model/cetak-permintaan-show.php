<?php
require_once('../inc.php');
$conn=new mysqli(HOST,USER,PASS,DB);
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

if ( isset($_POST['tgl1']) && isset($_POST['tgl2']) ) {
	$tgl1=$_POST['tgl1'];
	$tgl2=$_POST['tgl2'];
}
?>
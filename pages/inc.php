<?php
#inc.php
define('HOST', 'localhost');
define('USER', 'rail');
define('PASS', '');
define('DB', 'db_atk');

error_reporting(E_ALL);
ini_set('display_errors', 1);

date_default_timezone_set('Asia/Jayapura');
$tanggal=date('d-M-Y [H:i:s]',time());


/*$con=mysqli_connect(HOST,USER,PASS,DB);


if (mysqli_connect_errno()){
  echo "Failed to connect to MySQL: ".mysqli_connect_error();
}*/

function base_url(){
	return "http://localhost/projects/atk/";
}

?>
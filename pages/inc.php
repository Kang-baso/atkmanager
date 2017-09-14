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

function get_status($key){
	$result="";
	switch ($key) {
		case 0:
			$result="Review";
			break;
		case 1:
			$result="Ditolak Semua Item";
			break;
		case 2:
			$result="Ditolak Sebagian Item";
			break;
		default:
			$result="Kabulkan Semua Item";
			break;
	}
	return $result;
}

function break_point(){
	echo "<div id=\"break-point\">&copy; 2017. All right reserved. Powered by <a href=\"http://arecastudio.github.io/\" target=\"_blank\">Developer</a>.</div>";
}

?>
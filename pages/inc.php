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

function getHari($numHr){
	switch ($numHr){
		case 0:$hri="Minggu";break;
		case 1:$hri="Senin";break;
		case 2:$hri="Selasa";break;
		case 3:$hri="Rabu";break;
		case 4:$hri="Kamis";break;
		case 5:$hri="Jumat";break;
		case 6:$hri="Sabtu";
	}
	return $hri;
	
	//penggunaan: $tgl=getHari(date('w'))."-".date('d_M_Y-h_i_s');
}

function getTanggal(){
	$tgl=date('d')." ".getNamaBulan(date('m'))." ".date('Y');
	return $tgl;
}

function getBulan($numBul){
	switch ($numBul){
		case 0:$bln="Des";break;
		case 1:$bln="Jan";break;
		case 2:$bln="Feb";break;
		case 3:$bln="Mar";break;
		case 4:$bln="Apr";break;
		case 5:$bln="Mei";break;
		case 6:$bln="Jun";break;
		case 7:$bln="Jul";break;
		case 8:$bln="Agust";break;
		case 9:$bln="Sept";break;
		case 10:$bln="Okt";break;
		case 11:$bln="Nov";break;
		case 12:$bln="Des";
	}
	return $bln;
}

function getNamaBulan($numBul){
	switch ($numBul){
		case 0:$bln="Desember";break;
		case 1:$bln="Januari";break;
		case 2:$bln="Februari";break;
		case 3:$bln="Maret";break;
		case 4:$bln="April";break;
		case 5:$bln="Mei";break;
		case 6:$bln="Juni";break;
		case 7:$bln="Juli";break;
		case 8:$bln="Agustus";break;
		case 9:$bln="September";break;
		case 10:$bln="Oktober";break;
		case 11:$bln="November";break;
		case 12:$bln="Desember";
	}
	return $bln;
}

function formatMoney($number, $fractional=false) {
	if ($fractional) {
		$number = sprintf('%.2f', $number);
	}
	while (true) {
		$replaced = preg_replace('/(-?\d+)(\d\d\d)/', '$1,$2', $number);
		if ($replaced != $number) {
			$number = $replaced;
		} else {
			break;
		}
	}
	return $number;
}

function konversi($x){  
	$x = abs($x);
	$angka = array ("","Satu", "Dua", "Tiga", "Empat", "Lima", "Enam", "Tujuh", "Delapan", "Sembilan", "Sepuluh", "Sebelas");
	$temp = "";  
	if($x < 12){
		$temp = " ".$angka[$x];
	}else if($x<20){
		$temp = konversi($x - 10)." Belas";
	}else if ($x<100){
		$temp = konversi($x/10)." Puluh". konversi($x%10);
	}else if($x<200){
		$temp = " Seratus".konversi($x-100);
	}else if($x<1000){
		$temp = konversi($x/100)." Ratus".konversi($x%100);   
	}else if($x<2000){
		$temp = " Seribu".konversi($x-1000);
	}else if($x<1000000){
		$temp = konversi($x/1000)." Ribu".konversi($x%1000);   
	}else if($x<1000000000){
		$temp = konversi($x/1000000)." Juta".konversi($x%1000000);
	}else if($x<1000000000000){
		$temp = konversi($x/1000000000)." Milyar".konversi($x%1000000000);
	}  
	return $temp;
}


?>
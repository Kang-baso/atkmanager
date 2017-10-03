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
			$result="Review Divisi";
			break;
		case 1:
			$result="Teruskan ke SDM";
			break;
		case 2:
			$result="Teruskan ke Vendor";			
			break;
		default:
			$result="Sudah diterima";
			break;
	}
	return $result;
}

function break_point(){
	echo "<div id=\"break-point\">PT. PLN (Persero) Wilayah Papua &copy; 2017. All right reserved. Powered by <a href=\"http://arecastudio.github.io/\" target=\"_blank\">Developer</a>.</div>";
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

function simpan_foto(){

	$target_dir = "uploads/";
	$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
	$uploadOk = 1;
	$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
	// Check if image file is a actual image or fake image

	#if(isset($_POST["submit"])) {
	    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
	    if($check !== false) {
	        echo "File is an image - " . $check["mime"] . ".";
	        $uploadOk = 1;
	    } else {
	        echo "File is not an image.";
	        $uploadOk = 0;
	    }
	#}
	    
	// Check if file already exists
	if (file_exists($target_file)) {
	    echo "Sorry, file already exists.";
	    $uploadOk = 0;
	}
	// Check file size
	if ($_FILES["fileToUpload"]["size"] > 500000) {
	    echo "Sorry, your file is too large.";
	    $uploadOk = 0;
	}
	// Allow certain file formats
	if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
	&& $imageFileType != "gif" ) {
	    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
	    $uploadOk = 0;
	}
	// Check if $uploadOk is set to 0 by an error
	if ($uploadOk == 0) {
	    echo "Sorry, your file was not uploaded.";
	// if everything is ok, try to upload file
	} else {
	    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
	        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
	    } else {
	        echo "Sorry, there was an error uploading your file.";
	    }
	}

}

function kirim_email($nomor_dpb_kolektif){

require_once('libs/PHPMailer/PHPMailerAutoload.php');
$conn0=new mysqli(HOST,USER,PASS,DB);
if ($conn0->connect_error) die("Connection failed: " . $conn0->connect_error);

$email = "noreplyrobotmail@gmail.com";
$password = "pdamjpr!@#";
$message = "SEBUAH PERMINTAAN ATK DENGAN NOMOR $nomor_dpb_kolektif TELAH DIBUAT.";
$subject = "Permintaan ATK telah dibuat !";
$mail = new PHPMailer;
$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->Port = 587;
$mail->SMTPSecure = 'tls';
$mail->SMTPAuth = true;
$mail->Username = $email;
$mail->Password = $password;

#$mail->addAddress('humaspdamjpr@gmail.com');

$sql0="SELECT DISTINCT d.id,d.nama,u.nik,u.nama,u.email FROM user AS u INNER JOIN divisi AS d ON d.id=u.id_divisi WHERE (u.email<>'' OR u.email IS NOT NULL) AND u.nik IN(SELECT DISTINCT u1.nik FROM user AS u1 INNER JOIN divisi AS d ON d.id=u1.id_divisi INNER JOIN user AS u2 ON u2.id_divisi=d.id INNER JOIN permintaan AS p ON p.nik=u2.nik INNER JOIN dpb_kolektif_d AS k2 ON k2.nomor_permintaan=p.nomor WHERE k2.nomor_dpb_kolektif='$nomor_dpb_kolektif');";
$stmt0=$conn0->prepare($sql0);
if($stmt0->execute()){
	$result0=$stmt0->get_result();
	while($row0=$result0->fetch_row()){
		$mail->addAddress($row0[4],$row0[3]);
	}
	
}
$stmt0->close();
$conn0->close();

$mail->addAddress('ondiisrail@gmail.com','ATK Manager Developer');

$mail->Subject = $subject;
$mail->msgHTML($message);

if (!$mail->send()) {
$error = "Mailer Error: " . $mail->ErrorInfo;
#echo '<p id="para">'.$error.'</p>';
}
else {
#echo '<p id="para">Message sent!</p>';
}

}

?>
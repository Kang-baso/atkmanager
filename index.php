<?php
ob_start();
session_start();
require_once('pages/inc.php');
$conn=new mysqli(HOST,USER,PASS,DB);
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

?>
<html>
<head>
	<title>ATK & Inventory Manager - Build Version 1.0</title>

	<meta charset="utf-8">
	<meta http-equiv="content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

	<link rel="stylesheet" href="libs/style.css" />
</head>
<body>
	<?php

if (isset($_POST['submit-login'])) {
	$user=$_POST['username'];$user=trim($user);
	$pass=$_POST['password'];$pass=trim($pass);
	$sql="SELECT DISTINCT u.nik, u.nama, u.password, u.telp, u.email, u.posisi, u.id_divisi, u.nik_atasan, r.id,r.nama FROM user AS u LEFT OUTER JOIN role AS r ON r.id=u.id_role WHERE u.nik=? AND u.password=md5(?);";
	$stmt=$conn->prepare($sql);
	$stmt->bind_param('ss',$user,$pass);
	$stmt->execute();
	$result = $stmt->get_result();
	if ($result->num_rows>0) {
	#if ($user=='admin' && $pass=='admin') {
		if ($row=$result->fetch_row()) {
			$_SESSION['nik']=$row[0];
			$_SESSION['username']=$row[1];			
			$_SESSION['id_divisi']=$row[6];
			$_SESSION['role_id']=$row[8];
			$_SESSION['role_name']=$row[9];

			$sql="INSERT IGNORE INTO user_logged(nik,nama)VALUES(?,?)";
			$stmt1=$conn->prepare($sql);
			$stmt1->bind_param('ss',$_SESSION['nik'],$_SESSION['username']);
			$stmt1->execute();
			$stmt1->close();
		}		
	}else{
		?>

<script type="text/javascript">
	  $( function() {
    $( "#dialog-message" ).dialog({
      modal: true,
      buttons: {
        Ok: function() {
          $( this ).dialog( "close" );
        }
      }
    });
  } );
</script>

<div id="dialog-message" title="Notifikasi">
  <p>
    <span class="ui-icon ui-icon-circle-check" style="float:left; margin:0 7px 50px 0;"></span>
    Login gagal.
  </p>
  <p>
    Kombinasi <i>username</i> dan <i>password</i> salah.
  </p>
</div>
		<?php
		$stmt->close();
	}
}



	if (!isset($_SESSION['username']) || $_SESSION['username']=='') {
		?>
		<div class="container">
			<img src="assets/img/user-icon.png"/>
			<form id="form-login-1" method="post" action="" autocomplete="off">
				<div class="input-group">
				    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
				    <input id="username" type="text" class="form-control" name="username" placeholder="Nomor Induk Karyawan">
			  	</div>
			  	<div class="input-group">
				    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
				    <input id="password" type="password" class="form-control" name="password" placeholder="Password">
			  	</div>
				<button type="submit" class="btn btn-success btn-lg" name="submit-login"><span class="glyphicon glyphicon-log-in"></span> Login</button>
			</form>
			<span id="login-result"></span>
		</div>
		<?php
	}else{
		#echo $_SESSION['username'];
		#$_SESSION['username']='';


	?>
<div class="banner" id="header">
	<img src="assets/img/pln-banner-1.jpg" />	
</div>

<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <!--a class="navbar-brand" href="#">ATK Mgr</a-->
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <!--li class="active"><a href="#">Link <span class="sr-only">(current)</span></a></li>
        <li><a href="#">Link</a></li-->
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Berkas<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="?ref=barang">Barang</a></li>
            <li><a href="?ref=divisi">Bidang</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="?ref=vendor">Vendor</a></li>
            <li><a href="#">Barang Masuk</a></li>
            <!--li role="separator" class="divider"></li>
            <li><a href="#">Separated link</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">One more separated link</a></li-->
          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Proses<span class="caret"></span></a>
          <ul class="dropdown-menu">            <li><a href="?ref=pilih-item">Buat Permintaan</a></li>
            <li><a href="#">Batalkan Permintaan</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="?ref=list-permintaan">List Permintaan <span class="glyphicon glyphicon-envelope"></span></a></li>
          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Laporan<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="?ref=hasil-review">Hasil Review</a></li>
            <li><a href="#">Rekap Permintaan</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">Inventory</a></li>
          </ul>
        </li>
      </ul>        
      <!--form class="navbar-form navbar-left">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Search">
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
      </form-->
      <ul class="nav navbar-nav navbar-right">
      	<li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo "Selamat Datang <strong>".ucwords($_SESSION['username'])."</strong> (".ucwords($_SESSION['role_name']).")";?></a>
        </li>
        <!--li><a href="#">Link</a></li-->
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Pengaturan <span class="glyphicon glyphicon-cog"></span> <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="?ref=karyawan">Karyawan</a></li>
            <li><a href="#">Hak Masuk</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">Panduan</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="?ref=log-out">Keluar</a></li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
<div class="konten">
	<?php

if (isset($_GET['ref'])) {
	$ref=$_GET['ref'];
	switch ($ref) {
		case 'log-out':
			if(isset($_SESSION['username']))unset($_SESSION['username']);
			if(isset($_SESSION['added_item']))unset($_SESSION['added_item']);
			session_destroy();
			exit(header('Location: '.base_url()));
			break;
		case 'divisi':
			require_once('pages/view/master-divisi.php');
			break;
		case 'tambah-divisi':
			require_once('pages/view/tambah-divisi.php');
			break;
		case 'ubah-divisi':
			require_once('pages/view/ubah-divisi.php');
			break;
		case 'hapus-divisi':
			require_once('pages/view/hapus-divisi.php');
			break;
		case 'karyawan':
			require_once('pages/view/master-karyawan.php');
			break;
		case 'tambah-user':
			require_once('pages/view/tambah-user.php');
			break;
		case 'barang':
			require_once('pages/view/master-barang.php');
			break;
		case 'tambah-barang':
			require_once('pages/view/tambah-barang.php');
			break;
		case 'ubah-barang':
			require_once('pages/view/ubah-barang.php');
			break;
		case 'hapus-barang':
			require_once('pages/view/hapus-barang.php');
			break;
		case 'pilih-item':
			require_once('pages/view/master-item.php');
			break;
		case 'ajukan-permintaan':
			require_once('pages/view/ajukan-permintaan.php');
			break;
		case 'list-permintaan':
			require_once('pages/view/list-permintaan.php');
			break;
		default:
			# code...
			break;
	}
}

	}
	
	?>
</div>
<?php break_point();?>
</body>
</html>

<?php
$conn->close();
?>

<!--
AKTIVASI PELANGGAN DIHAPUS
misal nomor '000123'
pada server 0.100:
insert ignore into hapus_2504.master_aktifkan select * from hapus_2504.master where nomor='000123';
insert ignore into billing.master select * from hapus_2504.master where nomor='000123';
insert ignore into billing.transaksi select * from hapus_2504.transaksi where nomor='000123';
insert ignore into billing.rekening1 select * from hapus_2504.rekening1 where nomor='000123';
update billing.master set nu=current_date();

Transver data pelanggan ke masing2 upp melalui aplikasi. di menu utility/transver ke loket external agar data pelanggan bisa terdistribusi
-->
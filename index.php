<?php
ob_start();
session_start();
require_once('pages/inc.php');
$conn=new mysqli(HOST,USER,PASS,DB);
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

if (isset($_POST['submit-login'])) {
	$user=$_POST['username'];
	$pass=$_POST['password'];
	if ($user=='admin' && $pass=='admin') {
		$_SESSION['username']=$user;
	}else{
		echo "salah";
	}
}

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

	<link rel="stylesheet" href="libs/style.css" />
</head>
<body>
	<?php
	if (!isset($_SESSION['username']) || $_SESSION['username']=='') {
		?>
		<div class="container">
			<img src="assets/img/user-icon.png"/>
			<form id="form-login-1" method="post" action="" autocomplete="off">
				<div class="input-group">
				    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
				    <input id="username" type="text" class="form-control" name="username" placeholder="User name">
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

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">ATK Mgr</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <!--li class="active"><a href="#">Link <span class="sr-only">(current)</span></a></li>
        <li><a href="#">Link</a></li-->
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">File<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="?ref=barang">Barang</a></li>
            <li><a href="?ref=divisi">Bidang</a></li>
            <!--li role="separator" class="divider"></li>
            <li><a href="#">Separated link</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">One more separated link</a></li-->
          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Data Keluarga<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Profil Keluarga</a></li>
            <li><a href="#">Profil Keluarga</a></li>
          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Potensi Kampung<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="?ref=sumber-daya-alam">Sumber Daya Alam</a></li>
            <li><a href="#">Profil Keluarga</a></li>
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
        <!--li><a href="#">Link</a></li-->
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Utility <span class="caret"></span></a>
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

	<?php

if (isset($_GET['ref'])) {
	$ref=$_GET['ref'];
	switch ($ref) {
		case 'log-out':
			$_SESSION['username']='';
			exit(header('Location: '.base_url()));
			break;
		case 'divisi':
			require_once('pages/master-divisi.php');
			break;
		case 'karyawan':
			require_once('pages/master-karyawan.php');
			break;
		case 'barang':
			require_once('pages/master-barang.php');
			break;
		case 'tambah-barang':
			require_once('pages/tambah-barang.php');
			break;
		case 'ubah-barang':
			require_once('pages/ubah-barang.php');
			break;
		case 'hapus-barang':
			require_once('pages/hapus-barang.php');
			break;
		default:
			# code...
			break;
	}
}

	}
	?>
</body>
</html>

<?php
$conn->close();
?>
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
		case 'panduan':
			require_once('pages/view/panduan.php');
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
		case 'ubah-barang-foto':
			require_once('pages/view/ubah-barang-foto.php');
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
		case 'ajukan-perubahan':
			require_once('pages/view/ajukan-perubahan.php');
			break;
		case 'list-permintaan':
			require_once('pages/view/list-permintaan.php');
			break;
		case 'edit-permintaan':
			require_once('pages/view/edit-permintaan.php');
			break;
		case 'review-permintaan':
			require_once('pages/view/review-permintaan.php');
			break;
		case 'ubah-permintaan':
			require_once('pages/view/ubah-permintaan.php');
			break;
		case 'hapus-permintaan':
			require_once('pages/view/hapus-permintaan.php');
			break;
		case 'histori-permintaan':
			require_once('pages/view/histori-permintaan.php');
			break;
		case 'detail-permintaan':
			require_once('pages/view/detail-permintaan.php');
			break;
		case 'cetak-permintaan':
			require_once('pages/view/cetak-permintaan.php');
			break;
		case 'cetak-dpb-kolektif':
			require_once('pages/view/cetak-dpb-kolektif.php');
			break;
		case 'acc-permintaan':
			require_once('pages/view/acc-permintaan.php');
			break;
		case 'dpb-kolektif':
			require_once('pages/view/dpb-kolektif.php');
			break;
		default:
			# code...
			break;
	}
}

?>
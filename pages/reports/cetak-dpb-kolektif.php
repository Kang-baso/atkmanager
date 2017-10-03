<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
include_once('../../libs/phpjasperxml/class/tcpdf/tcpdf.php');
include_once("../../libs/phpjasperxml/class/PHPJasperXML.inc.php");
include_once ('../inc.php');

#$tgl_cetak=date('d - M - Y');
$tgl_cetak=getTanggal();

#if (isset($_POST['nomor']) && isset($_POST['ket']) && isset($_POST['tgl']) && isset($_POST['div']) && isset($_POST['nik1']) && isset($_POST['nama1']) && isset($_POST['nik2']) && isset($_POST['nama2'])  ) {
	/*$nomor=$_POST['nomor'];
	$ket=$_POST['ket'];
	$tgl=$_POST['tgl'];
	$div=$_POST['div'];
	$nik1="NIK. ".$_POST['nik1'];
	$nama1=$_POST['nama1'];
	$nik2="NIK. ".$_POST['nik2'];
	$nama2=$_POST['nama2'];*/


	$PHPJasperXML = new PHPJasperXML();
	//$PHPJasperXML->debugsql=true;
	#$PHPJasperXML->arrayParameter=array("parameter1"=>$nomor,"parameter2"=>$ket,"parameter3"=>$tgl,"parameter4"=>$div,"parameter5"=>$tgl_cetak,"parameter6"=>$nik1,"parameter7"=>$nama1,"parameter8"=>$nik2,"parameter9"=>$nama2);
	$PHPJasperXML->arrayParameter=array("parameter1"=>"1");
	$PHPJasperXML->load_xml_file("cetak-dpb-kolektif.jrxml");

	$PHPJasperXML->transferDBtoArray(HOST,USER,PASS,DB);
	$PHPJasperXML->outpage("I");    //page output method I:standard output  D:Download file

#}

?>
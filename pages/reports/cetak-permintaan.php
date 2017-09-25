<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
include_once('../../libs/phpjasperxml/class/tcpdf/tcpdf.php');
include_once("../../libs/phpjasperxml/class/PHPJasperXML.inc.php");
include_once ('../inc.php');

if (isset($_POST['nomor']) && isset($_POST['ket']) && isset($_POST['tgl']) && isset($_POST['div'])  ) {
	$nomor=$_POST['nomor'];
	$ket=$_POST['ket'];
	$tgl=$_POST['tgl'];
	$div=$_POST['div'];
	$tgl_cetak=date('d - M - Y');


	$PHPJasperXML = new PHPJasperXML();
	//$PHPJasperXML->debugsql=true;
	$PHPJasperXML->arrayParameter=array("parameter1"=>$nomor,"parameter2"=>$ket,"parameter3"=>$tgl,"parameter4"=>$div,"parameter5"=>$tgl_cetak);
	$PHPJasperXML->load_xml_file("cetak-permintaan.jrxml");

	$PHPJasperXML->transferDBtoArray(HOST,USER,PASS,DB);
	$PHPJasperXML->outpage("I");    //page output method I:standard output  D:Download file

}

?>
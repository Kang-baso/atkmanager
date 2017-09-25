<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
include_once('../../libs/phpjasperxml/class/tcpdf/tcpdf.php');
include_once("../../libs/phpjasperxml/class/PHPJasperXML.inc.php");
include_once ('../inc.php');






$PHPJasperXML = new PHPJasperXML();
//$PHPJasperXML->debugsql=true;
$PHPJasperXML->arrayParameter=array("parameter1"=>1);
$PHPJasperXML->load_xml_file("report2.jrxml");

$PHPJasperXML->transferDBtoArray(HOST,USER,PASS,DB);
$PHPJasperXML->outpage("I");    //page output method I:standard output  D:Download file


?>
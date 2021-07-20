<?php
include_once 'dompdf/autoload.inc.php';


ini_set('output_buffering', true);
ini_set('output_buffering', 12288);
echo ini_get('output_buffering');
use Dompdf\Dompdf;
$id= $_GET['id'];
$dompdf = new Dompdf();
ob_start();

$id= $_GET['id'];
include_once('crearPdf2.php');

$output=$dompdf->loadHtml(ob_get_clean());



$dompdf->setPaper('A4',"Landscape");

$dompdf->render();

$dompdf->stream('facturaviaje.pdf');

?>

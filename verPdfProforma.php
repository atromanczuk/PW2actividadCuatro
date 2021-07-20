<?php
include_once 'dompdf/autoload.inc.php';


ini_set('output_buffering', true); // no limit
ini_set('output_buffering', 12288); // 12KB limit
echo ini_get('output_buffering');
use Dompdf\Dompdf;
$id= $_GET['id'];
$dompdf = new Dompdf();
ob_start();

$id= $_GET['id'];
include_once('crearPdf.php'); // llamamos el archivo que se supone contiene el html y dejamoso que se renderize

$output=$dompdf->loadHtml(ob_get_clean());



$dompdf->setPaper('A4',"Landscape");

$dompdf->render();

$dompdf->stream('facturaviaje.pdf');

?>


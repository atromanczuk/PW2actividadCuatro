<?php
include_once 'dompdf/autoload.inc.php';

// reference the Dompdf namespace
ini_set('output_buffering', true); // no limit
ini_set('output_buffering', 12288); // 12KB limit
echo ini_get('output_buffering');
use Dompdf\Dompdf;
$id= $_GET['id'];
$dompdf = new Dompdf();
ob_start();
/*$components=parse_url();
json_encode($components);
"<br>";
"<br>";
$components['query'];
"<br>";
"<br>";
parse_str($components['query'], $results);*/
$id= $_GET['id'];
include_once('crearPdf2.php'); // llamamos el archivo que se supone contiene el html y dejamoso que se renderize

$output=$dompdf->loadHtml(ob_get_clean());
/*if ( headers_sent()) {
    echo $output; }
// instantiate and use the dompdf class
*/


// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A4',"Landscape");

// Render the HTML as PDF
$dompdf->render();
/*
// Output the generated PDF to Browser
$f;
$l;
if(headers_sent($f,$l))
{
    echo $f,'<br/>',$l,'<br/>';
    die('now detect line');
}*/
$dompdf->stream('facturaviaje.pdf');

?>

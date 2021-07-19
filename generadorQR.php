
<br>
<br>

<br>

<br>
<?php
session_start();
require_once 'autoload.php';
require_once 'config/db.php';
require_once 'config/parameters.php';
require_once 'helpers/utils.php';
require_once 'views/layout/header.php';
require 'phpqrcode/qrlib.php';

    $dir = 'temp/';

    if(!file_exists($dir)) //si no existe la carpeta, creala
        mkdir($dir);

    $filename = $dir.'test.png';

    $tamanio = 10;
    $level = 'M'; //tipo de precisión máxima
    $frameSize = 3; //marco en blanco
    $contenido = '';

    QRcode::png($contenido, $filename, $level, $tamanio, $frameSize);

    echo '<img src="'.$filename.'" />';




?>
<?php
require 'Exception.php';
require 'PHPMailer.php';
require 'SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
if(!isset($_GET['id'])) {

    $mail = new PHPMailer();
    $mail->isSMTP();

    $mail->Host = "smtp.gmail.com";
    $mail->Port = 587;
    $mail->SMTPSecure = "tls";
    $mail->SMTPAuth = true;
    $mail->Username = 'facultadpruebaunlamtallerweb@gmail.com';
    $mail->Password = 'alextamgero';
    $mail->setFrom('facultadpruebaunlamtallerweb@gmail.com', 'TransporTech');
    $mail->addAddress($email);

    $mail->isHTML(true);
    $mail->Subject = 'Bienvenido a TransporTech ' . $nombre . ' ' . $apellidos;
    $mail->Body = 'Su usuario ha sido creado satisfactoriamente.¡por favor no comparta sus credenciales, ni divulgue su Usuario y Contraseña!';
    if (!$mail->Send())
        echo $mail->ErrorInfo;
}
?>

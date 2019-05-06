<?php
require '../../PHPMailer/class.phpmailer.php';
require_once('../../DB/db_cotizacion.php');
$mail = new PHPMailer();

$coti = $_GET['coti'];
$cambio = $_GET['cambio'];

$destino = Cotizacion::select_mail_codigo($coti);
echo $destino[0][0];


if($cambio==1){
    $subject = 'Desabolladura Terminada ';
    $body = 'Estimado/a '.$destino[0][1].' '.$destino[0][2].' /n/n
    Se le informa que las reparaciones de la Carroceria de su vehiculo han sido terminadas y se comienzan las reparaciones mecanicas';
}
if($cambio==2){
    $subject = 'Desabolladura Terminada ';
    $body = 'Estimado/a '.$destino[0][1].' '.$destino[0][2].' /n/n
    Se le informa que las reparaciones de la Carroceria de su vehiculo han sido terminadas y se comienza la pintura de las partes reparadas';
}
if($cambio==3){
    $subject = 'Desabolladura Terminada ';
    $body = 'Estimado/a '.$destino[0][1].' '.$destino[0][2].' /n/n
    Se le informa que las reparaciones de la Carroceria de su vehiculo han sido terminadas y su vehiculo esta siendo preparado para serle entregado';
}
if($cambio==4){
    $subject = 'Mecanica Terminada ';
    $body = 'Estimado/a '.$destino[0][1].' '.$destino[0][2].' /n/n
    Se le informa que las reparaciones Mecanicas de su vehiculo han sido terminadas y se comienzan la pintura de las partes reparadas';
}
if($cambio==5){
    $subject = 'Mecanica Terminada';
    $body = 'Estimado/a '.$destino[0][1].' '.$destino[0][2].' /n/n
    Se le informa que las reparaciones Mecanicas de su vehiculo han sido terminadas y su vehiculo esta siendo preparado para serle entregado';
}
if($cambio==6){
    $subject = 'Pintura Terminada';
    $body = 'Estimado/a '.$destino[0][1].' '.$destino[0][2].' /n/n
    Se le informa que la pintura de su vehiculo ha sido terminada y su vehiculo esta siendo preparado para serle entregado';
}
if($cambio==7){
    $subject = 'Pintura Terminada';
    $body = 'Estimado/a '.$destino[0][1].' '.$destino[0][2].' /n/n
    Se le informa que su vehiculo esta listo para que usted lo pueda retirar';
}
if($cambio==8){
    $subject = 'Pintura Terminada';
    $body = 'Estimado/a '.$destino[0][1].' '.$destino[0][2].' /n/n
    Su vehiculo ha sido entregado./n/n
    Gracias por traer su vehiculo ha nuestro taller.';
}


$mail->IsSMTP(); // telling the class to use SMTP
$mail->Mailer = "smtp";
$mail->Host = "ssl://smtp.gmail.com";
$mail->Port = 465;
$mail->SMTPAuth = true; // turn on SMTP authentication
$mail->Username = "info.motorware@gmail.com"; // SMTP username
$mail->Password = "motorware"; // SMTP password

$mail->From = $destino[0][0];
$mail->AddAddress("info.motorware@gmail.com");

$mail->Subject = $subject;
$mail->Body = $body;
$mail->WordWrap = 50;

if(!$mail->Send()) {
echo 'Message was not sent.';
echo 'Mailer error: ' . $mail->ErrorInfo;
} else {
echo 'Message has been sent.';
header('refresh:0; url=../../FlujoProcesos.php');
}


/*
$destino = 'info.motorware@gmail.com';
$desde = 'From:'. 'Test Envio Mail';
$asunto = 'Prueba envio';
$mensaje = 'envio de mail envio de mail';

mail($destino,$asunto,$mensaje,$desde);
*/

?>
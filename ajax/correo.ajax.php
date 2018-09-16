<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../PHPMailer/src/Exception.php';
require '../PHPMailer/src/PHPMailer.php';
require '../PHPMailer/src/SMTP.php';

class Correo{

    public static function enviarCorreo(){

        $mail = new PHPMailer;
        
        $nombre = $_POST['nombre'];
        $email = $_POST['email'];
        $mensaje = $_POST['mensaje'];
        
        $mail->isSMTP();                                      // Set mailer to use SMTP
        $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                               // Enable SMTP authentication
        $mail->Username = 'c3s4r.afl@gmail.com';                 // SMTP username
        $mail->Password = '36QU#4rE';                           // SMTP password
        $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 587 ;                                    // TCP port to connect to
        
        $mail->setFrom('c3s4r.afl@gmail.com', 'Informatica y redes mexico');
        $mail->addAddress('cesar@duplou.com', 'Informatica y redes mexico');     

        $mail->Subject = 'Mensaje de cliente '.$nombre;
        $mail->Body = '
            Nombre: '.$nombre.'
            Email de contacto: '.$email.' 
            Mensaje: '.$mensaje.'
        ';
        $mail->CharSet = 'UTF-8';
        
        if(!$mail->send()) {
            echo 'false';
            echo 'Error del mensaje: ' . $mail->ErrorInfo;
        } else {
            echo 'true';
        }
    }

}

if(isset($_POST["nombre"])){

	$editar = new Correo();
	$editar -> enviarCorreo();

}
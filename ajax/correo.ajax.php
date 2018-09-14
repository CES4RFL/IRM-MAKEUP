<?php
 
class Correo{

    public static function enviarCorreo(){

        $nombre = $_POST['nombre'];
        $email = $_POST['email'];
        $mensaje = $_POST['mensaje'];

        $destinatario = "cesar.afl@outlook.com";
        $asunto = "cliente de informatica y redes";

        $correo = "De: $nombre \n";
        $correo .= "Correo: $email \n";
        $correo .= "Mensaje: $mensaje \n";

        mail($destinatario, $asunto, $correo);

        echo 'true';
    }

}

if(isset($_POST["nombre"])){

	$editar = new Correo();
	$editar -> enviarCorreo();

}
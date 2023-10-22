<?php 
	$nombre = $_POST['nombre'];
	$email = $_POST['email'];
	$asunto = 'Consulta CUIPROTEC';
	$mensaje = "Nombre: ".$nombre."<br> Email: $email<br> Mensaje:".$_POST['mensaje'];


	if(mail('tuEmail', $asunto, $mensaje)){
		echo "Correo enviado";
	}
 ?>
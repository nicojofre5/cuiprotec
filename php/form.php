<?php 
	$nombre = $_POST['nombre'];
	$email = $_POST['email'];
	$asunto = 'Consulta CUIPROTEC';
	$mensaje = $_POST['mensaje'];

	
	//Como llegará el mail 

	$mensaje = "Este mensaje fue enviado por " . $nombre . ",\r\n";
	$mensaje .= "Su e-mail es: " .$mail . " \r\n";
	$mensaje .= "El asunto es : Consulta CUIPROTEC";
	$mensaje .= "Mensaje: " . $_POST['mensaje'] . " \r\n";
	$mensaje .= "Enviado el " . date('d/m/Y', time());

	$para = 'consultas@cuiprotec.com.ar';
	$asunto = 'Consulta de sitio web';

	mail($para, $asunto, $mensaje, $headers);

	header('Location:../exito.html');




	
 ?>
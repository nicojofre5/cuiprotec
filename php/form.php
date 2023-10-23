<?php


	if($_SERVER['REQUEST_METHOD'] != 'POST'){
		header("Location:../index.html");
	}
	require('phpMailer/PHPMailer.php');
	require('phpMailer/Exception.php');

	use PHPMailer\PHPMailer\PHPMailer;

	$nombre = $_POST['nombre'];
	$email = $_POST['email'];
	$asunto = 'Consulta CUIPROTEC';
	$mensaje = $_POST['mensaje'];

	$body = <<<HTML
		<h1>Contacto desde la web</h1>
		<p>De: $nombre $apellido / $email</p>
		<h2>Mensaje</h2>
		$mensaje
	HTML;
	
	$headers = "MIME-Version: 1.0 \r\n";
	$headers.="Content-type:text/html;
	charset=utf-8 \r\n";

	//Como llegará el mail 

	
	$para = 'consultas@cuiprotec.com.ar';

	$mailer = new PHPMailer();
	$mailer->setFrom($email,"$nombre $apellido");
	$mailer->addAddress('consultas@cuiprotec.com.ar','Sitio web');
	$mailer->Subject = "Mensaje web: $asunto";
	$mailer->msgHTML($body);
	$mailer->AltBody = strip_tags($body);
	$rta=$mailer->send();

	header('Location:../exito.html');




	
 ?>
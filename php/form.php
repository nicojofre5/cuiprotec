<?php


require("../phpmailer/class.phpmailer.php");
require("../phpmailer/class.smtp.php");

// Valores enviados desde el formulario
if (!isset($_POST["nombre"]) || !isset($_POST["email"]) || !isset($_POST["mensaje"])) {
	die("Es necesario completar todos los datos del formulario");
}

$nombre = $_POST["nombre"];
$email = $_POST["email"];
$mensaje = $_POST["mensaje"];

// Datos de la cuenta de correo utilizada para enviar vía SMTP
$smtpHost = "c1462348.ferozo.com";  // Dominio alternativo brindado en el email de alta 
$smtpUsuario = "matiasnp14@gmail.com";  // Mi cuenta de correo
$smtpClave = "Victoria.101";  // Mi contraseña

// Email donde se enviaran los datos cargados en el formulario de contacto
$emailDestino = "consultas@cuiprotec.com.ar";

$mail = new PHPMailer();
$mail->IsSMTP();
$mail->SMTPAuth = true;
$mail->Port = 465;
$mail->SMTPSecure = 'ssl';
$mail->IsHTML(true);
$mail->CharSet = "utf-8";

$mail->Host = $smtpHost;
$mail->Username = $smtpUsuario;
$mail->Password = $smtpClave;

$mail->From = $email; // Email desde donde envío el correo.
$mail->FromName = $nombre;
$mail->AddAddress($emailDestino); // Esta es la dirección a donde enviamos los datos del formulario

$mail->Subject = "Formulario de contacto - pagina web CUIPROTEC"; // Este es el titulo del email.
$mensajeHtml = nl2br($mensaje);
$mail->Body = "{$mensajeHtml} <br /><br /><h1>Formulario web</h1><br /> <h2>Enviado por $nombre con la cuenta $email</h2><br> <h3>$mensaje</h3>"; // Texto del email en formato HTML
$mail->AltBody = "{$mensaje} \n\n $nombre $email $mensaje"; // Texto sin formato HTML

$estadoEnvio = $mail->Send();
if ($estadoEnvio) {
	echo "El correo fue enviado correctamente.";
} else {
	echo "Ocurrió un error inesperado.";
}

header("Location:../exito.html");

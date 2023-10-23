

<?php
require '../vendor/autoload.php';

//usamos las clases que vamos a utilizar
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$nombre = $_POST["nombre"];
$email = $_POST["email"];
$mensaje = $_POST["mensaje"];
$asunto = "Consulta desde la web";
// instanciamos el objeto de la clase phpmailer

$mail = new PHPMailer(true);

// Datos de la cuenta de correo utilizada para enviar vía SMTP
$smtpHost = "c1462348.ferozo.com";  // Dominio alternativo brindado en el email de alta 
$smtpUsuario = "info@cuiprotec.com.ar";  // Mi cuenta de correo
$smtpClave = "Victoria101*";  // Mi contraseña
// Email donde se enviaran los datos cargados en el formulario de contacto
$emailDestino = "consultas@cuiprotec.com.ar";

$mail->Host = $smtpHost;
$mail->Username = $smtpUsuario;
$mail->Password = $smtpClave;
$mail->IsSMTP();
$mail->SMTPAuth = true;
$mail->Port = 465;
$mail->SMTPSecure = 'ssl';
$mail->IsHTML(true);
$mail->CharSet = "utf-8";

$mail->setFrom($email,$nombre);
$mail->addAddress('consultas@cuiprotec.com.ar');

$mail->isHTML(true);
$mail->Subject= $asunto;
$mensajeHtml = nl2br($mensaje);
$mail->Body = "{$mensajeHtml} <br /><br />Formulario enviado desde web<br /><h2>$nombre</h2><h4>con la cuenta de $email</h4> <hr> y la consulta es $mensaje"; // Texto del email en formato HTML
$mail->AltBody = "{$mensaje} \n\n {$email} \n\n {$nombre}"; // Texto sin formato HTML
// FIN - VALORES A MODIFICAR //

$estadoEnvio = $mail->Send(); 

if ($estadoEnvio) {
    header("Location:../exito.html");
} else {
    echo "Ocurrió un error inesperado.";
}


?>
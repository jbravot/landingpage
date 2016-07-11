<?php
//incluimos la clase PHPMailer
require_once("lib/PHPMailer/PHPMailerAutoload.php");

//instancio un objeto de la clase PHPMailer
$mail = new PHPMailer(); // defaults to using php "mail()"

$mail->isSMTP(); // telling the class to use SMTP
$mail->SMTPAuth   = true;                  // enable SMTP authentication
$mail->SMTPSecure = "tls";                 // sets the prefix to the servier
$mail->Host       = "smtp.gmail.com";      // sets GMAIL as the SMTP server
$mail->Port       = 587;                   // set the SMTP port for the GMAIL server
$mail->Username   = "jjbravo88@gmail.com";  // GMAIL username
$mail->Password   = "tarpuyJON963";            // GMAIL password

//defino el email y nombre del remitente del mensaje
///$mail->setFrom("jjbravo88@gmail.com", "RUMI");
$mail->From = 'jjbravo88@gmail.com';
$mail->FromName = 'RUMI';
$mail->AddAddress("jjbravo88@gmail.com", "Jonathan Bravo");

$elmensaje = str_replace("\n.", "\n..", $_POST["text"]);     //por si el mensaje empieza con un punto ponerle 2
$elmensaje = wordwrap($elmensaje, 70);                       //dividir el mensaje en trozos de 70 cols
$cuerpomsg ="
	<html>
	<head>
	  <title>Tienes un mensaje!!</title>
	</head>
	<body>
	<p>jonathan Bravo, ".$_POST["name"]." - ".$_POST["email"]." te ha enviado un mensaje desde el sitio web http://www.rumiec.com</p>
	  <table>
		<tr>
		  <td><b>Tu mensaje es:</b><br></td>
		</tr>
		<tr>
		  <td>".$elmensaje."</td>
		</tr>
	  </table>
	</body>
	</html>
";

//Añado un asunto al mensaje
$mail->Subject = "[RUMI][ACADEMICO] Mensaje desde sitio web";
$mail->MsgHTML($cuerpomsg);

if(!$mail->Send()) {
	echo "0";
} else {
	echo "1";
}
?>

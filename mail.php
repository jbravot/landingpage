<?php
/incluimos la clase PHPMailer
require_once('lib/PHPMailer/class.phpmailer.php');

//instancio un objeto de la clase PHPMailer
$mail = new PHPMailer(); // defaults to using php "mail()"

//defino el email y nombre del remitente del mensaje
$mail­>SetFrom('jjbravo88@gmail.com', 'RUMI');
$mail­>AddAddress('jjbravo88@gmail.com', "Jonathan Bravo");

$elmensaje = str_replace("\n.", "\n..", $_POST['text']);     //por si el mensaje empieza con un punto ponerle 2
$elmensaje = wordwrap($elmensaje, 70);                       //dividir el mensaje en trozos de 70 cols
$cuerpomsg ='
	<html>
	<head>
	  <title>Tienes un mensaje!!</title>
	</head>
	<body>
	<p>jonathan Bravo, '.$_POST['name'].' - '.$_POST['email'].' te ha enviado un mensaje desde el sitio web http://www.rumiec.com</p>
	  <table>
		<tr>
		  <td><b>Tu mensaje es:</b><br></td>
		</tr>
		<tr>
		  <td>'.$elmensaje.'</td>
		</tr>
	  </table>
	</body>
	</html>
';

/Añado un asunto al mensaje
$mail­>Subject = "[RUMI][ACADEMICO] Mensaje desde sitio web";
$mail­>MsgHTML($cuerpomsg);

if(!$mail­>Send()) {
	echo "0";
} else {
	echo "1";
}
?>
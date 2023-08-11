<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require './bibliotecas/PHPMailer/Exception.php';
require './bibliotecas/PHPMailer/PHPMailer.php';
require './bibliotecas/PHPMailer/SMTP.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = 2;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.office365.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'crestr17@tdea.edu.co';                     //SMTP username
    $mail->Password   = 'N4694NT5NT5S';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;            //Enable implicit TLS encryption
    $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
	$mail->SMTPOptions = array(
		'ssl'=>array(
			'verify_peer'=> false,
			'verify_peer_name'=>false,
			'allow_self_signed'=> true
		)

    );

	
	
	
    //Recipients
    $mail->setFrom('crestr17@tdea.edu.co', 'Carlos Restrepo');
    $mail->addAddress('restrepo.gomez@hotmail.com', 'Carlitos Restrepo');     //Add a recipient
    //$mail->addAddress('ellen@example.com');               //Name is optional
    //$mail->addReplyTo('info@example.com', 'Information');
    //$mail->addCC('cc@example.com');
    //$mail->addBCC('bcc@example.com');

    //Attachments
    //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Ensayo de envio correo';
	
	$file = fopen("vistas/contenidos/404-view.php","r");
	$str = fread($file, filesize("vistas/contenidos/404-view.php"));
	$str = trim($str);
	fclose($file);
	
    $mail->Body    = $str;
	
	
	

    //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
	
    echo 'El mensaje se envio correctamente';
	
	echo print_r($mail);
	
	var_dump("12345");
	die();
} catch (Exception $e) {
    echo "hubo un error al enviar el mensaje. Mailer Error: {$mail->ErrorInfo}";
}

?>



<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Documento sin título</title>
</head>

<body>
</body>
</html>

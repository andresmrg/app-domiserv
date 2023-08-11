<?php
			
		
		$f = fopen("/var/www/html/www.domiservicios.com/exportaciones/prueba_".microtime().".txt",'w');
		fwrite($f,"Hola mundo esto es crontab !");
		fclose($f);

/*use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\PHPException;

require '../bibliotecas/PHPMAILER/Exception.php';
require '../bibliotecas/PHPMAILER/PHPMailer.php';
require '../bibliotecas/PHPMAILER/SMTP.php';

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'resgoca@gmail.com';                     // SMTP username
    $mail->Password   = '3146592076';                               // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom('resgoca@gmail.com', 'Carlitos');
    $mail->addAddress('restrepo.gomez@hotmail.com', 'Joe User');     // Add a recipient
    /*$mail->addAddress('ellen@example.com');               // Name is optional
    $mail->addReplyTo('info@example.com', 'Information');
    $mail->addCC('cc@example.com');
    $mail->addBCC('bcc@example.com');*/

    // Attachments
    /*$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    $mail->addAttachment('/tmp/image.jpg', 'new.jpg');  */  // Optional name

    // Content
    /*$mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'hola mundo';
    $mail->Body    = 'hola esto es un mensaje de prueba <b>in bold!</b>';
    /*$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';*/

    /*$mail->send();
    $f = fopen("/var/www/html/www.domiservicios.com/exportaciones/pruebaOK_".microtime().".txt",'w');
	fwrite($f,"correo enviado correctamente !");
	fclose($f);
	
} catch (Exception $e) {
	
	 $f = fopen("/var/www/html/www.domiservicios.com/exportaciones/pruebaNO_".microtime().".txt",'w');
	fwrite($f,"COREO NO ENVIADO: {$mail->ErrorInfo} ");
	fclose($f);
    
}

/*$destino = "restrepo.gomez@htmail.com";

$contenido = "Cordial saludo."."\n"."este es un mensaje de prueba";

mail($destino,"Prueba correo Php con crontab",$contenido);*/

		

?>


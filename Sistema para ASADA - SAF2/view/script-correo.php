<?php
header("Content-Type: text/html; charset=UTF-8");
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'tools/PHPMailer/src/Exception.php';
require 'tools/PHPMailer/src/PHPMailer.php';
require 'tools/PHPMailer/src/SMTP.php';

	
	

	$correocliente = $_POST['clientecorreo'];
	$asadacorreo = $_POST['asadacorreo'];
	$mensaje = $_POST['mensaje-correo'];
	$cliente_info = $_POST['cliente-info'];
	$asunto = $_POST['asunto'];

	if(valid_email($correocliente) && valid_email($asadacorreo)){

		if(isset($_FILES["archivo"]["name"])){
		$contadorarchivos = count($_FILES['archivo']['name']);
		$nombres = array();
		//$path='docs/'.$_FILES["archivo"]["name"];


		for($i=0;$i<$contadorarchivos;$i++){
		   $filename = $_FILES['archivo']['name'][$i];
		   $nombres[$i] ='docs/'.$filename;
		   // Upload file
		   move_uploaded_file($_FILES['archivo']['tmp_name'][$i],'docs/'.$filename);
    
 		}

 		print_r($nombres);

 	
		//move_uploaded_file($_FILES["archivo"]["tmp_name"],$path);

	enviarCorreoConAdjuntos($correocliente, $asadacorreo,$mensaje,$cliente_info,$nombres,$asunto);

	}else{

			enviarCorreoSinAdjuntos($correocliente, $asadacorreo,$mensaje,$cliente_info,$asunto);

	}

	}else{
		echo "<script>window.location.assign('clienteview.php?mensajeenvio=3')</script>";
	}
	
	

	function enviarCorreoSinAdjuntos($clientecorreo, $asadacorreo, $mensaje, $clienteinfo,$asunto){


		
		
	//Create a new PHPMailer instance
$mail = new PHPMailer;
//Tell PHPMailer to use SMTP
$mail->isSMTP();
//Enable SMTP debugging
// 0 = off (for production use)
// 1 = client messages
// 2 = client and server messages
$mail->SMTPDebug = 2;
//Set the hostname of the mail server
$mail->Host = 'smtp.live.com';
// use
// $mail->Host = gethostbyname('smtp.gmail.com');
// if your network does not support SMTP over IPv6
//Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
$mail->Port = 25;
//Set the encryption system to use - ssl (deprecated) or tls
$mail->SMTPSecure = 'tls';
//Whether to use SMTP authentication
$mail->SMTPAuth = true;
//Username to use for SMTP authentication - use full email address for gmail
$mail->Username = $asadacorreo;
//Password to use for SMTP authentication
$mail->Password = "sakura100";
//Set who the message is to be sent from
$mail->setFrom($asadacorreo, "ASADA Finca 2");
//Set an alternative reply-to address
//$mail->addReplyTo('replyto@example.com', 'First Last');
//Set who the message is to be sent to
$mail->addAddress($clientecorreo, $clienteinfo);
//Set the subject line
$mail->Subject = $asunto;
//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
//$mail->msgHTML(file_get_contents('contents.html'), __DIR__);
//Replace the plain text body with one created manually
$mail->Body = $mensaje;
//Attach an image file
//$mail->addAttachment($path);
//send the message, check for errors
if (!$mail->send()) {
    "Mailer Error: " . $mail->ErrorInfo;
    exit;
   echo "<script>window.location.assign('clienteview.php?mensajeenvio=2')</script>";
    //header('Location:clienteview.php?mensajeenvio=2');
    
} else {
   echo "<script>window.location.assign('clienteview.php?mensajeenvio=1')</script>";

   //header('Location:clienteview.php?mensajeenvio=1');
    //Section 2: IMAP
    //Uncomment these to save your message in the 'Sent Mail' folder.
    #if (save_mail($mail)) {
    #    echo "Message saved!";
    #}
}

	}

	function enviarCorreoConAdjuntos($clientecorreo, $asadacorreo, $mensaje, $clienteinfo,$adjunto,$asunto){


		
	//Create a new PHPMailer instance
$mail = new PHPMailer;
//Tell PHPMailer to use SMTP
$mail->isSMTP();
//Enable SMTP debugging
// 0 = off (for production use)
// 1 = client messages
// 2 = client and server messages
$mail->SMTPDebug = 2;
//Set the hostname of the mail server
$mail->Host = 'smtp.live.com';
// use
// $mail->Host = gethostbyname('smtp.gmail.com');
// if your network does not support SMTP over IPv6
//Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
$mail->Port = 25;
//Set the encryption system to use - ssl (deprecated) or tls
$mail->SMTPSecure = 'tls';
//Whether to use SMTP authentication
$mail->SMTPAuth = true;
//Username to use for SMTP authentication - use full email address for gmail
$mail->Username = $asadacorreo;
//Password to use for SMTP authentication
$mail->Password = "sakura100";
//Set who the message is to be sent from
$mail->setFrom($asadacorreo, "ASADA Finca 2");
//Set an alternative reply-to address
//$mail->addReplyTo('replyto@example.com', 'First Last');
//Set who the message is to be sent to
$mail->addAddress($clientecorreo, $clienteinfo);
//Set the subject line
$mail->Subject = $asunto;
//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
//$mail->msgHTML(file_get_contents('contents.html'), __DIR__);
//Replace the plain text body with one created manually
$mail->Body = $mensaje;
//Attach an image file
for($i=0;$i<count($adjunto);$i++){
	$mail->addAttachment($adjunto[$i]);
}
//$mail->addAttachment($adjunto);
//send the message, check for errors
if (!$mail->send()) {
    "Mailer Error: " . $mail->ErrorInfo;
   echo "<script>window.location.assign('clienteview.php?mensajeenvio=2')</script>";
    //header('Location:clienteview.php?mensajeenvio=2');
    
} else {
   echo "<script>window.location.assign('clienteview.php?mensajeenvio=1')</script>";

   //header('Location:clienteview.php?mensajeenvio=1');
    //Section 2: IMAP
    //Uncomment these to save your message in the 'Sent Mail' folder.
    #if (save_mail($mail)) {
    #    echo "Message saved!";
    #}
}

	}


function valid_email($email){
    // SET INITIAL RETURN VARIABLES

        $emailIsValid = FALSE;

    // MAKE SURE AN EMPTY STRING WASN'T PASSED

        if (!empty($email))
        {
            // GET EMAIL PARTS

                $domain = ltrim(stristr($email, '@'), '@') . '.';
                $user   = stristr($email, '@', TRUE);

            // VALIDATE EMAIL ADDRESS

                if
                (
                    !empty($user) &&
                    !empty($domain) &&
                    checkdnsrr($domain)
                )
                {$emailIsValid = TRUE;}
        }

    // RETURN RESULT

        return $emailIsValid;
}


?>
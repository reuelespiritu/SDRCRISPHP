<?php


// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//Load composer's autoloader
require 'vendor/autoload.php';


function email($sendto,$subject,$message){
$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
try {
    //Server settings                 // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp-mail.outlook.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'sdrcris.dlsu@outlook.com';                 // SMTP username
    $mail->Password = 'sdrcris1234';                           // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('sdrcris.dlsu@outlook.com', 'Reuel');
    // Add a recipient
    $mail->addAddress($sendto);               // Name is optional
    //
    //Attachments
    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = $subject;
    $mail->Body    = $message;
    $mail->AltBody = $message;

    $mail->send();
return TRUE;
} catch (Exception $e) {
return FALSE;

}

}
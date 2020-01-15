<?php
require 'assets/phpmailer/src/Exception.php';
require 'assets/phpmailer/src/PHPMailer.php';
require 'assets/phpmailer/src/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
//SMTP needs accurate times, and the PHP time zone MUST be set
//Create a new PHPMailer instance
$mail = new PHPMailer;
//Tell PHPMailer to use SMTP
$mail->isSMTP();
//Enable SMTP debugging
// SMTP::DEBUG_OFF = off (for production use)
// SMTP::DEBUG_CLIENT = client messages
// SMTP::DEBUG_SERVER = client and server messages
$mail->SMTPDebug = SMTP::DEBUG_SERVER;
//Set the hostname of the mail server
$mail->Host = 'smtp.hostinger.com.br';
//Set the SMTP port number - likely to be 25, 465 or 587
$mail->Port = 587;
//Whether to use SMTP authentication
$mail->SMTPAuth = true;
//Username to use for SMTP authentication
$mail->Username = 'contato@jeimesantana.com.br';
//Password to use for SMTP authentication
$mail->Password = 'jeime123456';
//Set who the message is to be sent from
$mail->setFrom('contato@jeimesantana.com.br', $_POST['name']);
//Set who the message is to be sent to
$mail->addAddress('contato@jeimesantana.com.br', 'Jeime Santana');
//Set the subject line
$mail->Subject = 'Contato de '.$_POST['name'];
//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
$mail->msgHTML('
    Nome: '.$_POST['name'].'<br>
    Email: '.$_POST['email'].'<br>
    Messagem: '.$_POST['message']
);
if (!$mail->send()) {
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message sent!';
    header('Location: https://jeimesantana.com.br/');
}
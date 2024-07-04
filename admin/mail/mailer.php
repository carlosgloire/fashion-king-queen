<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require __DIR__ . "/vendor/autoload.php";

$mail = new PHPMailer(true);
//$mail->SMTPDebug = SMTP::DEBUG_SERVER; // Enable verbose debug output

$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->SMTPAuth = true;
$mail->Username = "armel.tchoumdjin@gmail.com"; // Your Gmail address
$mail->Password = "hzfwkkmydshpjsnd"; // Your Gmail app-specific password
$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
$mail->Port = 587;
$mail->isHTML(true);

// Temporary measure to disable certificate verification
$mail->SMTPOptions = array(
    'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
    )
);

return $mail;

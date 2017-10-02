<?php
require 'libs/PHPMailer/PHPMailerAutoload.php';

$mail = new PHPMailer;

//$mail->SMTPDebug = 3;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
#$mail->Host = 'smtp1.gmail.com;smtp2.gmail.com';  // Specify main and backup SMTP servers
$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'humaspdamjpr@gmail.com';                 // SMTP username
$mail->Password = 'pdamjpr.123';                           // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 465;                                    // TCP port to connect to

$mail->setFrom('from@example.com', 'Mailer');
$mail->addAddress('ondiisrail@gmail.com', 'Joe User');     // Add a recipient
$mail->addAddress('ellen@example.com');               // Name is optional
$mail->addReplyTo('info@example.com', 'Information');
$mail->addCC('cc@example.com');
$mail->addBCC('bcc@example.com');

#$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
#$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Here is the subject';
$mail->Body    = 'This is the HTML message body <b>in bold!</b>';
$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message has been sent';
}
?>

<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Panduan</h3>
  </div>
  <div class="panel-body">
  </div>
</div>
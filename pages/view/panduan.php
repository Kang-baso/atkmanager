<!--?php
require 'libs/PHPMailer/PHPMailerAutoload.php';

$email = "humaspdamjpr@gmail.com";
$password = "pdamjpr.123";
$to_id = "ondiisrail@gmail.com";
$message = "konten";
$subject = "subjek";
$mail = new PHPMailer;
$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->Port = 587;
$mail->SMTPSecure = 'tls';
$mail->SMTPAuth = true;
$mail->Username = $email;
$mail->Password = $password;
$mail->addAddress($to_id);
$mail->Subject = $subject;
$mail->msgHTML($message);
if (!$mail->send()) {
$error = "Mailer Error: " . $mail->ErrorInfo;
echo '<p id="para">'.$error.'</p>';
}
else {
echo '<p id="para">Message sent!</p>';
}

?-->

<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Panduan</h3>
  </div>
  <div class="panel-body">
  </div>
</div>
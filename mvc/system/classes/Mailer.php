<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require('../vendor/autoload.php');
class Mailer
{
  public static function sendmail($address,$subject,$body)
  {
    $mail = new PHPMailer(true);                  
    $mail->isSMTP();
    $mail->Host = MAILHOST;
    $mail->SMTPAuth = true;
    $mail->Username = MAILUSERNAME;
    $mail->Password = MAILPASSWORD;
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
    $mail->Port = 465;

    $mail->setFrom('royrajdip10@gmail.com', 'info@indibook.com');
    $mail->addAddress($address);
    $mail->addReplyTo('royrajdip10@gmail.com', 'info@indibook.com');
    $mail->isHTML(true);
    $mail->Subject = $subject;
    $mail->Body = $body;
    $mail->send();
  }
}
?>
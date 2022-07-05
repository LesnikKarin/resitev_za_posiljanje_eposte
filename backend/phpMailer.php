<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../backend/vendor/autoload.php';

$mail = new PHPMailer(true);

try {

  $mail->SMTPDebug = 0;                  
  $mail->isSMTP();                      
  $mail->Host   = 'smtp.mail.yahoo.com;';          
  $mail->SMTPAuth = true;              
  $mail->Username = 'karin.lesnik@yahoo.com';        
  $mail->Password = 'vvdtnlasamvdrrww';            
  $mail->SMTPSecure = 'tls';              
  $mail->Port   = 587;

  $mail->setFrom('karin.lesnik@yahoo.com', 'Karin Diploma 2022');    
  $mail->addAddress($_POST['receiver']);
  
  $mail->isHTML(true);                
  $mail->Subject = $_POST['subject'];
  $mail->Body = $_POST['body'];

  $mail->addAttachment($_FILES['file']['tmp_name'], $_FILES['file']['name']);
  $mail->send();
  echo "Mail has been sent successfully!";

} catch (Exception $e) {
  echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

?>

<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../backend/vendor/autoload.php';
require '../backend/getSmtp.php';

$mail = new PHPMailer(true);

try {
  $u = $_POST['host'];
  
  $sql = "SELECT * FROM host WHERE username='$u';";
  $result = mysqli_query($conn, $sql);
  while ($row = mysqli_fetch_assoc($result)) {
    $mail->Host = $row['host']; 
  }

  $result = mysqli_query($conn, $sql);
  while ($row = mysqli_fetch_assoc($result)) {
    $mail->Password = $row['password']; 
  }

  $mail->SMTPDebug = 0;                  
  $mail->isSMTP();                      
  $mail->SMTPAuth = true;              
  
  $mail->Username = $_POST['host'];
  $mail->SMTPSecure = 'tls';              
  $mail->Port   = 587;

  $mail->setFrom($u, 'Karin Diploma 2022');    
  
  $addresses = explode(', ', $_POST['receiver']);
  foreach ($addresses as $address) {
      $mail->AddAddress($address);
  }

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
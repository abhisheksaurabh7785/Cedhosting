<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require '/home/cedcoss/vendor/autoload.php';
echo "Message sent";

$mail = new PHPMailer();

try {
   $otp=rand(100000,999999);
   $_SESSION['otp']=$otp;
   $mail->setFrom('abhisheksaurabh78663@gmail.com', 'Abhishek ');
   $mail->addAddress('abhisheksaurabh78663@gmail.com', 'Emperor');
   $mail->Subject = 'Force';
   $mail->Body = 'There is a great disturbance in the Force.'.$otp;
   $mail->isSMTP(true);
   $mail->Host = 'smtp.gmail.com';
   $mail->SMTPAuth = TRUE;
   $mail->SMTPSecure = 'tls';
   $mail->Username = 'abhisheksaurabh78663@gmail.com';
   $mail->Password = 'vttpzmsayborepet';
   $mail->Port = 587;
   
   /* Enable SMTP debug output. */
  // $mail->SMTPDebug = 4;
   
   $mail->send();
}
catch (Exception $e)
{
   echo $e->errorMessage();
}
// catch (\Exception $e)
// {
//    echo $e->getMessage();
// }

?>
<?php

$root = dirname(__FILE__).'/RFmailer/class.phpmailer.php';
require($root);

$mail = new PHPMailer();


// $mail->IsSMTP();                                      // set mailer to use SMTP
$mail->Host       = "ssl://smtp.gmail.com";  // specify main and backup server
$mail->SMTPAuth   = true;     // turn on SMTP authentication
$mail->Port       = 465; 
$mail->SMTPSecure ="ssl";
$mail->Username   = "dbsinj@gmail.com";  // SMTP username
$mail->Password   = "Rachel#80"; // SMTP password
$mail->From       = "rkgupta@tangence.com";
$mail->FromName   = $name; 

// $mail->AddAddress("info@tangence.com"); 
$mail->AddAddress("shamim.khan@tangence.com"); 


 
$mail->WordWrap = 50;                                 // set word wrap to 50 characters
$mail->IsHTML(true);                                 

$mail->Subject = "Panart Email Request";// "AMAZON MARKETING SERVICES";// "Amazon Best Seller form email campaign";


$mail->Body    =  'Hello';

 

if(!$mail->Send())
{
   echo "Message could not be sent. <p>";
   echo "Mailer Error: " . $mail->ErrorInfo;
   exit;
}else{  

   echo "Message has been sent. <p>";
   } 
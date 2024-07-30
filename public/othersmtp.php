<?php
$root = dirname(__FILE__).'/RFmailer/class.phpmailer.php';
require($root);
$mail = new PHPMailer();
$mail->IsSMTP();                                      // set mailer to use SMTP
$mail->Host = "email-smtp.us-east-1.amazonaws.com";  // specify main and backup server
$mail->SMTPAuth = true;     // turn on SMTP authentication
$mail->Port = 465; 
$mail->SMTPSecure ="ssl";
$mail->Username = "AKIAYCBQ5OWTVRQ346X3";  // SMTP username
$mail->Password = "BHPErFImHO73H7dpaBXazIFs8D+dL6mPfBBbd8OaBKV7"; // SMTP password
$mail->From = 'noreply@tangence.com';//$email;
$mail->FromName = 'No-reply Tangence';//$name;
$mail->AddAddress('shamim.khan@tangence.com');
$mail->AddAddress('skhan.iilm@gmail.com');
$mail->AddAddress('narai1987@gmail.com');
$mail->AddAddress('nagesh.rai@tangence.com');
$mail->addReplyTo('info@tangence.com', 'Info');
$mail->WordWrap = 50;                                 // set word wrap to 50 characters
$mail->IsHTML(true);                                 
$mail->Subject = "Tangence Contact Form";// "AMAZON MARKETING SERVICES";// "Amazon Best Seller form email campaign";
$mail->Body    =  htmldata($base_url,$_POST);


if(!$mail->Send())
{
   echo "Message could not be sent. <p>";
   echo "Mailer Error: " . $mail->ErrorInfo;
   exit;
}else{ 

 echo "Message sent. <p>";
 } 


function htmldata($base_url,$post){
   $name                 = 'Testing';
  
  return "<html>
<body>
  <table border=0 width=588 height=130>

    <tr>
      <td height=1 colspan=3></td>
    </tr>
   
    <tr>
      <td width=162 height=24><b><font face=Verdana size=1>Name</font></b></td>
      <td width=15 height=24>:</td>
      <td width=397 height=24><font face=Verdana size=1>$name</font></td>
    </tr>
  
    <tr>
      <td height=15 colspan=3></td>
    </tr> </table></body></html>";
}


?>

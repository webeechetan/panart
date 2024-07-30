<?php

//echo "Abhijeet";
//$url = 'https://www.tangence.in/panartglobal/post_api.php';


$cname="amit";
$cemail="updel.ak@gmail.com";
$cmobile="8285955656";
$cmsg="HI Testing email";

$root = dirname(__FILE__).'/RFmailer/class.phpmailer.php';
require($root);

$mail = new PHPMailer();

// $mail->IsSMTP();                                      // set mailer to use SMTP
$mail->Host       = "ssl://smtp.gmail.com";  // specify main and backup server
$mail->SMTPAuth   = true;     // turn on SMTP authentication
$mail->Port       = 465; 
$mail->SMTPSecure ="ssl";
$mail->Username   = "panartindia@gmail.com";  // SMTP username
$mail->Password   = "qobbddeodgziuqnj"; // SMTP password
$mail->From       = "panartindia@gmail.com";
$mail->FromName   = "Panartglobal"; 
$mail->AddAddress("info@panartglobal.com"); 
 $mail->AddAddress('indeutsch@outlook.com');
 $mail->AddAddress('updel.ak@gmail.com');

$mail->WordWrap = 50;            // set word wrap to 50 characters
$mail->IsHTML(true);                                 

$mail->Subject = "Enquiry via Website";// "AMAZON MARKETING SERVICES";// "Amazon Best Seller form email campaign";


$mail->Body    = "<html>
<body>
  <table border=0 width=588 height=130>

    <tr>
      <td height=1 colspan=3></td>
    </tr>
   
    <tr>
      <td width=162 height=24><b><font face=Verdana size=1>Name</font></b></td>
      <td width=15 height=24>:</td>
      <td width=397 height=24><font face=Verdana size=1>$cname</font></td>
    </tr>
  
    <tr>
      <td height=1 colspan=3></td>
    </tr>  
  
    <tr>
      <td width=162 height=24><b><font face=Verdana size=1>E-mail</font></b></td>
      <td width=15 height=24>:</td>
      <td width=397 height=24><font face=Verdana size=1>$cemail</font></td>
    </tr>
    
    <tr>
    <td height=1 colspan=3></td>
  </tr>  

  <tr>
    <td width=162 height=24><b><font face=Verdana size=1>Mobile</font></b></td>
    <td width=15 height=24>:</td>
    <td width=397 height=24><font face=Verdana size=1>$cmobile</font></td>
  </tr>


    <tr>
      <td height=1 colspan=3></td>
    </tr>
    <tr>
      <td width=162 height=24><b><font face=Verdana size=1>Message</font></b></td>
      <td width=15 height=24>:</td>
      <td width=397 height=24><font face=Verdana size=1>$cmsg</font></td>
    </tr>
    
    <tr>
      <td width=162 height=24><b><font face=Verdana size=1></font></b></td>      
    </tr>
         
    <tr>
      <td height=15 colspan=3></td>
    </tr> </table></body></html>";


if(!$mail->Send())
{
   echo "Message could not be sent. <p>";
   echo "Mailer Error: " . $mail->ErrorInfo;
   exit;
}else{  

   echo "Message has been sent. <p>";
   } 





?>
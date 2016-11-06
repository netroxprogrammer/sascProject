<?php
require("class.phpmailer.php");
require("PHPMailerAutoload.php");

function sendMail($email, $tokken){
$mail = new PHPMailer(true);
//$mail->CharSet = "UTF-8-general_ci";

$mail->IsSMTP(); // enable SMTP
$mail->SMTPDebug = 2; // debugging: 1 = errors and messages, 2 = messages only
//$mail->SMTPAuth = true; // authentication enabled
$mail->SMTPSecure = "ssl";// secure transfer enabled REQUIRED for Gmail
$mail->Host = "smtp.gmail.com";
//$mail->Host = "localhost";
$mail->Port = 465; // 587            // set mailer to use SMTPor 
  // specify main and backup server
$mail->SMTPAuth = true;     // turn on SMTP authentication
$mail->Username = "umtskt1122@gmail.com";  // SMTP username
$mail->Password = ""; // SMTP password

$mail->From = "umtskt1122@gmail.com";
$mail->FromName = "SASC";

$mail->AddAddress($email);                  // name is optional


$mail->WordWrap = 50;                                 // set word wrap to 50 characters

$mail->IsHTML(true);                                  // set email format to HTML

$mail->Subject = "Athuntication";
$mail->Body    = $tokken;
$mail->AltBody = "Tokken Is requiored for security";

if(!$mail->Send())
{
   echo "Message could not be sent. <p>";
   echo "Mailer Error: " . $mail->ErrorInfo;
   exit;
}else{
echo "Message has been sent";

}
/*
$str = "netroxtech1122@gmail.com";
$findemail = explode("@",$str);
echo $findemail[1];
*/
}
?>
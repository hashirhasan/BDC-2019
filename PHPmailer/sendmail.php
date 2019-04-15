 
<?php
session_start();
$email=NULL;
$email=$_SESSION['email'];
require("connection.php");
require 'PHPMailerAutoload.php'; 
//$email=NULL;
$query="SELECT  `password`,  FROM `users` WHERE `scrname`='tgupt'";
if(($result=$conn->query($query))==TRUE)
$password=$result->fetch_assoc();
 
$mail = new PHPMailer();
$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';                       // Specify main and backup server
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'emssi2018@gmail.com';                   // SMTP username
$mail->Password = 'em$$i2018';               // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable encryption, 'ssl' also accepted
$mail->Port = 587;                                    //Set the SMTP port number - 587 for authenticated TLS
$mail->setFrom('emssi2018@gmail.com', '');     //Set who the message is to be sent from
$mail->addReplyTo('emssi2018@gmail.com', '');  //Set an alternative reply-to address
$mail->addAddress($email, '');  // Add a recipient
$mail->addAddress('');               // Name is optional
//$mail->addCC('');
//$mail->addBCC('');
$mail->WordWrap = 50;                                 // Set word wrap to 50 characters
//$mail->addAttachment('localhost/phpsandbox/reset.php');         // Add attachments
//$mail->addAttachment('/images/image.jpg', 'new.jpg'); // Optional name
$mail->isHTML(true);                                  // Set email format to HTML
 
$mail->Subject = 'password reset';
$mail->Body    = 'it works! <b>yeah!</b>';
$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
 
//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
$mail->msgHTML(file_get_contents('contents.html'), dirname(__FILE__));
 
if(!$mail->send()) {
   echo 'Message could not be sent.';
   echo 'Mailer Error: ' . $mail->ErrorInfo;
   exit;
}
 

echo "<h2>Reset link has been sent to your e-mail.</h2>";
header("Location:log-in.php");
 ?>




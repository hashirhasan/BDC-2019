<?php
  function send_mail($email,$subject,$message)
  {      
    require_once('PHPmailer/class.phpmailer.php');
    require 'PHPmailer/PHPMailerAutoload.php'; 
    $mail = new PHPMailer();
    $mail->IsSMTP(); 
    $mail->SMTPDebug  = 0;                     
    $mail->SMTPAuth   = true;                  
    $mail->SMTPSecure = "tls";                 
    $mail->Host       = "smtp.gmail.com";      
    $mail->Port       = 587;     
    $mail->SMTPOptions = array(
    'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
    )
);        
    $mail->AddAddress($email,'');
    $mail->Username="developersmail7@gmail.com";  
    $mail->Password="devmeat99";            
    $mail->SetFrom('developersmail7@gmail.com','');
    $mail->AddReplyTo("developersmail7@gmail.com","");
    $mail->Subject    = $subject;  
    $mail->Body = "hello this is my message"; 
    $mail->MsgHTML($message);
    $bool = $mail->send();
    //return $bool;
    if(!$bool) {
     echo 'Message could not be sent.';
     echo 'Mailer Error: ' . $mail->ErrorInfo;
     exit;
   }
  } 

?>
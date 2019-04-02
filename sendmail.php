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
    $mail->Username="noreply.sdc.si@gmail.com";  
    $mail->Password="softw@reincub@tor@new";            
    $mail->SetFrom('noreply.sdc.si@gmail.com','');
    $mail->AddReplyTo("noreply.sdc.si@gmail.com","");
    $mail->Subject    = $subject;  
    $mail->Body = "hello this is my message"; 
    $mail->MsgHTML($message);
    $bool = $mail->send();
    //return $bool;
    if(!$bool) {
     return "Mail could not be sent";
     
   } else {
        return "Mail sent successfully";    }
  } 

?>
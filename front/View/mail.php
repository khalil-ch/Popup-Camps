<?php
require_once 'PHPMailer-5.2-stable/PHPMailerAutoload.php';
$mail = new PHPMailer();
$mail->isSMTP();
$mail->SMTPAuth = true;
$mail->SMTPSecure = 'ssl';
$mail->Host = 'smtp.gmail.com';
$mail->Port= '465';
$mail->isHTML();
$mail->username = 'abdousfayhi12@gmail.com'; //sender
$mail->password = '1475963F16';
$mail->setFrom('no-reply@popupcamp.com');
$mail->Subject = 'testing subject';
$mail->Body = 'testing body';
$mail->addAddress('sfayhi.abdderrahmen@esprit.tn'); //Reciever
$mail->send();
echo "test";
//header("location:addCommande.php?commande=true");
?>
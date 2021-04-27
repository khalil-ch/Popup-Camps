<?php
    //require 'PHPMAILER/PHPMailerAutoload.php';
/* use PHPMailer\PHPMailer\PHPMailer;
    require_once "PHPMailer/PHPMailer.php";
        require_once "PHPMailer/SMTP.php";
        require_once "PHPMailer/Exception.php";
$mail = new PHPMailer();
$mail->isSMTP();
$mail->SMTPAuth = true;
$mail->SMTPSecure = 'ssl';
$mail->Host = 'smtp.gmail.com';
$mail->Port= '465';
$mail->isHTML();
$mail->username = 'abdousfayhi12@gmail.com'; //sender
$mail->Password = '1475963F16';
$mail->setFrom('no-reply@popupcamp.com','abdou');
$mail->Subject = 'testing subject';
$mail->Body = 'testing body';
$mail->AddAddress('abdousfayhi12@mail.com'); //Reciever
$bol =$mail->Send();
if($bol){
echo "Email Sent";
}
else{
    echo "error";
}*/

    use PHPMailer\PHPMailer\PHPMailer;
        $subject = "testing subject";
        $body = "testing body";
        $email = "abdousfayhi12@gmail.com";
        $password = "1475963F16";
        $name ="abdou";
        require_once "PHPMailer/PHPMailer.php";
        require_once "PHPMailer/SMTP.php";
        require_once "PHPMailer/Exception.php";

        $mail = new PHPMailer();

        //SMTP Settings
        $mail->isSMTP();
        $mail->Host = "smtp.gmail.com";
        $mail->SMTPAuth = true;
        $mail->Username = $email; //enter you email address
        $mail->Password = $password; //enter you email password
        $mail->Port = 465;
        $mail->SMTPSecure = "ssl";

        //Email Settings
        $mail->isHTML(true);
        $mail->setFrom($email, $name);
        $mail->addAddress("opethist666@gmail.com"); //enter you email address
        $mail->Subject = ("$email ($subject)");
        $mail->Body = $body;

        if ($mail->send()) {
            $status = "success";
            $response = "Email is sent!";
        } else {
            $status = "failed";
            $response = "Something is wrong: <br><br>" . $mail->ErrorInfo;
        }
        echo $status;

header("location:addCommande.php?commande=true");
?>
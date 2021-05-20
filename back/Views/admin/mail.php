<!DOCTYPE html>
<html>
<head>
	<title>Send mail from PHP using SMTP</title>
	<link rel="stylesheet" href="../css/bootstrap.min.css">
</head>
<body>
<div class="container">
<h1 class="text-center">send mail</h1>

<hr>
	<?php 
		if(isset($_POST['sendmail'])) {
			require 'phpmailer/src/PHPMailer.php';
		require 'phpmailer/src/smtp.php';
require 'phpmailer/src/exception.php';
			$mail = new PHPMailer;

            $mail->SMTPDebug = SMTP::DEBUG_SERVER;
			$mail->isSMTP();                                      // Set mailer to use SMTP
			$mail->Host = 'smtp.gmail.com' ;  // Specify main and backup SMTP servers
			$mail->SMTPAuth = false;
            $mail->SMTPAutoTLS = false; // Enable SMTP authentication
			$mail->Username = 'offerpromotionspopup@gmail.com';                 // SMTP username
			$mail->Password = 'bibouseddiki';                           // SMTP password
			$mail->SMTPSecure = 'tls';// Enable TLS encryption, `ssl` also accepted
            $mail->Port = 587;                                    // TCP port to connect to

			$mail->setFrom('offerpromotionspopup@gmail.com', 'Dsmart Tutorials');
			$mail->addAddress($_POST['email']);     // Add a recipient

			$mail->addReplyTo('offerpromotionspopup@gmail.com');
			// print_r($_FILES['file']); exit;
			for ($i=0; $i < count($_FILES['file']['tmp_name']) ; $i++) { 
				$mail->addAttachment($_FILES['file']['tmp_name'][$i], $_FILES['file']['name'][$i]);    // Optional name
			}
			$mail->isHTML(true);                                  // Set email format to HTML

			$mail->Subject = $_POST['subject'];
			$mail->Body    = '<div style="border:2px solid red;">This is the HTML message body <b>in bold!</b></div>';
			$mail->AltBody = $_POST['message'];

			if(!$mail->send()) {
			    echo 'Message could not be sent.';
			    echo 'Mailer Error: ' . $mail->ErrorInfo;
			} else {
			    echo 'Message has been sent';
			}
		}
	 ?>
	 
	<div class="row">
    <div class="col-md-9 col-md-offset-2">
        <form role="form" method="post" enctype="multipart/form-data">
        	<div class="row">
                <div class="col-sm-9 form-group">
                    <label for="email">To Email:</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" maxlength="50">
                </div>
            </div>

            <div class="row">
                <div class="col-sm-9 form-group">
                    <label for="subject">Subject:</label>
                    <input type="text" class="form-control" id="subject" name="subject" value="Test Mail with attachments" maxlength="50">
                </div>
            </div>
            
            <div class="row">
                <div class="col-sm-9 form-group">
                    <label for="name">Message:</label>
                    <textarea class="form-control" type="textarea" id="message" name="message" placeholder="Your Message Here" maxlength="6000" rows="4">Test mail using PHPMailer</textarea>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-9 form-group">
                    <label for="name">File:</label>
                    <input name="file[]" multiple="multiple" class="form-control" type="file" id="file">
                </div>
            </div>
             <div class="row">
                <div class="col-sm-9 form-group">
                    <button type="submit" name="sendmail" class="btn btn-lg btn-success btn-block">Send</button>
                </div>
            </div>
        </form>
	</div>
</div>
</body>
</html>
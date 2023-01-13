<?php 
	session_start();
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;

	require 'PHPMailer/src/Exception.php';
	require 'PHPMailer/src/PHPMailer.php';
	require 'PHPMailer/src/SMTP.php';
	require 'email-style.php';
	
	$name = strip_tags(trim($_POST["name"]));
	$name = str_replace(array("\r", "\n"), array(" ", " "), $name);
	$mail = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
	$subject = trim($_POST["subject"]);
	$message = trim($_POST['message']);
	$tmp_mail = $mail;

	// Session area
	$_SESSION['name'] 	 = $name;
	$_SESSION['mail'] 	 = $tmp_mail;
	$_SESSION['subject'] = $subject;
	$_SESSION['content'] = $message;
	// Session area

	if (isset($_POST)) {
		$mail = new PHPMailer(true);

		try {
		    //Server settings
		    $mail->SMTPDebug = 0;                      					//Enable verbose debug output
		    $mail->isSMTP();                                            //Send using SMTP
		    $mail->Host       = 'smtp.gmail.com';                     	//Set the SMTP server to send through
		    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
		    $mail->Username   = '4lphasoftware@gmail.com';              //SMTP username
		    $mail->Password   = 'wmkjehtmozxnawzy';                    	//SMTP password
		    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         //Enable implicit TLS encryption
            $mail->charset="UTF-8";
        	$mail->setlanguage('tr');
		    $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

		    //Recipients
		    $mail->setFrom('4lphasoftware@gmail.com', 'Mail Prototype');
		    $mail->addAddress('canayunus@gmail.com', 'YEC');     		//Add a recipient
		    $mail->addReplyTo('4lphasoftware@gmail.com', 'Information');

		    //Content
		    $mail->isHTML(true);                                  		//Set email format to HTML
		    $mail->Subject = $subject;
		    $mail->Body    = $body;
		    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

		    $mail->send();
		    $_SESSION['alert'] = 1;$_SESSION['status']="success";$_SESSION['message'] = "Your mail has been success send. !";
		} catch (Exception $e) {
			$_SESSION['alert'] = 1;$_SESSION['status']="danger";$_SESSION['message'] = "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
		    //echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
		}
		header("Refresh: 0; url=index.php");
	}
 ?>

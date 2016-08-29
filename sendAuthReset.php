<?php
if (isset($_COOKIE['user_email'])){
	$to = $_COOKIE['user_email'];
	$subject = "Marketing Calendar Authentication Reset";
	$message = "Here is the instruction on how to set up authentication on your device:\r\n\r\n1. Please download Google Authenticator app if you have not already on your device\r\n2. Go to Set up account and select Enter provided key\r\n3. Enter in Marketing Calendar for account name and enter in the following key: HAYDANZTGMYDAOBYHA4DAMBTGM3TAMBY and select Time based option";
	$headers = array();
	$headers[] = "MIME-Version: 1.0";
	$headers[] = "Content-type: text/plain; charset=iso-8859-1";
	$headers[] = "From: Incipio Marketing <marketing@incipio.com>";
	$headers[] = "Reply-To: Incipio <ikim@incipio.com>";
	$headers[] = "Subject: {$subject}";
	$headers[] = "X-Mailer: PHP/".phpversion();
	if (mail($to, $subject, $message, implode("\r\n", $headers))){
		setcookie("email_success", "Email with instruction sent successfully", time()+1800);
		header("Location:http://projects.incipio.com/dev_marketing_calendar/auth");
	} else {
		setcookie("email_fail", "There was a problem. Please try again.", time()+1800);
		header("Location:http://projects.incipio.com/dev_marketing_calendar/auth");
	}
} else {
	setcookie("email_fail", "Invalid email. Please try login again.", time()+1800);
	header("Location:http://projects.incipio.com/dev_marketing_calendar/auth");
}
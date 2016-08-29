<?php
	require_once('rfc6238.php');
	
	$secretkey = 'HAYDANZTGMYDAOBYHA4DAMBTGM3TAMBY';
	$currentcode = $_POST["auth"];

	if (TokenAuth6238::verify($secretkey,$currentcode)) {
		setcookie("auth_success", "Authenticated", time()+1800);
		if (isset($_COOKIE['auth_setup']) && $_COOKIE['auth_setup'] == 0){
			$mysql = new PDO('mysql:dbname=euutugaqnr;host=localhost', 'euutugaqnr', 'UG4ADNdUtr');
			$query = 'UPDATE dev_marketing_calendar_user set authenticate = 1 Where email = :email';
			$data = array(
		    	':email' => $_COOKIE['user_email'],
	      	);
			$stmt = $mysql->prepare($query);
    		$stmt->execute($data);
		}
		header("Location:http://projects.incipio.com/dev_marketing_calendar/select");
	} else {
		setcookie("auth_fail", "Authentication Failed Invalid Code", time()+1800);
		header("Location:http://projects.incipio.com/dev_marketing_calendar/auth");
	}
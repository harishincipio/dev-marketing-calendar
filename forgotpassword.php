<?php 
	$title = "Incipio Marketing Calendar";
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Incipio Marketing Calendar</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
	<link rel='shortcut icon' href='img/favicon.ico' type='image/x-icon'/ >
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<link href='https://fonts.googleapis.com/css?family=Roboto:400,300,500,700,900' rel='stylesheet' type='text/css'>
	<link type="text/css" rel="stylesheet" href="http://projects.incipio.com/dev_marketing_calendar/css/custom.css"/>
<?php
if(isset($_POST['submit']))
	{
		$user_email = $_POST['email'];
		$mysql = new PDO('mysql:dbname=euutugaqnr;host=localhost', 'euutugaqnr', 'UG4ADNdUtr');
		$query = 'SELECT * FROM dev_marketing_calendar_user WHERE email=:email';
		$stmt = $mysql->prepare($query);
		$data = array(
        	':email' => $user_email,
    	);
		$stmt->execute($data);
		$user = $stmt->fetch();

		//echo $product['name'];
		//echo '<script type="text/javascript">alert("'.$user['name'].'");</script>';
		if($user_email == $user['email']){
			$to = $user['email'];
			$subject = "Incipio Marketing Calendar Forgot Password";
			$txt = 'The password for the user email ' . $user['email'] . ' is ' . $user['password'] . '.';
			$headers = "from: noreply@incipio.com";

			mail($to, $subject, $txt, $headers);
			header("Location:http://projects.incipio.com/dev_marketing_calendar/");

		}
		else{
			echo '<script type="text/javascript">alert("Cannot find user email.");</script>';
		}
		

	}
?>
</head>
<body>
<div class="homepage-bg"></div>
<div class="login-wrap">
	<div class="login-box">
		<div class="login-logo"></div>
		<span style="color:white;text-transform: uppercase;font-size: 14pt;text-align: center;"><center>Forgot Password</center></span>
		<form class="login-form" role="form" action="#" method="POST">
		<div class="form-group">
				<input type="email" class="form-control form-input" name="email" placeholder="EMAIL" required>
		</div>
			<button type="submit" name="submit" class="btn btn-default">Send Email</button>
		</form>
	</div>
</div>

<?php include_once('footer.php'); ?>
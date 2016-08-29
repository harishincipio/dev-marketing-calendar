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
</head>
<body>
<div class="homepage-bg"></div>
<div class="login-wrap">
	<div class="login-box">
		<div class="login-logo"></div>
		<form class="login-form" role="form" action="login.php" method="POST">
			<div class="form-group">
				<input type="email" class="form-control form-input" name="email" placeholder="EMAIL">
			</div>
			<div class="form-group">
				<input type="password" class="form-control form-input" name="password" placeholder="PASSWORD">
			</div>
			<button type="submit" class="btn btn-default">LOG IN</button><br/>
			<a style="margin-top:5px;" class="btn btn-default" href="http://projects.incipio.com/dev_marketing_calendar/forgotpassword.php">Forgot Password</a>
			<div class="error" style="padding-top:15px;">
			<?php 
				if(isset($_COOKIE["login_fail"])) { 
					echo $_COOKIE["login_fail"];
					setcookie("login_fail", $_COOKIE["login_fail"], time()-1); 
				}
			?>
			</div>
		</form>
	</div>
</div>

<?php include_once('footer.php'); ?>
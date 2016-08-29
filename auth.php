<?php 
	if (!isset($_COOKIE['user_email'])){
		header("Location:http://projects.incipio.com/dev_marketing_calendar/");
	}
	require_once('rfc6238.php');
	$secretkey = 'HAYDANZTGMYDAOBYHA4DAMBTGM3TAMBY';
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
		<form class="login-form" role="form" action="validate.php" method="POST">
			<? if (isset($_COOKIE['auth_setup']) && $_COOKIE['auth_setup'] == 0){ ?>
			<div style="padding:10px 0 20px 0; text-align:center;"><?php print sprintf('<img src="%s"/>',TokenAuth6238::getBarCodeUrl('','',$secretkey,'Marketing%20Calendar')); ?></div>
			<? } else { ?>
			<div style="margin:0 10px 15px 20px;"><a href="sendAuthReset.php">Click here to set up authentication again</a></div>
			<? } ?>
			<div class="form-group">
				<input type="auth" class="form-control form-input" name="auth" placeholder="6-Digit Code">
			</div>
			<button type="submit" class="btn btn-default">AUTHENTICATE</button>
			<div class="error" style="padding-top:15px;">
			<?php 
				if(isset($_COOKIE["auth_fail"])) { 
					echo $_COOKIE["auth_fail"];
					setcookie("auth_fail", $_COOKIE["auth_fail"], time()-1); 
				}
				if(isset($_COOKIE["email_success"])) { 
					echo $_COOKIE["email_success"];
					setcookie("email_success", $_COOKIE["email_success"], time()-1); 
				}
				if(isset($_COOKIE["email_fail"])) { 
					echo $_COOKIE["email_fail"];
					setcookie("email_fail", $_COOKIE["email_fail"], time()-1); 
				}
			?>
			</div>
		</form>
	</div>
</div>

<?php include_once('footer.php'); ?>
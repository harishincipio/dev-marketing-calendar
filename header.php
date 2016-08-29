<?php
	if (!isset($_COOKIE['user_email'])){
		header("Location:http://projects.incipio.com/dev_marketing_calendar/");
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Incipio Marketing Calendar</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
	<link rel='shortcut icon' href='img/favicon.ico' type='image/x-icon'/ >
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<link href='https://fonts.googleapis.com/css?family=Roboto:100,400,300,500,700,900' rel='stylesheet' type='text/css'>
	<link type="text/css" rel="stylesheet" href="http://projects.incipio.com/dev_marketing_calendar/css/custom.css"/>
</head>
<!--Code to disable right click oncontextmenu="return false;" -->
<body >
	<header class="the-header header-bg">
		<div class="header-flex flex-user">
			<div>
				<div class="user-conf">Confidential</div>
				<div class="user-greet">
					<i class="fa fa-user" aria-hidden="true"></i> 
					<span class="user-name"><?php echo $_COOKIE["user_fname"] . ' ' . $_COOKIE["user_lname"]; ?></span>
					<a class="logout-btn" href="http://projects.incipio.com/dev_marketing_calendar/logout.php">Logout</a>
					<a class="logout-btn" href="http://projects.incipio.com/dev_marketing_calendar/resetpassword.php?id=<?php echo $_COOKIE['user_id'];?>">Reset-Password</a>
				</div>
			</div>
		</div>
		<?php 
			if (isset($_COOKIE["user_permission"]) && $_COOKIE["user_permission"]==0){ ?>
				<div class="header-flex flex-logo-su">
					<a href="//projects.incipio.com/dev_marketing_calendar/select" class="logo" style="display: block;"></a>
				</div>
				<div class="header-flex flex-launch">
					<a href="//projects.incipio.com/dev_marketing_calendar/form" class="go-to-form">
						<i class="fa fa-plus" aria-hidden="true" style="margin-right:5px;"></i> New Launch
					</a>
				</div>
		<?php
			} else { 
		?>
				<div class="header-flex flex-logo">
					<a href="//projects.incipio.com/dev_marketing_calendar/select" class="logo" style="display: block;"></a>
				</div>
		<?php
			}
		?>
	</header>

	<!-- TABLET/MOBILE HEADER -->
	<div class="mm-header header-bg">
		<a href="//projects.incipio.com/dev_marketing_calendar/select" class="logo" style="display: block;"></a>
		<?php 
			if (isset($_COOKIE["user_permission"]) && $_COOKIE["user_permission"]==0){ ?>
				<div class="mm-header-flex">
					<div class="mm-header-item header-flex flex-user">
						<div>
							<div class="user-conf">Confidential</div>
							<div class="user-greet">
								<i class="fa fa-user" aria-hidden="true"></i> 
								<span class="user-name"><?php echo $_COOKIE["user_fname"] . ' ' . $_COOKIE["user_lname"]; ?></span>
								<a class="logout-btn" href="http://projects.incipio.com/dev_marketing_calendar/logout.php">Logout</a>
							</div>
						</div>
					</div>
					<div class="mm-header-item header-flex flex-launch">
						<a href="//projects.incipio.com/dev_marketing_calendar/form" class="go-to-form">
							<i class="fa fa-plus" aria-hidden="true" style="margin-right:5px;"></i> New Launch
						</a>
					</div>
				</div>
		<?php
			} else { 
		?>
			<div class="mm-user">
				<div class="user-conf">Confidential</div>
				<div class="user-greet">
					<i class="fa fa-user" aria-hidden="true"></i> 
					<span class="user-name"><?php echo $_COOKIE["user_fname"] . ' ' . $_COOKIE["user_lname"]; ?></span>
					<a class="logout-btn" href="http://projects.incipio.com/dev_marketing_calendar/logout.php">Logout</a>
				</div>
			</div>
		<?php
			}
		?>
	</div>

<!-- Watermark -->
<div class="watermark-wrap">
	<div class="watermark">
	<?php
		for($i = 0; $i <= 1500; $i++){
			echo "<div style='margin:8px;float:left;font-family:inherit;'>" . str_replace('.com','',$_COOKIE["user_email"]) . "</div>"; 
		}
	?>
	</div>
</div>
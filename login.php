<?
try {
	$mysql = new PDO('mysql:dbname=euutugaqnr;host=localhost', 'euutugaqnr', 'UG4ADNdUtr');
	$query = 'SELECT * FROM dev_marketing_calendar_user WHERE email=:email AND password=:password';
	$stmt = $mysql->prepare($query);
	$data = array(
        ':email' => $_POST["email"],
        ':password' => $_POST["password"],
    );
	$stmt->execute($data);
	$user = $stmt->fetch();
	if (isset($user["email"])){
		setcookie("user_email", $user["email"], time()+1800);
		if (isset($user["name"])){
			setcookie("user_name", $user["name"], time()+1800);
		}
		if (isset($user["fname"]) && isset($user["lname"])){
			setcookie("user_fname", $user["fname"], time()+1800);
			setcookie("user_lname", $user["lname"], time()+1800);
			setcookie("user_id", $user["id"], time()+1800);
		}
		if (isset($user["permission"])){
			setcookie("user_permission", $user["permission"], time()+1800);
		}
		if (isset($user["authenticate"])){
			setcookie("auth_setup", $user["authenticate"], time()+1800);
		}
		header("Location:http://projects.incipio.com/dev_marketing_calendar/select");
		// if ($_SERVER['REMOTE_ADDR'] == "70.165.57.34"){
		// 	header("Location:http://projects.incipio.com/dev_marketing_calendar/auth");
		// } else {
		// 	setcookie("login_fail", "Access Restricted", time()+1800);
		// 	header("Location:http://projects.incipio.com/dev_marketing_calendar/");
		// }
	} else {
		setcookie("login_fail", "Invalid email or password", time()+1800);
		header("Location:http://projects.incipio.com/dev_marketing_calendar/");
	}
} catch (PDOException $e){
	print "Error: " . $e->getMessage();
	die();
}
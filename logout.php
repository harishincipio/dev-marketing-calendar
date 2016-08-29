<?
setcookie("user_email", $_COOKIE["user_email"], time()-1);
setcookie("user_name", $_COOKIE["user_name"], time()-1);
setcookie("user_fname", $_COOKIE["user_fname"], time()-1);
setcookie("user_lname", $_COOKIE["user_lname"], time()-1);
setcookie("user_permission", $_COOKIE["user_permission"], time()-1);
setcookie("auth_success", $_COOKIE["auth_success"], time()-1);
header("Location:/dev_marketing_calendar/");
?>
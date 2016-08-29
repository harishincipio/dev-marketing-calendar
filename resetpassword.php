<?php
	include_once('header.php');

	$id = $_GET['id'];
	$title = "Reset Password";
	$mysql = new PDO('mysql:dbname=euutugaqnr;host=localhost', 'euutugaqnr', 'UG4ADNdUtr');
	$query = 'SELECT * FROM dev_marketing_calendar_user WHERE id=:id';
	$stmt = $mysql->prepare($query);
	$data = array(
        ':id' => $id,
    );
	$stmt->execute($data);
	$product = $stmt->fetch();

	if(isset($_POST['submit']))
	{
		$id = $_GET['id'];
			$query = 'UPDATE dev_marketing_calendar_user set password = :password Where id = :id';
		    $data = array(
		    	':password' => $_POST['new_password'],
		    	':id' => $id,
	         );
		    $stmt = $mysql->prepare($query);
    		$stmt->execute($data);
    		setcookie("submit_success", "Password Reset Successfully", time()+1800);
			header("Location:http://projects.incipio.com/dev_marketing_calendar/select");
	}
?>
<script language='javascript' type='text/javascript'>
	function checkPasswordMatch() {
    var password = $("#password").val();
    var confirmPassword = $("#password_confirm").val();

    if (password != confirmPassword){
        $("#divCheckPasswordMatch").html("* Passwords do not match.");
       	document.getElementById("submit").disabled = true;
    }
    else{
        $("#divCheckPasswordMatch").html("");
        document.getElementById("submit").disabled = false;
    }
    }
    function checkCurrentPassword(){
    	var old_password_check = $("#old_password_check").val();
    	var old_password = $("#old_password").val();

    if(old_password_check != old_password){
    	$("#divPasswordMatch").html("* Dosen't match the current password.");
       	document.getElementById("submit").disabled = true;
    }else
    {
    	document.getElementById("submit").disabled = false;
    	$("#divPasswordMatch").html("");
    }
    }

$(document).ready(function () {
   $("#txtConfirmPassword").keyup(checkPasswordMatch);
});

</script>


<div class="page-title">Re-Set Password</div>
<div class="submit-form">
	<form role="form" action="#" method="POST" enctype="multipart/form-data">
		<div class="form-group">
			<input type="hidden" class="form-control" name="old_password_check" id="old_password_check" value="<?php echo $product['password'];?>" required>
			<input type="password" class="form-control" name="old_password" id="old_password" placeholder="Enter Current Password" value="" required onChange="checkCurrentPassword();">
			<div class="registrationFormAlert" style="font-family:inherit;font-size:10pt;color:red;" id="divPasswordMatch"></div>
		</div>
		<div class="form-group">
			<input name="new_password" class="form-control" required="required" type="password" id="password" placeholder="Enter New Password" />
		</div>
		<div class="form-group">
			<input name="password_confirm" class="form-control" required="required" type="password" id="password_confirm" placeholder="Re-Enter New Password" onChange="checkPasswordMatch();" />
		</div>
		 <div class="registrationFormAlert" style="font-family:inherit;font-size:10pt;color:red;margin-bottom: 10px;" id="divCheckPasswordMatch"></div>
		<button type="submit" name="submit" id="submit" class="btn btn-default submit-form-btn">SAVE</button>
	</form>
</div>
<?php include_once('footer.php'); ?>
<?php 
	//session_start();
	$error="Please Input your username, Password";
	require_once('database.php');

	if (isset($_POST["submit"])) {
		$validation=$databasecall->authentication($_POST["username"], $_POST["password"]);
		if ($validation!=true) {
			$error="Invalid Username/Password";
		}
	}

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Staff Login</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<?php require_once('Includes/header1.php'); ?>

	<div class="box" style="height:400px;">
	<br>
	<h2>Staff must login to veiw their own page.</h2>
	<br/><br/>

		<form method="POST" action="login.php " >
		Username: <input type="text" name="username" /><br/>
		Password: <input type="password" name="password" /><br/>
		<input type="submit" value="Log in" name="submit"><br/>

		</form>
		<br><br><br>

	</div>
	<div class="tail">
		<?php require_once('Includes/footer.php');?>
	</div>
	

</body>
</html>

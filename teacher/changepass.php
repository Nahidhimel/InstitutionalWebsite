
<?php 
 		include_once('../Includes/header.php');
 	 ?>
<?php
	//session_start(); 
	require_once('../database.php');
	if (!isset($_SESSION['name'])) {
		echo "<script>alert('Please Log In first');</script>";
		header('Location: login.php');
	}
	$msg='';

	if(isset($_POST["submit"])){
		$check = $databasecall->update_pass($_POST["password"],$_POST["new-password"],$_POST["again"]);
		if ($check == true) {
			$msg = "Password Updated";
		}
		else{
			$msg = "Failed Attemp";
		}

	}
 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title>Teacher</title>
 	<link rel="stylesheet" type="text/css" href="../css/style.css">
 </head>
 <body>
 	
 	 <div class="box">
 	 	
 	 	<br>
 	 	<p><?php echo $msg; ?></p>
 	 	<form method="POST" action="changepass.php"> 
 	 	<br>
 	 	 	<h2>Change Password</h2>
 	 	 	<br>
 	 	 	Password: <input type="password" name="password"><br>
 	 	 	New-Password: <input type="password" name="new-password"><br>
 	 	 	Type-again: <input type="password" name="again"><br>
 	 	 	<input type="submit" name="submit" value="submit">
 	 	 	<br>
 	 	</form>
 	 	<br>
 		<a href="../teacher.php">Back to home</a>
 	 	<br><br>
 	 	
 	 </div>

 	 <div class="tail">
 		<?php 
 			include_once('../Includes/footer.php');
 		 ?>
 	</div>
 </body>
 </html>
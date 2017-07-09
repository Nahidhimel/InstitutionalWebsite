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

	if(isset($_POST["del"])){
		$check = $databasecall->del_staff($_POST["username"]);
		if ($check == true) {
			$msg = "The Teacher is no longer here.";
		}
		else{
			$msg = "Failed Attemp";
		}

	}
 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title>Delete Teacher</title>
 	<link rel="stylesheet" type="text/css" href="../css/style.css">
 </head>
 <body>
 		 
 	 <div class="box">
 	 <br>
 	 <p><?php echo $msg; ?></p>
 	 	 <form method="POST" action="delTeacher.php"> 
 	 	 <br>
 	 	 	<h2>Delete Teacher</h2>
 	 	 	<br>
 	 	 	Username: <input type="text" name="username"><br>
 	 	 	<input type="submit" name="del" value="submit">
 	 	 	<br>
 	 	 </form>
 	 	 <br>
 		 <a href="../admin.php">Back to Admin Home</a>
 	 	 <br><br>
 	 	
 	 </div>

 	 <div class="tail">
 	 	<?php 
 		include_once('../Includes/footer.php');
    	 ?>
 	 </div>
 </body>
 </html>
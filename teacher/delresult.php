<?php 
 		include_once('../Includes/header1.php');
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
		$check = $databasecall->del_result($_POST["StudentId"]);
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
 	<title>Delete Result</title>
 	<link rel="stylesheet" type="text/css" href="../css/style.css">
 </head>
 <body>
 	
 	 
 	 <div class="box">
 	 <br>
 	 <p><?php echo $msg; ?></p>
 	 	 <form method="POST" action="delresult.php"> 
 	 	 <br>
 	 	 	<h2>Delete Student Result</h2>
 	 	 	<br>
 	 	 	StudentID <input type="text" name="StudentId"><br>
 	 	 	<input type="submit" name="del" value="submit">
 	 	 	<br>
 	 	 </form>
 	 	 <br>
 		 <a href="../teacher.php">Back to Teacher Home</a>
 	 	 <br><br>
 	 	
 	 </div>

 	 <div class="tail">
 	 	<?php 
 		include_once('../Includes/footer.php');
    	 ?>
 	 </div>
 </body>
 </html>
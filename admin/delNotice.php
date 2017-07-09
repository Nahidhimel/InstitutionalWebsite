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
		$check = $databasecall->del_notice($_POST["noticeId"]);
		if ($check == true) {
			$msg = "The Notice is Deleted.";
		}
		else{
			$msg = "Failed Attemp";
		}

	}
 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title>Notice</title>
 	<link rel="stylesheet" type="text/css" href="../css/style.css">
 </head>
 <body>
 	
 	 	 <div class="box">
 	 	
 	 	<br>
 	 	<p><?php echo $msg; ?></p>
 	 	<form method="POST" action="delNotice.php"> 
 	 	<br>
 	 	 	<h2>Delete Teacher</h2>
 	 	 	<br>
 	 	 	Notice ID: <input type="number" name="noticeId"><br>
 	 	 	<input type="submit" name="submit" value="submit">
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
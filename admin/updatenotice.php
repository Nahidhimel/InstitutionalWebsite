
<?php 
 		include_once('../Includes/header.php');
 	 ?>

<?php 
	require_once('../database.php');

	if (!isset($_SESSION['name'])) {
		echo "<script>alert('Please Log In first');</script>";
		header('Location: login.php');
		//die();
	}

	$msg='';

	if (isset($_POST["Submit"])) {
		$check=$databasecall->updateNotice($_POST["noticeId"], $_POST["noticeSub"], $_POST["notice"], $_POST["date"]);
		if ($check == true) {
			$msg="Updated Successfully";
		}
		else{
			$msg="Failed to Update";
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

 	 	<h2>Update Notice</h2>
 	 	<br>
 	 	<p><?php echo $msg; ?></p>
 	 	<br><br>

 	 	<form method="POST" action="updatenotice.php">

 	 	Notice Id :<br> <input type="number" name="noticeId"><br>
 	 	Notice Subject :<br> <input type="text" name="noticeSub"><br>
 	 	Notice :<br> <textarea name="notice" rows="10" cols="35"></textarea><br>
 	 	Date : <br> <input type="date" name="date"><br><br>
 	 	<input type="submit" name="Submit" value="submit">
 	 	<br><br>

 	 	</form>

 	 	<a href="../admin.php">Back to Admin Home</a>
 	 </div>


 	 <div class="tail">
 		<?php 
 			include_once('../Includes/footer.php');
 		 ?>
 	</div>
 </body>
 </html>
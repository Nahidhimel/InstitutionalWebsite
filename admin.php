<?php 
 		include_once('Includes/header1.php');
 	 ?>
<?php 
 	//session_start();
	require_once('database.php');

	//echo $_SESSION['name'];

	if (!isset($_SESSION['name'])) {
		echo "<script>alert('Please Log In first');</script>";
		header('Location: login.php');
		//die();
	}
	elseif ($_SESSION['name'] != "Admin") {
		header('Location: login.php');
	
	}

	if (isset($_POST['logout'])) {
		//session_destroy();
		$databasecall->logout();
		//die();

	}
 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title>Admin</title>
 	<link rel="stylesheet" type="text/css" href="css/style.css">
 </head>
 <body>
 	

 	
	<div class="but" align="center">
	<h1>Welcome Admin!</h1>

	<br><br>
		<div class="bakso2">
		<a href="admin/showstaff.php"><input type="submit" value="Show Teacher" name="submit"></a><br>
		<a href="admin/addTeacher.php"><input type="submit" value="Add Teacher" name="submit"></a><br>
	  	<a href="admin/delTeacher.php"><input type="submit" value="Delete Teacher" name="submit"></a><br>
	  	<a href="admin/schedule.php"><input type="submit" value="Make Schedule For Teacher" name="submit"></a><br>
	  	<a href="admin/showschedule.php"><input type="submit" value="Show Schedule" name="submit"></a><br>
	  	<a href="admin/updatenotice.php"><input type="submit" value="Update Notice" name="submit"></a><br>
	  	<a href="admin/delNotice.php"><input type="submit" value="Delete Notice" name="submit"></a><br>

		</div>
	  	<br><br>
 		<form action="admin.php" method="post">
		<input type="submit" id="logout" value="logout" name="logout">
	</form>
		
	</div>
		
 	<div class="tail">
      	 <?php include_once('Includes/footer.php') ?>
    </div>
 </body>
 </html>

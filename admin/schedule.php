<?php 
 		include_once('../Includes/header.php');
 	 ?>

<?php 
	//session_start();
	require_once('../database.php');

	if (!isset($_SESSION['name'])) {
		echo "<script>alert('Please Log In first');</script>";
		header('Location: login.php');
		//die();
	}
	// elseif ($_SESSION['name'] != "Admin") {
	// 	header('Location: login.php');
	
	// }
	$msg= "";

	if (isset($_POST["update"])) {
		$var = $databasecall->makeSchedule($_POST["staffid"],$_POST["scheduleid"],$_POST["courseid"],$_POST["day"]);

		if ($var==true) {
			$msg = "Successfully Added";
		}
		else{
			$msg = "Failed Attempt";
		}
	}

	$course = $databasecall->getcourse();
	$schedule = $databasecall->getscheduledetails();
	$staff = $databasecall->showstaff();

 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title>Make Teacher's Schedule</title>
 	<link rel="stylesheet" type="text/css" href="../css/style.css">
 </head>
 <body>
 	
 	 <div class="box">
 	 	
 	 	<h2>Make Schedule</h2>
 	 	<?php echo $msg; ?>
 		<br><br>
 		<form method="POST" action="schedule.php">
 		
 		Staff ID:<br><br>
 		<select name="staffid">
 			<?php 
 				for ($i=0 ; $i < count($staff["staffID"]) ; $i++ ) { 
 					echo "<option value=".$staff["staffID"][$i].">&nbsp;&nbsp;&nbsp;&nbsp;".$staff["staffID"][$i]."&nbsp;&nbsp;</option>";
 				}
 			 ?>
 		</select>
 		<br><br>
 		Schedule Id:<br><br>
 		<select name="scheduleid">
 			<?php 
 				for ($i=0 ; $i < count($schedule["idSchedule"]) ; $i++ ) { 
 					echo "<option value=".$schedule["idSchedule"][$i].">&nbsp;&nbsp;&nbsp;&nbsp;".$schedule["schedule"][$i]."&nbsp;&nbsp;</option>";
 				}
 			 ?>
 		</select>
 		<br><br>
 		Course Id:<br><br>
 		<select name="courseid">
 			<?php 
 				for ($i=0 ; $i < count($course["idCourse"]) ; $i++ ) { 
 					echo "<option value=".$course["idCourse"][$i].">&nbsp;&nbsp;&nbsp;&nbsp;".$course["CourseName"][$i]."&nbsp;&nbsp;</option>";
 				}
 			 ?>
 		</select>
 		<br><br>
 		Day:<br><br>
 		<input type="text" name="day" required>
 		<br><br>
 		<input type="submit" name="update" value="submit">
 		
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
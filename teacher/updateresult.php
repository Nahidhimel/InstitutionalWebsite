<?php 
 		include_once('../Includes/header1.php');
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
		$var = $databasecall->updateresult($_POST["studentid"],$_POST["courseid"],$_POST["grade"]);

		if ($var==true) {
			$msg = "Successfully Added";
		}
		else{
			$msg = "Failed Attempt";
		}
	}

	$course = $databasecall->getcourse();
	$student = $databasecall->getstudent();

 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title>Student Result</title>
 	<link rel="stylesheet" type="text/css" href="../css/style.css">
 </head>
 <body>
 	
 	 <div class="box">
 	 	
 	 	<h2>Update Student Result</h2>
 	 	<?php echo $msg; ?>
 		<br><br>
 		<form method="POST" action="updateresult.php">
 		
 		Student ID:<br><br>
 		<select name="studentid">
 			<?php 
 				for ($i=0 ; $i < count($student["idStudent"]) ; $i++ ) { 
 					echo "<option value=".$student["idStudent"][$i].">&nbsp;&nbsp;&nbsp;&nbsp;".$student["idStudent"][$i]."&nbsp;&nbsp;</option>";
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
 		Grade<br><br>
 		<input type="number" name="grade" required>
 		<br><br>
 		<input type="submit" name="update" value="submit">
 		
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
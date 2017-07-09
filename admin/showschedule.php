<?php include_once('../Includes/header.php'); ?>

<?php 
    //session_start();
	require_once('../database.php');

	if (!isset($_SESSION['name'])) {
		echo "<script>alert('Please Log In first');</script>";
		header('Location: login.php');
	}
	
	$databasecall->showschedule();
 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<title>Show Teacher Schedule</title>
 	<link rel="stylesheet" type="text/css" href="../css/style.css">
 </head>
 <body>

 	<div class="box">
 	<br>
 		<h2>Show Teacher Schedule</h2>
 		
 		<table border="1" align="center" class="tab">
		
 		<tr>

   			<th>TeacherId</th>
   			<!--<th>Teacher Name</th>-->
   			<th>Schedule Id</th>
   			<th>Schedule</th>
   			<th>Course Id</th>
   			<th>Course Name</th>
   			<th>Day</th>
		    
  		</tr>

  		<?php 
  			$arr=$databasecall->showschedule();
  			for($i=0; $i< count($arr["staffId"]); $i++){
  				echo "<tr>";

				echo "<td>".$arr["staffId"][$i]."</td>";
				//echo "<td>".$arr["name"][$i]."</td>";
				echo "<td>".$arr["scheduleid"][$i]."</td>";
				echo "<td>".$arr["schedule"][$i]."</td>";
				echo "<td>".$arr["courseid"][$i]."</td>";
				echo "<td>".$arr["CourseName"][$i]."</td>";
				echo "<td>".$arr["day"][$i]."</td>";
				echo "</tr>";
			}
  		 ?>
  		
		</table>
		<br>
 		<a href="../admin.php">Back to Admin Home</a>
		<br><br><br>

 	</div>


 	<div class="tail">
 		<?php 
 			include_once('../Includes/footer.php');
 		 ?>
 	</div>
 </body>
 </html>
<?php include_once('../Includes/header.php'); ?>

<?php 
    //session_start();
	require_once('../database.php');

	if (!isset($_SESSION['name'])) {
		echo "<script>alert('Please Log In first');</script>";
		header('Location: login.php');
	}
	
	$databasecall->showstaff();
 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<title>Show Teacher</title>
 	<link rel="stylesheet" type="text/css" href="../css/style.css">
 	
 </head>
 <body>

 	<div class="box">
 	<br>
 		<h2>All Teachers</h2>
 		
 		<table border="1" align="center" class="tab">
		
 		<tr>

   			<th>TeacherId</th>
   			<th>Teacher Name</th>
   			<th>Emaill</th>
   			<th>Phone</th>
   			<th>Address</th>
		    
  		</tr>

  		<?php 
  			$arr=$databasecall->showstaff();
  			for($i=0; $i< count($arr["staffID"]); $i++){
  				echo "<tr>";

				echo "<td>".$arr["staffID"][$i]."</td>";
				echo "<td>".$arr["name"][$i]."</td>";
				echo "<td>".$arr["email"][$i]."</td>";
				echo "<td>".$arr["phone"][$i]."</td>";
				echo "<td>".$arr["address"][$i]."</td>";
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
 <style type="text/css">
 
 </style>
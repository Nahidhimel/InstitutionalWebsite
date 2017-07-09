<?php 
 		include_once('Includes/header1.php');
 	 ?>
<?php 
 	//session_start();
	require_once('database.php');


	if (!isset($_SESSION['name'])) {
		echo "<script>alert('Please Log In first');</script>";
		header('Location: login.php');
	}
			

	if (isset($_POST['logout'])) {
		
		$databasecall->logout();
	}
 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title>Teacher</title>
 	<link rel="stylesheet" type="text/css" href="css/style.css">
 </head>
 <body>
 	
   
 </div>

	<div class="but" align="center">
	<h1>Welcome <?php echo $_SESSION['name'] ?></h1>

	<aside class="side" >
 		<h2>Personal Information:</h2>
       <ul>
      <?php $res= $databasecall->viewinfo($_SESSION['name']);?>
        <br>
      <li>Id :&nbsp; <?php echo  $res["staffID"];?></li>
      <li>Username :&nbsp;<?php echo  $res["username"];?></li>
      <li>Password:&nbsp;<?php echo  $res["password"];?></li>
      <li>Name :&nbsp;<?php echo  $res["name"];?></li>
      <li>Email :&nbsp;<?php echo  $res["email"];?></li>
      <li>Phone :&nbsp;<?php echo  $res["phone"];?></li>
    </ul>
   <br>
   <form action="teacher.php" method="post">
		<input type="submit" id="logout" value="logout" name="logout">
	</form>
   <br>
 	</aside>
	  	<br><br>
	  	<div class="bakso">
		<a href="teacher/showteacherSchedule.php"><input type="submit" value="Show Schedule" name="submit" ></a><br>
		<a href="teacher/changepass.php"><input type="submit" value="Change Password" name="submit" ></a><br>
		<a href="teacher/updateresult.php"><input type="submit" value="Update Result" name="submit" ></a><br>
		<a href="teacher/delresult.php"><input type="submit" value="Delete Result" name="submit" ></a><br>
	</div>	
 				
	</div>
	
		
 	<div class="tail">
      	 <?php include_once('Includes/footer.php') ?>
    </div>
 </body>
 </html>
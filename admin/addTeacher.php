<?php include_once('../Includes/header.php'); ?>
<?php 
	//session_start();
	require_once('../database.php');

	if (!isset($_SESSION['name'])) {
		echo "<script>alert('Please Log In first');</script>";
		header('Location: login.php');
	}
	
	$msg='';

	if (isset($_POST["Add"])) {
		$check=$databasecall->add_staff($_POST["staffid"],$_POST["acess"],$_POST["username"],$_POST["password"],$_POST["name"],$_POST["email"],$_POST["phone"],$_POST["address"]);
		if ($check == true) {
			$msg="Added Successfully";
		}
		else{
			$msg="Failed adding Employee";
		}
		
	}
 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title>Add Teacher</title>
 	<link rel="stylesheet" type="text/css" href="../css/style.css">
 </head>
 <body>

 	<div class="box">
 		<p><?php echo $msg; ?></p>

 		<h2>Add Teacher</h2>
 		<br><br>
 		<form method="POST" action="addTeacher.php">
 		TeacherId:<input name="staffid" type="number"><br>
 		
 		Username:<input name="username" type="text"><br>
 		Password:&nbsp;<input name="password" type="password"><br>
 		Name:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input name="name" type="text"><br>
 		Email:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input name="email" type="text"><br>
 		Phone:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input name="phone" type="text"><br>
 		Address:&nbsp;&nbsp;&nbsp;<input name="address" type="text"><br><br>
 		<input type="submit" name="Add" value="submit">
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
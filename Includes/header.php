<?php session_start() ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
<div class="container">
		<h1 id = "header" >Sun Bridge International School</h1>
    	<div class="banner"> 
		<nav>
        	<ul>
                <li><a href="index.php">Home</a></li>
                <li ><a href="About.php">About</a></li>
                <li ><a href="academics.php">Academics</a></li>
                <li ><a href="admission.php">Admission</a></li>
				<li ><a href="result.php">Result</a></li>
				<li ><a href="notice.php">Notice</a></li>
				<?php if (isset($_SESSION['name'])){
					if ($_SESSION['name']=="Admin"){
						echo "<li ><a href='../admin.php'>".$_SESSION['name']."</a></li>";
					}
					else{
						echo "<li ><a href='../teacher.php'>".$_SESSION['name']."</a></li>";
					}
				} 
				else{
					echo "<li ><a href='../login.php'>Staff Only</a></li>";
				}?>			
			
			</ul>
		</nav>
<?php 
	require_once('database.php');

 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title>Admission</title>
 	<link rel="stylesheet" type="text/css" href="css/style.php">
 </head>
 <body>
 	<?php 
 		include_once('Includes/header1.php');
 	 ?>
 	 <div class="box">
 	 	<h2>Admission </h2>
 	 	<br>
 	 	<p class="ptag">In order to get admission in SBIS an applicant have to seat for admission test. The Admission test consist of 
 	 	two phase one is Written and Interniew. Applicant have to qualify in both test. To apply in SIBS applicant have to
 	 	collect an admission form and submit it with all required information and it will cost BDT. 400/-. Applicant can also secure a 
 	 	position by appling online and applicant have to pay form fee , also have collect admit card from register office. </p>

 	 	<br><br>
 	 	<a href="onlineapplication.php"><h3>APPLY NOW!!!</h3></a>
 	 </div>
 	 <div class="tail">
 		<?php 
 			include_once('Includes/footer.php');
 		 ?>
 	</div>
 </body>
 </html>
 <style type="text/css">
.ptag{
	text-align: left;
	margin-left: 15px;
}

 </style>

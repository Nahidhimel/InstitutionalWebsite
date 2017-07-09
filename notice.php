<?php 
 		include_once('Includes/header1.php');
 	 ?>
<?php 
	require_once('database.php');

 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title>Notice</title>
 	<link rel="stylesheet" type="text/css" href="css/style.css">
 </head>
 <body>
 	
 	
 	 <div class="box">
 	 <h2>Notice</h2>
 	 	
 	 	

 	 	<?php $arr=$databasecall->getNotice();
 	 			 for ($i=0; $i < count($arr["noticeId"]) ; $i++) { ?>
 	 			 <dl>
 	 			 	<div class="anchor"><dt><a href="#" align="left"><?php echo $arr["nosub"][$i]; ?> </dt></a>
 	 			 	<dd><?php echo $arr["noticetext"][$i]; ?></dd>
 	 			 	<dd>(<?php echo $arr['date'][$i]; ?>)</dd>
 	 			 	</div>
 	 			 </dl>
 	 			 
 	 			 
 	 			<?php }
 	 		 ?>
 	 	

 	 </div>

 	 <div class="tail">
 		<?php 
 			include_once('Includes/footer.php');
 		 ?>
 	</div>
 </body>
 </html>
 <style type="text/css">
 .anchor{
 	color:whitesmoke;
 	text-align: left;
 }
 a{
 	color: solid navy;
 	text-decoration: inherit;
 	margin-left: 10px;
 }
 
 </style>
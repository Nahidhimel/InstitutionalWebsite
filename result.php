<?php 
 		include_once('Includes/header1.php');
 	 ?>
<?php 
	//session_start();
	require_once('database.php');

	if (isset($_POST["submit"])) {
		
		$arrr=$databasecall->searchResult($_POST["studentId"]);
		if (!empty($arrr)) {
			
			$samp=array_keys($arrr);
			$errorMsg="";
			$dis="inline-block";
		}
		else{
			$errorMsg="Nothing found with Id ".$_POST["studentId"];
			$dis="none";
			$samp=null;
			$arrr=null;
		}
	}
	else{
		$dis="none";
		$samp=null;
		$arrr=null;
		$errorMsg="";
	}
 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title>Student Result</title>
 	<link rel="stylesheet" type="text/css" href="css/style.css">
 </head>
 <body>

 	
 	 <div class="res" style="height:400px;">
 	 	<p>Student can view your result here. You just need <br> to put your ID in the box and click Search. </p>
 	 	<br><br><br>
 	 	<form method="POST" action="result.php">
 	 		StudentId:<input type="number" name="studentId"><br>
 	 		<input type="submit" value="Search" name="submit">
 	 		<br><br>
 	 	</form>
 	 	

 	 	<table class="tab" id="idtable" border="1" style="display:<?php echo $dis; ?>;" > 
		 	
		 	<h2><?php echo $errorMsg; ?></h2>
			<tr>
				<?php 
					for($i=0; $i<count($samp); $i++){
						?>
						
						<th><?php echo $samp[$i] ?></th>
						<?php

					}
				 ?>
			</tr>
			<?php 
			for($j=0; $j<count($arrr[$samp[0]]); $j++){
				?>
				<tr>
				<?php
				for($k=0; $k<count($samp); $k++){
					?>
					<td>
					<?php echo $arrr[$samp[$k]][$j]; ?></td>
					<?php
				}
				?>
				</tr>
				<?php
			}

			?>

		</table>
		<br>
		<br>
		<br>

		</div>

 	 <div class="tail">
      	 <?php include_once('Includes/footer.php') ?>
    </div>
 </body>
 </html>
 <style type="text/css">
 	
	.res{
		overflow: hidden;
		/*display: inline-block;*/
		margin:0 auto;
	}
	
</style>
 

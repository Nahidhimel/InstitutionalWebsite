<?php 
    require_once('database.php');
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Sun Brige International School</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<?php include_once('Includes/header1.php'); ?>
        <div class="box">
            <div class="midbox"  style="height:250px;">
                <center><img src="img/school1.jpg" alt="" width="400" height="248"></center>
            </div>
            <center>
            <!--<div class="downbox">-->
                <div class="abt"><center><h3><a href="About.php">About Us</a></h3> </center>
                  <p>SBIS is an international and co-educational day school, founded in 1999, 
                     that was built to accommodate students from class 6 to class 12. The school 
                     provides a high-quality international education for both the local and the 
                     international community.</p><br>
                     <a href="About.php">Read more</a>
                </div>
                <div class="pris"><center><h3><a href="#">Principal's Speech</a></h3></center>
                    <p>SIBS is all about - educating minds and hearts of all our students at all 
                    times during their stay here. Students of classes 11 and 12 are more particularly 
                    important to us as this period of their study represents a special turning point in their lives.</p><br>
                    <a href="About.php">Read more</a>
                </div>
                <div class="not"><center><h3><a href="notice.php">Notice</a></h3></center>
                    
                <?php $arr= $databasecall->getNoticel(); 
                for ($i=0; $i < count($arr["nosub"]) ; $i++) { ?>
                    <a href="notice.php" class="aa"><?php echo $arr["nosub"][$i]; ?> </a>
                    <br>
                    
                    
                    <?php } ?>
                    <br><br><br>
                <a href="notice.php">Read More</a>
            </div>
            </center>
        </div>
        

</body>
</html>
<style type="text/css">
    .aa{
        color: white;
        text-decoration: underline;
    }
</style>
<div class="tail">
             <?php include_once('Includes/footer.php') ?>
        </div>
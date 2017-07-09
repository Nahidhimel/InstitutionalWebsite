<?php 
	include_once('Includes/header1.php');
	require_once('database.php');

    $class = $databasecall->getclass();
    $msg = '';

    if (isset($_POST['submit'])) {
        $var = $databasecall->addapplicant($_POST["name"],$_POST["fname"],$_POST["mname"],$_POST["addr"],$_POST["aclass"],$_POST["pca"],$_POST["pcr"],$_POST["psa"],$_POST["email"],$_POST["phone"]);
        if ($var == true) {
            $msg="Successful Application. Please visit register office and pay the form fees. Don't forget to collect the admit card.";
        }
        else{
            $msg="Failed Attempt";
        }
        
    }
 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title>Online Application</title>
 </head>
 <body>
 	<div class="box">

     <h2>Submit The Form</h2>
     <?php echo $msg; ?>
 	<form method="POST" action="onlineapplication.php" >

    <table width="600" border="0">
    <tr>
      <td>
        <strong>NAME</strong><br>
        <input type="text" name="name" id="name" required><br>
     </td>
    </tr>
    <tr> 
    <td>
        <strong>Father's Name</strong><br>
        <input type="text" name="fname" id="fname" required>
        </td>
    </tr>
    <tr><td>
        <strong>Mother's Name</strong><br>
        <input type="text" name="mname" id="mname" required>
    </td>
    </tr>
    <tr>
    <td>
        <strong>Address</strong><br>
        <input type="text" name="addr" id="addr" required>
   </td>
    </tr>
    <tr>
    <td>
        <strong>Admission Class </strong><br>
        <select  name="aclass" required>
                <?php 
                    for ($i=0; $i <count($class["Class"]) ; $i++) { 
                        $var = $class["Class"][$i];
                        if ($databasecall->remainingSeat($var)<1) {
                            echo "<option value=".$class["Class"][$i]." disabled>".$class["Class"][$i]."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Remaining Seat: ".$databasecall->remainingSeat($var)."</option>";
                        }else{
                            
                            echo "<option value=".$class["Class"][$i].">".$class["Class"][$i]."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Remaining Seat: ".$databasecall->remainingSeat($var)."</option>";
                        }
                    }

                 ?>
            </select>
    </td>
    </tr>
    <tr>
        <td>
        <strong>Previous Class Attend </strong><br>
        <input type="text" name="pca" id="pca" required>
        </td>
    </tr>
    <tr>
    <td>
        <strong>Previous Class Result </strong><br>
        <input type="text" name="pcr" id="pcr" required>
        </td>
    </tr>
    <tr>
    <td>
        <strong>Previous School Attend</strong><br>
        <input type="text" name="psa" id="psa" required>
        </td>
    </tr>
    <tr>
    <td>
        <strong>Email</strong><br>
        <input type="text" name="email" id="email" required>
        </td>
    </tr>
    <td>
        <strong>Phone</strong><br>
        <input type="text" name="phone" id="phone" required>
        </td>
    </tr>

    <tr>
      <td><input type="submit" name="submit" id="submit" value="Submit"></td>
    </tr>

    </table>
<br><br><br>

</form>

</div>
<div class="tail">
             <?php include_once('Includes/footer.php') ?>
        </div>
 </body>
 </html>

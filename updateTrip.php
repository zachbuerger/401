<html>
<head>
<title>Member Registration</title>
</head>
<body>

<?php
      //get variables
      $origin = $_POST["Origin"];
      $destination = $_POST["Destination"];
      $ddate = $_POST["dDate"];
      $dtime = $_POST["dTime"];
      $driver = $_POST["Driver"];
      $seats = $_POST["Seats"];
      $email = $_POST["Email"];

      include ("readDb.php");

      //update information now
      echo "Updating trip information now... ";

      include ("connectDb.php");

      $sql = "UPDATE ridersdb SET Origin='$origin', Destination='$destination', dDate='$ddate', dTime='$dtime', Driver='$driver', Seats='$seats' WHERE Email = '$email' ";

      $result = mysql_query($sql);

      if ($result==1){
      	    echo ' <br> <font color="#00FF00"> Trip updated! </font> ';
            sleep(3);
            echo '<form id="autologin" action="login.php" method="post">';
            echo "<input type='hidden' name='Email' value=$email />";
            echo "<input type='hidden' name='Pass' value=$passdB />";
            echo '</form>';
            echo '<script language="javascript">';
            echo 'document.getElementById("autologin").submit();';
            echo '</script>';
      } else
       	    echo ' <br> <font color="#FF0000"> <b><i> Error. Please Try Again. </b></i></font>';      	

      mysql_close($conn);

 ?>


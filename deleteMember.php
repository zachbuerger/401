<html>
<head>
<title>Unregister from The HandyRides</title>
</head>

<?php

      //get variables
      $email = $_POST["Email"];
      $pass = $_POST["Pass"];

      if(!$pass){
          echo "<center> Are you sure you wish to leave Trekkera?";
          echo "<center> Please confirm your password below:";
          echo '<FORM action="deleteMember.php" method="post">';
          echo '<P>';
          echo '<LABEL for="pass">Password: </LABEL><INPUT type="password" name="Pass"><BR>';
          echo "<INPUT type='hidden' name='Email' value=$email />";

          echo '<INPUT type="submit" value="Unsubscribe"> ';
          echo ' </P>';
          echo '</FORM>';
          echo '<br> <a href="isindexSearch.php"> Return to Homepage </a> <br>';
          echo '</body> </html>';
      }

      else{

           //get variables from readDB.php
           include ("readDb.php");

	   if ($pass == $passdB) {
               include ("connectDb.php");

               $sql = "DELETE FROM ridersdb WHERE Email = '$email'";
               mysql_query($sql);

               $result = mysql_query($sql);
               if (!result)
	           echo ' <br> <font color="#FF0000"> <b><i> Error. Please Try Again. </b></i></font>';
               else
	           echo '<font color="#00FF00"> Unregistered from The HandyRides. We hope you will reconsider us in the future. </font>';
	       echo '<META HTTP-EQUIV="REFRESH" CONTENT="3; URL=isindexSearch.php">';
	       echo '</html>';

               mysql_close($conn);
         }

	 else {
	      echo 'Password incorrect. Please try again. You will be redirected momentarily';
              sleep(3);
              echo '<form id="autologin" action="login.php" method="post">';
              echo "<input type='hidden' name='Email' value=$email />";
              echo "<input type='hidden' name='Pass' value=$passdB />";
              echo '</form>';
              echo '<script language="javascript">';
              echo 'document.getElementById("autologin").submit();';
              echo '</script>';
	      echo '</html>';
         }
      }

?>

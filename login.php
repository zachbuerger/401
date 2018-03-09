   <?php

   $email = $_POST["Email"];
   $pass = $_POST["Pass"] ;

   if(!$email or !$pass){
      echo "<html>";
      echo "<title> Empty fields </title>";
      echo '<BODY BGCOLOR="white" TEXT = "black">';
      echo "Empty Field. Please try again. Redirecting you back. ";
      echo '<META HTTP-EQUIV="REFRESH" CONTENT="3; URL=isindexSearch.php">';
      echo '</body>';
      echo '</html>';

   } else{
       include ("readDb.php");

       if($found == 0){

          echo "<html>";
          echo' <title> Email does not exist </title>';
          echo '<BODY BGCOLOR="white" TEXT = "black">';
          echo ' Email not found. Please try again. Redirecting you back. ';
          echo '<META HTTP-EQUIV="REFRESH" CONTENT="3; URL=isindexSearch.php">';
          echo '</body>';
          echo ' </html>';

        } else {
              if($pass != $passdB){
                echo "<html>";
                echo ' <title> Incorrect Password </title>';
                echo '<BODY BGCOLOR="white" TEXT = "black">';
                echo "Wrong password. Please try again. Redirecting you back. ";
                echo '<META HTTP-EQUIV="REFRESH" CONTENT="3; URL=isindexSearch.php">';
                echo '</body>';
                echo ' </html>';

             } else {
              echo "<html>";
              echo " <title> " .$row[fName]. "'s profile. </title>";
              echo '<BODY BGCOLOR="white" TEXT = "black">';
              echo '<center> <IMG src ="Trekkera_logo.jpg"> <br>' ;
              echo 'Hi ' .$row[fName]. '. welcome back! Here is your trip information: <br>';
              echo "<br>";

              echo "<CENTER> <TABLE BGCOLOR=white BORDER=1 CELLSPACING=2 CELLPADDING=4 WIDTH=60%>";
              echo "<TR BGCOLOR=white>";
              echo "<TH>First Name</TH> ";
              echo "<TH>Last Name</TH> ";
              echo "<TH>Origin</TH>";
              echo "<TH>Destination</TH>";
              echo "<TH>Departure Date</TH>";
              echo "<TH>Departure Time</TH>";
              echo "<TH>Driver</TH>";
              echo "<TH>Available Seats</TH>";
              echo "</TR>";

              echo "<TR>";
              echo "<TD ALIGN=CENTER> ".$row["fName"]." </TD>";
              echo "<TD ALIGN=CENTER> ".$row["lName"]." </TD>";
              echo "<TD ALIGN=CENTER> ".$row["Origin"]." </TD>";
              echo "<TD ALIGN=CENTER> ".$row["Destination"]." </TD>";
              echo "<TD ALIGN=CENTER> ".$row["dDate"]." </TD>";
              echo "<TD ALIGN=CENTER> ".$row["dTime"]." </TD>";
              echo "<TD ALIGN=CENTER> ".$row["Driver"]." </TD>";
              echo "<TD ALIGN=CENTER> ".$row["Seats"]." </TD>";
              echo "</TR>";
              echo "</TABLE></CENTER>";
              echo "<br><br>";

              echo "<H3>Update Trip</H3>";
              echo "<form name='new' action='updateTrip.php' method='post'>";

              echo "<td> <input type='hidden' name='Email' value=$email /> </td></tr>";

              echo "<br>Please enter your trip information: <br>";
              echo "<table width = 300>";
              echo "<tr><td>Origin:</td> <td> <input type='text' name='Origin' /> </td></tr>";
              echo "<tr><td>Destination: </td> <td> <input type='text' name='Destination' /> </td> </tr>";
              echo "<tr><td>Departure Date:</td> <td> <input type='date' name='dDate' /> </td></tr>";
              echo "<tr><td>Departure Time: </td> <td> <input type='time' name='dTime' /> </td> </tr>";
              echo "</table>";

              echo "<br>Do you have a car: <br>";
              echo "<table width = 100>";
              echo "<tr><td> <input type='radio' name='Driver' value='Yes' />  </td> <td>Yes </td></tr>";
              echo "<tr><td> <input type='radio' name='Driver' value='No' /> </td> <td> No </td></tr>";
              echo "</table>";
              echo "<br>If you have a car, how many seats can you offer: <br>";
              echo "<table width = 100>";
              echo "<tr><td> <input type='number' name='Seats' />  </td> </tr>";
              echo "</table>";

              echo "<br><input type='submit' value='Update'><br>";
              echo "</form>";
              echo "<br><br>";
              
              
              echo '<form id="unsubscribe" action="deleteMember.php" method="post">';
              echo "<input type='hidden' name='Email' value=$email />";
              echo "<input type='submit' value='Unsubscribe'><br>";
              echo '</form>';
              
              
              echo '<br> <a href="isindexSearch.php"> Return to Homepage </a> <br>';

              echo ' <font size = 1> Trek on </font>';
              echo '</center>';
              echo "<br>";
              echo "</body>";
              echo ' </html>';
           }
        }
   }

 ?>




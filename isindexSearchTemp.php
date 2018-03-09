
     <?php  // Use the <?php command so the server realizes this is PHP code and not HTML


     // Set the variable $q equal to whatever follows the "?query=" in the URL
     $q = $_GET["query"];

     if (!$q){  // If the "query" line is blank, display the search page

         // The following echo commands generate standard HTML output for the browser to view.
         echo "<HTML>";
         echo "<TITLE> ORF 401: Lab #2 - PHP - Spring 2016 </TITLE>";
         echo '<BODY BGCOLOR="white" TEXT = "black">';
         echo '<center>';
         echo '<table border="0" width="700" >';
         echo '<tr>';

         echo ' <td>Join <I>The HandyRides</I> Community! <br> <a href="newMember.html"><B> Register </B></a></td>';
         echo ' <td ALIGN=RIGHT>Already a Member? Sign In: </td>';
         echo '</tr> <tr>';

         echo '<td>  </td>';

         echo '<td ALIGN=RIGHT> <FORM action="login.php" method="post">';
         echo '<P>';
         echo '<LABEL for="email">Email:&nbsp &nbsp </LABEL>
              <INPUT type="text" name="Email"><BR>';
         echo '<LABEL for="pass">Password: </LABEL>
              <INPUT type="password" name="Pass"><BR>';

         echo '<INPUT type="submit" value="Sign In"> ';
         echo ' </P>';
         echo '</FORM>';
         echo ' </td> </tr> </table>';

         echo "<br>";

         echo "<H3>The HandyRides</H3>";
         echo '<IMG src ="logo.jpg", ALIGN = middle>';
         echo "<br><br>";
         echo "Search by origin/destination: <br>";

         // Notice the creation of a form in HTML
         // <form action= "">  says which page to send the results of the form to.
         // <input type="text"> denotes a text input, the name="query" part
         echo '<form action="isindexSearch.php" method="get">';
         echo '<input type="text" name="query" />';
         echo '<input type="submit"  value="Search" />';
         echo '</form>';      // End the Form
         echo "<br>";
         echo "<br>";
         echo "<br>";
         echo "<br>";
         echo "<br>";

         echo '<hr>';
         echo ' &copy Chenyi Chen';
         echo "<br>";

         echo ' <font size = 1> Sharing rides, less congestion </font>';

         echo '</center>';

         // Closing HTML
         echo "</BODY>";
         echo "</HTML>";

     } else { // In this case, else means that there was some kind of data passed to the PHP script in the URL

        // Code to deal with an instance of the URL where a ?query= is passed

        // Output the HTML header
        echo "<HTML>";

        echo "<TITLE> ORF 401: Lab #2 - PHP - Search Results for " . $q . " </TITLE>";
        echo '<BODY BGCOLOR="white" TEXT = "black">';

        echo '<center>';
        echo "<br>";
        echo '<IMG src ="logo.jpg", ALIGN = middle>';
        echo "<br>";


        // Connecting database
        include ("connectDb.php");

        $sqlt = "SELECT * FROM ridersdb WHERE Origin = '$q' OR Destination = '$q' ";
        $result = mysql_query($sqlt);

        // See if we get an OK result
        if (!$result) {
            die('SQL Error Getting User Information: ' . mysql_error());
        }  else
	    $found = number_format(mysql_num_rows($result));

        echo "Searching for " . $q . "! <br>";

        if ($found>0) {
            echo "<H3>How about?</H3>";
            echo "<CENTER> <TABLE BGCOLOR=white BORDER=1 CELLSPACING=2 CELLPADDING=4 WIDTH=60%>";
            echo "<TR BGCOLOR=white>";
            echo "<TH>First Name</TH> ";
            echo "<TH>Last Name</TH> ";
            echo "<TH>Origin</TH>";
            echo "<TH>Destination</TH>";
            echo "<TH>Departure Date</TH>";
            echo "<TH>Departure Time</TH>";
            echo "<TH>Has Car</TH>";
            echo "<TH>Available Seats</TH>";
            echo "</TR>";

            while($row=mysql_fetch_array($result)) {
                 echo "<TR>";
                 echo "<TD ALIGN=CENTER> ".$row["fName"]." </TD>";
                 echo "<TD ALIGN=CENTER> ".$row["lName"]." </TD>";
                 echo "<TD ALIGN=CENTER> ".$row["Origin"]." </TD>";
                 echo "<TD ALIGN=CENTER> ".$row["Destination"]." </TD>";
                 echo "<TD ALIGN=CENTER> ".$row["dDate"]." </TD>";
                 echo "<TD ALIGN=CENTER> ".$row["dTime"]." </TD>";
                 echo "<TD ALIGN=CENTER> ".$row["Hascar"]." </TD>";
                 echo "<TD ALIGN=CENTER> ".$row["Seats"]." </TD>";
                 echo "</TR>";
            }
            echo "</TABLE></CENTER>";
            echo "<H3>Thanks for using <EM>The HandyRides</EM>!</H3></P>";
        } else
            echo "<H3>No related origin/destination found. Search again?</H3>";


         echo "Didn't find what you were looking for? Try again:<br>";

         echo '<form action="isindexSearch.php" method="get">';
         echo '<input type="text" name="query" />';
         echo '<input type="submit"  value="Search" />';
         echo '<br><br> <a href="isindexSearch.php"> Return to Homepage </a> <br>';
         echo '</form>';      // End the Form
         echo "<br>";
         echo '<hr>';
         echo ' &copy Chenyi Chen ';
         echo "<br>";

         echo ' <font size = 1> Sharing rides, less congestion </font>';
         echo '</center>';
         echo "<br>";
     	 echo "</BODY>";
         echo "</HTML>";
     }





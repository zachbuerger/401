

     <?php  // Use the <?php command so the server realizes this is PHP code and not HTML

     // Set the variable $q equal to whatever follows the "?query=" in the URL
     $q = $_GET["query"];

     if (!$q){  // If the "query" line is blank, display the search page

        include("./html/home.html");

     } else { // In this case, else means that there was some kind of data passed to the PHP script in the URL


         // Code to deal with an instance of the URL where a ?query= is passed

        // Output the HTML header
        echo "<HTML>";

        echo "<TITLE> Trekkera - Search Results for " . $q . " </TITLE>";
        echo '<BODY BGCOLOR="white" TEXT = "black">';

        echo '<center>';
        echo "<br>";
        echo '<IMG src ="Trekkera_logo.jpg", ALIGN = middle>';
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

        echo "Searching for <b>" . $q . "</b>! <br>";

        if ($found>0) {
            echo "<H3>Trekkers with same origin/destination</H3>";
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
            echo "<H3>Thanks for using <EM>Trekkera</EM>!</H3></P>";
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
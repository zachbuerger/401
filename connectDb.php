<?php

       // Connect to the database for the entry of the CSV stuff into the database.
      $dbhost = 'localhost';
      $dbuser = 'ztb_ztb';     // CHANGE IT TO YOUR DATABASE USER NAME
      $dbpass = 'iloveorf401';            // CHANGE IT TO YOUR DATABASE PASSWORD

      $conn = mysql_connect($dbhost, $dbuser, $dbpass) or die('Error connecting to mysql');

      $dbname = 'ztb_lab2';     // CHANGE IT TO YOUR DATABASE NAME
      mysql_select_db($dbname);
      
?>

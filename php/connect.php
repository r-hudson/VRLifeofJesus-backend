<?php

//the settings dbhost, dbname, password, username
$con=mysqli_connect("localhost","root","","boom");

// Check connection
if (mysqli_connect_errno($con))
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
?>

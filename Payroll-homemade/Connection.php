<?php
$servername = "localhost";
$username = "root";
$password = "";

// Create connection
$conn = mysqli_connect($servername, $username, $password);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}


function filterTable($query)
{
  $servername = "localhost";
  $username = "root";
  $password = "";

  $conn =  mysqli_connect($servername, $username, $password);
  $filter_Result = mysqli_query($conn, $query);
  $conn->close();
  return $filter_Result;
}
?>
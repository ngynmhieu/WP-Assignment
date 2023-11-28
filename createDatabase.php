<?php
//create connection
$servername = "localhost";
$username = "root";
$password = "";

$conn = new mysqli($servername, $username, $password);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

//check database is successfully created or not
$sql = "CREATE DATABASE CV_Online";
if (mysqli_query($conn, $sql)) {
   echo "Database created successfully";
 } else {
  echo "Database failed to create";
 }




 ?>
<?php
$dbServername = "localhost";
$dbUsername = "root";
$dbPassword = "admin123";
$dbName = "smartlockdb";

$conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);
$results = $conn->query("SELECT * FROM student");

?>
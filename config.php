<?php
// Database configuration
// Database configuration
$host = "localhost";
$username = "root";
$password = "";
$database = "estate_data";

// Connect to the database
$conn = mysqli_connect($host, $username, $password, $database);


if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

?>
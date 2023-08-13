<?php
session_start(); // Start the session

// Clear all session variables
$_SESSION = array();

// Destroy the session
session_destroy();

// Redirect to a login page or any other appropriate page
header("Location: login.php");
exit();
?>
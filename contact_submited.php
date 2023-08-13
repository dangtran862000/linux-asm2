<?php
session_start(); // Start the session

require_once 'config.php'; // Include the database configuration file

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name_contact'];
    $email = $_POST['email_contact'];
    $phone = $_POST['tel_contact'];
    $message = $_POST['message_contact'];

    // Insert the user's contact information into the database
    $insertQuery = "INSERT INTO contacts (name, email, phone, message) VALUES ('$name', '$email', '$phone', '$message')";

    if (mysqli_query($conn, $insertQuery)) {
        echo "Thank you for your message!";
        $_SESSION['contact_status'] = "Thank you for contacting us. We will contact you soon!";
        header("Location: contact.php");

    } else {
        echo "Error: " . mysqli_error($conn);
    }

    mysqli_close($conn);
}
?>
<?php
session_start(); // Start the session

// Database configuration
require_once 'config.php'; // Include the database configuration file


$status = isset($_SESSION['status']) ? $_SESSION['status'] : "";
if ($status === "logined") {
    header("Location: index.php");
}

// Signup process
if (isset($_POST['signup'])) {
    echo "TEST";
    $username = $_POST['username'];
    $password = $_POST['password']; // Remember to hash the password in a real application
    $email = $_POST['email'];
    $reenterPassword = $_POST['repassword'];

    $checkUsernameQuery = "SELECT * FROM user_account WHERE username='$username'";
    $checkUsernameResult = mysqli_query($conn, $checkUsernameQuery);

    if (mysqli_num_rows($checkUsernameResult) > 0) {
        $_SESSION['signup_message'] = "Username already exists. Please choose a different username.";
        header("Location: signup.php");

    } elseif ($password === $reenterPassword) {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO user_account (username, password, email) VALUES ('$username', '$hashedPassword', '$email')";

        if (mysqli_query($conn, $sql)) {
            echo "Signup successful!";
            $_SESSION['signup_message'] = "Signup successful ! Please login to access our website";
            header("Location: login.php");
            exit();

        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    } else {
        echo "Passwords do not match.";
        $_SESSION['signup_message'] = "Passwords do not match.";
        header("Location: signup.php");
    }
}

// // Login process
// if (isset($_POST['login'])) {
//     $username = $_POST['username'];
//     $password = $_POST['password'];

//     $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";

//     $result = mysqli_query($conn, $sql);

//     if (mysqli_num_rows($result) == 1) {
//         echo "Login successful!";
//     } else {
//         echo "Login failed. Invalid username or password.";
//     }
// }

mysqli_close($conn);
?>
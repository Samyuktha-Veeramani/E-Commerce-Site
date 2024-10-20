<?php
session_start();

function validateCredentials($username, $password) {
    
    $valid_username = "user"; // Replace with your username
    $valid_password = "password"; // Replace with your password

    return $username === $valid_username && $password === $valid_password;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the form input
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Validate credentials
    if (validateCredentials($username, $password)) {
        // Set session variable
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $username; // Store username for later use
        header("Location: dashboard.php"); // Redirect to the dashboard
        exit();
    } else {
        // Invalid credentials
        header("Location: login.html?error=Invalid credentials");
        exit();
    }
}
?>

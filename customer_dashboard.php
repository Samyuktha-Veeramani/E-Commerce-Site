<?php
session_start();

// Check if the user is logged in and is a customer
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'customer') {
    header("Location: login.html");
    exit;
}

echo "<h2>Welcome, " . $_SESSION['username'] . "! (Customer)</h2>";
echo "<p>This is your customer dashboard.</p>";
?>

<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: login.html"); // Redirect to login if not logged in
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Shop Zo Nix</title>
</head>
<body>
    <h1>Welcome to your dashboard, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h1>
    <p><a href="logout.php">Logout</a></p> <!-- Link to logout -->
</body>
</html>

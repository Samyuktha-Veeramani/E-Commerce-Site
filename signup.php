<?php
// Database connection
$host = 'localhost';
$username = 'root';
$password = '';
$dbname = 'shop_zo_nix';

$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data
$user = $_POST['username']; // Get the username from the form
$pass = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash the password
$email = $_POST['email'];
$role = $_POST['usertype'];  // Either 'customer' or 'vendor'

// SQL query to insert user into the database
$sql = "INSERT INTO users (username, email, password, role) VALUES ('$user', '$email', '$pass', '$role')";

// Execute query and check if it's successssful
if ($conn->query($sql) === TRUE) {
    // Redirect to the appropriate page based on the user's role
    if ($role == 'vendor') {
        header("Location: vendor_dashboard.html");
    } else {
        header("Location: customer_dashboard.html");
    }
    exit; // Ensure no further code runs after redirection
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
ss
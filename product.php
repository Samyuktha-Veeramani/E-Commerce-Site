<?php
// Connect to the database
$host = 'localhost';
$db = 'ecommerce';
$user = 'root';
$pass = '';

$conn = new PDO("mysql:host=$host;dbname=$db", $user, $pass);

// Get all products
$stmt = $conn->prepare("SELECT * FROM products");
$stmt->execute();
$products = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Output products in JSON format
header('Content-Type: application/json');
echo json_encode($products);
?>

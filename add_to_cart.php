<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    echo "You need to login first!";
    exit;
}

$user_id = $_SESSION['user_id'];
$product_id = $_POST['product_id'];
$quantity = $_POST['quantity'];

// Connect to the database
$host = 'localhost';
$db = 'ecommerce';
$user = 'root';
$pass = '';

$conn = new PDO("mysql:host=$host;dbname=$db", $user, $pass);

// Insert product into cart
$stmt = $conn->prepare("INSERT INTO cart (user_id, product_id, quantity) VALUES (:user_id, :product_id, :quantity)");
$stmt->bindParam(':user_id', $user_id);
$stmt->bindParam(':product_id', $product_id);
$stmt->bindParam(':quantity', $quantity);
$stmt->execute();

echo "Product added to cart!";
?>

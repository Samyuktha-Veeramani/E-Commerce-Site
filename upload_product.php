<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "shop_zo_nix";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];
    $vendor_id = 1;  // Assuming vendor is logged in (replace with session ID)
    
    $product_image = $_FILES['product_image']['name'];
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($product_image);
    
    if (move_uploaded_file($_FILES['product_image']['tmp_name'], $target_file)) {
        $sql = "INSERT INTO products (vendor_id, product_name, product_price, product_image) VALUES ('$vendor_id', '$product_name', '$product_price', '$product_image')";
        
        if ($conn->query($sql) === TRUE) {
            echo "Product uploaded successfully!";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "Error uploading image.";
    }
}

$conn->close();
?>

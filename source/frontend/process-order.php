<?php
session_start();

include '../config.php';


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $conn->real_escape_string($_POST['name']);
    $email = $conn->real_escape_string($_POST['email']);
    $phone = $conn->real_escape_string($_POST['phone']);
    $address = $conn->real_escape_string($_POST['address']);
    $cartData = json_decode($_POST['cart_data'], true);

    
    $totalPrice = 0;
    foreach ($cartData as $item) {
        $totalPrice += $item['price'] * $item['quantity'];
    }

  
    $sql = "INSERT INTO orders (name, email, phone, address, total_price, created_at) 
            VALUES ('$name', '$email', '$phone', '$address', '$totalPrice', NOW())";

    if ($conn->query($sql) === TRUE) {
        $orderId = $conn->insert_id; 

        
        foreach ($cartData as $item) {
            $productName = $conn->real_escape_string($item['name']);
            $productPrice = $item['price'];
            $quantity = $item['quantity'];

            $sqlItem = "INSERT INTO order_items (order_id, product_name, product_price, quantity) 
                        VALUES ('$orderId', '$productName', '$productPrice', '$quantity')";
            $conn->query($sqlItem);
        }

     

        
        unset($_SESSION['cart']);

       
        header("Location: thank-you.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
